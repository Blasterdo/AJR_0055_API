<?php
    if(isset($_GET['id_mobil']) || isset($_GET['id_driver']) || isset($_GET['id_promo'])){
        include ('../db.php');

        if(isset($_GET['id_driver']))
        {
            session_start();
            $_SESSION['driver'] = NULL;
        }
        else if(isset($_GET['id_mobil']))
        {
            session_start();
            $_SESSION['mobil'] = NULL;
        }
        else
        {
            session_start();
            $_SESSION['promo'] = NULL;
        }
        
        echo
            '<script>
            window.history.back(); window.location = "../page/editTransaksiPage.php"
            </script>';
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  