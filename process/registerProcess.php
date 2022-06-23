<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama = $_POST['nama'];
        $password = password_hash($_POST['tgl_lahir_customer'], PASSWORD_DEFAULT);
        $alamat = $_POST['alamat'];
        $tgl_lahir = $_POST['tgl_lahir_customer'];
        $jenis_kelamin = $_POST['jenis_kelamin_customer'];
        $email = $_POST['email'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $sim = $_POST['sim'];
        $tanda_pengenal = $_POST['tanda_pengenal'];

        $cek = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email'") or die(mysqli_error($con));
        $cek2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
        $cek3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email'") or die(mysqli_error($con));

        // $cektelp = mysqli_query($con,"SELECT * FROM pegawai WHERE no_telp_customer='$nomor_telepon'");
        // $cektelp2 = mysqli_query($con,"SELECT * FROM pegawai WHERE no_telp_customer='$nomor_telepon'");
        // $cektelp3 = mysqli_query($con,"SELECT * FROM pegawai WHERE no_telp_customer='$nomor_telepon'");
        
        // if(!(mysqli_num_rows($cektelp) == 0) && !(mysqli_num_rows($cektelp2) == 0) && !(mysqli_num_rows($cektelp3) == 0)){
        //     echo
        //         '<script>
        //         alert("Nomor Telepon has been Taken"); window.history.back()
        //         </script>';
        //         return;
        // }

        if(mysqli_num_rows($cek) == 0 && mysqli_num_rows($cek2) == 0 && mysqli_num_rows($cek3) == 0)//ngecek kalau tidak ada email yang sama
        {
            $tanggal_lahir = $_POST['tgl_lahir_customer'];
            $queryUmur = mysqli_query($con,"SELECT TIMESTAMPDIFF(YEAR, '$tanggal_lahir', CURRENT_DATE)") or die(mysqli_error($con));
            $umur = mysqli_fetch_array($queryUmur);
            // var_dump($umur);
            // getch();
            if($umur[0]<17){
                echo
                    '<script>
                    alert("Syarat Umur Tidak Terpenuhi, Minimal 17 Tahun umur anda '.$umur[0].'");window.history.back()
                    </script>';
                    return;
            }
            // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con,
                "INSERT INTO customer (format_customer, nama, alamat_customer, tgl_lahir_customer, jenis_kelamin_customer, email_customer, no_telp_customer, sim_customer, tanda_pengenal, password_customer)
                    VALUES
                (CONCAT('CUS', DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '-'), '$nama', '$alamat', '$tgl_lahir', '$jenis_kelamin', '$email', '$nomor_telepon', '$sim', '$tanda_pengenal', '$password')")
                    or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

            if($query){
                echo
                    '<script>
                    alert("Register Success"); window.location = "../index.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Register Failed");
                    </script>';
            }
        }else{
            echo
                '<script>
                alert("Email has been taken");
                window.history.back()
                </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>