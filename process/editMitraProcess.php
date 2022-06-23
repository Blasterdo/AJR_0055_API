<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_pemilik = $_POST['id_pemilik'];
        $nama_pemilik = $_POST['nama_pemilik'];
        $alamat_pemilik = $_POST['alamat_pemilik'];
        $no_telp_pemilik = $_POST['no_telp_pemilik'];

        $queryUpdate = mysqli_query($con, "UPDATE mitra SET nama_pemilik='$nama_pemilik', alamat_pemilik='$alamat_pemilik', no_telp_pemilik='$no_telp_pemilik' WHERE id_pemilik='$id_pemilik'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listMitraPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listMitraPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  