<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Projekcije;
use App\Predstava;
use App\Sala;
use DB;

class ProjekcijaController extends Controller
{
  public function repertoar(){

    $gl=Projekcije::all();
    echo'<table class="table">
        <tr>
          <td><strong>Datum</strong></td>
          <td><strong>Vreme</strong></td>
          <td><strong>Cena</strong></td>
          <td><strong>Predstava</strong></td>
          <td><strong>Sala</strong></td>
          <td colspan="3" align="center"><strong>Akcija</strong></td>
        </tr>
    ';
    foreach ($gl as $g ) {

        //$poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();
        $pre = DB::table('predstava')->where('IDPre', $g->IDPre)->first();
        $sala = DB::table('sala')->where('IDSala', $g->IDSal)->first();
        echo '<tr>
        <td>'.$g->Datum.'</td>
        <td>'.$g->Vreme.'</td>
        <td>'.$g->Cena.'</td>
        <td>'.$pre->Naziv.'</td>
        <td>'.$sala->Naziv.'</td>
        <td><a href="" onClick="return editPro('.$g->IDPro.')">Izmeni</a></td>
        <td><a href="" onClick="return dodajPro()">Dodaj</a></td>
        <td><a href="projekcije/destroy/'.$g->IDPro.'">Obrisi</a></td>
      </tr>';

    }
    echo'</table>';
  }

  public function destroy($id)
  {
    DB::table('projekcija')->where('IDPro', '=', $id)->delete();
    return redirect()->intended('/admin');
  }

  public function formaZaUnos($b=8){
    $pre = Predstava::all();
    $sal = Sala::all();

    echo '<form class="form-horizontal"  method="POST" action='.url('repertoar/create').'>
          <input type="hidden" name="_token" value='.csrf_token().'>
          <label class="control-label">Datum:</label><input type="text" name="datum" class="form-control" value="gggg-mm-dd"></br>
          <label class="control-label">Vreme:</label><input type="text" name="vreme" class="form-control"value="hh:mm"></br>
          <label class="control-label">Cena:</label><input type="text" name="cena" class="form-control"></br>

          <label class="control-label">Predstava:</label>
          <select  name="predstava" width="150px" class="form-control">';
             foreach($pre as $p)
                echo '<option>'.$p->Naziv.'</option>';
    echo '
          </select>
          </br>

          <label class="control-label">Sala:</label>
          <select  name="sala" width="150px" class="form-control">';
             foreach($sal as $s)
                echo '<option>'.$s->Naziv.'</option>';
    echo '
          </select>
          </br>

          <button width="150px" class="btn btn-default" type="submit">Unesi</button>
          </form>';
  }

  public function create(Request $request)
  {
        $datum=$request->datum;
        $vreme=$request->vreme;
        $cena=$request->cena;
        $nazivPre=$request->predstava;
        $nazivSal=$request->sala;

        $pre = DB::table('predstava')->where('Naziv', $nazivPre)->first();
        $idpre=$pre->IDPre;

        $sal = DB::table('sala')->where('Naziv', $nazivSal)->first();
        $idsal=$sal->IDSala;

        $pro = new Projekcije;

        $pro->Datum = $datum;
        $pro->Vreme = $vreme;
        $pro->Cena = $cena;
        $pro->IDPre = $idpre;
        $pro->IDSal = $idsal;

        $pro->save();

        return redirect()->intended('/admin');
  }

  public function formaZaIzmene($id){

    $pro = DB::table('projekcija')->where('IDPro', $id)->first();
    $pre = DB::table('predstava')->where('IDPre', $pro->IDPre)->first();
    $sal = DB::table('sala')->where('IDSala', $pro->IDSal)->first();

    $predstave = Predstava::all();
    $sale = Sala::all();
    echo '
        <table class="table">
          <tr>
            <td>Datum:</td>
            <td>'.$pro->Datum.'</td>
          </tr>
          <tr>
            <td>Pozoriste:</td>
            <td>'.$pro->Vreme.'</td>
          </tr>
          <tr>
            <td>Detaljnije:</td>
            <td>'.$pro->Cena.'</td>
          </tr>
          <tr>
            <td>Predstava:</td>
            <td>'.$pre->Naziv.'</td>
          </tr>
          <tr>
            <td>Sala:</td>
            <td>'.$sal->Naziv.'</td>
          </tr>
        </table>
    ';
    echo '<form  class="form-horizontal" method="POST" action='.url('/repertoar/edit').'>
          <input  type="hidden" name="_token" value='.csrf_token().'>
          <input type="hidden" name="IDPro" value='.$id.'>
          <label class="control-label">Datum:</label><input type="text" name="datum" class="form-control" value="gggg-mm-dd"></br>
          <label class="control-label">Vreme:</label><input type="text" name="vreme" class="form-control"value="hh:mm"></br>
          <label class="control-label">Cena:</label><input type="text" name="cena" class="form-control"></br>

          <label class="control-label">Predstava:</label>
          <select  name="predstava" width="150px" class="form-control">';
             foreach($predstave as $p)
                echo '<option>'.$p->Naziv.'</option>';
    echo '
          </select>
          </br>

          <label class="control-label">Sala:</label>
          <select  name="sala" width="150px" class="form-control">';
             foreach($sale as $s)
                echo '<option>'.$s->Naziv.'</option>';
    echo '
          </select>
          </br>
          <button width="150px" class="btn btn-default" type="submit">Promeni</button>
          </form>
          ';

  }

  public function edit(Request $request)
  {
    $datum=$request->datum;
    $vreme=$request->vreme;
    $cena=$request->cena;
    $nazivPre=$request->predstava;
    $nazivSal=$request->sala;

    $pre = DB::table('predstava')->where('Naziv', $nazivPre)->first();
    $idpre=$pre->IDPre;

    $sal = DB::table('sala')->where('Naziv', $nazivSal)->first();
    $idsal=$sal->IDSala;

    $pro = Projekcije::find($request->IDPro);

    $pro->Datum = $datum;
    $pro->Vreme = $vreme;
    $pro->Cena = $cena;
    $pro->IDPre = $idpre;
    $pro->IDSal = $idsal;

    $pro->save();

    return redirect()->intended('/admin');

  }


  public function SvePrikaz(){
    return view('repertoar');
  }



}
