<?php
	include "connection/connection.php";
	if(isset($_POST['Submit']))
	{
		//$cid=$_POST['cid'];
		//echo $cid;exit;
		$cname=$_POST['cname'];
		$cadd=$_POST['cadd'];
		$cty=$_POST['cty'];
		$nationalty=$_POST['nationalty'];
		$pov=$_POST['pov'];
		$phno=$_POST['phno'];
		$aname=$_POST['aname'];
		$remark=$_POST['remark'];
		$disc=$_POST['disc'];
		$age=$_POST['age'];
		$pax=$_POST['pax'];
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
		$asql="insert into customer_address(chk_in_id,company_name,company_address,city,nationality,purpose_visit,contact_no,agent_name,remark,discount,age,pax) values('$cid','$cname','$cadd','$cty','$nationalty','$pov','$phno','$aname','$remark','$disc','$age','$pax')";
		//echo $asql;exit;
		$arec=mysql_query($asql);
		if($arec)
		{
			echo "<script>
					alert('Data Inserted');
					location.replace('room_allotment.php?recent=3');
				 </script>";
		}else{
			echo "<script>
					alert('Data Not Inserted');
					location.replace('address.php?recent=2');
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
<link rel="stylesheet" type="text/css" href="style/style.css">

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" style=" border:1px solid #CCCCCC;border-radius:5px;">
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
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
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
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php
				  	$csql="select * from company_details";
					$crec=mysql_query($csql);
				  ?>
                            <tr>
                              <td width="16%">&nbsp;Company Name </td>
                              <td width="53%"><input name="cname" type="text" id="cname" style=" width:300px" /></td>
                              <td width="31%" align="left">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%" valign="top">&nbsp;Guest  Address </td>
                              <td width="53%"><textarea name="cadd" rows="4" id="cadd" style=" width:300px"></textarea></td>
                              <td width="31%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">New</td>
                                </tr>
                              </table><br />
                                <table width="70%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">History</td>
                                  </tr>
                              </table><br />
                                <table width="70%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Waiting</td>
                                  </tr>
                                </table><br />
                                <table width="70%" border="0" cellspacing="0" cellpadding="0">
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
                              <td width="16%">&nbsp;</td>
                              <td width="53%">&nbsp;</td>
                              <td width="31%" align="left">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;</td>
                              <td width="53%">&nbsp;</td>
                              <td width="31%" align="left">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <?php
				  	$csql="select * from city_details";
					$crec=mysql_query($csql);
				  ?>
                            <tr>
                              <td width="16%">&nbsp;City</td>
                              <td width="53%"><select name="cty" id="cty" style="width:200px">
                                  <option value="0">... select ...</option>
                                  <?php
					  	while($cres=mysql_fetch_assoc($crec))
						{
					  ?>
                                  <option value="<?php echo $cres['city_id']?>"><?php echo $cres['city_name'];?></option>
                                  <?php
					  	}
					  ?>
                              </select></td>
                              <td width="31%" align="left">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;Nationality</td>
                              <td width="26%"><select name="nationalty" id="nationalty" style="width:200px">
                                  <option value="0">... select ...</option>
                                  <option value="Indian">Indian</option>
                                  <option value="Nepalese">Nepalese</option>
                                  <option value="Bhutanese">Bhutanese</option>
                                  <option value="Bangladeshi">Bangladeshi</option>
                              </select></td>
                              <td width="11%" align="center">Disc%</td>
                              <td width="47%" align="left"><input name="disc" type="text" id="disc" style="width:80px" v="v" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;Purpose of Visit </td>
                              <td width="26%"><select name="pov" id="pov" style="width:200px">
                                  <option value="0">... select ...</option>
                                  <option value="official">official</option>
                                  <option value="personal">personal</option>
                              </select></td>
                              <td width="11%" align="center">Age</td>
                              <td width="47%" align="left"><input name="age" type="text" id="age" style="width:80px" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;Telephone No </td>
                              <td width="26%"><input name="phno" type="text" id="phno" style="width:200px" /></td>
                              <td width="11%" align="center">Pax</td>
                              <td width="47%" align="left"><input name="pax" type="text" id="pax" style="width:80px" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;Agent Name </td>
                              <td width="50%"><select name="aname" id="aname" style="width:200px">
                                  <option value="0">... select ...</option>
                                  <option value="Rangan Roy">Rangan Roy</option>
                                  <option value="Indranil Sur">Indranil Sur</option>
                                  <option value="Souvik Basu">Souvik Basu</option>
                              </select></td>
                              <td width="34%">&nbsp;</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="16%">&nbsp;Remarks</td>
                              <td width="50%"><input name="remark" type="text" id="remark" style="width:200px" /></td>
                              <td width="34%"><input type="submit" name="Submit" value="Submit" style="background-color:transparent;" /></td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22">&nbsp;</td>
                      </tr>
                  </table></td>
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
</form>
</body>
</html>
