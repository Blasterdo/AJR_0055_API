<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    $user=$_SESSION['user'];
    $query=mysqli_query($con, "SELECT * FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>PROFIL CUSTOMER</h4>
        <hr>
        <form action="./editCustomerPage.php?id=<?php echo $user[0]?>" method="post">
            <table>
                <tr>
                    <td>
                        ID Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[1]?><?php echo $user[0]?>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Nama Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[2]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Alamat Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[3]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanggal Lahir Customer
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[4]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Jenis Kelamin
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[5]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[6]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Nomor Telepon
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <?php echo $user[7]?>
                    </td>
                </tr>

                <tr>
                    <td>
                        SIM
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <div>
                            <img class="img-thumbnail" width="25%" src="<?php echo $user[8]?>" alt="SIM Not Found"> 
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        Tanda Pengenal
                    </td>
                    <td>
                        :&nbsp&nbsp&nbsp
                    </td>
                    <td>
                        <div>
                            <img class="img-thumbnail" width="25%" src="<?php echo $user[9]?>" alt="Tanda Pengenal Not Found"> 
                        </div>
                    </td>
                </tr>
            </table>

            <div class="mt-3 d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="edit">Edit Profil</button>
            </div>
        </form>

        <form action="./editPasswordCustomerPage.php?id=<?php echo $user[0]?>" method="post">
            <div class="mt-3 d-grid gap-2">
                    <button href="" type="submit" class="btn btn-primary" name="edit">Ubah Password</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>