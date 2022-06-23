<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    $user=$_SESSION['user'];
    $mobil=$_SESSION['mobil'];
    $driver=$_SESSION['driver'];
    $promo=$_SESSION['promo'];
    $query=mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);

    $queryTransaksi=mysqli_query($con, "SELECT p.kode_promo, t.tgl_waktu_mulai, t.tgl_waktu_selesai, t.status_transaksi, t.id_transaksi FROM transaksi t LEFT JOIN promo p ON (t.id_promo=p.id_promo) WHERE id_customer='$user[0]' AND status_transaksi!='Selesai'") or die(mysqli_error($con));
    $data=mysqli_fetch_array($queryTransaksi);
    $tgl_waktu_mulai=date('Y-m-d\TH:i:s', strtotime($data[1]));
    $tgl_waktu_selesai=date('Y-m-d\TH:i:s', strtotime($data[2]));
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>EDIT TRANSAKSI</h4>
        <hr>
        <form action="../process/editTransaksiProcess.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?php echo $data[4]; ?>">
            <input type="hidden" name="id_customer" value="<?php echo $user[0]; ?>">
            <input type="hidden" name="status_transaksi" value="<?php echo $data[3];?>">
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
                <button onclick="window.location.href = './listEditMobilCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Mobil</button>
                <button <?php if(!(empty($mobil))){}else{ echo 'hidden'; }?> id="btnMobil" onclick="window.location.href = '../process/deleteTransaksiPageProcess2.php?id_mobil=<?php echo $mobil[0]?>'" type="submit" name="resetMobil" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Driver</label>
                <input disabled class="form-control" placeholder="Pilih Driver.." value="<?php if(!(empty($driver))){echo $driver[2];}?>" id="nama_driver" name="nama_driver" aria-describedby="emailHelp">
                <button onclick="window.location.href = './listEditDriverCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Driver</button>
                <button id="btnRandom" name="btnRandom" onclick="window.location.href = '../process/randomEditDriverProcess.php<?php if(empty($driver)){} else{echo '?id_driver='.$driver[0].'';}?>'" type="button" class="btn btn-primary btn-sm mt-2">Random</button>
                <button <?php if(!(empty($driver))){}else{ echo 'hidden'; }?> id="btnDriver" onclick="window.location.href = '../process/deleteTransaksiPageProcess2.php?id_driver=<?php echo $driver[0]?>'" type="submit" name="resetDriver" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input disabled class="form-control" placeholder="Pilih Promo.." value="<?php if(!(empty($promo))){echo ''.$promo[1].' - '.$promo[2].' - '.$promo[5].'%';}?>" id="kode_promo" name="kode_promo" aria-describedby="emailHelp">
                <button onclick="window.location.href = './listEditPromoCustomerPage.php'" type="button" class="btn btn-primary btn-sm mt-2">Pilih Promo</button>
                <button <?php if(!(empty($promo))){}else{ echo 'hidden'; }?> id="btnPromo" onclick="window.location.href = '../process/deleteTransaksiPageProcess2.php?id_promo=<?php echo $promo[0]?>'" name="resetPromo" class="btn btn-primary btn-sm mt-2">Cancel</button>
            </div>

            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input class="form-control" placeholder="Masukkan Kode Promo" id="kode_promo" name="kode_promo" value="<?php echo $data[0];?>">
            </div> -->

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Peminjaman</label>
                <input class="form-control" type="datetime-local" id="tgl_waktu_mulai" name="tgl_waktu_mulai" value="<?php echo $tgl_waktu_mulai?>" min="<?php echo date("Y-m-d\TH:i"); ?>" max="2025-12-31" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Peminjaman</label>
                <input class="form-control" type="datetime-local" id="tgl_waktu_selesai" name="tgl_waktu_selesai" value="<?php echo $tgl_waktu_selesai?>" min="<?php echo date("Y-m-d\TH:i"); ?>" max="2025-12-31" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Transaksi</label>
                <input disabled class="form-control" value="<?php echo $data[3];?>">
            </div>

            <div>
                <div style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary" name="edit">Edit Transaksi</button>
                    <button style="margin-left: 5%" type="submit" onClick="return confirm ('Yakin mengedit data?')" class="btn btn-danger" name="delete">Batal Transaksi</button>
                </div>
            </div>
            
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
    </body>
</html>