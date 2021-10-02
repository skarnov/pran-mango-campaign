<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Admin extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Admin Panel';
        $data['config'] = $config;
        $data['home'] = view('admin/home', $data);
        return view('admin/master', $data);
    }

    public function settings() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Settings';
        $data['config'] = $config;
        $data['home'] = view('admin/settings', $data);
        return view('admin/master', $data);
    }

    public function update_settings(Request $request) {
        $data = array();
        $data['app_name'] = $request->input('app_name');
        $data['copyright_info'] = $request->input('copyright_info');
        DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->update($data);
        return redirect('settings')->with('message', 'Settings Updated!');
    }

    public function manage_admins() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $users = DB::table('users')->get();
        $data = array();
        $data['title'] = 'Admin Management';
        $data['all_users'] = $users;
        $data['config'] = $config;
        $data['home'] = view('admin/manage_admins', $data);
        return view('admin/master', $data);
    }

    public function add_admin() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Add Admin';
        $data['config'] = $config;
        $data['home'] = view('admin/add_admin', $data);
        return view('admin/master', $data);
    }

    public function save_admin(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['created_at'] = new \DateTime();
        DB::table('users')->insert($data);
        return redirect('admin/manage_admins')->with('message', 'Admin Saved!');
    }

    public function edit_admin($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $admin_info = DB::table('users')
                ->where('id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Admin';
        $data['config'] = $config;
        $data['admin_info'] = $admin_info;
        $data['home'] = view('admin/edit_admin', $data);
        return view('admin/master', $data);
    }

    public function update_admin(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['updated_at'] = new \DateTime();
        DB::table('users')
                ->where('id', $request->input('id'))
                ->update($data);
        return redirect('admin/manage_admins')->with('message', 'Admin Updated!');
    }

    public function delete_admin($id) {
        $result = DB::table('users')->where('id', $id)->delete();
        if ($result) {
            return redirect('admin/manage_admins')->with('message', 'Admin Deleted!');
        } else {
            return redirect('admin/manage_admins')->with('message', 'Admin Not Deleted!');
        }
    }

    public function manage_stores() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $stores = DB::table('markers')->get();
        $data = array();
        $data['title'] = 'Admin Management';
        $data['all_stores'] = $stores;
        $data['config'] = $config;
        $data['home'] = view('admin/manage_stores', $data);
        return view('admin/master', $data);
    }

    public function add_store() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $data = array();
        $data['title'] = 'Add Store';
        $data['config'] = $config;
        $data['active'] = 'active';
        $data['home'] = view('admin/add_store', $data);
        return view('admin/master', $data);
    }

    public function save_store(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        $data['country'] = 'BD';
        $data['state'] = $request->input('state');
        $data['state_id'] = $request->input('state_id');
        $data['zipcode'] = 'null';
        $data['latitude'] = $request->input('latitude');
        $data['longtitude'] = $request->input('longtitude');
        $data['status'] = '1';
        $data['sort'] = '0';
        $data['address'] = $request->input('address');
        $data['city'] = $request->input('city');
        DB::table('markers')->insert($data);
        return redirect('admin/manage_stores')->with('message', 'Store Saved!');
    }

    public function edit_store($id) {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $store_info = DB::table('markers')
                ->where('storelocator_id', $id)
                ->first();
        $data = array();
        $data['title'] = 'Edit Store';
        $data['config'] = $config;
        $data['store_info'] = $store_info;
        $data['home'] = view('admin/edit_store', $data);
        return view('admin/master', $data);
    }

    public function update_store(Request $request) {
        $data = array();
        $data['name'] = $request->input('name');
        $data['phone'] = $request->input('phone');
        $data['state'] = $request->input('state');
        $data['state_id'] = $request->input('state_id');
        $data['latitude'] = $request->input('latitude');
        $data['longtitude'] = $request->input('longtitude');
        $data['address'] = $request->input('address');
        $data['city'] = $request->input('city');
        DB::table('markers')
                ->where('storelocator_id', $request->input('id'))
                ->update($data);
        return redirect('admin/manage_stores')->with('message', 'Store Updated!');
    }

    public function delete_store($id) {
        $result = DB::table('markers')->where('storelocator_id', $id)->delete();
        if ($result) {
            return redirect('admin/manage_stores')->with('message', 'Store Deleted!');
        } else {
            return redirect('admin/manage_stores')->with('message', 'Store Not Deleted!');
        }
    }

    public function manage_users() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $users = DB::table('clients')
                ->where('volunteer_status', 'no')
                ->get();
        $data = array();
        $data['title'] = 'User Management';
        $data['all_users'] = $users;
        $data['config'] = $config;
        $data['home'] = view('admin/manage_users', $data);
        return view('admin/master', $data);
    }
    
    public function delete_user($id) {
        $result = DB::table('clients')->where('pk_client_id', $id)->delete();
        if ($result) {
            return redirect('admin/manage_users')->with('message', 'User Deleted!');
        } else {
            return redirect('admin/manage_users')->with('message', 'User Not Deleted!');
        }
    }
    
    public function manage_volunteers() {
        $config = DB::table('tbl_configurations')
                ->where('pk_config_id', 1)
                ->first();
        $users = DB::table('clients')
                ->where('volunteer_status', 'yes')
                ->get();
        $data = array();
        $data['title'] = 'Volunteer Management';
        $data['all_users'] = $users;
        $data['config'] = $config;
        $data['home'] = view('admin/manage_volunteers', $data);
        return view('admin/master', $data);
    }
    
    public function delete_volunteer($id) {
        $result = DB::table('clients')->where('pk_client_id', $id)->delete();
        if ($result) {
            return redirect('admin/manage_volunteers')->with('message', 'User Deleted!');
        } else {
            return redirect('admin/manage_volunteers')->with('message', 'User Not Deleted!');
        }
    }

}
