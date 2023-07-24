<?php
include('conn.php');

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    // Perform the deletion query based on the provided ID
    $delete_query = "DELETE FROM perpustakaan WHERE id_buku = $id_buku";
    $result = mysqli_query($koneksi, $delete_query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete data.']);
    }
}
?>
