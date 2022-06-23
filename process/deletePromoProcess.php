<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_promo = $_GET['id'];
        $queryDelete = mysqli_query($con, "UPDATE promo SET status_promo='Kadaluarsa' WHERE id_promo='$id_promo'") or die(mysqli_error($con));
        if($queryDelete){
            echo
                '<script>
                alert("Delete Success"); window.location = "../page/listPromoPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Delete Failed"); window.location = "../page/listPromoPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  