<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use HCrypt;

class StatusSekolahController extends Controller
{
  public function Data(){
    $Status = Status::all();
    return view('StatusSekolah.Data', compact('Status'));
  }

  public function Tambah(){
    return view('StatusSekolah.Tambah');
  }

  public function storeTambah(Request $request){
    $Status = new Status;
    $Status->fill($request->all());
    $Status->save();
    return redirect()->route('statusSekolahData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Ditambahkan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $Status = Status::findOrFail($Id);
    return view('StatusSekolah.Edit', compact('Status'));
  }

  public function storeEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $Status = Status::findOrFail($Id);
    $Status->fill($request->all());
    $Status->save();
    return redirect()->route('statusSekolahData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Diubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $Status = Status::findOrFail($Id);
    $Status->delete();
    return redirect()->route('statusSekolahData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Dihapus']);
  }
}
