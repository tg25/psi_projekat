<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Vest;
use Auth;
use DB;


class VestiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vesti=Vest::all();

        return view("vesti")->with('vesti', $vesti);

    }


     public function detaljnije($id)
    {
        //
         $vest=Vest::find($id);

         return view("vesti")->with('vest', $vest);
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
         $vest=Vest::find($id);

         return view("vesti-detalji")->with('vest', $vest);
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




    public function sveVesti(){
      $vesti=Vest::all();
      echo'<table class="table">
          <tr>
            <td><strong>Vest</strong></td>
            <td><strong>Ukratko</strong></td>
            <td colspan="3" align="center"><strong>Akcija</strong></td>
          </tr>
      ';
      foreach ($vesti as $v ) {

          echo '<tr>
          <td>'.$v->Naslov.'</td>
          <td>'.$v->Ukratko.'</td>
          <td><a href="" onClick="return modvesti('.$v->IDVes.')">Izmeni</a></td>
          <td><a href="" onClick="return modvesti(0)">Dodaj</a></td>
          <td><a href="/vesti/destroy/'.$v->IDVes.'">Obrisi</a></td>
        </tr>';

      }
      echo'</table>';
    }

    public function formaZaIzmene($id){

      $v = DB::table('vest')->where('IDVes', $id)->first();
      echo '
          <table class="table">
            <tr>
              <td>Naslov:</td>
              <td>'.$v->Naslov.'</td>
            </tr>
            <tr>
              <td>Pozoriste:</td>
              <td>'.$v->Ukratko.'</td>
            </tr>
            <tr>
              <td>Detaljnije:</td>
              <td>'.$v->Detaljnije.'</td>
            </tr>
            <tr>
              <td>Slika:</td>
              <td>'.$v->Slika.'</td>
            </tr>
          </table>
      ';
      echo '<form  class="form-horizontal" method="POST" action='.url('/vesti/edit').'>
            <input  type="hidden" name="_token" value='.csrf_token().'>
            <input type="hidden" name="IDVes" value='.$id.'>
            <label class="control-label">Naslov:</label><input type="text" name="naslov" class="form-control"></br>
            <label class="control-label">Ukratko:</label><textarea name="ukratko" class="form-control"></textarea></br>
            <label class="control-label">Detaljnije:</label><textarea name="detaljnije" class="form-control"></textarea></br>
            <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
            <button width="150px" class="btn btn-default" type="submit">Promeni</button>
            </form>';

    }

    public function formaZaUnos($b=8){
    $id=Auth::user()->id;
      echo '<form class="form-horizontal"  method="POST" action='.url('/vesti/create').'>
            <input type="hidden" name="_token" value='.csrf_token().'>
            <input type="hidden" name="id" value='.$id.'>
            <label class="control-label">Naslov:</label><input type="text" name="naslov" class="form-control"></br>
            <label class="control-label">Ukratko:</label><textarea name="ukratko" class="form-control"></textarea></br>
            <label class="control-label">Detaljnije:</label><textarea name="detaljnije" class="form-control"></textarea></br>
            <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
            <button width="150px" class="btn btn-default" type="submit">Unesi</button>
            </form>';

    }

    public function edit(Request $request)
    {
      $naslov=$request->naslov;
      $ukratko=$request->ukratko;
      $detaljnije=$request->detaljnije;
      $slika=$request->slika;


      $vest = Vest::find($request->IDVes);
      $idmod = $vest->IDReg;

      $vest->Naslov = $naslov;
      $vest->Detaljnije = $detaljnije;
      $vest->Slika = $slika;
      $vest->Ukratko = $ukratko;
      $vest->IDReg = $idmod;

      $vest->save();

      return redirect()->intended('/moderator');
    }
    public function create(Request $request)
    {
          $naslov=$request->naslov;
          $ukratko=$request->ukratko;
          $detaljnije=$request->detaljnije;
          $slika=$request->slika;
          $idmod = $request->id;

          $vest = new Vest;

          $vest->Naslov = $naslov;
          $vest->Detaljnije = $detaljnije;
          $vest->Slika = $slika;
          $vest->Ukratko = $ukratko;
          $vest->IDReg = $idmod;

          $vest->save();

          return redirect()->intended('/moderator');
    }

    public function destroy($id)
    {
      DB::table('vest')->where('IDVes', '=', $id)->delete();
      return redirect()->intended('/moderator');

    }
}
