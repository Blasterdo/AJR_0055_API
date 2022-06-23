<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_customer = $_POST['id_customer'];
        $id_driver = $_POST['id_driver'];
        $id_mobil = $_POST['id_mobil'];
        $id_promo = $_POST['id_promo'];
        $tgl_waktu_mulai = $_POST['tgl_waktu_mulai'];
        $tgl_waktu_selesai = $_POST['tgl_waktu_selesai'];
        
        $queryCustomer = mysqli_query($con,"SELECT sim_customer FROM customer WHERE id_customer='$id_customer'") or die(mysqli_error($con));
        $simCustomer = mysqli_fetch_array($queryCustomer);

        // $querymitra = mysqli_query($con,"SELECT periode_mulai, periode_akhir FROM mobil m JOIN mitra mt ON (mt.id_mobile=m.id_mobil) WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
        // $mitra = mysqli_fetch_array($querymitra);
        // $periode_akhir = strtotime($mitra[1]);

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
                        $query = mysqli_query($con,"INSERT INTO transaksi (format_transaksi, id_customer, id_mobil, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
                        VALUES 
                        (CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'02-'), '$id_customer', '$id_mobil', NOW(), '$tgl_waktu_mulai', '$tgl_waktu_selesai', 'Belum diverifikasi')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    }
                }
                else
                {
                    $query = mysqli_query($con,"INSERT INTO transaksi (format_transaksi, id_customer, id_driver, id_mobil, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
                    VALUES 
                    (CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'01-'), '$id_customer', $id_driver, '$id_mobil', NOW(), '$tgl_waktu_mulai', '$tgl_waktu_selesai', 'Belum diverifikasi')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                }
            }
            else{
                // $cari_promo = mysqli_query($con,"SELECT id_promo FROM promo WHERE kode_promo = '$kode_promo' AND status_promo ='Aktif'") or die(mysqli_error($con));
                // if(mysqli_num_rows($cari_promo)!=0){
                    // $id_promo = mysqli_fetch_array($cari_promo);
                    if(empty($id_driver))
                    {
                        if(empty($simCustomer[0])){
                            echo
                            '<script>
                            alert("This customer doesnt have SIM"); window.history.back(); window.location = "../page/addTransaksiPage.php"
                            </script>';
                        }
                        $query = mysqli_query($con,"INSERT INTO transaksi (format_transaksi, id_customer, id_mobil, id_promo, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
                            VALUES 
                            (CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'02-'), '$id_customer', '$id_mobil', '$id_promo', NOW(), '$tgl_waktu_mulai', '$tgl_waktu_selesai', 'Belum diverifikasi')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    }
                    else
                    {
                        $query = mysqli_query($con,"INSERT INTO transaksi (format_transaksi, id_customer, id_driver, id_mobil, id_promo, tgl_transaksi, tgl_waktu_mulai, tgl_waktu_selesai, status_transaksi)
                        VALUES 
                        (CONCAT('TRN', DATE_FORMAT(CURRENT_DATE, '%y%m%d'),'01-'), '$id_customer', $id_driver, '$id_mobil', '$id_promo', NOW(), '$tgl_waktu_mulai', '$tgl_waktu_selesai', 'Belum diverifikasi')") or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
                    }
                // }
                // else
                // {
                //     echo
                //     '<script>
                //     alert("Promo Not Found"); window.history.back(); window.location = "../page/addTransaksiPage.php"
                //     </script>';
                // }
            }
        }
        else
        {
            echo
                '<script>
                alert("Mobil is Required"); window.history.back(); window.location = "../page/addTransaksiPage.php"
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
        

        if($query){
            session_start();
            $_SESSION['driver'] = NULL;
            $_SESSION['mobil'] = NULL;
            $_SESSION['promo'] = NULL;
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/addTransaksiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Create Data Failed");
                </script>';
        }

    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>