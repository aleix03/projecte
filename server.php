<?php
session_start();

// initializing variables
$username = "";
$errors = array();

// CONECTAR A LA BASE DE DADES
$db = mysqli_connect('localhost', 'phpmyadmin', 'aecompany', 'php_login_database');

// REGISTRAR USUARI
if (isset($_POST['reg_usuari'])) {
  // REBRE ELS INPUTS DEL FORMULARI
  $username = mysqli_real_escape_string($db, $_POST['usuari_register']);
  $password = mysqli_real_escape_string($db, $_POST['contrasenya_register']);

  // ENS ASSEGUREM QUE LES DADES INSERTADES EN EL FORMULARI SIGUIN CORRECTES
  if (empty($username)) { array_push($errors, "Necessitem un nom d'usuari"); }
  if (empty($password)) { array_push($errors, "Necessitem una contrasenya"); }

  // COMPROVEM SI EXISTEIX UN USUARI DINS DE LA BASE DE DADES AMB EL MATEIX NOM
  $user_check_query = "SELECT * FROM usuaris WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // SI L'USUARI EXISTEIX
    if ($user['username'] === $username) {
      array_push($errors, "L'usuari ja existeix");
    }
  }

  // REGISTREM A L'USUARI
  if (count($errors) == 0) {
  	$password = md5($password);//ENCRIPTEM LA CONTRASENYA

  	$query = "INSERT INTO usuaris (username, password)
  			  VALUES('$username', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Has iniciat sessio";
	$directori = '/var/www/aecompany/usuaris/' . $username;
	mkdir($directori,0777,true);
	$unzip = new ZipArchive;
	$out = $unzip->open('instaladors/owncloud.zip');
	if ($out === TRUE) {
		$unzip->extractTo($directori);
		$unzip->close();
		$fitxer_autoconfig_desti = $directori . '/owncloud/config/autoconfig.php';
		copy("instaladors/autoconfig.php",$fitxer_autoconfig_desti);
	}
  	header('location: dashboard/index.php');
  }
}


// LOGIN USUARI
if (isset($_POST['log_usuari'])) {
  $username = mysqli_real_escape_string($db, $_POST['usuari_login']);
  $password = mysqli_real_escape_string($db, $_POST['contrasenya_login']);

  if (empty($username)) {
  	array_push($errors, "Es necessita un usuari");
  }
  if (empty($password)) {
  	array_push($errors, "Es necessita una contrasenya");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM usuaris WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Has iniciat sessio";
  	  header('location: dashboard/index.php');
  	}else {
  		array_push($errors, "El usuari o la contrasenya son incorrectes");
  	}
  }
}
?>
