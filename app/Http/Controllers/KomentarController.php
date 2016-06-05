<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Komentar;
use App\Predstava;
use App\User;
use DB;
use Auth;

class KomentarController extends Controller
{

  public function sviKomentari(){
    $komentari=Komentar::all();
      $tip=Auth::user()->getTip();
    echo'<table class="table">
        <tr>
          <td><strong>Komentar</strong></td>
          <td><strong>Korisnik</strong></td>
          <td><strong>Broj prijava</strong></td>
          <td><strong>Vreme</strong></td>
          <td colspan="3" align="center"><strong>Akcija</strong></td>
        </tr>
    ';
    foreach ($komentari->reverse() as $k ) {

        $kor = DB::table('users')->where('id', $k->IDReg)->first();

        echo '<tr>
        <td>'.$k->Sadrzaj.'</td>
        <td>'.$kor->name.'</td>
        <td>'.$k->Prijava.'</td>
        <td>'.$k->created_at.'</td>
        <td>
        <form  class="form-horizontal" method="POST" action='.url('/komentar/obrisi/').'>
        <input  type="hidden" name="_token" value='.csrf_token().'>
        <input type="hidden" name="IDKom" value='.$k->IDKom.'>
        <input type="hidden" name="tip" value='.$tip.'>
        <button width="150px" class="btn-danger" type="submit">Obrisi</button>
        </form>
        </td>
      </tr>';

    }
    echo'</table>';
  }

  public function obrisi(Request $request)
  {
    DB::table('komentator')->where('IDKom', '=', $request->IDKom)->delete();
    if($request->tip==1){
      return redirect()->intended("/moderator");
    }
    return redirect()->intended("/predstava/{$request->IDPre}");
  }

  public function prijavi(Request $request)
  {
    $idpre = $request->IDPre;
    $idkom = $request->IDKom;



    $komentar = Komentar::find($idkom);
    $komentar->Prijava++;

    $komentar->save();

    return redirect()->intended("/predstava/{$idpre}");
  }

    public function post(Request $request){
      $idkor=$request->IDKor;
      $name=$request->name;
      $idpre=$request->IDPre;
      $sadrzaj=$request->sadrzaj;

    /*  $poz = DB::table('pozoriste')->where('Naziv', $pozoriste)->first();
      $idpoz=$poz->IDPoz; */

      $komentar = new Komentar;

      $komentar->Prijava=0;
      $komentar->Sadrzaj=$sadrzaj;
      $komentar->IDReg=$idkor;
      $komentar->IDPre=$idpre;

      $komentar->save();

      return redirect()->intended("/predstava/{$idpre}");
    }



}