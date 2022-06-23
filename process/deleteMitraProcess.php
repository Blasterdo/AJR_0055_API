<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_pemilik = $_GET['id'];
        
        $cek = mysqli_query($con, "SELECT * FROM mobil WHERE id_pemilik='$id_pemilik' AND status_mobil='Tersedia'") or die(mysqli_error($con));
        if(mysqli_num_rows($cek)==0)
        {
            $queryDelete = mysqli_query($con, "UPDATE mitra SET status_mitra='Berhenti' WHERE id_pemilik='$id_pemilik'") or die(mysqli_error($con));
            if($queryDelete){
                echo
                    '<script>
                    alert("Delete Success"); window.location = "../page/listMitraPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Delete Failed"); window.location = "../page/listMitraPage.php"
                    </script>';
            }
        }
        else
        {
            echo
                '<script>
                alert("This Mitra has Mobil"); window.location = "../page/listMitraPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  