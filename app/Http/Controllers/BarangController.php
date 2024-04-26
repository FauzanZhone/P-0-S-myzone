<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Merek;
use App\Models\Distributor;
use App\Models\Pengguna;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
        $merek = Merek::all();
        $distributor = Distributor::all();
        $pengguna = Pengguna::all();

        return view('barangs.index',compact('barangs','merek','distributor','pengguna'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        $pengguna = Pengguna::all();
        return view('barangs.create', compact('merek','distributor','pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama_bar' => 'required',
            'merek' => 'required',
            'nama_dis' => 'required',
            'harga_bar' => 'required',
            'harga_bel' => 'required',
            'stok' => 'required',
            'nama_pet' => 'required',
        ]);
      
        Barang::create([
            'id' => $request->id,
            'nama_bar' => $request->nama_bar,
            'merek' => $request->merek,
            'nama_dis' => $request->nama_dis,
            'harga_bar' => $request->harga_bar,
            'harga_bel' => $request->harga_bel,
            'stok' => $request->stok,
            'nama_pet' => $request->nama_pet,
            'waktu' => Carbon::today()->toDateString()
        ]);
       
        Alert::toast('Barang Berhasil Di Tambahkan','success');

        return redirect()->route('barangs.index');
    }

    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
        // dd('$barang');
    }

    public function edit(Barang $barang)
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        $pengguna = Pengguna::all();
        return view('barangs.edit',compact('barang','merek','distributor'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            // 'id' => 'required',
            'nama_bar' => 'required',
            'merek' => 'required',
            'nama_dis' => 'required',
            'harga_bar' => 'required',
            'harga_bel' => 'required',
            'stok' => 'required',
            // 'nama_pet' => 'required',
        ]);
      
        $barang->update([
        // 'id' => $request->id,
        'nama_bar' => $request->nama_bar,
        'merek' => $request->merek,
        'nama_dis' => $request->nama_dis,
        'harga_bar' => $request->harga_bar,
        'harga_bel' => $request->harga_bel,
        'stok' => $request->stok,
        'nama_pet' => Auth::user()->name,
        'waktu' => Carbon::now(),
        ]);
      
        return redirect()->route('barangs.index')
                            ->with('success','Barang updated successfully');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
       
        Alert::toast('Barang Berhasil Di Hapus','success');

        return redirect()->route('barangs.index');
    }
    
}
