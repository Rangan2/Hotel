<?php
	include "connection/connection.php";
	if(isset($_POST['Submit']))
	{
		$rtype=$_POST['room_type'];
		$ssql="select * from room_type_master where room_type='$rtype'";
		//echo $ssql;
		$srec=mysql_query($ssql);
		$sres=mysql_fetch_assoc($srec);
		$sql="select * from room_master where room_type='$sres[room_type_id]'";
	}else{
		$sql="select * from room_master order by room_number";
		
	}
	//echo $sql;
	$rec=mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" href="style/style.css">
<script type="text/javascript" src="js/all.js">
</script>
<body>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #888FFF; border-radius:5px;">
  <tr>
    <td><?php include "include/header.php";?></td>
  </tr>
  <tr>
    <td class="front_desk">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="front_desk"><form id="form1" name="form1" method="post" action="">
      <table width="70%" border="0" cellspacing="0" cellpadding="0" style="border:3px solid #888FFF; border-radius:5px;">
        <tr>
          <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
              <tr>
                <td height="30" class="first_row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="85%">Front Desk </td>
                      <td width="5%">&nbsp;</td>
                      <td width="5%">&nbsp;</td>
                      <td width="5%">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td class="front_desk_second_row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="33%">&nbsp;</td>
                      <td width="39%" align="center" valign="middle">HOTEL DEVJOYTI </td>
                      <td width="17%" align="center" id="show">&nbsp;</td>
                      <td width="11%" align="center" valign="middle" id="inner" class="front_desk_second_row_time">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="center" valign="middle" class="front_desk_middle_row" style="cursor:pointer;"><table width="79%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <?php
				$i=1;
				while($res=mysql_fetch_assoc($rec))
				{
					//echo $i;
					//$new_sql="select * from booking_master where room_id='$res[room_id]'";
				//	echo $new_sql."<hr>";
					//$new_rec=mysql_query($new_sql);
					//$new_num=mysql_num_rows($new_rec);
					//echo $new_num."<hr>";
					if($res['room_status']=="Booked")
					{
						$bg="bgcolor='#FF935B'";
					}else if($res['room_status']=="Available"){
						$bg="bgcolor='#80FF80'";
					}else if($res['room_status']=="Blocked"){
						$bg="bgcolor='#999999'";
					}else if($res['room_status']=="Maintenance"){
						$bg="bgcolor='#FFCC00'";
					}
			?>
                      <td align="center" valign="middle"  ><table width="84%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #000000; border-radius:5px;" <?php echo $bg;?>>
                          <tr>
                            <td align="center"><table width="99%" border="0" cellspacing="0" cellpadding="0" >
                                <tr>
                                  <td align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align="center" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><?php echo $res['room_number'];?></td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                            </table></td>
                          </tr>
                      </table></td>
                      <?php
			  		if($i%10==0)
					{
						echo "<tr><td height='10'></td></tr><tr>";
					}
			  		$i++;
				}
			  ?>
                    </tr>
                </table></td>
              </tr>
              <?php
			for($loop=1;$loop<=15;$loop++)
			{
		?>
              <tr>
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <?php
			}
		?>
              <tr>
                <td align="center"><?php include "include/front_desk_footer.php";?>
                </td>
              </tr>
          </table></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
  <tr>
    <td class="front_desk">&nbsp;</td>
  </tr>
</table>
</body>
</html>
