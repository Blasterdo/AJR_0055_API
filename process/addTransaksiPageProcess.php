<?php
    if(isset($_GET['id_driver']) || isset($_GET['id_mobil']) || isset($_GET['id_promo'])){
        include ('../db.php');

        $dataDriver = NULL;
        $dataMobil = NULL;
        $dataPromo = NULL;

        if(isset($_GET['id_driver']))
        {
            $id_driver = $_GET['id_driver'];
            $dataDriver = mysqli_query($con, "SELECT * FROM driver WHERE id_driver='$id_driver'") or die(mysqli_error($con));
            session_start();
            $_SESSION['driver'] = mysqli_fetch_array($dataDriver);
        }
        else if(isset($_GET['id_mobil']))
        {
            $id_mobil = $_GET['id_mobil'];
            $dataMobil = mysqli_query($con, "SELECT * FROM mobil WHERE id_mobil='$id_mobil'") or die(mysqli_error($con));
            session_start();
            $_SESSION['mobil'] = mysqli_fetch_array($dataMobil);
        }else{
            $id_promo = $_GET['id_promo'];
            $dataPromo = mysqli_query($con, "SELECT * FROM promo     WHERE id_promo='$id_promo'") or die(mysqli_error($con));
            session_start();
            $_SESSION['promo'] = mysqli_fetch_array($dataPromo);
        }
            

        if($dataDriver){
            echo
                '<script>
                alert("Choose Driver Success"); window.location = "../page/addTransaksiPage.php"
                </script>';
        }else if($dataMobil){
            echo
                '<script>
                alert("Choose Mobil Success"); window.location = "../page/addTransaksiPage.php";
                </script>';
        }else if($dataPromo){
            echo
                '<script>
                alert("Choose Promo Success"); window.location = "../page/addTransaksiPage.php";
                </script>';
        }else{
            echo
                '<script>
                alert("Choose Driver or Mobil Failed"); window.location = "../page/addTransaksiPage.php"
                </script>';
        }
    }
    else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  