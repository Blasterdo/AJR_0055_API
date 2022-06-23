<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM driver WHERE id_driver='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT DRIVER</h4>
        
        <form action="../process/editDriverProcess.php" method="post">
            <input type="hidden" name="id_driver" value="<?php echo $data[0]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input required class="form-control" id="nama_driver" value="<?php echo $data[2]?>" placeholder="Masukkan Nama.." name="nama_driver" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat_driver" name="alamat_driver" value="<?php echo $data[3]?>" placeholder="Masukkan Alamat.." aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input disabled type="date" class="form-control" id="tgl_lahir_driver" value="<?php echo $data[4]?>" name="tgl_lahir_driver" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" value="<?php echo $data[6]?>" placeholder="Masukkan Nomor telepon.." id="no_telp_driver" name="no_telp_driver" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                <small>Format:08xx...(xx... 8-10 digit)</small>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                <br>
                <?php
                if($data[7]==0)
                {
                    echo' 
                    <input checked type="radio" id="indonesia" name="bahasa" value="0">
                    <label for="indonesia">Indonesia</label><br>
                    <input type="radio" id="inggris" name="bahasa" value="1">
                    <label for="inggris">Inggris</label><br>';
                }else{
                    echo'
                    <input type="radio" id="indonesia" name="bahasa" value="0">
                    <label for="indonesia">Indonesia</label><br>
                    <input checked type="radio" id="inggris" name="bahasa" value="1">
                    <label for="inggris">Inggris</label><br>';
                }
                ?>
            </div>
                
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tarif Driver</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                    <input type="number" class="form-control" value="<?php echo $data[10]?>" id="tarif_driver" name="tarif_driver" placeholder="Masukkan Tarif Driver" required>
                </div>
                <small>Tanpa titik(.) atau koma(,)</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM driver</label>
                <input type="url" class="form-control" type="text" id="sim_driver" name="sim_driver" value="<?php echo $data[12]?>" placeholder="Masukkan Link Foto SIM.." required>
                <div>
                    <img class="img-thumbnail" width="25%" src="<?php echo $data[12]?>" alt="Not Found"> 
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Napza Driver</label>
                <input type="url" class="form-control" type="text" id="napza_driver" name="napza_driver" value="<?php echo $data[13]?>" placeholder="Masukkan Link Foto Napza.." required>
                <div>
                    <img class="img-thumbnail" width="25%" src="<?php echo $data[13]?>" alt="Not Found"> 
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jiwa Driver</label>
                <input type="url" class="form-control" type="text" id="surat_jiwa_driver" name="surat_jiwa_driver" value="<?php echo $data[14]?>" placeholder="Masukkan Link Foto Surat Jiwa.." required>
                <div>
                    <img class="img-thumbnail" width="25%" src="<?php echo $data[14]?>" alt="Not Found"> 
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jasmani Driver</label>
                <input type="url" class="form-control" type="text" id="surat_jasmani_driver" name="surat_jasmani_driver" value="<?php echo $data[15]?>" placeholder="Masukkan Link Surat Jasmani.." required>
                <div>
                    <img class="img-thumbnail" width="25%" src="<?php echo $data[15]?>" alt="Not Found"> 
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SKCK Driver</label>
                <input type="url" class="form-control" type="text" id="skck_driver" name="skck_driver" value="<?php echo $data[16]?>" placeholder="Masukkan Link Foto SKCK.." required>
                <div>
                    <img class="img-thumbnail" width="25%" src="<?php echo $data[16]?>" alt="Not Found"> 
                </div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin mengedit data?')" name="edit">Edit Driver</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    