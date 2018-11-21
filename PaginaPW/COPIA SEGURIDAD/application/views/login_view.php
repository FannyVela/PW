<html lang="es">
<head>
 <meta charset="utf-8" />
 <title>Inicio de sesión</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mobile shop project">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('plugins/slick-1.8.0/slick.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/mainStyle.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/responsive.css'); ?>">
</head>
<body>
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
                                        <div class="user_icon"><img src="<?php echo base_url('images/user.svg') ?>" alt=""></div>
                                        <div><a href="<?= base_url().'index.php/registro'?>">Regístrate</a></div>
                                        <div><a href="<?= base_url().'index.php/login'?>">Iniciar sesión</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
             <center><h2>Iniciar sesión</h2>
			 <?php if(isset($mensaje)):?>
 			<h2><?= $mensaje?></h2>
 			<?php endif;?>
 			</center>
 			<!--formulario-->
 			<center>
 			<form name="form_iniciar" action="<?=base_url().'index.php/login/verify_sesion'?>" method=POST	>
 			<label for="Usuario"> Usuario</label>
 			<input type="text" name="user" /> <br/>
 			<label for="contraseña"> Contraseña</label>
 			<input type="password" name="pass" /> <br/>
 			<input type="submit" value="Entrar" name="submit" /> <br/>
 			</form>
			</center>
        </div>

</body>
</html>
