<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengguna;
use DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Cart;
use Darryldecode\Cart\Cart as CartCart;

class TransaksiController extends Controller
{
    public function index()
    {
        $pengguna = Pengguna::all();
        $barang = Barang::all();
        $transaksis = Transaksi::latest()->paginate(5);
        return view('transaksis.index', compact('transaksis','barang'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $barang = Barang::all();
        return view('transaksis.create', compact('barang'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_bar' => 'required',
        //     'harga_bar' => 'required',
        //     'total_bar' => 'required',
        //     'total_bay' => 'required',
        //     'tanggal_bel' => 'required',
        // ]);

        $find_barang = barang::where('nama_bar', $request->nama_bar)->first();
        $total_har = $request->total_bar * $find_barang->harga_bar;
        if ($request->total_bar <= $find_barang->stok) {
            if ($request->total_bay < $total_har) {
                return redirect()
                    ->back()
                    ->with('error', 'Uang tidak cukup!');
            } else {
                Transaksi::create([
                    'nama_bar' => $request->nama_bar,
                    'harga_bar' => $find_barang->harga_bar,
                    'total_bar' => $request->total_bar,
                    'total_har' => $request->total_bar * $find_barang->harga_bar,
                    'total_bay' => $request->total_bay,
                    'kembalian' => $request->total_bay - $request->total_bar * $find_barang->harga_bar,
                    'tanggal_bel' => Carbon::today()->toDateString()
                ]);
                DB::table('barangs')
                    ->where('nama_bar', $find_barang->nama_bar)
                    ->update(['stok' => $find_barang->stok - $request->total_bar]);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'stok tidak memadai!');
        }

        // transaksi::create($request->all());

        Alert::toast('Transaksi Berhasil Di Tambahkan','success');

        return redirect()->route('transaksis.index');
    }

    public function show(transaksi $transaksi)
    {
        return view('transaksis.show', compact('transaksi'));
    }

    public function edit(transaksi $transaksi)
    {
        $barang = Barang::all();
        return view('transaksis.edit', compact('barang'));
    }

    public function update(Request $request, transaksi $transaksi)
    {
        // $request->validate([
        //     'nama_bar' => 'required',
        //     'harga_bar' => 'required',
        //     'total_bar' => 'required',
        //     'total_bay' => 'required',
        //     'tanggal_bel' => 'required',
        // ]);

        $find_barang = barang::where('nama_bar', $request->nama_bar)->first();
        $total_har = $request->total_bar * $find_barang->harga_bar;
        if ($request->total_bar <= $find_barang->stok) {
            if ($request->total_bay < $request->total_bar * $find_barang->harga_bar) {
                return redirect()
                    ->back()
                    ->with('error', 'Uang tidak cukup!');
                    
                    // dd($request->total_bay, $request->total_bar, $find_barang->harga_bar, $find_barang->stok);

            } else {
                Transaksi::create([
                    'nama_bar' => $request->nama_bar,
                    'harga_bar' => $find_barang->harga_bar,
                    'total_bar' => $request->total_bar,
                    'total_har' => $request->total_bar * $find_barang->harga_bar,
                    'total_bay' => $request->total_bay,
                    'kembalian' => $request->total_bay - $request->total_bar * $find_barang->harga_bar,
                    'tanggal_bel' => Carbon::now(),
                ]);
                DB::table('barangs')
                    ->where('nama_bar', $find_barang->nama_bar)
                    ->update(['stok' => $find_barang->stok - $request->total_bar]);
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'Stok Tidak Memadai!');
        }
        $pengguna->update($request->all());

        return redirect()
            ->route('transaksis.index')
            ->with('Success', 'Transaksi updated successfully');
    }

    public function destroy(transaksi $transaksi)
    {
        $transaksi->delete();

        Alert::toast('Data Transaksi Berhasil Di Hapus','success');

        return redirect()->route('transaksis.index');
    }


    public function cart()
    {
        $barangs = Barang::all();
        $cartItems = Cart::getContent();

        return view('carts.index', compact('barangs', 'cartItems'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addToCart(Request $request)
    {
        $stok = Barang::select('stok')
            ->where('nama_bar', $request->name)
            ->first();
            ($stok);
        if ($stok->stok < 1) {
            Alert::toast('Stok Tidak Memadai!', 'error');
            return redirect()->back();
        }
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        Alert::toast('Barang Berhasil Dimasukkan ke Keranjang!', 'success');
        return redirect()->route('cart.items');
    }
    
    
    public function updateCart(Request $request)
    {
        $stok = Barang::select('stok')
            ->where('id', $request->id)
            ->first();
            
        // dd($stok);
        if(!$stok || is_null($stok->stok)){
            Alert::toast('Maaf Barang Sudah Habis', 'error');
            return redirect()->back();
        };

        if ($stok->stok < $request->quantity) {
            Alert::toast('Stok Tidak Memadai!', 'error');
            return redirect()->back();
        } else {
            Cart::update($request->id, [
                'quantity' => [
                'relative' => false,
                'value' => $request->quantity,
                ],
            ]);

            Alert::toast('Jumlah Barang Berhasil Di Ubah!', 'success');
            return redirect()->route('cart.items');
        }
    }

    public function updateAllCart(Request $request)
    {
        foreach ($request->id as $id) {
            $stok = Barang::select('stok')
                ->where('id', $id)
                ->get();
            if ($stok->stok < $request->quantity) {
                Alert::toast('Stok Tidak Memadai!', 'error');
                return redirect()->back();
            } else {
                Cart::update($id, [
                    'quantity' => [
                        'relative' => false,
                        'value' => $request->quantity,
                    ],
                ]);
            }
        }

        Alert::toast('Jumlah Barang Berhasil Di Ubah!', 'success');
        return redirect()->route('cart.items');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);

        Alert::toast('Barang Berhasil Di Hapus!', 'success');

        return redirect()->route('cart.items');
    }

    public function clearAllCart()
    {
        Cart::clear();

        Alert::toast('Keranjang Berhasil Dikosongkan!', 'success');

        return redirect()->route('cart.items');
    }

    public function payCart(Request $request)
    {
        $cartItems = Cart::getContent();
        
        $request->validate([
            'total_bay' => 'required',
        ]);
        
        if (Cart::getTotal() > $request->total_bay) {
            Alert::toast('Saldo Kurang!', 'error');
            return redirect()->back();
         }
        
        
        foreach ($cartItems as $item) {
            $stok = Barang::select('stok')
            ->where('nama_bar', '=', $item->name)
                ->first();

            if(!$stok || is_null($stok->stok)){
                Alert::toast('Maaf Barang Sudah Habis', 'error');
                return redirect()->back();
            };

            if ($stok->stok < $item->quantity) {
                Alert::toast('Stok Tidak Memadai!', 'error');
                return redirect()->back();
            }
            
        }

        $kembalian = $request->total_bay - Cart::getTotal();

        // $desc = new TransaksiDescription();
        // $desc->total_bar = Cart::getTotalQuantity();
        // $desc->total_har = Cart::getTotal();
        // $desc->total_bay = $request->total_bay;
        // $desc->kembalian = $kembalian;
        // $desc->tgl_beli = date('Y-m-d');
        // // $desc->petugas = auth()->user()->name;
        // $desc->save();

        foreach ($cartItems as $item) {
            Transaksi::create([
                // 'id' => $desc->id,
                'nama_bar' => $item->name,
                'harga_bar' => $item->price,
                'total_bar' => $item->quantity,
                'total_bay' => $request->total_bay,
                'total_har' => $item->price * $item->quantity,
                'kembalian' => $request->total_bay - ($item->price * $item->quantity) ,
                'tanggal_bel' => date('Y-m-d'),
                // 'petugas' => auth()->user()->name,
            ]);
        }

        foreach ($cartItems as $item) {
            Barang::where('nama_bar', $item->name)->decrement('stok', $item->quantity);
        }

        Cart::clear();

        Alert::toast('Transaksi Sukses!', 'success');

        return redirect()->route('cart.items');
    }

    public function getHarga(Request $request)
    {
        $hargas['nama_bar'] = Barang::where('nama_bar', $request->nama_bar)->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
    public function search(Request $request)
    {
    $query = $request->input('query');
    $transaksis = Transaksi::where('nama_bar', 'LIKE', "%$query%")->paginate(10);

    return view('transaksis.index', compact('transaksis', 'query'));
    }

}
