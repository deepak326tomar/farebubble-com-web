<?php 
 include('../includes/apptop.php');
 $id = mysqli_real_escape_string($conn,$_POST['id']);
 $query=mysqli_query($conn,"SELECT * from tb_search where id='$id' limit 1");
//echo mysql_num_rows($query);
while($row=mysqli_fetch_assoc($query))
	{
		echo $detail = '<table>
	<tr>
    	<td>
        	Flight from: '.substr($row['rfrom'],0,35).'<br>
			Departure Date : '.$row['dep_date'].'<br>
			Adult : '.$row['adult'].'<br>
			Infant : '.$row['infant'].'<br>
			way : '.$row['way'].'<br>
			
		</td>
        <td>
            Flight to: '.substr($row['rto'],0,35).'<br>
        	Returning Date : '.$row['ret_date'].'<br>
        	child: '.$row['child'].'<br>
        	reservation_class : '.$row['reservation_class'].'<br>
        	partner: '.$row['partner'].'<br>
        	Enquiry Date: '.$row['add_date'].'

	    </td>
    </tr>
</table>
';
}
?>
