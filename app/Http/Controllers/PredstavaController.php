<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Predstava;
use App\Pozoriste;


class PredstavaController extends Controller




{

    public function pretraga($q)

    {


         $predstave=Predstava::all();
        
        $pozorista=Pozoriste::all();


             
             
            
            $predstave = DB::table('predstava')
                    ->join('pozoriste', 'predstava.IDPre', '=', 'pozoriste.IDPoz')
                    ->select('predstava.*')
                    ->where('pozoriste.Naziv', $q)
                    ->get();
            
          

             if ($predstave!=null) {
             

            
            
            foreach ($predstave as $p ) {
                    echo '<div class="input-group"><span class="input-group-addon">
                                <input type="checkbox" aria-label="...">
                          </span>
                          <input width="190px" type="text" class="form-control" value="';
                             echo $p->Naziv;
                          echo '" aria-label="...">';
                        
                            

                        echo "</input></div></br>";
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
    public function create()
    {
        //
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
        return view("predstava-detalji")->with('predstava', $predstava);
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
        //
    }
}
