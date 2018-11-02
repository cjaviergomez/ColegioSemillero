<?PHP
     session_start();
     session_destroy();
    // pg_close($conn);

	 
?>

<!DOCTYPE html>
<html>
<head>
	 
	<title>CSD</title>
	<meta charset="utf-8"> 

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Hair salon templates for mens hair cut service provider.">
    <meta name="keywords" content="hair salon website templates free download, html5 template, free responsive website templates, website layout,html5 website templates, template for website design, beauty HTML5 templates, cosmetics website templates free download">
    <title>Men Salon | Hair Salon Website Templates Free Download</title>







    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">


    	<link rel="stylesheet" href="css/login.css">
	<link rel="shorcut icon" href="img/logo1.png">
	<link rel="stylesheet" href="css/normalize.css">

	<link href="css/StyleSheet.css" type="text/css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/responsiveslides.css">
	<script src="js/responsiveslides.js"></script>  

	<link rel="stylesheet" href="css/default.css">



	


	
	<!--[if IE]>
    	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  	<![endif]-->  

	<script>
		$(document).ready(function(){
			$("#slider-home").responsiveSlides({	
				speed:500,		
				nav: true,
				namespace: 'slid-btns',
				titleAnimation: 'bounceIn'
			});
		});
	</script>
</head>
<body>

<header class="cabecera">

    <div class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="index.html"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="index.html" title="Home">Home</a></li>
                                     <li><a href="contact.html" title="Contact Us">Contact</a> </li>
                                <li><a href="styleguide.html" title="Styleguide">styleguide</a> </li>
                                 <li><a href="styleguide.html" title="Styleguide">styleguide</a> </li>
                                <li><a href="contact2.html" title="Contact Us">Contact</a> </li>
                                <li><a href="#" role="button" data-toggle="modal" data-target="#myModal">Iniciar Sesión</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- BEGIN # BOOTSNIP INFO -->

<!-- END # BOOTSNIP INFO -->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
				<br><br><br>
					<img class="img-rounded" id="img_logo" src="img/logo3.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form action="validar_usuario.php" METHOD=POST id="login-form">

		                <div class="modal-body">

                            
			                 	    		

				    		<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
				    		<input id="clave" class="form-control" type="password"  name="clave" placeholder="contraseña" required>
       
        		    	</div>

				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Iniciar</button>
                            </div>
                            <br>
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn-link" >¿Olvidaste tu contraseña?</button>
                                <button id="login_register_btn" type="button" class="btn-link"></button>
                            </div>
				        </div>

                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">

		    				<input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                            </div>
                            <br>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn-link">Iniciar Sesión</button>
                                <button id="lost_register_btn" type="button" class="btn-link"></button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->

                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
    <!-- END # MODAL LOGIN -->

<div class="slider">
    <ul class="rslides" id="slider-home">
      <li>
        <img src="img/s1.jpg" alt="">
        <div class="caption">
          <h3 class="wow">CSD</h3>
           </br>
          <p class="wow"> </br><font size="6" color="white">Unica Institución educativa privada del barrio la Cumbre</font></p>
        </div>
      </li>
      <li>
        <img src="img/s3.jpg" alt="">
        <div class="caption">
          <h3 class="wow">Educación</h3>
            </br>
          <p class="wow"> </br><font size="6" color="white">Brindamos una educación personalizada.</font></p>
        </div>
      </li>
      <li>
        <img src="img/slide7.jpg" alt="">
        <div class="caption">
          <h3 class="wow">profesores</h3>
           
          <p class="wow"> </br><font size="6" color="white">Contamos con excelentes profesionales, en todas las areas.</font></p>
        </div>
      </li>
    </ul>
</div>



