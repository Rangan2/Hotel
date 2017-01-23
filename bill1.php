<?php
session_start();
unset($_SESSION['sel_room']);
include "connection/connection.php";
//include "includes/functions.php";
$intime = date("h:i:s A");
//echo $intime;
//$room_booked = booked_room(date('Y-m-d'));
//$room_maintain = maintain_room(date('Y-m-d'));
$grtot=0;
//print_r($room_maintain);
//session_start();
//include "config.php";
 if(isset($_GET['booking']))
	{
			
			$tsql = "select * from booking_master bm, booking_customer bc where bm.booking_id='$_GET[booking]' and bm.booking_id=bc.booking_id";
			$trec = mysql_query($tsql);
			$tres = mysql_fetch_assoc($trec);
			$cus_name = $tres['cust_name'];
			$comname = $tres['comname'];
			$book_id=$tres['booking_id'];
			$check_in=$tres['date_of_booking'];
			$check_in_time=$tres['login_time'];
			$check_out_time=$tres['out_time'];
			$check_out=$tres['chk_out_dt'];
			$room_id=$tres['room_id'];
			$days = $tres['booking_duration'];
			$today = date('Y-m-d');
			//echo $tsql;exit;
	}
	
for($d = 1; $d <= $days; $d++)
   {
	 $date = $_GET['pk'.$d];
	 $rate = $_GET['rate'];
	 $dam = $_GET['dam1'.$date];
	 $pax = $_GET['pax1'.$date];
	 $cod = $_GET['cod1'.$date];
	 $sub_tot = $dam+$pax+$cod+$rate;
	 if($date !='')
	 {
	 $nsql = "insert into checkout_master(booking_id,occupied_date,room_id,room_rent,damage,pax,cod,total) values('$book_id','$date','$room_id','$rate','$dam','$pax','$cod','$sub_tot')";
	 $nrec = mysql_query($nsql);
	 echo $nsql;
	 }
   } 
   mysql_query("INSERT INTO billing_master (booking_id) values ('$book_id')");
   $last = mysql_insert_id();
	//echo $last;exit;
		
		$nsql1 = "select * from billing_master where bill_id='$last'";
		//echo $nsql;exit;
		$nrec1 = mysql_query($nsql1);
		$nres1 = mysql_fetch_assoc($nrec1);
		$bill_num = $nres1['bill_id'] + 1000 ;
		
		$nsql = "update billing_master set bill_no='$bill_num' where bill_id='$last'";
		//echo $nsql;exit;
		$nrec = mysql_query($nsql);
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
<div id="1">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td>&nbsp;</td>
    <td align="center">
		<table width="100%" border="0">
			<tr>
			<td width="287"><img src="images/logo.png" height="73" width="76" style="margin-left:-25px;"/></td>
			<td width="771"><h1>HOTEL DEBJYOTI</h1></td>
			</tr>
			<tr>
			<td colspan="2" align="center">Patel Road , Behind Axis Bank , Hill Cart Road ,<br>
