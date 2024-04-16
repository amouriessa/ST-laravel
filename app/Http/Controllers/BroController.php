<?php

namespace App\Http\Controllers;

use App\Models\Bro;
use Illuminate\Http\Request;

class BroController extends Controller
{
    public function index()
    {

    $bros = Bro::where('user_id', auth()->user()->id)
        ->orderBy('is_complete', 'asc')
        ->orderBy('created_at', 'desc')
        ->get();

    //dd($bros);

        return view('bro.index', compact('bros'));
    }

    public function store(Request $request, Bro $bro)
    {


        $request->validate([
                'nama' => 'required|max:255',
                'jabatan' => 'required|max:255',
                'email' => 'required|max:255',
                'alamat' => 'required|max:255',
            ]);

        $bro = Bro::create([
            'nama' => ucfirst($request->nama),
            'jabatan' => ucfirst($request->jabatan),
            'email' => ucfirst($request->email),
            'alamat' => ucfirst($request->alamat),
            'user_id' => auth()->user()->id,
            ]);
        return redirect()->route('bro.index')->with('success', 'Sukses menambah data!');
    }

    public function create()
    {
        //$this->authorize('create_karyawan', Bro::class);
        return view('bro.create');
    }

    public function edit(Bro $bro)
    {
        if (auth()->user()->id == $bro->user_id) {
            return view('bro.edit', compact('bro'));
        } else {
            return redirect()->route('bro.index')->with('danger', 'Anda tidak diijinkan untuk mengubah data!');
        }
    }

    public function update(Request $request, Bro $bro)
    {
        //$this->authorize('update', $bro);

        $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'email' => 'required|max:255',
            'alamat' => 'required|max:255',
        ]);

        $bro->update([
            'nama' => ucfirst($request->nama),
            'jabatan' => ucfirst($request->jabatan),
            'email' => ucfirst($request->email),
            'alamat' => ucfirst($request->alamat),
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('bro.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Bro $bro){
        //$this->authorize('delete', $bro);

        if(auth()->user()->id == $bro->user_id){
            $bro->delete();
            return redirect()->route('bro.index')->with('success', 'Data berhasil dihapus!');
        }else{
            return redirect()->route('bro.index')->with('danger', 'Anda tidak dapat menghapus data!');
        }
    }
}
