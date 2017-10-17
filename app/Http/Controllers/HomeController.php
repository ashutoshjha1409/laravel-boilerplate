<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;
use App\Permission;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    public function attachUserRole(Request $request, $user_id) {
        $params = $request->only('role');
        
        $user = User::find($user_id);
        $role = Role::where("name", $params['role'])->first();

        $user->roles()->attach($role);
        return $user;
    }

    public function getUserRole($user_id)
    {
        return User::find($user_id)->roles;
    }

    public function attachPermission(Request $request)
    {
        $params = $request->only('role', 'permission');

        $roleParam = $params['role'];
        $permissionParam = $params['permission'];

        $role = Role::where('name', $roleParam)->first();
        $permission = Permission::where('name', $permissionParam)->first();

        $role->attachPermission($permission);

        return $this->response->created();
    }

    public function getPermissions($roleParam)
    {
        $role = Role::where('name', $roleParam)->first();

        return $this->response->array($role->perms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
