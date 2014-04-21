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
  $( "#div_cheque" ).hide();
  $( "#div_banco" ).hide();
  $( "#n_recibo" ).hide();
  $( "#n_factura" ).hide();
  $( "#alert_nombre" ).hide();
  $( "#alert_paciente" ).hide();
  $( "#alert_monto" ).hide();
  $( "#alert_banco" ).hide();
  $( "#alert_cheque" ).hide();
   $( "#alert_afec" ).hide();
  $( "#alert_facturacion" ).hide();
  $( "#alert_observacion" ).hide();
  $( "#alert_terapista" ).hide();
  $( "#alert_n_terapias" ).hide();
  $( "#alert_n_factura" ).hide();
  $( "#alert_n_recibo" ).hide();
  $( "#alert_pago" ).hide();
  $("#alert_referido").hide();

$("body").on("click",".sugerencias",function(event){

  event.preventDefault();
 // console.log($(this).attr('href'));
  var cod = $(this).attr('href');
 document.getElementById("myDiv").innerHTML="";
  $( "#tipo" ).hide();
  $.post("datos_persona.php",{q:cod},function(response){
        var datos_persona = JSON.parse(response);
      console.log(datos_persona);
        //console.log(datos_persona['0'].nombre);
        //console.log(datos_persona['0'].referido_por);
        var aux=1;
          $("#bus").val(datos_persona['0'].nombre);
          $("#cedula").val(datos_persona['0'].cedula);
          $("#n_terapias").val(parseInt(datos_persona['0'].n_terapias)-parseInt(aux))
          $("#afec").val(datos_persona['0'].afeccion);
          $("#referidop").val(datos_persona['0'].referido);

          var fecha = datos_persona['0'].fecha_ingreso;
          
   });
});


$('#metodo_pago').change(function(){
  if($(this).val()==="cheque"){
    $( "#div_cheque" ).show();
    $( "#div_banco" ).show();
    //alert($(this).val());
  }
  if($(this).val()==="debito" || $(this).val()==="efectivo"){
    $( "#div_cheque" ).hide();
    $( "#div_banco" ).hide();
    //alert($(this).val());
  }
});

$('#select_paciente').change(function(){
  if ($(this).val() === "nuevo"){
                $( "#referencia" ).show();
          };
  if ($(this).val() === "control"){
                $( "#referencia" ).hide();
          };
});

$('#facturacion').change(function(){
  if($(this).val()==="factura"){
    $( "#n_recibo" ).hide();
    $( "#n_factura" ).show();
  }
  if ($(this).val()==="recibo") {
    $( "#n_factura" ).hide();
    $( "#n_recibo" ).show();
  }
  if ($(this).val()==="hide") {
    $( "#n_factura" ).hide();
    $( "#n_recibo" ).hide();
  }

});

