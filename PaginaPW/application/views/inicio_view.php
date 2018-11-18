<html lang="es">
    <head>
        <title>Inicio</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mobile shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slick-1.8.0/slick.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mainStyle.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/responsive.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/fontawesomeAll.css'); ?>">

    </head>

    <body>
        <div class="super_container">
            <header class="header">
                <div class="top_bar">
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex flex-row">
                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('images/phone.png') ?>" alt=""></div>+34 603456765
                                </div>

                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('images/mail.png') ?>" alt=""></div><a href="mailto:tecnophone@info.com">tecnophone@info.com</a></div>
                                <div class="top_bar_content ml-auto">
                                    <div class="top_bar_user">
                                        <?php
                                          if(isset($_SESSION['username']))
                                          {
                                             echo "<div class=welcome_item>Hola ". $_SESSION['username'] . " </div>";
                                          } else{ ?>
                                              <div class="user_icon"><img src="<?php echo base_url('images/user.svg') ?>" alt=""></div>
                                              <div><a href="<?= base_url().'registro'?>">Regístrate</a></div>
                                              <div><a href="<?= base_url().'index.php/login'?>">Iniciar sesión</a></div>
                                      <?php } ?>
                                    </div>

                                    <?php
                                      if(isset($_SESSION['username']))
                                      {
                                          echo "<div class = 'closeSesion'><a href = '". base_url() . "login/logout'>Cerrar sesión</a></div> ";
                                      }
                                     ?>
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

            <!-- Banner -->

            <div class="banner">
          		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
          		<div class="container fill_height">
          			<div class="row fill_height">
          				<div class="banner_product_image"><img src="<?php echo base_url('images/hola.png') ?>" alt=""></div>
          				<div class="col-lg-5 fill_height">
          					<div class="banner_content">
          						<h1 class="banner_text">Los mejores precios en teléfonos móviles</h1>
          						<div class="banner_price"><span style="width:100px;">5 €</span></div>
          						<div class="banner_product_name">Samsung Galaxy Note 9</div>
          						<div class="button banner_button" style="margin-left:408px; width: 35%; text-align:center;"><a href="#">Lo quiero</a></div>
          					</div>
          				</div>
          			</div>
          		</div>
          	</div>

            <div class = "row">
            <?php
                //sacamos todos los productos del array productos
                foreach ($productos as $producto) {
                    ?>
                    <div class = "col-lg-4 col-sm-6 portfolio-item">
                      <div class = "card h-100">
                        <?php
                        //si existen opciones en el producto las separamos con explode
                        //cada vez que haya una coma, sino no hacemos nada
                        //para cada producto creamos un formulario que apuntará a la función
                        //agregarProducto del controlador carro para insertarlo en la cesta
                        ?>
                        <div class = "card-body">
                        <?= form_open(base_url() . 'carro/agregarProducto') ?>
                        <div id="imagen">
                        <?php
                            $url = base_url(). "/images/". $producto->nombreimagen . ".png";
                        ?>
                            <img src="<?php echo $url ?>" width="300" height="300" />
                        </div>

                          <h4 class = "card-tittle"><?= ucfirst($producto->descripcion) ?></h4>

                        <!--mostramos las imagenes de los productos-->
                        <!--
                        <div id="imagen">
                            <img src="http://localhost/carritoCI/imagenes/<?= $producto->imagen ?>" width="120" height="110" />
                        </div> -->
                        <div id="precio">
                            <?= $producto->precio ?>
                        </div>
                        <div id = "marca">
                          <?= $producto->marca ?>
                        </div>

                        <?= form_hidden('uri', $this->uri->segment(3)) ?>
                        <?= form_hidden('id', $producto->id) ?>  
                        <?= form_submit('action', 'Agregar al carrito') ?>
                        <?= form_close() ?>
                        </div>
                        </div>
                        </div>
                        <?php

                    }
                    ?>
              </div>
              <div class="grid_7">
                <?= $this->pagination->create_links() ?>
              </div>

            <!-- Footer -->

          	<footer class="footer">
          		<div class="container">
          			<div class="row" >
          				<div class="col-lg-3 footer_col" style="margin-left: 40%;">
          					<div class="footer_column footer_contact">
          						<div >
          							<div class="logo2"><a href="#">TecnoPhone</a></div>
          						</div>
          						<div class="footer_title">Got Question? Call Us 24/7</div>
          						<div class="footer_phone">+38 068 005 3570</div>
          						<div class="footer_contact_text">
          							<p>17 Princess Road, London</p>
          							<p>Grester London NW18JR, UK</p>
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
