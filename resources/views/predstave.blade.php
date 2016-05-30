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


       


        <form class="form-signin"  method="GET" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="well">
                    




            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group" >
                        <label float="right" >Predstava</label>
                        <input width="150px" type="text" class="form-control">
                        

                        </br></br>


                         
                    </div>
                </div>




                <div class="col-lg-6">
                     <div class="input-group">
                         <label float="right" >Izaberi pozoriste:</label>
                         <select width="150px" class="form-control" onchange="showUser(this.value)">
                            @foreach($pozorista as $poz)
                                 <option>{{$poz->Naziv}}</option>
                            @endforeach
                            
                            

                         </select>
                        <div id="txtHint"><b>Person info will be listed here...</b></div>

            


                     </div>

                </div>
                    <!-- /.input-group -->
            </div>
            



             <div class="row">

             <span class="input-group-btn">
                            <button width="150px" class="btn btn-default" type="button">Prikazi</button>
            </span>
             </div>



            </div>


         </form>




        





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
                <a class="btn btn-default" href="/vesti/{{$p->IDPre}}">Detaljnije</i></a>
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
     
