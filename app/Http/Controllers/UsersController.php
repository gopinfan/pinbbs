<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    // show
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // edit
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    // update
    public function update(UserRequest $userRequest, User $user, ImageUploadHandler $uploadHandler)
    {
        $this->authorize('update', $user);
        
        $data = $userRequest->all();

        if ($userRequest->avatar) {
            $result = $uploadHandler->save($userRequest->file('avatar'), 'avatars', $user->id, 360);
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);

        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
