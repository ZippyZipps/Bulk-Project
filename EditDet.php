<html>
<?php
session_start();
?>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<a href="/Project/Codes/HomeScreen.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center>
  <h1 style="color:#1e4066; font-size: 70px"><b><i>Change Password</i></b> </h1>

<br><br><br><br><br>

<b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><input type="text" name="emph"><br><br><br>
<b>Pin:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><input type="text" name="pin"><br><br><br>
<b>New Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="password" name="pwd1"><br><br><br>
<b>Confirm Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="password" name="pwd2"><br><br><br>
<input id="sgn" type="submit" name="submit" value="Change Password"><br><br>
<small><a href="/Project/Codes/LogIn.php"><u>Click here to cancle and go back.</u></a></small>

<br><br><br><br>


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
$pass=strrev($_POST['pwd1']);
$pass2=strrev($_POST['pwd2']);
$pin=strrev($_POST['pin']);
$sql="SELECT id FROM login WHERE unm='$usr' AND pin='$pin'";
echo "$sql<br>";
$sql2="UPDATE login set pwd='$pass' where unm='$usr' AND pin='$pin'";
echo "$sql2<br>";
$res=pg_query($link,$sql);
$row=pg_num_rows($res);
$pwlen=strlen($pass);

if(isset($_POST['submit'])) 
{
if(!($row==1))
{
  echo "<script type='text/javascript'>
        alert('Invalid Email or Pin!');
        </script>";
}
if(!($pass==$pass2))
{
  echo "<script type='text/javascript'>
  alert('Passwords don't match!');
</script>";
}
else if($pwlen<8)
{
  echo "<script type='text/javascript'>
  alert('Password must be greater than 8 characters!');
</script>";
}
else
{
$resup=pg_query($link,$sql2);
$aff=pg_affected_rows($resup);
if($aff==1)
{
  echo "<script type='text/javascript'>
  alert('Password has been changed!');
  window.location='LogIn.php';
</script>";
}
else
{
  echo "<script type='text/javascript'>
  alert('Oops! An error occured, please go back and try again!');
</script>";
}
}
}
?>