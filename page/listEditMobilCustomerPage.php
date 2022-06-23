<?php
    include '../component/sidebarCustomer.php';
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="d-flex">
            <h4 >DAFTAR MOBIL</h4>
            <form action="./addTransaksiPage.php" method="post">
                <button type="submit" style="margin-left: 720px" class="btn btn-danger" name="back">Back</button>
            </form>
        </div>
        <hr>
        <form action="./listMobilCustomerPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
        <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Tipe</th>
                <th scope="col">Jenis Transmisi</th>
                <th scope="col">Volume Bahan Bakar</th>
                <th scope="col">Warna</th>
                <th scope="col">Kapasitas</th>
                <th scope="col">Fasilitas</th>
                <th scope="col">Volume Bagasi</th>
                <th scope="col">Harga_Sewa</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT nama_mobil, tipe_mobil, jenis_transmisi, volume_bahan_bakar, warna, kapasitas, fasilitas, volume_bagasi, harga_sewa, id_mobil FROM mobil WHERE status_mobil ='Tersedia' AND (mb.nama_mobil LIKE '%$search%' OR mt.nama_pemilik LIKE '%$search%' OR mb.tipe_mobil LIKE '%$search%' OR mb.kategori_aset LIKE '%$search%')") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT nama_mobil, tipe_mobil, jenis_transmisi, volume_bahan_bakar, warna, kapasitas, fasilitas, volume_bagasi, harga_sewa, id_mobil FROM mobil WHERE status_mobil ='Tersedia'") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="11" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[0].'</td>
                        <td>'.$data[1].'</td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                        <td>'.$data[4].'</td>
                        <td>'.$data[5].'</td>';
                        if(empty($data[6]))
                        {
                            echo'<td>-</td>';
                        }
                        else{
                            echo'<td>'.$data[6].'</td>';
                        }

                        if(empty($data[7]))
                        {
                            echo'<td>-</td>';
                        }
                        else{
                            echo'<td>'.$data[7].'</td>';
                        }
                        
                        echo'
                            <td>Rp. '.$data[8].',00</td>';
                        echo'
                        <td style="padding-left: 0px !important">
                            <a href="../process/addEditTransaksiPageProcess.php?id_mobil='.$data[9].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
                        </td>
                    </tr>';
                $no++;
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