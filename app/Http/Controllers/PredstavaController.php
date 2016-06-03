<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Predstava;
use App\Pozoriste;
<<<<<<< HEAD
use App\Komentar;
=======
use App\Glumac;
use App\RadiNa;
>>>>>>> origin/master
use Illuminate\Support\Facades\Input;


class PredstavaController extends Controller
{

    public function formaZaIzmene($id){

      $predstava = DB::table('predstava')->where('IDPre', $id)->first();
      $poz = DB::table('pozoriste')->where('IDPoz', $predstava->IDPoz)->first();
      $pozorista = Pozoriste::all();
      echo '
          <table class="table">
            <tr>
              <td>Naziv predstave:</td>
              <td>'.$predstava->Naziv.'</td>
            </tr>
            <tr>
              <td>Pozoriste:</td>
              <td>'.$poz->Naziv.'</td>
            </tr>
            <tr>
              <td>Detaljnije:</td>
              <td>'.$predstava->Detaljnije.'</td>
            </tr>
            <tr>
              <td>Slika:</td>
              <td>'.$predstava->Slika.'</td>
            </tr>
          </table>
      ';
      echo '<form  class="form-horizontal" method="POST" action='.url('/predstave/edit').'>
            <input  type="hidden" name="_token" value='.csrf_token().'>
            <input type="hidden" name="IDPre" value='.$id.'>
            <label class="control-label">Naziv:</label><input type="text" name="naziv" class="form-control"></br>
            <label class="control-label">Pozoriste:</label>
            <select  name="pozoriste" width="150px" class="form-control">';
               foreach($pozorista as $poz)
                  echo '<option>'.$poz->Naziv.'</option>';
      echo '
            </select>
            </br>
            <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
            <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
            <button width="150px" class="btn btn-default" type="submit">Promeni</button>';

    }

    public function formaZaUnos($b=8){
      $pozorista = Pozoriste::all();
      echo '<form class="form-horizontal"  method="POST" action='.url('/predstave/create').'>
            <input type="hidden" name="_token" value='.csrf_token().'>
            <label class="control-label">Naziv:</label><input type="text" name="naziv" class="form-control"></br>
            <label class="control-label">Pozoriste:</label>
            <select  name="pozoriste" width="150px" class="form-control">';
               foreach($pozorista as $poz)
                  echo '<option>'.$poz->Naziv.'</option>';
      echo '
            </select>
            </br>
            <label class="control-label">Detaljnije:</label><input type="text" name="detaljnije" class="form-control"></br>
            <label class="control-label">Slika:</label><input type="text" name="slika" class="form-control"></br>
            <button width="150px" class="btn btn-default" type="submit">Unesi</button>';
    }

      public function svePred(){
        $predstave=Predstava::all();
        echo'<table class="table">
            <tr>
              <td><strong>Predstava</strong></td>
              <td><strong>Pozoriste</strong></td>
              <td colspan="3" align="center"><strong>Akcija</strong></td>
            </tr>
        ';
        foreach ($predstave as $p ) {

            $poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();

            echo '<tr>
            <td>'.$p->Naziv.'</td>
            <td>'.$poz->Naziv.'</td>
            <td><a href="" onClick="return edit('.$p->IDPre.')">Izmeni</a></td>
            <td><a href="" onClick="return dodaj()">Dodaj</a></td>
            <td><a href="/predstave/destroy/'.$p->IDPre.'">Obrisi</a></td>
          </tr>';

        }
        echo'</table>';
      }


    public function prikazi(Request $request){

        $Naziv=$request->Naziv;
        $NazivPoz=$request->NazivPoz;
        //$izbor=$request->checkBox;

       $izbor= Input::get('checkBox', true);


        echo $Naziv;

        return view("proba")->with("naziv", $izbor);
    }

     public function pretraga($q)

