<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Sadece Uç </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.8.1/bootstrap-table.min.js"></script>
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

<!-- Display filghts -->
<!--List reservations-->
<div id="services" class="container-fluid text-center">
 <?php
 	$link = mysqli_connect('localhost', 'root', 'root', 'airlinereservation');
	//retrieve flights
	$sql = "SELECT fi.InstanceId, f.flight_no, fi.DepartureDate, fi.DepartTime, fi.ArriveTime, ta.cityName, fa.cityName FROM flight f JOIN flight_Instance fi ON f.flight_no =  fi.Flight_no JOIN Airport ta ON f.from_airport_id = ta.AirportId JOIN Airport fa ON f.to_airport_id = fa.AirportId;";
	$result = mysqli_query($link,$sql);

	if (mysqli_num_rows($result)>0)
	{
		echo("<h2>UÇUŞLAR</h2>");
		echo("<table id='onwardFlight' class='table table-hover' name='onwardflight' data-toggle='table' data-pagination='true' data-search='true'  data-fixed-columns='true'
       data-fixed-number='2'>");
		echo("<thead><th style=\"display: none;\"></th><th>Uçuş Numarası </th><th data-sortable='true'>Tarihi</th><th data-sortable='true'>Hareket Saati</th><th data-sortable='true'>Varış Zamanı<th>Nereden</th><th>Nereye</th></thead><tbody>");
	while(($row = mysqli_fetch_row($result))!=null)
	{
		echo("<tr><td id='InstanceId' style=\"display: none;\">".$row[0]."</td><td id='FlightNo'>"
		. $row[1]. "</td><td>" .$row[2]. "</td><td>" .$row[3]. "</td><td>" .$row[4]. "</td><td>".$row[5]."</td><td>".$row[6]."</td></tr>");
	}
		echo("</tbody></table>");
	}
 
  ?>
  <button id="cancelFlights">Uçuş İptal</button>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  
</footer>
<script>
$(document).ready(function(){
var InstnceId = null;
var FlightNo = null;
$('#onwardFlight').on('click-row.bs.table', function(e, row, $element){$('#onwardFlight').find('tbody tr.active').removeClass('active'); $element.addClass('active'); InstanceId = $element.find('#InstanceId').html(); FlightNo = $element.find('#FlightNo').html();});

// Post to the provided URL with the specified parameters.
$('#cancelFlights').click(function post(path, parameters) {
    var form = $('<form></form>');

    form.attr("method", "post");
    form.attr("action", "viewFlight.php");
        var field1 = $('<input></input>');
		var field2 = $('<input></input>');

        field1.attr("type", "text");
        field1.attr("name", "id1");
        field1.attr("value", InstanceId);
		
		field2.attr("type", "text");
        field2.attr("name", "id2");
        field2.attr("value", FlightNo);

        form.append(field1);
		form.append(field2);
    

   
    $(document.body).append(form);
    form.submit();
});
});
</script>

</body>
</html>

