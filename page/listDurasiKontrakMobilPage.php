<?php
    include '../component/sidebarAdmin.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >DAFTAR MOBIL</h4>
        <hr>
        <form action="./listDurasiKontrakMobilPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
        <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Mobil</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Periode Mulai</th>
                <th scope="col">Periode Selesai</th>
                <th scope="col">Durasi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT mb.id_mobil, mb.nama_mobil, mb.periode_mulai, mb.periode_akhir, mb.status_mobil, mt.nama_pemilik, mt.no_telp_pemilik, DATEDIFF(mb.periode_akhir, CURRENT_DATE) AS durasi FROM mobil mb JOIN mitra mt ON (mb.id_pemilik = mt.id_pemilik) WHERE mb.status_mobil !='Berhenti' AND (mb.nama_mobil LIKE '%$search%' OR mt.nama_pemilik LIKE '%$search%') ORDER BY `durasi`") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT mb.id_mobil, mb.nama_mobil, mb.periode_mulai, mb.periode_akhir, mb.status_mobil, mt.nama_pemilik, mt.no_telp_pemilik, DATEDIFF(mb.periode_akhir, CURRENT_DATE) AS durasi FROM mobil mb JOIN mitra mt ON (mb.id_pemilik = mt.id_pemilik) WHERE mb.status_mobil !='Berhenti' ORDER BY `durasi`") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="11" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[1].'</td>
                        <td>'.$data[5].'</td>
                        <td>'.$data[6].'</td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                        <td>'.$data[7].' Hari</td>
                        <td>'.$data[4].'</td>
                        <td style="padding-left: 0px !important">
                            <form action="./editDurasiKontrakMobilPage.php?id='.$data[0].'" method="post">';
                        
                            if($data[7]<=0)
                            {
                                echo'<button type="submit" class="btn btn-outline-danger">Tambah Durasi Periode Kontrak</button>';
                            }
                            else if($data[7]<=30)
                            {
                                echo'<button type="submit" class="btn btn-outline-info">Tambah Durasi Periode Kontrak</button>';
                            }
                            echo'
                            </form>
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