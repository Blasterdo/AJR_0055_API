<?php
    if(isset($_POST['edit'])){
        include('../db.php');
        
        $id_customer = $_POST['id_customer'];
        $password_customer_lama = $_POST['password_customer_lama'];
        $password_customer_baru = password_hash($_POST['password_customer_baru'], PASSWORD_DEFAULT);

        $querycek = mysqli_query($con, "SELECT password_customer FROM customer WHERE id_customer='$id_customer'") or die(mysqli_error($con));;
        $cek = mysqli_fetch_array($querycek);

        if(password_verify($password_customer_lama, $cek[0]))
        {
            $queryUpdate = mysqli_query($con, "UPDATE customer SET password_customer ='$password_customer_baru' WHERE id_customer='$id_customer'") or die(mysqli_error($con));
            if($queryUpdate){
                echo
                    '<script>
                    alert("Edit Success"); window.location = "../page/profilCustomerPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Failed"); window.location = "../page/profilCustomerPage.php"
                    </script>';
            }
        }
        else
        {
            echo
                '<script>
                alert("Old Password is Incorrect!"); window.location = "../page/profilCustomerPage.php"
                </script>';
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  