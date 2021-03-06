

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

    <script src="js/smooth-scroll.min.js"></script>

    <script>

        var scroll = new SmoothScroll('a[href*="#"]', {
    // Selectors
    ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
    header: null, // Selector for fixed headers (must be a valid CSS selector)

    // Speed & Easing
    speed: 700, // Integer. How fast to complete the scroll in milliseconds
    offset: 0, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
    easing: 'easeInOutCubic', // Easing pattern to use
    customEasing: function (time) {}, // Function. Custom easing pattern

    // Callback API
    before: function () {}, // Callback to run before scroll
    after: function () {} // Callback to run after scroll
     });
        


    </script>


    


    
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

    <div class="header" id="slider-home2">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="index.html"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li ><a data-scroll href="#slider-home2" title="Home">Inicio</a></li>
                                     <li><a data-scroll href="#seccion7" title="Contact Us">¿Quienes Somos?</a> </li>
                                      <li><a data-scroll href="#seccion1" title="Styleguide">Servicios</a> </li>
                                      <li><a data-scroll href="#seccion2" title="Styleguide">Actividades</a> </li>
                                
                                <li><a data-scroll href="#seccion4" title="Contact Us">Contactenos</a> </li>
                                <li><a href="inicio.php" title="Contact Us">Iniciar Sesión</a> </li>
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
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                <br><br><br><br><br><br>
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

<div class="slider" >

    <ul class="rslides" id="slider-home">
      <li>
        <img src="images/nenas3.jpg" alt="">
        <div class="caption">
          <h3 class="wow">CSD</h3>
           </br>
          <p class="wow"> </br><font size="6" color="white">Unica Institución educativa privada del barrio la Cumbre.</font></p>
        </div>
      </li>

      <li>
        <img src="images/chinos2.jpg" alt="">
        <div class="caption">
          <h3 class="wow">Educación</h3>
            </br>
          <p class="wow"> </br><font size="6" color="white">Brindamos una educación personalizada.</font></p>
        </div>
      </li>

      <li>
        <img src="img/nenas2.jpg" alt="">
        <div class="caption">
          <h3 class="wow">profesores</h3>
           
          <p class="wow"> </br><font size="6" color="white">Contamos con excelentes profesionales.</font></p>
        </div>
      </li>



            <li>
        <img src="img/semillero3.jpg" alt="">
        <div class="caption">
          <h3 class="wow">CSD</h3>
           
          <p class="wow"> </br><font size="6" color="white">Nuestro compromiso es la educación.</font></p>
        </div>
      </li>


    </ul>
</div>


<div  id="seccion7" >
  
        <div class="space-medium bg-default" style=" background:#F2F2F2 url('img/bg3.png')" >
              <p>.</p>
        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"><img class="wow fadeInLeft" data-wow-delay="0.4s" src="images/chinos.jpg" alt="" class="img-thumbnail"></div>
                <div class="wow fadeInRight" data-wow-delay="0.4s" >
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="well-block">
                        <h1>¿Quienes Somos?</h1>
                        <h5 class="small-title ">Colegio semillero dos mil</h5>
                        <p>El colegio semillero dos mil es una educativa privada con sede en el barrio la cumbre de floridablanca, que por más de 20 años a brindado una educación de calidad a todos los habitantes de la cumbre y floridablanca, brindando los servicios de primaria y bachillerato.</p>

                    
                        <a href="# " class="btn btn-primary">Ver más</a> </div>
                </div></div>
            </div>
        </div>
    </div>

