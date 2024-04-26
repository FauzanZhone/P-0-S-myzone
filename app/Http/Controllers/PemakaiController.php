<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PemakaiController extends Controller
{

    public function index()
    {
        $users = User::all();
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users','users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  

    public function create()
    {
        $users = User::all();
        return view('users.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
      
        User::create($request->all());
       
        return redirect()->route('users.index')
          ->with('success','User created successfully.');
    }
  

    public function show(User $user)
    {
        $users = User::all();
        return view('users.show',compact('user','users'));
    }
  

    public function edit(User $user)
    {
        $users = User::all();
        return view('users.edit',compact('user','users'));
    }
  

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama_pet' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);
      
        $user->update($request->all());
      
        return redirect()->route('users.index')
          ->with('success','User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
       
        return redirect()->route('users.index')
        ->with('succes','User deleted successfully');
    }
}