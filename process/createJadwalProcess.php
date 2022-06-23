<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];

        $cek = mysqli_query($con, "SELECT * FROM detail_jadwal WHERE id_pegawai='$id_pegawai'");
        $cekDuplicate = mysqli_query($con, "SELECT * FROM detail_jadwal WHERE id_pegawai='$id_pegawai' AND id_jadwal='$id_jadwal'");

        if(!(mysqli_num_rows($cek) <= 5)){
            echo
                '<script>
                alert("Maximum Jadwal allowed is 6"); window.history.back()
                </script>';
                return;
        }
        if(!(mysqli_num_rows($cekDuplicate) == 0)){
            echo
                '<script>
                alert("Jadwal has been Taken"); window.history.back()
                </script>';
                return;
        }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO detail_jadwal (id_pegawai, id_jadwal)
                VALUES
            ('$id_pegawai', '$id_jadwal')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listJadwalPegawaiPage.php"
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