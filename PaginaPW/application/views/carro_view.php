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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cart_responsive.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/cartStyles.css'); ?>">

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

            <!--Contenido del carrito-->

          	<div class="cart_section">
          		<div class="container">
          			<div class="row">
          				<div class="col-lg-10 offset-lg-1">
          					<div class="cart_container">
          						<div class="cart_title">Cesta</div>

                      <script>
                        <?php
                          $destruido = $this->session->flashdata('destruido');
                          if($destruido)
                          {
                        ?>
                          alert('<?=$destruido?>');
                        <?php
                          } // cierre del if
                         ?>

                         <?php
                           $eliminado = $this->session->flashdata('productoEliminado');
                           if($eliminado)
                           {
                         ?>
                           alert('<?=$eliminado?>');
                         <?php
                           } // cierre del if
                          ?>
                      </script>

                      <?php
                        //Si hay productos en el carrito
                        if($carrito = $this->cart->contents())
                        {
                          $cont = 1;
                      ?>
                          <div class="cart_items">
                            <ul class="cart_list">
                              <?php
                                foreach ($carrito as $item)
                                {
                              ?>
                                  <!--producto -->
                                  <li class="cart_item clearfix">
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                      <!--nombre producto -->
                                      <div class="cart_item_name cart_info_col">
                                        <?php
                                        if($cont == 1)
                                        {
                                          echo "<div class='cart_item_title'>Nombre</div>";
                                        }
                                        ?>
                                        <div class="cart_item_text">
                                          <?php
                                            echo ucfirst($item['name']); //devuelve el string con la 1º letra en mayusculas
                                           ?>
                                        </div>
                                      </div>

                                      <!--cantidad producto -->
                                      <div class="cart_item_quantity cart_info_col">
                                        <?php
                                          if($cont === 1)
                                          {
                                            echo "<div class='cart_item_title'>Cantidad</div>";
                                          }
                                        ?>
                                        <div class="cart_item_text">
                                          <?php echo $item['qty']?>
                                        </div>
                                      </div>

                                      <!-- precio por unidad-->
                                      <div class="cart_item_price cart_info_col">
                                        <?php
                                          if($cont === 1)
                                          {
                                            echo "<div class='cart_item_title'>Precio</div>";
                                          }
                                         ?>
                                        <div class="cart_item_text">
                                          <?php echo $item['price'] ."€/u";?>
                                        </div>
                                      </div>

                                      <!-- total producto-->
                                      <div class="cart_item_total cart_info_col">
                                        <?php
                                          if($cont === 1)
                                          {
                                            echo "<div class='cart_item_title'>Total</div>";
                                          }
                                         ?>
                                        <div class="cart_item_text">
                                          <?php echo $item['price']*$item['qty'] . "€"; ?>
                                        </div>
                                      </div>

                                      <!--eliminar -->
                                      <div class="cart_item_total cart_info_col">
                                        <?php
                                          if($cont === 1)
                                          {
                                            echo "<div class='cart_item_title'>Eliminar</div>";
                                          }
                                         ?>
                                        <div class="cart_item_text">
                                          <?= anchor(base_url().'carro/eliminarProducto/' . $item['rowid'], 'Eliminar') ?>
                                        </div>
                                      </div>

                                    </div>
                                  </li>
                              <?php
                                $cont++;
                                } // del foreach
                              ?>

                            </ul>
                          </div>

                          <!-- Precio total -->
                          <div class="order_total">
                            <div class="order_total_content text-md-right">
                              <div class="order_total_title">Total:</div>
                              <div class="order_total_amount">
                                <?php
                                   echo $this->cart->total() . "€";
                                ?>
                              </div>
                            </div>
                          </div>

                          <!-- Botones -->
                          <div class="cart_buttons">
                            <div style="text-align:right; margin-right: 50px; font-size:18px;">
                            <?php
                            if(isset($_SESSION['username']))
                            {
                               echo anchor(base_url().'pago', 'Tramitar Pedido');
                            }
                            else
                              echo "<p>Debes estar logeado para realizar un pedido</p>";
                             ?>
                          </div>
                          </div><br>
                          <div style="text-align:right; margin-right: 50px; font-size:18px;">
                            <?php
                               echo anchor(base_url().'carro/eliminarCarrito', 'Vaciar carrito');
                             ?>
                          </div>

                      <?php
                    } else  // fin del if
                      {
                          echo "<div> CESTA VACÍA</div>";
                      }
                       ?>

          					</div>
          				</div>
          			</div>
          		</div>
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
