<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_customer = $_POST['id_customer'];
        $nama = $_POST['nama'];
        $alamat_customer = $_POST['alamat'];
        $tgl_lahir_customer = $_POST['tgl_lahir_customer'];
        $no_telp_customer = $_POST['nomor_telepon'];
        $sim_customer = $_POST['sim'];
        $tanda_pengenal = $_POST['tanda_pengenal'];

        // Melakukan insert ke databse dengan query dibawah ini
        $queryUpdate = mysqli_query($con, "UPDATE customer SET nama='$nama', alamat_customer='$alamat_customer', tgl_lahir_customer='$tgl_lahir_customer', no_telp_customer='$no_telp_customer', sim_customer='$sim_customer', tanda_pengenal='$tanda_pengenal' WHERE id_customer = '$id_customer'") or die(mysqli_error($con));

        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/profilCustomerPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/profilCustomerPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  