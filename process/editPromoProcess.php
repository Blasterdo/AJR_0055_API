<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_promo = $_POST['id_promo'];
        $kode_promo = $_POST['kode_promo'];
        $jenis = $_POST['jenis'];
        $keterangan = $_POST['keterangan'];
        $diskon = $_POST['diskon'];
        $status_promo = $_POST['status_promo'];

        $cekDuplicate = mysqli_query($con, "SELECT kode_promo FROM promo WHERE id_promo = '$id_promo'") or die(mysqli_error($con));
        $cek = mysqli_query($con, "SELECT * FROM promo WHERE kode_promo = '$kode_promo'") or die(mysqli_error($con));
        $data = mysqli_fetch_array($cekDuplicate);

        if($data[0]==$kode_promo)
        {

        }
        else
        {
            if(!(mysqli_num_rows($cek) == 0)){
            echo
                '<script>
                alert("Kode has been Taken"); window.history.back()
                </script>';
                return;
            }
        }

        $queryUpdate = mysqli_query($con, "UPDATE promo SET kode_promo='$kode_promo', jenis='$jenis', keterangan='$keterangan', diskon='$diskon', status_promo='$status_promo' WHERE id_promo='$id_promo'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listPromoPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listPromoPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  