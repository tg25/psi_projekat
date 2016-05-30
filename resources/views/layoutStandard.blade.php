<!DOCTYPE html>
<html lang="en">



<head>

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<script type="text/javascript">

$.ajaxSetup({
 headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}


} );

</script>


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
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/grayscale.css" rel="stylesheet">

    <link href="/css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <li>
                        <a class="page-scroll" href="">Repertoar</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/vesti/">Vesti</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="">Predstave</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="/pozorista">Pozorišta</a>
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

                <div id="divModal" class="windowModal">
                    <div>
                        <a href="#close" title="Close" class="close">X</a>
                        <h2 align="left">Log in</h2>
                        <form class="forma">
                            Email</br>
                            <input class="form-control" type="textbox" size="40" ></br>
                            Vaša šifra</br>
                            <input class="form-control" type="password" size="40" ></br></br>
                            <input type="checkbox" name="zapamtime" value="">Zapamti me</br>
                            Nemate nalog? Napravite ga <b><i><font color="white"><a href="#divModalRegister">ovde</a></font></i></b></br></br>
                            <a href="#close"><input align="right" type="button" value="Zatvori"></input></a>
                            <input align="right" type="submit" value="Log in"></input>
                        </form>
                    </div>
                </div>
                
                <div id="divModalRegister" class="windowModal">
                    <div>
                        <a href="#close" title="Close" class="close">X</a>
                        <h2 align="left">Log in</h2>
                        <form class="forma">
                            Vaše ime</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            Vaše prezime</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            Vaš kontakt telefon</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            Email</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            Vaša šifra</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            Potvrdite vašu šifru</br>
                            <input class="form-control" type="textbox" size="40"></br>
                            
                            <input type="checkbox" name="zapamtime" value="">Zapamti me</input></br>
                            
                            <a href="#close"><input align="right" type="button" value="Zatvori"></input></a>
                            <input align="right" type="submit" value="Log in"></input>
                        </form>
                    </div>
                </div>
    
    
    <!-- Intro Header -->
    
    <div class="container">
        @yield('content')
   </div>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; Your Website 2014</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="/text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/grayscale.js"></script>

</body>

</html>
