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




Route::group(['middleware' => ['web']], function () {
    //
    Route::get('predstave/pretraga/{q}', 'PredstavaController@pretraga');

    Route::get('admin', ['middleware' => 'admin', function () {

           return view('admin');

       }]);

       Route::auth();

       Route::get('/welcome', 'HomeController@index');



Route::get('/', function () {
    return view('welcome');
});

 Route::get('predstave/pretraga/{q}', 'PredstavaController@pretraga');

Route::get('predstave/svePred/', 'PredstavaController@svePred');


Route::resource("korisnik", "KorisnikController");

Route::resource("vesti", "VestiController");

Route::resource("pozorista", "PozoristeController");

Route::resource("predstave", "PredstavaController");

Route::get('proba', function () {
    return view('layoutStandard');
});

//Rute za admina AKCIJA

Route::get('/predstave/destroy/{id}','PredstavaController@destroy');
Route::get('/predstave/formaZaUnos/{p}','PredstavaController@formaZaUnos');
Route::post('/predstave/create/','PredstavaController@create');

});
