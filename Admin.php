<?php
$e=$_POST['emph'];
setcookie('e',$e,time()+90);
$e=$_COOKIE['e'];
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
$nmsql="SELECT cunm FROM customers where cuemail='$e'";
?>

<html>
<title> WEG for Admin </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>

<body>
<a href="/Project/Codes/Admin.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center><div>
<nav class="menu">
<ul class="clearfix">
<li class="current-item"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
<li class="current-item"><a href="/Project/Codes/Laptophome.php">Laptops</a></li>
<li class="current-item"><a href="/Project/Codes/Mobilehome.php">Mobiles</a></li>
<li class="current-item"><a href="/Project/Codes/Tablethome.php">Tablets</a></li>
<li class="current-item"><a href="/Project/Codes/search.html">Search 🔍</a></li>
<li class="current-item"><a href="/Project/Codes/HomeScreen.php">Log Out</a>
<li class="current-item"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>

</nav>
<br><br><br><br><br><br><br><br>


    <table width='100%' border=0>
        <tr style="font-size:22px">
            <td><center><b>Modify Brands</b></center></td>
            <td><center><b>Modify Products</b></center></td>
            <td><center><b>Modify Models</b></center></td>
            <td><center><b>Modify Logistics</b></center></td>
            <td><center><b>Modify Customers</b></center></td>
            <td><center><b>Modify Orders</b></center></td>
            <td><center><b>Modify Bills</b></center></td>
        </tr></table>
        <br><br><br>

            <table width='100%' border=0>
        <tr style="font-size:22px">
            <td><center><button><a href="/Project/Codes/AdminOpr/brindex.php">Brand</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/prindex.php">Product</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/moindex.php">Model</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/bpmindex.php">Bpm</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/custindex.php">Customers</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/orindex.php">Orders</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/billindex.php">Bill</button></a></center></td>
        </tr></table>

        <br><br><br>
                           <center><h1><b>Reports</b></h1></center><br>
            <table width='80%' border=0>
        <tr style="font-size:22px">
            <td><center><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total sale of a brand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></center></td>
            <td><center><b>Total Stock of a model</b></center></td>
            <td><center><b>Total number of customers who have purchased a <br>given model with quantity</b></center></td>
        </tr></table>
        <br><br><br>

        <table width='80%' border=0>
        <tr style="font-size:22px">
            <td><center><button><a href="/Project/Codes/AdminOpr/report1.php">Generate Report (1)</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/report2.php">Generate Report (2)</button></a></center></td>
            <td><center><button><a href="/Project/Codes/AdminOpr/report3.php">Generate Report (3)</button></a></center></td>
        </tr></table>


</div>

<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>

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
$res2=pg_query($link,$nmsql);
$nmrow=pg_fetch_assoc($res2);
$greet="Hello ".$nmrow['cunm']."!";
  echo "<script type='text/javascript'>
         document.getElementById('hello').innerHTML='$greet';
        </script>"

//Use Javascript to change images on homescreen

?>