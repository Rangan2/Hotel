<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style34 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; }
.style35 {font-size: 10px}
-->
</style>
<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<script type="text/javascript" language="javascript">
	function change(str)
		{
				location.replace(str);
		}
		
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="first_row">
      <tr>
        <td width="6%">Exceed - </td>
        <td width="89%" height="30">HOTEL Devjoyti </td>
        <td width="3%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC" style="cursor:pointer">
      <tr>
        <td width="6%" align="center"  onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">File</span></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Maintain</span></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Entries</span></td>
        <td width="8%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Front Office </span></td>
        <td width="8%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">F&amp;B &amp; Sales </span></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Stores</span></td>
        <td width="7%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Accounts</span></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Settings</span></td>
        <td width="5%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Tools</span></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Window</span></td>
        <td width="21%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#C5C5C5'"><span class="style34">Help</span></td>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
        <td width="5%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr class="second_row">
    <td><table width="100%" border="0" cellpadding="1" cellspacing="1" class="second_row_table">
      <tr align="center">
        <td width="7%" align="center" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" title="Arrival"><img src="image/fdesk.png" width="47" height="45" /></td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" onclick="change('index.php')" title="Front Desk"><img src="image/fdesk.png" /> </td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" onclick="change('guest.php?recent=1')" title="Check In"><img src="image/check_in.png" /> </td>
        <td width="7%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" onclick="change('checkout.php')" title="Check Out"><img src="image/check_out.png" /> </td>
        <td width="7%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" title="Billing"><img src="image/bill.png" /> </td>
        <td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" onclick="change('history.php')" title="Guest Information"><img src="image/ginfo.png" /> </td>
		<td width="6%" onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" title="History"><img src="image/History.png" /> </td>
        <td width="7%"onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" title="Reports"><img src="image/reports.png" /> </td>
        <td width="7%"onmouseover="this.bgColor='#D5D5D5'" onmouseout="this.bgColor='#A4A4A4'" onclick="change('booking.php')" title="Booking"><img src="image/booking.png" /> </td>
       <?php
	   	$date=date("Y-m-d");
		list($e,$f,$g)=explode("-",$date);
		$new_date=$g."/".$f."/".$e;
	   ?>
	    <td width="8%"><a href="booking.php?date=<?php echo $new_date;?>">Today's Booking </a></td>
        <td width="8%"><a href="add.php?date=<?php echo $new_date;?>">ADD</a></td>
        <td width="25%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
