<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPUSTAKAAN</title>
    <!-- Local assets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.min.css"></script>

    <!-- CDN asset -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>
<body>
    <script>
      
  $(document).on('click', '#btn-hapus', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00a65a',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: link,
          type: 'GET',
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              Swal.fire(
                'Dihapus',
                response.message,
                'success'
              ).then(() => {
                location.reload();
              });
            } else {
              Swal.fire(
                'Gagal!',
                response.message,
                'error'
              );
            }
          },
          error: function() {
            Swal.fire(
              'Gagal!',
              'Terjadi kesalahan saat menghapus data.',
              'error'
            )
          }
        })
      }
    });
  })
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
            <li><a class="dropdown-item" href="#">MySQL</a></li>
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
            <li><a class="dropdown-item" href="#">Kawah Edukasi</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  })
</script>
    <div class="container col-md-10 mt-4">
        <h1>TABEL INVENTARIS</h1>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">DATA BUKU</div>
                    <div class="col-md-6 text-end">
                        <a href="tambah.php" class="btn btn-sm btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="dataTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun Penerbit</th>
                            <th>ISBN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include('conn.php');
                            $datas = mysqli_query($koneksi, "SELECT * FROM perpustakaan") or die(mysqli_error($koneksi));

                            $no = 1;

                            while ($row = mysqli_fetch_assoc($datas)) {
                        ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $row['judul']; ?></td>
                            <td><?= $row['pengarang']; ?></td>
                            <td><?= $row['tahun_terbit']; ?></td>
                            <td><?= $row['isbn'] ?></td>
                            <td>
                                <a href="edit.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?id_buku=<?= $row['id_buku']; ?>" class="btn btn-sm btn-danger" id="btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
