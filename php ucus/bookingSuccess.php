<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Hata Sayfası</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src = "js/home.js"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" class="shortPage">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="home.html"><img src="images/logo.png" alt="JustFly"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a href="home.html">Anasayfa</a></li>
        <li><a href="viewFligths.php">Uçuşlar</a></li>
		<?php
		if(isset($_SESSION['user_fname']))
		{
			echo("<li><a href='viewReservations.php'>Rezervasyonlar</a></li>");
			echo("<li><a href='logout.php'>Çıkış Yap</a></li>");			
		}
		else
		{
			echo('<li><a href="loginPage.php">Giriş Yap</a></li>');
			echo('<li><a href="signUp.html">Kayıt Ol</a></li>');
		}
		?>
      </ul>
    </div>
  </div>
</nav>


 <div class="jumbotron text-center" >
<h1>Başarılı </h1>
  <?php
	echo("Rezervasyonunuz başarılı oldu!<br><a href = 'viewReservations.php'>Rezervasyonlarını Görüntüle</a>");
  ?>
 </div> 

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; Sadece Uç - Tüm hakları saklıdır </p>
</footer>
</body>
</html>
