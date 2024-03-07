<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\Shared\Models\User;
use Domain\Work\Models\Work;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $letters = User::select(DB::raw('SUBSTRING(last_name, 1, 1) as letter'))
            ->groupBy('letter')
            ->orderBy('letter')
            ->get();

        $users = User::select(DB::raw('id, last_name, first_name, username, SUBSTRING(last_name, 1, 1) as letter'))
            ->orderBy('last_name')
            ->get();

        $user_group = collect();

        foreach ($users as $user) {
            $letter = $user->letter;
            if (! $user_group->has($letter)) {
                $user_group->put($letter, []);
            }
            $user_group->transform(function ($item, $key) use ($letter, $user) {
                if ($key == $letter) {
                    $item[] = $user;
                }

                return $item;
            });
        }

        return view('participants.index', ['letters' => $letters, 'user_group' => $user_group]);
    }

    public function rating(): View
    {
        $data = [
            'works' => Work::all()->load('votes')->sortByDesc(fn ($work) => $work->votes->count()),
        ];

        return view('participants.index-rating', $data);
    }

    public function show(int $id): View
    {
        $user = User::find($id);

        return view('participants.show', [
            'user' => $user,
        ]);
    }

    public function destroy(string $id)
    {
        //
    }
}
