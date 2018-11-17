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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main_styles.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/responsive.css'); ?>">
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
                                        <div><a href="<?= base_url().'index.php/login'?>">Sign in</a></div>
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
                                <div class="logo"><a href="#">TecnoPhone</a></div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right" style="margin-left:50%;">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="<?php echo base_url('images/cart.png') ?>" alt="">
                                            <div class="cart_count"><span>0</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="<?php echo base_url('carro') ?>">Cesta</a></div>
                                      <!--      <div class="cart_price">0€</div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Main Nav Menu -->

                                <div class="main_nav_menu" style="margin-left: 35%;">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="<?= base_url().'inicio'?>">Inicio<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs">
                                            <a href="#">Marcas de móviles<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li>
                                                    <a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                        <li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contacto<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <center>
            	<h2>Registro</h2>
            	<br>
            <?=
			form_open(base_url().'index.php/registro/verify_registro',array('name'=>'form_reg
			'));?>
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
			<?= form_submit('submit_reg', 'Registrar');?>
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
			</center>
 <hr/>
 <?= validation_errors(); ?>
        </div>
</body></html>
