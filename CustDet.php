<?php
session_start();
/*$cem=$_POST['em'];
$cem3=$_SESSION['newcem']=$cem;
$cem2=$cem3;
session_set_cookie_params(90,"/");
echo "New: $newcem <br> Cem2: $cem2 <br> Cem3: $cem2 ";

$ncem=$_POST['ncuem'];*/

?>

<html>
<?php
//session_start();
$emn=$_POST['em'];
setcookie('emn',$emn,time()+90);
$emn=$_COOKIE['emn'];
$_SESSION['custemail']=$emn;
?>
<title> WEG Sales </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<img align="left" src="/Project/Icons/NewLogoSmall.png"></img>
<center>
  <h1 style="color:#1e4066; font-size: 70px"><b><i>Your Details</i></b> </h1>

<br><br><br><br><br>

 <b>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" name="nm"><br><br><br>
<b>Address: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<textarea name="addr" rows="4" cols="30" maxlength="50" placeholder="Area,City,State" style="resize: none" required></textarea><br><br><br>
<b>Phone Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
<input type="tel" name="phno" pattern="[7-9]{1}[0-9]{9}" onkeypress='return restrictAlphabets(event)'><br><br><br>
<b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="mail" id="cuem" name="cuemv" value="<?php echo "$emn";?>" readonly><br><br><br>
<b>Confirm Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="mail"  name="ncuem" required><br><br><br><br>
<input type="submit" name="submit" value="Submit Details"><br><br><br><br>



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

$link2=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123");
 
if(!$link2)
{
    die("ERROR: Could not connect. ".pg_connect_error());
}


$cnm=$_POST['nm'];
$cadd=$_POST['addr'];
$cph=$_POST['phno'];
$try=$_POST['cuemv'];
$ncem=$_POST['ncuem'];


echo "<script type='text/javascript'>
  document.getElementById('cuem').value='$emn';
</script>";

$q2="INSERT INTO customers VALUES (1,'$cnm','$cadd','$cph','$ncem')";

$phsiz=strlen($cph);
if(isset($_POST['submit'])) 
{

 if(!($phsiz==10))
 {
   echo "<script type='text/javascript'>
    alert('Phone number must of 10 digits!');
  </script>";
 }

 else if($cnm==null)
 {
   echo "<script type='text/javascript'>
   alert('Name cannot be empty!');
   </script>";
 }
 else
 {

   $q3="SELECT cuno FROM customers WHERE cuemail='$ncem'";


  $res2=pg_query($link2,$q2);
  $res3=pg_query($link2,$q3);
  while($result=pg_fetch_array($res3))
  {
    $updatecuno=$result[0];
  }



$res4=pg_query($link2,"UPDATE login set cuno='$updatecuno' where unm='$ncem'");
$aff2=pg_affected_rows($res2);

if($aff2==1)
{
  echo "<script type='text/javascript'>
  alert('Details have been stored!');
  window.location='LogIn.php';
</script>";

}
else
{
  echo "<script type='text/javascript'>
  alert('Oops, an error occured. Please go back and try again!');
</script>";
}
}
}

//ALTER TABLE customers ALTER COLUMN cuaddr TYPE varchar(50);
//ALTER TABLE model ALTER COLUMN processor TYPE varchar(50);


?>
<?php
//session_destroy();
?>
