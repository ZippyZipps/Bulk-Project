<?php
session_start();
$e=$_POST['emph'];
setcookie('e',$e,time()+3600);
$emne=$_COOKIE['e'];
$_SESSION['custname']=$e;
?>
<html>
<?php
//session_start();
?>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<a href="/Project/Codes/HomeScreen.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center>
  <h1 style="color:#1e4066; font-size: 70px"><b><i>Login</i></b> </h1>

<br><br><br><br><br>

<b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><input type="text" name="emph"><br><br><br>
<b>Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="password" name="pwd"><br><br><br>
<input id="sgn" type="submit" name="submit" value="Login"><br><br>
<small><a href="/Project/Codes/ForgotPw.php"><u>Forgot password? Click here!</u></a></small>

<br><br><br>

<p style="color:#1e4066; font-size: 40px"><i><b>New to WEG?</b></i></p><br>

<a href="/Project/Codes/CreateAcc.php"><input id="cacc" type="button" name="submit" value="Create Account"></a>

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
</form>
<?php

$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
 
if(!$link)
{
    echo("ERROR: Could not connect. ".pg_connect_error());
}

$usr=$_POST['emph'];
$pass=strrev($_POST['pwd']);
$sql="SELECT id FROM login WHERE unm='$usr' AND pwd='$pass'";
$nmsql="SELECT cunm FROM customers where cuemail='$usr'";
$res=pg_query($link,$sql);
$res2=pg_query($link,$nmsql);
$row=pg_num_rows($res);
$nmrow=pg_fetch_assoc($res2);
if(isset($_POST['submit'])) 
{
if($row==1 && $usr=='admin' && $pass=='nimda')
{
  //$_SESSION['LogUserIn']=$lui;

  $greet="Welcome ".$nmrow['cunm']."!";
  echo "<script type='text/javascript'>
        alert('$greet');
        window.location='Admin.php';
        </script>";
}

if($row==1)
{
  //$_SESSION['LogUserIn']=$lui;

  $greet="Welcome ".$nmrow['cunm']."!";
  echo "<script type='text/javascript'>
        alert('$greet');
        window.location='HomeScreen2.php';
        </script>";
}
else
{
    echo "<script type='text/javascript'>
        alert('Invalid username or password! Please try again!');
        </script>";
}
}
?>
</body>
</html>
<?php
//session_destroy();
?>
