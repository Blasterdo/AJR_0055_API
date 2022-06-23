<?php
    include '../component/sidebarAdmin.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 5px 10px 18px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >TAMBAH DRIVER</h4>
        <hr>
        <form action="../process/createDriverProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input required class="form-control" id="nama_driver" placeholder="Masukkan Nama.." name="nama_driver" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat_driver" name="alamat_driver" placeholder="Masukkan Alamat.." aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" id="tgl_lahir_driver" name="tgl_lahir_driver" min="1945-01-01" max="<?php echo date("Y-m-d");?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan Email.." id="email_driver" name="email_driver" required aria-describedby="emailHelp">
                <small>Cth:example@example.com</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" placeholder="Masukkan Nomor telepon.." id="no_telp_driver" name="no_telp_driver" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                <small>Format:08xx... (xx... 8-10 digit)</small>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                <br>
                <input checked type="radio" id="indonesia" name="bahasa" value="0">
                <label for="indonesia">Indonesia</label><br>
                <input type="radio" id="inggris" name="bahasa" value="1">
                <label for="inggris">Inggris</label><br>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select required class="form-select" aria-label="Default select example" name="jenis_kelamin_driver" id="jenis_kelamin_pegawai" required>
                    <option value="" selected hidden>Jenis Kelamin Anda..</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tarif Driver</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                    <input type="number" class="form-control" id="tarif_driver" name="tarif_driver" placeholder="Masukkan Tarif Driver" required>
                </div>
                <small>Tanpa titik(.) atau koma(,)</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM driver</label>
                <input class="form-control" type="text" id="sim_driver" name="sim_driver" placeholder="Masukkan Link Foto SIM.." required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Napza Driver</label>
                <input class="form-control" type="text" id="napza_driver" name="napza_driver" placeholder="Masukkan Link Foto Napza.." required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jiwa Driver</label>
                <input class="form-control" type="text" id="surat_jiwa_driver" name="surat_jiwa_driver" placeholder="Masukkan Link Foto Surat Jiwa.." required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jasmani Driver</label>
                <input class="form-control" type="text" id="surat_jasmani_driver" name="surat_jasmani_driver" placeholder="Masukkan Link Surat Jasmani.." required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SKCK Driver</label>
                <input class="form-control" type="text" id="skck_driver" name="skck_driver" placeholder="Masukkan Link Foto SKCK.." required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Tambah Driver</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>