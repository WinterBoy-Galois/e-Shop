<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Role;
use Gate;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manage-users')) {
            return redirect(route('admin.users.index'));
        }
        $users = User::all();
        return view('Admin.index')->with(['users'=>$users]);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('manage-users')) {
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all();
        return view('Admin.edit')->with([
            'roles'=>$roles,
            'user'=>$user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Gate::denies('manage-users')) {
            return redirect(route('admin.users.index'));
        }
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Gate::denies('manage-users')) {
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
