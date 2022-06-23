<?php
    include ('../db.php');

    $query = mysqli_query($con, "SELECT count(*) FROM driver") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
    $id_driver = $_GET['id_driver'];
    while(true){
        $id = rand(1, $data[0]);
        $find = mysqli_query($con, "SELECT * FROM driver WHERE id_driver='$id' AND status='Aktif' AND id_driver!='$id_driver'") or die(mysqli_error($con));
        if(mysqli_num_rows($find)){
            $driver = mysqli_fetch_array($find);
            session_start();
            $_SESSION['driver'] = $driver;
            echo
                '<script>
                alert("Random Driver Success"); window.location = "../page/editTransaksiPage.php"
                </script>';
            return;
        }
    }
    //ga tau gimana cara conver query jadi array
    // $temp = mysqli_fetch_array($query);
    // $idArr = $temp[0];
    // var_dump();
    // getch();

    if($find){
        echo
            '<script>
            alert("Random Driver Success"); window.location = "../page/editTransaksiPage.php"
            </script>';
    }else{
        echo
            '<script>
            alert("Random Driver Failed"); window.location = "../page/editTransaksiPage.php"
            </script>';
    }
?>  