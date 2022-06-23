<?php
    session_start();
    if (!$_SESSION['isLoginCS']) {
        header("location: ../page/loginPage.php");
    }else {
        include('../db.php');
    }

    $user = $_SESSION['user'];
    $id = $_GET['id'];
    $queryNota = mysqli_query($con, "SELECT t.format_transaksi, t.id_transaksi, t.id_pegawai, t.id_driver, t.id_promo, t.id_mobil, t.tgl_transaksi, t.tgl_waktu_mulai, t.tgl_waktu_selesai, 
    t.subtotal_transaksi, t.biaya_ekstensi_pembayaran, t.diskon_pembayaran, t.jumlah_pembayaran, c.nama, pr.kode_promo, p.nama_pegawai, d.nama_driver, mb.nama_mobil, mb.harga_sewa, d.tarif_driver, TIMESTAMPDIFF(minute, tgl_waktu_mulai, tgl_waktu_selesai), t.tgl_waktu_pengembalian FROM transaksi t 
    JOIN customer c ON (c.id_customer=t.id_customer) JOIN mobil mb ON (mb.id_mobil=t.id_mobil) JOIN pegawai p ON (p.id_pegawai=t.id_pegawai) 
    LEFT JOIN driver d ON (d.id_driver=t.id_driver) LEFT JOIN promo pr ON (pr.id_promo=t.id_promo) 
    WHERE id_transaksi='$id'") or die(mysqli_error($con));
    
    $data = mysqli_fetch_array($queryNota);
    $jam = floor($data[20]/60);
    $hari = ceil($jam/24);

    $tgl_waktu_mulai=date('Y-m-d, H:i', strtotime($data[7]));
    $tgl_waktu_selesai=date('Y-m-d, H:i', strtotime($data[8]));
    $tgl_waktu_kembali=date('Y-m-d, H:i', strtotime($data[21]));
?>

<html>
    <head>

     <!-- <link rel="stylesheet" href="index.css"> -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <title>Cetak Nota</title>
            <style>

                @media print{
                    .btnP { 
                        display: none;
                    }
                }

                /* #tabel{ */
                    /* font-size:15px; */
                    /* border-collapse:collapse; */
                /* } */


                #tabel  td{
                    padding-left:5px;
                    /* border: 1px solid black; */
                }

                td{
                border-bottom: 1px solid #333;
                }

                th{
                border-bottom: 1px solid #333;
                }

                .g2{
                border-bottom: 1px solid #333;
                }

            </style>
        </head>

        <body style='font-family:tahoma; font-size:8pt;'>
        <div class="container" style="margin-top: 20px;">
            
        <center>
            <h4>Nota Transaksi</br>Atma Jogja Rental</h4>
            <hr width="50%">
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '1'>
                <td align='left'  vertical-align:'top'>
                    <div style='font-size:12pt; text-align:center; font-weight: bold;'>Atma Rental</div></br>
                        <label for="exampleInputEmail1" style="margin-left:5px" class="form-label"><?php echo $data[0];?><?php echo $data[1];?></label>
                        <label for="exampleInputEmail1" style="margin-left:350px" class="form-label"><?php echo $data[6];?></label>
                    </div>
                </td>
            </table>
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '1'>
                <tr>
                    <td> 
                        <label for="exampleInputEmail1" style="margin-left:5px;" class="form-label">Cust</label>
                    </td>
                    <td>
                        <label for="exampleInputEmail1"  class="form-label"><?php echo $data[13];?>
                    </td>
                    <td> 
                        <label for="exampleInputEmail1" style="margin-left:5px;" class="form-label">PRO: </label>
                    </td>    
                    <td>
                        <?php
                        if(empty($data[4])){
                            echo'
                            <label for="exampleInputEmail1"  class="form-label">-</label> 
                            ';
                        }
                           echo'
                           <label for="exampleInputEmail1"  class="form-label">'.$data[14].'</label>
                           '; 
                        ?>
                         
                    </td>
                    
                </tr>
                <tr>
                    <td> 
                        <label for="exampleInputEmail1" style="margin-left:5px;" class="form-label">CS</label>
                    </td>
                    <td>
                        <label for="exampleInputEmail1"  class="form-label"><?php echo $data[15];?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td> 
                        <label for="exampleInputEmail1" style="margin-left:5px;" class="form-label">DRV</label>
                    </td>
                    <td>
                    <?php
                        if(empty($data[3])){
                            echo'
                            <label for="exampleInputEmail1"  class="form-label">-</label> 
                            ';
                        }
                           echo'
                           <label for="exampleInputEmail1"  class="form-label">'.$data[16].'</label>
                           '; 
                        ?>
                    </td>
                    <td></td><td></td>
                </tr>
            </table>

            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;border-top: thin;' border = '1'>
                    <td width='100%' align='left'  vertical-align:top' >
                        <div style='font-size:12pt; text-align:center'><br></div>
                    </td>
            </table>
                
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '1'>
                <td width='100%' align='left'  vertical-align:top'>
                    <div style='font-size:12pt; text-align:center; font-weight: bold;'>Nota Transaksi</div>
                </td>
            </table>
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '1'>
                <tr>
                    <td>Tgl Mulai</td>
                    <td><?php echo $tgl_waktu_mulai;?></td>
                    <td></td><td></td>
                </tr>
                <tr>
                    <td>Tgl Selesai</td>
                    <td><?php echo $tgl_waktu_selesai;?></td>
                    <td></td><td></td>
                </tr>
                <tr>
                    <td>Tgl Pengembalian</td>
                    <td><?php echo $tgl_waktu_kembali;?></td>
                    <td></td><td></td>
                </tr>
                <tr>
                    <th>Item</td>
                    <th>Satuan</td>
                    <th>Durasi</td>
                    <th>Sub Total</td>
                </tr>
                <tr>
                    <td><?php echo $data[17];?></td>
                    <td><?php echo $data[18];?></td>
                    <td><?php echo $hari;?> Hari</td>
                    <td><?php echo $data[18]*$hari;?></td>
                </tr>
                <tr>
                    <?php
                    if(empty($data[3])){
                        echo'
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        ';
                    }
                    else{
                        echo'
                        <td>Driver '.$data[16].'</td>
                        <td>'.$data[19].'</td>
                        <td>'.$hari.' Hari</td>
                        <td>'.$data[19]*$hari.'</td>
                        ';
                    }
                    ?>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-weight: bold;"><?php echo ($data[18]*$hari)+($data[19]*$hari)?></td>
                </tr>
                        
                

            
                <tr height="20px" style="border-top: solid">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Cust</td>
                    <td>CS</td>
                    <td>Disc</td>
                    <td><?php echo $data[11]?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Denda</td>
                    <td><?php echo $data[10]?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo (($data[18]*$hari)+($data[19]*$hari)+$data[10])-$data[11]?></td>
                </tr>
                <tr>
                    <td><?php echo $data[13]?></td>
                    <td><?php echo $data[15]?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <div class="btnP" style=" margin-top:50px">
                <button type="button" style="font-weight: bold;" class="btn btn-primary" onclick="window.print()" >Cetak Kartu</button>
            </div>
        </center>
    </div>
    </body>
</html>