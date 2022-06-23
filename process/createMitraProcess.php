<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama_pemilik = $_POST['nama_pemilik'];
        $alamat_pemilik = $_POST['alamat_pemilik'];
        $no_telp_pemilik = $_POST['no_telp_pemilik'];
        $no_ktp_pemilik = $_POST['no_ktp_pemilik'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO mitra (nama_pemilik, alamat_pemilik, no_telp_pemilik, no_ktp_pemilik, status_mitra)
                VALUES
            ('$nama_pemilik', '$alamat_pemilik', '$no_telp_pemilik', '$no_ktp_pemilik', 'Aktif')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listMitraPage.php"
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