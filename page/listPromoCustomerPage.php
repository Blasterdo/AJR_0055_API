<?php
    include '../component/sidebarCustomer.php';
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <div class="d-flex">
            <h4 >DAFTAR PROMO</h4>
            <form action="./addTransaksiPage.php" method="post">
                <button type="submit" style="margin-left: 720px" class="btn btn-danger" name="back">Back</button>
            </form>
        </div>

        <hr>
        <form action="./listPromoCustomerPage.php" method="post">
            <input class="form-control" type="search" id="search" name="search" placeholder="Cari.." value="<?php if(empty($_POST['search'])){echo'""';} else{echo $_POST['search'];}?>">
        </form>
            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Kode</th>
                <th scope="col">Diskon</th>
                <th scope="col">Jenis</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
        <tbody>
            <?php
            if(isset($_POST['search']))
            {
                $search = $_POST['search'];
                $query = mysqli_query($con, "SELECT * FROM promo WHERE status_promo='Aktif' AND (kode_promo LIKE '%$search%' OR jenis  LIKE '%$search%')") or die(mysqli_error($con));
            }
            else{
                $query = mysqli_query($con, "SELECT * FROM promo WHERE status_promo='Aktif'") or die(mysqli_error($con));
            }

            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="9" class="text-center"> Tidak ada data </td> </tr>';
            }else{
                $no = 1;
                while($data = mysqli_fetch_array($query)){
                echo'
                  <tr>
                        <th scope="row">'.$no.'</th>
                        <td>'.$data[1].'</td>
                        <td>'.$data[5].'%</td>
                        <td>'.$data[2].'</td>
                        <td>'.$data[3].'</td>
                        <td>'.$data[4].'</td>
                        <td style="padding-left: 0px !important">
                            <a href="../process/addTransaksiPageProcess.php?id_promo='.$data[0].'" onClick="return confirm ( \'Yakin mengedit data?\')"><i style="color: green" class="fa fa-edit"></i></a>
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