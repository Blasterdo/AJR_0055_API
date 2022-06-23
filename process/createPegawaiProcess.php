<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_pegawai = $_POST['nama_pegawai'];
        $id_role = $_POST['id_role'];
        $alamat_pegawai = $_POST['alamat_pegawai'];
        $tgl_lahir_pegawai = $_POST['tgl_lahir_pegawai'];
        $jenis_kelamin_pegawai = $_POST['jenis_kelamin_pegawai'];
        $email_pegawai = $_POST['email_pegawai'];
        $no_telp_pegawai = $_POST['no_telp_pegawai'];
        $foto_pegawai = $_POST['foto_pegawai'];
        $password_pegawai = password_hash($_POST['tgl_lahir_pegawai'], PASSWORD_DEFAULT);

        $cek = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email_pegawai'") or die(mysqli_error($con));
        $cek2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email_pegawai'") or die(mysqli_error($con));
        $cek3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email_pegawai'") or die(mysqli_error($con));
        
        if(!(mysqli_num_rows($cek) == 0) || !(mysqli_num_rows($cek2) == 0) || !(mysqli_num_rows($cek3) == 0)){
            echo
                '<script>
                alert("Email has been Taken"); window.history.back()
                </script>';
                return;
        }
        
        $cektelp = mysqli_query($con,"SELECT * FROM customer WHERE no_telp_customer='$no_telp_pegawai'");
        $cektelp2 = mysqli_query($con,"SELECT * FROM pegawai WHERE no_telp_pegawai='$no_telp_pegawai'");
        $cektelp3 = mysqli_query($con,"SELECT * FROM driver WHERE no_telp_driver='$no_telp_pegawai'");

        if(!(mysqli_num_rows($cektelp) == 0) || !(mysqli_num_rows($cektelp2) == 0) || !(mysqli_num_rows($cektelp3) == 0)){
            echo
                '<script>
                alert("Nomor Telepon has been Taken"); window.history.back()
                </script>';
                return;
        }

        $query = mysqli_query($con,
            "INSERT INTO pegawai (nama_pegawai, id_role, alamat_pegawai, tgl_lahir_pegawai, jenis_kelamin_pegawai, email_pegawai, no_telp_pegawai, foto_pegawai, password_pegawai, status_pegawai)
                VALUES
            ('$nama_pegawai', '$id_role', '$alamat_pegawai', '$tgl_lahir_pegawai', '$jenis_kelamin_pegawai', '$email_pegawai', '$no_telp_pegawai', '$foto_pegawai', '$password_pegawai', 'Aktif')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listPegawaiPage.php"
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