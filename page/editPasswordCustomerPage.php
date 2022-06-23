<?php
    include '../component/sidebarCustomer.php';
?>
<?php
    $user=$_SESSION['user'];
    $query=mysqli_query($con, "SELECT id_customer, nama FROM customer WHERE id_customer='$user[0]'") or die(mysqli_error($con));
    $user=mysqli_fetch_array($query);
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>UBAH PASSWORD CUSTOMER | <?php echo $user[1]?></h4>
        <hr>
        <form action="../process/editPasswordCustomerProcess.php" method="post">
            <input type="hidden" name="id_customer" value="<?php echo $user[0]?>">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password Lama</label>
                <input type="password" class="form-control" placeholder="Masukkan Password Lama.." id="password_customer_lama" name="password_customer_lama" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password Baru</label>
                <input type="password" class="form-control" placeholder="Masukkan Password Baru.." id="password_customer_baru" name="password_customer_baru" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" onClick="return confirm ('Yakin ubah password?')" name="edit">Edit Password</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>