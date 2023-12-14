<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM customers ORDER BY cuno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Customers table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Customer Number</td>
            <td>Customer Name</td>
            <td>Customer Address</td>
            <td>Customer Phone Number</td>
            <td>Customer Email</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['cuno']."</td>";
            echo "<td>".$res['cunm']."</td>";
            echo "<td>".$res['cuaddr']."</td>";
            echo "<td>".$res['cuph']."</td>";
            echo "<td>".$res['cuemail']."</td>";
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Customer Details</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Customer Number*</b></td>
                <td><input type="text" name="ocuno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Customer Number</b></td>
                <td><input type="text" name="cuno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Customer Name</b></td>
                <td><input type="text" name="cunm"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Address</b></td>
                <td><input type="text" name="cuaddr"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Phone Number</b></td>
                <td><input type="text" name="cuph"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Email</b></td>
                <td><input type="text" name="cuemail"></td>
            </tr>
        </table><small>*Old Customer number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$ocuno= $_POST['ocuno'];
$cuno= $_POST['cuno'];
$cunm= $_POST['cunm'];
$cuaddr= $_POST['cuaddr'];
$cuph= $_POST['cuph'];
$cuemail= $_POST['cuemail'];
  if(isset($_POST['AddNew'])) 
   {    

     if($cuno==null || $cunm==null || $cuaddr==null || $cuph==null || $cuemail==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO customers VALUES('$cuno','$cunm','$cuaddr','$cuph','$cuemail')");
        echo "<script type='text/javascript'>
              alert('Customer $cunm has been added!');
              window.location='/Project/Codes/AdminOpr/custindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($ocuno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE customers set cunm='$cunm',cuaddr='$cuaddr',cuph='$cuph',cuemail='$cuemail' WHERE cuno=$ocuno");
        echo "<script type='text/javascript'>
              alert('Customer $cunm has been updated!');
              window.location='/Project/Codes/AdminOpr/custindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($ocuno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM customers WHERE cuno='$ocuno'");
        echo "<script type='text/javascript'>
              alert('Customer $cunm has been deleted!');
              window.location='/Project/Codes/AdminOpr/custindex.php';
              </script>";
       }
    }
           ?>