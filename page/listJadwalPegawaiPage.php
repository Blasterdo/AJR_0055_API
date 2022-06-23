<?php
    include '../component/sidebarManager.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >DAFTAR JADWAL PEGAWAI</h4>
        <hr>

        <form action="./listJadwalPegawaiPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Hari</th>
                <th scope="col">Shift</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT p.nama_pegawai, r.nama_role, j.hari, j.shift, dj.id_pegawai, dj.id_jadwal FROM detail_jadwal dj JOIN pegawai p ON (p.id_pegawai=dj.id_pegawai) JOIN jadwal j ON (j.id_jadwal=dj.id_jadwal) JOIN role r ON (r.id_role=p.id_role) WHERE p.nama_pegawai LIKE '%$search%' OR r.nama_role LIKE '%$search%' OR j.hari LIKE '%$search%' OR j.shift LIKE '%$search%' order by r.id_role") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT p.nama_pegawai, r.nama_role, j.hari, j.shift, dj.id_pegawai, dj.id_jadwal FROM detail_jadwal dj JOIN pegawai p ON (p.id_pegawai=dj.id_pegawai) JOIN jadwal j ON (j.id_jadwal=dj.id_jadwal) JOIN role r ON (r.id_role=p.id_role) order by r.id_role") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7" class="text-center"> Tidak ada data </td> </tr>';
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
                        <td style="padding-left: 0px !important">
                            <a href="./editJadwalPage.php?id='.$data[4].'&id_jadwal='.$data[5].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
                            <a href="../process/deleteJadwalProcess.php?id='.$data[4].'&id_jadwal='.$data[5].'"
                                onClick="return confirm ( \'Yakin menghapus data?\')">
                                <i style="color: red" class="fa fa-trash"></i>
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