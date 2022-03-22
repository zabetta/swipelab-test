<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }
    
    /**
     * Show the form to create a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255',
            'card_number' => 'required|integer',
        ]);

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'card_number' => $request->input('card_number')
         ]);
 
         //Check if book was created
        if ( ! $user)
        {
            abort(500, 'Some Error');
        }
    }

    /**
    * Display the specified resource.
    */
    public function show($id)
    {
        return view('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }  


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|email|max:255',
            'card_number' => 'required|integer',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success','User updated successfully');

    } 

    /**
     * Remove the specified resource from storage.
    */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success','User deleted successfully');
    }


}
