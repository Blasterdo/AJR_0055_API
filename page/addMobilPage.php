<?php
    include '../component/sidebarAdmin.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >TAMBAH MOBIL</h4>
        <hr>
        <form action="../process/createMobilProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Plat Kendaraan</label>
                <input class="form-control" id="no_plat" name="no_plat" placeholder="Masukkan Plat No.." aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor STNK</label>
                <input class="form-control" id="nomor_stnk" name="nomor_stnk" placeholder="Masukkan Nomor STNK.." aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input class="form-control" id="nama_mobil" name="nama_mobil" placeholder="Masukkan Nama Mobil" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                <input class="form-control" id="tipe_mobil" name="tipe_mobil" placeholder="Masukkan Tipe Mobil" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                <input class="form-control" id="jenis_transmisi" name="jenis_transmisi" placeholder="Masukkan Jenis Transmisi" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                <input type="number" class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" placeholder="Masukkan Volume Bahan Bakar" required>
                <small>Dalam satuan liter</small>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna</label>
                <input class="form-control" id="warna" name="warna" placeholder="Masukkan Warna Mobil" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kapasitas</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukkan Jumlah Maksimal Kapasitas Penumpang" min="1" max="10" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fasilitas</label><br>
                <input type="checkbox" id="fasilitas1" name="fasilitas[]" value="AC">
                <label for="fasilitas1"> AC</label><br>
                <input type="checkbox" id="fasilitas2" name="fasilitas[]" value="Multimedia">
                <label for="fasilitas2"> Multimedia</label><br>
                <input type="checkbox" id="fasilitas3" name="fasilitas[]" value="Air Bag">
                <label for="fasilitas3"> Safety (Air Bag)</label>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                <input type="number" class="form-control" id="volume_bagasi" name="volume_bagasi" placeholder="Masukkan Volume Bagasi">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                    <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" placeholder="Masukkan Harga Sewa" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                <input class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" placeholder="Masukkan Jenis Bahan Bakar" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Tambah Mobil</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>