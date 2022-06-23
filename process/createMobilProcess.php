<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');
        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $no_plat = $_POST['no_plat'];
        $nomor_stnk = $_POST['nomor_stnk'];
        $nama_mobil = $_POST['nama_mobil'];
        $tipe_mobil = $_POST['tipe_mobil'];
        $jenis_transmisi = $_POST['jenis_transmisi'];
        $jenis_bahan_bakar = $_POST['jenis_bahan_bakar'];
        $volume_bahan_bakar = $_POST['volume_bahan_bakar'];
        $warna = $_POST['warna'];
        $kapasitas = $_POST['kapasitas'];
        $volume_bagasi = $_POST['volume_bagasi'];
        $harga_sewa = $_POST['harga_sewa'];

        if(!(empty($_POST['fasilitas'])))
        {
            $fasilitas = "";

            foreach($_POST['fasilitas'] as $fa)
            {
                $fasilitas .= $fa.", ";
            }
        }
        else
            $fasilitas = NULL;

        if(empty($_POST['id_pemilik']))
        {
            // Melakukan insert ke databse dengan query dibawah ini
            $query = mysqli_query($con,
            "INSERT INTO mobil(no_plat, nomor_stnk, nama_mobil, tipe_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, warna, kapasitas, fasilitas, volume_bagasi, harga_sewa, status_mobil, kategori_aset)
                VALUES
            ('$no_plat', '$nomor_stnk', '$nama_mobil', '$tipe_mobil', '$jenis_transmisi', '$jenis_bahan_bakar', '$volume_bahan_bakar', '$warna', '$kapasitas', '$fasilitas', '$volume_bagasi', '$harga_sewa', 'Tersedia', 'Perusahaan')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                    '<script>
                    alert("Create Data Success"); window.location = "../page/listMobilPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Create Data Failed");
                    </script>';
            }
        }
        else
        {
            $id_pemilik = $_POST['id_pemilik'];
            $periode_mulai = $_POST['periode_mulai'];
            $periode_akhir = $_POST['periode_akhir'];
            $tanggal_terakhir_servis = $_POST['tanggal_terakhir_servis'];

            $query = mysqli_query($con,
            "INSERT INTO mobil(no_plat, nomor_stnk, nama_mobil, tipe_mobil, jenis_transmisi, jenis_bahan_bakar, volume_bahan_bakar, warna, kapasitas, fasilitas, volume_bagasi, harga_sewa, id_pemilik, periode_mulai, periode_akhir, tanggal_terakhir_servis, status_mobil, kategori_aset)
                VALUES
            ('$no_plat', '$nomor_stnk', '$nama_mobil', '$tipe_mobil', '$jenis_transmisi', '$jenis_bahan_bakar', '$volume_bahan_bakar', '$warna', '$kapasitas', '$fasilitas', '$volume_bagasi', '$harga_sewa','$id_pemilik', '$periode_mulai', '$periode_akhir', '$tanggal_terakhir_servis', 'Tersedia', 'Kontrak')")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
            if($query){
                echo
                    '<script>
                    alert("Create Data Success"); window.location = "../page/listMobilPage.php"
                    </script>';
            }
            else{
                echo
                    '<script>
                    alert("Create Data Failed");
                    </script>';
            }
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