<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PasswordReset;
use Carbon\Carbon;
use App\User;
use HCrypt;
use Mail;

class LupaPasswordController extends Controller
{
  public function Form(){
    return view('Depan.LupaPassword');
  }

  public function FormSubmit(Request $request){
    $User = User::whereEmail($request->email)->first();
    if (!$User) {
      return redirect()->route('lupaPasswordForm')->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Error', 'pesan' => 'Data Tidak Ditemukan']);
    }
    $Token = (Carbon::now()->format('dmYHisvuU'));
    $PasswordReset = new PasswordReset;
    $PasswordReset->email   = $request->email;
    $PasswordReset->token   = $Token;
    $PasswordReset->user_id = $User->id;
    $PasswordReset->save();
    $Link = Route('lupaPasswordResetForm', ['id' => $User->UUID, 'token' => HCrypt::Encrypt($Token)]);
    Mail::send('Mail.LupaPassword', ['User' => $User, 'Link' => $Link], function($mail) use($User) {
      $mail->from('disdik@banjar.com', 'Aplikasi Presensi');
      $mail->to($User->email, $User->nama);
      $mail->subject('Lupa Password | Aplikasi Presensi');
    });
    return redirect()->route('loginForm')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => "E-Mail Instruksi Lupa Password Telah di Kirimkan ke Alamat {$request->email}"]);
  }

  public function ResetForm($Id, $Token){
    $Id = HCrypt::Decrypt($Id);
    $Token = HCrypt::Decrypt($Token);
    $PasswordReset = PasswordReset::whereToken($Token)->whereUserId($Id)->first();
    if (!$PasswordReset) {
      return abort(404);
    } elseif ((Carbon::parse($PasswordReset->created_at)->diffInMinutes(Carbon::now()) > 30) or (($PasswordReset->status) == 0)) {
      return redirect()->route('loginForm')->with(['alert' => true, 'tipe' => 'error', 'judul' => 'Error', 'pesan' => "Link Ganti Password Kadaluarsa"]);
    }
    $User = User::findOrFail($PasswordReset->user_id);
    return view('Depan.ResetPassword', compact('User', 'Token'));
  }

  public function ResetFormSubmit(Request $request, $Id, $Token){
    $Id = HCrypt::Decrypt($Id);
    $Token = HCrypt::Decrypt($Token);
    $PasswordReset = PasswordReset::whereToken($Token)->whereUserId($Id)->first();
    $PasswordReset->status = 0;
    $PasswordReset->save();
    $User = User::findOrFail($PasswordReset->user_id);
    $User->password = $request->password;;
    $User->save();
    return redirect()->route('loginForm')->with(['alert' => true, 'tipe' => 'success', 'judul' => 'Berhasil', 'pesan' => "Password Anda Berhasil di Ganti"]);
  }
}
