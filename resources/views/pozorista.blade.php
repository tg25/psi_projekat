@extends("layoutStandard")

    <!-- Navigation -->


@section("content")
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Three Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li class="active">Pozorišta</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->


        @foreach($pozorista as $p)


                        <div class="col-md-4 img-portfolio">
                            <a href="portfolio-item.html">
                                  <a href="/pozorista/{{$p->IDPoz}}"><img class="img-responsive img-hover" src="{{$p->Slika}}" alt=""></a>
                            </a>
                            <h3>
                                <a href="/pozorista/{{$p->IDPoz}}">{{$p->Naziv}}</a>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                        </div>

        @endforeach

        <hr>

 
        
@stop
