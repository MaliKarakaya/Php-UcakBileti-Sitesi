<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Uçuş Ekle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" href="css/home.css">
  <script src="js/home.js"></script>
 
  
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
		<?php
		if(isset($_SESSION['admin_email']))
		{
			echo("<li><a href='updateFlightsPage.php'>Uçuş İşlemleri</a></li>");
			echo("<li><a href='AdminLogout.php'>Çıkış Yap</a></li>");			
		}
		else
		{
			header("Location : Admin_signInPage.php");
		}
		?>
      </ul>
    </div>
  </div>
</nav>


<div class="jumbotron text-center">
<h1>Uçuş Ekle</h1>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-sm-offset-4 col-xs-offset-2 col-md-offset-4" >
            <form class="form" role="form" action="AddFlights.php" method ="POST">
            <table>
			
			
			 <tr>
			
            <tr>
            
            <td> <label for = "flight_no">Uçuş Numarası: </label><input class="form-control" name="flight_no" id = "flight_no" placeholder="Uçuş Numarası" /></td>
			<td></td>
			</tr>
			<tr>
			<td><label for = "from">Kalkılacak Havalimanı </label>
   <select name="from" class="form-control" id = "from"  placeholder="Kalkılacak Havalimanı" required>
     <option value="1">Istanbul Sabiha Gökçen</option>
    <option value="2">Ankara Havalimanı</option>
    <option value="3">Mersin Havalimanı</option>
    <option value="4">Antalya Havalimanı</option>
	<option value="5">Samsun Havalimanı</option>
	<option value="6">Erzurum Havalimanı</option>
	
  </select>
			</td>
            <td> <label for = "to">İnilecek Havalimanı</label>
			   <select name="to" class="form-control"  id= "to"  placeholder="İnilecek Havalimanı" required>
 <option value="4">Antalya Havalimanı</option>
    <option value="2">Ankara Havalimanı</option>
    <option value="6">Erzurum Havalimanı</option>
  	<option value="5">Samsun Havalimanı</option>
	<option value="1">Istanbul Havalimanı</option>
	<option value="3">Mersin Havalimanı</option>


  </select>

			</td>
			 </tr>	
<tr>
			<td><label for = "fromCity">Hangi Şehirden </label>
   <select name="fromCity" class="form-control" id = "fromCity"  placeholder="Nereden" required>
     <option value="Istanbul">Istanbul</option>
    <option value="Ankara">Ankara</option>
    <option value="Mersin">Mersin</option>
    <option value="Antalya">Antalya</option>
	<option value="Samsun">Samsun</option>
	<option value="Erzurum">Erzurum</option>
	
  </select>
			</td>
            <td> <label for = "toCity">Hangi Şehire</label>
			   <select name="toCity" class="form-control"  id= "toCity"  placeholder="Nereye" required>
 <option value="Antalya">Antalya</option>
    <option value="Ankara">Ankara</option>
    <option value="Erzurum">Erzurum</option>
    <option value="Trabzon">Trabzon</option>
	<option value="Samsun">Samsun</option>
	<option value="Istanbul">Istanbul</option>
	<option value="Mersin">Mersin</option>


  </select>

			</td>
			 </tr>
			 <tr>
			 <td><label for = "category">Kategori: </label>
			 
			<select name="category" class="form-control" id="category" placeholder="Category">
						<option value="Economy">Ekonomik</option>
						<option value="First Class">Birinci Sınıf</option>
						<option value="Business Economy">Business Ekonomik</option>
						<option value="Business Class">Business Class</option>
					</select>
			 
			 
			 
			 </td>
			<td><label for = "seats">Koltuk Durumu: </label><input class="form-control" name="seats" id = "seats" placeholder="Koltuk Durumu"  /></td>
			</tr>
			<tr>
			<td><label for = "depart_time">Hareket saati: </label><input class="form-control" name="depart_time" id = "depart_time" placeholder="Hareket saati:" type="time"/></td>
             <td><label for = "arrive_time">Varış zamanı: </label><input class="form-control" name="arrive_time" id= "arrive_time" placeholder="Varış zamanı:" type="time"/></td>
			  </tr>
			  <tr>
			<td> <label for = "arrive_date">Varış tarihi: </label><input class="form-control" name="arrive_date" id= "arrive_date" placeholder="Varış tarihi:"  type="date"/></td>
            <td> <label for = "depart_date">Ayrılış tarihi: </label><input class="form-control" name="depart_date" id= "depart_date" placeholder="Ayrılış tarihi:"  type="date"/></td>
			  </tr>
			 <tr>
			<td> <label for = "arrive_date">Ücret: </label><input class="form-control" name="fare" id= "fare" placeholder="Ücret"  type="number" min="0"/></td>
			  </tr>
			  </table>
			  
			 <br/>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ekle</button>
            </form>
        </div>
 </div>   
</div>




</body>
</html>