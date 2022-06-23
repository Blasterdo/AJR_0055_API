<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];
        $id_jadwalcek = $_POST['id_jadwalcek'];
        
        $cekDuplicate = mysqli_query($con, "SELECT * FROM detail_jadwal WHERE id_pegawai='$id_pegawai' AND id_jadwal='$id_jadwal'");
        if($id_jadwalcek==$id_jadwal)
        {
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listJadwalPegawaiPage.php"
                </script>';
        }
        else{
            if(!(mysqli_num_rows($cekDuplicate) == 0)){
                echo
                    '<script>
                    alert("Jadwal has been Taken"); window.history.back()
                    </script>';
                    return;
            }
        }

        $queryUpdate = mysqli_query($con, "UPDATE detail_jadwal SET id_jadwal='$id_jadwal' WHERE id_pegawai='$id_pegawai' AND id_jadwal='$id_jadwalcek'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listJadwalPegawaiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listJadwalPegawaiPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  