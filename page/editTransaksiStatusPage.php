<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    $user=$_SESSION['user'];
    $query=mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);

    $queryTransaksi=mysqli_query($con, "SELECT p.kode_promo, t.tgl_waktu_mulai, t.tgl_waktu_selesai, t.status_transaksi, t.id_transaksi, mb.nama_mobil, d.nama_driver, mb.id_mobil, d.id_driver, p.id_promo FROM transaksi t LEFT JOIN promo p ON (t.id_promo=p.id_promo) JOIN mobil mb ON (t.id_mobil=mb.id_mobil) LEFT JOIN driver d ON (t.id_driver=d.id_driver) WHERE id_customer='$user[0]' AND status_transaksi!='Selesai' AND status_transaksi='Sudah diverifikasi'") or die(mysqli_error($con));
    $data=mysqli_fetch_array($queryTransaksi);
    $tgl_waktu_mulai=date('Y-m-d\TH:i:s', strtotime($data[1]));
    $tgl_waktu_selesai=date('Y-m-d\TH:i:s', strtotime($data[2]));
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMPIL TRANSAKSI</h4>
        <hr>
        <form action="../process/editTransaksiProcess.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?php echo $data[4]; ?>">
            <input type="hidden" name="id_mobil" value="<?php echo $data[7]; ?>">
            <input type="hidden" name="id_driver" value="<?php echo $data[8]; ?>">
            <input type="hidden" name="id_promo" value="<?php echo $data[9]; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                <input disabled value="<?php echo $user[1]?><?php echo $user[0]?> | <?php echo $user[2]?>" class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Mobil</label>
                <input disabled required class="form-control" value="<?php if(!(empty($data[5]))){echo $data[5];}?>" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Driver</label>
                <input disabled class="form-control" value="<?php if(!(empty($data[6]))){echo $data[6];}else{echo '-';}?>" id="nama_driver" name="nama_driver" aria-describedby="emailHelp">
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input disabled class="form-control" value="<?php if(!(empty($data[0]))){echo $data[0];}else{echo '-';}?>">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Peminjaman</label>
                <input disabled class="form-control" type="datetime-local"value="<?php echo $tgl_waktu_mulai?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Peminjaman</label>
                <input disabled class="form-control" type="datetime-local" value="<?php echo $tgl_waktu_selesai?>" required>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Transaksi</label>
                <input disabled class="form-control" id="status_transaksi" name="status_transaksi" value="<?php echo $data[3];?>">
            </div>

            <?php
                if($data[3]=='Sudah diverifikasi'){
                    echo'
                        <div class="d-grid gap-2">
                            <button type="submit" onclick="return confirm (\'Apakah anda sudah ingin mengembalikan mobil?\')" class="btn btn-success" name="updateStatus">Mengembalikan Mobil</button>
                        </div>
                    ';
                }
            ?>
            
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
    </body>
</html>