<?php
    include '../component/sidebarCS.php'
?>
<?php
    $id=$_GET['id'];
    $query=mysqli_query($con, "SELECT t.format_transaksi, t.id_transaksi, c.format_customer, c.id_customer, c.nama, pgw.id_pegawai, pgw.nama_pegawai, d.format_driver, d.id_driver, d.nama_driver, pr.kode_promo, pr.diskon, 
    t.tgl_transaksi, t.tgl_waktu_mulai, t.tgl_waktu_selesai, t.subtotal_transaksi, t.biaya_ekstensi_pembayaran, t.diskon_pembayaran, 
    t.subtotal_transaksi + t.biaya_ekstensi_pembayaran - t.diskon_pembayaran AS total_pembayaran, t.jumlah_pembayaran, t.bukti_pembayaran, mb.nama_mobil, t.tgl_waktu_pengembalian, pr.id_promo
    FROM transaksi t JOIN customer c ON (c.id_customer=t.id_customer) JOIN mobil mb ON (mb.id_mobil=t.id_mobil) JOIN pegawai pgw ON (pgw.id_pegawai=t.id_pegawai) 
    LEFT JOIN driver d ON (d.id_driver=t.id_driver) LEFT JOIN promo pr ON (pr.id_promo=t.id_promo) WHERE t.id_transaksi='$id'") 
    or die(mysqli_error($con));
    $data=mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>DETAIL TRANSAKSI</h4>
        <hr>
        <form action="../process/editVerifikasiProcess.php?id=<?php echo $data[1]?>" method="post">
            <table>
                <tr>
                    <td>
                        ID Transaksi
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[0]?><?php echo $data[1]?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        ID Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[2]?><?php echo $data[3]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Nama Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[4]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Customer Service
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo ''.$data[5].' - '.$data[6].''?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Driver
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php
                            if(empty($data[8])){
                                echo '-';
                            }else{
                                echo $data[7]; echo $data[8]; echo ' | '.$data[9].'';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Promo
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php
                            if(empty($data[23])){
                                echo '-';
                            }else{
                                echo ''.$data[10].' - '.$data[11].'%';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Mobil
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[21]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Transaksi
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[12]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Transaksi Dimulai
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[13]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Transaksi Selesai
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[14]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Mobil Dikembalikan
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $data[22]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Sub Total Transaksi | Biaya Ekstensi | Diskon Pembayaran
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo 'Rp '.$data[15].'';?> | <?php echo 'Rp '.$data[16].'';?> | <?php echo 'Rp '.$data[17].'';?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Total Pembayaran
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo 'Rp '.$data[18].'';?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Pembayaran
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        Rp <?php echo $data[19]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Bukti Pembayaran
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <div>
                            <img class="img-thumbnail" width="25%" src="<?php echo $data[20]?>" alt="Not Found"> 
                        </div>
                    </td>
                </tr>
            </table>

            <div class="mt-3" style="display: flex; justify-content: center;">
                <button type="submit" onClick="return confirm ('Apakah anda yakin mengverifikasi pembayaran ini?')" class="btn btn-primary" name="pembayaran">Verifikasi Transaksi</button>
                <button type="submit" onClick="return confirm ('Apakah transaksi ini tidak valid?')" style="margin-left: 5%" class="btn btn-danger" name="invalid">Transaksi Tidak Valid</button>
            </div>
        </form>

    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>