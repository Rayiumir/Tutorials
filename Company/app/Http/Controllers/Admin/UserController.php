<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserCreateRequest;
use App\Http\Requests\Admin\Users\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        $notification = array(
            'message' => 'کاربر با موفقیت ایجاد شد',
            'alert-type' => 'success'
        );

        return to_route('users.index')->with($notification);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        $notification = array(
            'message' => 'کاربر به روز رسانی شد',
            'alert-type' => 'success'
        );

        return to_route('users.index')->with($notification);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $notification = array(
            'message' => 'کاربر با موفقیت حذف شد',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
