<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("location: http://www.aecompany.com");
    exit();
  }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DashBoard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts/dashboard.js"></script>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
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
    <div id="dashboard-sencera">
        <div id="barra_lateral">
            <div class="perfil-container">
                <div class="perfil-imagen-container">
                    <div id="logo-container"><img height="150px" width="150px" src="imatges/logo.png"></div>
                    <?php echo '<h3>'.$_SESSION['username'].'</h3>';?>
                </div>
            </div>
            <div class="opcions-sessio-container">
                <div>
                    <a onclick="mostrarInfo()" href="#">Informació</a>
                    <a href="tancarsessio.php" href="#">Logout</a>
                </div>
            </div>
            <div class="serveis-container">
                <ul>
                    <li><a onclick="mostrarDns()" href="#">DNS/FTP</a></li>
                    <li><a onclick="mostrarMail()" href="#">MAIL</a></li>
                    <li><a onclick="mostrarStorage()" href="#">STORAGE</a></li>
                    <li><a onclick="mostrarProxies()" href="#">PROXIES</a></li>
                    <li><a onclick="mostrarVPN()" href="#">VPN</a></li>
                </ul>
            </div>
        </div>
        <div class="dashboard-container">
        </div>
    </div>
    <div id="informacio">

    </div>
    <script>
        $.ajax({url: "myurl", success: myCallback, cache: false});
        function mostrarInfo(){
            var peticioAjax = new XMLHttpRequest();
            peticioAjax.onreadystatechange = function(){
                if(peticioAjax.readyState == 4 && peticioAjax.status == 200){
                    document.getElementById("informacio").innerHTML = 
                        "<p style='color:white;'>" + peticioAjax.responseText + "</p>";
                    document.getElementById("informacio").style.background = "blue";
                    document.getElementById("informacio").style.position = "absolute";
                    document.getElementById("informacio").style.width = "800px";
                    document.getElementById("informacio").style.height= "400px";
                    document.getElementById("informacio").style.top = (window.screen.availHeight-400)/2 + "px";
                    document.getElementById("informacio").style.left = (window.screen.availWidth-800)/2 + "px";
                    //document.getElementById("informacio").style.marginTop= "40px";
                    //document.getElementById("informacio").style.marginRight= "20px";
                }
            }
            peticioAjax.open("GET","exemple.txt",true);
            peticioAjax.send();
        }
    </script>
    <script>
	function mostrarStorage(){
	       	var peticioAjax = new XMLHttpRequest();
		$('.dashboard-container').text("");
		//peticioAjax.onreadystatechange = function(){
		//	if(peticioAjax.readyState == 4 && peticioAjax.status == 200){
		$(".dashboard-container").html("<iframe src='../usuaris/<?php echo $_SESSION['username'] ?>/owncloud/index.php' width='100%' height='800'></iframe>");
		//	}
		//}
		//peticioAjax.open("GET","exemple.txt",true);
		//peticioAjax.send();
	}
	function mostrarMail(){
                var peticioAjax = new XMLHttpRequest();
                $('.dashboard-container').text("");
		$(".dashboard-container").html("<iframe src='../usuaris/<?php echo $_SESSION['username'] ?>/rainloop/index.php?admin' width='100%' height='800'></iframe>");
                //peticioAjax.onreadystatechange = function(){
                //      if(peticioAjax.readyState == 4 && peticioAjax.status == 200){
                //$(".dashboard-container").html("<iframe src='../usuaris/<?php echo $_SESSION['username'] ?>/owncloud/index.php' width='100%' hei>
                //      }
                //}
                //peticioAjax.open("GET","exemple.txt",true);
                //peticioAjax.send();
        }
	function mostrarDns(){
                var peticioAjax = new XMLHttpRequest();
		$('.dashboard-container').text("");
		$(".dashboard-container").html("<div style='background:#dedede;border-radius:25px;height:700px;width:90%;padding:25px;margin:25px auto;'><div style='height:250px;width:100%;text-align:center;'><div style='padding:60px 0;'><h2 style='letter-spacing:4px;font-size:100px;'>DNS</h2><p>Gestiona la teva web i el teu subdomini</p></div></div><div style='height:450px;width:100%;text-align:center;'><div style='height:450px;width:50%;float:left;';><div style='height:225px;width:100%;'><div style='padding: 70px 0 0 20px;'><p style='font-size:20px;'>Nom del Subdomini</p><input style='margin-top:20px;width:35%;height:30px;outline:none;text-align:center;' type='text' id='subdomini' name='subdomini' readonly></div></div><div style='height:225px;width:100%;'><div><div style='margin-top: 20px;'><p style='font-size:20px;margin-bottom:20px;'>Contingut del Directori Web</p><div style='background:white;width:40%;height:160px;overflow:scroll;margin:auto;' id='directori'></div></div></div></div></div><div style='height:450px;width:50%;float:left;'><div style='width:100%;height:225px;background:red;'>DIV 2.2.1</div><div style='height:225px;width:100%;'><div style='margin-top:20px;'><p style='font-size:20px;margin-bottom:20px;'>Acces FTP</p><label>Usuari FTP: </label><input style='margin-top:20px;width:35%;height:30px;outline:none;text-align:center;' type='text' id='usuari_ftp' name='usuari_ftp' readonly><br><label>Contrasenya FTP: </label><input style='margin-top:20px;width:35%;height:30px;outline:none;text-align:center;' type='text' id='contrasenya_ftp' name='contrasenya_ftp' readonly></div></div></div></div></div>");
		$('input[name="subdomini"]').val("<?php echo $_SESSION['username'] . '.aecompany.com' ?>");

		peticioAjax.onreadystatechange = function(){
                      if(peticioAjax.readyState == 4 && peticioAjax.status == 200){
                		//$(".dashboard-container").html("<iframe src='../usuaris/<?php echo $_SESSION['username'] ?>/owncloud/index.>
				document.getElementById('directori').innerHTML = peticioAjax.responseText;
                      }
                }
                peticioAjax.open("GET","directori.php?obtenir_directori_usuari=<?php echo $_SESSION['username'] . '' ?>",true);
                peticioAjax.send();
	}
    </script>
</body>
</html>
