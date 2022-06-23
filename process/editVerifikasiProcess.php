<?php
    if(isset($_POST['pembayaran']) || isset($_POST['transaksi'])){
        include('../db.php');
        
        $id_transaksi = $_GET['id'];
        $status = "";

        if(isset($_POST['pembayaran']))
        {
            $status="Selesai";
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi='$status' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        }
        else
        {
            session_start();
            $user=$_SESSION['user'];
            $status="Sudah diverifikasi";
            $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi='$status', id_pegawai='$user[0]' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
            $queryUpdateMobil = mysqli_query($con, "UPDATE mobil SET status_mobil='Sedang digunakan' WHERE id_mobil=(SELECT id_mobil FROM transaksi WHERE id_transaksi='$id_transaksi')") or die(mysqli_error($con));
            $queryUpdateDriver = mysqli_query($con, "UPDATE driver SET status='Sibuk' WHERE id_driver=(SELECT id_driver FROM transaksi WHERE id_transaksi='$id_transaksi')") or die(mysqli_error($con));
        }
            
        if(isset($_POST['pembayaran']))
        {
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/verifikasiPembayaranPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/verifikasiPembayaranPage.php"
                    </script>';
            }
        }
        else
        {
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/verifikasiTransaksiPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/verifikasiTransaksiPage.php"
                    </script>';
            }
        }

    }
    else if(isset($_POST['batal'])){
        include('../db.php');
        
        $id_transaksi = $_POST['id_transaksi'];
        $alasan = $_POST['alasan'];
        
        $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi=CONCAT('Dibatalkan(','$alasan',')') WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/verifikasiTransaksiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/verifikasiTransaksiPage.php"
                </script>';
        }
    }
    else if(isset($_POST['invalid'])){
        include('../db.php');
        
        $id_transaksi = $_GET['id'];
        
        $queryUpdate = mysqli_query($con, "UPDATE transaksi SET status_transaksi='Belum membayar' WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($con));
        
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/verifikasiPembayaranPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/verifikasiPembayaranPage.php"
                </script>';
        }
    }
    else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  