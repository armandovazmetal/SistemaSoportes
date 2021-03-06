<link rel="stylesheet" href="<?php echo CSS; ?>/info_soporte.css">
<link rel="stylesheet" href="<?php echo CSS; ?>/mis_soportes.css">
<link rel="stylesheet" href="<?php echo CSS; ?>/historial.css">

<script src="<?php echo JS; ?>/historial.js" onload="obtenerHistorico()">

</script>
<script src="<?php echo JS; ?>/info_soportes.js" onload="buscarTodosIntegrantes()">

</script>

<div class="container-fluid page-container info-style">
<!--titulo para indicar de que equipo se esta viendo el historial-->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <h3 class="titulo-h mb-0">Historial</h3>
      <h6 class="titulo-h mb-4" id="equipoTitulo"></h6>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" id="ProbReportado">
      <h3 class="titulo-h mb-0">Problema reportado</h3>
    </div>
  </div>
<!--Integrante(s) de UC asignados-->
  <div class="row mb-2">
    <div class="col-md-3 col-sm-3 col-sx-12">
      <h5>Integrante(s) asignado(s)</h5>
    </div>
    <div class="col-md-6 col-sm-6 col-sx-12">
      <form class="asig-IUC" action="informacion_soportes" method="post" id="AsignarIUC"><!--se ejecutara una funcion para agregar al integrante-->
        <div class="row">
          <div class="col-md-5 col-sm-5 col-sx-12">
          <!--  <input class="form-control" type="text" name="nombre-IUC" placeholder="Nombre integrante" id="IUCElegido">-->
            <select id="IUCElegido" class="form-control custom-select d-block w-100" name="IUCElegido">
              <option value="">Selecciona Integrante</option>
            <!--<option value="hidraulica">Hidraulica</option>-->
            </select>
          </div>
          <div class=""  >
            <input class="form-control" type="text" name="idIntegrante" id="idIntegrante">
          </div>
          <div class="col-md-3 col-sm-3 col-sx-12">
            <button name="btn-asignar" type="button" class="btn btn-primary bg-primary" onclick="AsignarIntegrante()">Asignar</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3 col-sm-3 col-sx-12">
      <p class="fecha_soporte_agen mb-0" id="FechayHora"></p>
    </div>
  </div>
  <!--para mostrar todos lo integrantes involucrados en el soporte -->
  <div class="row justify-content-center">
    <div class="col-md-12 col-sm-12 col-sx-12" id="IUCINV">
      <p class="form-control" id="involucrados"></p>
    </div>
  </div>
  <!--para indicar si se instaló algun SW y selecionar cual-->
  <div class="row justify-content-center">
    <div class="col-md-3 col-sm-3 col-sx-12">
      <button class="btn btn-info btn-h mb-2" data-toggle="collapse" href=".collapse-sw">Instalación de Software</button>
    </div>
    <div class="col-md-3 col-sm-3 col-sx-12">
      <button class="btn btn-info btn-h mb-2" data-toggle="collapse" href=".op-resguardo">Resguardo de equipo</button>
    </div>
  </div>
  <div class="row mb-2 collapse collapse-sw" id="collapse-sw-l">
    <div class="col-md-3 col-sm-3 col-sx-12 collapse collapse-sw" id="collapse-sw">
      <!--<select id="SW" class="form-control mb-2 custom-select d-block w-100" name="SW-inst">
        <option value="">-</option>
        <option value="">Office</option>
        <option value="">Antivirus</option>
        <option value="">WinRAR</option>
        <option value="">PDF</option>
        <option value="">AutoCAD</option>
        <option value="">ArcGIS</option>
        <option value="">AntiSpyware</option>
      </select>-->
      <div class="form-check">
        <label class="form-check-label" for="check1">
          <input type="checkbox" class="form-check-input" id="check1" name="software[]" value="Office">Office
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="check2">
          <input type="checkbox" class="form-check-input" id="check2" name="software[]" value="Antivirus">Antivirus
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="check3">
          <input type="checkbox" class="form-check-input" id="check3" name="software[]" value="WinRAR">WinRAR
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="check4">
          <input type="checkbox" class="form-check-input" id="check4" name="software[]" value="PDF">PDF
        </label>
      </div>

    </div>
    <div class="col-md-3 col-sm-3 col-sx-12">
      <div class="form-check">
        <label class="form-check-label" for="check5">
          <input type="checkbox" class="form-check-input" id="check5" name="software[]" value="AutoCAD">AutoCAD
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="check6">
          <input type="checkbox" class="form-check-input" id="check6" name="software[]" value="ArcGIS">ArcGIS
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="check7">
          <input type="checkbox" class="form-check-input" id="check7" name="software[]" value="AntiSpayware">AntiSpayware
        </label>
      </div>
    </div>
    <!--<div class="col-md-12 col-sm-12 col-sx-12">
      <p class="form-control">Software a instalar</p>
    </div>-->
  </div>

  <div class="row collapse op-resguardo mb-2">
    <div class="col-md-12 col-sm-12 col-sx-12 op-resguardo">
      <label for="resg">Indica los equipos que quedan a Resguardo</label>
      <input id="resg" class="form-control" type="text" name="eq-resguardo" placeholder="Equipos a resguardo...">
    </div>
  </div>

  <!--seccion para la indicar la solucion y terminar el soporte -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-sx-12">
      <form class="soporte-ter" action="info_soportes_controller" method="post" id="STermino"><!--cuando el soporte termine y se agregue la solución-->
        <label for="SolucionSoporte">Solución:</label>
        <textarea id="SolucionSoporte" class="form-control sol-ovfw" name="SolucionSoporte" rows="4" placeholder="Describe cómo solucionaste el problema" required></textarea>
        <div class="row btn-end-sop mt-2">
          <div class="col-md-12 col-sm-12 col-sx-12">
            <button name="end-soporte" type="button" onclick="TerminarSoporte()" class="btn btn-primary bg-success">Terminar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--boton para indicar que se terminó el soporte-->

