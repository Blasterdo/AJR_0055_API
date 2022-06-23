<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['edit'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_transaksi = $_POST['id_transaksi'];
        $id_driver = $_POST['id_driver'];
        $id_mobil = $_POST['id_mobil'];
        $id_customer = $_POST['id_customer'];
        $id_promo = $_POST['id_promo'];
        $tgl_waktu_mulai = $_POST['tgl_waktu_mulai'];
        $tgl_waktu_selesai = $_POST['tgl_waktu_selesai'];
        
        $queryCustomer = mysqli_query($con,"SELECT sim_customer FROM customer WHERE id_customer='$id_customer'") or die(mysqli_error($con));
        $simCustomer = mysqli_fetch_array($queryCustomer);

        $mulai = strtotime($tgl_waktu_mulai);
        $selesai = strtotime($tgl_waktu_selesai);
        
        $durasi_rental = $selesai - $mulai;
        $jamRental=floor($durasi_rental/3600);
        
        if($jamRental<24){
            echo
                '<script>
                alert("Peminjaman Mobil minimal harus berdurasi 1 hari"); window.history.back(); window.location = "../page/addTransaksiPage.php"
                </script>';
            return;
        }

        if($_POST['status_transaksi']=='Belum diverifikasi' || str_contains($_POST['status_transaksi'], 'Dibatalkan')){
           $updateStatus = mysqli_query($con,"UPDATE transaksi SET status_transaksi='Belum diverifikasi' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        }
        else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/addTransaksiPage.php"
                </script>';
            return;
        }

        if(!(empty($id_mobil))){
            if(empty($id_promo)){
                if(empty($id_driver))
                {
                    if(empty($simCustomer[0])){
                        echo
                        '<script>
                        alert("This customer doesnt have SIM"); window.history.back(); window.location = "../page/addTransaksiPage.php"
                        </script>';
                    }else{
                        $queryUpdate = mysqli_query($con,"UPDATE transaksi SET format_transaksi=CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'02-'), id_mobil='$id_mobil', id_driver=NULL, id_promo=NULL, tgl_transaksi=NOW(), tgl_waktu_mulai='$tgl_waktu_mulai', tgl_waktu_selesai='$tgl_waktu_selesai' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    }
                }
                else
                {
                    $queryUpdate = mysqli_query($con,"UPDATE transaksi SET format_transaksi=CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'01-'), id_mobil='$id_mobil', id_driver='$id_driver', id_promo=NULL, tgl_transaksi=NOW(), tgl_waktu_mulai='$tgl_waktu_mulai', tgl_waktu_selesai='$tgl_waktu_selesai' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                }
            }
            else{
                // $cari_promo = mysqli_query($con,"SELECT id_promo FROM promo WHERE kode_promo = '$kode_promo' AND status_promo ='Aktif'") or die(mysqli_error($con));
                // if(mysqli_num_rows($cari_promo)!=0){
                //     $id_promo = mysqli_fetch_array($cari_promo);
                    if(empty($id_driver))
                    {
                        if(empty($simCustomer[0])){
                            echo
                            '<script>
                            alert("This customer doesnt have SIM"); window.history.back(); window.location = "../page/addTransaksiPage.php"
                            </script>';
                        }else{
                            $queryUpdate = mysqli_query($con,"UPDATE transaksi SET format_transaksi=CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'02-'), id_mobil='$id_mobil', id_driver=NULL, id_promo='$id_promo[0]', tgl_transaksi=NOW(), tgl_waktu_mulai='$tgl_waktu_mulai', tgl_waktu_selesai='$tgl_waktu_selesai' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                        }
                    }
                    else
                    {
                        $queryUpdate = mysqli_query($con,"UPDATE transaksi SET format_transaksi=CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'01-'), id_mobil='$id_mobil', id_driver='$id_driver', id_promo='$id_promo[0]', tgl_transaksi=NOW(), tgl_waktu_mulai='$tgl_waktu_mulai', tgl_waktu_selesai='$tgl_waktu_selesai' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    }
                // }
                // else
                // {
                //     echo
                //     '<script>
                //     alert("Promo Not Found"); window.history.back(); window.location = "../page/editTransaksiPage.php"
                //     </script>';
                // }
            }
        }
        else
        {
            echo
                '<script>
                alert("Mobil is Required"); window.history.back(); window.location = "../page/editTransaksiPage.php"
                </script>';
        }
        // if(empty($kode_promo)){
        //     $query = mysqli_query($con,"INSERT INTO transaksi (format_transaksi, id_customer, id_driver, id_mobil, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
        //         VALUES
        //     (IF('$id_driver' IS NULL, CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'01-'), CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'02-')), 
        //     '$id_customer', IF('$id_driver' IS NULL, '$id_driver', NULL), '$id_mobil', NOW(), '$tgl_waktu_mulai', 
        //     '$tgl_waktu_selesai', 
        //     'Belum diverifikasi')")
        //         or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        // }
        // else{
        //     $cari_promo = mysqli_query($con,"SELECT id_promo FROM promo WHERE kode_promo = '$kode_promo'") or die(mysqli_error($con));
        //     if(mysqli_num_rows($cari_promo)!=0)
        //     {
        //         $id_promo = mysqli_fetch_array($cari_promo);
        //         $query = mysqli_query($con,
        //         "INSERT INTO transaksi (format_transaksi, id_customer, id_driver, id_mobil, id_promo, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
        //             VALUES
        //         (if(empty($id_driver), CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),02), CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),01)), '$id_customer', '$id_driver', '$id_mobil', '$id_promo[0]', NOW(), '$tgl_waktu_mulai', '$tgl_waktu_selesai', 'Belum diverifikasi')")
        //             or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        //     }
        //     else{
        //         echo
        //         '<script>
        //         alert("Promo Not Found"); window.location = "../page/addTransaksiPage.php"
        //         </script>';
        //     }
        // }
        $_SESSION['driver'] = NULL;
        $_SESSION['mobil'] = NULL;
        $_SESSION['promo'] = NULL;
        if($queryUpdate){
            echo
                '<script>
                alert("Edi Data Success"); window.location = "../page/editTransaksiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Failed");
                </script>';
        }

    }
    else if(isset($_POST['delete']))
    {
        include('../db.php');

        $id_transaksi = $_POST['id_transaksi'];

        session_start();
        $_SESSION['driver'] = NULL;
        $_SESSION['mobil'] = NULL;  
        $_SESSION['promo'] = NULL;

        $queryDelete = mysqli_query($con, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script>
                alert("Cancel Success"); window.location = "../page/addTransaksiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Cancel Failed"); window.location = "../page/addTransaksiPage.php"
                </script>';
        }
    }
    else if(isset($_POST['updateStatus'])){
        include('../db.php');

        $id_transaksi = $_POST['id_transaksi'];
        $id_mobil = $_POST['id_mobil'];
        $id_driver = $_POST['id_driver'];
        $id_promo = $_POST['id_promo'];
        
        session_start();
        $_SESSION['driver'] = NULL;
        $_SESSION['mobil'] = NULL;

        $queryCek= mysqli_query($con, "SELECT TIMESTAMPDIFF(second, NOW(), tgl_waktu_mulai) FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        $cek= mysqli_fetch_array($queryCek);
        
        if(!($cek[0]<0)){
            echo
                '<script>
                alert("Masih belum tanggal mobil dipinjam"); window.location = "../page/addTransaksiPage.php"
                </script>';
                return;
        }

        $queryCekHari= mysqli_query($con, "SELECT TIMESTAMPDIFF(minute, tgl_waktu_mulai, tgl_waktu_selesai) FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        $dataCekHari= mysqli_fetch_array($queryCekHari);
        $jam = floor($dataCekHari[0]/60);
        $hari = ceil($jam/24);

        if(empty($id_driver)){
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi='Belum membayar', tgl_waktu_pengembalian=NOW(),
            subtotal_transaksi=((SELECT harga_sewa FROM mobil WHERE id_mobil='$id_mobil') * '$hari')
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        }else{
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi='Belum membayar', tgl_waktu_pengembalian=NOW(),
            subtotal_transaksi=(((SELECT harga_sewa FROM mobil WHERE id_mobil='$id_mobil') * '$hari')  + ((SELECT tarif_driver FROM driver WHERE id_driver='$id_driver') * '$hari'))
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));

            $queryUpdateDriver = mysqli_query($con, "UPDATE driver SET status='Aktif'
            WHERE id_driver='$id_driver'") or die(mysqli_error($con));
            // $data=mysqli_query($con, "SELECT TIMESTAMPDIFF(DAY, tgl_waktu_mulai, tgl_waktu_selesai) FROM transaksi
            // WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
            // var_dump(mysqli_fetch_array($data));
            // getch();
        }

        $queryUpdateMobil = mysqli_query($con, "UPDATE mobil SET status_mobil='Tersedia'
        WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));

        if(empty($id_promo)){
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET 
            diskon_pembayaran=0
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        }else{
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET 
            diskon_pembayaran=((SELECT diskon/100 FROM promo WHERE id_promo='$id_promo') * subtotal_transaksi)
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        }

        $queryCekEkstensi= mysqli_query($con, "SELECT TIMESTAMPDIFF(second, tgl_waktu_selesai, tgl_waktu_pengembalian) FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        $dataCekEkstensi= mysqli_fetch_array($queryCekEkstensi);
        
        if($dataCekEkstensi[0]<0){
            $ekstensi=0;
        }
        else{
            $ekstensiJam=floor($dataCekEkstensi[0]/3600);
            $ekstensi=floor($ekstensiJam/3);
        }

        if($ekstensi!=0){
            echo
                '<script>
                alert("Anda telat mengembalikan mobil selama '.$ekstensiJam.' Jam"); window.location = "../page/pembayaranTransaksiPage.php"
                </script>';
        }

        // while($ekstensiJam>=3){
        //     $ekstensi++;
        //     $ekstensiJam-=3;
        // }
        $queryUpdate = mysqli_query($con, "UPDATE transaksi SET biaya_ekstensi_pembayaran=(SELECT harga_sewa*'$ekstensi' FROM mobil WHERE id_mobil='$id_mobil') WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/pembayaranTransaksiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/pembayaranTransaksiPage.php"
                </script>';
        }
    }
    else if(isset($_POST['bayar'])){
        include('../db.php');

        $id_transaksi = $_POST['id_transaksi'];
        $id_driver = $_POST['id_driver'];
        $id_mobil = $_POST['id_mobil'];

        $metode_transaksi = $_POST['metode_transaksi'];
        $jumlah_pembayaran = $_POST['jumlah_pembayaran'];
        $bukti_pembayaran = $_POST['bukti_pembayaran'];

        if(empty($id_driver)){
            $rating_driver = NULL;
            $komentar_driver = NULL;
        }else{
            $rating_driver = $_POST['rating_driver'];
            $komentar_driver = $_POST['penilaian_driver'];
        }

        $rating_rental = $_POST['rating_rental'];
        $komentar_rental = $_POST['penilaian_rental'];

        $queryBiaya = mysqli_query($con, "SELECT subtotal_transaksi + biaya_ekstensi_pembayaran - diskon_pembayaran FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        $biaya=mysqli_fetch_array($queryBiaya);
        $perbedaan=$jumlah_pembayaran-$biaya[0];
        
        if($jumlah_pembayaran<$biaya[0]){
            $perbedaan = $perbedaan * -1;
            echo '<script>
            alert("Uang tidak cukup! Uang anda kurang Rp. '.$perbedaan.'"); window.history.back()
            </script>';
            return;
        }        

        $queryUpdate = mysqli_query($con, "UPDATE transaksi SET 
            metode_transaksi='$metode_transaksi', jumlah_pembayaran='$jumlah_pembayaran', rating_driver='$rating_driver',
            penilaian_driver='$komentar_driver', rating_rental='$rating_rental', penilaian_rental='$komentar_rental', status_transaksi='Sudah membayar', bukti_pembayaran='$bukti_pembayaran'
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        if(!(empty($id_driver))){
            $updateRating = mysqli_query($con, "UPDATE driver SET rerata_rating_driver=(SELECT AVG(rating_driver) FROM transaksi WHERE id_driver='$id_driver') WHERE id_driver='$id_driver'") or die(mysqli_error($con));
        }
        if($queryUpdate){
            echo
                '<script>
                alert("Pembayaran Success!  Uang anda lebih Rp. '.$perbedaan.'"); window.location = "../page/notaCustomerPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Pembayaran Failed!"); window.location = "../page/notaCustomerPage.php"
                </script>';
        }
    }
    else
    {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>