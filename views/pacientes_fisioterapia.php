


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Centro Miliv</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-switch.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/prism.css">
    <!-- Bootstrap theme -->
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap-switch.js"></script> 
     <link rel="stylesheet" href="../dist/docs/foundation.css">
 
  

  <!-- Toggle Switch -->
  <link rel="stylesheet" href="../dist/toggle-switch.css">
   

    <!-- Custom styles for this template -->
     <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body role="document">

    <!-- inicio del menu  -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Miliv</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Inicio</a></li>
             <li class="dropdown"><!-- inicio del menu desplegable -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operaciones<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"></a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li><!-- separador del menu desplegable -->
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li><!-- fin del menu desplegable -->
            <li ><a href="#about">Acerca</a></li>
            <li><a href="insertar_prestador.php">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
<!-- fin del menu -->
<!-- inicio del body de la pagina -->
    <div class="container theme-showcase" role="main">
      
        <div class="page-header">
          
        </div>
        <div class="row">
          <div class="jumbotron"></div>
         
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">Registro de pacientes atendidos por modulo de fisioterapia</h3>
              </div>
              <div class="panel-body">
                <!-- contenido del panel -->
                <div class="form-group">
                  <label for="nombre_paciente">Nombre del Paciente</label>
                  <input name="nombre_paciente" type="text" class="form-control" id="nombre_paciente" data-rule-required="true" placeholder="Introduzca nombre del paciente">
                </div>

                <div class="form-group">
                  <label for="referido">Referido por</label>
                  <input name="referido" type="text" class="form-control" id="referido" data-rule-required="true" placeholder="Introduzca el medio por el cual el cliente fue referido">
                </div>

                <div class="form-group">
                  <label for="t_paciente">Tipo de paciente</label>
                  <select class="form-control">
                    <option>Seleccione el tipo de paciente</option>
                    <option value="control">Control</option>
                    <option value="nuevo">Nuevo</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="n_terapias">Cantidad de terapias</label>
                  <input name="n_terapias" type="text" class="form-control" id="n_terapias" data-rule-required="true" placeholder="Introduzca el numero de la terapia recibida">
                  <div class="form-group">
                    <input type="checkbox" name="my-checkbox" checked>
                  </div>
                </div>

                <div class="form-group">
                  <label for="monto">Monto</label>
                  <input name="monto" type="text" class="form-control" id="monto" data-rule-required="true" placeholder="Introduzca el monto de la consulta">
                </div>

                <div class="form-group">
                  <label for="nombre_paciente">Nombre del Paciente</label>
                  <input name="nombre_paciente" type="text" class="form-control" id="nombre_paciente" data-rule-required="true" placeholder="Introduzca nombre del paciente">
                </div>

                <div class="form-group">
                  <label for="nombre_paciente">Nombre del Paciente</label>
                  <input name="nombre_paciente" type="text" class="form-control" id="nombre_paciente" data-rule-required="true" placeholder="Introduzca nombre del paciente">
                </div>
              </div>
            </div>
         
        
        </div>
      

</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/bootstrap.min.js"></script>

    
  </body>

</html>
