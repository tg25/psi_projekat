@extends('layoutStandard')

@section('header')

<!-- Intro Header -->
</br>
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
					
                        <h1 class="brand-heading">E poz</h1>
                        <p class="intro-text">Great theatre is about challenging how we think and encouraging us to fantasize about a world we aspire to.<br><i>Willem Dafoe</i></p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

   

    <!-- Download Section -->
    <section id="download" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Rezervišite karte</h2>
                    <p>Možete da jednostavno pregledate i pretražujete repertoar za različita pozorišta. Rezervišite i kupite karte sa samo par klikova mišem.</p>
                    <a href="/repertoar/svePrikaz" class="btn btn-default btn-lg">Repertoar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Kontaktirajte tim Angler</h2>
                <p>Slobodno nam pošaljite vaše predloge za poboljšanje sajta i ukoliko imate bilo kakva pitanja pošaljite nam poruku!</p>
                <p><a href="mailto:feedback@startbootstrap.com">feedback@angler.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection
