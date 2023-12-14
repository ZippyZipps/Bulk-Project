<?php
session_start();
?>
<html>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>

<body>
<a href="/Project/Codes/HomeScreen.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center><div>
<nav class="menu">
<ul class="clearfix">
<li class="current-item"><a href="" onclick="lgnf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Laptops</a></li>
<li class="current-item"><a href="" onclick="lgnf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobiles</a></li>
<li class="current-item"><a href="" onclick="lgnf()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tablets</a></li>
<li class="current-item"><a href="/Project/Codes/LogIn.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
</nav>
</div>

<br><br><br><br><br><br><br>


<a id="linking" href="/Project/Codes/LogIn.php" onclick="lgnf()" ><img id="adImg" src="/Project/Images/ads/ad1.jpg"></a></img><br>


<!–– USING DOM FUNCTIONALITY ––>


<script type="text/javascript">
  function changeImgLink1()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad1.jpg'
    document.getElementById('linking').href=''
  }

  function changeImgLink2()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad2.jpg'
    document.getElementById('linking').href='/Project/Codes/LogIn.php'
  }

    function changeImgLink3()
  {
    document.getElementById('adImg').src='/Project/Images/ads/ad3.jpg'
    document.getElementById('linking').href='/Project/Codes/LogIn.php'
  }
  
  function lgnf()
  {
      alert('Please LogIn to continue');
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
    <a href="" onclick="lgnf()"><img src="/Project/Images/laptops/1001.1.jpg" width="270px" height="200px"></a></img>
  </div>
  <div class="column" style="background-color:#FFFFFF;">
    <h2>MOBILE</h2>
    <a href="" onclick="lgnf()"><img src="/Project/Images/mobiles/1017.1.jpg" width="130px" height="180px"></a></img>

  </div>
  <div class="column" style="background-color:#FFFFFF;">
    <h2>TABLET</h2>
    <a href="" onclick="lgnf()"><img src="/Project/Images/tabs/1025.1.jpg" width="160px" height="180px"></a></img>
 
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

      Samsung Galaxy Tab A 10.1</h1>
       &#x20b9&nbsp;30889<br>
  </div>
</div>
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

//Use Javascript to change images on homescreen

?>