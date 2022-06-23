<?php
    include '../component/sidebarManager.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >TAMBAH PROMO</h4>
        <hr>
        <form action="../process/createPromoProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input required class="form-control" id="kode_promo" placeholder="Masukkan Kode Promo.." name="kode_promo" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Diskon</label>
                <input required type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukkan Persentase Diskon.." aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis</label>
                <input class="form-control" placeholder="Masukkan Jenis Promo.." id="jenis" name="jenis" required aria-describedby="emailHelp">
            </div> 

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                <input class="form-control" placeholder="Masukkan Keterangan Promo.." type="text" id="keterangan" name="keterangan" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="register">Tambah Promo</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>