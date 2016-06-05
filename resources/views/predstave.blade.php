@extends("layoutStandard")

    <!-- Navigation -->


@section("content")

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Predstave
                    <small>Pretraga</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Predstave</li>
                </ol>
            </div>
        </div>


        <hr>
         <form class="form-signin"  method="POST" action="{{url('/predstave/prikazi')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                    




            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group" >
                        <label float="right" >Pretraga predstave po imenu</label>
                        <input autocomplete="false" id="Naziv" name="Naziv" width="150px" onkeyup="showAutoComplete(this.value)" type="text" class="form-control">
                        <div id = "autocomplete"></div>
                        

                        </br></br>


                         
                    </div>
                </div>


               

                <div class="col-lg-6">
                     <div class="input-group">
                         <label float="right" >Izaberi pozoriste:</label>
                         <select  id="NazivPoz" name="NazivPoz" width="150px" class="form-control" onchange="showUser(this.value)">
                            <option>--Sva pozorišta--</option>
                            @foreach($pozorista as $poz)
                                
                                 <option>{{$poz->Naziv}}</option>
                            @endforeach
                            
                            

                         </select>
                        <!--  <div id="txtHint"><b>Person info will be listed here...</b></div> -->

            


                     </div>

                </div>
                    <!-- /.input-group -->
            </div>
            


            


         </form>
         <hr>












         <div id="txtHint">
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
                <a class="btn btn-default" href="/predstave/{{$p->IDPre}}">Detaljnije</i></a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        @endforeach

        </div>
       

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
     