    {


         $predstave=Predstava::all();

        $pozorista=Pozoriste::all();





            $predstave = DB::table('predstava')
                    ->join('pozoriste', 'predstava.IDPoz', '=', 'pozoriste.IDPoz')
                    ->select('predstava.*')
                    ->where('pozoriste.Naziv', $q)
                    ->get();


            //echo $predstave;



             if ($predstave!=null) {




            /*foreach ($predstave as $p ) {

                    echo '<div class="input-group"><span class="input-group-addon">
                                <input name="checkBox" value="'.$p->Naziv.'" type="checkbox" aria-label="...">
                          </span>
                          <input width="190px" type="text" class="form-control" value="';
                             echo $p->Naziv;
                          echo '" aria-label="...">';



                        echo "</input></div></br>";
            }  */


            //return view("predstave")->with("predstave", $predstave)->with('pozorista', $pozorista);


            foreach ($predstave as $p ) {

                $poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();

               echo '<div class="row">
            <div class="col-md-7">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="'.$p->Slika.'" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>'.$p->Naziv.'</h3>
                <p>'.$poz->Naziv.'</p>
                <p>'.$p->Detaljnije.'</p>
                <a class="btn btn-primary" href="/vesti/'.$p->IDPre.'">Detaljnije</i></a>
            </div>
        </div>


        <hr>';

            }


            }

            else echo"<br><br>Nema predstava za trazeno pozoriste";
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predstave=Predstava::all();

        $pozorista=Pozoriste::all();


        return view("predstave")->with('predstave', $predstave)->with('pozorista', $pozorista);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $naziv=$request->naziv;
          $pozoriste=$request->pozoriste;
          $detaljnije=$request->detaljnije;
          $slika=$request->slika;

          $poz = DB::table('pozoriste')->where('Naziv', $pozoriste)->first();
          $idpoz=$poz->IDPoz;

          $predstava = new Predstava;

          $predstava->Naziv = $naziv;
          $predstava->Detaljnije = $detaljnije;
          $predstava->Slika = $slika;
          $predstava->IDPoz = $idpoz;

          $predstava->save();

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
<<<<<<< HEAD
        $komentari=Komentar::all();
         $predstava=Predstava::find($id);
        return view("predstave-detalji")->with('predstava', $predstava)->with('komentari',$komentari);
=======
        $predstava=Predstava::find($id);

        $glumci=DB::table('radina')
                    ->join('predstava', 'radina.IDPre', '=', 'predstava.IDPre')
                    ->join('ucesnici', 'ucesnici.IDUce', '=', 'radina.IDUce')
                    ->select('ucesnici.*')
                    ->where('radina.IDpre', $predstava->IDPre)
                    ->where('radina.Uloga', "Glumac")
                    ->get();
         $producenti=DB::table('radina')
                    ->join('predstava','radina.IDPre' , '=','predstava.IDPre')
                    ->join('ucesnici', 'ucesnici.IDUce', '=', 'radina.IDUce')
                    ->select('ucesnici.*')
                    ->where('radina.IDpre', $predstava->IDPre)
                    ->where('radina.Uloga', "Producent")

                    ->get();




        return view("predstave-detalji")->with('predstava', $predstava)->with('glumci',$glumci)->with('producenti',$producenti);
>>>>>>> origin/master
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {



      $idpre = $request->IDPre;
      $naziv=$request->naziv;
      $pozoriste=$request->pozoriste;
      $detaljnije=$request->detaljnije;
      $slika=$request->slika;


      $poz = DB::table('pozoriste')->where('Naziv', $pozoriste)->first();

      $idpoz=$poz->IDPoz;

      $predstava = Predstava::find($idpre);
      $predstava->Naziv = $naziv;
      $predstava->Detaljnije = $detaljnije;
      $predstava->Slika = $slika;
      $predstava->IDPoz = $idpoz;

      $predstava->save();

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
      DB::table('predstava')->where('IDPre', '=', $id)->delete();
      return redirect()->intended('/admin');

    }}
