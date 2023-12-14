<?php
session_start();
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
?>
<html>
<title> Bulk Bazaar </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
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
<br><br>
<center>
  <h1 style="color:#1e4066; font-size: 70px"><b><i>Bill Details</i></b> </h1>

  <br><br><br>
  <b>Confirm Your Order No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" name="ordno"><br><br>

  <input id="sgn" type="submit" name="submit" value="Show Details">

  <br><br><br><br><br><br><br>
  <?php
    $nordno=$_POST['ordno'];

 $q="SELECT cunm,cuaddr,cuph,mnm,odesc,oqty,cost,odt FROM model m,bpm,order1 o,customers c where bpm.mno=o.mno AND c.cuno=o.cuno AND m.mno=o.mno AND ono='$nordno'";
  $res=pg_query($link,$q);
  while($row=pg_fetch_array($res))
  {
     $tot=($row[5]*$row[6]);
     echo "<table width=30%>"?>
      <tr style="font-size:22px;">
      <?php 
        echo "<td><b>Name:</b></td>
              <td>".ucwords($row[0])."</td></tr>";?>
          <tr style="font-size:22px">
      <?php 
        echo "<td><b>Address:</b></td>
              <td>".ucwords($row[1])."</td></tr>";?>
         <tr style="font-size:22px">
      <?php 
        echo "<td><b>Phone No:</b></td>
              <td>".$row[2]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Model Name:</b></td>
              <td>".$row[3]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Product Name:</b></td>
              <td>".ucwords($row[4])."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Quantity:</b></td>
              <td>".$row[5]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Cost of Each Product:</b></td>
              <td>&#8377;".$row[6]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Date:</b></td>
              <td>".$row[7]."</td></tr>";?>
        <tr style="font-size:22px">
      <?php 
        echo "<td><b>Total:</b></td>
              <td>&#8377; ".$tot."</td></tr>";?>
               <?php 
        echo "<td></td>
              <td></td></tr>";
      echo"</table>";
      echo "<br><br><br>";

    }
?>
<br><br>
</form>
<form method="POST" action="/Project/Codes/HomeScreen.php">
<input type="submit" name="rem" value="Log Out">
</form>
<a href="javascript:window.print()">Click here to Print the Bill</a>
</center>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="row3">
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

    <p>Quick Links</p>
        <a href="/Project/Codes/CreateAcc.php" style="color:#ffffff;">Create a new account</a><br><br>
    <a href="/Project/Codes/LogIn.php" style="color:#ffffff;">Connect with WEG</a>
  </div>

  <div class="column3" style="background-color:#2c3840; color:#ffffff;">
   
    <p>About Us</p>

 <center>Our system is specifically built for clients who want to save on money with bulk orders and require a store that caters to their need
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


<?php

$ntot=$tot;
$ndt=date("m-d-Y");


$q4="SELECT ono FROM order1  ORDER BY ono desc limit 1 ";
$res4=pg_query($link,$q4);
while($r4=pg_fetch_array($res4))
 {
   $ron=$r4[0];
 }

$oquery="INSERT INTO bill(bdt,bamt,ono)VALUES('$ndt','$ntot','$ron')";
pg_query($link,$oquery);


?>

</body>
</html>
