<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM order1 ORDER BY ono");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Order table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Order Number</td>
            <td>Order Description</td>
            <td>Order Quantity</td>
            <td>Order Date</td>
            <td>Customer Number</td>
            <td>Brand Number</td>
            <td>Product Number</td>
            <td>Model Number</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['ono']."</td>";
            echo "<td>".$res['odesc']."</td>";
            echo "<td>".$res['oqty']."</td>";
            echo "<td>".$res['odt']."</td>";
            echo "<td>".$res['cuno']."</td>";
            echo "<td>".$res['brno']."</td>";
            echo "<td>".$res['pno']."</td>";
            echo "<td>".$res['mno']."</td>";  
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Orders</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Order Number*</b></td>
                <td><input type="text" name="oono"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Order Number</b></td>
                <td><input type="text" name="ono"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Order Description</b></td>
                <td><input type="text" name="odesc"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Order Quantity</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Order Date</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Customer Number</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Brand Number</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Product Number</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Model Number</b></td>
                <td><input type="text" name="oqty"></td>
            </tr>
        </table><small>*Old Order number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$oono= $_POST['oono'];
$ono= $_POST['ono'];
$odesc= $_POST['odesc'];
$oqty= $_POST['oqty'];
$odt= $_POST['odt'];
$cuno= $_POST['cuno'];
$brno= $_POST['brno'];
$pno= $_POST['pno'];
$mno= $_POST['mno'];
  if(isset($_POST['AddNew'])) 
   {    

     if($ono==null || $odesc==null || $oqty==null || $odt==null || $cuno==null || $brno==null || $pno==null || $mno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO order1 VALUES('$ono','$odesc','$oqty','$odt','$cuno','$brno','$pno','$mno')");
        echo "<script type='text/javascript'>
              alert('Order $odesc has been added!');
              window.location='/Project/Codes/AdminOpr/orindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($odesc==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE order1 set odesc='$odesc' WHERE ono=$oono");
        echo "<script type='text/javascript'>
              alert('Order $odesc has been updated!');
              window.location='/Project/Codes/AdminOpr/orindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($oono==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM order1 WHERE ono='$oono'");
        echo "<script type='text/javascript'>
              alert('Order $odesc has been deleted!');
              window.location='/Project/Codes/AdminOpr/orindex.php';
              </script>";
       }
    }
           ?>