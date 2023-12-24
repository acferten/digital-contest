@php
    use App\Helpers\ImageHelper;
@endphp
<style>

    .loader {
        width: 48px;
        height: 48px;
        border: 2px solid #FF3D00;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    .loader::after {
        content: '';
        box-sizing: border-box;
        position: absolute;
        left: 50%;
        top: 0;
        background: #FF3D00;
        width: 3px;
        height: 24px;
        transform: translateX(-50%);
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        @if ($value)
            <img id="{{$id}}_preview"
                 src="/{{str_ireplace(env('APP_URL').'/', '', config('filesystems.disks.'.config('admin.upload.disk').'.url'))}}{{ImageHelper::getThumbnailImage($help['model'], $value, 'medium')}}">
            <input type="button" value="Удалить" onclick="deleteImageHandler(event)" column="{{$id}}"
                   model_class="{{$help['model']::class}}" model_id="{{$help['model']->id ?? null}}">
        @else
            <span class="loader js-loader-{{$id}}" style="display:none"></span>
            <input type="button" value="Обрезать" onclick="cropImageHandler(event)" column="{{$id}}"
                   model_class="{{$help['model']::class}}" model_id="{{$help['model']->id ?? null}}"
                   style="display:none">
            <input type="file" class="{{$class}}" name="{{$id}}" accept="image/*, .heic, .heif" {!! $attributes !!} />
        @endif
        @include('admin::form.help-block')

    </div>

</div>
