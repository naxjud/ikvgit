<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>IKV Eventmanager</title>
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative|Ultra|Questrial|Coda|Alegreya+Sans|Montserrat+Alternates|News+Cycle|Quando|Poiret+One|Istok+Web|Oswald|Open+Sans|Gibson|Lobster|Righteous|Comfortaa|Bevan|Libre Baskerville' rel='stylesheet' type='text/css'>
    <link href="styles/bootstrap.min.css" rel="stylesheet" />
    <link href="styles/ikvem.css" rel="stylesheet" />

</head>
<body>

        <!--Navigation bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">IKV-Eventmanager</a>
            </div>
            <!--collect the nav links, forms, and other content for toggling-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Gebetskalender</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Termine <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="newevent.php">Termin Reservieren</a></li>
                            <li><a href="#">Jahresplan</a></li>
                            <li><a href="#">Monatsplan</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Section</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Section</a></li>                            
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Friction</a></li>
                            <li><a href="#">Section</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Section</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Section</a></li>
                        </ul>
                    </li>
                </ul>
            </div> 
        </div>
    </nav>

    <div class="container">
        <div class="row jumbotron" style="padding-top:80px">
            <div class="col-md-12 col-lg-12">
                <img id="me" alt="ikv-mainz e.V." src="images/ikvlogo.png" height="100px">
                <h1 class="title">IKV-Eventmanager</h1>
            </div>
        </div>