$('#send').on("click",function(){
      var nombre = $("#bus").val();
      var refer = $("#referidop").val();//nuevo
      var t_paciente = $("#select_paciente").val();
      var afec = $("#afec").val();
      var terapias = $("#n_terapias").val();
      var m_pago = $("#metodo_pago").val();
      var monto = $("#monto").val();
      var fact = $("#facturacion").val();//tipo de facturacion
      var n_banco = $("#banco").val();//cheque
      var cantidad = $("#monto").val();
      var n_cheque = $("#cheque").val();//cheque
      var n_fact = $("#factura").val();//fact
      var n_recib = $("#recibo").val();//recibo
      var observ = $("#observaciones").val();
      var terapist = $("#terapista").val();
      
      if(nombre == ""){
            $( "#alert_nombre" ).show();
            return;
          }
      if(t_paciente == ""){
            $( "#alert_paciente" ).show();
            return;
          }     
      if(afec == ""){
            $( "#alert_afec" ).show();
            return;
          }    

      if(terapias == ""){
            $( "#alert_n_terapias" ).show();
            return;
          }   
      if(m_pago == ""){
            $( "#alert_pago" ).show();
            return;
          }
      if (cantidad=="") {
        $( "#alert_monto" ).show();
        return;
      };  
      if (m_pago==="cheque") {
          if (n_banco == "") {
            $( "#alert_banco" ).show();
            return;
          };
          if (n_cheque=="") {
            $( "#alert_cheque" ).show();
            return;
          };
      };
      if (fact=="") {
        $( "#alert_facturacion" ).show();
        return;
      };
      if (fact=="factura") {
        if (n_fact=="") {
          $( "#alert_n_factura" ).show();
          return; 
        };
      };
      if (fact=="recibo") {
        if (n_recib=="") {
          $( "#alert_n_recibo" ).show();
          return;
        };
      };
      if (observ=="") {
          $( "#alert_observacion" ).show();
          return;
      };
      if (terapist=="") {
          $( "#alert_terapista" ).show();
          return;
      };
      //alert(nombre.length());
      $( "#alert_nombre" ).hide();
      $( "#alert_referido" ).hide();
      $( "#alert_paciente" ).hide();
      $( "#alert_n_terapias" ).hide();
      $( "#alert_pago" ).hide();
      $( "#alert_afec" ).hide();
      $( "#alert_banco" ).hide();
      $( "#alert_monto" ).hide();
      $( "#alert_cheque" ).hide();
      $( "#alert_facturacion" ).hide();
      $( "#alert_n_factura" ).hide();
      $( "#alert_n_recibo" ).hide();
      $( "#alert_observacion" ).hide();
      $( "#alert_terapista" ).hide();
      $('#MyModal').modal('show');
    });

    $('#enviar').on("click",function(){
//$('#myModal').modal('hide');
  //    alert("holis");
      var datos;

      var nombre = $("#bus").val();
      var ced = $("#cedula").val();
      var terapias = $("#n_terapias").val();
      var m_pago = $("#metodo_pago").val();
      var monto = $("#monto").val();
      var fact = $("#facturacion").val();//tipo de facturacion
      var n_banco = $("#banco").val();//cheque
      var cantidad = $("#monto").val();
      var n_cheque = $("#cheque").val();//cheque
      var n_fact = $("#factura").val();//fact
      var n_recib = $("#recibo").val();//recibo
      var observ = $("#observaciones").val();
      var terapist = $("#terapista").val();
      var afec = $("#afec").val();
      if (m_pago!='cheque') {
        n_cheque=000;
        n_banco='none';
      };
      if (fact=='factura') {
        datos= ced+":"+terapias+":"+m_pago+":"+monto+":"+fact+":"+afec+":"+n_banco+":"+cantidad+":"+n_cheque+":"+n_fact+":"+observ+":"+terapist;
      }else{
        datos= ced+":"+terapias+":"+m_pago+":"+monto+":"+fact+":"+afec+":"+n_banco+":"+cantidad+":"+n_cheque+":"+n_recib+":"+observ+":"+terapist;
      }
//datos= ced+":"+terapias+":"+m_pago+":"+monto+":"+fact+":"+afec+":"+n_banco+":"+cantidad+":"+n_cheque+":"+n_recib+":"+observ+":"+terapist;

      //console.log(datos);
      $.post("atender.php",{data:datos},function(response){
        var respuesta=response;
        if (respuesta==1) {
          $('#MyModal').modal('hide');
          $('#MyModal-success').modal('show');
          $("#bus").val("");
          $("#cedula").val("");
          $("#n_terapias").val("");
          $("#metodo_pago").val("");
          $("#monto").val("");
          $("#facturacion").val("");
          $("#banco").val("");
          $("#monto").val("");
          $("#cheque").val("");
          $("#factura").val("");
          $("#recibo").val("");
          $("#observaciones").val("");
          $("#afec").val("");
          $("#terapista").val("");
        };
        if (respuesta==-1) {
          $('#MyModal').modal('hide');
          $('#MyModal-error').modal('show');
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
                <li><a href="registro_paciente.php">Registrar paciente</a></li>
                <!--<li class="divider"></li> separador del menu desplegable 
                <li class="dropdown-header">Nav header</li>-->
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
        <h1>Panels</h1>
      </div>

      <div class="jumbotron">
           
        </div>


      <div class="row">

          <div class="panel panel-info">
            
            <div class="panel-heading">
              <h3 class="panel-title">Registro de pacientes atendidos por modulo de fisioterapia</h3>
            </div>
            <div class="panel-body">
              <div id="prueba" class="form-group">
                    <label for="bus">Nombre del Paciente</label>
                    <input type="text" id="bus" onkeyup="myFunction()" class="form-control" size="30" required="required" autofocus="autofocus" placeholder="Introduzca el nombre del paciente" />
                    <div id="myDiv"></div><br />
                    <div id="pers"></div>
              </div>
              <div id="alert_nombre" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del nombre que posee errores o esta vacio.
              </div>
              <div class="form-group" id="referencia">
                  <label for="cedula">Cedula</label>
                  <input name="cedula" type="text" class="form-control" id="cedula" data-rule-required="true" placeholder="Introduzca la cedula del paciente">
                </div>

                <div class="form-group">
                  <label for="afec">Afeccion a tratar</label>
                  <input name="afec" type="text" class="form-control" id="afec" data-rule-required="true" placeholder="Introduzca el numero de la terapia recibida">
                </div>
                <div id="alert_afec" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la afeccion a tratar posee errores o esta vacio.
                </div>

                <div class="form-group">
                  <label for="n_terapias">Cantidad de terapias</label>
                  <input name="n_terapias" type="text" class="form-control" id="n_terapias" data-rule-required="true" placeholder="Introduzca el numero de la terapia recibida">
                </div>
                <div id="alert_n_terapias" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la cantidad de terapias posee errores o esta vacio.
                </div>

                <div class="form-group">
                  <label for="t_paciente">Metodo de pago</label>
                  <select id="metodo_pago" class="form-control">
                    <option value="">Seleccione el metodo de pago</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="debito">Debito</option>
                    <option value="cheque">Cheque</option>
                  </select>
                </div>
                 <div id="alert_pago" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del metodo de pago posee errores o la seleccion no es valida.
              </div>

                <div class="form-group">
                  <label for="monto">Monto</label>
                  <input name="monto" type="text" class="form-control" id="monto" data-rule-required="true" placeholder="Introduzca el monto de la consulta">
                </div>
                 <div id="alert_monto" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del monto posee errores o esta vacio.
              </div>

                <div id="div_banco" class="form-group">
                  <label for="banco">Banco</label>
                  <input name="banco" type="text" class="form-control" id="banco" data-rule-required="true" placeholder="Introduzca el banco emisor del cheque">
                </div>
                 <div id="alert_banco" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del banco posee errores o esta vacio.
              </div>

                <div id="div_cheque" class="form-group">
                  <label for="cheque"># de cheque</label>
                  <input name="cheque" type="text" class="form-control" id="cheque" data-rule-required="true" placeholder="Introduzca el numero del cheque">
                </div>
                 <div id="alert_cheque" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del numero de cheque posee errores o esta vacio.
              </div>

                <div class="form-group">
                  <label for="emision">Tipo de Registro de pago</label>
                  <select id="facturacion" class="form-control">
                    <option value="">Seleccione el tipo de registro</option>
                    <option value="factura">Factura</option>
                    <option value="recibo">Recibo</option>
                  </select>
                </div>
                 <div id="alert_facturacion" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del tipo de registro de pago posee errores o la seleccion no es valida.
              </div>

                <div id="n_factura" class="form-group">
                  <label for="# de factura"># de Factura</label>
                  <input name="factura" type="text" class="form-control" id="factura" data-rule-required="true" placeholder="Introduzca el numero de la factura">
                </div>
                 <div id="alert_n_factura" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del numero de la factura posee errores o esta vacio.
              </div>

                <div id="n_recibo" class="form-group">
                  <label for="# de factura"># de Recibo</label>
                  <input name="recibo" type="text" class="form-control" id="recibo" data-rule-required="true" placeholder="Introduzca el numero de la recibo">
                </div>
                 <div id="alert_n_recibo" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del numero del recibo posee errores o esta vacio.
              </div>

                <div class="form-group">
                  <label for="observaciones">Observaciones</label>
                  <input name="observaciones" type="text" class="form-control" id="observaciones" data-rule-required="true" placeholder="Introduzca la observacion relacionada a la transaccion">
                </div>        
                 <div id="alert_observacion" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo de la observacion posee errores o esta vacio.
              </div>        

                <div class="form-group">
                  <label for="terapista">Terapista</label>
                  <input name="terapista" type="text" class="form-control" id="terapista" data-rule-required="true" placeholder="Introduzca el nombre del terapista que atendio al paciente">
                </div> 
                 <div id="alert_terapista" class="alert alert-danger">
                    <strong>Error!</strong> Revise el campo del nombre del terapista posee errores o esta vacio.
              </div>  

                       
                 <!-- Button trigger modal -->
                  <button class="btn btn-info" id="send">
                    Enviar
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                          <button id="enviar" type="button"  class="btn btn-success">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal exito -->
                  <div class="modal fade" id="MyModal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                  <!-- Modal erroneo-->
                  <div class="modal fade" id="MyModal-error" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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



