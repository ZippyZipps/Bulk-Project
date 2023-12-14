<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM product ORDER BY pno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Product table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Product Number</td>
            <td>Product Name</td>
            <td>Number of Models</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['pno']."</td>";
            echo "<td>".$res['pnm']."</td>";
            echo "<td>".$res['nom']."</td>";    
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Products</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Product Number*</b></td>
                <td><input type="text" name="opno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Product Number</b></td>
                <td><input type="text" name="pno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Product Name</b></td>
                <td><input type="text" name="pnm"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Number of modles</b></td>
                <td><input type="text" name="nom"></td>
            </tr>
        </table><small>*Old Product number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$opno= $_POST['opno'];
$pno= $_POST['pno'];
$pnm= $_POST['pnm'];
$nom= $_POST['nom'];
  if(isset($_POST['AddNew'])) 
   {    
     if($pno==null || $pnm==null || $nom==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO product VALUES('$pno','$pnm','$nom')");
        echo "<script type='text/javascript'>
              alert('Product $pnm cannont be added! It must be a laptop,mobile or tablet');
              window.location='/Project/Codes/AdminOpr/prindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($pnm==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE product set pnm='$pnm' WHERE pno=$opno");
        echo "<script type='text/javascript'>
              alert('Product $pnm has been updated!');
              window.location='/Project/Codes/AdminOpr/prindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($pno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM product WHERE pno='$pno'");
        echo "<script type='text/javascript'>
              alert('Product $pnm has been deleted!');
              window.location='/Project/Codes/AdminOpr/prindex.php';
              </script>";
       }
    }

    pg_close();
           ?>