<?php
include "connection/connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
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
    <td align="center" bgcolor="#696969"><table width="70%" border="0" cellspacing="0" cellpadding="0" style="border:3px solid #888FFF; border-radius:5px;">
      <tr>
        <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td><?php include "include/check_in_header.php";?></td>
          </tr>
          <tr>
            <td align="center"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="75%" align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" >
                                  <?php	
										@$sql="select * from room_allotment where room_no=$_GET[room]";
										@$rec=mysql_query($sql);
										@$res=mysql_fetch_assoc($rec);
									?>
                                  <tr>
                                    <td width="83%" align="center"><table width="90%" border="0" cellspacing="1" cellpadding="1">
                                        <tr class="advance_first_row">
                                          <td width="18%" align="center">Date</td>
                                          <td width="15%" align="center">Time</td>
                                          <td width="17%" align="center">Room No </td>
                                          <td width="14%" align="center">Rate</td>
                                          <td width="13%" align="center">Advance</td>
                                          <td width="13%">Extra Bed </td>
                                          <td width="10%" align="center">Pax</td>
                                        </tr>
                                        <?php
										   
										   	$new_sql="select * from customer_booking where chk_in_id='$res[chk_in_id]'";
											$new_rec=mysql_query($new_sql);
											$new_res=mysql_fetch_assoc($new_rec);
										  ?>
                                        <tr class="advance">
                                          <td align="center"><?php echo $new_res['date'];?></td>
                                          <td align="center"><?php echo $new_res['time'];?></td>
                                          <td align="center"><?php echo $res['room_no'];?></td>
                                          <td align="center"><?php echo $res['room_tariff'];?></td>
                                          <td align="center"><?php echo $res['total_advance'];?></td>
                                          <td align="center"><?php echo $res['extra_bed'];?></td>
                                          <td align="center"><?php echo $res['pax'];?></td>
                                        </tr>
                                       
                                    </table></td>
                                  </tr>
                              </table></td>
                              <td width="25%"><table width="80%" border="0" cellspacing="0" cellpadding="0" style="cursor:pointer;">
                                  <tr>
                                    <td height="22" align="center"  ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">New</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center" ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Modify</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center" ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Cancel</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center" ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Delete</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center" ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">History</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center" ><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Waiting</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="center"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                        <tr bgcolor="#E5C8E5">
                                          <td align="center" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Close</td>
                                        </tr>
                                    </table></td>
                                  </tr>
                              </table></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="25%" align="center"><input type="submit" name="Submit" value="Edit/Print"  onclick="window.print()" style="background-color:transparent;" /></td>
                              <td width="31%" align="right">Total Advance </td>
                              <td width="2%">&nbsp;</td>
                              <td width="42%"><input type="text" name="textfield" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
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
