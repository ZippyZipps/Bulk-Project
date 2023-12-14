<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM brand ORDER BY brno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Brand table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Brand Number</td>
            <td>Brand Name</td>
            <td>Number of Products</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['brno']."</td>";
            echo "<td>".$res['brnm']."</td>";
            echo "<td>".$res['nop']."</td>";    
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Brands</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Brand Number*</b></td>
                <td><input type="text" name="obrno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Brand Number</b></td>
                <td><input type="text" name="brno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Brand Name</b></td>
                <td><input type="text" name="brnm"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Number of products</b></td>
                <td><input type="text" name="nop"></td>
            </tr>
        </table><small>*Old Brand number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$obrno= $_POST['obrno'];
$brno= $_POST['brno'];
$brnm= $_POST['brnm'];
$nop= $_POST['nop'];
  if(isset($_POST['AddNew'])) 
   {    

     if($brno==null || $brnm==null || $nop==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO brand VALUES('$brno','$brnm','$nop')");
        echo "<script type='text/javascript'>
              alert('Brand $brnm has been added!');
              window.location='/Project/Codes/AdminOpr/brindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($brnm==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE brand set brnm='$brnm' WHERE brno=$obrno");
        echo "<script type='text/javascript'>
              alert('Brand $brnm has been updated!');
              window.location='/Project/Codes/AdminOpr/brindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($brno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM brand WHERE brno='$brno'");
        echo "<script type='text/javascript'>
              alert('Brand $brnm has been deleted!');
              window.location='/Project/Codes/AdminOpr/brindex.php';
              </script>";
       }
    }
           ?>