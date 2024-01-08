<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index' ,[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $path = $user->image;

        if ($request->hasFile($path)) {
            $path = $request->file('image')
                ->storeAs('/public/users', $request->file('image')->getClientOriginalName());
        }

        $user->update([
            'username' => $request->get('username'),
            'name' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'role_id' => $request->get('role_id'),
            'image' => $path
        ]);

        Session::flash('success_update_message' , 'User information has updated successfully!');
        return redirect(route('showUsers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role->title == "admin") {
            return redirect(route('showUsers'))->withErrors(['You cannot delete an admin!']);
        }
        else {
            $user->delete();
        }

        Session::flash('success_delete_message' , 'User has deleted successfully!');
        return redirect(route('showUsers'));
    }
}
