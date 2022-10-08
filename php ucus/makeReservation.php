<?php
session_start();
$ReservationId = substr(md5(microtime()),rand(0,26),5);
$onInstance = $_SESSION['onInstance'];
$returnInstance = $_SESSION['returnInstance'];
$username = $_SESSION['username'];
$category = 'Economy';
echo $onInstance;




// Update the available seats in Availability table
/*$sql6 = "SELECT Availability FROM available_seats WHERE InstanceId = $onInstance AND CategoryId = $category;";	
$result6 = mysqli_query($link,$sql6);
$availability = 0;
if (mysqli_num_rows($result6)>0)
			{
				while(($row = mysqli_fetch_row($result6))!=null)
				{    
					echo "Toplam Koltuk : " ;
					echo("$row[0] <br />");
					$availability = intval($row[0]);
				}
				if($availability-$guests < 0)
				{
					$_SESSION['error_msg'] = "Üzgünüz, seçtiğiniz uçuşta yeterli koltuk bulunmuyor";
					header("Location: 'errorPage.php'");
				}
				
			}
			else
			{
				echo("Üzgünüz, bu uçuş için toplam koltuk bilgisini alamıyoruz.");
			} 
echo("Kullanılabilirlik: $availability Guests: $guests  ");
$sql7 = "UPDATE available_seats SET Availability = '".($availability - $guests) ."' WHERE InstanceId = $onInstance AND CategoryId = '$category';";
echo("Yolcu Sayısı: ".$guests." ");
echo ( "Yolcu Ekle: ".$sql7 );	
$result7 = mysqli_query($link,$sql7);

// Add seats for the return flight
// Update the available seats in Availability table
if($returnInstance != null)
{
	$sql6 = "SELECT Availability FROM available_seats WHERE InstanceId = $returnInstance AND CategoryId = 'Economy';";	
	$result6 = mysqli_query($link,$sql6);
	$availability = 0;
	if (mysqli_num_rows($result6)>0)
				{
					while(($row = mysqli_fetch_row($result6))!=null)
					{    
						echo "Total_seats are : " ;
						echo("$row[0] <br />");
						$availability = intval($row[0]);
					}
					if($availability-$guests < 0)
					{
						$_SESSION['error_msg'] = "Üzgünüz, seçtiğiniz uçuşta yeterli koltuk bulunmuyor";
						header("Location: 'errorPage.php'");
					}
					
				}
				else
				{
					echo("Üzgünüz, bu uçuş için toplam koltuk bilgisini alamıyoruz.");
				} 
	echo("Kullanılabilirlik: $availability Guests: $guests  ");
	$sql7 = "UPDATE available_seats SET Availability = '".($availability - $guests) ."' WHERE InstanceId = $returnInstance AND CategoryId = '$category';";
	echo("Yolcu Sayısı: ".$guests." ");
	echo ( "Yolcu Ekle: ".$sql7 );	
	$result7 = mysqli_query($link,$sql7);
}*/
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//Add reservation to reservation table
$link = mysqli_connect('localhost', 'root', 'root', 'airlinereservation');
echo $_SESSION['onI'];
$sql1 = "INSERT INTO reservation(ReservationId, Username,InstanceId, ReturnInstanceId) values ('$ReservationId', '$username', '$onInstance', '$returnInstance');";
$result = mysqli_query($link,$sql1);
if($result)  
{
	echo("Ekleme İşleminiz, Rezervasyonda başarılı oldu");	
}
else
{
	echo "$sql1";
	echo("Maalesef şu anda rezervasyon yapamıyoruz");
}
/*
//Add passenger to passenger table
for($i=1; $i<=$guests; $i++)
{
	$passengerId = substr(md5(microtime()),rand(0,26),5);
	$fieldname = "firstname".$i;
	echo("fieldname: $fieldname");
	$pass_firstname = $_POST["$fieldname"];
	$fieldname = "age".$i;
	$pass_age = $_POST["$fieldname"];
	$fieldname = "mealpref".$i;
	$pass_mealpref = $_POST["$fieldname"];
	$sql2 = "INSERT INTO passenger(passengerId, Passenger_Name, Passenger_Age, Meal_Preference) values ('$passengerId', '$pass_firstname', '$pass_age', '$pass_mealpref');";
	echo(" Seatsql: $sql2 ");
	$result = mysqli_query($link,$sql2);
	if($result)  
	{
		echo("Yolcu Ekleme Başarılı Oldu");
       // echo "passenger : $i";		
	}
	else
	{
		echo "$sql2";
		echo("Maalesef şu anda rezervasyon yapamıyoruz");
	}
	
	// Adding reservations to the passenger_reservation table
	$sql3 = "INSERT INTO passenger_reservation(PassengerId, ReservationId) values ('$passengerId', '$ReservationId');";
	$result4 = mysqli_query($link,$sql3);
	if($result4)  
	{
		
		echo("Yolcu Ekleme İşlemi Rezervasyonunuz İçin Başarılı Oldu");	
	}
	else
	{
		echo "$sql4";
		echo("Başka zamana inşaallah");
	}
	
	
}
// Add seat to seats table
for($i=1; $i<=$guests+1 ; $i++)
{
	
	$Seat_no = substr(md5(microtime()),rand(0,26),5);
	$Seat_Category = $category;
	$sql4 = "INSERT INTO seats(Seat_no, Seat_Category) values ('$Seat_no', '$category');";
	$result = mysqli_query($link,$sql4);
	if($result)  
	{
		
		echo("Yolcu Ekleme İşlemi Başarılı");	
	}
	else
	{
		//echo "$sql2";
		echo("Başka zamana inşaallah");
	}
// Add seats_reservation to the table
$sql5 = "INSERT INTO seats_reservation(Seat_no, ReservationId) values ('$Seat_no', '$ReservationId');";	
$result2 = mysqli_query($link,$sql5);
	if($result2)  
	{
		echo "$i";
		//echo "$sql3";
		echo("Insertion was succesful into Seats_Reservation");	
	}
	else
	{
		echo "$sql5";
		echo("Başka zamana inşaallah");
	}
}	
//If 2 way journey, add return flight seats
if($returnInstance !=null)
{
	for($i=1; $i<=$guests+1 ; $i++)
	{
		
		$Seat_no = substr(md5(microtime()),rand(0,26),5);
		$Seat_Category = $category;
		$sql4 = "INSERT INTO seats(Seat_no, Seat_Category) values ('$Seat_no', '$category');";
		$result = mysqli_query($link,$sql4);
		if($result)  
		{
			
			echo("Ekleme İşleminiz, Rezervasyonda başarılı oldu");	
		}
		else
		{
			//echo "$sql2";
			echo("Başka zamana inşaallah");
		}*/
	// Add (return) seats_reservation to the table
	/*$sql5 = "INSERT INTO seats_reservation(Seat_no, ReservationId) values ('$Seat_no', '$ReservationId');";	
	$result2 = mysqli_query($link,$sql5);
		if($result2)  
		{
			
			echo("Ekleme İşleminiz, Rezervasyonda başarılı oldu");	
		}
		else
		{
			echo "$sql5";
			echo("Başka zamana inşaallah");
		}
	}
}*/
//If successful, go to viewReservations
header("Location: bookingSuccess.php");
?>