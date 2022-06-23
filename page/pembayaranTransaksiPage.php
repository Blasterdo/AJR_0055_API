<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    $user=$_SESSION['user'];
    $query=mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);

    $queryTransaksi=mysqli_query($con, "SELECT id_transaksi, id_driver, id_promo, id_mobil FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Belum membayar'") or die(mysqli_error($con));
    if(mysqli_num_rows($queryTransaksi)==0)
    {
        $querycek=mysqli_query($con, "SELECT * FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Sudah membayar'") or die(mysqli_error($con));
        if(mysqli_num_rows($querycek)!=0)
        {
            echo
                '<script>
                alert("Masih menunggu proses verifikasi dari CS"); window.location = "./profilCustomerPage.php"
                </script>';
            return;
        }
        echo
            '<script>
            alert("Transaksi belum dibuat atau belum diverifikasi"); window.location = "./addTransaksiPage.php"
            </script>';
        return;
    }
    
    $data=mysqli_fetch_array($queryTransaksi);

    $queryHari=mysqli_query($con, "SELECT TIMESTAMPDIFF(minute, tgl_waktu_mulai, tgl_waktu_selesai) FROM transaksi WHERE id_customer='$user[0]' AND status_transaksi='Belum membayar'") or die(mysqli_error($con));
    $dataHari=mysqli_fetch_array($queryHari);
    $jam = floor($dataHari[0]/60);
    $hari = ceil($jam/24);
    
    $biaya=mysqli_query($con, "SELECT m.harga_sewa, m.harga_sewa * '$hari', d.tarif_driver, d.tarif_driver * '$hari', NULL, t.diskon_pembayaran, p.diskon, t.biaya_ekstensi_pembayaran FROM transaksi t JOIN mobil m ON (m.id_mobil=t.id_mobil) LEFT JOIN driver d ON (d.id_driver=t.id_driver) LEFT JOIN promo p ON (p.id_promo=t.id_promo) WHERE id_customer='$user[0]' AND status_transaksi='Belum membayar'") or die(mysqli_error($con));
    $dataBiaya=mysqli_fetch_array($biaya);
    $totalBiaya=$dataBiaya[1] + $dataBiaya[3] + $dataBiaya[7] - $dataBiaya[5];
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>PEMBAYARAN TRANSAKSI</h4>
        <hr>
        <form action="../process/editTransaksiProcess.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?php echo $data[0]; ?>">
            <input type="hidden" name="id_driver" value="<?php echo $data[1]; ?>">
            <input type="hidden" name="id_mobil" value="<?php echo $data[3]; ?>">

            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Jumlah Pembayaran:</label>
            </div>

            <table class="mb-3">
                <tr>
                    <td>
                        Biaya sewa mobil
                    </td>
                    <td>
                        :&nbsp
                    </td>
                    <td>
                        Rp <?php echo $dataBiaya[0] ?>/Hari
                    </td>
                    <td>
                        &nbsp= Rp <?php echo $dataBiaya[1] ?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Tarif Driver
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        Rp <?php 
                        if(empty($dataBiaya[2])){
                            echo '0';
                        }
                        else{
                            echo $dataBiaya[2].'/Hari';
                        } ?> 
                        
                    </td>
                    <td>
                        <?php 
                            if(empty($dataBiaya[2])){

                            }else{
                                echo '<span>&nbsp= Rp '.$dataBiaya[3].'</span>';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Ekstensi Peminjaman
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        Rp <?php echo $dataBiaya[7] ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Diskon
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php 
                            if(empty($data[2])){
                                echo '0';
                            }else{
                                echo $dataBiaya[6];
                            }?>%
                    </td>
                    <td>
                        <?php 
                            if(empty($data[2])){

                            }else{
                                echo '<span>&nbsp= Rp '.$dataBiaya[5].'</span>';
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Total
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        Rp. <?php echo $totalBiaya ?>
                    </td>
                </tr>
            </table>
           
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Durasi Peminjaman</label>
                <input disabled class="form-control" value="<?php echo $hari ?> Hari" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Metode Pembayaran</label>
                <select required class="form-select" aria-label="Default select example" name="metode_transaksi" id="metode_transaksi">
                    <option value="" selected hidden>Pilih Metode Pembayaran..</option>
                    <option value="Tunai">Tunai</option>
                    <option value="Non-Tunai">Non-Tunai</option>
                </select>
            </div>
            
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Uang</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend">Rp.</span>
                    <input required type="number" placeholder="Masukkan Uang yang dikeluarkan" class="form-control" id="jumlah_pembayaran" name="jumlah_pembayaran">
                </div>
            </div>

            <?php
                if(empty($data[1])){
                    
                }
                else{
                    echo'
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Rating Driver</label>
                        <br>
                        <div class="rating">
                            <label>
                            <input required type="radio" name="rating_driver" value="1" />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="rating_driver" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="rating_driver" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>   
                            </label>
                            <label>
                                <input type="radio" name="rating_driver" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="rating_driver" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Komentar Driver</label>
                        <input type="textarea" placeholder="Masukkan komentar anda mengenai driver ini" class="form-control" id="penilaian_driver" name="penilaian_driver">
                    </div>';
                }
            ?>
            
            <div class="mb-3">
                <label required for="exampleInputEmail1" class="form-label">Rating Rental</label>
                <br>
                <div class="rating">
                    <label>
                    <input required type="radio" name="rating_rental" value="1" />
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="rating_rental" value="2" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="rating_rental" value="3" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>   
                    </label>
                    <label>
                        <input type="radio" name="rating_rental" value="4" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="rating_rental" value="5" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Komentar Rental</label>
                <input type="textarea" placeholder="Masukkan komentar anda mengenai tempat rental ini" class="form-control" id="penilaian_rental" name="penilaian_rental">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bukti Pembayaran</label>
                <input required type="url" placeholder="Masukkan Link Foto Bukti Pembayaran" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
            </div>
            
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script>
            $(':radio').change(function() {
                console.log('New star rating: ' + this.value);
            });
        </script> -->
        
    </body>
</html>