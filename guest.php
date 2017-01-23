<?php
	include "connection/connection.php";
	include "include/function.php";
	if(isset($_POST['Submit']))
	{
		if($_POST['Submit']=="Go")
		{
			$chk_in_type=$_POST['chk_in_type'];
			$gname1=$_POST['gname1'];
			$gname2=$_POST['gname2'];
			$gname3=$_POST['gname3'];
			$gname4=$_POST['gname4'];
			$gen=$_POST['gen'];
			$from=$_POST['from'];
			$destination=$_POST['destination'];
			$gcategory=$_POST['gcategory'];
			$cid=$_POST['cid'];
			$date=$_POST['date'];
			//list($n,$p,$q)=explode("-",$date);
			//$ndate=$date['8'].$date['9']."-".$date['5'].$date['6']."-".$date['0'].$date['1'].$date['2'].$date['3'];
			$time=$_POST['time'];
			$lroom=$_POST['lroom'];
			$lid=$_POST['lid'];
			$sql="insert into customer_booking(booking_id,cust_name1,cust_name2,cust_name3,cust_name4,gender,chk_in_id,date,time,look_in_room,look_in_id,chk_in_type,arriving_from,drstination,guest_category) values(1,'$gname1','$gname2','$gname3','$gname4','$gen','$cid','$date','$time','$lroom','$lid','$chk_in_type','$from','$destination','$gcategory')";
			//$pk=mysql_insert_id();
			//$chk_id=$chk_res['chk_in_id'];
			//id($chk_id);
			//echo $sql;exit;
			$rec=mysql_query($sql);
			$pk=mysql_insert_id();
			$file1=$_FILES['file1']['name'];
			@$file2=$_FILES['file2']['name'];
			@$file3=$_FILES['file3']['name'];
			@$file4=$_FILES['file4']['name'];
			list($n,$e)=explode(".",$file1);
			@list($k,$p)=explode(".",$file2);
			@list($q,$r)=explode(".",$file3);
			@list($s,$t)=explode(".",$file4);
			$new_file1=$pk."1".".".$e;
			@$new_file2=$pk."2".".".$p;
			@$new_file3=$pk."3".".".$r;
			@$new_file4=$pk."4".".".$t;
			if(move_uploaded_file($_FILES['file1']['tmp_name'],"upload/".$new_file1))
			{
				$upsql="update customer_booking set	image1='$new_file1' where booking_cust_id='$pk' ";
				//echo $upsql;exit;
				$uprec=mysql_query($upsql);
			}
			if(@move_uploaded_file($_FILES['file2']['tmp_name'],"upload/".$new_file2))
			{
				$upsql="update customer_booking set image2='$new_file2' where booking_cust_id='$pk' ";
				//echo $upsql;exit;
				$uprec=mysql_query($upsql);
			}
			if(@move_uploaded_file($_FILES['file3']['tmp_name'],"upload/".$new_file3))
			{
				$upsql="update customer_booking set	image3='$new_file3' where booking_cust_id='$pk' ";
				//echo $upsql;exit;
				$uprec=mysql_query($upsql);
			}
			if(@move_uploaded_file($_FILES['file4']['tmp_name'],"upload/".$new_file4))
			{
				$upsql="update customer_booking set	image4='$new_file4' where booking_cust_id='$pk' ";
				//echo $upsql;exit;
				$uprec=mysql_query($upsql);
			}
			if($uprec)
			{
				echo "<script>
						alert('File Uploaded');
						alert('Data Inserted');
						location.replace('address.php?recent=2');
					 </script>";
			}else{
				echo "<script>
						alert('File Not Uploaded');
						alert('Data Not Inserted');
						location.replace('guest.php?recent=1');
					  </script>";
			}
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
    <td bgcolor="#696969"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #8888FF; border-radius:5px;">
      <tr>
        <td><?php include "include/check_in_header.php";?></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">&nbsp;Check-In-Type</td>
                      <td width="85%"><select name="chk_in_type" id="chk_in_type">
                        <option value="0">... select ...</option>
                        <option value="1">Walk In</option>
                      </select>                      </td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25">&nbsp;</td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%">&nbsp;Guest Name 1 </td>
                      <td width="39%"><input name="gname1" type="text" id="gname1" style=" width:300px" required /></td>
                      <td width="28%"><input name="file1" type="file" id="file1" /></td>
                      <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0" style="cursor:pointer;">
                        <tr>
                          <td align="center" bgcolor="#E5C8E5" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">New</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%">&nbsp;Guest Name 2 </td>
                      <td width="39%"><input name="gname2" type="text" id="gname2" style=" width:300px" /></td>
                      <td width="28%"><input name="file2" type="file" id="file2" /></td>
                      <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" bgcolor="#E5C8E5" style="cursor:pointer;" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">History</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%">&nbsp;Guest Name 3 </td>
                      <td width="39%"><input name="gname3" type="text" id="gname3" style=" width:300px" /></td>
                      <td width="28%"><input name="file3" type="file" id="file3" /></td>
                      <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" bgcolor="#E5C8E5" style="cursor:pointer;" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Waiting</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%">&nbsp;Guest Name 4 </td>
                      <td width="39%"><input name="gname4" type="text" id="gname4" style=" width:300px" /></td>
                      <td width="28%"><input name="file4" type="file" id="file4" /></td>
                      <td width="22%" align="left"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" bgcolor="#E5C8E5" style="cursor:pointer;" onmouseover="this.bgColor='#D9B2D9'" onmouseout="this.bgColor='#E5C8E5'">Close</td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%" height="22">&nbsp;Gender</td>
                      <td width="40%" height="22"><select name="gen" id="gen" style="width:100px">
                        <option value="0">... select ...</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                                            </select></td>
                      <td width="49%" height="22">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
				<tr>
                  <td height="25">&nbsp;</td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="11%">&nbsp;Arriving From </td>
                      <td width="39%"><input name="from" type="text" id="from" /></td>
                      <td width="26%" align="right">Destination</td>
                      <td width="24%" align="center"><input name="destination" type="text" id="destination" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="15%">&nbsp;Guest Category </td>
                      <td width="14%"><select name="gcategory" id="gcategory" style="width:100px">
                        <option value="0">... select ...</option>
                        <option value="1">VIP</option>
                      </select>                      </td>
                      <td width="71%"><input type="submit" name="Submit" value="Go" style="background-color:transparent;" /></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>            </td>
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
