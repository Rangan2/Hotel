<?php
include "connection/connection.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<script type="text/javascript" language="javascript" src="js/all.js">
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
            <td>
            </td>
          </tr>
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style=" border:1px solid #C5C5C5;border-radius:5px;">
                <tr>
                  <td align="center"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="check_in_header_row">
                      <tr>
                        <td height="22">&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="22"><table width="100%" border="0">
                          <tr>
                            <td width="18%">&nbsp;</td>
                            <td width="16%" align="center">Pax Name / Date </td>
                            <td width="1%" align="left">:</td>
                            <td width="65%" align="left"><input name="pax" type="text" id="pax" placeholder="Name Or DD/MM/YY" onkeyup="find_name()" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td height="22" align="center"></td>
                      </tr>
                      <tr>
                        <td height="22"><div id="areaHint" style="visibility:visible; vertical-align:middle; text-align:center">&nbsp;</div></td>
                      </tr>
                      <tr>
                        <td height="22">&nbsp;</td>
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
