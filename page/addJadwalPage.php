<?php
    include '../component/sidebarManager.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT p.id_pegawai, p.nama_pegawai, r.nama_role FROM pegawai p JOIN role r ON (r.id_role=p.id_role) WHERE p.id_pegawai='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH JADWAL</h4>
        
        <form action="../process/createJadwalProcess.php" method="post">
            <input type="hidden" name="id_pegawai" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pegawai</label>
                <input required class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $data[1]?>" disabled aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                <input class="form-control" id="id_role" name="id_role" value="<?php echo $data[2]?>" disabled aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Hari</label>
                <select required class="form-select" aria-label="Default select example" name="id_jadwal" id="id_jadwal">
                    <option value="" selected hidden>Pilih Jadwal..</option>
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM jadwal") or die(mysqli_error($con));
                        while($jadwal = mysqli_fetch_array($query)){
                            echo'<option value="'.$jadwal[0].'">'.$jadwal[1].' - Shift '.$jadwal[2].'</option>';
                        }
                    ?>
                </select>
            </div> 

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Edit Jadwal</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    