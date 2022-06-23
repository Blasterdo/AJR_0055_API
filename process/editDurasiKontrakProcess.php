<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_mobil = $_POST['id_mobil'];
        $periode_akhir = $_POST['periode_akhir'];

        $periode_akhir_input = strtotime($_POST['periode_akhir']);
        $today = strtotime(date('Y-m-d'));

        if($periode_akhir_input<$today)
        {
            echo
                '<script>
                alert("Input Date must pass Today"); window.location = "../page/listDurasiKontrakMobilPage.php"
                </script>';
            return;
        }
        $queryUpdate = mysqli_query($con, "UPDATE mobil SET periode_akhir='$periode_akhir' WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
        if($queryUpdate){
            echo
                '<script>
                alert("Edit Success"); window.location = "../page/listDurasiKontrakMobilPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Failed"); window.location = "../page/listDurasiKontrakMobilPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  