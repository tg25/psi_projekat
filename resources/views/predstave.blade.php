@extends("layoutStandard")

    <!-- Navigation -->


@section("content")

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">One Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">One Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        @foreach($predstave as $p)

        <?php 

            $poz = DB::table('pozoriste')->where('IDPoz', $p->IDPoz)->first();
           
        ?>

        <!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="{{$p->Slika}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$p->Naziv}}</h3>
                <p>{{$poz->Naziv}}</p>
                <p>{{$p->Detaljnije}}</p>
                <a class="btn btn-primary" href="/vesti/{{$p->IDVes}}">Detaljnije</i></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        @endforeach
       

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>
@stop
     
