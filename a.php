<?php

require 'dbconfig/config.php';

$query= "SELECT * FROM pembeli";

$hasil = mysqli_query($con ,$query);

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

	 <div class="container">

               <?php while ($data=mysqli_fetch_array($hasil)) { ?>
                <tr>               
                <td> <?php echo $data['kd_pembeli'];?></td>
                <td> <?php echo $data['nm_pembeli'];?></td>
                <td> <?php echo $data['jenis_kelamin'];?></td>
                <td> <?php echo $data['alamat'];?></td>
                <td> <?php echo $data['kota'];?></td>
                 </tr>    
       
            <?php } ?>


            <div class="tab-2">
             <form action="a.php" method="post">
                Nama Pembeli :<input type="text" name="nm_pembeli" id="pembeli">
                Jenis Kelamin :<input type="text" name="jenis_kelamin">
                Alamat :<input type="text" name="alamat" id="alamat" >
                Kota :<input type="text" name="kota" id="kota">
                
                <button id="btn_insert" name="insert" type="submit">Add</button>
            </form>

             <?php
               if (isset($_POST['insert'])) {
                    @$nm_pembeli=$_POST['nm_pembeli'];
                    @$jenis_kelamin=$_POST['jenis_kelamin'];
                    @$alamat=$_POST['alamat'];
                    @$kota=$_POST['kota'];

                    if($nm_pembeli=="" || $jenis_kelamin=="" || $alamat=="" || $kota=="" )
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into pembeli (nm_pembeli,jenis_kelamin,alamat,kota) values('$nm_pembeli','$jenis_kelamin','$alamat','$kota')";
 
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