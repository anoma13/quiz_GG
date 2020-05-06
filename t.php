<?php

require 'dbconfig/config.php';

$query="SELECT * FROM transaksi, pembeli, barang where transaksi.kd_pembeli=pembeli.kd_pembeli or transaksi.kd_brg=barang.kd_brg";

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
                <td> <?php echo $data['kd_trx'];?></td>
                <td> <?php echo $data['date'];?></td>
                <td> <?php echo $data['nm_pembeli'];?></td>
                <td> <?php echo $data['nm_brg'];?></td>
                <td> <?php echo $data['harga'];?></td>
                 </tr>    
       
            <?php } ?>

        <div class="tab-2">
            <form action="t.php" method="post">
                kode barang :<input type="number" name="kdbrg" id="kdbrg" >
                Kode pembeli :<input type="number" name="kdpmbl" id="kdpmbl">
                Tanggal :<input type="date" name="tgl" id="tgl">


                <button id="btn_insert" name="insert" type="submit">Add</button>
            </form>
            

            <?php
               if (isset($_POST['insert'])) {
                    @$tanggal=$_POST['tgl'];
                    @$pbl=$_POST['kdpmbl'];
                    @$brg=$_POST['kdbrg'];

                    if($pbl=="" || $brg==""  || $tanggal=="" )
                    {
                        echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
                    }else{
                        $query = "insert into transaksi (kd_pembeli,kd_brg,date) values($pbl,$brg,'$tanggal')";
 
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