<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenjang;
use HCrypt;

class JenjangController extends Controller
{
  public function Data(){
    $Jenjang = Jenjang::all();
    return view('Jenjang.Data', compact('Jenjang'));
  }

  public function Tambah(){
    return view('Jenjang.Tambah');
  }

  public function storeTambah(Request $request){
    $Jenjang = new Jenjang;
    $Jenjang->fill($request->all());
    $Jenjang->save();
    return redirect()->route('jenjangData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Ditambahkan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Jenjang = Jenjang::findOrFail($Id);
    return view('Jenjang.Edit', compact('Jenjang'));
  }

  public function storeEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Jenjang = Jenjang::findOrFail($Id);
    $Jenjang->fill($request->all());
    $Jenjang->save();
    return redirect()->route('jenjangData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Diubah']);
  }

  public function Hapus($id){
    $Id = HCrypt::Decrypt($Id);
    $Jenjang = Jenjang::findOrFail($Id);
    $Jenjang->delete();
    return redirect()->route('jenjangData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Dihapus']);
  }
}
