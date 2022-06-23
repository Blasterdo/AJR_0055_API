<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_pegawai = $_POST['id_pegawai'];
        $nama_pegawai = $_POST['nama_pegawai'];
        $alamat_pegawai = $_POST['alamat_pegawai'];
        $no_telp_pegawai = $_POST['no_telp_pegawai'];
        $foto_pegawai = $_POST['foto_pegawai'];

        $queryUpdate = mysqli_query($con, "UPDATE pegawai SET nama_pegawai='$nama_pegawai', alamat_pegawai='$alamat_pegawai', no_telp_pegawai='$no_telp_pegawai', foto_pegawai='$foto_pegawai' WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  