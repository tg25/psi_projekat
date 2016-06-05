<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Glumac;

class GlumciController extends Controller
{


     public function pronadji($q="")
    {
        //echo "proba";


        $query=DB::table('ucesnici')->select('ucesnici.*')->get();



        $niz;
        $k=0;
        foreach($query as $que){

            $nizo[$k]=$que;
            $niz[$k]=(String)$que->Ime." ".(String)$que->Prezime;
            $niz1[$k]=(String)$que->Prezime." ".(String)$que->Ime;

            $k=$k+1;
        }




        $k=0;
        if ($q=="1"){

            foreach ($query as $h) {
                 echo   '<div class="col-md-4 img-portfolio">
                        <a href="/glumci/'.$h->IDUce.'">
                            <img class="img-responsive img-hover" src="'.$h->Slika.'" alt="">
                        </a>
                     <h3>
                        <a href="/glumci/'.$h->IDUce.'">'.$h->Ime.' '.$h->Prezime.'</a>
                    </h3>

                    </div>';
                }

        }

        else
        {
            $hint=array();
            for($i=0; $i<count($niz); $i++)
            {
                if (strtolower($q)==strtolower(substr($niz[$i],0,strlen($q))) || strtolower($q)==strtolower(substr($niz1[$i],0,strlen($q))) )
                {
                    $hint[$k]=$nizo[$i];
                    $k=$k+1;


                }
            }



            if (sizeof($hint)>0){
                foreach ($hint as $h) {
                 echo   '<div class="col-md-4 img-portfolio">
                        <a href="/glumci/'.$h->IDUce.'">
                            <img class="img-responsive img-hover" src="'.$h->Slika.'" alt="">
                        </a>
                     <h3>
                        <a href="/glumci/'.$h->IDUce.'">'.$h->Ime.' '.$h->Prezime.'</a>
                    </h3>

                    </div>';
                }
            }

            else echo "Nema rezultata!";



        }



    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $glumci=Glumac::all();

        return view("glumci")->with("glumci", $glumci);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $poz = new Glumac;

      $poz->Ime = $request->ime;
      $poz->Prezime = $request->prezime;
      $poz->Uloga = $request->uloga;
      $poz->Detaljnije = $request->detaljnije;
      $poz->Slika = $request->slika;

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
        $glumac=Glumac::find($id);

        $predstave = DB::table('radina')
                    ->join('predstava', 'predstava.IDPre', '=', 'radina.IDPre')
                    ->join('ucesnici', 'ucesnici.IDUce','=','radina.IDUce')
                    ->select('predstava.*')

                    ->where('radina.IDUce', $id)
                    ->distinct()
                    ->get();



        return view('glumci-detalji')->with('glumac', $glumac)->with('predstave', $predstave);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
          $poz = Glumac::find($request->IDUce);

          $poz->Ime = $request->ime;
          $poz->Prezime = $request->prezime;
          $poz->Uloga = $request->uloga;
          $poz->Detaljnije = $request->detaljnije;
          $poz->Slika = $request->slika;

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
      DB::table('ucesnici')->where('IDUce', '=', $id)->delete();
      return redirect()->intended('/admin');
    }

//sviGlumci
public function sviGlumci(){
  $gl=Glumac::all();
  echo'<table class="table">
      <tr>
        <td><strong>Ime</strong></td>
        <td><strong>Prezime</strong></td>
        <td><strong>Uloga</strong></td>
        <td colspan="3" align="center"><strong>Akcija</strong></td>
      </tr>
  ';
  foreach ($gl as $g ) {

      //$poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();

      echo '<tr>
      <td>'.$g->Ime.'</td>
      <td>'.$g->Prezime.'</td>
      <td>'.$g->Uloga.'</td>
      <td><a href="" onClick="return editGlu('.$g->IDUce.')">Izmeni</a></td>
      <td><a href="" onClick="return dodajGlu()">Dodaj</a></td>
      <td><a href="glumci/destroy/'.$g->IDUce.'">Obrisi</a></td>
    </tr>';

  }
  echo'</table>';
}

public function formaZaUnos($b=8){
  //$pozorista = Pozoriste::all();
  echo '<form class="form-horizontal"  method="POST" action='.url('glumci/create').'>
        <input type="hidden" name="_token" value='.csrf_token().'>
        <label class="control-label">Ime:</label><input type="text" name="ime" class="form-control"></br>
        <label class="control-label">Prezime:</label><input type="text" name="prezime" class="form-control"></br>
        <label class="control-label">Uloga:</label><input type="text" name="uloga" class="form-control"></br>
        <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
        <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
        <button width="150px" class="btn btn-default" type="submit">Unesi</button>
        </form>';
}

public function formaZaIzmene($id){


  $g = DB::table('ucesnici')->where('IDUce', $id)->first();

  echo '
      <table class="table">
        <tr>
          <td>Naziv:</td>
          <td>'.$g->Ime.'</td>
        </tr>
        <tr>
          <td>Adresa:</td>
          <td>'.$g->Prezime.'</td>
        </tr>
        <tr>
          <td>Grad:</td>
          <td>'.$g->Uloga.'</td>
        </tr>
        <tr>
          <td>Detaljnije:</td>
          <td>'.$g->Detaljnije.'</td>
        </tr>
        <tr>
          <td>Slika:</td>
          <td>'.$g->Slika.'</td>
        </tr>
      </table>
  ';
  echo '<form class="form-horizontal"  method="POST" action='.url('glumci/edit').'>
        <input type="hidden" name="_token" value='.csrf_token().'>
        <input type="hidden" name="IDUce" value='.$id.'>
        <label class="control-label">Ime:</label><input type="text" name="ime" class="form-control"></br>
        <label class="control-label">Prezime:</label><input type="text" name="prezime" class="form-control"></br>
        <label class="control-label">Uloga:</label><input type="text" name="uloga" class="form-control"></br>
        <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
        <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
        <button width="150px" class="btn btn-default" type="submit">Promeni</button>
        </form>';

}

}
