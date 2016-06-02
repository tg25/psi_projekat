@extends('layoutStandard')

@section ('title', 'Admin')

 @section('content')
 <script language="javascript">


</script>
 <div class="container">

         <!-- Page Heading/Breadcrumbs -->
         <div class="row">
             <div class="col-lg-12">
                 <h1 class="page-header">Administrator
                     <small id="sub"></small>
                 </h1>
                 <ol class="breadcrumb">
                     <li><a href="index.html">Home</a>
                     </li>
                     <li class="active">Administrator</li>
                 </ol>
             </div>
         </div>
         <!-- /.row -->


  <!-- Content Row -->
         <div class="row">
             <!-- Sidebar Column -->
             <div class="col-md-3">
                 <div class="list-group">

                     <a href="" class="list-group-item" onclick="return izmeni('Pozorišta');">Pozorišta</a>
                     <a href="" class="list-group-item" onclick="return izmeni('Predstave');">Predstave</a>
                     <a href="" class="list-group-item" onclick="return izmeni('Glumci');">Glumci</a>
                     <a href="" class="list-group-item" onclick="return izmeni('Repertoar');">Repertoar</a>

                 </div>

 				<div class="list-group">
           <form>
   						Selektovana tabela:</br>
   						<input id="tabela" class="form-control" type="textbox" size="30" readonly></input></br></br>
   						<div class="radio">
   						  <label><input type="radio" name="optradio">Izmeni</label>
   						</div>
   						<div class="radio">
   						  <label><input type="radio" name="optradio">Dodaj</label>
   						</div>
   						<div class="radio">
   						  <label><input type="radio" name="optradio">Obriši</label>
   						</div>
 					 </form>
         </div>
             </div>

               <?php $predstave=""; ?>
             <!-- Content Column -->

             <div class="col-md-9" id="txtHint">
            <?php   ?>
             </div>
         </div>
         <!-- /.row -->

 	</div>
 @stop
