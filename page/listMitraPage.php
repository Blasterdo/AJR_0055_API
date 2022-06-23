<?php
    include '../component/sidebarAdmin.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >DAFTAR MITRA</h4>
        <hr>
        <form action="./listMitraPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Nomor KTP</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT * FROM mitra WHERE status_mitra != 'Berhenti' AND (nama_pemilik LIKE '%$search%' OR alamat_pemilik LIKE '%$search%')") or die(mysqli_error($con));
            }
            else
                $query = mysqli_query($con, "SELECT * FROM mitra WHERE status_mitra != 'Berhenti'") or die(mysqli_error($con));

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="8" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                    <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[1].'</td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                        <td>'.$data[4].'</td>
                        <td style="padding-left: 0px !important">
                            <a href="./addMobilKontrakPage.php?id='.$data[0].'"><i style="color: blue" class="fa fa-plus"></i></a>
                            <a href="./editMitraPage.php?id='.$data[0].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
                            <a href="../process/deleteMitraProcess.php?id='.$data[0].'"
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