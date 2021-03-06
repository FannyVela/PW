<html lang="es">
    <head>
        <title>Smartphones</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mobile shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slick-1.8.0/slick.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/responsive.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/fontawesomeAll.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/productos.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/inicio.css'); ?>">

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
                                              <div><a href="<?= base_url().'login'?>">Iniciar sesión</a></div>
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
                                <div class="logo"><a href="<?= base_url()?>">TecnoPhone</a></div>
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
                                            <div class="cart_count"><span><?php echo $this->cart->total_items() ?></span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="<?php echo base_url('carro') ?>">Cesta</a></div>
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
                                        <li><a href="<?= base_url().'productos'?>">Smartphones<i class="fas fa-chevron-down"></i></a></li>
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

            <div class= contenedor>
              <br><br>
              <div>
                  <center><h2>SMARTPHONES</h2></center>
              </div>    
                
              <!-- Search -->
               <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right" style="margin-left:300px;">
				 <div class="header_search">
				   <div class="header_search_content">
				     <div class="header_search_form_container">
				        <form action="" class="header_search_form " method="post">
				            <input type="search"  class="header_search_input" name="buscando" placeholder="Buscar...">
				            <button type="submit" class="header_search_button trans_300" value="Buscar"><img src="images/search.png" alt=""></button>
				        </form>
				     </div>
                   </div>
				 </div>
                </div>

                <?php
                  if(!$moviles)
                  {
                ?>
                    0 elementos encontrados
                <?php
                  } else
                    {
                      foreach($moviles as $fila)
                      {
                        if($fila->stock > 0)
                        {
                ?>
                          <div class="item  col-xs-4 col-lg-4" style="float:left;">
                            <div class="thumbnail">
                               <?= form_open(base_url() . 'carro/agregarProducto') ?>
                               <?php
                                   $url = base_url(). "/images/". $fila->nombreimagen . ".png";
                               ?>
                               <img class="group list-group-image" src="<?php echo $url ?>" alt="" />
                               <div class="caption">
                                 <!--nombre -->
                                 <h4 class="group inner list-group-item-heading" style="margin-top: 30px;"> <?= ucfirst($fila->nombre) ?></h4>
                                 <!-- descripcion -->
                                 <p class="group inner list-group-item-text" style="height: 55%;">
                                   <?= ucfirst($fila->descripcion) ?>
                                 </p>
                                 <br>
                                 <div class="row">
                                     <div class="col-xs-12 col-md-6">
                                       <p class = "lead" style="color:black; font-weight:bold;">
                                         <?php echo "$fila->precio" . "€"?>
                                       </p>
                                     </div>
                                     <div class="col-xs-12 col-md-6">
                                       <?= form_hidden('uri', $this->uri->segment(3)) ?>
                                       <?= form_hidden('id', $fila->id) ?>
                                       <br>
                                       <input class = "btn btn-success" type="submit" name="action" value="Agregar al carrito">
                                       <?= form_close() ?>
                                     </div>
                                 </div>
                              </div>
                            </div>
                          </div>

                <?php  }
                      } //fin foreach
                    }
                ?>
            </div>



            <!-- Footer -->

          	<footer class="footer" style = "clear:left;">
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
