<?php
include "connection/connection.php";
$name=$_GET['date'];
$sql="select * from customer_booking where cust_name1 like '$name' ";
$rec=mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="101%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
	  <?php
	  if($name=="")
	  {
	  ?>
	  <td align="center"></td>
	  <?php
	  }else{
	  ?>
        <td align="center"><table width="95%" border="0">
          <tr bgcolor="#666666">
            <td width="9%" align="center"><span class="style1">Sl No </span></td>
            <td width="16%"><span class="style1">Guest Name </span></td>
            <td width="10%" align="center"><span class="style1">Arr Date </span></td>
            <td width="8%" align="center"><span class="style1">Time</span></td>
            <td width="8%" align="center"><span class="style1">Room</span></td>
            <td width="8%" align="center"><span class="style1">Dep Date </span></td>
            </tr>

          <?php
				$i=1;
				while($res=mysql_fetch_assoc($rec))
				{
					if($i%2==0)
					{
						$bg="bgcolor='#C5C5C5'";
					}else{
						$bg="bgcolor='#D5D5D5'";
					}
					$rsql="select * from room_allotment where chk_in_id='$res[chk_in_id]'";
					$rrec=mysql_query($rsql);
					$rres=mysql_fetch_assoc($rrec);
					$csql="select * from customer_address where chk_in_id='$res[chk_in_id]'";
					$crec=mysql_query($csql);
					$cres=mysql_fetch_assoc($crec);
					$cty="select * from city_details where city_id='$cres[city]'";
					$ctyrec=mysql_query($cty);
					$ctyres=mysql_fetch_assoc($ctyrec);
			?>
          <tr <?php echo $bg;?>>
            <td align="center"><?php echo $i;?></td>
            <td><?php echo $res['cust_name1'];?></td>
            <td align="center"><?php echo $res['date'];?></td>
            <td align="center"><?php echo $res['time'];?></td>
            <td align="center"><?php echo $rres['room_no'];?></td>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
					$i++;
				}
			?>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        </table>
       	</td>
		<?php
			}
		?>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
