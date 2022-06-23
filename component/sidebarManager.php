<?php
    session_start();
    if (!$_SESSION['isLoginManager']) {
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
            <title>Atma Jogja Rental | Manager</title>
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
                                <div class="content-menu">
                                    <i class="fa fa-columns"></i>
                                    <a href="./profilPegawaiPage.php" style="font-weight:600" >Dashboard</a>
                                </div>
                                <div class="content-menu">
                                    <i class="fa fa-ticket"></i>
                                    <a href="./listPromoPage.php" style="font-weight:600">List Promo</a>
                                </div>
                                <div class="content-menu">
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addPromoPage.php" style="font-weight:600">Add Promo</a>
                                </div>
                                <div class="content-menu">
                                    <i class="fa fa-calendar"></i>
                                    <a href="./listJadwalPegawaiPage.php" style="font-weight:600">List Jadwal Pegawai</a>
                                </div>
                                <div class="content-menu">
                                    <i class="fa fa-plus-square"></i>
                                    <a href="./addJadwalPegawaiPage.php" style="font-weight:600">Add Jadwal Pegawai</a>
                                </div>
                                <div class="content-menu">
                                    <i class="fa fa-sign-out"></i>
                                    <a href="../process/logoutProcess.php" style="font-weight:600">Logout</a>
                                </div>
                            </div>
                        </div>
        '
?>