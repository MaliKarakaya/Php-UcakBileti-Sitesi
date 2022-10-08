<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Sadece Uç| Uçuş Defteri</title>
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

<!--Signup-->
<div class="jumbotron text-center">
<h1>Uçuş Defteri </h1>
  <?php
	if(!isset($_SESSION['user_fname']))
	{
		header("Location: loginPage.php");
	}	
	$onInstance = $_POST['OnwardInstanceID'];
	$returnInstance = $_POST['ReturnInstanceID'];
	//echo("onward= " . $onInstance);
	//if($returnInstance !=null)
	//	echo("return" . $returnInstance);
?>
<div class="row">
			<h3>Uçuş Bilgileri:</h3><br />
			<div class = "col-sm-2">
			</div>
			<div class = "col-sm-8">
			<?php
			
			if($returnInstance!=null)
				echo ("<h3>Gidiş Uçuşu</h3>");
			$link = mysqli_connect("localhost", "root", "root", "airlinereservation");
			$sql = "SELECT fi.DepartureDate, fi.DepartTime, fi.ArrivalDate, fi.ArriveTime, fa.CityName, ta.CityName FROM Flight_Instance fi JOIN Flight f ON fi.flight_no = f.flight_no JOIN airport ta ON f.to_airport_id = ta.airportId JOIN airport fa ON f.From_Airport_id = fa.airportId WHERE fi.InstanceId = '".$onInstance."';";
			$result = mysqli_query($link,$sql);

			if (mysqli_num_rows($result)>0)
			{
				echo("<table class='table'>");
				echo("<thead><th>Uçuş#</th><th>Kalkış</th><th>Zaman</th><th> Varış</th><th>Zaman</th><th>Nereden</th><th>Nereye</th></thead><tbody>");
			while(($row = mysqli_fetch_row($result))!=null)
			{
				echo("<tr><td>".$onInstance."</td><td>".$row[0]. "</td><td> " . $row[1]. "</td><td> ". $row[2]. "</td><td> ". $row[3]."</td><td>". $row[4]. "</td><td>". $row[5]. "</td></tr>");
			}
			echo("</tbody></table>");
			
			//display seat availability
			echo("<h3> Koltuk Bilgisi </h3>");
			$sql = "SELECT CategoryId, Availability FROM available_seats WHERE InstanceId = $onInstance;";
			$result = mysqli_query($link,$sql);
			$isAvailableOn = false;
			if (mysqli_num_rows($result)>0)
			{
				while(($row = mysqli_fetch_row($result))!=null)
				{
					if($row[1] > 0)
					{
						echo("$row[0] $row[1]<br />");
						$isAvailableOn = true;
					}
					
				}
			}
			else
			{
				echo("Maalesef, bu uçuş için koltuk bilgisi getiremiyoruz\n");
			}
			
			}
			else{
				echo("Uçuş Bulunamadı");
			}
			
			$isAvailableReturn = true;
			
			
			if($returnInstance!=null)
			{
				echo ("<h3>Dönüş Uçuşu</h3>");
				$link = mysqli_connect("localhost", "root", "root", "airlinereservation");
			$sql = "SELECT fi.DepartureDate, fi.DepartTime, fi.ArrivalDate, fi.ArriveTime, fa.CityName, ta.CityName FROM Flight_Instance fi JOIN Flight f ON fi.flight_no = f.flight_no JOIN airport ta ON f.to_airport_id = ta.airportId JOIN airport fa ON f.From_Airport_id = fa.airportId WHERE fi.InstanceId = '".$returnInstance."';";
			$result = mysqli_query($link,$sql);

			
			if (mysqli_num_rows($result)>0)
			{
				echo("<table class='table'>");
				echo("<thead><th>Uçuş#</th><th>Kalkış</th><th>Zaman</th><th> Varış</th><th>Zaman</th><th>Nereden</th><th>Nereye</th></thead><tbody>");
			while(($row = mysqli_fetch_row($result))!=null)
			{
				echo("<tr><td>".$returnInstance."</td><td>".$row[0]. "</td><td> " . $row[1]. "</td><td> ". $row[2]. "</td><td> ". $row[3]."</td><td>". $row[4]. "</td><td>". $row[5]. "</td></tr>");
			}
			echo("</tbody></table>");
			
			//display seat availability
			echo("<h3> Koltuk Durumu </h3>");
			$sql = "SELECT CategoryId, Availability FROM available_seats WHERE InstanceId = $returnInstance;";
			$result = mysqli_query($link,$sql);
			$isAvailableReturn = false;
			if (mysqli_num_rows($result)>0)
			{
				while(($row = mysqli_fetch_row($result))!=null)
				{
					if($row[1] > 0)
					{
						echo("$row[0] $row[1]<br />");
						$isAvailableReturn = true;
					}
				}
			}
			else
			{
				echo("Maalesef, bu uçuş için koltuk bilgisi getiremiyoruz\n");
			}
			
			}
			else{
				echo("Uçuş bulunamadı");
			}
			}
			if($isAvailableOn && $isAvailableReturn)
			{
			
			?>
			<br />
			<br />
			<h3>Yolcu Bilgisi: </h3>
			<form action="passengerInfo.php" method="post" class="form" role="form">
			<input type="hidden" name="onInstance" value=" <?echo=$_POST[$onInstance]; ?>" />
				
				<input type="hidden" name="returnInstance" value="<? echo =$_POST[ $returnInstance]; ?>" />
				
				<?php
				
				$_SESSION['onInstance']=$onInstance;
				$_SESSION['returnInstance']=$returnInstance;
				?>
			

				<label for = "firstname">Adı: </label>
				<div  class = "form-inline">
					<input class="form-control" name="firstname" id = "firstname" placeholder="Ad" type="text" required autofocus />
                    <input class="form-control" name="lastname" id = "lastname" placeholder="Soyad" type="text" required />
				</div>
			<br/>
			<div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" > 
					<label for = "lastname">Doğum Tarihi </label><input class="form-control" name="dob" id = "dob" placeholder="Date of Birth" type="date" size = "10" required />
					<br />
					<select name="category" class="form-control" placeholder="Category">
						<option value="Economy">Ekonomik</option>
						<option value="First Class">Birinci Sınıf</option>
						<option value="Business Economy">Business Ekonomik</option>
						<option value="Business Class">Business Class</option>
					</select>
					<label for = "guests">Yanınızda Yolculuk Eden Yolcu Sayısı </label><input class="form-control" name="guests" id = "guests" placeholder="Yolcu Sayısı" type="text" size = "10" required />
			        <br />
					<button class="btn btn-lg btn-primary btn-block" type="submit">Devam Et</button> 
			</div>
			</form>
			<?php
			
		
				
				
			
			}//end of if
			else{
				echo("\nÜzgünüz, bu uçuşta müsait koltuk bulunmuyor.");
			}
			?>
		</div><!-- col-sm-8 -->	
 </div>   
</div>



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>&copy; Yanlızca Uç Tüm Hakları Saklıdır</p>
</footer>


</body>
</html>
