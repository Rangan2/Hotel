<?php
include "connection/connection.php";
include "include/function.php";
if(isset($_POST['Submit']))
{
	//@$cid=$_POST['cid'];
	$rno=$_POST['rno'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$rtariff=$_POST['rtariff'];
	$exbed=$_POST['exbed'];
	$advance=$_POST['advance'];
	$chkotdate=$_POST['chkotdate'];
	$pax=$_POST['pax'];
	//$total=$_POST['total'];
	$mode=$_POST['mode'];
	$chk_sql="select * from customer_booking";
		//echo $chk_sql;
	$chk_rec=mysql_query($chk_sql);
		//$chk_res=mysql_fetch_assoc($chk_rec);
	$chk_num=mysql_num_rows($chk_rec);
		//echo $chk_num;
	$new_chk="select * from customer_booking where booking_cust_id='$chk_num'";
		//echo $new_chk;exit;
	$new_rec=mysql_query($new_chk);
	$new_res=mysql_fetch_assoc($new_rec);
	$cid=$new_res['chk_in_id'];
	$sql="insert into room_allotment(chk_in_id,room_no,chk_in_date,room_tariff,extra_bed,advance,exp_chk_out_date,pax,pay_mode) values('$cid','$rno','$date','$rtariff','$exbed','$advance','$chkotdate','$pax','$mode')";
	//echo $sql;exit;
	$rec=mysql_query($sql);
	$nsql="update room_master set room_status='Booked' where room_number='$rno'";
	$nrec=mysql_query($nsql);
	if($rec)
	{
		echo "<script>
				alert('Data Inserted')
				location.replace('room_allotment.php?recent=3');
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
                          <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="22">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="22">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="18%">&nbsp;Room No </td>
                                <td width="16%"><select name="rno" id="rno">
								<option value="0">... Select ...</option>
								<?php
									$rsql="select * from room_master where room_status='Available'";
									$rrec=mysql_query($rsql);
									while($rres=mysql_fetch_assoc($rrec))
									{
								?>
                                  <option value="<?php echo $rres['room_number'];?>"><?php echo $rres['room_number']."   - ( ".$rres['room_desc'].")";?></option>
								  <?php
								  	}
								  ?>
                                </select>
                                </td>
                                <td width="42%" align="center"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><input type="submit" name="Submit" value="Save and Register" style="background-color:transparent; cursor:pointer;" /></td>
                                    <td>&nbsp;</td>
                                  </tr>
                                </table></td>
                                <td width="24%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">New</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Date</td>
                                <td width="26%"><input name="date" type="txt" id="date" style=" width:185px" value="<?php echo date("d/m/Y")?>"  readonly /></td>
                                <td width="35%" align="center">&nbsp;Total Advance </td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'" onclick="change('history.php')">History</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Time</td>
                                <td width="24%"><input name="time" type="text" id="time" style=" width:100px" value="<?php echo date("h:i:s",time())." ".date('a');?>" readonly /></td>
                                <td width="37%" align="center" valign="top"><input name="total" type="text" id="total" style=" width:100px" disabled="disabled" /></td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Waiting</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Room Tariff </td>
                                <td width="25%"><input name="rtariff" type="text" id="rtariff" style=" width:80px" /></td>
                                <td width="36%">&nbsp;</td>
                                <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Close</td>
                                    </tr>
                                </table></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Extra Bed Charge </td>
                                <td width="17%"><input name="exbed" type="text" id="exbed" style=" width:80px" /></td>
                                <td width="44%" align="center" valign="baseline">&nbsp;Payment Mode </td>
                                <td width="22%" align="left">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Advance</td>
                                <td width="17%"><input name="advance" type="text" id="advance" style=" width:80px" /></td>
                                <td width="41%" align="center"><select name="mode" id="mode" style="width:100px;">
                                    <option value="cash">Cash</option>
									 <option value="cash">Cheque</option>
									  <option value="cash">Debit Card</option>
									   <option value="cash">Credit Card</option>
									    <option value="cash">By Bank</option>
                                    </select></td>
                                <td width="25%">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;</td>
                                <td width="17%">&nbsp;</td>
                                <td width="41%" align="left"><input name="destination" type="text" id="destination" placholder="Type : Non A/C Deluxe" disabled /></td>
                                <td width="25%">&nbsp;</td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="17%">&nbsp;Pax</td>
                                <td width="17%"><input name="pax" type="text" id="pax" style=" width:80px" /></td>
                                <td width="41%" align="left"><input name="destination2" type="text" id="destination2" placholder="Cleaned" disabled /></td>
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
    </table></td>
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
