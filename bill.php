<?php
include "connection/connection.php";
$brr=array();
if(isset($_GET['room']))
{
	$arr=explode(",",$_GET['room']);
	//print_r($arr);
	for($i=0;$i<count($arr);$i++)
	{
		array_push($brr,$arr[$i]);
	}
}
//print_r($brr);
$sql="select * from room_allotment where room_no='$brr[0]'";
$rec=mysql_query($sql);
$res=mysql_fetch_assoc($rec);
$msql="select * from customer_booking where chk_in_id='$res[chk_in_id]'";
$mrec=mysql_query($msql);
$mres=mysql_fetch_assoc($mrec);
$psql="select * from customer_address where chk_in_id='$res[chk_in_id]'";
$prec=mysql_query($psql);
$pres=mysql_fetch_assoc($prec);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Billing Details</title>
<style>
.e
	 {	padding-top: 10px;
		text-align: center
	}
	</style>

		<script>
				function printDiv(divID) {
					//Get the HTML of div
					var divElements = document.getElementById(divID).innerHTML;
					//Get the HTML of whole page
					var oldPage = document.body.innerHTML;

					//Reset the page's HTML with div's HTML only
					document.body.innerHTML = 
					"<html><head><title></title></head><body>" + 
					divElements + "</body>";

					//Print Page
					window.print();	

					//Restore orignal HTML
					document.body.innerHTML = oldPage;
				}
		</script>
</head>

<body>


<table width="99%" align="center" cellpadding="4" cellspacing="5">
  <tr>
    <td height="107" align="center"><table width="89%" border="0" align="center" cellpadding="4" cellspacing="5">
      <tr>
        <td align="center"><h2><strong>HOTEL DEBJYOTI</strong></h2></td>
      </tr>
      <tr>
        <td height="46" align="center">Patel Road , Behind Axis Bank , Hill Cart Road ,Pradhan Nagar , Siliguri - 734003, Darjeeling <strong><BR>Phone : </strong>0353-2511201 , 9641004930 &nbsp;&nbsp;&nbsp; <strong>Email :</strong> hoteldebjyoti@gmail.com &nbsp;&nbsp;&nbsp;<strong>Website :</strong> www.hoteldebjyoti.com</td>
      </tr>

    </table>
      ------------------------------------------------------------------------------------------------------------------------</td>
  </tr>
  <tr>
    <td><table width="90%" border="0" align="center" cellpadding="4" cellspacing="5">
      <tr>
        <td>Room No.: <?php echo $res['room_no']?><br>
          Bill No.:<?php echo $res['chk_in_id']?><br>
          Guest Name : <?php echo $mres['cust_name1']?><br>
          Company Name : <?php echo $pres['company_name']?></td>
        <td align="right">Date Of Arrival : <br>
          Date Of Departure : </td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="90%" border="0" cellspacing="5" cellpadding="4">
      <tr align="center">
        <td width="12%">Date</td>
        <td width="13%">Bill No </td>
        <td width="33%">Particulars</td>
        <td width="13%">Debit</td>
        <td width="13%">Creadit</td>
        <td width="16%">Balance</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6" align="right">-----------------------------------------------------------------------------------------------------------------</td>
        </tr>
      <tr>
        <td colspan="4" align="right">Net Amount</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>