</div>





    <div class="space-medium" id="seccion1" >
        <div class="container">
            <div class="row">


                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                     <font face="cursive">   <h1 class="titulo wow fadeInDown" data-wow-delay="0.2s"  >Servicios</h1> </font>
                        <h5 class="small-title">Algunos de nuestros servicios</h5>
                    </div>
                    <!-- /.section title start-->
                </div>


            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                       

                        <figure  class="post wow fadeInUp" data-wow-delay="0.4s">
                        <img  class="img-thumbnail"  src= "img/s2.jpg"   height="300" width="300"> 
                         </figure>



                        <br>

                    <div class="testimonial-block">

                      
                        <!-- testimonial block -->
                        <div class="testimonial-content">
                            <p class="testimonial-text">“Teatro lúdico, ayuda a expresar auténticamente la propia individualidad.”</p>
                        </div>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name">Taller de teatro</h4>
                            <span class="testimonial-meta"></span> <span class="testimonial-meta"></span> </div>
                    </div>
                    <!--/. testimonial block -->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                    
                          <figure  class="post wow fadeInUp" data-wow-delay="0.4s">
                        <img  class="img-thumbnail"  src= "img/nenas.jpg"   height="300" width="300"> 
                         </figure>
                     <br>

                    <div class="testimonial-block">
                        <!-- testimonial block -->
                        <div class="testimonial-content">
                            <p class="testimonial-text">“Promueve desde una Educación Personalizada, la Autonomía, para construir su proyecto de vida”</p>
                        </div>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name">Educación Personalizada</h4>
                            <span class="testimonial-meta"></span> <span class="testimonial-meta "></span> </div>
                    </div>
                    <!--/. testimonial block -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">


                   
                        <figure  class="post wow fadeInUp" data-wow-delay="0.4s">
                        <img  class="img-thumbnail"  src= "img/icfes2.jpg"   height="300" width="300"> 
                         </figure>
                        <br>
                    <div class="testimonial-block">
                        <!-- testimonial block -->
                        <div class="testimonial-content">
                            <p class="testimonial-text">“Preparación del examen de estado icfes, para el ingreso a la educación superior”</p>
                        </div>
                        <div class="testimonial-info">
                            <h4 class="testimonial-name">Preparación para el ICFES</h4>
                            <span class="testimonial-meta"></span> <span class="testimonial-meta"></span> </div>
                    </div>
                    <!--/. testimonial block -->
                </div>
            </div>
        </div>
       
    </div>


   


<div  id="seccion2" >
    <p>.</p>

        <div class="space-medium bg-default" style=" background:#F2F2F2 url('img/bg3.png')" >
        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"><img class="wow fadeInLeft" data-wow-delay="0.4s" src="img/cultura.jpg" alt="" class="img-thumbnail"></div>
                <div class="wow fadeInRight" data-wow-delay="0.4s" >
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="well-block">
                        <h1>Actividades</h1>
                        <h5 class="small-title ">algunas de nuestras actividades</h5>
                        <p><b>La Semana Cultural </b>  consiste  en crear un espacio para que los jovenes aprovechen creativamente momentos de aprendizaje diferentes al aula de clase, mediante la participación en las actividades deportivas, recreativas, científicas, artísticas y culturales, a través de las cuales los jovenes,  manifiestan y ejercitan sus conocimientos, cualidades, capacidades y talentos.</p>

                    
                        <a href="# " class="btn btn-primary">Ver más actividades</a> </div>
                </div>

            </div>
            </div>
        </div>
    </div>

</div>





<div  id="seccion3">

    <div class="wow fadeIn" data-wow-delay="0.2s">
        <div class="cta-section">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="cta-title">Colegio Semillero Dos Mil</h1>
                    <p class="cta-text">La mejor opción para la educación de tus hijos. </p>
                    
            </div>
        </div>
    </div>

</div>

</div>
 




 <div class="footer" id="seccion4">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Dirección</h2>
                            <ul class="listnone contact">
                                <li>Cr 6e # 27a-09 La Cumbre, Floridablanca. </li>
                             
                            </ul>
                        </div>
                    </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Telefono</h2>
                            <ul class="listnone contact">
                                <li> Telefono fijo: (+57) 7 6581001</li>
                              
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Redes Sociales</h2>
                            <ul class="listnone">
                                <li><a href="https://www.facebook.com/col.sem" target="_blank"> <i class="fa fa-facebook"  ></i> Facebook </a>
                                <br>
                                 <a href="https://www.instagram.com/colsemillero/" target="_blank" ><i class="fa fa-instagram" ></i> Instagram</a>

                                </li>
                                
                                
                               
                       
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
               
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Colegio Semillero Dos Mil 2017 | desarrollado por <a href="https://www.facebook.com/IngenieroJonathanCaballero"> Jonathan Caballero </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#login-modal').modal('show');
    });
</script>




<script type="text/javascript" src="js/login.js" ></script>



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