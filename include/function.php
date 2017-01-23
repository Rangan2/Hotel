<?php
	$i=1000;
	$sql="select * from customer_booking";
	$rec=mysql_query($sql);
	$num=mysql_num_rows($rec);
	if($num > 0)
	{
		$asql="select * from customer_address";
		$arec=mysql_query($asql);
		$anum=mysql_num_rows($arec);
		if($anum > 0)
		{
			$pql="select * from room_allotment";
			$prec=mysql_query($pql);
			$pnum=mysql_num_rows($prec);
			if($pnum > 0)
			{
				$id=$i+$pnum;
			}else{
				$id=$i+$pnum;
			}
		}else{
			$id=$i+$anum;
		}
	}else{
	$id=$i+$num;
	}
	$new_sql="select * from room_allotment";
	$new_rec=mysql_query($new_sql);
	$new_num=mysql_num_rows($new_rec);
	$new_id=$i+$new_num;
	//echo $id;
?>