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
                        <a href="portfolio-item.html">
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
                        <a href="portfolio-item.html">
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
        $glumac=Glumac::find($id);

        return view('glumci-detalji')->with('glumac', $glumac);
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
