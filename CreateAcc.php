<?php
//session_start();
$emn=$_POST['em'];
setcookie('emn',$emn,time()+3600);
$emn=$_COOKIE['emn'];
?>
<html>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<a href="/Project/Codes/HomeScreen.php"><img align="left" src="/Project/Icons/NewLogoSmall.png"></a></img>
<center>
  <h1 style="color:#1e4066; font-size: 70px"><b><i>Create Account</i></b> </h1>

<br><br><br><br><br>

 <b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="mail" name="em" placeholder="example@gmail.com" required><br><br><br>
<b>Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="password" name="pwd1"><br><br><br>
<b>Confirm Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="password" name="pwd2"><br><br><br>
<b>Pin*: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="text" name="pin" onkeypress='return restrictAlphabets(event)'><br><br>
<small><i>*Please safely store your pin as it will be used to reset your password in the future.</i></small>
<br><br>

<input type="submit" name="submit" value="Create Account"><br><br><br><br>

<p style="color:#1e4066; font-size: 40px"><i><b>Already a customer?</b></i></p><br>

<a href="/Project/Codes/LogIn.php"><input id="cacc" type="button" name="submit" value="Login"></a>

<br><br><br><br><br><br>

<div class="row3">
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

    <p>Quick Links</p>
  </div>
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

   
    <p>About Us</p>
  </div>
  <div class="column3" style="background-color:#2c3840; color:#ffffff;">

 
    <p>Contact Us</p>
  </div>
</div>

  <script type="text/javascript">
      /*code: 48-57 Numbers
        8  - Backspace,
        35 - home key, 36 - End key
        37-40: Arrow keys, 46 - Delete key*/
      function restrictAlphabets(e){
        var x=e.which||e.keycode;
        if((x>=48 && x<=57) || x==8 ||
          (x>=35 && x<=40)|| x==46)
          return true;
        else
          return false;
      }
    </script>

</center>
</form>
</body>
</html>
<?php


$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
 
if(!$link)
{
    echo("ERROR: Could not connect. ".pg_connect_error());
}


$un=$_POST['em'];
$p1=strrev($_POST['pwd1']);
$p2=strrev($_POST['pwd2']);
$pin=strrev($_POST['pin']);

$q="INSERT INTO login(unm,pwd,pin) VALUES('$un','$p1','$pin')";


$pwlen=strlen($p1);
$pinlen=strlen($pin);
if(isset($_POST['submit'])) 
{
if(!($pinlen==4))
{
  echo "<script type='text/javascript'>
  alert('Pin must consist of 4 numbers only!');
</script>";
}

if(!($p1==$p2))
{
  echo "<script type='text/javascript'>
  alert('Passwords do not match!');
</script>";


if($pwlen<8)
{
  echo "<script type='text/javascript'>
  alert('Password must be greater than 8 characters!');
</script>";

}
}

else
{
$res=pg_query($link,$q);
$aff=pg_affected_rows($res);
if (!filter_var($un,FILTER_VALIDATE_EMAIL)) 
{

      echo "<script type='text/javascript'>
  alert('Invalid Email format!');
</script>";
return;
}
 if($aff==1)
{
  echo "<script type='text/javascript'>
  alert('Account Created!');
  window.location='CustDet.php';
</script>";
}
else
{
  echo "<script type='text/javascript'>
  alert('Email Already Exists!');
</script>";
}
}
}


//<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);
?>
<?php
//session_destroy();
?>