Pradhan Nagar , Siliguri - 734003, Darjeeling<br/>
<strong>Phone : </strong>0353-2511201 , 9641004930 <br>
<strong>Email :</strong> hoteldebjyoti@gmail.com<br>
<strong>Website :</strong> www.hoteldebjyoti.com</td>
			</tr>
	    </table>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>------------------------------------------------------------------------------------------------------------</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td height="20">&nbsp;</td>
    <td><strong>Bill NO.  :&nbsp;&nbsp;<?php echo $bill_num ;?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><strong>Name Of Guest :&nbsp;&nbsp;</strong><?php echo $cus_name; $jl=0; while($jl<=45){ echo "&nbsp;"; $jl++;} echo "Date Of Arrival : ".$check_in." Time : ".$check_in_time ;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td><strong>Company Name :&nbsp;&nbsp;</strong><?php echo $comname; $kl=0; while($kl<=55){ echo "&nbsp;"; $kl++;} echo" Date Of Departure : "; 
	if($check_out == '0000-00-00'){echo " Not Applicable" ;} else { echo $check_out." Time : ".$check_out_time ;}?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td  height="20">&nbsp;</td>
    <td><strong>Billing Particullars :-</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>------------------------------------------------------------------------------------------------------------</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr align="center" bgcolor="#CCCCCC">
        <td width="13%"><strong>Date</strong></td>
        <td width="14%"><strong>Room No.</strong></td>
        <td width="15%"><strong>Room Tarrief</strong></td>
        <td width="17%"><strong>P.A.X . </strong></td>
        <td width="14%"><strong>C.O.D.</strong></td>
        <td width="15%"><strong>Damage</strong></td>
        <td width="12%"><strong>Total Cost</strong></td>
      </tr>
	<tr align="center">
        <td colspan="7">------------------------------------------------------------------------------------------------------------</td>
      </tr>
       <?php
	  $fsql2 = "select * from booking_master bm, booking_customer bc, room_master rm, checkout_master cm where bm.booking_id=bc.booking_id and rm.room_id=cm.room_id and bm.booking_id=cm.booking_id and bm.booking_id='{$_GET['booking']}'" ;
	 // echo $fsql2;exit;
	  $frec2 = mysql_query($fsql2);
	  $i = 1;
	  while($fres2 = mysql_fetch_assoc($frec2))
	  {
		if($i % 2 == 0)
		$col = "bgcolor='#E5E5E5'";
		else
		$col = "bgcolor='#D5D5D5'";
	  ?>	
            <tr align="center" <?php // echo $col;?>>
              <td height="25" class="fnt_n"><?php echo $fres2['occupied_date'];?></td>
              <td class="fnt_n"><?php echo $fres2['room_number'];?></td>
              <td class="fnt_n"><?php echo $fres2['room_rent'];?></td>
              <td class="fnt_n"><?php echo $fres2['pax'];?></td>
			  <td class="fnt_n"><?php echo $fres2['cod'];?></td>
              <td class="fnt_n"><?php echo $fres2['damage'];?></td>
              <td class="fnt_n"><?php echo $fres2['total'];
			  			$grtot = $grtot + $fres2['total'];
						$adv=$fres2['advance'];
						
			  ?></td>
            </tr>
            <?php
	  	$i++;
	  }
	  ?> 
      
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>------------------------------------------------------------------------------------------------------------</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td height="25">Gross Amount : <?php  echo $grtot;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td height="25"> Advance :      <?php 
	
	$gsql = "select * from advance_master where booking_id ='$_GET[booking]'";
	$grec = mysql_query($gsql);
	while($gres = mysql_fetch_assoc($grec))
	{
	$tot_adv = $tot_adv + $gres['adv_amount'];
	}
	echo $adv + $tot_adv ;
	  ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td height="25"> Discount :      
	<?php 
	$gsql = "select * from discount_master where booking_id ='$_GET[booking]'";
	$grec = mysql_query($gsql);
	$nod = mysql_num_rows($grec);
	$gres = mysql_fetch_assoc($grec);
	if($nod>0)
	{
	$dis = $gres['dis_amount'];
	}
	else 
	$dis = 0;
	echo $dis ;
	  ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td height="25">Balance : <?php echo ($grtot- ($tot_adv + $adv) - $dis) ; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr align="left">
    <td>&nbsp;</td>
    <td height="25">Prepared By : 
	<?php
		echo $_SESSION['fname'];
	?>	</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="left">
    <td>&nbsp;</td>
    <td height="25"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>------------------------
      <?php $il=0; while($il<=84){ echo "&nbsp;"; $il++;}?>      
      ------------------------</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Guest's Signature
      <?php $il=0; while($il<=99){ echo "&nbsp;"; $il++;}?>      Manager's Signature</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td></td>
    <td align="center"><h4>
	<?php 
	 $bsql = "select * from booking_master where booking_status='1' and booking_id = $book_id";
	 $bsql1=mysql_query($bsql);
	 $row= mysql_num_rows($bsql1);
	 if($row>0)
	 { 
	  echo " Thank You Fort Staying With Us " ; 
	 }
	 else
	 {
	  echo " This is Proforma Bill and cannot be treated as Final Bill";
	 }
	 ?></h4></td>
    <td></td>
  </tr>
</table>
</div>
<p>&nbsp;</p>
<div class="e">
			<button onClick="printDiv(1)">Print this page</button>
			<?php $fsql2 = "select * from booking_master bm, booking_customer bc, room_master rm where bm.booking_id=bc.booking_id and rm.room_id=bm.room_id" ;
	  //echo $fsql2;exit;
	  $frec2 = mysql_query($fsql2);
	  $i = 1;
	  $fres2 = mysql_fetch_assoc($frec2) ;
	  ?>
		   <a href="discount.php?booking=<?php echo $fres2['booking_id']; ?>"> <input type="button" name="Submit" value="Add Discount"></a>
</div>
</body>
</html>