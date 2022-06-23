<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $kode_promo = $_POST['kode_promo'];
        $jenis = $_POST['jenis'];
        $keterangan = $_POST['keterangan'];
        $diskon = $_POST['diskon'];

        $cek = mysqli_query($con, "SELECT * FROM promo WHERE kode_promo = '$kode_promo'") or die(mysqli_error($con));
        if(!(mysqli_num_rows($cek) == 0)){
            echo
                '<script>
                alert("Kode has been Taken"); window.history.back()
                </script>';
                return;
        }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO promo (kode_promo, jenis, keterangan, diskon, status_promo)
                VALUES
            ('$kode_promo', '$jenis', '$keterangan', '$diskon', 'Aktif')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listPromoPage.php"
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