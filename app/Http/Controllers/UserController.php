<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

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
        return view('admin.users.form', [
            'user' => new User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        } else {
            $request->offsetUnset('password');
        }

        // get the validated data
        $validated = $request->validated();

        if($request->file('avatar')){
            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }

        $user = (new User())->create($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User ' . $user->first_name . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
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
    public function update(UpdateUserRequest $request, User $user)
    {

        if ($request->get('password')) {
            $request->offsetSet('password', bcrypt($request->password));
        } else {
            $request->offsetUnset('password');
        }

        // get the validated data
        $validated = $request->all();

        if($request->file('avatar')){
            // check if the file exists in the directory and delete it
            if($user->avatar){
                Storage::delete($user->avatar);
            }


            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }

        // Update user
        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully');
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
            return redirect()
                ->route('users.index')
                ->with('error', 'You cannot delete yourself.');
        }

        (new User())->newQuery()->find($id)->delete();

        return redirect()->route('users.index');
    }
}
