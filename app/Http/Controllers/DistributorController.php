<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DistributorController extends Controller
{
    public function index()
    {
        $dists = Distributor::latest()->paginate(5);

        return view('distributors.index', compact('dists'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('distributors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Distributor::create($request->all());

        Alert::toast('Distributor Berhasil Di Tambahkan','success');

        return redirect()->route('distributors.index');
    }
    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }

    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_dis' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $distributor->update($request->all());

        Alert::toast('Distributor Berhasil Di Edit','success');

        return redirect()->route('distributors.index');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        Alert::toast('Distributor Berhasil Di Hapus','success');

        return redirect()->route('distributors.index');
    }
}
