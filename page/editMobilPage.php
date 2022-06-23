<?php
    include '../component/sidebarAdmin.php'
?>
<?php
    $id=$_GET['id'];
    $query = mysqli_query($con, "SELECT * FROM mobil mb LEFT JOIN mitra mt ON (mb.id_pemilik = mt.id_pemilik) WHERE id_mobil='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query); 
    $fa= explode(', ', $data[10]);

    if($data[1]==NULL)
    {
        echo'
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
            <h4 >EDIT MOBIL</h4>
            <hr>
            <form action="../process/editMobilProcess.php" method="post">
                <input type="hidden" name="id_mobil" value="'.$data[0].'">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Plat Kendaraan</label>
                    <input class="form-control" id="no_plat" name="no_plat" value="'.$data[2].'" placeholder="Masukkan Plat No.." aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor STNK</label>
                    <input class="form-control" id="nomor_stnk" name="nomor_stnk" value="'.$data[3].'" placeholder="Masukkan Nomor STNK.." aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                    <input class="form-control" id="nama_mobil" name="nama_mobil" value="'.$data[4].'" placeholder="Masukkan Nama Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                    <input class="form-control" id="tipe_mobil" name="tipe_mobil" value="'.$data[5].'" placeholder="Masukkan Tipe Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                    <input class="form-control" id="jenis_transmisi" name="jenis_transmisi" value="'.$data[6].'" placeholder="Masukkan Jenis Transmisi" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                    <input type="number" class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" value="'.$data[7].'" placeholder="Masukkan Volume Bahan Bakar" required>
                    <small>Dalam satuan liter</small>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Warna</label>
                    <input class="form-control" id="warna" name="warna" value="'.$data[8].'" placeholder="Masukkan Warna Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="'.$data[9].'" placeholder="Masukkan Jumlah Maksimal Kapasitas Penumpang" min="1" max="10" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fasilitas</label><br>';
                    if(in_array("AC", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas1" name="fasilitas[]" value="AC">
                            <label for="fasilitas1"> AC</label><br>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas1" name="fasilitas[]" value="AC">
                            <label for="fasilitas1"> AC</label><br>';
                    }
                    if(in_array("Multimedia", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas2" name="fasilitas[]" value="Multimedia">
                            <label for="fasilitas2"> Multimedia</label><br>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas2" name="fasilitas[]" value="Multimedia">
                            <label for="fasilitas2"> Multimedia</label><br>';
                    }
                    if(in_array("Air Bag", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas3" name="fasilitas[]" value="Air Bag">
                            <label for="fasilitas3"> Safety (Air Bag)</label>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas3" name="fasilitas[]" value="Air Bag">
                            <label for="fasilitas3"> Safety (Air Bag)</label>';
                    }
                echo'
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                    <input type="number" class="form-control" id="volume_bagasi" name="volume_bagasi" value="'.$data[15].'" placeholder="Masukkan Volume Bagasi">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                        <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="'.$data[16].'" placeholder="Masukkan Harga Sewa" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                    <input class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" value="'.$data[18].'" placeholder="Masukkan Jenis Bahan Bakar" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" onClick="return confirm (\'Yakin mengedit data?\')"name="edit">Tambah Mobil</button>
                </div>
                </form>
            </div>
            </aside>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
            MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
    </html>
        ';
    }
    else
    {
        echo'
        <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
            <h4 >EDIT MOBIL</h4>
            <hr>
            <form action="../process/editMobilProcess.php" method="post">
                <input type="hidden" name="id_mobil" value="'.$data[0].'">
                <input type="hidden" name="id_pemilik" value="'.$data[1].'">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Plat Kendaraan</label>
                    <input class="form-control" id="no_plat" name="no_plat" value="'.$data[2].'" placeholder="Masukkan Plat No.." aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor STNK</label>
                    <input class="form-control" id="nomor_stnk" name="nomor_stnk" value="'.$data[3].'" placeholder="Masukkan Nomor STNK.." aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                    <input class="form-control" id="nama_mobil" name="nama_mobil" value="'.$data[4].'" placeholder="Masukkan Nama Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pemilik</label>
                    <input required class="form-control" value="'.$data[20].'" disabled aria-describedby="emailHelp">
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                    <input class="form-control" id="tipe_mobil" name="tipe_mobil" value="'.$data[5].'" placeholder="Masukkan Tipe Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                    <input class="form-control" id="jenis_transmisi" name="jenis_transmisi" value="'.$data[6].'" placeholder="Masukkan Jenis Transmisi" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                    <input type="number" class="form-control" id="volume_bahan_bakar" name="volume_bahan_bakar" value="'.$data[7].'" placeholder="Masukkan Volume Bahan Bakar" required>
                    <small>Dalam satuan liter</small>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Warna</label>
                    <input class="form-control" id="warna" name="warna" value="'.$data[8].'" placeholder="Masukkan Warna Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kapasitas</label>
                    <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="'.$data[9].'" placeholder="Masukkan Jumlah Maksimal Kapasitas Penumpang" min="1" max="10" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fasilitas</label><br>';
                    if(in_array("AC", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas1" name="fasilitas[]" value="AC">
                            <label for="fasilitas1"> AC</label><br>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas1" name="fasilitas[]" value="AC">
                            <label for="fasilitas1"> AC</label><br>';
                    }
                    if(in_array("Multimedia", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas2" name="fasilitas[]" value="Multimedia">
                            <label for="fasilitas2"> Multimedia</label><br>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas2" name="fasilitas[]" value="Multimedia">
                            <label for="fasilitas2"> Multimedia</label><br>';
                    }
                    if(in_array("Air Bag", $fa)){
                        echo'
                            <input checked type="checkbox" id="fasilitas3" name="fasilitas[]" value="Air Bag">
                            <label for="fasilitas3"> Safety (Air Bag)</label>';
                    }
                    else
                    {
                        echo'
                            <input type="checkbox" id="fasilitas3" name="fasilitas[]" value="Air Bag">
                            <label for="fasilitas3"> Safety (Air Bag)</label>';
                    }
                echo'
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Kontrak</label>
                    <input class="form-control" type="date" id="periode_mulai" value="'.$data[12].'" name="periode_mulai" min="1945-01-01" max="2025-12-31" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Akhir Kontrak</label>
                    <input class="form-control" type="date" id="periode_akhir" value="'.$data[13].'" name="periode_akhir" min="1945-01-01" max="2025-12-31" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Servis</label>
                    <input class="form-control" type="date" id="tanggal_terakhir_servis" value="'.$data[14].'" name="tanggal_terakhir_servis" min="1945-01-01" max="2025-12-31" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                    <input type="number" class="form-control" id="volume_bagasi" name="volume_bagasi" value="'.$data[15].'" placeholder="Masukkan Volume Bagasi">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                        <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" value="'.$data[16].'" placeholder="Masukkan Harga Sewa" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                    <input class="form-control" id="jenis_bahan_bakar" name="jenis_bahan_bakar" value="'.$data[18].'" placeholder="Masukkan Jenis Bahan Bakar" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" onClick="return confirm (\'Yakin mengedit data?\')" name="edit">Tambah Mobil</button>
                </div>
                </form>
            </div>
            </aside>
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
            MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
    </html>
        ';
    }
?>