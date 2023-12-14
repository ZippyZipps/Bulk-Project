<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM bpm ORDER BY brno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the BPM table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Brand Number</td>
            <td>Product Number</td>
            <td>Model Number</td>
            <td>Manufacturing Date</td>
            <td>Cost</td>
            <td>Stock</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['brno']."</td>";
            echo "<td>".$res['pno']."</td>";
            echo "<td>".$res['mno']."</td>"; 
            echo "<td>".$res['mfgdt']."</td>";
            echo "<td>".$res['cost']."</td>";   
            echo "<td>".$res['stock']."</td>";
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the BPMs</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Model Number*</b></td>
                <td><input type="text" name="omno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Brand Number</b></td>
                <td><input type="text" name="brno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Product Number</b></td>
                <td><input type="text" name="pno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Model Number</b></td>
                <td><input type="text" name="mno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Manufacturing Date</b></td>
                <td><input type="text" name="mfgdt"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Cost</b></td>
                <td><input type="text" name="cost"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Stock</b></td>
                <td><input type="text" name="stock"></td>
            </tr>
        </table><small>*Old Model number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$omno= $_POST['omno'];
$brno= $_POST['brno'];
$pno= $_POST['pno'];
$mno= $_POST['mno'];
$mfgdt= $_POST['mfgdt'];
$cost= $_POST['cost'];
$stock= $_POST['stock'];
  if(isset($_POST['AddNew'])) 
   {    

     if($brno==null || $pno==null || $mno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO bpm VALUES('$brno','$pno','$mno','$mfgdt','$cost','$stock')");
        echo "<script type='text/javascript'>
              alert('BPM $pno has been added!');
              window.location='/Project/Codes/AdminOpr/bpmindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($omno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE bpm set mfgdt='$mfgdt',cost=$cost,stock=$stock WHERE mno=$omno");
        echo "<script type='text/javascript'>
              alert('BPM $omno has been updated!');
              window.location='/Project/Codes/AdminOpr/bpmindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($omno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM bpm WHERE mno='$omno'");
        echo "<script type='text/javascript'>
              alert('BPM $omno has been deleted!');
              window.location='/Project/Codes/AdminOpr/bpmindex.php';
              </script>";
       }
    }
           ?>