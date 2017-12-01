<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Crypt;
use File;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Jenjang;
use App\Sekolah;
use App\Pegawai;
use App\Status;
use App\User;

class UserController extends Controller
{
  public function Dashboard()
  {
    return view('User.Home');
  }

  public function DataAdmin()
  {
    $User = User::with('Sekolah')
                ->where('tipe', 1)
                ->get();

    return view('User.DataAdmin', ['User' => $User]);
  }

  public function TambahAdmin()
  {
    return view('User.TambahAdmin');
  }

  public function storeTambahAdmin(Request $request)
  {
    $User = new User;

    $User = User::where('username', $request->Username)
                ->get();
    if (count($User) > 0) {
      return back()->withInput();
    }

    $User = new User;

    $User->nama       = $request->Nama;
    $User->email      = $request->Email;
    $User->username   = $request->Username;
    $User->Password   = bcrypt($request->Password);
    $User->sekolah_id = 0;
    $User->tipe = 1;

    // Jika Ada Inputan foto
    if ($request->foto != null) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = $NamaFoto.'.'.$FotoExt;
      $request->Foto->move(public_path('Public-User/img/user'), $Foto);
      $User->foto = $Foto;
    }

    $User->save();

    return redirect('/data-admin')->with('success', 'Data Admin '.$request->Nama.' Berhasil di Tambahkan');
  }

  public function EditAdmin($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $User = User::find($idz);

    return view('User.EditAdmin', ['User' => $User]);
  }

  public function storeEditAdmin(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }
    $User = User::find($idz);

    // Validasi Username
    $UserValidate = User::where('username', $request->Username)
                        ->get();
    if ((count($UserValidate) > 0) && ($request->Username != $User->username)) {
      return back()->withInput();
    }

    // Foto
    if ($request->Foto != null) {
      if ($User->foto != 'default.png') {
        File::delete('Public-User/img/user/'.$User->foto);
      }
      $FotoExt  = $request->Foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = $NamaFoto.'.'.$FotoExt;
      $request->Foto->move(public_path('Public-User/img/user'), $Foto);
      $User->foto = $Foto;
    }

    $User->nama     = $request->Nama;
    $User->email    = $request->Email;
    $User->username = $request->Username;

    $User->save();

    return redirect('/data-admin')->with('success', 'Data Admin '.$request->Nama.' Berhasil di Ubah');
  }

  public function HapusAdmin($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }
    $User = User::find($idz);

    $NamaUser = $User->nama;

    $User->delete();

    return redirect('/data-admin')->with('success', 'Data Admin '.$NamaUser.' Berhasil di Hapus');
  }

  public function DataKelurahan()
  {
    $Kelurahan = Kelurahan::with('Sekolah')
                          ->get();

    return view('User.DataKelurahan', ['Kelurahan' => $Kelurahan]);
  }

  public function TambahKelurahan()
  {
    return view('User.TambahKelurahan');
  }

  public function storeTambahKelurahan(Request $request)
  {
    $Kelurahan = new Kelurahan;

    $Kelurahan->nama_kelurahan = $request->NamaKelurahan;

    $Kelurahan->save();

    return redirect('/data-kelurahan')->with('success', 'Data Kelurahan '.$request->NamaKelurahan.' Berhasil di Tambahkan');
  }

  public function EditKelurahan($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Kelurahan = Kelurahan::find($idz);

    return view('User.EditKelurahan', ['Kelurahan' => $Kelurahan]);
  }

  public function storeEditKelurahan(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Kelurahan = Kelurahan::find($idz);

    $Kelurahan->nama_kelurahan = $request->NamaKelurahan;

    $Kelurahan->save();

    return redirect('/data-kelurahan')->with('success', 'Data Kelurahan '.$request->NamaKelurahan.' Berhasil di Ubah');
  }

  public function HapusKelurahan($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Kelurahan = Kelurahan::find($idz);

    $NamaKelurahan = $Kelurahan->nama_kelurahan;

    $Kelurahan->delete();

    return redirect('/data-kelurahan')->with('success', 'Data Kelurahan '.$NamaKelurahan.' Berhasil di Hapus');
  }

  public function DataJenjang()
  {
    $Jenjang = Jenjang::with('Sekolah')
                      ->get();

    return view('User.DataJenjang', ['Jenjang' => $Jenjang]);
  }

  public function TambahJenjang()
  {
    return view('User.TambahJenjang');
  }

  public function storeTambahJenjang(Request $request)
  {
    $Jenjang = new Jenjang;

    $Jenjang->nama_jenjang = $request->NamaJenjang;

    $Jenjang->save();

    return redirect('/data-jenjang')->with('success', 'Data Jenjang '.$request->NamaJenjang.' Berhasil di Tambahkan');
  }

  public function EditJenjang($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Jenjang = Jenjang::find($idz);

    return view('User.EditJenjang', ['Jenjang' => $Jenjang]);
  }

  public function storeEditJenjang(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Jenjang = Jenjang::find($idz);

    $Jenjang->nama_jenjang = $request->NamaJenjang;

    $Jenjang->save();

    return redirect('/data-jenjang')->with('success', 'Data Jenjang '.$request->NamaJenjang.' Berhasil di Ubah');
  }

  public function HapusJenjang($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Jenjang = Jenjang::find($idz);

    $NamaJenjang = $Jenjang->nama_jenjang;

    $Jenjang->delete();

    return redirect('/data-jenjang')->with('success', 'Data Jenjang '.$NamaJenjang.' Berhasil di Hapus');
  }

  public function DataStatusSekolah()
  {
    $Status = Status::with('sekolah')
                    ->get();

    return view('User.DataStatus', ['Status' => $Status]);
  }

  public function TambahStatusSekolah()
  {
    return view('User.TambahStatus');
  }

  public function storeTambahStatusSekolah(Request $request)
  {
    $Status = new Status;

    $Status->nama_status = $request->NamaStatus;

    $Status->save();

    return redirect('/data-status-sekolah')->with('success', 'Data Jenjang '.$request->NamaStatus.' Berhasil di Tambahkan');
  }

  public function EditStatusSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Status = Status::find($idz);

    return view('User.EditStatus', ['Status' => $Status]);
  }

  public function storeEditStatusSekolah(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Status = Status::find($idz);

    $Status->nama_status = $request->NamaStatus;

    $Status->save();

    return redirect('/data-status-sekolah')->with('success', 'Data Jenjang '.$request->NamaStatus.' Berhasil di Ubah');
  }

  public function HapusStatusSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Status = Status::find($idz);

    $NamaStatus = $Status->nama_status;

    $Status->delete();

    return redirect('/data-status-sekolah')->with('success', 'Data Jenjang '.$NamaStatus.' Berhasil di Hapus');
  }

  public function DataAdminSekolah()
  {
    $User = User::with('Sekolah')
                ->whereIn('tipe', [0,2])
                ->get();

    return view('User.DataAdminSekolah', ['User' => $User]);
  }

  public function TambahAdminSekolah()
  {
    $Sekolah = Sekolah::all();

    return view('User.TambahAdminSekolah', ['Sekolah' => $Sekolah]);
  }

  public function storeTambahAdminSekolah(Request $request)
  {
    // Validasi Username
    $User = User::where('username', $request->Username)
                ->get();
    if (count($User) > 0) {
      return back()->withInput();
    }

    $User = new User;

    $User->nama     = $request->Nama;
    $User->email    = $request->Email;
    $User->username = $request->Username;
    $User->Password = bcrypt($request->Password);

    // Jika Ada Inputan foto
    if ($request->foto != null) {
      $FotoExt  = $request->foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = $NamaFoto.'.'.$FotoExt;
      $request->Foto->move(public_path('Public-User/img/user'), $Foto);
      $User->foto = $Foto;
    }

    // Jika Asal Sekolah Buat Baru
    if ($request->idSekolah == '0') {
      $Sekolah = new Sekolah;
      $Sekolah->save();

      $Sekolah = Sekolah::all()
                        ->last();

      $User->sekolah_id = $Sekolah->id;
    }else {
      $User->sekolah_id = $request->idSekolah;
    }

    $User->tipe = 2;
    $User->save();

    return redirect('/data-admin-sekolah')->with('success', 'Data Admin Sekolah '.$request->Nama.' Berhasil di Tambahkan');
  }

  public function EditAdminSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $User = User::find($idz);

    $Sekolah = Sekolah::all();

    return view('User.EditAdminSekolah', ['User' => $User, 'Sekolah' => $Sekolah]);
  }

  public function storeEditAdminSekolah(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }
    $User = User::find($idz);

    // Validasi Username
    $UserValidate = User::where('username', $request->Username)
                        ->get();
    if ((count($UserValidate) > 0) && ($request->Username != $User->username)) {
      return back()->withInput();
    }

    // Foto
    if ($request->Foto != null) {
      if ($User->foto != 'default.png') {
        File::delete('Public-User/img/user/'.$User->foto);
      }
      $FotoExt  = $request->Foto->getClientOriginalExtension();
      $NamaFoto = Carbon::now()->format('dmYHis');
      $Foto = $NamaFoto.'.'.$FotoExt;
      $request->Foto->move(public_path('Public-User/img/user'), $Foto);
      $User->foto = $Foto;
    }

    $User->nama     = $request->Nama;
    $User->email    = $request->Email;
    $User->username = $request->Username;
    $User->tipe     = $request->Tipe;
    $User->sekolah_id = $request->idSekolah;

    $User->save();

    return redirect('/data-admin-sekolah')->with('success', 'Data Admin Sekolah '.$request->Nama.' Berhasil di Ubah');
  }

  public function DataSekolah()
  {
    $Sekolah = Sekolah::with('User', 'Jenjang', 'Status', 'Kelurahan', 'Pegawai')
                      ->get();

    return view('User.DataSekolah', ['Sekolah' => $Sekolah]);
  }

  public function TambahSekolah()
  {
    $Jenjang    = Jenjang::where('id', '>', '0')
                         ->get();
    $Status     = Status::where('id', '>', '0')
                        ->get();
    $Kelurahan  = Kelurahan::where('id', '>', '0')
                           ->get();

    return view('User.TambahSekolah', ['Jenjang' => $Jenjang, 'Status' => $Status, 'Kelurahan' => $Kelurahan]);
  }

  public function storeTambahSekolah(Request $request)
  {
    $Sekolah = new Sekolah;

    $Sekolah->npsn          = $request->NPSN;
    $Sekolah->nss           = $request->NSS;
    $Sekolah->nama_sekolah  = $request->NamaSekolah;
    $Sekolah->jenjang_id    = $request->idJenjang;
    $Sekolah->status_id     = $request->idStatus;
    $Sekolah->kelurahan_id  = $request->idKelurahan;
    $Sekolah->no_telepon    = $request->NomorTelepon;
    $Sekolah->email         = $request->Email;
    $Sekolah->pegawai_id    = 0;

    $Sekolah->save();

    return redirect('/data-sekolah')->with('success', 'Data Sekolah '.$request->NamaSekolah.' Berhasil di Tambahkan');
  }

  public function EditSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Sekolah = Sekolah::find($idz);

    $Jenjang    = Jenjang::where('id', '>', '0')
                         ->get();
    $Status     = Status::where('id', '>', '0')
                        ->get();
    $Kelurahan  = Kelurahan::where('id', '>', '0')
                           ->get();

    return view('User.EditSekolah', ['Sekolah' => $Sekolah, 'Jenjang' => $Jenjang, 'Status' => $Status, 'Kelurahan' => $Kelurahan]);
  }

  public function storeEditSekolah(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Sekolah = Sekolah::find($idz);

    $Sekolah->npsn          = $request->NPSN;
    $Sekolah->nss           = $request->NSS;
    $Sekolah->nama_sekolah  = $request->NamaSekolah;
    $Sekolah->jenjang_id    = $request->idJenjang;
    $Sekolah->status_id     = $request->idStatus;
    $Sekolah->kelurahan_id  = $request->idKelurahan;
    $Sekolah->no_telepon    = $request->NomorTelepon;
    $Sekolah->email         = $request->Email;

    $Sekolah->save();

    return redirect('/data-sekolah')->with('success', 'Data Sekolah '.$request->NamaSekolah.' Berhasil di Ubah');
  }

  public function InfoSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Sekolah = Sekolah::with('Jenjang', 'Status', 'Kelurahan', 'Pegawai', 'AllPegawai')
                      ->where('id', $idz)
                      ->first();

    return view('User.InfoSekolah', ['Sekolah' => $Sekolah]);
  }

  public function DataPegawai()
  {
    $Pegawai = Pegawai::where('id', '>', 0)
                      ->get();

    return view('User.DataPegawai', ['Pegawai' => $Pegawai]);
  }

  public function TambahPegawai()
  {
    $Sekolah = Sekolah::all();

    return view('User.TambahPegawai', ['Sekolah' => $Sekolah]);
  }

  public function storeTambahPegawai(Request $request)
  {
    $Pegawai = new Pegawai;

    $Pegawai->nip           = $request->NIP;
    $Pegawai->nama          = $request->NamaPegawai;
    $Pegawai->nuptk         = $request->NUPTK;
    $Pegawai->sekolah_id    = $request->idSekolah;
    $Pegawai->tempat_lahir  = $request->TempatLahir;
    $Pegawai->tanggal_lahir = $request->TanggalLahir;
    $Pegawai->jenis_kelamin = $request->JenisKelamin;
    $Pegawai->no_handphone  = $request->NomorTelepon;
    $Pegawai->email         = $request->Email;
    $Pegawai->alamat        = $request->Alamat;
    $Pegawai->sidikjari_id  = $request->idSidikJari;

    $Pegawai->save();

    return redirect('/data-pegawai')->with('success', 'Data Pegawai '.$request->NamaPegawai.' Berhasil di Tambah');
  }

  public function EditPegawai($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Sekolah = Sekolah::all();
    $Pegawai = Pegawai::find($idz);
    //
    return view('User.EditPegawai', ['Pegawai' => $Pegawai, 'Sekolah' => $Sekolah]);
  }

  public function storeEditPegawai(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Pegawai = Pegawai::find($idz);

    $Pegawai->nip           = $request->NIP;
    $Pegawai->nama          = $request->NamaPegawai;
    $Pegawai->nuptk         = $request->NUPTK;
    $Pegawai->sekolah_id    = $request->idSekolah;
    $Pegawai->tempat_lahir  = $request->TempatLahir;
    $Pegawai->tanggal_lahir = $request->TanggalLahir;
    $Pegawai->jenis_kelamin = $request->JenisKelamin;
    $Pegawai->no_handphone  = $request->NomorTelepon;
    $Pegawai->email         = $request->Email;
    $Pegawai->alamat        = $request->Alamat;
    $Pegawai->sidikjari_id  = $request->idSidikJari;

    $Pegawai->save();

    return redirect('/data-pegawai')->with('success', 'Data Pegawai '.$request->NamaPegawai.' Berhasil di Ubah');
  }

  public function InfoPegawai($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Pegawai = Pegawai::find($idz);

    return view('User.InfoPegawai', ['Pegawai' => $Pegawai]);
  }

  public function SekolahSaya()
  {
    $Sekolah = Sekolah::with('Jenjang', 'Status', 'Kelurahan')
                      ->where('id', Auth::user()->sekolah_id)
                      ->first();

    return view('User.SekolahSaya', ['Sekolah' => $Sekolah]);
  }

  public function EditSekolahSaya()
  {
    $Sekolah = Sekolah::with('Jenjang', 'Status', 'Kelurahan')
                      ->where('id', Auth::user()->sekolah_id)
                      ->first();

    $Pegawai    = Pegawai::where('sekolah_id', $Sekolah->id)
                         ->get();
    $Jenjang    = Jenjang::all();
    $Status     = Status::all();
    $Kelurahan  = Kelurahan::all();

    return view('User.EditSekolahSaya', ['Sekolah' => $Sekolah, 'Pegawai' => $Pegawai, 'Jenjang' => $Jenjang, 'Status' => $Status, 'Kelurahan' => $Kelurahan]);
  }

  public function storeEditSekolahSaya(Request $request)
  {
    $Sekolah = Sekolah::where('id', Auth::user()->sekolah_id)
                      ->first();

    $Sekolah->npsn         = $request->NPSN;
    $Sekolah->nss          = $request->NSS;
    $Sekolah->nama_sekolah = $request->NamaSekolah;
    $Sekolah->jenjang_id   = $request->idJenjang;
    $Sekolah->status_id    = $request->idStatus;
    $Sekolah->kelurahan_id = $request->idKelurahan;
    $Sekolah->pegawai_id   = $request->idKepSek;
    $Sekolah->no_telepon   = $request->NomorTelepon;
    $Sekolah->email        = $request->Email;

    $Sekolah->save();

    return redirect('/sekolah-saya')->with('success', 'Data Sekolah '.$request->NamaSekolah.' Berhasil di Ubah');
  }

  public function DataPegawaiSekolah()
  {
    $Sekolah = Sekolah::where('id', Auth::user()->sekolah_id)
                      ->first();

    $Pegawai = Pegawai::where('sekolah_id', $Sekolah->id)
                      ->get();

    return view('User.DataPegawaiSekolah', ['Pegawai' => $Pegawai, 'Sekolah' => $Sekolah]);
  }

  public function TambahPegawaiSekolah()
  {
    return view('User.TambahPegawaiSekolah');
  }

  public function storeTambahPegawaiSekolah(Request $request)
  {
    $Sekolah = Sekolah::where('id', Auth::user()->sekolah_id)
                      ->first();
    $Pegawai = new Pegawai;

    $Pegawai->nip           = $request->NIP;
    $Pegawai->nama          = $request->NamaPegawai;
    $Pegawai->nuptk         = $request->NUPTK;
    $Pegawai->tempat_lahir  = $request->TempatLahir;
    $Pegawai->tanggal_lahir = $request->TanggalLahir;
    $Pegawai->jenis_kelamin = $request->JenisKelamin;
    $Pegawai->no_handphone  = $request->NomorTelepon;
    $Pegawai->email         = $request->Email;
    $Pegawai->alamat        = $request->Alamat;
    $Pegawai->sidikjari_id  = $request->idSidikJari;
    $Pegawai->sekolah_id    = $Sekolah->id;

    $Pegawai->save();

    return redirect('/pegawai-sekolah')->with('success', 'Data Pegawai '.$request->NamaPegawai.' Berhasil di Tambah');
  }

  public function EditPegawaiSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Pegawai = Pegawai::find($idz);

    return view('User.EditPegawaiSekolah', ['Pegawai' => $Pegawai]);
  }

  public function storeEditPegawaiSekolah(Request $request, $id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Pegawai = Pegawai::find($idz);

    $Pegawai->nip           = $request->NIP;
    $Pegawai->nama          = $request->NamaPegawai;
    $Pegawai->nuptk         = $request->NUPTK;
    $Pegawai->tempat_lahir  = $request->TempatLahir;
    $Pegawai->tanggal_lahir = $request->TanggalLahir;
    $Pegawai->jenis_kelamin = $request->JenisKelamin;
    $Pegawai->no_handphone  = $request->NomorTelepon;
    $Pegawai->email         = $request->Email;
    $Pegawai->alamat        = $request->Alamat;
    $Pegawai->sidikjari_id  = $request->idSidikJari;

    $Pegawai->save();

    return redirect('/pegawai-sekolah')->with('success', 'Data Pegawai '.$request->NamaPegawai.' Berhasil di Ubah');
  }

  public function InfoPegawaiSekolah($id)
  {
    try {
      $idz = Crypt::decryptString($id);
    } catch (DecryptException $e) {
      return abort('404');
    }

    $Pegawai = Pegawai::find($idz);

    return view('User.InfoPegawaiSekolah', ['Pegawai' => $Pegawai]);
  }
}
