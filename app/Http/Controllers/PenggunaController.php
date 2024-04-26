<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PenggunaController extends Controller
{

    public function index()
    {
        $users = User::all();
        $penggunas = Pengguna::latest()->paginate(5);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('penggunas.index',compact('penggunas','users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
            
    }
  

    public function create()
    {
        $users = User::all();
        return view('penggunas.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pet' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
      
        Pengguna::create($request->all());
       
        Alert::toast('Data Berhasil Di Tambahkan','success');

        return redirect()->route('penggunas.index');
    }
  

    public function show(Pengguna $pengguna)
    {
        $users = User::all();
        return view('penggunas.show',compact('pengguna','users'));
    }
  

    public function edit(Pengguna $pengguna)
    {
        $users = User::all();
        return view('penggunas.edit',compact('pengguna','users'));
    }
  

    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama_pet' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);
      
        $pengguna->update($request->all());
      
        return redirect()->route('penggunas.index')
          ->with('success','Pengguna updated successfully');
    }

    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
       
            Alert::toast('Data Berhasil Di Hapus','success');

        return redirect()->route('penggunas.index');
    }
}