<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\StafApotek;
use Illuminate\Http\Request;

class ApotikController extends Controller
{
    // --- FITUR WEB DASHBOARD ---
    public function indexWeb()
    {
        $obat = Obat::all();
        $pelanggan = Pelanggan::all();
        $staf = StafApotek::all();
        return view('dashboard', compact('obat', 'pelanggan', 'staf'));
    }

    public function storeObat(Request $request)
    {
        $request->validate(['kode_obat'=>'required', 'nama_obat'=>'required', 'stock_obat'=>'required|integer', 'tanggal_kadaluarsa'=>'required|date']);
        Obat::create($request->all());
        return redirect()->back()->with('success', 'Data obat berhasil ditambahkan!');
    }

    public function destroyObat($id)
    {
        Obat::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data obat berhasil dihapus!');
    }

    public function storePelanggan(Request $request)
    {
        $request->validate(['nama'=>'required', 'alamat'=>'required', 'no_hp'=>'required']);
        Pelanggan::create($request->all());
        return redirect()->back()->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function destroyPelanggan($id)
    {
        Pelanggan::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data pelanggan berhasil dihapus!');
    }

    public function storeStaf(Request $request)
    {
        $request->validate(['nama'=>'required', 'tempat_lahir'=>'required', 'tanggal_lahir'=>'required|date', 'alamat'=>'required', 'no_hp'=>'required']);
        StafApotek::create($request->all());
        return redirect()->back()->with('success', 'Data staf berhasil ditambahkan!');
    }

    public function destroyStaf($id)
    {
        StafApotek::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data staf berhasil dihapus!');
    }

    // --- REST API LENGKAP (GET, POST, PUT, DELETE) ---
    
    // 1. API OBAT
    public function apiObatIndex() { return response()->json(['success'=>true, 'data'=>Obat::all()]); }
    public function apiObatStore(Request $r) { 
        $o = Obat::create($r->validate(['kode_obat'=>'required', 'nama_obat'=>'required', 'stock_obat'=>'required|integer', 'tanggal_kadaluarsa'=>'required|date']));
        return response()->json(['success'=>true, 'message'=>'Obat Berhasil Disimpan', 'data'=>$o], 201);
    }
    public function apiObatUpdate(Request $r, $id) {
        $o = Obat::findOrFail($id);
        $o->update($r->all());
        return response()->json(['success'=>true, 'message'=>'Obat Berhasil Diperbarui', 'data'=>$o]);
    }
    public function apiObatDestroy($id) {
        Obat::findOrFail($id)->delete();
        return response()->json(['success'=>true, 'message'=>'Obat Berhasil Dihapus']);
    }

    // 2. API PELANGGAN
    public function apiPelangganIndex() { return response()->json(['success'=>true, 'data'=>Pelanggan::all()]); }
    public function apiPelangganStore(Request $r) { 
        $p = Pelanggan::create($r->validate(['nama'=>'required', 'alamat'=>'required', 'no_hp'=>'required']));
        return response()->json(['success'=>true, 'message'=>'Pelanggan Berhasil Disimpan', 'data'=>$p], 201);
    }
    public function apiPelangganUpdate(Request $r, $id) {
        $p = Pelanggan::findOrFail($id);
        $p->update($r->all());
        return response()->json(['success'=>true, 'message'=>'Pelanggan Berhasil Diperbarui', 'data'=>$p]);
    }
    public function apiPelangganDestroy($id) {
        Pelanggan::findOrFail($id)->delete();
        return response()->json(['success'=>true, 'message'=>'Pelanggan Berhasil Dihapus']);
    }

    // 3. API STAF APOTEK
    public function apiStafIndex() { return response()->json(['success'=>true, 'data'=>StafApotek::all()]); }
    public function apiStafStore(Request $r) { 
        $s = StafApotek::create($r->validate(['nama'=>'required', 'tempat_lahir'=>'required', 'tanggal_lahir'=>'required', 'alamat'=>'required', 'no_hp'=>'required']));
        return response()->json(['success'=>true, 'message'=>'Staf Berhasil Disimpan', 'data'=>$s], 201);
    }
    public function apiStafUpdate(Request $r, $id) {
        $s = StafApotek::findOrFail($id);
        $s->update($r->all());
        return response()->json(['success'=>true, 'message'=>'Staf Berhasil Diperbarui', 'data'=>$s]);
    }
    public function apiStafDestroy($id) {
        StafApotek::findOrFail($id)->delete();
        return response()->json(['success'=>true, 'message'=>'Staf Berhasil Dihapus']);
    }
}