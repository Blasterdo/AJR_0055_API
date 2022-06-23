<?php
    session_start();
    if (!$_SESSION['isLoginAdmin']) {
     header("location: ../page/loginPage.php");
    }else {
        include('../db.php');
    }
    echo '
        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
           
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="./style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
            <title>Atma Jogja Rental | Admin</title>
            <link href="../ajr.png" rel="shortcut icon">
            <style>
                td{
                    padding-bottom: 15px;
                }
                *{
                    font-family: "Quicksand", sans-serif;
                }

                .side-bar {
                    width: 260px;
                    background-color: #16347A;
                    min-height: 100vh;
                }

                a {
                    padding-left: 10px;
                    font-size: 13px;
                    text-decoration: none;
                    color: white;
                }

                .menu i {
                    padding-left: 20px;
                }

                .menu .content-menu {
                    padding: 9px 7px;
                }

                .isActive {
                    background-color: #071853 !important;
                    border-right: 8px solid #010E2F;
                }

                i{
                    color:white;
                }
                
                input[type=number]::-webkit-inner-spin-button, 
                input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
                margin: 0; 
                }
                </style>
            </head>

            <body>

                <aside >
                    <div class="d-flex">
                       <div class="side-bar">
                            <h2 class="text-light text-center pt-2">Atma <br>Jogja Rental</h2>
                            <center>
                              <img width="80%" src="../ajr.png" alt="Not Found"> 
                            </center>
                            <hr>
                            <div class="menu">
                                <div class="content-menu" >
                                    <i class="fa fa-columns"></i>
                                    <a href="./profilPegawaiPage.php" style="font-weight:600" >Dashboard</a>
                                </div>
                                <hr>
                                <div class="content-menu " >
                                    <i class="fa fa-users"></i>
                                    <a href="./listPegawaiPage.php" style="font-weight:600">List Pegawai</a>
                                </div>
                                <div class="content-menu " >
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addPegawaiPage.php" style="font-weight:600">Add Pegawai</a>
                                </div>
                                <hr>
                                <div class="content-menu " >
                                    <i class="fa fa-car"></i>
                                    <a href="./listMobilPage.php" style="font-weight:600">List Mobil</a>
                                </div>
                                <div class="content-menu " >
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addMobilPage.php" style="font-weight:600">Add Mobil</a>
                                </div>
                                <div class="content-menu position-relative" >
                                    <i class="fa fa-clock-o"></i>
                                    <a href="./listDurasiKontrakMobilPage.php" style="font-weight:600">Durasi Kontrak';
                                    $query = mysqli_query($con, "SELECT COUNT(*) FROM mobil mb JOIN mitra mt ON (mb.id_pemilik = mt.id_pemilik) WHERE mb.status_mobil !='Berhenti' AND DATEDIFF(mb.periode_akhir, CURRENT_DATE)<=30") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($query);
                                    if(empty($data)){

                                    }
                                    else
                                    {
                                        echo '
                                            <span style="margin-left: 5px" class="position-absolute top-10 start-90 translate-middle badge rounded-pill bg-danger">
                                            '.$data[0].'
                                            <span class="visually-hidden">expired contract</span>
                                            </span>
                                        ';
                                    }
                                    echo'
                                    </a>
                                </div>
                                <div class="content-menu " >
                                    <i class="fa fa-id-badge"></i>
                                    <a href="./listMitraPage.php" style="font-weight:600">List Mitra</a>
                                </div>
                                <div class="content-menu " >
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addMitraPage.php" style="font-weight:600">Add Mitra</a>
                                </div>
                                <hr>
                                <div class="content-menu " >
                                    <i class="fa fa-id-card"></i>
                                    <a href="./listDriverPage.php" style="font-weight:600">List Driver</a>
                                </div>
                                <div class="content-menu " >
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addDriverPage.php" style="font-weight:600">Add Driver</a>
                                </div>
                                <hr>
                                <div class="content-menu " >
                                    <i class="fa fa-sign-out"></i>
                                    <a href="../process/logoutProcess.php" style="font-weight:600">Logout</a>
                                </div>
                            </div>
                        </div>
        '
?>