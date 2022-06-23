<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $user=$_SESSION['user'];
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >DAFTAR PEGAWAI</h4>
        <hr>
        <form action="./listPegawaiPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
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
                $query = mysqli_query($con, "SELECT * FROM pegawai p JOIN role r ON (p.id_role = r.id_role) WHERE p.status_pegawai = 'Aktif' AND (p.nama_pegawai LIKE '%$search%' OR r.nama_role LIKE '%$search%' OR p.alamat_pegawai LIKE '%$search%') order by p.id_role") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT * FROM pegawai p JOIN role r ON (p.id_role = r.id_role) WHERE p.status_pegawai = 'Aktif' order by p.id_role") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="10" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[2].'</td>
                        <td>'.$data[12].'</td>';
                        if(empty($data[3])){
                            echo'<td>-</td>';
                        }else
                            echo'<td>'.$data[3].'</td>';

                        echo'
                        <td>'.$data[6].'</td>
                        <td>'.$data[7].'</td>
                        <td>'.$data[10].'</td>
                        <td style="padding-left: 0px !important">
                            <a href="./editPegawaiPage.php?id='.$data[0].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
                            <a href="../process/deletePegawaiProcess.php?id='.$data[0].'&id_pegawai_cek='.$user[0].'"
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