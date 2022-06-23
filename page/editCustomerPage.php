<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT CUSTOMER</h4>
        
        <form action="../process/editCustomerProcess.php" method="post">
            <input type="hidden" name="id_customer" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" value="<?php echo $data[2]?>" placeholder="Masukkan Nama.." id="nama" name="nama" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" value="<?php echo $data[3]?>" placeholder="Masukkan Alamat.." id="alamat" name="alamat" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" value="<?php echo $data[4]?>" type="date" id="tgl_lahir_customer" name="tgl_lahir_customer" min="1945-01-01" max="<?php echo date("Y-m-d"); ?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <input class="form-control" disabled value="<?php echo $data[5]?>" placeholder="Pilih Jenis Kelamin.." id="alamat" name="alamat" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" disabled value="<?php echo $data[6]?>" class="form-control" placeholder="Masukkan Email.." id="email" name="email" required aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" value="<?php echo $data[7]?>" placeholder="Masukkan Nomor telepon.." id="nomor_telepon" name="nomor_telepon" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                <small>Format:08xx...(xx... 8-10 digit)</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM</label>
                <input type="url" class="form-control" value="<?php echo $data[8]?>" placeholder="Masukkan Link Foto SIM.." id="sim" name="sim" aria-describedby="emailHelp">
                <small>Maksimal linknya 100 kata</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanda Pengenal</label>
                <input type="url" class="form-control" value="<?php echo $data[9]?>" placeholder="Masukkan Link Tanda Pengenal Kartu Pelajar/KTP" id="tanda_pengenal" name="tanda_pengenal" aria-describedby="emailHelp">
                <small>Maksimal linknya 100 kata</small>
            </div>

            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM</label>
                <input type="tel" class="form-control" value="<?php echo $data[8]?>" placeholder="Masukkan Nomor SIM.." id="sim" name="sim" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanda Pengenal</label>
                <select required class="form-select" aria-label="Default select example" name="tanda_pengenal" id="tanda_pengenal">
                </select>
            </div> -->

            <div class="d-grid gap-2">
                <button required type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Customer</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    