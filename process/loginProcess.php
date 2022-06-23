<?php
    // ini buat ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['login'])){

        include('../db.php'); // untuk mengoneksikan dengan databas dengan memanggil file db.php
        
        //tampung nilai yang ada di from ke variable
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email'") or die(mysqli_error($con));
        $query2 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
        $query3 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email'") or die(mysqli_error($con));
        // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> usernamenya tdk ditemukan
        if(mysqli_num_rows($query) != 0){//login sbg customer
            $user = mysqli_fetch_array($query);
            if(password_verify($password, $user[10])){
                // session adalah variabel global sementara yang disimpen di server
                // buat mulai sessionnya pake session_start()
                session_start();
                //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                $_SESSION['isLoginCustomer'] = true;
                $_SESSION['user'] = $user;
                $_SESSION['driver'] = NULL;
                $_SESSION['mobil'] = NULL;
                $_SESSION['promo'] = NULL;
                echo
                    '<script>
                    alert("Login Success"); window.location = "../page/profilCustomerPage.php"
                    </script>';
            }else {
                echo
                    '<script>
                    alert("Email or Password Invalid");
                    window.location = "../page/loginPage.php"
                    </script>';
            }
        }
        else if(mysqli_num_rows($query2) != 0){//login sbg pegawai
            $user = mysqli_fetch_array($query2);
            if(password_verify($password, $user[9])){
                $queryrole = mysqli_query($con, "SELECT id_role FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
                $role = mysqli_fetch_array($queryrole);

                if($user[10]=="Tidak Aktif")//cek akun sudah tidak diaktifkan atau tidak/didelete
                {
                    echo
                    '<script>
                        alert("Account Has beed unActivated");
                        window.location = "../page/loginPage.php"
                    </script>';
                }
                else
                {
                    if($role['id_role'] == 1)//manager
                    {
                        // session adalah variabel global sementara yang disimpen di server
                        // buat mulai sessionnya pake session_start()
                        session_start();
                        //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                        $_SESSION['isLoginManager'] = true;
                        $_SESSION['isLoginAdmin'] = false;
                        $_SESSION['isLoginCS'] = false;
                        $_SESSION['user'] = $user;
                        echo
                            '<script>
                            alert("Login Success sebagai Manager"); window.location = "../page/profilPegawaiPage.php"
                            </script>';
                    }
                    else if($role['id_role'] == 2)//Admin
                    {
                        // session adalah variabel global sementara yang disimpen di server
                        // buat mulai sessionnya pake session_start()
                        session_start();
                        //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                        $_SESSION['isLoginManager'] = false;
                        $_SESSION['isLoginAdmin'] = true;
                        $_SESSION['isLoginCS'] = false;
                        $_SESSION['user'] = $user;
                        echo
                            '<script>
                            alert("Login Success sebagai Admin"); window.location = "../page/profilPegawaiPage.php"
                            </script>';
                    }
                    else if($role['id_role'] == 3)//CS
                    {
                        // session adalah variabel global sementara yang disimpen di server
                        // buat mulai sessionnya pake session_start()
                        session_start();
                        //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                        $_SESSION['isLoginManager'] = false;
                        $_SESSION['isLoginAdmin'] = false;
                        $_SESSION['isLoginCS'] = true;
                        $_SESSION['user'] = $user;
                        echo
                            '<script>
                            alert("Login Success sebagai CS"); window.location = "../page/profilPegawaiPage.php"
                            </script>';
                    }
                }
            }
            else 
            {
                echo
                    '<script>
                    alert("Email or Password Invalid");
                    window.location = "../page/loginPage.php"
                    </script>';
            }
        }else if(mysqli_num_rows($query3) != 0){//login sbg driver
            $user = mysqli_fetch_array($query3);
            if(password_verify($password, $user[10])){
                // session adalah variabel global sementara yang disimpen di server
                // buat mulai sessionnya pake session_start()
                session_start();
                //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
                $_SESSION['isLoginDriver'] = true;
                $_SESSION['user'] = $user;
                echo
                    '<script>
                    alert("Login Success"); window.location = "../page/dashboardPageDriver.php"
                    </script>';
            }else {
                echo
                    '<script>
                    alert("Email or Password Invalid");
                    window.location = "../page/loginPage.php"
                    </script>';
            }
        }else{
            echo
                '<script>
                alert("Email not found!"); window.location = "../page/loginPage.php"
                </script>';
        }
    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>