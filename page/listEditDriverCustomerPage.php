<?php
    include '../component/sidebarCustomer.php';
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="d-flex">
            <h4 >DAFTAR DRIVER</h4>
            <form action="./addTransaksiPage.php" method="post">
                <button type="submit" style="margin-left: 720px" class="btn btn-danger" name="back">Back</button>
            </form>
        </div>
        
        <hr>
        <form action="./listDriverCustomerPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">ID Driver</th>
                <th scope="col">Nama Driver</th>
                <th scope="col">Spesialis Bahasa</th>
                <th scope="col">Tarif Driver</th>
                <th scope="col">Rating</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT format_driver, id_driver, nama_driver, bahasa, tarif_driver, rerata_rating_driver FROM driver WHERE status='Aktif' AND (nama_driver LIKE '%$search%' OR alamat_driver LIKE '%$search%') order by id_driver") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT format_driver, id_driver, nama_driver, bahasa, tarif_driver, rerata_rating_driver FROM driver WHERE status='Aktif' order by id_driver") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="8" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$data[0].''.$data[1].'</td>
                        <td>'.$data[2].'</td>';

                        if(empty($data[3]))
                            echo '<td>Indonesia</td>';
                        else
                            echo '<td>Inggris</td>';
                        
                        echo '<td>Rp '.$data[4].',00</td>';

                        if(empty($data[5]))
                            echo '<td>Kosong</td>';
                        else
                            echo '<td>'.$data[5].'</td>';
                            
                        echo'
                        <td style="padding-left: 0px !important">
                            <a href="../process/addEditTransaksiPageProcess.php?id_driver='.$data[1].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
                        </td>
                    </tr>';
                }
            }
        ?>
        </tbody>
        </table>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>