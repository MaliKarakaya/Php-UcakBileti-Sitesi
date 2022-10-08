<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Sadece Uç | Rezervasyonlar</title>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

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
        <li><a href="viewFlights.php">Uçuşlar</a></li>
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

<!--Signup-->
<div class="jumbotron text-center">
<h1>Rezervasyonlar</h1>
 </div>   
</div>
<!--List reservations-->
<div id="services" class="container-fluid text-center">
 <?php
  if(isset($_SESSION['username']))
  {
	echo ("<h3>Merhaba ". $_SESSION['user_fname']. "!</h3>");
	$username = $_SESSION['username'];
	$link = mysqli_connect('localhost', 'root', 'root', 'airlinereservation');
	//check if user with same username exists in db
	$sql = "SELECT r.reservationId, f.flight_no, fi.DepartTime, fi.DepartureDate, fa.cityName, ta.cityName, fi.ArriveTime, fi.ArrivalDate, r.ReturnInstanceId, fi.status FROM reservation r JOIN user u ON r.username = u.UserName JOIN Flight_Instance fi ON r.InstanceId = fi.InstanceId JOIN flight f ON fi.flight_no = f.flight_no JOIN airport fa ON f.from_airport_id = fa.airportId JOIN airport ta ON f.to_airport_id = ta.airportId WHERE u.username = '".$username."';";
	$result = mysqli_query($link,$sql);

	if (mysqli_num_rows($result)>0)
	{
		echo("<table class='table table-hover' >");
		echo("<thead><th>Rezervasyon ID</th><th>Uçuş Numarası</th><th>Zamanı</th><th>Tarihi</th><th>Nereden</th><th>Nereye</th></thead><tbody>");
	$i=0;
	while(($row = mysqli_fetch_row($result))!=null)
	{
		$flightStatus = $row[9];
		if($flightStatus == 0)
		{
			echo("<tr><td colspan = '6'><strong>Uçuş: $row[1]  İptal Edildi</strong></td></tr>");
		}
		else
		{
		echo("<tr data-toggle='collapse' data-target='#accordion$i' class='clickable'><td>".$row[0]. "</td><td> " . $row[1]. "</td><td> ". $row[2]. "</td><td> ". $row[3]."</td><td>". $row[4]. "</td><td>". $row[5]. "</td></tr>");
		echo("<tr>
            <td colspan='6'>
                <div id='accordion$i' class='collapse'>Varış Bilgileri:<br/> Zamanı: ". $row[6]. " Tarihi:   ". $row[7]);
		$i++;
		$returnInstanceId = $row[8];
		if($returnInstanceId!=null)
		{
			$sql1 = "SELECT Flight_no, DepartTime, DepartureDate, ArriveTime, ArrivalDate, Status FROM Flight_instance WHERE InstanceId = '$returnInstanceId';";
			$result1 = mysqli_query($link,$sql1);
			if ( mysqli_num_rows($result1)>0)
			{
				$row1 = mysqli_fetch_row($result1);
				$retFlightStatus = $row1[5];
				if($retFlightStatus == 0)
				{
				  echo("<strong>Uçuş: $row1[0] İptal Edildi</strong>");
				}
				else
				{
					echo("<br />Dönüş Uçuşu: $row1[0] <br/>Kalkış Saati: ". $row1[1]. " Kalkış Tarihi:   ". $row1[2]. " <br/>Varış Zamanı: ". $row1[3]. " Varış Tarihi:   ". $row1[4]);
				}
			}
		}
		echo("<br/></div></td></tr>");
		}
	}
		echo("</tbody></table>");
	}
	else
	{
		echo("Rezervasyonunuz Bulunmamaktadır.");
		//echo ($sql);
	}
  }
  else{
	  header("Location: home.html");
  }
  ?>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; Yanlızca Uç | Tüm hakları saklıdır </p>
</footer>


</body>
</html>

