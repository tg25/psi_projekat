<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Rezervacija;
use App\Projekcije;
use App\ZauzetaSedista;
use App\Sedista;
use Illuminate\Support\Facades\Input;
use Auth;

class RezervacijaController extends Controller
{






    public function pronadji($tip, $broj, $sala, $projek){


        $n=(int)$broj;

        
        $sedista=DB::table('sediste')
                    ->orderBy('Broj','asc')
                    ->join('zauzetosediste','zauzetosediste.IDSed','=','sediste.IDSed')
                    ->select('sediste.*')
                    ->where('sediste.Sala',$sala)
                    ->where('sediste.Pozicija',$tip)
                    ->where('zauzetosediste.IDPro',$projek)

                    ->get();
        
        $svasedista=DB::table('sediste')
                    ->select('sediste.*')
                    ->where('sediste.Pozicija',$tip)
                    ->where('sediste.Sala',$sala)
                    ->get();



        if ($svasedista==null) echo '';     

        else{


        for($i=0;$i<$n;$i++)
        {   
            $j=$i+1;
            echo 'Karta '.$j;
            echo '</br>';
            echo '<select id="red'.$i.'" name="red'.$i.'" class="form-control"><option>-</option> ';
            $flag=0;
            foreach($svasedista as $s){
            foreach($sedista as $se)
            {
                if($s->IDSed==$se->IDSed)
                    $flag=1;
            }
            if ($flag==0) {echo '<option> red:'.$s->Red.' kol:'.$s->Kolona.'</option>' ; }
             $flag=0;
             
        }
            echo'</select></br>';
        }

    }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {


        $idpro=Input::get('pro');
        $pred=Input::get('pred');
        $poz=Input::get('poz');

        $projekcija=Projekcije::find($idpro);

        $sala= DB::table('projekcija')
                ->join('sala','sala.IDSala','=','projekcija.IDSal')
                ->select('sala.*')
                ->where('projekcija.IDPro',$idpro)
                ->first();
        $cenovnik=DB::table('cenovnik')
                    ->join('projekcija','projekcija.IDPro','=','cenovnik.IDPro')
                    ->select('cenovnik.*')
                    ->where('projekcija.IDPro',$idpro)
                    ->get();


        return view('rezervacija')->with('projekcija', $projekcija)->with('poz', $poz)->with('pred', $pred)->with('sala', $sala)->with('cenovnik',$cenovnik);


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

        echo $request;
        $broj=$request->broj;
        echo $broj;
        $idreg=$request->IDReg;
        echo $idreg;
        
    }




     public function remember(Request $request)


    {

        echo $request;
        $broj=$request->broj;
        echo $broj;
        $idreg=$request->IDReg;
        echo $idreg;
        
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