<section class="posts-wrap">



	<hgroup class="titulos-wrap">
		<h2 class="titulo wow fadeIn" data-wow-delay="0.3s">Actividades</h2>
		<h4 class="subtitulo wow bounceIn" data-wow-delay="0.6s">Algunas de las actividades del Colegio</h4>
	</hgroup>
	<div class="container">
		<figure class="post wow fadeInLeft" data-wow-delay="0.3s">
			<img src="img/s2.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
			<figcaption>
				<h4><a href="post/"> Festival de teatro</a></h4>
				
			</figcaption>
		</figure>
		<figure class="post wow fadeInLeft" data-wow-delay="0.6s">
			<img src="img/icfes2.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
			<figcaption>
				<h4><a href="post/"> Cursos saber 11</a></h4>
				
			</figcaption>
		</figure>
		<figure class="post wow fadeInLeft" data-wow-delay="0.9s">
			<img src="img/semillero4.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
			<figcaption>
				<h4><a href="post/"> Semana cultural </a></h4>
				
			</figcaption>
		</figure>
		<figure class="post wow fadeInLeft" data-wow-delay="1.2s">
			<img src="img/s5.jpg" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
			<figcaption>
				<h4><a href="post/"> Interclases CSD</a></h4>
				
			</figcaption>
		</figure>
	</div>
</section>


<section class="servicios">

	<hgroup class="titulos-wrap">
		<h2 class="titulo wow bounceIn" data-wow-delay="0.3s">Servicios</h2>
		<h4 class="subtitulo wow bounceIn" data-wow-delay="0.6s">Algunos de nuestros servicios</h4>
	</hgroup>
	<div class="container">
		<article class="item">
			<div class="icon">
				<span class="fa fa-film fa-4x wow bounceIn" data-wow-delay="0.1s"></span>
			</div>
			<header>
				<h4><a href="#">Teatro CSD</a></h4>
				<p align=justify> Este taller de teatro lúdico, ayuda a expresar auténticamente la propia individualidad. Se entregarán herramientas actorales que incorporarán ejercicios de sensibilización, creatividad corporal, creatividad vocal y expresión</p>
			</header>
		</article>
		<article class="item">
			<div class="icon">
				<span class="fa fa-graduation-cap fa-4x wow bounceIn"  data-wow-delay="0.4s"></span>
			</div>
			<header>
				<h4><a href="#">Educación Personalizada</a></h4>
				<p align=justify>El colegio Semillero dos Mil coherente con su quehacer educativo, promueve desde una Educación Personalizada, la Singularidad, Autonomía y Apertura que caracteriza a todo ser humano, para construir su proyecto de vida.</p>
			</header>
		</article>
		<article class="item">
			<div class="icon">
				<span class="fa fa-university fa-4x wow bounceIn" data-wow-delay="0.7s"></span>
			</div>
			<header>
				<h4><a href="#">Pruebas Saber 11</a></h4>
				<p align=justify>El examen de estado icfes para el ingreso a la educación superior es un tema de mucha importancia, por tal motivo preparamos a nuestros estudiantes, próximos a graduarse y con ansias de ingresar a una institución de educación superior. </p>
			</header>
		</article>
	</div>

	<hr style="width: 100%; color: #D8D8D8; height: 2px; background-color:#D8D8D8;" />
</section>


<section class="contactme clearfix">
	<div class="left">
		<span class="dotted">¿Necesitas algo?</span> Solo ponte en contacto conmigo y manos a la obra.
	</div>
	<div class="right">
		<a href="contacto" class="btn"> ¡Contáctame!</a>
	</div>
</section>
<footer class="footer">
	<p>Todos los derechos reservados &copy; 2017. Desarrollado por <a href="#">Jonathan Caballero </a></p>
</footer>

<script type="text/javascript" src="js/login.js" ></script>



<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

   <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 

    <script src="js/jquery.min.js"></script> -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <!-- sticky header -->
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>

</body>
<script src="bootstrap-modal.js"></script>


<script type="text/javascript" src="js/wow.min.js"></script>
<script>	
  new WOW().init();    
</script>
</html>