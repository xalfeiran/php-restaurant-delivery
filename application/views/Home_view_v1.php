<?php
	error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Viaja a Vacunarte</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
        <meta name="description" content="Viaja a Vacunarte de permite encontrar las mejores ofertas para ir a E.E.U.U a vacunarte contra Covid-19">
      <!-- Social Meta -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Viaja a Vacunarte | Turismo de Vacunación" />
    <meta property="og:description" content="Viaja a Vacunarte de permite encontrar las mejores ofertas para ir a E.E.U.U a vacunarte contra Covid-19" />
    <meta property="og:image" content="https://viajaavacunarte.com/assets/images/favicon.png" />
    <meta property="og:url" content="https://viajaavacunarte.com" />
    <meta property="fb:app_id" content="" />
    <meta property="og:site_name" content="Viaja a Vacunarte" />
    <meta name="twitter:title" content="Viaja a Vacunarte | Turismo de Vacunación" />
    <meta name="twitter:description" content="Viaja a Vacunarte de permite encontrar las mejores ofertas para ir a E.E.U.U a vacunarte contra Covid-19" />
    <meta name="twitter:image" content="https://viajaavacunarte.com/assets/images/favicon.png" />
    <meta name="twitter:card" content="summary_large_image" />
    
    <!-- Favicons-->
    <link rel="icon" type="image/png" sizes="256x256" href="https://viajaavacunarte.com/assets/images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/images/favicon.png"/>
    <!-- BOOTSTRAP Calendar -->
    <link href='/assets/css/fullcalendar.css' rel='stylesheet' />
    <link href='/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='/assets/css/localstyle.css' rel='stylesheet' />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-84D1SBK4J7"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-84D1SBK4J7');
    </script>
  </head>
  <body>
    <div class="home-header">
      <div class="row align-items-center">
      <div class="col-6">
        <h1 class="h1-home-header">Viaja a Vacunarte</h1>
      </div>
      <div class="col-6">
        <h3 class="lead" style="text-align: right;margin-right:2em;"><a href="/home/mapa" >Mira el mapa de cobertura</a></h3> 
      </div>
    </div>
   </div>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="flight-engine">
       <div class="container">
          <div class="col-md-12 tabing">
             <div class="tab-content">
              <form method="POST" action="/home/query">
                <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                <div id="1" class="tab1 active">
                   <div class="flight-tab row">
                      <div class="persent-one">
                         <i class="fa fa-map-marker" aria-hidden="true"></i>
                         <input type="text" id="origen" name="origen" class="textboxstyle" placeholder="Desde que ciudad?" data-bs-toggle="tooltip" data-bs-placement="top" title="Indica la ciudad de la cual sales, no todas las ciudades de México estan disponibles por el momento">
                      </div>
                      <div class="persent-one">
                         <i class="fa fa-map-marker" aria-hidden="true"></i>
                         <input type="text" id="destino" name="destino" class="textboxstyle" placeholder="Destino preferido" data-bs-toggle="tooltip" data-bs-placement="top" title="Si omites este dato, haremos la busqueda en los destinos mas populares de vacunación en E.E.U.U.">
                      </div>
                      <div class="persent-one less-per">
                         <i class="fa fa-calendar" aria-hidden="true"></i>
                         <input type="text" id="salida" name="salida" class="textboxstyle"  placeholder="YYYY-MM" data-bs-toggle="tooltip" data-bs-placement="top" title="Indica una fecha en formato AAAA-MM-DD para buscar en un día o AAAA-MM para buscar en todo el mes.">
                      </div>
                      <div class="persent-one less-per">
                         <i class="fa fa-calendar" aria-hidden="true"></i>
                         <input type="text" id="estadia" name="estadia" class="textboxstyle" placeholder="Dias de estadía" data-bs-toggle="tooltip" data-bs-placement="top" title="Indica el numero de dias que planeas estar de visita, el minimo es de 2 noches.">
                      </div>
                      <div class="persent-one">
                         <i class="fa fa-user" aria-hidden="true"></i>
                         <input type="text" id="pax" name="pax" class="textboxstyle" placeholder="# Adultos" data-bs-toggle="tooltip" data-bs-placement="top" title="Indica el numero de adultos que planean viajar (solo los adultos pueden ser vacunados por el momento">
                      </div>
                      <div class="persent-one less-btn">
                         <input type="submit" name="enviar" value="Buscar" class="btn btn-info cst-btn" id="srch">
                      </div>
                   </div>
                   <!-- flight tab -->
                </div>
                <div class="flight-tab row" style="margin-top: 0px;padding:0px;margin-left: 10px;">
                      <div class="persent-one">
                        <label for="vacany">Cualquiera</label>
                        <input type="checkbox" name="vacany" checked />
                      </div>
                      <div class="persent-one">
                        <label for="vacmoderna">Moderna</label>
                        <input type="checkbox" name="vacmoderna" />
                      </div>
                      <div class="persent-one">
                        <label for="vacpfizer">Pfizer</label>
                        <input type="checkbox" name="vacpfizer" />
                      </div>
                      <div class="persent-one">
                        <label for="vacjj">J & J</label>
                        <input type="checkbox" name="vacjj" />
                      </div>

                    </div>
                <!-- tab 1 -->
              </form>
             </div>
             <!-- tab content -->
          </div>
          <div class="row t-1">
            <div class="col-md-8" style="margin-top: 1em;">
              <p class="h4 lead" style="color:#fff;">En VIAJA A VACUNARTE te ayudamos a encontrar la mejor opción para hacer Turismo de Vacunación. Desde la ciudad que resides a uno de los destinos que mejor se acomoden a tu presupuesto. Sabemos que los precios de viaje cambian a cada instante. Nuestros algorimos analizan los precios de viaje y junto con la base de datos de vacunacion podemos darte las mejores opciones para viajar a Estados Unidos y en lo que puede ser un viaje express para volver con tu sticker de que has sido vacunado.</p>
            </div>
            <div class="col-md-3" style="margin-top:2em;margin-left: 0.5em;">
              <img src="/assets/images/vaccine-sticker.jpg" class="img-thumbnail" style="vertical-align: middle;" alt="Sticker Vacunacion">
            </div>
            
          </div>
        </div>
      </div>
      <div class="container">
          
          <div class="panel-body">
              <div id="resultado" style="display: none;"> 
                <table id="tblVuelos">
                  <th>Resultados</th>
                </table>
              </div>      
          </div>
          <!-- tabbing -->
       </div>
    </div>
    <div class="container">
        <div class="row">
          <p class="h2 tith2">¿Qué es el Turismo de Vacunación?</p>
          <p class="h4">

            Los Estados Unidos de America esta produciendo al dia de hoy mas y mas vacunas contra el Covid-19 que en otras partes del mundo. Ciudadanos de otras partes viajan a E.E.U.U. para vacunarse debido a que en sus países de origen este proceso de vacunación ha tardado más. Esto es llamado <strong>Turismo de Vacunacion</strong></p>.

        </div>
        <div class="row">
            <p class="h2 tith2">¿Qué vacunas hay disponibles?</p>
            <p class="h4">
              Al día de hoy en Estados Unidos estan disponibles las vacunas de Moderna, Pfizer-BioNTech las cuales requieren de hacer 2 rondas de vacunación para llegar a su maxima efectividad, tambien se esta aplicando la vacuna de Johnson & Johnson / Janssen la cual solo requiere una aplicación.
               </p>
        </div>
        <div class="row">
            <p class="h2 tith2">¿El Turismo de vacunación es legal?</p>
            <p class="h4">
              Si tienes una visa de turista o tienes permiso para ingresar a E.E.U.U. si es legal, pero no hay garantía de que puedas tener la vacuna. </p>
            <p class="h4">
              El proceso de realizar una cita previa en un establecimiento legalmente autorizado hace que tengas una muy alta seguridad de que tu dosis sea aplicada sin problema alguno. Aún asi es obligacion de cualquier portal informar que el gobierno de E.E.U.U. no ha implementado específicamente mecanismos para garantizar que puedas obtener una vacuna contra el Covid-19. Si viajas a E.E.U.U. debes de saber que podrías no ser vacunado, igual que cualquier otro ciudadano. </p>
        </div>

        <div class="row">
            <p class="h2 tith2">¿En qué estados de la Unión Americana te puedes vacunar si no eres residente?</p>
            <p class="h4">
              Esta información cambia constantemente y tiende a abrir nuevos estados donde puedes vacunarte sin tener la residencia, el Estado de Nueva York empezó a recibir turismo de vacunación a finales de Abril. </p>
            <p class="h4">
              Algunos de los estados donde es permitido la vacunación de turimo son: </p>
            <div class="container">
            <div class="row">
              <div class="col-sm-3">
                <p class="h4">Alabama</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Arizona</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">California</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Colorado</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Illinois</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Iowa</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Louisiana</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Michigan</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Minnesota</p>
              </div>
              <div class="col-sm-3">
                <p class="h4">Montana</p>
              </div>
              <div class="col-sm-3"><p class="h4">Nevada</p></div>
              <div class="col-sm-3"><p class="h4">Nuevo Mexico</p></div>
              <div class="col-sm-3"><p class="h4">Nueva York</p></div>
              <div class="col-sm-3"><p class="h4">North Carolina</p></div>
              <div class="col-sm-3"><p class="h4">North Dakota</p></div>
              <div class="col-sm-3"><p class="h4">Ohio</p></div>
              <div class="col-sm-3"><p class="h4">Oklahoma</p></div>
              <div class="col-sm-3"><p class="h4">Pennsylvania</p></div>
              <div class="col-sm-3"><p class="h4">South Carolina</p></div>
              <div class="col-sm-3"><p class="h4">Tennessee</p></div>
              <div class="col-sm-3"><p class="h4">Texas</p></div>
              <div class="col-sm-3"><p class="h4">Virginia</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <p class="h2 tith2">¿Qué magia arcana hace viajaavacunarte.com para conseguir la información que aqui consulta?</p>
            <p class="h4">Esta pagina utiliza información de bases de datos publicas, y cruzamos esta información con portales de viajes como skyscanner, y te proporcionamos los medios para que puedas planear tu viaje a vacunarte con el mejor precio, por que si eres como nosotros, vale la pena ahorrarte unos cuantos pesos, rupias, quetzales o la moneda que haya en tu pais.
              </p>
              <p class="h4">Está pagina se soporta con pura buena vibra y tiempo sentado en la compu alejado de mi hija, si te gusta o te parece interesante, compartela con tus amigos o conocidos, si crees que te ha ayudado, haz <a href="https://www.buymeacoffee.com/xalfeiran">clic aquí</a> e invitame una chela
              </p>
        </div>
        <div class="row">
          <p class="h2 tith2">Bibliografia</p>
            <p class="h4">Nosotros solo hacemos Copy + Paste de la información disponible en la red, pero al menos usamos fuentes oficiales, a continuación nuestra bibliografia.</p>
              <p class="font-monospace">Pagina de la CDC sobre las vacunas disponibles. <a href="https://www.cdc.gov/coronavirus/2019-ncov/vaccines/different-vaccines.html">https://www.cdc.gov/coronavirus/2019-ncov/vaccines/different-vaccines.html</a></p>
              <p class="font-monospace">Información sobre Turismo de Vacunación. <a href="https://www.visaplace.com/blog-immigration-law/vaccine-tourism/">https://www.visaplace.com/blog-immigration-law/vaccine-tourism/</a></p>
        </div>

    </div>
    <!-- Footer -->
<footer class="page-footer font-small" style="background-color: #ccc;">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">
        <ul class="list-unstyled">
          <li>
            <a href="/ppolicy.html">Politica de privacidad</a>
          </li>
        </ul>

      </div>
      
    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-white py-3">© 2021 Copyright:
    <a href="https://mindware.com.mx/">mindware.com.mx</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src='/assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src='/assets/js/fullcalendar.js' type="text/javascript"></script>
    <script src='/assets/js/moment.js' type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script >

      $( function() {
        var tagsplaces = [ <?php foreach($places as $place){ echo "{ label : '" . $place['city'] . "', value: '" . $place['iatacode'] . "'}," ; } ?>];
        $( "#destino" ).autocomplete({
          source: tagsplaces
        });

        var tagsorigenes = [ <?php foreach($origenes as $place){ echo "{ label : '" . $place['city'] . "', value: '" . $place['iatacode'] . "'}," ; } ?>];
        $( "#origen" ).autocomplete({
          source: tagsorigenes
        });
      } );


    </script>
  </body>
</html>