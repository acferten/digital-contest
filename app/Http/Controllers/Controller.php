<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ImageHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     *
     * Удаление одиночного файла через запрос
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteImage(Request $request)
    {
        $message = 'Файл не удалён';
        $model_class = $request->input('model_class', null);
        $column = $request->input('column', null);
        $model_id = $request->input('model_id', null);
        if ($model_class && $column && $model_id) {
            $model = $model_class::find($model_id);
            $file = $model->$column;
            $filePath = ImageHelper::getImagePath($model);
            if (is_dir($filePath)) {
                try {
                    unlink($filePath . DIRECTORY_SEPARATOR . $file);
                } catch (\Throwable $e) {
                    Log::error($e->getMessage());
                }
            }
            $model_class::where('id', $model_id)->update([$column => '']);
            $message = 'Файл удалён';
        }

        return response()->json($message);
    }


    /**
     * Рендерим пришедшее фото в PNG (нужно для кропера - так как фронт не поддерживает отображение HEIC)
     * @param Request $request
     *
     *
     * @return string
     * @throws \Exception
     */
    public function renderFile(Request $request) {
        $uploadedFile = $request->file('renderFile', []);
        $renderFile = $uploadedFile;
        try {

            if ($uploadedFile->extension() === 'heic' || $uploadedFile->extension() === 'heif') {
                exec('convert ' . $uploadedFile->getRealPath() . ' ' . $uploadedFile->getRealPath() . '.png');
                $pathinfo = pathinfo($uploadedFile->getRealPath() . '.png');
                $ext =  'image/' . $pathinfo['extension'];
                $renderFile = new UploadedFile($uploadedFile->getRealPath() . '.png', $pathinfo['basename'], $ext);
            }

            $str = 'data:image/' . $renderFile->extension() . ';base64,' . base64_encode(file_get_contents($renderFile->getRealPath()));
            @unlink($uploadedFile->getRealPath());
            @unlink($renderFile->getRealPath());
            return $str;


        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage() , 200);
        }

    }

    /**
     *
     * Замена обрезанного файла
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function cropImage(Request $request)
    {
        $name = FileHelper::getFileName($request->src);
        $path = str_ireplace(env('APP_URL').DIRECTORY_SEPARATOR, '', $request->src);
        $asset_path = str_replace(DIRECTORY_SEPARATOR.$name, '', $path);
        $asset_path = preg_replace('/\d+$/', 'assets', $asset_path);
        $short_name = str_replace('.webp', '',$name);
        $file = $request->file;
        if (file_exists($path)){
            unlink($path);
            copy($file, $path);
            $assets = scandir($asset_path);
            foreach ($assets as $asset){
                if (strpos($asset, $short_name.'_', ) === 0){
                    unlink($asset_path.DIRECTORY_SEPARATOR.$asset);
                }
            }
        }

        return response()->json('image cropped');
    }
}
