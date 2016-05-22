<!DOCTYPE html>
<html lang="en">



<head>
<style>
.windowModal {
    position: absolute;
    font-family: Arial, Helvetica, sans-serif;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.8);
    z-index: 99998;
    opacity:0;
    -webkit-transition: opacity 400ms ease-in;
    -moz-transition: opacity 400ms ease-in;
    transition: opacity 400ms ease-in;
    pointer-events: none;
}
.windowModal:target {
    opacity:1;
    pointer-events: auto;
}

.windowModal > div {
	
    width: 400px;
    position: relative;
    margin: 10% auto;
    padding: 5px 20px 13px 20px;
    border-radius: 10px;
    background: #1D1D1D;
    background: -moz-linear-gradient(#1D1D1D, #1D1D1D);
    background: -webkit-linear-gradient(#1D1D1D, #1D1D1D);
    background: -o-linear-gradient(#1D1D1D, #1D1D1D);
}
.close {
    background: #1D1D1D;
    color: #FFFFFF;
    line-height: 25px;
    position: absolute;
    right: -12px;
    text-align: center;
    top: -10px;
    width: 24px;
    text-decoration: none;
    font-weight: bold;
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 1px 3px #000;
    -webkit-box-shadow: 1px 1px 3px #000;
    box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #9e9e9e; }

.forma input[type="submit"], .forma input[type="button"] , .forma input[type="select"]{
	margin-top: 10px;
	font-family: 'Open Sans', sans-serif;
	cursor: pointer;
	background: #242424;
	border: 1px solid black;
	padding: 10px 24px;
	outline: none;
	color: #ffffff;
	font-size: 0.8em;
	text-transform: uppercase;
	
	border-radius: 2px;
	
	

}




.forma input[type="submit"]:hover, .forma input[type="button"]:hover {
	background: #9e9e9e;
	border: 1px solid #9e9e9e;
	

}

input[type="textbox"]{
z-index: 99999;
}


</style>



<script language="javascript">

	function izmeni(s){
		document.getElementById("sub").innerHTML=s;
		document.getElementById("tabela").value=s;
		return false;
	}
</script>


<script>
function OpenRegistracija() {
    window.open("http://www.w3schools.com", "_blank", "menubar=no", "toolbar=no,scrollbars=no,resizable=no,top=500,left=500,width=400,height=400");
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Grayscale - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">



    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i>  <span class="light">e</span> Poz
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<li class="active">
                        <a class="page-scroll"  href="admin.html">Admin</a>
                    </li>
					<li>
                        <a class="page-scroll" href="">Repertoar</a>
                    </li>
					<li>
                        <a class="page-scroll" href="#about">Vesti</a>
                    </li>
					<li>
                        <a class="page-scroll" href="">Predstave</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="">Pozorišta</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Glumci</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">O nama</a>
                    </li>
					<li>
                        <a href="#divModal" >Log in</a>
                    </li>
                </ul>
				
				

				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

				
	
	
	
	</br></br></br></br>
	
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
			
			
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Section Heading</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores iure maxime ducimus fugit.</p>
            </div>
        </div>
        <!-- /.row -->	
		
	</div>



    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </footer>

   <!-- jQuery -->
    <script src="js/jquery.js"></script>

	<!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

</body>

</html>