<?php
session_start();
?>
<html>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<body>
<a href="/Project/Codes/HomeScreen2.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center><div>

<nav class="menu">
<ul class="clearfix">
<li class="current-item"><a href="/Project/Codes/Laptophome.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laptops</a></li>
<li class="current-item"><a href="/Project/Codes/Mobilehome.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobiles</a></li>
<li class="current-item"><a href="/Project/Codes/Tablethome.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tablets</a></li>
<li class="current-item"><a href="/Project/Codes/search.html">Search 🔍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
</nav>
</center>
</div>

<div class="dropdown">
  <button class="dropbtn"> &#9776; </button>
  <div class="dropdown-content">
    <center><br><br><h3 id="hello" style="color:white;">Hello User!</h3><br><br></center>
    <a href="/Project/Codes/YourOrders.php"><p style="color:white;">Your Orders</p></a>
    <a href="/Project/Codes/YourAccount.php"><p style="color:white;">Your Account</p></a>
    <br><br><br><br>
    <center><a href="/Project/Codes/HomeScreen.php"><p style="color:white;">Log Out</p></a></center>
  </div>
</div>
<br><br><br><br><br><br>



<center><b style="font-size:20px"><i>Apple iPhone 11</i></b></center>
<br><br><br>
<div class="row2">
  <div class="column2" style="background-color:#ffffff;"> 
     <br>
     <center>
     <a id="linking" href="https://www.apple.com/in/iphone-11/"><img id="adImg" src="/Project/Images/mobiles/1011.1.jpg" width="210px" height="200px"></a></img><br></center><center>
     <script type="text/javascript">
     function changeImgLink1()
     {
       document.getElementById('adImg').src='/Project/Images/mobiles/1011.1.jpg'
     }
    function changeImgLink2()
    {
      document.getElementById('adImg').src='/Project/Images/mobiles/1011.2.jpg'
    }
   </script><br>
   <input type="radio" name="imgs" id="radio1" onclick="changeImgLink1()" checked /> 
   <input type="radio" name="imgs" id="radio2" onclick="changeImgLink2()"/> 
   </center>
   <br><br>
   <center>
   <table border='1' cellspacing="5px">
    <tr>
      <td><img src='/Project/Images/mobiles/1011.1.jpg' width="40px" height="50px"></img></td>
      <td><img src='/Project/Images/mobiles/1011.2.jpg' width="50px" height="50px"></img></td>
    </tr>
  </table>
  <br>
  <i>(Please Click on the Image for more Specifications)</i>
  </center>
  </div>
  <div class="column2" style="background-color:#ffffff;">
  <p><b>Specifications:</b></p>
  <?php
    $db=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
    $q="select brnm,pnm,mnm,cost,camera,scrsz,ram,rom,processor,mfgdt
        from brand b,product p,model m,bpm
        where b.brno=bpm.brno AND p.pno=bpm.pno
        AND m.mno=bpm.mno AND m.mno=1011";
    $res=pg_query($db,$q);
    while($row=pg_fetch_array($res))
    {
      echo "<br>";
      echo "<b>Brand Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ".strtoupper($row[0])."<br>";
      echo "<b>Product Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ".ucwords($row[1])."<br>";
      echo "<b>Model Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[2]."<br>";
      echo "<b>Cost:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x20b9;".$row[3]."<br>";
      echo "<b>Camera:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[4]."<br>";
      echo "<b>Screensize:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[5]." inches<br>";
      echo "<b>RAM: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[6]."<br>";
      echo "<b>ROM: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[7]."<br>";
      echo "<b>Processor:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row[8]."<br>";
      echo "<b>Manufacturing Date:</b> ".$row[9]."<br>";
      echo "<br>";
      $bnm=$row[0];
      $prnm=$row[1]; 
      $modnm=$row[2]; 
      $cst=$row[3];
    }
  ?>
  <br>
  <form action="/Project/Codes/cart.php" method="POST">
  <b>Quantity: </b><input type="number" name="qty" style="width:50px" min="5" max="30">
  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="Submit" name="Submit" value="ADD to Cart">
  </form>
  </div>

  <center>
  <div class="column2" style="background-color:#ffffff;">
  <p><b>Related Searches:</b></p>
  <br>
  <?php
    $query="select mnm,cost,link
        from model m,product p,brand b,bpm
        where m.mno=bpm.mno AND b.brno=bpm.brno AND p.pno=bpm.pno AND pnm='$prnm' AND brnm='$bnm'";
    $result=pg_query($db,$query);
    while($brow=pg_fetch_array($result))
    {
      echo "<br>";
      echo " ".$brow[0]."<br>";
      echo "&#x20b9;".$brow[1]."<br>";
      echo "<html><a href='$brow[2]'>".$brow[2]."</a><br></html>";
    }
    pg_close($dh);
  ?>

  </div>
  </center>
</div>

<br><br><br>
<center>
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


</center>

</body>
</html>

<?php

$quan=$_POST['qty'];
setcookie('quan',$quan,time()+90);
$quan=$_COOKIE['quan'];

$_SESSION['brandnm']=$bnm;
$_SESSION['modelnm']=$modnm;
$_SESSION['productnm']=$prnm;
$_SESSION['costprc']=$cst;
$_SESSION['quantity']=$quan;

?>