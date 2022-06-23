<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_driver = $_GET['id'];

        $querycek = mysqli_query($con, "SELECT status FROM driver WHERE id_driver='$id_driver'") or die(mysqli_error($con));
        $datacek=mysqli_fetch_array($querycek);
        if($data[0]=='Sibuk'){
            echo
                '<script>
                alert("Delete Gagal, Driver sedang bertugas"); window.location = "../page/listDriverPage.php"
                </script>';
            return;
        }
        $queryDelete = mysqli_query($con, "UPDATE driver SET status='Tidak Aktif' WHERE id_driver='$id_driver'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script>
                alert("Delete Success"); window.location = "../page/listDriverPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Delete Failed"); window.location = "../page/listDriverPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  