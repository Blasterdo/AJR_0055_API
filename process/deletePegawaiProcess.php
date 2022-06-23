<?php
    if(isset($_GET['id'])){
        include ('../db.php');
        $id_pegawai = $_GET['id'];
        $id_pegawai_cek = $_GET['id_pegawai_cek'];
        $cek = mysqli_query($con, "SELECT * FROM pegawai p JOIN detail_jadwal dj ON (p.id_pegawai=dj.id_pegawai) WHERE p.id_pegawai='$id_pegawai'") or die(mysqli_error($con));
        
        if($id_pegawai_cek == $id_pegawai)
        {
            echo
            '<script>
                alert("Cannot Delete Your Self"); window.location = "../page/listPegawaiPage.php"
            </script>';
        }
        else
        {
            if(!(mysqli_num_rows($cek)==0))//pegawai punya jadwal
            {
                echo
                    '<script>
                    alert("Deleting All Pegawai Jadwal"); window.location = "../page/listPegawaiPage.php"
                    </script>';
                $queryDeleteJadwal= mysqli_query($con, "DELETE FROM detail_jadwal WHERE id_pegawai='$id_pegawai'");
                // echo'
                //     <script>
                //     var temp = confirm("This Pegawai has Jadwal, are you sure?");
                //     if(temp){';
                //         $queryDeleteJadwal= mysqli_query($con, "DELETE FROM detail_jadwal WHERE id_pegawai='$id_pegawai'");
                //         echo'
                //     }
                //     else{
                //         alert("Delete Canceled");';
                //         return;
                //         echo'
                //     }
                //     </script>';
            }

            $queryDelete = mysqli_query($con, "UPDATE pegawai SET status_pegawai='Tidak Aktif' WHERE id_pegawai='$id_pegawai'") or die(mysqli_error($con));
            if($queryDelete){
                echo
                    '<script>
                    alert("Delete Pegawai Success"); window.location = "../page/listPegawaiPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Delete Pegawai Failed"); window.location = "../page/listPegawaiPage.php"
                    </script>';
            }
        }
    }else {
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>  