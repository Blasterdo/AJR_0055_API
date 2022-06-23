<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_pegawai = $_GET['id'];
        $id_jadwal = $_GET['id_jadwal'];

        $queryDelete = mysqli_query($con, "DELETE FROM detail_jadwal WHERE id_pegawai='$id_pegawai' AND id_jadwal='$id_jadwal'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script>
                alert("Delete Success"); window.location = "../page/listJadwalPegawaiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Delete Failed"); window.location = "../page/listJadwalPegawaiPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  