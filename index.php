<?php
	include 'server.php';
?>
<html>
	<head>
		<title>AECompany</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="scripts/principal.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="div_login">
			<div class="tancar tancar_login">
				<button>X</button>
			</div>
			<h3>Inici de Sessió</h3>
			<div class="formulari login_form">
				<form method="post" action="index.php">
					<label for="uname"><b>Usuari</b></label>
					<input name="usuari_login" class="inputs login_usuari" type="text" placeholder="root" required>
					<label for="psw"><b>Contrasenya</b></label>
					<input name="contrasenya_login" class="inputs login_contrasenya" type="password" placeholder="********" required>
					<button type="submit" name="log_usuari">Iniciar Sessió</button>
				</form>
			</div>
			<div class="pregunta no_registrat">
				<p>No estàs registrat encara? Fes clic <strong><a href="#">aqui</a></strong></p>
			</div>
		</div>
		<div id="div_register">
			<div class="tancar tancar_register">
				<button>X</button>
			</div>
			<h3>Registre</h3>
			<div class="formulari register_form">
				<form method="post" action="index.php">
					<label for="uname"><b>Usuari</b></label>
					<input class="inputs register_usuari" name="usuari_register" type="text" placeholder="root" required>
					<label for="psw"><b>Contrasenya</b></label>
					<input class="inputs register_contrasenya" name="contrasenya_register" type="password" placeholder="********" required>
					<button type="submit" name="reg_usuari">Registrar-se</button>
				</form>
			</div>
			<div class="pregunta no_login">
				<p>Ja tens un compte? Fes clic <strong><a href="#">aqui</a></strong></p>
			</div>
		</div>
		<nav>
			<a id="logo" href="#"><img src="imatges/logo.png"></a>
			<div id="menu">
				<ul>
					<li><a href="#">Qui som?</a></li>
					<li><a href="#">Serveis</a></li>
					<li><a href="#">Contactar</a></li>
				</ul>
			</div>
			<div id="opcions_login">
				<a href="#" id="login">Iniciar Sessió</a>
				<a href="#" id="register">Registrar-se</a>
			</div>
		</nav>
		<main>
			<div id="fons_principal">
				<div id="finestra_inici">
					<h2>AECompany disposa de</h2>
					<div id="serveis">
							<div class="imatges_serveis">
								<img height="212px" src="imatges/imatges_serveis/vpn.png">
								<h3>VPN</h3>
							</div>
							<div class="imatges_serveis">
								<img height="212px" src="imatges/imatges_serveis/cloud_storage.png">
								<h3>EMMAGATZEMATGE</h3>
								<h3>AL NUVOL</h3>
							</div>
							<div class="imatges_serveis">
								<img height="212px" src="imatges/imatges_serveis/mail.png">
								<h3>MISSATGERIA</h3>
								<h3>ELECTRONICA</h3>
							</div>
					</div>
				</div>
			</div>
		</main>
	</body>
</html>
