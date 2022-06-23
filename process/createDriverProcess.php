<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_driver = $_POST['nama_driver'];
        $alamat_driver = $_POST['alamat_driver'];
        $tgl_lahir_driver = $_POST['tgl_lahir_driver'];
        $email_driver = $_POST['email_driver'];
        $no_telp_driver = $_POST['no_telp_driver'];
        $bahasa = $_POST['bahasa'];
        $jenis_kelamin_driver = $_POST['jenis_kelamin_driver'];
        $tarif_driver = $_POST['tarif_driver'];
        $sim_driver = $_POST['sim_driver'];
        $napza_driver = $_POST['napza_driver'];
        $surat_jiwa_driver = $_POST['surat_jiwa_driver'];
        $surat_jasmani_driver = $_POST['surat_jasmani_driver'];
        $skck_driver = $_POST['skck_driver'];
        $password = password_hash($_POST['tgl_lahir_driver'], PASSWORD_DEFAULT);

        $cek = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_driver'") or die(mysqli_error($con));
        $cek2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_driver'") or die(mysqli_error($con));
        $cek3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_driver'") or die(mysqli_error($con));
        
        if(!(mysqli_num_rows($cek) == 0) || !(mysqli_num_rows($cek2) == 0) || !(mysqli_num_rows($cek3) == 0)){//cek email  tidak ada duplikat
            echo
                '<script>
                alert("Email has been Taken"); window.history.back()
                </script>';
                return;
        }
        $cektelp = mysqli_query($con,"SELECT * FROM customer WHERE no_telp_customer='$no_telp_driver'");
        $cektelp2 = mysqli_query($con,"SELECT * FROM pegawai WHERE no_telp_pegawai='$no_telp_driver'");
        $cektelp3 = mysqli_query($con,"SELECT * FROM driver WHERE no_telp_driver='$no_telp_driver'");

        if(!(mysqli_num_rows($cektelp) == 0) || !(mysqli_num_rows($cektelp2) == 0) || !(mysqli_num_rows($cektelp3) == 0)){//cek nomor telepon
            echo
                '<script>
                alert("Nomor Telepon has been Taken"); window.history.back()
                </script>';
                return;
        }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO driver (format_driver, nama_driver, alamat_driver, tgl_lahir_driver, email_driver, no_telp_driver, bahasa, jenis_kelamin_driver, status, tarif_driver, sim_driver, napza_driver, surat_jiwa_driver, surat_jasmani_driver, skck_driver, password_driver)
                VALUES
            (CONCAT('DRV', '-' ,DATE_FORMAT(CURRENT_DATE, '%d%m%y')), '$nama_driver', '$alamat_driver', '$tgl_lahir_driver', '$email_driver', '$no_telp_driver', '$bahasa', '$jenis_kelamin_driver', 'Aktif', '$tarif_driver', '$sim_driver', '$napza_driver', '$surat_jiwa_driver', '$surat_jasmani_driver', '$skck_driver', '$password')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listDriverPage.php"
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