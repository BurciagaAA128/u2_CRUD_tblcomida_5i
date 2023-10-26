<?php
include("./config.php");

if (isset($_POST['edit_data'])) {
// Recopilar datos del formulario
$id = $_POST['edit_id'];
$nombre = $_POST['edit_nombre'];
$precio = $_POST['edit_precio'];
$Tamano = $_POST['edit_Tamano'];
$categoria = $_POST['edit_categoria'];
$descripcion = $_POST['edit_descripcion'];
$calorias = $_POST['edit_calorias'];

if ($_FILES['edit_foto']['error'] === UPLOAD_ERR_OK){
    $Foto = addslashes(file_get_contents($_FILES['edit_foto']['tmp_name']));
}

    // Crear la consulta SQL para actualizar la tabla comida
    $sql = "UPDATE comida SET 
                Nombre='$nombre', 
                Precio='$precio', 
                Tamano='$Tamano', 
                Categoria='$categoria', 
                Descripcion='$descripcion', 
                Calorias='$calorias',
                Foto='$Foto'
            WHERE Id_Platillo = '$id'";
    
    $query = mysqli_query($db, $sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else {
    die("Akses dilarang...");
}
?>
