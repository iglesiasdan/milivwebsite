   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Daniel Iglesias" content="">
   

    <title>Centro Miliv</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/prism.css">
    <!-- Bootstrap theme -->
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="../js/jquery.js"></script>

<script src="ajax.js"></script>
<script src="jquery.js"></script>

<script type="text/javascript">

function myFunction(){

var n=document.getElementById('bus').value;

if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"proc.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    //document.getElementById("myDiv").style.border="1px solid #A5ACB2";

    }else{ document.getElementById("myDiv").innerHTML='<img src="load.gif" width="50" height="50" />'; }

  });

}

//-------------------------------


$(document).ready(function(){
 
  $( "#alert_nombre" ).hide();

  $( "#alert_n_terapias" ).hide();
  $("#alert_cedula").hide();
  $("#alert_referido").hide();
  $( "#alert_afeccion" ).hide(); 
$('#enviar').on("click",function(){
      var nombre = $("#bus").val();
      var refer = $("#referidop").val();//nuevo
      var fecha = $("#fecha_ingreso").val();
      var terapias = $("#n_terapias").val();
      var ced = $("#cedula").val();
      var afexion = $("#afeccion").val();
      var age = $("#edad").val();
      $( "#alert_nombre" ).hide();
      if(nombre == ""){
            $( "#alert_nombre" ).show();
            return;
          }
      $( "#alert_edad" ).hide();
      if(age == ""){
            $( "#alert_edad" ).show();
            return;
          }     
      $( "#alert_cedula" ).hide();
      if(ced == ""){
            $( "#alert_cedula" ).show();
            return;
          }     
      $( "#alert_referido" ).hide();
      if (refer == "") {
           $( "#alert_referido" ).show();
           return;
      }    
      $( "#alert_n_terapias" ).hide(); 
      if(terapias == ""){
            $( "#alert_n_terapias" ).show();
            return;
          }   
     
      $( "#alert_afeccion" ).hide();
      if(afexion == ""){
            $( "#alert_afeccion" ).show();
            return;
          }
      //alert(nombre.length());
      
      
     
      
      $( "#alert_fecha" ).hide();

      $('#myModal').modal('show');
    });

    $('#submit').on("click",function(){
//$('#myModal').modal('hide');
  //    alert("holis");
      var nombre = $("#bus").val();
      var referidox = $("#referidop").val();//nuevo]
      var ced = $("#cedula").val();
      //var t_paciente = $("#select_paciente").val();
      var terapias = $("#n_terapias").val();
      
      var afexion = $("#afeccion").val();
      
      $.post("insertar_paciente.php",{n:nombre,r:referidox,c:ced,ct:terapias,a:afexion},function(response){
        var insertar_paciente = response;
        if (insertar_paciente==1) {
          $('#myModal').modal('hide');
          $('#modal-success').modal('show');
             $("#bus").val("");
          $("#cedula").val("");          
          $("#afeccion").val("");
          $("#referidop").val("");
          $("#n_terapias").val("");
        };
        if (insertar_paciente==-1) {
          $('#myModal').modal('hide');
          $('#modal-error').modal('show');
        };
      });
      //console.log(datos);
      
    });//fin de la funcion del boton submit


});//fin del document ready


</script>

  
    
  </head>
  <body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" class="active" href="index.php">Miliv</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="dropdown"><!-- inicio del menu desplegable -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operaciones<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="paciente_fisioterapia.php">Registrar paciente atendido(fisioterapia)</a></li>
                
                <!--<li class="divider"></li> separador del menu desplegable 
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>-->
              </ul>
            </li><!-- fin del menu desplegable -->
            <li ><a href="#about">Acerca</a></li>
            <li><a href="insertar_prestador.php">Contacto</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!--fin del menu principal -->
    <div class="container theme-showcase" role="main">
      <div class="page-header">
        <h1>Registro de pacientes</h1>
      </div>

      <div class="jumbotron">
           
        </div>


      <div class="row">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Registro de datos del paciente</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                    <label for="bus">Nombre del Paciente</label>
                    <input type="text" id="bus" class="form-control" size="30" required="required" autofocus="autofocus" placeholder="Introduzca el nombre del paciente" />
              </div>
              <div id="alert_nombre" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del nombre que posee errores o esta vacio.
              </div>
              <div class="form-group" id="referencia">
                  <label for="cedula">Cedula</label>
                  <input name="cedula" type="text" class="form-control" id="cedula" data-rule-required="true" placeholder="Introduzca la cedula del paciente">
                </div>                
                <div id="alert_cedula" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la cedula posee errores o esta vacio.
              </div>

               <div class="form-group" id="edad">
                  <label for="edad">Edad</label>
                  <input name="edad" type="text" class="form-control" id="edad" data-rule-required="true" placeholder="Introduzca la cedula del paciente">
                </div>                
                <div id="alert_edad" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la edad posee errores o esta vacio.
              </div>

                <div class="form-group" id="referidop">
                  <label for="referidop">Referido por</label>
                  <input name="referidop" type="text" class="form-control" id="referidop" data-rule-required="true" placeholder="Introduzca el medio por el cual el cliente fue referido">
                </div>
                <div id="alert_referido" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del medio por el cual fue referido el paciente posee errores o esta vacio.
              </div>


              <div class="form-group" id="afeccion">
                  <label for="afeccion">Afeccion a tratar\Diagnostico</label>
                  <input name="afeccion" type="text" class="form-control" id="afeccion" data-rule-required="true" placeholder="Introduzca la afeccion que se tratara">
                </div>
                <div id="alert_afeccion" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del medio por el cual fue referido el paciente posee errores o esta vacio.
              </div>

                <div class="form-group">
                  <label for="n_terapias">Cantidad de terapias</label>
                  <input name="n_terapias" type="text" class="form-control" id="n_terapias" data-rule-required="true" placeholder="Introduzca la cantidad de terapias a recibir por parte del paciente">
                </div>
                 <div id="alert_n_terapias" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la cantidad de terapias a recibir posee errores o esta vacio.
              </div>

                

                       
                 <!-- Button trigger modal -->
                  <button class="btn btn-info" id="enviar">
                    Enviar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" align="center">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Alerta..!!!!</h4>
                        </div>
                        <div class="modal-body" align="center">
                          <span>Los cambios que desea realizar no se podran deshacer</span><br>
                          <span>esta seguro que desea continuar?</span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button id="submit" type="button"  class="btn btn-success">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal  de insercion exitosa en la base de datos-->
                  <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" align="center">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Operacion Exitosa..!!!!</h4>
                        </div>
                        <div class="modal-body" align="center">
                          <span>El paciente se ingreso de forma exitosa.</span><br>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal  de insercion erronea en la base de datos-->
                  <div class="modal fade" id="modal-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header" align="center">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title" id="myModalLabel">Operacion Fallida..!!!!</h4>
                        </div>
                        <div class="modal-body" align="center">
                          <span>El paciente no se ingreso debido a incongruencia de datos reviselos</span><br>
                          <span>e intente de nuevo</span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          
      </div>
      </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
    <script src="../js/bootstrap.min.js"></script>
     </body>



