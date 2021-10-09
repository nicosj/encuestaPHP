<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Encuesta</title>
		<link rel="stylesheet" href="assets/css/materialize.css">
        <link rel="stylesheet" href="assets/css/estilo.css">

	</head>

	<body>

    <div class="container ">

            <div class="row seccion ">
                <div class="col s8 m8 offset-s4 offset-m4 ">

                    <div class="stepwizard  ">
                        <div class="stepwizard-row panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" id="identificacion" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Etapa 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" id="identificacion" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Etapa 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" id="identificacion" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Etapa 3</p>
                            </div>

                        </div>
                    </div>
            </div>
            </div>
            <div class="row container seccion">
                <div class="col m12">
                        <div class="card">
                                <div class="card-content">
                                <form id="nuevo" name="nuevo" method="POST"  autocomplete="off">
                                    <div class="row tarjeta" id="step-1">
                                        <div class="col m12">
                                           <div class="col s12 m6 marcado">
                                               <h5>Dato Personal</h5>
                                           </div>
                                            <div class="input-field col s12 m6 marcado">

                                                    <label for="name" class=" blue-text ">Nombre</label>
                                                    <input maxlength="100" id="name" name="nombre" type="text" required="required" />

                                            </div>
                                            <button id="primero" class="btn btn-primary btns nextBtn right" disabled type="button">Siguiente</button>
                                        </div>
                                    </div>
                                    <div class="row tarjeta" id="step-2">
                                        <div class="col m12">
                                            <div class="col m12 ">
                                                <div class="col s12 m6 marcado">
                                                    <h5>Sexo</h5>
                                                </div>
                                                <div class="input-field col s12 m6 marcado">
                                                    <select required="required" id="sexo" name="sexo">
                                                        <option value="0" disabled selected>Elejir</option>
                                                        <option value="1">Hombre</option>
                                                        <option value="2">Mujer</option>

                                                    </select>
                                                    <label for="sexo"  class=" blue-text ">Seleccionar</label>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary prevBtn center btns" type="button">Anterior</button>
                                            <button class="btn btn-primary nextBtn right btns" disabled type="button" id="segundo">Siguiente</button>
                                        </div>
                                    </div>
                                    <div class="row tarjeta" id="step-3">
                                        <div class="col m12">
                                            <div class="col m12 center">
                                                <div class="col s12 m6 marcado">
                                                    <h5>¿Tienes algun Hobby?</h5>
                                                </div>
                                            <div class="input-field col s12 m6 marcado">

                                                <select required="required" name="hobby[]" id="hobby" multiple>
                                                    <option  value="0" >Ninguno</option>
                                                    <option  value="1">Deporte</option>
                                                    <option  value="2">Musical</option>
                                                    <option  value="3">Cocina</option>
                                                    <option  value="4">Literario</option>
                                                    <option  value="5">Manualidades</option>
                                                    <option  value="6">Juegos</option>
                                                    <option  value="7">Modelismo</option>
                                                    <option  value="8">Baile</option>
                                                    <option  value="9">Cine</option>
                                                    <option  value="10">Otro</option>

                                                </select>
                                                <label for="hobby"  class=" blue-text "> seleccionar:</label>

                                        </div>
                                                <div   class="input-field hobby  col s12">
                                                    <input maxlength="100" id="a0" name="caja[0]"  value="0"  type="number" hidden  disabled>
                                                </div>
                                      <div class="col s12 s6 m12">
                                      <div   class="input-field hobby  col s12">
                                            <label for="a1"  class=" blue-text " >Deportes: min mensuales </label>
                                            <input maxlength="100" id="a1" name="caja[1]"   type="number"  disabled>
                                       </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a2"  class=" blue-text " >Musica: min mensuales</label>
                                              <input maxlength="100" id="a2" name="caja[2]"   type="number"  disabled>

                                          </div>
                                          <div   class="input-field hobby  col s12">
                                              <label for="a3"  class=" blue-text " >Cocina: min mensuales</label>
                                              <input maxlength="100" id="a3" name="caja[3]"   type="number"  disabled>

                                          </div>
                                          <div   class="input-field hobby  col s12">
                                              <label for="a4"  class=" blue-text " >Literario: min mensuales</label>
                                              <input maxlength="100" id="a4" name="caja[4]"   type="number"  disabled>

                                          </div>
                                          <div   class="input-field hobby  col s12">
                                              <label for="a5"  class=" blue-text " >Manualidades: min mensuale</label>
                                              <input maxlength="100" id="a5" name="caja[5]"   type="number"  disabled>

                                          </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a6"  class=" blue-text " >Juagos: min mensuales</label>
                                              <input maxlength="100" id="a6" name="caja[6]"   type="number"  disabled>

                                          </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a7"  class=" blue-text " >Modelismo: min mensuales</label>
                                              <input maxlength="100" id="a7" name="caja[7]"   type="number"  disabled>
                                          </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a8"  class=" blue-text " >Baile: min mensuales</label>
                                              <input maxlength="100" name="caja[8]" id="a8"   type="number"  disabled>
                                          </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a9"  class=" blue-text " >Cine: min mensuales</label>
                                              <input maxlength="100" id="a9" name="caja[9]"  type="number"  disabled>
                                          </div>
                                          <div   class="input-field  hobby col s12">
                                              <label for="a10"  class=" blue-text " > Otro: min mensuales</label>
                                              <input maxlength="100" id="a10" name="caja[10]"   type="number"  disabled>
                                          </div>
                                       </div>
                                    </div>
                                            <button class="btn btn-primary prevBtn btns " type="button">Anterior</button>
                                            <button data-target="modal1" class="btn modal-trigger right btns" id="finalizar" disabled >Finalizar </button>
                                    </div>
                                    </div>
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <h6>Gracias por su Visita</h6>
                                            <p>¿Desea finalizar la encuesta?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a  class="modal-close waves-effect waves-red btn-flat left">cancelar</a>
                                            <button  class="waves-effect waves-green btn-flat" type="submit">Aceptar</button>
                                        </div>
                                    </div>
                                </form>
                                </div>


                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col m12">
                    <div class="">
                        <div id="preview">

                        </div>

                    </div>
                </div>
            </div>




    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/materialize.js" ></script>
        <script src="assets/js/script.js" ></script>

	</body>
</html>
