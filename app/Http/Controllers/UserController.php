<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /* public function index()
    {
        //
    } */

    /**
     * Show the form for creating a new resource.
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        //
    } */

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        //
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        Gate::authorize('modify', $user);

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('modify', $user);

        $fields = $request->validate([
            'name' => 'required|min:5|max:20',
            'email' => 'required|max:255|email|unique:users,email,' . $user->id,
        ]);

        $user->update($fields);

        return redirect()->route('user.profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    /* public function destroy(string $id)
    {
        //
    } */
}
