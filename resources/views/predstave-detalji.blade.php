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



<<<<<<< HEAD
         <!-- Blog Comments -->

                <!-- Comments Form -->
                @if (Auth::guest())
                <hr>

                @else
                <hr>
                    <h4>Leave a Comment:</h4>
                    <div class="form-group">
                    <form role="form" method="POST" >

                        <textarea class="form-control" rows="3"></textarea>
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
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{$kor->name}}
                                <small>{{$k->created_at}}</small>
                            </h4>
                            {{$k->Sadrzaj}}
                        </div>
                    </div>
                  @endif
                @endforeach

=======
         
>>>>>>> origin/master
</div>


@stop
