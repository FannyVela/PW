<html lang="es">
    <head>
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
        <div class="super_container">
            <header class="header">
                <div class="top_bar">
                    <div class="container">
                        <div class="row">
                            <div class="col d-flex flex-row">
                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>
                                <?php
                                echo "Actualmente logeado con: ". $_SESSION['username'];
                                ?>
                                </div>
                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>
                                </div>
                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                                <div class="top_bar_content ml-auto">
                                    <div class="top_bar_user">
                                        <div class="user_icon"><img src="images/user.svg" alt=""></div>
                                        <div><a href="<?= base_url().'index.php/registro'?>">Register</a></div>
                                        <div><a href="#">Sign in</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </header>
        </div> 
    </body>
</html>