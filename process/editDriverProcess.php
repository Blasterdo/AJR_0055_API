<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_driver = $_POST['id_driver'];
        $nama_driver = $_POST['nama_driver'];
        $alamat_driver = $_POST['alamat_driver'];
        $no_telp_driver = $_POST['no_telp_driver'];
        $bahasa = $_POST['bahasa'];
        $tarif_driver = $_POST['tarif_driver'];
        $sim_driver = $_POST['sim_driver'];
        $napza_driver = $_POST['napza_driver'];
        $surat_jiwa_driver = $_POST['surat_jiwa_driver'];
        $surat_jasmani_driver = $_POST['surat_jasmani_driver'];
        $skck_driver = $_POST['skck_driver'];
        
        $queryUpdate = mysqli_query($con, "UPDATE driver SET nama_driver='$nama_driver', alamat_driver='$alamat_driver', no_telp_driver='$no_telp_driver', bahasa='$bahasa', tarif_driver='$tarif_driver', sim_driver='$sim_driver', napza_driver='$napza_driver', surat_jiwa_driver='$surat_jiwa_driver', surat_jasmani_driver='$surat_jasmani_driver', skck_driver='$skck_driver' WHERE id_driver = '$id_driver'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listDriverPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listDriverPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  