<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM bill ORDER BY bno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Bill table:</h1><br><br>
    <table width='80%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Bill Number</td>
            <td>Bill Date</td>
            <td>Bill Amount</td>
            <td>Order Number</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['bno']."</td>";
            echo "<td>".$res['bdt']."</td>";
            echo "<td>".$res['bamt']."</td>";  
            echo "<td>".$res['ono']."</td>";      
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Bills</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Bill Number*</b></td>
                <td><input type="text" name="obno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Bill Number</b></td>
                <td><input type="text" name="bno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Bill Date</b></td>
                <td><input type="text" name="bdt"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Bill Amount</b></td>
                <td><input type="text" name="bamt"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Order Number</b></td>
                <td><input type="text" name="ono"></td>
            </tr>
        </table><small>*Old Bill number is for editing only. Please add the new data in the regular fields.</small><br><br>
<center>
  <input type="submit" name="AddNew" value="Add new"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Edit" value="Edit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="Delete" value="Delete" onclick="return confirm('Are you sure you want to delete?')"></center>


</form>

</center>
</body>
</html>

 <?php
$obno= $_POST['obno'];
$bno= $_POST['bno'];
$bdt= $_POST['bdt'];
$bamt= $_POST['bamt'];
$ono= $_POST['ono'];
  if(isset($_POST['AddNew'])) 
   {    

     if($bno==null || $bdt==null || $bamt==null || $ono==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO bill VALUES('$bno','$bdt','$bamt','$ono')");
        echo "<script type='text/javascript'>
              alert('Bill $bno has been added!');
              window.location='/Project/Codes/AdminOpr/billindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($bdt==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE bill set bdt='$bdt',bamt='$bamt',ono='$ono' WHERE bno=$obno");
        echo "<script type='text/javascript'>
              alert('Bill $bno has been updated!');
              window.location='/Project/Codes/AdminOpr/billindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($obno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM bill WHERE bno='$obno'");
        echo "<script type='text/javascript'>
              alert('Bill $obno has been deleted!');
              window.location='/Project/Codes/AdminOpr/billindex.php';
              </script>";
       }
    }
           ?>