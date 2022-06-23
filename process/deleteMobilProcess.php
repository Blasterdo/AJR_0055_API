<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_mobil = $_GET['id'];
        $queryDelete = mysqli_query($con, "UPDATE mobil SET status_mobil='Berhenti' WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script>
                alert("Delete Success"); window.location = "../page/listMobilPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Delete Failed"); window.location = "../page/listMobilPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  