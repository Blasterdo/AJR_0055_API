<?php
    include '../component/sidebarAdmin.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >TAMBAH PEGAWAI</h4>
        <hr>
        <form action="../process/createPegawaiProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input required class="form-control" id="nama_pegawai" placeholder="Masukkan Nama.." name="nama_pegawai" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                <select required class="form-select" aria-label="Default select example" name="id_role" id="id_role">
                    <option value="" selected hidden>Pilih Jabatan</option>
                    <option value="1">Manager</option>
                    <option value="2">Admin</option>
                    <option value="3">Customer Service</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Masukkan Alamat.." aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" id="tgl_lahir_pegawai" name="tgl_lahir_pegawai" min="1945-01-01" max="<?php echo date("Y-m-d"); ?>" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select required class="form-select" aria-label="Default select example" name="jenis_kelamin_pegawai" id="jenis_kelamin_pegawai">
                    <option value="" selected hidden>Jenis Kelamin Anda..</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Masukkan Email.." id="email_pegawai" name="email_pegawai" required aria-describedby="emailHelp">
                <small>Cth:example@example.com</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input type="tel" class="form-control" placeholder="Masukkan Nomor telepon.." id="no_telp_pegawai" name="no_telp_pegawai" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                <small>Format:08xx... (xx... 8-10 digit)</small>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link Foto</label>
                <input type="url" class="form-control" type="text" id="foto_pegawai" name="foto_pegawai" placeholder="Masukkan Link Foto Pegawai..">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Tambah Pegawai</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>