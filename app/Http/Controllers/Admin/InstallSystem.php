<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryForm;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\Console\Input\Input;

class InstallSystem extends Controller
{
    public function __construct()
    {

    }

    public function index ()
    {
        $user = User::exists();
        if($user == null) {
            return view('admin.install.index');
        }
        else{
            return redirect()->route('login')->with('warning', __('System was installed.'));
        }
    }

    public function store (Request $request)
    {
        $user = User::exists();
        if($user == null) {
            $password = "zaq1@WSX";
            $reqpass = $request->password;
            $permission = ['ACP-system-control', 'ACP-view', 'ACP-user-list-view', 'ACP-user-edit', 'ACP-user-update', 'ACP-user-edit-avatar', 'ACP-user-edit-password', 'ACP-user-delete', 'ACP-user-view', 'ACP-role-list-view', 'ACP-role-edit', 'ACP-role-create', 'ACP-role-update', 'ACP-role-delete', 'ACP-permission-list-view', 'ACP-permission-edit', 'ACP-permission-create', 'ACP-permission-delete', 'ACP-permission-update'];
            $form = array('images' => 'files',
                'payment' => 'select',
                'typeoffer' => 'select',
                'name' => 'text',
                'slug' => 'text',
                'description' => 'textarea',
                'short_description' => 'text',
                'rooms' => 'select',
                'surface' => 'select',
                'land_area' => 'select',
                'heating' => 'select',
                'media' => 'select',
                'security' => 'select',
                'charges' => 'select',
                'equipment' => 'select',
                'parking' => 'select',
                'regular_rent' => 'text',
                'deposit' => 'text',
                'contact_tel' => 'text',
                'country' => 'text',
                'voivodeship' => 'text',
                'community' => 'text',
                'city' => 'text',
                'zip_code' => 'text',
                'street' => 'text',
                'house_number' => 'text',
                'apartment_number' => 'text',
                'floor' => 'select/number',
                'additional_information' => 'text');
            if ($password == $reqpass) {
                Role::create(['name' => 'user']);
                Role::create(['name' => 'admin']);
                Role::create(['name' => 'Super Admin']);
                foreach($form as $value => $type)
                {
                    $item = new CategoryForm();
                    $item->name = $value;
                    $item->type = $type;
                    $item->save();
                }
                foreach ($permission as $perm) {
                    Permission::create(['name' => $perm]);
                }
                return redirect()->route('register')->with('success', __('System install complete. Block acces to install page!'));
            } else {
                return redirect()->back()->with('warning', __('Error password.'));
            }
        }
        else{
            return redirect()->route('login')->with('warning', __('System was installed.'));
        }
    }
}
