<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/predstave/complete/{q}', 'PredstavaController@complete');


Route::group(['middleware' => ['web']], function () {
    //
    Route::get('predstave/pretraga/{q}', 'PredstavaController@pretraga');

    Route::get('/predstave/complete/{q}', 'PredstavaController@complete');

    Route::get('/regForm/', function()
    {
      return view('regForm');
    });

    Route::get('/logForm/', function()
    {
      return view('logForm');
    });

    Route::get('/predstava/{idpre}', 'PredstavaController@show');

    Route::get('glumci/pronadji/{q}', 'GlumciController@pronadji');

});


    Route::get('admin', ['middleware' => 'admin', function () {

           return view('admin');

       }]);

    Route::get('moderator', ['middleware' => 'moderator', function () {

              return view('moderator');

          }]);

       Route::auth();

       Route::get('/welcome', 'HomeController@index');



Route::get('/', function () {
    return view('welcome');
});

 Route::get('predstave/pretraga/{q}', 'PredstavaController@pretraga');



Route::resource("glumci", "GlumciController");

Route::get('predstave/svePred/', 'PredstavaController@svePred');
//ubcaeno pre da ga show ne bi zamaskirao
Route::get('vesti/sveVesti/', 'VestiController@sveVesti');


Route::get('/vesti/formaZaUnos/{p}','VestiController@formaZaUnos');
Route::get('/vesti/formaZaIzmene/{p}','VestiController@formaZaIzmene');
Route::post('/vesti/create/', 'VestiController@create');
Route::post('vesti/edit/', 'VestiController@edit');
Route::get('vesti/destroy/{id}', 'VestiController@destroy');
Route::get('/rezervacija/pronadji/{q}/{p}/{g}/{k}', 'RezervacijaController@pronadji');
Route::post('/rezervacija/remember/','RezervacijaController@remember');
Route::resource("korisnik", "KorisnikController");

Route::resource("vesti", "VestiController");

Route::resource("pozorista", "PozoristeController");

Route::resource("rezervacija", "RezervacijaController");

Route::resource("predstave", "PredstavaController");

Route::get('proba', function () {
    return view('layoutStandard');
});

//Rute za admina AKCIJA
//predstave/formaZaIzmene/
Route::get('/predstave/formaZaIzmene/{id}','PredstavaController@formaZaIzmene');
Route::post('/predstave/edit/','PredstavaController@edit');

Route::get('/predstave/destroy/{id}','PredstavaController@destroy');
Route::get('/predstave/formaZaUnos/{p}','PredstavaController@formaZaUnos');
Route::post('/predstave/create/','PredstavaController@create');

//ruteZaKomentar
Route::post('/komentar/post','KomentarController@post');
Route::post('/komentar/prijavi','KomentarController@prijavi');
Route::post('/komentar/obrisi','KomentarController@obrisi');

//ruteZaModeratora

Route::get('komentari/sviKomentari/', 'KomentarController@sviKomentari');



//rute za pozorista, admin
Route::get('svaPoz/', 'PozoristeController@svaPoz');
Route::get('destroy/{id}', 'PozoristeController@destroy');
Route::get('formaZaUnos/{p}','PozoristeController@formaZaUnos');
Route::post('create/', 'PozoristeController@create');
Route::get('formaZaIzmene/{p}','PozoristeController@formaZaIzmene');
Route::post('edit/', 'PozoristeController@edit');
//glumci/sviGlumci/
Route::get('sviGlumci/', 'GlumciController@sviGlumci');
Route::get('glumci/destroy/{id}', 'GlumciController@destroy');
Route::get('glumci/formaZaUnos/{p}','GlumciController@formaZaUnos');
Route::post('glumci/create/', 'GlumciController@create');
Route::get('glumci/formaZaIzmene/{p}','GlumciController@formaZaIzmene');
Route::post('glumci/edit/', 'GlumciController@edit');
//glumci/edit
//glumci/formaZaIzmene/
//glumci/formaZaUnos/
//glumci/destroy/
//predstave/repertoar/


//Rute za projekcije
//repertoar/
//projekcije/destroy/
//repertoar/formaZaUnos/
//repertoar/create
//repertoar/formaZaIzmene/
///repertoar/edit
Route::get('repertoar/', 'ProjekcijaController@repertoar');
Route::get('projekcije/destroy/{id}', 'ProjekcijaController@destroy');
Route::get('repertoar/formaZaUnos/{p}','ProjekcijaController@formaZaUnos');
Route::post('repertoar/create/', 'ProjekcijaController@create');
Route::get('repertoar/formaZaIzmene/{p}','ProjekcijaController@formaZaIzmene');
Route::post('repertoar/edit/', 'ProjekcijaController@edit');
