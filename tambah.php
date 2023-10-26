<?php
include("./config.php");

if (isset($_POST['tambah'])) {

    // Recopilar datos del formulario
    $id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $precio = $_POST['Precio'];
    $Tamano = $_POST['Tamano'];
    $categoria = $_POST['Categoria'];
    $descripcion = $_POST['Descripcion'];
    $calorias = $_POST['Calorias'];
    $Foto=addslashes(file_get_contents($_FILES['Foto']['tmp_name']));
    

    // Verificar si el ID ya existe
    $sql_check = "SELECT * FROM comida WHERE Id_Platillo = '$id'";
    $result_check = mysqli_query($db, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        die("El ID ya existe, elige otro.");
    }

    // Consulta SQL para insertar datos en la tabla comida
    $sql = "INSERT INTO comida(Id_Platillo, Nombre, Precio, Tamano, Categoria, Descripcion, Calorias, Foto)
    VALUES('$id','$nombre', '$precio', '$Tamano', '$categoria', '$descripcion', '$calorias', '$Foto')";

    $query = mysqli_query($db, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($query) {
        header('Location: ./index.php?status=sukses');
    } else {
        header('Location: ./index.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
?>
