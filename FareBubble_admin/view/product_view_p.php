<?php 
 include('../includes/apptop.php');
 $id = mysqli_real_escape_string($conn,$_POST['id']);
 $query=mysqli_query($conn,"SELECT * from tb_enquiry where id='$id' limit 1");
//echo mysql_num_rows($query);
while($row=mysqli_fetch_assoc($query))
	{
		echo $detail = '<table>
	<tr>
    	<td>
        	Flight from: '.substr($row['reservation_from'],0,35).'<br>
			Departure Date : '.$row['dep_date'].'<br>
			Adult : '.$row['adult'].'<br>
			Infant : '.$row['infant'].'<br>
			way : '.$row['way'].'<br>
			flight_name : '.$row['flight_name'].'<br>
			One way flight carrier code : '.$row['carrier_number1'].'<br>
			One way fly dpart arrival time : '.$row['one_way_fly_arrival_dpart_time'].'<br>
			Full Name : '.$row['full_name'].'<br>
			Card Type : '.$row['card_type'].'<br>
			Card Expiry : '.$row['card_expiry'].'<br>

			house_address : '.$row['house_address'].'<br>
			cityname : '.$row['cityname'].'<br>
			country_name : '.$row['country_name'].'<br>

			cancellation_program : '.$row['cancellation_program'].'<br>
			
			mobile : '.$row['mobile'].'<br>
			add_date: '.$row['add_date'].'<br>
		</td>
        <td>
            Flight to: '.substr($row['reservation_to'],0,35).'<br>
        	Returning Date : '.$row['ret_date'].'<br>
        	child: '.$row['child'].'<br>
        	reservation_class : '.$row['reservation_class'].'<br>
        	partner: '.$row['partner'].'<br>
        	total_price :'.$row['total_price'].'<br>
			Roundtrip flight carrier code : '.$row['carrier_number2'].'<br>
			Rountrip fly arrival dpart time : '.$row['rountrip_fly_arrival_dpart_time'].'<br>
			Dob : '.$row['dob'].'<br>
			Cart No : '.$row['card_no'].'<br>
			Card Cvv : '.$row['card_cvv'].'<br>

			street_address : '.$row['street_address'].'<br>
			state_name : '.$row['state_name'].'<br>
			pincode: '.$row['pincode'].'<br>
			gender: '.$row['gender'].'<br>

			phone : '.$row['phone'].'<br>
			email: '.$row['email'].'<br>
			


	    </td>
    </tr>
</table>
';
}
?>
