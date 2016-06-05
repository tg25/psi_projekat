@extends("layoutStandard")

    <!-- Navigation -->


@section("content")

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Three Column Portfolio
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Three Column Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->

    <div class="row">
                <div class="col-lg-6">
                    <div class="input-group" >
                        <label float="right" >Glumci</label>
                        <input autocomplete="false" id="Ime" name="Ime" width="150px" onkeyup="showGlumci(this.value)" type="text" class="form-control">
                        <div id = "autocomplete"></div>
                        

                        </br></br>


                         
                    </div>
                </div>
    </div>
</br><hr>




    <div id="glumci">
        @foreach($glumci as $g)
        <!-- Project One -->
        
             <div class="col-md-4 img-portfolio">
                <a href="portfolio-item.html">
                    <img class="img-responsive img-hover" src="{{$g->Slika}}" alt="">
                </a>
                <h3>
                    <a href="/glumci/{{$g->IDUce}}">{{$g->Ime }} {{$g->Prezime}}</a>
                </h3>
                
            </div>
        
        <!-- /.row -->

      

        @endforeach
        
    </div>



@stop