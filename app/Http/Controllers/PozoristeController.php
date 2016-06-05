<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pozoriste;
use DB;

class PozoristeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pozorista=Pozoriste::all();

        return view("pozorista")->with('pozorista', $pozorista);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $naziv=$request->naziv;
      $adresa=$request->adresa;
      $grad=$request->grad;
      $detaljnije=$request->detaljnije;
      $slika=$request->slika;

      $poz = new Pozoriste;

      $poz->Naziv = $naziv;
      $poz->Adresa = $adresa;
      $poz->Grad = $grad;
      $poz->Detaljnije = $detaljnije;
      $poz->Slika = $slika;

      $poz->save();

      return redirect()->intended('/admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pozoriste=Pozoriste::find($id);
        return view("pozorista-detalji")->with('pozoriste', $pozoriste);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $idpoz = $request->IDPoz;
      $naziv=$request->naziv;
      $adresa=$request->adresa;
      $grad=$request->grad;
      $detaljnije=$request->detaljnije;
      $slika=$request->slika;


      $poz = Pozoriste::find($idpoz);
      $poz->Naziv = $naziv;
      $poz->Adresa = $adresa;
      $poz->Grad = $grad;
      $poz->Detaljnije = $detaljnije;
      $poz->Slika = $slika;


      $poz->save();

      return redirect()->intended('/admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      DB::table('pozoriste')->where('IDPoz', '=', $id)->delete();
      return redirect()->intended('/admin');
    }

//svaPoz
public function svaPoz(){
  $poz=Pozoriste::all();
  echo'<table class="table">
      <tr>
        <td><strong>Naziv</strong></td>
        <td><strong>Adresa</strong></td>
        <td colspan="3" align="center"><strong>Akcija</strong></td>
      </tr>
  ';
  foreach ($poz as $p ) {

      //$poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();

      echo '<tr>
      <td>'.$p->Naziv.'</td>
      <td>'.$p->Adresa.'</td>
      <td><a href="" onClick="return editPoz('.$p->IDPoz.')">Izmeni</a></td>
      <td><a href="" onClick="return dodajPoz()">Dodaj</a></td>
      <td><a href="destroy/'.$p->IDPoz.'">Obrisi</a></td>
    </tr>';

  }
  echo'</table>';
}

public function formaZaUnos($b=8){
  //$pozorista = Pozoriste::all();
  echo '<form class="form-horizontal"  method="POST" action='.url('/create').'>
        <input type="hidden" name="_token" value='.csrf_token().'>
        <label class="control-label">Naziv:</label><input type="text" name="naziv" class="form-control"></br>
        <label class="control-label">Adresa:</label><input type="text" name="adresa" class="form-control"></br>
        <label class="control-label">Grad:</label><input type="text" name="grad" class="form-control"></br>
        <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
        <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
        <button width="150px" class="btn btn-default" type="submit">Unesi</button>
        </form>';
}

public function formaZaIzmene($id){


  $poz = DB::table('pozoriste')->where('IDPoz', $id)->first();

  echo '
      <table class="table">
        <tr>
          <td>Naziv:</td>
          <td>'.$poz->Naziv.'</td>
        </tr>
        <tr>
          <td>Adresa:</td>
          <td>'.$poz->Adresa.'</td>
        </tr>
        <tr>
          <td>Grad:</td>
          <td>'.$poz->Grad.'</td>
        </tr>
        <tr>
          <td>Detaljnije:</td>
          <td>'.$poz->Detaljnije.'</td>
        </tr>
        <tr>
          <td>Slika:</td>
          <td>'.$poz->Slika.'</td>
        </tr>
      </table>
  ';
  echo '<form class="form-horizontal"  method="POST" action='.url('/edit').'>
        <input type="hidden" name="_token" value='.csrf_token().'>
        <input type="hidden" name="IDPoz" value='.$id.'>
        <label class="control-label">Naziv:</label><input type="text" name="naziv" class="form-control"></br>
        <label class="control-label">Adresa:</label><input type="text" name="adresa" class="form-control"></br>
        <label class="control-label">Grad:</label><input type="text" name="grad" class="form-control"></br>
        <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
        <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
        <button width="150px" class="btn btn-default" type="submit">Promeni</button>
        </form>';

}

}
