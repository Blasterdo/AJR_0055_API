<?php
    session_start();
    if (!$_SESSION['isLoginManager'] AND !$_SESSION['isLoginAdmin'] AND !$_SESSION['isLoginCS']) {
        header("location: ../page/loginPage.php");
    }else {
        if($_SESSION['isLoginManager'])
        {
            session_abort();
            include '../component/sidebarManager.php';
        }
        else if($_SESSION['isLoginAdmin'])
        {
            session_abort();
            include '../component/sidebarAdmin.php';
        }
        else
        {
            session_abort();
            include '../component/sidebarCS.php'; 
        }
    }
?>
<?php
    $user=$_SESSION['user'];
    $query=mysqli_query($con, "SELECT * FROM pegawai p JOIN role r ON (p.id_role=r.id_role) WHERE p.id_pegawai='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>PROFIL PEGAWAI | <?php echo $user[12]?></h4>
        <hr>
        <form action="./editPasswordPage.php?id=<?php echo $user[0]?>" method="post">
            <center>
                <div class="mb-3">
                    <img class="img-thumbnail" width="25%" src="<?php echo $user[8]?>" alt="Not Found" onerror=this.src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcricdaddy.com%2Fwp-content%2Fuploads%2F2020%2F08%2Fblank-profile-picture-png.png&f=1&nofb=1"> 
                </div>
            </center>
            <hr>

            <table>
                <tr>
                    <td>
                        ID Pegawai
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[0]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Jabatan Pegawai
                    </td>
                    <td>
                        : 
                    </td>
                    <td>
                        <?php echo $user[12]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Nama Pegawai
                    </td>
                    <td>
                        : 
                    </td>
                    <td>
                        <?php echo $user[2]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Alamat Pegawai
                    </td>
                    <td>
                        : 
                    </td>
                    <td>
                        <?php if(empty($user[3])){echo '-';}else{echo $user[3];}?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Lahir Pegawai
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $user[4]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Jenis Kelamin Pegawai
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php if(empty($user[5])){echo '-';}else{echo $user[5];}?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email Pegawai
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $user[6]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Nomor Telepon Pegawai
                    </td>
                    <td>
                        :
                    </td>
                    <td>
                        <?php echo $user[7]?>
                    </td>
                </tr>
            </table>

            <div class="mt-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="edit">Ubah Password</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>