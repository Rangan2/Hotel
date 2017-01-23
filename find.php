<?php
include "connection/connection.php";
$name=$_GET['name'];
$sql="select * from customer_booking where cust_name1 like '$name%' or date like '$name%' ";
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
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #FFFFFF;
}
.style5 {font-size: 10}
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
            <td width="6%" align="center"><span class="style1">Sl No </span></td>
            <td width="9%" align="center"><span class="style4">Check-In-Id</span></td>
            <td width="12%"><span class="style1">Guest Name </span></td>
            <td width="9%" align="center"><span class="style1">Address</span></td>
            <td width="7%" align="center"><span class="style1">Arr Date </span></td>
            <td width="8%" align="center"><span class="style1">Time</span></td>
            <td width="6%" align="center"><span class="style1">Room</span></td>
            <td width="8%" align="center"><span class="style1">Dep Date </span></td>
            <td width="7%" align="center"><span class="style1">Time</span></td>
            <td width="11%" align="center"><span class="style1">Tel No </span></td>
            <td width="17%" align="center" class="style1"> Bill </td>
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
            <td align="center"><span class="style5"><?php echo $res['chk_in_id'];?></span></td>
            <td><?php echo $res['cust_name1'];?></td>
            <td align="center"><?php echo $ctyres['city_name'];?></td>
            <td align="center"><?php echo $res['date'];?></td>
            <td align="center"><?php echo $res['time'];?></td>
            <td align="center"><?php echo $rres['room_no'];?></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><?php echo $cres['contact_no'];?></td>
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
