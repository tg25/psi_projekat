@extends("layoutStandard")

    <!-- Navigation -->


@section("content")


    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Vesti
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active">Vesti</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        @foreach($vesti as $v)
        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="{{$v->Slika}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$v->Naslov}}</h3>
              
                <p>{{$v->Ukratko}}</p>
                <a class="btn btn-default" href="/vesti/{{$v->IDVes}}">Detaljnije</i></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        @endforeach
       



        <hr>
@stop
     
