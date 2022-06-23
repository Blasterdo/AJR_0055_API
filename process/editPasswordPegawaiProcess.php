<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_pegawai = $_POST['id_pegawai'];
        $password_pegawai_lama = $_POST['password_pegawai_lama'];
        $password_pegawai_baru = password_hash($_POST['password_pegawai_baru'], PASSWORD_DEFAULT);

        $querycek = mysqli_query($con, "SELECT password_pegawai FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));;
        $cek = mysqli_fetch_array($querycek);

        if(password_verify($password_pegawai_lama, $cek[0]))
        {
            $queryUpdate = mysqli_query($con, "UPDATE pegawai SET password_pegawai ='$password_pegawai_baru' WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/profilPegawaiPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/profilPegawaiPage.php"
                    </script>';
            }
        }
        else
        {
            echo
                '<script>
                alert("Old Password is Incorrect!"); window.location = "../page/profilPegawaiPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  