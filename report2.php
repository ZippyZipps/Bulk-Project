=<?php
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



<h1 id="toAdd">Enter the required details</h1><br>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="f3">
    
         <table width="35%" border="0">
            <tr style="font-size:22px"> 
                <td><b>Model Name</b></td>
                <td><input type="text" name="mnm"></td>
            </tr>

           <tr style="font-size:22px"> 
                <td> </td>    
                <td> <input type="submit" name="generate" value="Generate"></td>         


            </tr><br>
                  <?php

$mnm= $_POST['mnm'];

  if(isset($_POST['generate'])) 
   {    

        $result2=pg_query($link,"SELECT f3('$mnm')");
        while($res2=pg_fetch_array($result2)) 
        {
            echo "<td>".$res2['0']."</td><br>";
            echo "Working";    
        }
  
    }
           ?><br><br><br>
  <br><br>
<center>

</form>

</center>
</body>
</html>
