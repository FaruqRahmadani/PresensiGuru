<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use HCrypt;
use File;

class AdminController extends Controller
{
  public function Data(){
    $User = User::whereTipe(1)->get();
    return view('Admin.Data', compact('User'));
  }

  public function Tambah(){
    return view('Admin.Tambah');
  }

  public function storeTambah(Request $request){
    $User = User::whereUsername($request->username)->get()->count();
    if ($User) {
      return back()->withInput();
    }

    $User = new User;
    $User->fill($request->except('foto'));
    $User->sekolah_id = 0;
    $User->tipe = 1;
    if ($request->foto != null) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = "{$NamaFoto}.{$FotoExt}";
      $request->foto->move(public_path('images/user'), $Foto);
      $User->foto = $Foto;
    }
    $User->save();
    return redirect()->route('adminData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Ditambahkan']);
  }

  public function Edit($Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);
    return view('Admin.Edit', compact('User'));
  }

  public function storeEdit(Request $request, $Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);
    $UserValidate = User::whereUsername($request->username)->get()->count();
    if (($UserValidate) && ($request->username != $User->username)) {
      return back()->withInput();
    }
    if ($request->foto != null) {
      if ($User->foto != 'default.png') {
        File::delete("images/user/{$User->foto}");
      }
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = "{$NamaFoto}.{$FotoExt}";
      $request->foto->move(public_path('images/user'), $Foto);
      $User->foto = $Foto;
    }
    $User->fill($request->except('foto'));
    $User->save();
    return redirect()->route('adminData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Diubah']);
  }

  public function Hapus($Id){
    $Id = HCrypt::Decrypt($Id);
    $User = User::findOrFail($Id);
    if ($User->foto != 'default.png') {
      File::delete("images/user/{$User->foto}");
    }
    $User->delete();
    return redirect()->route('adminData')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => 'Data Berhasil Dihapus']);
  }
}
