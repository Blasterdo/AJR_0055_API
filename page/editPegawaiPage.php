<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM pegawai p JOIN role r ON (p.id_role=r.id_role) WHERE id_pegawai='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT PEGAWAI</h4>
        
        <form action="../process/editPegawaiProcess.php" method="post">
            <input type="hidden" name="id_pegawai" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $data[2]?>" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                <input class="form-control" disabled value="<?php echo $data[12]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat_pegawai" name="alamat_pegawai" value="<?php echo $data[3]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" disabled value="<?php echo $data[4]?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <input class="form-control" disabled value="<?php echo $data[5]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" disabled value="<?php echo $data[6]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" id="no_telp_pegawai" name="no_telp_pegawai" value="<?php echo $data[7]?>" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                <small>Format:08xx... (xx... 8-10 digit)</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto</label>
                <input type="url" class="form-control" type="text" id="foto_pegawai" name="foto_pegawai" placeholder="Masukkan Link Foto Pegawai.." value="<?php echo $data[8]?>">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Pegawai</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    