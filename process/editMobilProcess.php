<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_mobil = $_POST['id_mobil'];
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
            $queryUpdate = mysqli_query($con, "UPDATE mobil SET no_plat='$no_plat', nomor_stnk='$nomor_stnk', nama_mobil='$nama_mobil', tipe_mobil='$tipe_mobil', 
            jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', warna='$warna', kapasitas='$kapasitas', 
            fasilitas='$fasilitas', volume_bagasi='$volume_bagasi', harga_sewa='$harga_sewa' WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/listMobilPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/listMobilPage.php"
                    </script>';
            }
        }
        else
        {
            // Melakukan insert ke databse dengan query dibawah ini
            $periode_mulai = $_POST['periode_mulai'];
            $periode_akhir = $_POST['periode_akhir'];
            $tanggal_terakhir_servis = $_POST['tanggal_terakhir_servis'];
            
            if(strtotime($_POST['periode_akhir'])==strtotime($_POST['periode_mulai'])){
                echo
                    '<script>
                    alert("Contract duration minimal 1 day");window.history.back()
                    </script>';
                return;
            }
            else if(strtotime($_POST['periode_akhir'])<strtotime($_POST['periode_mulai']))
            {
                echo
                    '<script>
                    alert("Tanggal akhir kontrak date must pass Tanggal mulai kontrak");window.history.back()
                    </script>';
                return;
            }
            
            if(strtotime($_POST['tanggal_terakhir_servis'])<strtotime($_POST['periode_mulai'])){
                echo
                    '<script>
                    alert("Tanggal terakhir servis invalid");window.history.back()
                    </script>';
                return;
            }

            $queryUpdate = mysqli_query($con, "UPDATE mobil SET no_plat='$no_plat', nomor_stnk='$nomor_stnk', nama_mobil='$nama_mobil', tipe_mobil='$tipe_mobil', 
            jenis_transmisi='$jenis_transmisi', jenis_bahan_bakar='$jenis_bahan_bakar', volume_bahan_bakar='$volume_bahan_bakar', warna='$warna', kapasitas='$kapasitas', 
            fasilitas='$fasilitas', volume_bagasi='$volume_bagasi', harga_sewa='$harga_sewa', periode_mulai='$periode_mulai', periode_akhir='$periode_akhir',
            tanggal_terakhir_servis='$tanggal_terakhir_servis' WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/listMobilPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/listMobilPage.php"
                    </script>';
            }
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  