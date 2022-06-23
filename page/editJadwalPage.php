<?php
    include '../component/sidebarManager.php'
?>
<?php
    $id=$_GET['id'];
    $jadwal=$_GET['id_jadwal'];
    $query = mysqli_query($con, "SELECT dj.id_pegawai, p.nama_pegawai, r.nama_role, j.id_jadwal, j.hari, j.shift FROM detail_jadwal dj JOIN pegawai p ON (p.id_pegawai=dj.id_pegawai) JOIN jadwal j ON (j.id_jadwal=dj.id_jadwal) JOIN role r ON (r.id_role=p.id_role) WHERE dj.id_pegawai='$id' AND dj.id_jadwal='$jadwal'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT JADWAL</h4>
        
        <form action="../process/editJadwalProcess.php" method="post">
            <input type="hidden" name="id_pegawai" value="<?php echo $data[0]; ?>">
            <input type="hidden" name="id_jadwalcek" value="<?php echo $jadwal; ?>">
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
                    
                    <?php
                        $query = mysqli_query($con, "SELECT * FROM jadwal") or die(mysqli_error($con));
                        while($jadwal = mysqli_fetch_array($query)){
                            if($jadwal[0]==$data[3]){
                                echo'<option value="'.$jadwal[0].'" selected>'.$jadwal[1].' - Shift '.$jadwal[2].'</option>';
                            }
                            else
                                echo'<option value="'.$jadwal[0].'">'.$jadwal[1].' - Shift '.$jadwal[2].'</option>';
                        }
                    ?>
                </select>
            </div> 

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Jadwal</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    