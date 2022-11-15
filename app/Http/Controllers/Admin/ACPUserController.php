<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateUserPasswordRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ACPUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:ACP-user-list-view']);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view ('admin.user.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {

        $user->update($request->validated());
        $user->syncRoles($request->get('role'));


        return redirect()->route('acp.users')->with('success', __('User updated successfully.'));
    }

    public function update_avatar(User $user, Request $request)
    {
        $user = request()->route('user');
        // code
        if($request->hasFile('avatar'))
        {
            $path = 'assets/uploads/users/avatars/'.$user->avatar;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/users/avatars/',$filename);
            $user->avatar = $filename;
            $user->update();
            return redirect()->back()->with('success', __('User avatar updated successfully.'));
        }
        return redirect()->back()->with('warning', __('You do not select file image.'));
    }

    public function update_password(User $user, UpdateUserPasswordRequest $request)
    {
        if(isset($request->IsActiveCheck) && !empty($request->IsActiveCheck))
        {
            if($request->password == $request->password_confirmation)
            {
                $user->password = Hash::make($request->password);
                $user->update();
                return redirect()->back()->with('success', __('User password updated successfully.'));
            }
            return redirect()->back()->with('warning', __('Passwords do not match.'));
        }
        return redirect()->back()->with('warning', __('You do not confirm change password.'));
    }

    public function destroy(User $user, Request $request)
    {
        if(isset($request->IsActive) && !empty($request->IsActive))
        {
            $user->delete();
            return redirect()->route('acp.users')->with('success', __('User deleted successfully.'));
        }
        return redirect()->route('acp.users')->with('warning', __('Error deleted user.'.$user->email));
    }

    public function view(User $user)
    {
        return view ('admin.user.view', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

}
