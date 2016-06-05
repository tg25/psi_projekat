@extends("layoutStandard")



@section('content')



<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li><a href="/predstave">Predstave</a>
                    </li>
                    <li class="active">{{$predstava->Naziv}}</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="{{$predstava->Slika}}" alt="">

                Glumci:
                @foreach($glumci as $g)

                    {{$g->Ime}} 
                    {{$g->Prezime}},

                @endforeach
                </br>
                Produkcija:
                @foreach($producenti as $pro)

                    {{$pro->Ime}} 
                    {{$pro->Prezime}},

                @endforeach
                <p></p>
            </div>
            <div class="col-md-6">
                <h2>{{$predstava->Naziv}}</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>

        <table class="table">
            <tr>
              <td align="center"><strong>Pozorište</strong></td>
              <td align="center"><strong>Datum</strong></td>
              <td align="center"><strong>Vreme</strong></td>
              <td align="center"><strong>Sala</strong></td>
              <td align="center"><strong>Cena</strong></td>
              <td align="center"></td>

            </tr>
            @foreach ($projekcije as $pro) 
            <tr>
              <td align="center"><strong>{{$pozoriste->Naziv}}</strong></td>
              <td align="center"><strong>{{$pro->Datum}}</strong></td>
              <td align="center"><strong>{{$pro->Vreme}}</strong></td>
              <td align="center"><strong>{{$pro->Naziv}}</strong></td>
              <td align="center"><strong>{{$pro->Cena}}</strong></td>
              <td align="center"><a class="btn btn-default" href="" onClick="return dodaj()">Rezervacija</a></td>
              
            </tr>
            @endforeach

        </table>




         
</div>


@stop