<?php
    include '../component/sidebarCS.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>NOTA PEMBAYARAN</h4>
        <hr>
        <form action="./notaCSPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Nama Mobil</th>
                    <th scope="col">Nama Driver</th>
                    <th scope="col">Kode Promo</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT t.format_transaksi, t.id_transaksi, c.format_customer, c.id_customer, c.nama, p.nama_pegawai, m.nama_mobil, d.nama_driver, pr.kode_promo, c.no_telp_customer, t.status_transaksi FROM customer c 
                JOIN transaksi t ON (c.id_customer = t.id_customer) JOIN mobil m ON (m.id_mobil=t.id_mobil) LEFT JOIN driver d ON (d.id_driver=t.id_driver) LEFT JOIN promo pr ON (pr.id_promo=t.id_promo) LEFT JOIN pegawai p ON (p.id_pegawai=t.id_pegawai)
                WHERE t.status_transaksi = 'Selesai' AND (c.nama LIKE '%$search%' OR p.nama_pegawai LIKE '%$search%' OR m.nama_mobil LIKE '%$search%' OR pr.kode_promo LIKE '%$search%') order by t.id_transaksi") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT t.format_transaksi, t.id_transaksi, c.format_customer, c.id_customer, c.nama, p.nama_pegawai, m.nama_mobil, d.nama_driver, pr.kode_promo, c.no_telp_customer, t.status_transaksi FROM customer c 
                JOIN transaksi t ON (c.id_customer = t.id_customer) JOIN mobil m ON (m.id_mobil=t.id_mobil) LEFT JOIN driver d ON (d.id_driver=t.id_driver) LEFT JOIN promo pr ON (pr.id_promo=t.id_promo) LEFT JOIN pegawai p ON (p.id_pegawai=t.id_pegawai)
                WHERE t.status_transaksi = 'Selesai' order by t.id_transaksi") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="10" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[0].''.$data[1].'</td>
                        <td>'.$data[2].''.$data[3].'</td>
                        <td>'.$data[4].'</td>
                        <td>'.$data[5].'</td>
                        <td>'.$data[6].'</td>';
                        if(empty($data[7])){
                            echo '<td>-</td>';
                        }
                        else{
                            echo '<td>'.$data[7].'</td>';
                        }
                        
                        if(empty($data[8])){
                            echo '<td>-</td>';
                        }
                        else{
                            echo '<td>'.$data[8].'</td>';
                        }echo'
                        <td>'.$data[9].'</td>
                        <td>'.$data[10].'</td>
                        <td>
                            <a href="./cetakNotaPage.php?id='.$data[1].'"
                                onClick="return confirm ( \'Apakah anda yakin mencetak transaksi ini?\')">
                                <i style="color: black" class="fa fa-print"></i>
                            </a>
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