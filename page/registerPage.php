<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet">
    
    <title>Register Page</title>
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">Atma Jogja Rental</a>
            </div>
        </nav>

    <div class="bg bg-dark text-dark">
        <div class="container min-vh-100 mt-5 d-flex align-items-center justify-content-center">
            <div class="card text-dark bg-light ma-5 shadow " style="min-width: 25rem;">
                <div class="card-header fw-bold">Register</div>
                <div class="card-body">
                    <form action="../process/registerProcess.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input class="form-control" placeholder="Masukkan Nama.." id="nama" name="nama" required aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input class="form-control" placeholder="Masukkan Alamat.." id="alamat" name="alamat" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" id="tgl_lahir_customer" name="tgl_lahir_customer" min="1945-01-01" max="<?php echo date("Y-m-d");?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select required class="form-select" aria-label="Default select example" name="jenis_kelamin_customer" id="jenis_kelamin_customer">
                                <option value="" selected hidden>Jenis Kelamin Anda..</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan Email.." id="email" name="email" required aria-describedby="emailHelp">
                            <small>Cth:example@example.com</small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" placeholder="Masukkan Nomor telepon.." id="nomor_telepon" name="nomor_telepon" required pattern="[0]{1}[8]{1}[0-9]{8,10}" aria-describedby="emailHelp">
                            <small>Format:08xx... (xx... 8-10 digit)</small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">SIM</label>
                            <input type="url" class="form-control" placeholder="Masukkan Link Foto SIM.." id="sim" name="sim" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanda Pengenal</label>
                            <input type="url" class="form-control" placeholder="Masukkan Link Tanda Pengenal Kartu Pelajar/KTP" id="tanda_pengenal" name="tanda_pengenal" aria-describedby="emailHelp">
                            <!-- <select required class="form-select" aria-label="Default select example" name="tanda_pengenal" id="tanda_pengenal">
                                <option value="" selected hidden>Tanda Pengenal..</option>
                                <option value="KTP">Kartu Tanda Penduduk</option>
                                <option value="Kartu Pelajar">Kartu Pelajar</option>
                            </select> -->
                        </div>

                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                        </div>
                    </form>
                    <p class="mt-2 mb-0">Sudah punya akun ? <a href="./loginPage.php" class="text-primary">Login Disini!</a></p>
              </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>