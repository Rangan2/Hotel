<?php
include "connection/connection.php";
include "include/function.php";
if(isset($_POST['Submit']))
{
	//@$chk_id=$_POST['chk_id'];
	$orno=$_POST['orno'];
	$nrno=$_POST['nrno'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$rtariff=$_POST['rtariff'];
	$exbed=$_POST['exbed'];
	$advance=$_POST['advance'];
	$chkotdate=$_POST['chkotdate'];
	$pax=$_POST['pax'];
	$total=$_POST['total'];
	$mode=$_POST['mode'];
	$fsql="select * from room_allotment where room_no='$orno'";
	$frec=mysql_query($fsql);
	$fres=mysql_fetch_assoc($frec);
	$nsql="select * from customer_booking where chk_in_id='$fres[chk_in_id]'";
	//echo $nsql;exit;
	$nrec=mysql_query($nsql);
	$nres=mysql_fetch_assoc($nrec);
	if($nres['date']!= $date)
	{
		$sql="insert into new_room_allotment(chk_in_id,room_no,room_tariff,extra_bed,chk_in_date,advance,exp_chk_out_date,pax,total_advance,pay_mode) values('$fres[chk_in_id]','$nrno','$rtariff','$exbed','$date','$advance','$chkotdate','$pax','$total','$mode')";
		$nsql="update room_master set room_status='Available' where room_number='$orno'";
	}else{
		$sql="update room_allotment set room_no='$nrno' and chk_in_date='$date' and room_tariff='$rtariff' and extra_bed='$exbed' and advance='$advance' and exp_chk_out_date='$chkotdate' and pax='$pax' and total_advance='$total' and pay_mode='$mode' where chk_in_id='$fres[chk_in_id]'";
		//echo $sql;exit;
	}
	$nsql="update room_master set room_status='Available' where room_number='$orno'";
	$rec=mysql_query($sql);
	//echo $nsql;exit;
	//$nsql="update room_master set room_status='Booked' where room_number='$rno'";
	$nrec=mysql_query($nsql);
	$mysql="update room_master set room_status='Booked' where room_number='$nrno'";
	$myrec=mysql_query($mysql);
	if($rec)
	{
		echo "<script>
				alert('Data Inserted')
				location.replace('room_shift.php?recent=6');
			  </script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script>
	function change(str)
	{
		location.replace(str);
	}
</script>
<link rel="stylesheet" type="text/css" href="style/style.css">
<body>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #888FFF; border-radius:5px;">
  <tr>
    <td><?php include "include/header.php";?></td>
  </tr>
  <tr>
    <td bgcolor="#696969">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#696969">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#696969">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#696969"><table width="70%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><table width="101%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #8888FF; border-radius:5px;">
          <tr>
            <td><?php include "include/check_in_header.php";?></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style=" border:1px solid #C5C5C5;border-radius:5px;">
                <tr>
                  <td align="center"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
                        <tr>
                          <td width="100%" height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Old Room No </td>
                                <td width="15%"><select name="orno" id="orno">
								<option value="0">... Select ...</option>
								<?php
									$rsql="select * from room_master where room_status='Booked'";
									$rrec=mysql_query($rsql);
									while($rres=mysql_fetch_assoc($rrec))
									{
								?>
                                  <option value="<?php echo $rres['room_number'];?>"><?php echo $rres['room_number'];?></option>
								  <?php
								  	}
								  ?>
                                </select>                                </td>
                                <td width="46%" align="center"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><input type="submit" name="Submit" value="Save and Register" style="background-color:transparent; cursor:pointer;" /></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table></td>
                                <td width="22%" align="left">&nbsp;</td>
                              </tr>
							  <tr>
                                <td width="17%">&nbsp;New Room No </td>
                                <td width="15%"><select name="nrno" id="nrno">
								<option value="0">... Select ...</option>
								<?php
									$rsql="select * from room_master where room_status='Available'";
									$rrec=mysql_query($rsql);
									while($rres=mysql_fetch_assoc($rrec))
									{
								?>
                                  <option value="<?php echo $rres['room_number'];?>"><?php echo $rres['room_number'];?></option>
								  <?php
								  	}
								  ?>
                                </select>                                </td>
                                <td width="46%" align="center">&nbsp;</td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">New</td>
                                  </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Date</td>
                                <td width="20%"><input name="date" type="txt" id="date" style=" width:100px" value="<?php echo date("d/m/Y")?>"  readonly /></td>
                                <td width="41%">&nbsp;Total Advance </td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">History</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Time</td>
                                <td width="20%"><input name="time" type="text" id="time" style=" width:100px" value="<?php echo date("h:i:s",time())." ".date('a');?>" readonly /></td>
                                <td width="41%" valign="top"><input name="total" type="text" id="total" style=" width:100px" /></td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Waiting</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Room Tariff </td>
                                <td width="17%"><input name="rtariff" type="text" id="rtariff" style=" width:100px" /></td>
                                <td width="44%">&nbsp;</td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Close</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Extra Bed Charge </td>
                                <td width="17%"><input name="exbed" type="text" id="exbed" style=" width:100px" /></td>
                                <td width="44%" valign="baseline">&nbsp;Pay Mode </td>
                                <td width="22%" align="left">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Advance</td>
                                <td width="17%"><input name="advance" type="text" id="advance" style=" width:100px" /></td>
                                <td width="41%" align="left"><select name="mode" id="mode">
                                    <option value="0">... select ...</option>
                                    <option value="cash">Cash</option>
                                                                  </select>                                </td>
                                <td width="25%">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Exp check out date </td>
                                <td width="17%"><input name="chkotdate" type="date" id="chkotdate" style=" width:100px" /></td>
                                <td width="41%" align="left"><input name="destination" type="text" id="destination" placholder="Type : Non A/C Deluxe" readonly /></td>
                                <td width="25%">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Pax</td>
                                <td width="17%"><input name="pax" type="text" id="pax" style=" width:100px" /></td>
                                <td width="41%" align="left"><input name="destination2" type="text" id="destination2" placholder="Cleaned" readonly /></td>
                                <td width="25%">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22" align="center"><label></label></td>
                        </tr>
                        <tr>
                          <td height="22" align="center">&nbsp;</td>
                        </tr>
                      </table>
                  </form></td>
                </tr>
            </table></td>
          </tr>

        </table></td>
      </tr>
    </table>
    s</td>
  </tr>
  <tr>
    <td bgcolor="#696969">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#696969">&nbsp;</td>
  </tr>
</table>
</body>
</html>