<!--informacion del equipo-->
  <div class="row justify-content-left">
    <div class="col-md-12 col-sm-12 col-sx-12">
      <div class="panel-group">
        <div class="panel panel-default">
          <button class="btn btn-info mb-2" data-toggle="collapse" href="#collapse1">Informacion del equipo</button>
          <div id="collapse1" class="collapse">
            <div class=" card box-info-equipo">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-sx-12">
                  <h5 class="subtit tit-info-equipo">Información</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-3">
                  <p>Responsable del Equipo</p>
                  <p class="form-control" id="Nombre"></p>
                </div>
                <div class="col-2">
                  <p>Departamento</p>
                  <p class="form-control" id="Departamento"></p>
                </div>
                <div class="col-2">
                  <p>Cubículo/Salón</p>
                  <p class="form-control" id="Cubiculo"></p>
                </div>
                <div class="col-2">
                  <p>Teléfono</p>
                  <p class="form-control" id="Telefono"></p>
                </div>
                <div class="col-1">
                  <p>Ext.</p>
                  <p class="form-control" id="Ext"></p>
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-md-2">
                  <p>Tipo de Equipo</p>
                  <p class="form-control" id="TipoEquipo"></p>
                  <!--<input id="TipoEquipo" class="form-control" type="text" name="TipoEquipo" placeholder="TipoEquipo">-->
                </div>
                <div class="col-md-2">
                  <p>Marca</p>
                  <p class="form-control" id="Marca"></p>
                </div>
                <div class="col-md-2">
                  <p>Modelo</p>
                  <p class="form-control" id="Modelo"></p>
                </div>
                <div class="col-md-2">
                  <p>No. de Serie</p>
                  <p class="form-control" id="NoSerie"></p>
                </div>
                <div class="col-md-2">
                  <p>No. de Inventario</p>
                  <p class="form-control" id="NoInventario"></p>
                </div>
                <div class="col-1">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
              <!--  <div class="col-md-2">
                  <p>Sistema Operativo</p>
                  <p class="form-control">Windows 10</p>
                </div>-->
              <!--  <div class="col-md-2">
                  <p>Procesador</p>
                  <p class="form-control">Intel i7-543636</p>
                </div>-->
                <div class="col-md-2">
                  <p>MAC-Addres</p>
                  <p class="form-control" id="MAC"></p>
                </div>
                <div class="col-md-2">
                  <p>HOST</p>
                  <p class="form-control" id="Host"></p>
                </div>
                <div class="col-1">
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-md-10">
                  <p>Software instalado en el equipo:</p>
                  <p class="form-control" id="SWInstalado"></p>
                </div>
                <div class="col-1">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!--titulo de la seccion que muestra las soluciones a soportes anteriores-->
  <div class="row justify-content-left">
    <div class="col-md-12 col-sm-12 col-sx-12">
      <h4 class="mb-3 subtit">Soportes Anteriores</h4>
    </div>
  </div>
<!--Historial de problemas y soluciones dadas-->
<div id="RegistroHistorial">


  <!--termina un registro-->
  <!--Historial de problemas y soluciones dadas-->

    <!--termina un registro-->
</div>
</div>
