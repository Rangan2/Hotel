<?php
include "connection/connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-size: 12}
.style2 {color: #999999}
.style3 {color: #666666}
-->
</style>
<script src="../js/all.js">
</script>
</head>
<link rel="stylesheet" type="text/css" href="../style/style.css">
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="60%" border="0">
        <tr>
          <td width="9%"><span class="check_in_header style1 style2"><span class="front_desk_second_row_font style3">Date</span></span></td>
          <td width="30%"><input name="date" type="date"  onchange="show_res('this.value')" /></td>
          <td width="9%">&nbsp;</td>
          <td width="52%">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div id="myres"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
