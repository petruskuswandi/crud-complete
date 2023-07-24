<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.css"></script>
</head>
<body>
    <script>
        function validateForm() {
        var judul = document.getElementById("judul").value;
        var pengarang = document.getElementById("pengarang").value;
        var tahun_terbit = document.getElementById("tahun_terbit").value;
        var isbn = document.getElementById("isbn").value;

        if (judul.trim() === "" || pengarang.trim() === "" || tahun_terbit.trim() === "" || isbn.trim() === "") {
            alert("All fields are required.");
            return false;
        }

        if (isNaN(tahun_terbit) || tahun_terbit.length !== 4) {
            alert("Please enter a valid 4-digit year for Tahun Terbit.");
            return false;
        }

        return true;
    }
    </script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">DIGITAL TALENT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Programming
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">PHP</a></li>
            <li><a class="dropdown-item" href="#">ASP</a></li>
            <li><a class="dropdown-item" href="#">AJAX</a></li>
            <li><a class="dropdown-item" href="#">jQuery</a></li>
            <li><a class="dropdown-item" href="">MySQL</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Software
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Enigma Camp</a></li>
            <li><a class="dropdown-item" href="#">VSGA JWD-E Universitas Telkom</a></li>
            <li><a class="dropdown-item" href="#">Coding Studio</a></li>
            <li><a class="dropdown-item" href="#">MySkill</a></li>
            <li><a class="dropdown-item" href="">Kawah Edukasi</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div class="container col-md-6 mt-4">
        <h1>TABEL INVENTARIS</h1>
        <div class="card">
            <div class="card-header">
                Edit Buku
            </div>
            <div class="card-body">
                <?php
                    include('conn.php');

                    $id_buku = $_GET['id_buku'];

                    $data = mysqli_query($koneksi, "SELECT * FROM perpustakaan WHERE id_buku = '$id_buku';");
                    $row = mysqli_fetch_assoc($data);
                ?>
                <form action="" method="post" role="form" onsubmit="return validateForm();">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="masukan nama" value="<?= $row['judul'] ?>">
                        <input type="hidden" name="id_buku" value="<?= $row['id_buku']; ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="pengarang" class="form-label">Pengarang</label>
                      <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="masukan nama pengarang" value="<?= $row['pengarang']; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                      <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="masukan tahun terbit" value="<?= $row['tahun_terbit'] ?>">
                    </div>
                    <div class="mb-3">
                      <label for="isbn" class="form-label">ISBN</label>
                      <input type="text" class="form-control" id="isbn" name="isbn" placeholder="masukan ISBN" value="<?= $row['isbn'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
                </form>

                <?php
                    include ('conn.php');

                    if (isset($_POST['submit'])) {
                        $id_buku = $_POST['id_buku'];
                        $judul = $_POST['judul'];
                        $pengarang = $_POST['pengarang'];
                        $tahun_terbit = $_POST['tahun_terbit'];
                        $isbn = $_POST['isbn'];

                        $datas = mysqli_query($koneksi, "UPDATE perpustakaan SET judul = '$judul', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', isbn = '$isbn' WHERE id_buku = '$id_buku';") or die(mysqli_error($koneksi));

                        if ($datas) {
                          // Data insertion is successful, show SweetAlert2 success message
                          echo "<script>
                              Swal.fire({
                                  title: 'Berhasil!',
                                  text: 'Data berhasil disimpan.',
                                  icon: 'success',
                                  confirmButtonColor: '#00a65a',
                                  allowOutsideClick: false
                              }).then(() => {
                                  window.location.href = 'index.php';
                              });
                          </script>";
                      }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>