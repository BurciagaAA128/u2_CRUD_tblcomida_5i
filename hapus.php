<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // Recopilar id del formulario
    $id = $_POST['delete_id'];

    // Crear la consulta SQL para eliminar el registro correspondiente en la tabla comida
    $sql = "DELETE FROM comida WHERE Id_Platillo = '$id'";
    $query = mysqli_query($db, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($query) {
        header('Location: ./index.php?hapus=sukses');
    } else {
        header('Location: ./index.php?hapus=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
