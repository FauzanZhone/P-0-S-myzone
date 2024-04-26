<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerekController extends Controller
{

    public function index()
    {
        $mereks = Merek::latest()->paginate(5);
      
        return view('mereks.index',compact('mereks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  

    public function create()
    {
        return view('mereks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
      
        Merek::create($request->all());
        Alert::toast('Merek Berhasil Di Tambahkan','success');
        return redirect()->route('mereks.index');
    }
  

    public function show(Merek $merek)
    {
        return view('mereks.show',compact('merek'));
    }
  

    public function edit(Merek $merek)
    {
        return view('mereks.edit',compact('merek'));
    }
  

    public function update(Request $request, Merek $merek)
    {
        $request->validate([
            'nama' => 'required',
        ]);
      
        $merek->update($request->all());
        
        Alert::toast('Distributor Berhasil Di Edit','success');

        return redirect()->route('mereks.index');
    }

    public function destroy(Merek $merek)
    {
        $merek->delete();
       
        Alert::toast('Merek Berhasil Di Hapus','success');

        return redirect()->route('mereks.index');
          
    }
}