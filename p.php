<?php

require 'dbconfig/config.php';

$query= "SELECT * FROM barang";

$hasil = mysqli_query($con ,$query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Productpage</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
</head>
<body>

	 <div class="container">
                 
               <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <tr>
                <td> <?php echo $data['kd_brg'];?></td>
                <td> <?php echo $data['nm_brg'];?></td>
                <td> <?php echo $data['merk'];?></td>
                <td> <?php echo $data['type'];?></td>
                <td> <?php echo $data['harga'];?></td>
                <td> <?php echo $data['stock'];?></td>
                </tr>     
                <?php } ?>

            <div class="tab-2">
               <form action="p.php" method="post">

                Nama Barang :<input type="text" name="nm_brg" id="barang" >
                Merk :<input type="text" name="merk" id="merk" >
                Type :<input type="text" name="type" id="type" >
                Harga :<input type="text" name="harga" id="harga">
                Stock :<input type="text" name="stock" id="stock" >
                
                <button id="btn_insert" name="insert" type="submit">Add</button>
               </form>

               <?php
               if (isset($_POST['insert'])) {
                    @$nm_brg=$_POST['nm_brg'];
                    @$merk=$_POST['merk'];
                    @$type=$_POST['type'];
                    @$harga=$_POST['harga'];
                    @$stock=$_POST['stock'];

                    if($nm_brg=="" || $merk=="" || $type=="" || $harga=="" || $stock=="")
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into barang(nm_brg,merk,type,harga,stock) values('$nm_brg','$merk','$type','$harga','$stock')";
 
                        $query_run = mysqli_query ($con,$query);
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
                        }
                        else{
                            echo '<script type="text/javascript">alert("Values Not inserted")</script>';
                        }
                    }

                    }
              
               ?>

            </div>
        </div>      

</body>
</html>