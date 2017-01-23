<?php
include "connection/connection.php";
@$id=$_GET['id'];
$str=" ";
if(isset($_POST['Submit']))
{
			  @$sql="select * from room_allotment where chk_in_id='$_GET[id]' UNION ALL select * from new_room_allotment where chk_in_id='$_GET[id]' ";
				//  echo $sql;
				  $rec=mysql_query($sql);
				  $num=mysql_num_rows($rec);
				//  echo $num;
				/*  $i=1;
				while($res=mysql_fetch_assoc($rec))
				{
					if($str== " ")
					{
						$str=$res['room_no'];
					}else{
						$str=$str."&".$res['room_no'];
					}
					//$i++;
				}
				echo "<script>
						location.replace('bill.php?rooms=$str');
					   </script>";
	echo $str;*/
	for($i=1;$i<=$num;$i++)
	{
		$room=$_POST['chk'.$i];
		if($room!=" ")
		{
			if($str== " ")
			{
				$str=$room;
			}else{
				$str=$str.",".$room;
			}
		}
	}
	
	echo "<script>
			alert('Bill Generated')
			location.replace('bill.php?room=$str');
		  </script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
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
    <td bgcolor="#696969"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" style="border:3px solid #8888FF; border-radius:5px;">
      <tr>
        <td><?php include "include/check_in_header.php";?></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
              <tr>
                <td height="25"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
			 
                <td height="25" align="center"><form id="form1" name="form1" method="post" action="">
                  <table width="90%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000000; border-radius:5px;">
                    <tr>
                      <td align="center" bgcolor="#A4A4FF">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" bgcolor="#A4A4FF"><table width="60%" border="0">
                        <tr>
                          <td align="center"><table width="18%" border="0">
                              <tr>
                                <?php
			  @$sql="select * from room_allotment where chk_in_id='$_GET[id]' UNION ALL select * from new_room_allotment where chk_in_id='$_GET[id]' ";
			 // echo $sql;
//echo $sql;
				$rec=mysql_query($sql);
				$i=1;
			  	while($res=mysql_fetch_assoc($rec))
				{
			  ?>
                                <td align="center"><table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#A8A8FF" style="border:1px solid #CCCCCC; border-radius:5px;">
                                    <tr>
                                      <td width="46%" align="right"><input name="chk<?php echo $i;?>" type="checkbox" id="chk<?php echo $i;?>" value="<?php echo $res['room_no'];?>" checked="checked" /></td>
                                      <td width="6%">&nbsp;</td>
                                      <td width="48%"><?php echo $res['room_no'];?></td>
                                    </tr>
                                </table></td>
                                <?php
					$i++;
					if($i%3==0)
					{
						echo "</tr><td></td><tr>";
					}
				}
				?>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="center"><input type="submit" name="Submit" value="Check Out" style="background-color:transparent; cursor:pointer" /></td>
                        </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td align="center" bgcolor="#A4A4FF">&nbsp;</td>
                    </tr>
                  </table>
                </form>                
				</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
              </tr>
              <tr>
                <td height="25">&nbsp;</td>
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
