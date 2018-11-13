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
                                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>+38 068 005 3570</div>
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