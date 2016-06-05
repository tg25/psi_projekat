@extends("layoutStandard")



@section('content')



<div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Glumci
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/">Home</a>
                    </li>
                    <li><a href="/glumci">Glumci</a>
                    </li>
                    <li class="active">{{$glumac->Ime}} {{$glumac->Prezime}}</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="{{$glumac->Slika}}" alt="">
            </div>
            <div class="col-md-6">
                <h2>{{$glumac->Ime}} {{$glumac->Prezime}}</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, magni, aperiam vitae illum voluptatum aut sequi impedit non velit ab ea pariatur sint quidem corporis eveniet. Odit, temporibus reprehenderit dolorum!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti eum ratione ex ea praesentium quibusdam? Aut, in eum facere corrupti necessitatibus perspiciatis quis?</p>
            </div>
        </div>







            <!-- Indicators -->
                    
            <div class="col-lg-12">
                <h3 class="page-header">Predstave</h3>
            </div>

            @foreach($predstave as $p)

            <div class="col-sm-3 col-xs-6">
                <a href="/predstave/{{$p->IDPre}}">
                    <img class="img-responsive img-hover img-related" src="{{$p->Slika}}" alt="">
                    {{$p->Naziv}}
                </a>
            </div>

            @endforeach













</div>


@stop