<?php
session_start();
$e=$_POST['emph'];
setcookie('e',$e,time()+90);
$e=$_COOKIE['e'];
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
$nmsql="SELECT cunm FROM customers where cuemail='$e'";

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
<li class="current-item"><a href="/Project/Codes/Laptophome.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laptops</a></li>
<li class="current-item"><a href="/Project/Codes/Mobilehome.php">Mobiles</a></li>
<li class="current-item"><a href="/Project/Codes/Tablethome.php">Tablets</a></li>
<li class="current-item"><a href="/Project/Codes/search.html">Search 🔍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
</nav>

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


<a id="linking" href="/Project/Codes/m1018.php"><img id="adImg" src="/Project/Images/ads/ad1.jpg"></a></img><br>


<!–– USING DOM FUNCTIONALITY ––>


<script type="text/javascript">
  function changeImgLink1()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad1.jpg'
    document.getElementById('linking').href='/Project/Codes/m1018.php'
  }

  function changeImgLink2()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad2.jpg'
    document.getElementById('linking').href='/Project/Codes/m1003.php'
  }

  function changeImgLink3()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad3.jpg'
    document.getElementById('linking').href='/Project/Codes/m1024.php'
  }

</script>


<input type="radio" name="ads" id="radio1" onclick="changeImgLink1()" checked /> 
<input type="radio" name="ads" id="radio2" onclick="changeImgLink2()"/> 
<input type="radio" name="ads" id="radio3" onclick="changeImgLink3()"/>


<br><br><br><br><br>
<h2>Suggested By Us:</h2> <br>

<div class="row">
  <div class="column" style="background-color:#FFFFFF;">
    <h2>LAPTOP</h2>
    <a href="/Project/Codes/m1001.php"><img src="/Project/Images/laptops/1001.1.jpg" width="270px" height="200px"></a></img>
  </div>
  <div class="column" style="background-color:#FFFFFF;">
   <h2>MOBILE</h2>
    <a href="/Project/Codes/m1017.php"><img src="/Project/Images/mobiles/1017.1.jpg" width="130px" height="180px"></a></img>

  </div>
  <div class="column" style="background-color:#FFFFFF;">
    <h2>TABLET</h2>
    <a href="/Project/Codes/m1025.php"><img src="/Project/Images/tabs/1025.1.jpg" width="160px" height="180px"></a></img>
 
  </div>
</div>

<div class="row2">
  <div class="column2" style="background-color:#ffffff;">
      HP15-bs146TU<br>
      &#x20b9&nbsp;37000<br>
  </div>
  <div class="column2" style="background-color:#ffffff;">

   
      Apple iPhone XR<br>
      &#x20b9&nbsp;49990<br>
  </div>
  <div class="column2" style="background-color:#ffffff;">

 
       Samsung Galaxy Tab A 10.1</br>
       &#x20b9&nbsp;30889<br>
  </div>
</div>

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
$expnm=explode(' ',$nmrow['cunm']);
$greet="Hello ".$expnm[0]."!";
  echo "<script type='text/javascript'>
         document.getElementById('hello').innerHTML='$greet';
        </script>"

//Use Javascript to change images on homescreen

?>