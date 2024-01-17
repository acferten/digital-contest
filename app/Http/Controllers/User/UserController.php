<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Domain\Shared\Models\User;
use Domain\Work\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $letters = User::select(DB::raw('SUBSTRING(username, 1, 1) as letter'))->groupBy('letter')->orderBy('letter')->get();
        $users = User::select(DB::raw('id, username, SUBSTRING(username, 1, 1) as letter'))->orderBy('username')->get();

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

        return view('participants', ['letters' => $letters, 'user_group' => $user_group]);
    }

    public function rating()
    {
        $data = [
            'works' => Work::all(),
        ];

        return view('participants_rating', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
