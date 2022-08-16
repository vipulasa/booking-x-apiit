<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth\User;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorize('accessAdministration');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (new User())
            ->newQuery()
            ->paginate(10);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.form');
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
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.form', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([

            "name" => "required|max:255",

            "email" => "required|max:255",

            "password" => "nullable",
            "password_confirmation" => "nullable",

            "first_name" => "required|max:255",

            "last_name" => "required|max:255",

            "phone" => "required|max:12",

            "nic" => "required|max:12", // 20123456789v

            "address" => "required",

            "city" => "required",

            "state" => "required",

            "zip" => "required",

            "country" => "required",

            "role" => "required",
        ]);

        dd($request, $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check if the user ID is the ID of the current logged in user and prevent deletion of the current user
        if ($id == auth()->id()) {
            return redirect()->route('users.index')->with('error', 'You cannot delete yourself.');
        }

        (new User())->newQuery()->find($id)->delete();

        return redirect()->route('users.index');
    }
}
