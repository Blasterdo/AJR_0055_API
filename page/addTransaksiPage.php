<?php
    include('../db.php');
    
    include '../component/sidebarCustomer.php';

    $user=$_SESSION['user'];
    $cek=mysqli_query($con, "SELECT * FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi!='Selesai'") or die(mysqli_error($con));
    if(mysqli_num_rows($cek)!=0){
        $cek2=mysqli_query($con, "SELECT * FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Sudah diverifikasi' ORDER BY id_transaksi") or die(mysqli_error($con));
        $cek3=mysqli_query($con, "SELECT * FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Belum membayar'") or die(mysqli_error($con));
        $cek4=mysqli_query($con, "SELECT * FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Sudah membayar'") or die(mysqli_error($con));
        if(mysqli_num_rows($cek2)!=0)
        {
            echo
                '<script>
                window.location = "./editTransaksiStatusPage.php"
                </script>';
        }
        else if(mysqli_num_rows($cek3)!=0)
        {
            echo
                '<script>
                alert("Silahkan membayar transaksi yang sedang berjalan terlebih dahulu"); window.location = "./pembayaranTransaksiPage.php"
                </script>';
        }
        else if(mysqli_num_rows($cek4)!=0)
        {
            echo
                '<script>
                alert("Masih menunggu proses verifikasi dari CS"); window.location = "./profilCustomerPage.php"
                </script>';
        }
        else
        {
            $dataTransaksi=mysqli_fetch_array($cek);
            $queryMobil=mysqli_query($con, "SELECT * FROM mobil m JOIN transaksi t ON (m.id_mobil=t.id_mobil) WHERE id_transaksi='$dataTransaksi[0]' AND status_transaksi!='Selesai'") or die(mysqli_error($con));
            
            $_SESSION['mobil'] = mysqli_fetch_array($queryMobil);
            $queryDriver=mysqli_query($con, "SELECT * FROM driver d LEFT JOIN transaksi t ON (d.id_driver=t.id_driver) WHERE id_transaksi='$dataTransaksi[0]' AND status_transaksi!='Selesai'") or die(mysqli_error($con));
            $_SESSION['driver'] = mysqli_fetch_array($queryDriver);
            
            $queryPromo=mysqli_query($con, "SELECT * FROM promo p LEFT JOIN transaksi t ON (p.id_promo=t.id_promo) WHERE id_transaksi='$dataTransaksi[0]' AND status_transaksi!='Selesai'") or die(mysqli_error($con));
            $_SESSION['promo'] = mysqli_fetch_array($queryPromo);
            
            echo
                '<script>
                window.location = "./editTransaksiPage.php"
                </script>';
        }
    }
        
?>
<?php
    $mobil=$_SESSION['mobil'];
    $driver=$_SESSION['driver'];
    $promo=$_SESSION['promo'];
    $query=mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >TAMBAH TRANSAKSI</h4>
        <hr>
        <form action="../process/createTransaksiProcess.php" method="post">
            <input type="hidden" name="id_customer" value="<?php echo $user[0]; ?>">
            <?php
                if(empty($driver)){
                    echo '<input type="hidden" name="id_driver" value="">';
                }
                else
                    echo '<input type="hidden" name="id_driver" value="'.$driver[0].'">';

                if(empty($mobil)){
                    echo '<input type="hidden" name="id_mobil" value="">';
                }
                else
                    echo '<input type="hidden" name="id_mobil" value="'.$mobil[0].'">';

                if(empty($promo)){
                    echo '<input type="hidden" name="id_promo" value="">';
                }
                else
                    echo '<input type="hidden" name="id_promo" value="'.$promo[0].'">';
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                <input disabled value="<?php echo $user[1]?><?php echo $user[0]?> | <?php echo $user[2]?>" class="form-control" id="nama" placeholder="Masukkan Nama.." name="nama" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input disabled required class="form-control" placeholder="Pilih Mobil.." value="<?php if(!(empty($mobil))){echo $mobil[4];}?>"  id="nama_mobil" name="nama_mobil" aria-describedby="emailHelp">
                <button onclick="window.location.href = './listMobilCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Mobil</button>
                <button <?php if(!(empty($mobil))){}else{ echo 'hidden'; }?> id="btnMobil" onclick="window.location.href = '../process/deleteTransaksiPageProcess.php?id_mobil=<?php echo $mobil[0]?>'" type="submit" name="resetMobil" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Driver</label>
                <input disabled class="form-control" placeholder="Pilih Driver.." value="<?php if(!(empty($driver))){echo $driver[2];}?>" id="nama_driver" name="nama_driver" aria-describedby="emailHelp">
                <button onclick="window.location.href = './listDriverCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Driver</button>
                <button id="btnRandom" name="btnRandom" onclick="window.location.href = '../process/randomDriverProcess.php<?php if(empty($driver)){} else{echo '?id_driver='.$driver[0].'';}?>'" type="button" class="btn btn-primary btn-sm mt-2">Random</button>
                <button <?php if(!(empty($driver))){}else{ echo 'hidden'; }?> id="btnDriver" onclick="window.location.href = '../process/deleteTransaksiPageProcess.php?id_driver=<?php echo $driver[0]?>'" name="resetDriver" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input disabled class="form-control" placeholder="Pilih Promo.." value="<?php if(!(empty($promo))){echo ''.$promo[1].' - '.$promo[2].' - '.$promo[5].'%';}?>" id="kode_promo" name="kode_promo" aria-describedby="emailHelp">
                <button onclick="window.location.href = './listPromoCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Promo</button>
                <button <?php if(!(empty($promo))){}else{ echo 'hidden'; }?> id="btnPromo" onclick="window.location.href = '../process/deleteTransaksiPageProcess.php?id_promo=<?php echo $promo[0]?>'" name="resetPromo" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div>
            
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input class="form-control" placeholder="Masukkan Kode Promo" id="kode_promo" name="kode_promo">
            </div> -->

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Peminjaman</label>
                <input class="form-control" type="datetime-local" id="tgl_waktu_mulai" name="tgl_waktu_mulai" min="<?php echo date("Y-m-d\TH:i"); ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Peminjaman</label>
                <input class="form-control" type="datetime-local" id="tgl_waktu_selesai" name="tgl_waktu_selesai" min="<?php echo date("Y-m-d\TH:i"); ?>" max="2025-12-31" required>
                <small style="color: red;">perhitungan hari akan dibulatkan keatas! pastikan sudah mengestimasi waktunya dengan benar</small>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Tambah Transaksi</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
    </body>
</html>