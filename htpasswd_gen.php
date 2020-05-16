<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Htpasswd Generator">	

		<title>Htpasswd Generator</title>
        <style>
        	*{box-sizing:border-box;}
			body{ font-family: sans-serif; font-size:16px; line-height: 25px; padding: 0; margin: 0;}
			#main{text-align: center; max-width: 900px; margin: auto; padding-left: 20px; padding-right: 20px;}
			h1{color: #0074D9; }
			.highlight{color: #0074D9;}
			.main-header{
				color: white;
				background-color: #111111;
				padding: 20px;
				text-align: center;
				text-transform: uppercase;
			}
			.qt-form{
				margin: auto; max-width:350px; padding: 20px; text-align: left;
				border: solid 1px #0074D9; 
				border-radius: 5px;
			}
			.field{
				height: 72px;
				position: relative;
				padding: 16px 0 8px 0;
			}
			.field::before,
			.field::after{
				content: ''; height: 2px;
				background-color: #e7e7e7;
				width: 100%;
				position: absolute; bottom: 6px;left: 0;
			}
			.field::after{
				background-color: #0074D9;
				transform: scaleX(0);
				transition : transform 0.3s;
			}
			.field-label{
				line-height: 16px;
				font-size: 16px;
				color: #666666;
				display: block;
				margin: 0;
				position: relative;
				transform : translateY(24px);
				transition: transform 0.3s, font-size 0.3s;
			}
			.field-input{
				/*reset*/
					border: 0; 
					-webkit-appearance:none; /*we remove IOS border radius*/
					outline: none;
				height: 32px;
				position: relative;
				background-color: transparent;
				line-height: 16px;
				padding: 8px 0 8px 0;
				bottom: 0;
				display: block;
				width: 100%;
				font-size: 16px;

			}
			.is-focused .field-label{
				color: #0074D9;
			}
			.field.is-focused::after{
				transform: scaleX(1);
			}
			.has-label .field-label{
				font-size: 12px;
				transform: translateY(0);
			}
			.qt-submit{
				/*reset*/
					background: none; border: 0;
				background: #0074D9;	
				margin: 20px auto 0 auto; display: block;
				padding: 12px 35px;
				cursor: pointer; 
				color: white; border-radius: 5px;
				text-transform: uppercase;
				transition: opacity 0.3s; 
			}
			.qt-submit:hover, 
			.qt-submit:active,
			.qt-submit:focus{
				opacity: 0.8;
			}
        </style>
	</head>

	<body>
		
		<header class="main-header">Générateur de Htpasswd</header>
		<div id="main">
			<?php
			if (isset($_POST['login']) AND isset($_POST['pass'])){
			    $login = $_POST['login'];
			    $pass_crypte = crypt($_POST['pass']); // On crypte le mot de passe

			    echo '<p>Ligne à copier dans le .htpasswd :<br />' .
			     '<span class="highlight">' . $login . ':' . $pass_crypte . '</span>'.
			     '</p>';
			}
			// On n'a pas encore rempli le formulaire
			else { ?>
				<h1>Entrez votre login et votre mot de passe pour le crypter</h1>

				<form method="post" class="qt-form">
				    <div class="field">
				    	<label for="login" class="field-label">Login : </label>
				        <input type="text" name="login" class="field-input"><br />
				    </div>
				    <div class="field">
				        <label for="pass" class="field-label">Mot de passe : </label>
				        <input type="text" name="pass" class="field-input"><br /><br />	
				    </div>
				    <input type="submit" value="Crypter !" class="qt-submit">
				</form>
			<?php } ?>
		</div>
		
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script>
			(function($){
				$('.field-input').focus(function(){
					$(this).parent().addClass('is-focused has-label');
				})
				$('.field-input').blur(function(){
					$parent = $(this).parent();
					if( $(this).val() == '' ){
						$parent.removeClass('has-label');
					}
					$parent.removeClass('is-focused');

				})
			})(jQuery);

		</script>
	</body>
</html>		