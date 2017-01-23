<?php
include "connection/connection.php";	
	if(isset($_GET['date']))
	{
		$msql="select * from every_day_details where chk_in_date='$_GET[date]'";
		//echo $msql;exit;
		$mrec=mysql_query($msql);
		$mnum=mysql_num_rows($mrec);
		if($mnum > 0)
		{
			echo "<script>
			alert('Already Added')
			location.replace('index.php?')
		  </script>";
		}else{
			$sql="select * from customer_booking";
			$rec=mysql_query($sql);
			while($res=mysql_fetch_assoc($rec))
			{
				$ksql="select * from room_allotment where chk_in_id='$res[chk_in_id]' UNION ALL select * from new_room_allotment where chk_in_id='$res[chk_in_id]'";
				$krec=mysql_query($ksql);
				//echo $ksql;exit;
				$room="";
				while($kres=mysql_fetch_assoc($krec))
				{
					if($room=="")
					{
						$room=$kres['room_no'];
					}else{
						$room=$room.",".$kres['room_no'];
					}
				}
				$psql="insert into every_day_details(chk_in_id,room_no,chk_in_date) values('$res[chk_in_id]','$room','$_GET[date]')";
				$prec=mysql_query($psql);
			}
			echo "<script>
				alert('Added')
				location.replace('index.php?')
			  </script>";
		}
	}
?>