<?php
    include '../component/sidebarCS.php'
?>
<?php
    $id=$_GET['id'];
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>TAMBAH JADWAL</h4>
        
        <form action="../process/editVerifikasiProcess.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alasan Pembatalan</label>
                <input required class="form-control" id="alasan" name="alasan" placeholder="Masukkan Alasan Anda.." aria-describedby="emailHelp">
                <small>Usahakan isi sesingkat mungkin(20 kata)</small>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-danger" name="batal">Batal Transaksi</button>
            </div>
        </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    