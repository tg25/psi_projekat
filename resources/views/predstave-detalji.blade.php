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




<<<<<<< HEAD
         <!-- Blog Comments -->

                <!-- Comments Form -->
                @if (Auth::guest())
                <hr>

                @else
<<<<<<< HEAD
              <?php
                $id=Auth::user()->id;
                $name=Auth::user()->name;
                $idpre=$predstava->IDPre;
                $tip=0;
              ?>
                <hr>
                    <h4>Leave a Comment:</h4>
                    <div class="form-group">
                    <form role="form" method="POST" action="{{ url('/komentar/post') }}">
                        {{ csrf_field() }}
                          <input type="hidden" name="IDKor" value="{{$id}}">
                          <input type="hidden" name="name" value="{{$name}}">
                          <input type="hidden" name="IDPre" value="{{$idpre}}">

                        <textarea class="form-control" name="sadrzaj" rows="3"></textarea>
=======
                <hr>
                    <h4>Leave a Comment:</h4>
                    <div class="form-group">
                    <form role="form" method="POST" >

                        <textarea class="form-control" rows="3"></textarea>
>>>>>>> origin/master
                        </br>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    </div>

                <hr>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->

                @foreach($komentari->reverse() as $k)
                  @if($k->IDPre==$predstava->IDPre)
                    <?php
                      $kor = DB::table('users')->where('id', $k->IDReg)->first();
                     ?>
                    <div class="media">
                        <a class="pull-left" href="#">
<<<<<<< HEAD
                            <img class="media-object" src="https://www.londontheatre1.com/wp-content/uploads/2015/09/favico264.jpg" alt="">
=======
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
>>>>>>> origin/master
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$kor->name}}
                                <small>{{$k->created_at}}</small>
                            </h4>
<<<<<<< HEAD
                            <h5 class="pull-right">
                              @if(!Auth::guest())
                                @if($kor->id!=Auth::user()->id)
                                  <form role="form" method="POST" action="{{ url('/komentar/prijavi') }}">
                                      {{ csrf_field() }}
                                        <input type="hidden" name="IDPre" value="{{$idpre}}">
                                        <input type="hidden" name="IDKom" value="{{$k->IDKom}}">
                                  <button type="submit" class="btn-danger">Prijavi ovaj komentar</button>
                                  </form>
                                  @else
                                    <form role="form" method="POST" action="{{ url('/komentar/obrisi') }}">
                                        {{ csrf_field() }}
                                          <input type="hidden" name="IDPre" value="{{$idpre}}">
                                          <input type="hidden" name="IDKom" value="{{$k->IDKom}}">
                                          <input type="hidden" name="tip" value="{{$tip}}">
                                    <button type="submit" class="btn-danger">Obrisi komentar</button>
                                    </form>
                                @endif
                              @endif
                            </h5>
                              {{$k->Sadrzaj}}
                              </br></br>
                            @if($k->Prijava>0)
                            <h6 style="color:red">Broj prijava: &nbsp;&nbsp;&nbsp; {{$k->Prijava}}</h6>
                            @endif

=======
                            {{$k->Sadrzaj}}
>>>>>>> origin/master
                        </div>
                    </div>
                  @endif
                @endforeach

<<<<<<< HEAD
=======
=======
         
>>>>>>> origin/master
>>>>>>> origin/master
</div>


@stop
