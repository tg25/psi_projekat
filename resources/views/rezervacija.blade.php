@extends("layoutStandard")



@section("content")


<div class="container">

         <!-- Page Heading/Breadcrumbs -->
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Rezervacija
                     <small id="sub"></small>
                 </h1>
                 <ol class="breadcrumb">
                     <li><a href="/">Home</a>
                     </li>
                     <li><a href="/predstave">Predstave</a>
                     </li>
                      <li><a href="/predstave">Pred</a>
                     </li>
                     <li class="active">Rezervacija</li>
                 </ol>
             </div>
         </div>
         <!-- /.row -->
         <div class="row">
<div class="col-md-1">
</div>
<div class="col-md-4">

		<div class="list-group">


           <form role="form" method="POST" action="{{ url('/rezervacija/remember') }}">
           				{{ csrf_field() }}
           		<input id="" name='IDReg' class="form-control" type="hidden" size="30" readonly value='{{Auth::user()->id}}'></input>
   						
   						<input id="IDPro" name="IDPro" class="form-control" type="hidden" size="30" readonly value="{{$projekcija->IDPro}}"></input>
              <input id="IDSala" name="IDSala" class="form-control" type="hidden" size="30" readonly value="{{$sala->IDSala}}"></input>
   						Pozorište:</br>
   						<input id="pozoriste" name="pozoriste" class="form-control" type="textbox" size="30" readonly value='{{$poz}}'></input></br>
   						Predstava:</br>
   						<input id="predstava" name='predstava' class="form-control" type="textbox" size="30" readonly value="{{$pred}}"></input></br>
   						Sala:
   						<input id="sala" name='sala' class="form-control" type="textbox" size="30" readonly value='{{$sala->Naziv}}'></input></br>
   						Datum:</br>
   						<input id="datum" name='datum' class="form-control" type="textbox" size="30" readonly value='{{$projekcija->Datum}}'></input></br>
   						Vreme:</br>
   						<input id="vreme" name='vreme' class="form-control" type="textbox" size="30" readonly value='{{$projekcija->Vreme}}'></input></br>
   						
   						
   					
 			
         </div>
</div>
<div class="col-md-2">
</div>
				<div class="col-md-4">
						Broj karata:</br>
						<select id="broj" name="broj" width="150px" class="form-control" onchange="Sala(this.value)">
							<option>-</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
						</select></br>
						<div id="skriveno" style="display:none;">
						Pozicija u sali:</br>
						<select id="mestoSala" name="poz" width="150px" class="form-control" onchange="Pozicija(this.value)">
						<option>-</option>
						 @foreach($cenovnik as $c)
							<option>{{$c->Tip}}</option>
						@endforeach	
						</select></br>
						</div>

						<div id=sedista>



						</div>
            <input type="submit" class='btn btn-default' value='REZERVIŠI'></input>
				</div>

		</form>
<div class="col-md-1">
</div>
</div>

<div class="row">
</br>
Cenovnik: </br> @foreach($cenovnik as $c) {{$c->Tip}}:{{$c->Cena}}RSD</br>@endforeach 

</div>

<script>
function Sala(mesto){

  if (mesto!='-'){
    document.getElementById("skriveno").style.display="inline";
    document.getElementById('sedista').style.display="none";
  }
  if(mesto=='-'){
  	document.getElementById("skriveno").style.display="none";
    document.getElementById('sedista').style.display="none";

  }

}
function Pozicija(str){
	 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById('sedista').style.display="inline";
                document.getElementById("sedista").innerHTML = xmlhttp.responseText;
            }
        };
        
        if(str.length>1)
        xmlhttp.open("GET","rezervacija/pronadji/"+str+'/'+document.getElementById('broj').value+'/'+document.getElementById('IDSala').value+'/'+document.getElementById('IDPro').value,true);
        else
        document.getElementById('sedista').style.display="none";

        xmlhttp.send();
    
}

</script>



@stop

