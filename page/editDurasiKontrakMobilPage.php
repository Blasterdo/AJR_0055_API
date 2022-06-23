<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT mb.id_mobil, mb.nama_mobil, mb.periode_mulai, mb.periode_akhir, mt.nama_pemilik FROM mobil mb JOIN mitra mt ON (mt.id_pemilik=mb.id_pemilik) WHERE mb.id_mobil='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH DURASI KONTRAK</h4>
        
        <form action="../process/editDurasiKontrakProcess.php" method="post">
            <input type="hidden" name="id_mobil" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input disabled class="form-control" value="<?php echo $data[1]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Pemilik</label>
                <input disabled class="form-control" value="<?php echo $data[4]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Kontrak</label>
                <input disabled class="form-control" type="date" value="<?php echo $data[2]?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Akhir Kontrak</label>
                <input class="form-control" type="date" id="periode_akhir" value="<?php echo $data[3]?>" name="periode_akhir" min="1945-01-01" max="2025-12-31" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Kontrak</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    