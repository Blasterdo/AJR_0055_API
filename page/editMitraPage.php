<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM mitra WHERE id_pemilik='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT MITRA</h4>
        
        <form action="../process/editMitraProcess.php" method="post">
            <input type="hidden" name="id_pemilik" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input required class="form-control" id="nama_pemilik" placeholder="Masukkan Nama.." name="nama_pemilik" value="<?php echo $data[1]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat_pemilik" name="alamat_pemilik" placeholder="Masukkan Alamat.." value="<?php echo $data[2]?>" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" placeholder="Masukkan Nomor telepon.." id="no_telp_pemilik" name="no_telp_pemilik" required pattern="[0]{1}[8]{1}[0-9]{8,10}" value="<?php echo $data[3]?>" aria-describedby="emailHelp">
                <small>Format:08xx... (xx... 8-10 digit)</small>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor KTP</label>
                <input disabled class="form-control" type="number" id="no_ktp_pemilik" name="no_ktp_pemilik" value="<?php echo $data[4]?>" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Mitra</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    