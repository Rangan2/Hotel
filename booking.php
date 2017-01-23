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
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #888FFF; border-radius:5px;">
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
            <td><?php //include "include/check_in_header.php";?></td>
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
								 if(!isset($_GET['date']))
								 {
								 ?>
								  <tr>
                                    <td width="24%" align="center"> From</td>
                                    <td width="45%" align="center">&nbsp;</td>
                                    <td width="22%" align="center">To</td>
                                    <td width="9%" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center"><input name="from" type="date" id="from" /></td>
                                    <td align="center">&nbsp;</td>
                                    <td align="center"><input name="to" type="date" id="to" /></td>
                                    <td align="center"><input name="Submit" type="submit" id="Submit" style="background-color:transparent;" value="Submit" /></td>
                                  </tr>
								  <?php
								  }
								  ?>
                                  <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="center"><table width="90%" border="0" cellspacing="1" cellpadding="1">
									<?php
										if(isset($_POST['Submit']))
										{	
											$from=$_POST['from'];
											@list($n,$e,$p)=explode("-",$from);
											$new_arr=$p."/".$e."/".$n;
											 //print_r($new_arr);
											$to=$_POST['to'];
											@list($a,$b,$c)=explode("-",$to);
											$new_arr_to=$c."/".$b."/".$a;
											//echo $to;
											
												$newsql="select * from customer_booking where date >= '$new_arr' and date <='$new_arr_to'";
											}else if(isset($_GET['date'])){
												@$newsql="select * from customer_booking where date='$_GET[date]'";
											}
											//echo $newsql;
											@$newrec=mysql_query($newsql);
											@$newres=mysql_fetch_assoc($newrec);
											//echo $newres['cust_name1'];
											$sql="select * from room_allotment where chk_in_id='$newres[chk_in_id]'";
											//echo $sql;
											$rec=mysql_query($sql);
											if(mysql_num_rows($rec) > 0)
											{
									?>
                                        <tr class="advance_first_row">
                                          <td width="18%" align="center">Name</td>
                                          <td width="15%" align="center">Chk-In Date </td>
                                          <td width="17%" align="center">Time</td>
                                          <td width="14%" align="center">Room No </td>
                                          <td width="14%" align="center">Chk-Out Date </td>
                                        </tr>
                                        <?php
												while($res=mysql_fetch_assoc($rec))
												{
										  ?>
                                        <tr class="advance">
                                          <td align="center"><?php echo $newres['cust_name1']; ?></td>
                                          <td align="center"><?php echo $newres['date']; ?></td>
                                          <td align="center"><?php echo $newres['time']; ?></td>
                                          <td align="center"><?php echo $res['room_no']; ?></td>
                                          <td align="center">&nbsp;</td>
                                        </tr>
                                        <?php
						  						}
									 } else{
									 	echo "No Records Found";
									 }
									 
									 ?>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
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
                        <td>&nbsp;</td>
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
