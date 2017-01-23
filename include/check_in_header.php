<?php
include "function.php";
if(isset($_POST['Submit']))
{
		if($_POST['Submit']== "Look")
		{
			echo "<script>
					location.replace('advance.php');
				  </script>";
			$lroom=$_POST['lroom'];
			$sql="select * from room_allotment where room_no='$lroom'";
			$rec=mysql_query($sql);
			$res=mysql_query($rec);
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style/dhtmlwindow1.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
}
</style>
<script>
	function go_to_ad()
	{
		var x=document.getElementById("lroom").value;
		var url="advance.php?room="+x+"&recent="+4;
		location.replace(url);
	}
	function go_to_anad()
	{
		var x=document.getElementById("lid").value;
		var url="checkout.php?id="+x;
		location.replace(url);
	}
</script>
<script type="text/javascript" language="javascript" src="../js/all.js">
</script>
</head>
<script language="javascript" src="../js/dhtmlwindow1.js">
</script>
<script >
	var date , hour , min , sec , timer,day,year,dt;
        function clock() {
            date = new Date();
            hour = date.getHours();
            min = date.getMinutes();
            sec = date.getSeconds();
            timer = hour + ':' + min + ':' + sec;
            //document.getElementById("inner").innerHTML = time;
			document.getElementById("time").innerHTML = timer;
        }
        setInterval("clock()" , 1000);
</script>
<link rel="stylesheet" type="text/css" href="../style/style.css">

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td class="first_row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%" height="30">&nbsp;Check In </td>
            <td width="6%">&nbsp;</td>
            <td width="7%">&nbsp;</td>
            <td width="7%" align="center"><a href="index.php?">Close</a></td>
          </tr>
      </table></td>
    </tr>
    <tr class="check_in_second_row">
      <td width="80%">&nbsp;</td>
    </tr>
    <tr>
      <td class="check_in_second_row"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%" height="22">&nbsp;Check-In Id </td>
            <td width="17%" height="22" style=" cursor:pointer"><table width="100%" border="0">
                <tr>
                  <td width="54%"><input name="cid" type="text" id="cid" style="width:80px" value="<?php echo $id;?>" readonly="readonly" /></td>
                  <td width="46%" align="center" onclick="location.replace('dtls.php')"><strong><img src="image/search.png" height="17" width="20"/></strong></td>
                </tr>
            </table></td>
            <td width="8%" height="22" align="center">Date</td>
            <td width="20%" height="22"><input name="date" type="text" id="date" style="width:110px" value="<?php echo date("d/m/Y");?>" readonly /></td>
            <td width="12%" height="22" align="center">Look in Room </td>
            <td width="30%" height="22"><table width="90%" border="0">
                <tr>
                  <td width="56%"><input name="lroom" type="text" id="lroom" style="width:90px" onkeyup="go_to(this.value)" /></td>
                  <td width="44%" align="center" style="cursor:pointer" onclick="go_to_ad()"><table width="30%" border="0" align="left" bgcolor="#7777FF" style="border:1px solid #999999; border-radius:4px;">
                      <tr>
                        <td align="center"><span class="front_desk_footer_total"> <img src="image/search.png" height="17" width="20"/></span></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="22" colspan="6" align="right"><table width="70%" border="0" cellspacing="0" cellpadding="0">
                <?php
			date_default_timezone_set ("Asia/Calcutta");
				//$time=date_default_timezone_get();
			?>
                <tr>
                  <td width="11%" align="center">Time</td>
                  <td width="26%"><input name="time" type="text" id="time" style="width:70px" value="<?php echo date("h:i",time())." ".date('a');?>" readonly /></td>
                  <td width="20%" align="center">Look in Id </td>
                  <td width="43%"><table width="90%" border="0">
                      <tr>
                        <td width="56%"><input name="lid" type="text" id="lid" style="width:90px" /></td>
                        <td width="44%" style="cursor:pointer"><table width="30%" border="0" bgcolor="#7777FF" style="border:1px solid #999999; border-radius:4px;">
                            <tr>
                              <td align="center" onclick="go_to_anad()"><span class="style1"><img src="image/search.png" height="17" width="20"/></span></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
	     <?php
  	if(isset($_GET['recent']))
	{
		if($_GET['recent']=="1")
		{
			//echo $_GET['recent'];
			$bg1="bgcolor='#C4C4C4'";
		}else if($_GET['recent']=="2")
		{
			//echo $_GET['recent'];
			$bg2="bgcolor='#C4C4C4''";
		}else if($_GET['recent']=="3")
		{
			//echo $_GET['recent'];
			$bg3="bgcolor='#C4C4C4'";
		}
		else if($_GET['recent']=="4")
		{
			//echo $_GET['recent'];
			$bg4="bgcolor='#C4C4C4'";
		}else if($_GET['recent']=="5")
		{
			//echo $_GET['recent'];
			$bg5="bgcolor='#C4C4C4'";
		}else if($_GET['recent']=="6")
		{
			//echo $_GET['recent'];
			$bg6="bgcolor='#C4C4C4'";
		}
	}
  ?>
    <tr>
      <td class="check_in_header_row"><table width="70%" border="0" cellpadding="1" cellspacing="1" bgcolor="#8D8D8D" class="check_in_header style1"  style="bgcolor='C5C5C5'; cursor:pointer">
          <tr >
            <td onclick="change('guest.php?recent=1')" <?php echo @$bg1;?> >&nbsp;Guest</td>
            <td onclick="change('address.php?recent=2')"  <?php echo @$bg2;?>>Address</td>
            <td onclick="change('room_allotment.php?recent=3')" <?php echo @$bg3;?> >Room Allotment </td>
            <td onclick="change('advance.php?recent=4')" <?php echo @$bg4;?>>Advances</td>
            <td onclick="change('new_room.php?recent=5')" <?php echo @$bg5;?> >New Room Booking </td>
            <td onclick="change('room_shift.php?recent=6')"<?php echo @$bg6;?> >Room Shift </td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
