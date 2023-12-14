<?php
$link=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=admin123"); 

$result = pg_query($link, "SELECT * FROM model ORDER BY mno");
?>
 
<html>
<title> WEG Admin Display </title>
<body>
<link rel="stylesheet" type="text/css" href="mainstylesheet.css"/>
<center>
    <a href="/Project/Codes/Admin.php"><img align="center" src="/Project/Icons/NewLogoSmall.png"></a></img>
<br><br><br><br>
 <h1>Contents of the Model table:</h1><br><br>
    <table width='100%' border=0>
        <tr bgcolor='#b4dff0' style="font-size:22px">
            <td>Model Number</td>
            <td>Model Name</td>
            <td>Screen Size</td>
            <td>RAM</td>
            <td>ROM</td>
            <td>Processor</td>
            <td>Camera</td>
            <td>Link</td>
        </tr>
        <?php 
        while($res = pg_fetch_array($result)) { ?>
        <tr style="font-size:20px">        
            <?php
            echo "<td>".$res['mno']."</td>";
            echo "<td>".$res['mnm']."</td>";
            echo "<td>".$res['scrsz']."</td>";
            echo "<td>".$res['ram']."</td>";
            echo "<td>".$res['rom']."</td>";
            echo "<td>".$res['processor']."</td>";
            echo "<td>".$res['camera']."</td>";
            echo "<td>".$res['link']."</td>";    
        }
        ?>

    </table>
    <br>
    <br><br>

<h1 id="toAdd">Modify the Models</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f1">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Old Model Number*</b></td>
                <td><input type="text" name="omno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Model Number</b></td>
                <td><input type="text" name="mno"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Model Name</b></td>
                <td><input type="text" name="mnm"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Screen Size</b></td>
                <td><input type="text" name="scrsz"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>RAM</b></td>
                <td><input type="text" name="ram"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>ROM</b></td>
                <td><input type="text" name="rom"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Processor</b></td>
                <td><input type="text" name="processor"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Camera</b></td>
                <td><input type="text" name="camera"></td>
            </tr>
            <tr style="font-size:22px"> 
                <td><b>Link</b></td>
                <td><input type="text" name="link"></td>
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
$mno= $_POST['mno'];
$mnm= $_POST['mnm'];
$scrsz= $_POST['scrsz'];
$ram=$_POST['ram'];
$rom=$_POST['rom'];
$processor=$_POST['processor'];
$camera=$_POST['camera'];
$link=$_POST['link'];

  if(isset($_POST['AddNew'])) 
   {    

     if($mno==null || $mnm==null || $scrsz==null || $ram==null || $rom==null || $processor==null || $camera==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result1=pg_query($link,"INSERT INTO model VALUES('$mno','$mnm','$scrsz','$ram','$rom','$processor','$camera','$link')");
        echo "<script type='text/javascript'>
              alert('Model $mnm has been added!');
              window.location='/Project/Codes/AdminOpr/moindex.php';
              </script>";
       }
    }
      if(isset($_POST['Edit'])) 
   {    

     if($mnm==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result2=pg_query($link,"UPDATE model set mnm='$mnm' WHERE mno=$omno");
        echo "<script type='text/javascript'>
              alert('Model $mnm has been updated!');
              window.location='/Project/Codes/AdminOpr/moindex.php';
              </script>";
       }
    }
      if(isset($_POST['Delete'])) 
   {    

     if($mno==null)
     {
        echo "<script type='text/javascript'>
              alert('Fill in all the fields!');
              </script>";
      }

      else
      {
        $result3=pg_query($link,"DELETE FROM model WHERE mno='$mno'");
        echo "<script type='text/javascript'>
              alert('Model $mnm has been deleted!');
              window.location='/Project/Codes/AdminOpr/moindex.php';
              </script>";
       }
    }
           ?>