<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Registro de usuario</title>
 <title>Inicio</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mobile shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">


     	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/OwlCarousel2-2.2.1/owl.carousel.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/OwlCarousel2-2.2.1/owl.theme.default.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/OwlCarousel2-2.2.1/animate.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slick-1.8.0/slick.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/responsive.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/usuario.css'); ?>">
</head>
<body>
     <!--formulario-->
     <!--@set_value en los inputs para que recuerde los datos introducidos-->
     <div class="super_container">
        <header class="header">
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('images/phone.png') ?>" alt=""></div>+38 068 005 3570</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('images/mail.png') ?>" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_user">
                                    <div><a href="<?= base_url().'login'?>">Iniciar sesión</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo" style="margin-left: 200%;"><a href="<?= base_url()?>">TecnoPhone</a></div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right" style="margin-left:50%;">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end"></div>
                    </div>
                </div>
            </div>
        </div>


                <?=
                form_open(base_url().'registro/verify_registro',array('name'=>'form_reg
                '));?>
                 <h2>Registro</h2>
                <?= form_label('Nombre','Nombre'); ?>
                <?= form_input('nombre',@set_value('nombre')) ?> <br /> <br />
                <?= form_label('Correo','Correo'); ?>
                <?= form_input('correo',@set_value('correo')) ?> <br /> <br />
                <?= form_label('Usuario','Usuario'); ?>
                <?= form_input('usuario',@set_value('usuario')) ?> <br /> <br />
                <?= form_label('Contraseña','Contraseña'); ?>
                <?= form_password('pass'); ?> <br /> <br />
                <?= form_label('Repetir contraseña','Repetir_contraseña'); ?>
                <?= form_password('pass2'); ?> <br /> <br />
                <center>
                <button type="submit" value="Registrar" name="submit_reg">Registrarse</button>
                </center>
                <?= form_close(); ?>
            <?php
                if(isset($mensaje))
                {
                    echo "<h2>". $mensaje . "</h2>";
                    ?>
                    <a href="<?= base_url().'index.php/login/'?>" title="Iniciar Sesión">
                    Iniciar Sesión</a>
                    <?php
                }

            ?>
             
     <hr/>
     <?= validation_errors(); ?> 
         
               	<footer class="footer">
          		<div class="container">
          			<div class="row" >
          				<div class="col-lg-3 footer_col" style="margin-left: 40%;">
          					<div class="footer_column footer_contact">
          						<div >
          							<div class="logo2"><a href="#">TecnoPhone</a></div>
          						</div>
          						<div class="footer_title">¿Alguna duda? Contáctanos</div>
          						<div class="footer_phone">+34 608 005 3570</div>
          						<div class="footer_contact_text">
          							<p>Calle Ancha 22, Madrid</p>
          						</div>
          						<div class="footer_social">
          							<ul>
          								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
          								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
          								<li><a href="#"><i class="fab fa-google"></i></a></li>
          								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
          							</ul>
          						</div>
          					</div>
          				</div>
          			</div>
          		</div>
          	</footer>
         
    </div>
</body>
</html>
