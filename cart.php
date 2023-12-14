<?php
session_start();
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");

?>


<html>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<a href="/Project/Codes/HomeScreen2.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center><div>
<nav class="menu">
<ul class="clearfix">
<li class="current-item"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
<li class="current-item"><a href="/Project/Codes/Laptophome.php">Laptops</a></li>
<li class="current-item"><a href="/Project/Codes/Mobilehome.php">Mobiles</a></li>
<li class="current-item"><a href="/Project/Codes/Tablethome.php">Tablets</a></li>
<li class="current-item"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
<li class="current-item"><a href="/Project/Codes/search.html">Search 🔍</a>
<li class="current-item"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
</nav>
</div>

  <?php
          echo "<br><br><br><br><br><br><br>";

$quan=$_POST['qty'];
$newval=$quan;

$val=array_values($_SESSION);

       $tot=($newval*$val[4]);
       $cem=$val[0];

        echo "<table width=30%>"?>
      <tr style="font-size:22px;">
      <?php 
        echo "<td><b>Brand Name</b></td>
              <td>".ucwords($val[1])."</td></tr>";?>
          <tr style="font-size:22px">
      <?php 
        echo "<td><b>Model Name</b></td>
              <td>".$val[2]."</td></tr>";?>
         <tr style="font-size:22px">
      <?php 
        echo "<td><b>Product Type</b></td>
              <td>".ucwords($val[3])."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Price</b></td>
              <td>&#8377; ".$val[4]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Quantity</b></td>
              <td>".$newval."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Total</b></td>
              <td>&#8377; ".$tot."</td></tr>";?>
               <?php 
        echo "<td></td>
              <td></td></tr>";
      echo"</table>";
      echo "<br><br><br>";
  
?>
<table width=30%>
  <tr style="font-size:22px">
  <td><input type="submit" name="rem" onclick="conf()" value="Remove"></td>
  <td><input type="button" name="ptc" id="ptc" value="Place order and Pay" onclick="getElementById('pay').scrollIntoView()"></td></tr>
</table>
<?php

$bnm=$val[1];
$monm=$val[2];
$proty=$val[3];
$dt=date("m-d-Y");


$q0="SELECT brno FROM brand WHERE brnm='$bnm'";
$q1="SELECT mno FROM model WHERE mnm='$monm'";
$q2="SELECT pno FROM product WHERE pnm='$proty'";
$q3="SELECT cuno FROM customers WHERE cuemail='$cem'";

$res0=pg_query($link,$q0);
$res1=pg_query($link,$q1);
$res2=pg_query($link,$q2);
$res3=pg_query($link,$q3);


 while($r3=pg_fetch_array($res3))
 {
   $rcu=$r3[0];
 }
 while($r0=pg_fetch_array($res0))
 {
   $rbr=$r0[0];
 }
  while($r2=pg_fetch_array($res2))
 {
   $rpn=$r2[0];
 }
  while($r1=pg_fetch_array($res1))
 {
   $rmn=$r1[0];
 }


 $mainq="INSERT INTO order1(odesc,oqty,odt,cuno,brno,pno,mno) VALUES('$proty',$newval,'$dt','$rcu','$rbr','$rpn','$rmn')";
 pg_query($link,$mainq);

$ordq="SELECT ono FROM order1 o,customers c WHERE o.cuno=c.cuno AND cuemail='$cem' AND brno='$rbr'";
$resq=pg_query($link,$ordq);
while($rq=pg_fetch_array($resq))
{
  $qre=$rq[0];
}
echo "Order No is: ".$qre."<br>";

?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    
     
<div id="pay">

  <table width=30%>
    <tr style="font-size:25px">
    <td align="left"><input type="radio" name="mop" id="cod" checked onclick="cod()"></td>
    <td><b>Cash On Delivery (COD)</b></td></tr><tr></tr>
    <tr style="font-size:25px">
    <td align="left"><input type="radio" name="mop" id="pod" onclick="pod()"></td>
    <td><b>Pay On Delivery (POD)</b></td></tr><tr><td></td></tr><tr><td></td></tr>
    <tr style="font-size:25px">
    <td></td>
    <td><small>*UPI and Card Payment Available with POD</small></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
    
    <tr style="font-size:25px">
        <form method="POST" action="cart.php">
    <td></td>
    <td><input type="button" name="exequ" value="Confirm Payment" onclick="plor()" >
</td></tr>
  </table></form>
</div>

<div id="toBill">
      <table width=30%>
    <tr style="font-size:25px">
    <td></td><tr></tr>
    <br><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="genBill" value="Generate Bill" onclick="Billpg()"></td></tr>
 </table>
  </div>

<?php
    
    echo "Your order number is: ".$qre."<br>";

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="row3">
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

    <p>Quick Links</p>
        <a href="/Project/Codes/CreateAcc.php" style="color:#ffffff;">Create a new account</a><br><br>
    <a href="/Project/Codes/LogIn.php" style="color:#ffffff;">Connect with WEG</a>
  </div>

  <div class="column3" style="background-color:#2c3840; color:#ffffff;">
   
    <p>About Us</p>

 <center>Our system is specifically built for wholesale stores who deal with bulk orders and require retail like experience for their customers
            in order to enable them to place orders from anywhere within the country. This helps expand their business as well as reduce
            costs of having to hire numerous employees to keep a record of the products being sold by them.</center>
  </div>
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

 
    <p>Contact Us</p>
        Customer Service: 9874563210<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7896541230 <br><br><br>
    Email Us: wegsaleshelp@gmail.com
  </div>
</div> 
<script type="text/javascript">
  
function conf()
{
  var co=confirm('Are you sure you want to remove this item?');
  if(co==true)
  {
    <?php session_destroy();?>
    window.location='cart.php';
  }
}
</script>
<script type="text/javascript">
function cod()
{
  if(document.getElementById('cod').checked==true)
  {
    alert('You have selected to pay Cash on Delivery');
  }
}

function pod()
{
  if(document.getElementById('pod').checked==true)
  {
    alert('You have selected to Pay on Delivery using card/UPI');
  }
}

function plor()
      { 
        alert('Your order has been placed!');
        
      }


function Billpg()
{
  window.location='bill.php';
}


</script>
</center>
</body>
</html>