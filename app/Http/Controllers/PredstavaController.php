<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Predstava;
use App\Pozoriste;
use Illuminate\Support\Facades\Input;


class PredstavaController extends Controller
{

    public function formaZaUnos($b=8){

      echo '<form class="form-control"  method="POST" action='.url('/predstave/create').'>
            <input type="hidden" name="_token" value='.csrf_token().'>
            <label>Naziv:</label><input type="text" name="naziv" ></br>
            <label>Pozoriste:</label><input type="text" name="pozoriste" value=""></br>
            <label>Detaljnije:</label><input type="text" name="detaljnije" value=""></br>
            <label>Slika:</label><input type="text" name="slika" value=""></br>
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
            <td><a href="/predstave/update/'.$p->IDPre.'">Izmeni</a></td>
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









    public function complete($q){
        //return view("proba")->with("naziv", $q);
        $query=DB::table('predstava')->select('predstava.Naziv')->get();
        $niz;
        $k=0;
        foreach($query as $que){


            $niz[$k]=(String)$que->Naziv;
            $k=$k+1;
        }

        
        $k=0;
        if (strlen($q) > 0)
        {
            $hint;
            for($i=0; $i<count($niz); $i++)
            {
                if (strtolower($q)==strtolower(substr($niz[$i],0,strlen($q))))
                {
                    $hint[$k]=$niz[$i];
                    $k=$k+1;
                    
                    
                }
            }



        
                foreach ($hint as $h) {
                    echo '<a style="font-size:13pt;" onclick="return zamenitekst(';
                    echo "'".$h."'";
                    echo ')">'.$h.'</a></br>';
                }
                
  
      
        
        }

    

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
         $predstava=Predstava::find($id);
        return view("predstave-detalji")->with('predstava', $predstava);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
