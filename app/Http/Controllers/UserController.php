<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Book;
use App\Models\Books_Users;

class UserController extends Controller
{
    /**
     * Show the table with list of users
     *
     * @return \Illuminate\View
     */
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
        if (!$user) {
            abort(500, 'Some Error');
        }

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  numnber $id
     * @return \Illuminate\View
     */
    public function show($id)
    {

        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  numnber $id
     * @return \Illuminate\View
     */
    public function edit($id)
    {

        $books = DB::table("books")->select('*')->whereNotIn('id', function ($query) {

            $query->select('book_id')->from('books_users');
        })->get();

        return view('users.edit', [
            'user' => User::findOrFail($id),
            'books' => $books,
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
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    /**
     * end loan.
     */
    public function end_loan($userId, $bookId)
    {
        $loan = Books_Users::where('user_id', $userId)->where('book_id', $bookId)->delete();

        return redirect()->route('users.edit', $userId)
            ->with('success', 'User has ended the loan successfully');
    }

    /**
     * end loan.
     */
    public function new_loan(Request $request)
    {

        $loan =  new Books_Users();
        $loan->user_id = $request->input('user_id');
        $loan->book_id = $request->input('book_id');
        $loan->save();

        return redirect()->route('users.edit', $request->user_id)
            ->with('success', 'User has started the loan successfully');
    }
}
