<?php
    include '../component/sidebarManager.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM promo WHERE id_promo='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT PROMO</h4>
        
        <form action="../process/editPromoProcess.php" method="post">
            <input type="hidden" name="id_promo" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input required class="form-control" id="kode_promo" placeholder="Masukkan Kode Promo.." value="<?php echo $data[1]?>" name="kode_promo" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Diskon</label>
                <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukkan Persentase Diskon.." value="<?php echo $data[5]?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                <input class="form-control" placeholder="Masukkan Jenis Promo.." value="<?php echo $data[2]?>" id="jenis" name="jenis" required aria-describedby="emailHelp">
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <input class="form-control" placeholder="Masukkan Keterangan Promo.." value="<?php echo $data[3]?>" type="text" id="keterangan" name="keterangan" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status_promo" id="status_promo">
                    <?php
                        if($data[4]=="Aktif") {
                            echo'<option value="Aktif" selected>Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>';
                        }
                        else if($data[4]=="Tidak Aktif") {
                            echo'
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif" selected>Tidak Aktif</option>';
                        }
                    ?>
                </select>
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
    