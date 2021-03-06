<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header class="main-header" id="header" role="banner">
  <section id="branding">
  <div id="site-title"><a href = "<?php echo get_option('home'); ?>/" ><img class="animated slideInDown" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" /></a></div>
  </section>
<!-- Bouton referencer salle -->

<a class="btn btn-warning btn-1 btn-lg btn-head1" href="#myModal2" data-toggle="modal">Referencer ma salle</a>
<div id="myModal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal">x</button>
					<h4 class="modal-title">Referencer</h4>
			</div>
			<div class="modal-body">
				<p class="lead">Veuillez entrer les elements necessaires au referencement de votre salle</p>
				<form id="myForm" action="http://localhost:8888/wordpress/">
					<div class="form-group">
						<label for="name">Nom de l'etablissement:</label>
						<input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="" required/>
					</div>
					<div class="form-group">
						<label for="name">Adresse de l'etablissement:</label>
						<input type="text" name="adresse" id="name" class="form-control" placeholder="Adresse" value="" required/>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="" required/>
					</div>
					<div>
						<label for="radio">Type d'etablissement</label><br>
							<input type="radio" name="gender" value="hotel" checked> Hotel<br>
							<input type="radio" name="gender" value="bateau"> Bateau<br>
							<input type="radio" name="gender" value="chateau"> Château<br>
							<input type="radio" name="gender" value="restaurant" > Restaurant<br>
							<input type="radio" name="gender" value="congres"> Centre de congrès<br>
							<input type="radio" name="gender" value="congres"> Autre<br>
							<input type="text" name="Autre" value=""><br><br>
					</div>
					<div class="form-group">
						<label for="comment">Description:</label>
						<textarea class="form-control" id="comment" name="comment" required></textarea>
					</div>
					<input type="submit" name="submit" class="btn btn-success btn-lg" value="submit">
				</form>
			</div>1
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel Form</button>
			</div>
		</div>
	</div>
</div>
 <!-- Bouton connection -->
<a class="btn btn-2 btn-head3 btn-lg" data-toggle="modal" href='http://thgiraud.cyrilfabre.fr/registration/'>Inscription</a>
<a class="btn btn-2 btn-head2 btn-lg" href="#myModal1" data-toggle="modal">Connexion</a>
<div id="myModal1" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                    <h4 class="modal-title">CONNEXION</h4>
            </div>
            <div class="modal-body">
              <?php wp_login_form( $args );
                  $args = array(
                  		'echo'           => true,
                  		'remember'       => true,
                  		'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                  		'form_id'        => 'loginform',
                  		'id_username'    => 'user_login',
                  		'id_password'    => 'user_pass',
                  		'id_remember'    => 'rememberme',
                  		'id_submit'      => 'wp-submit',
                  		'label_username' => __( 'Username' ),
                  		'label_password' => __( 'Password' ),
                  		'label_remember' => __( 'Remember Me' ),
                  		'label_log_in'   => __( 'Log In' ),
                  		'value_username' => '',
                  		'value_remember' => false
                  		);
                  ?>
                </div>
            </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</header>
<div id="container">
