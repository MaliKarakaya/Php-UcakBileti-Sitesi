<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Sadece Uç - Uçuş İşlemleri</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  
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
		<?php
		if(isset($_SESSION['admin_email']))
		{
			echo("<li><a href='updateFlightsPage.php'>Uçuş İşlemleri</a></li>");
			echo("<li><a href='AdminLogout.php'>Çıkış Yap</a></li>");			
		}
		else
		{
			echo('<li><a href="Admin_signInPage.php">Giriş Yap</a></li>');
		}
		?>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
<?php
if(!isset($_SESSION['admin_email']))
{
	header("Location : Admin_signInPage.php");
}
?>
<h1> Ne yapmak istersin?</h1>
<form action="AddFlights.php" class="form-inline" method="POST" >
  <button type="button" class="btn btn-danger"><a id="aa" href="AddFlightsPage.php">Uçuş Eklemek</a></button>
</form>
</br>
<form  class="form-inline" >
  <button type="button" class="btn btn-danger"><a id="aa" href="ViewFlightsAdmin.php">Uçuşları Görüntüle</a></button>
</form>
</div>
</body>
</html>