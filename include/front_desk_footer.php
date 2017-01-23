<?php
include "connection/connection.php";
$sql="select * from room_master where room_status='Booked'";
$rec=mysql_query($sql);
$num=mysql_num_rows($rec);
$asql="select * from room_master where room_status='Available'";
$arec=mysql_query($asql);
$anum=mysql_num_rows($arec);
$tsql="select * from room_master";
$trec=mysql_query($tsql);
$tnum=mysql_num_rows($trec);
$bsql="select * from room_master where room_status='Blocked'";
$brec=mysql_query($bsql);
$bnum=mysql_num_rows($brec);
$usql="select * from room_master where room_status='Maintenance'";
$urec=mysql_query($usql);
$unum=mysql_num_rows($urec);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {color: #ff935b}
.style2 {color: #FFCC00}
-->
</style>
</head>
<link rel="stylesheet" type="text/css" href="../style/style.css">

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="front_desk_second_row"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="front_desk_second_row_font">
      <tr>
        <td width="19%" height="15" align="center">&nbsp;</td>
        <td width="8%" height="15">&nbsp;</td>
        <td width="8%" height="15" class="front_desk_footer_occu front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td width="4%" height="15" align="center">&nbsp;</td>
        <td width="8%" height="15" class="front_desk_footer_avlbl front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td width="6%" height="15" align="center">&nbsp;</td>
        <td width="5%" height="15" class="front_desk_footer_total front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td width="6%" height="15" align="center">&nbsp;</td>
        <td width="7%" height="15" class="front_desk_footer_blocked front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td width="7%" height="15" align="center">&nbsp;</td>
        <td width="18%" height="15" class="front_desk_footer_uncleaned style2 front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td width="4%" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="15" align="center"><span class="front_desk_second_row_font front_desk_second_row_font">
          <select name="room_type" id="room_type">
            <option value="0">... select ...</option>
            <option value="Non Ac Single Room">Non Ac Single Room</option>
            <option value="Non Ac Double Room">Non Ac Double Room</option>
            <option value="Non Ac Triple Room">Non Ac Triple Room</option>
            <option value="A/C Double Room">A/C Double Room</option>
            <option value="A/C Four Room">A/C Four Room</option>
            <option value="A/C Triple Bed Room">A/C Triple Bed Room</option>
            <option value="A/C Suit Room">A/C Suit Room</option>
                              </select>
        </span></td>
        <td height="15"><input name="Submit" type="submit" class="front_desk_second_row_font" value="Submit" /></td>
        <td height="15" class="front_desk_footer_occu front_desk_second_row_font front_desk_second_row_font"><span class="style1">Occupied</span> : </td>
        <td height="15" align="center"><span class="front_desk_second_row_font front_desk_second_row_font check_in_header front_desk_second_row_font"><strong><?php echo $num;?></strong></span></td>
        <td height="15" class="front_desk_footer_avlbl front_desk_second_row_font front_desk_second_row_font">Available : </td>
        <td height="15" align="center"><strong><?php echo $anum;?></strong></td>
        <td height="15" class="front_desk_footer_total front_desk_second_row_font front_desk_second_row_font">Total : </td>
        <td height="15" align="center"><strong><?php echo $tnum;?></strong></td>
        <td height="15" class="front_desk_footer_blocked front_desk_second_row_font front_desk_second_row_font">Blocked : </td>
        <td height="15" align="center"><strong><?php echo $bnum;?></strong></td>
        <td height="15" class="front_desk_footer_uncleaned style2 front_desk_second_row_font front_desk_second_row_font">Uncleaned &amp; available : </td>
        <td align="center"><strong><?php echo $unum;?></strong></td>
      </tr>
      <tr>
        <td height="15" align="center">&nbsp;</td>
        <td height="15">&nbsp;</td>
        <td height="15" class="front_desk_footer_occu front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td height="15" align="center">&nbsp;</td>
        <td height="15" class="front_desk_footer_avlbl front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td height="15" align="center">&nbsp;</td>
        <td height="15" class="front_desk_footer_total front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td height="15" align="center">&nbsp;</td>
        <td height="15" class="front_desk_footer_blocked front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td height="15" align="center">&nbsp;</td>
        <td height="15" class="front_desk_footer_uncleaned style2 front_desk_second_row_font front_desk_second_row_font">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
