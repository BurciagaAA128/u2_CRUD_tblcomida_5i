<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Pockets Restaurante</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Pockets</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form tambah mahasiswa -->
        <div class="card mb-5">
            <!-- <div class="card-header">
                Latihan CRUD PHP & MySQL
            </div> -->
            <!-- tambah data -->
            <div class="card-body">
                <h3 class="card-title">Pockets Restaurante</h3>
                <p class="card-text">Burciaga Cortés Aarón 5-I<br> Trabajando con la tabla Comida</p>

                <!-- tampilkan pesan sukses ditambah -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Datos ingresados correctamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Datos no ingresados!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="tambah.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-4">
                        <label for="NIM" class="form-label">Id Platillo</label>
                        <input type="number" name="Id" class="form-control" placeholder="00000" required>
                </div>

                    <div class="col-12">
                        <label for="nama" class="form-label">Nombre del platillo</label>
                        <input type="text" name="Nombre" class="form-control" placeholder="Ingrese Nombre" required>
                    </div>

                    <div class="col-md-4">
                        <label for="NIM" class="form-label">Precio</label>
                        <input type="text" name="Precio" class="form-control" placeholder="$0.00" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Agama" class="form-label">Tamano</label>
                        <select class="form-select" name="Tamano" aria-label="Default select example">
                            <option value="Individual">Individual</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Extra Grande">Extra Grande</option>
                        </select>
                    </div>

                
                    <div class="col-md-4">
                        <label for="Agama" class="form-label">Categoría</label>
                        <select class="form-select" name="Categoria" aria-label="Default select example">
                            <option value="Comida rápida">Comida rápida</option>
                            <option value="Ensalada">Ensalada</option>
                            <option value="Postre">Postre</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="Jurusan" class="form-label">Descripción</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="Describa el platillo" required>
                    </div>

                    <div class="col-md-6">
                        <label for="IPK" class="form-label">Calorías</label>
                        <input type="number" step=0.01 name="Calorias" class=" form-control" placeholder="0.00" required>
                    </div>

                    <div class="col-md-6">
                        <label for="IPK" class="form-label">Foto del platillo</label>
                        <input type="file" step=0.01 name="Foto" class=" form-control" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar Platillo</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- judul tabel -->
        <h5 class="mb-3">Tabla Comida</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- tampilkan pesan sukses dihapus -->
        <?php if (isset($_GET['hapus'])) : ?>
            <?php
            if ($_GET['hapus'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Datos eliminados exitosamente
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Datos no eliminados
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tampilkan pesan sukses di edit -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exito!</strong> Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> Datos no actualizados
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabel -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id</th>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Tamano</th>";
            echo "<th scope='col'>Descripción</th>";
            echo "<th scope='col'>Categoría</th>";
            echo "<th scope='col'>Calorías</th>";
            echo "<th scope='col'>Foto</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($db, "SELECT * FROM comida");
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            $data_comida = mysqli_query($db, "SELECT * FROM comida LIMIT $halaman_awal, $batas");
            $no = $halaman_awal + 1;

            while ($comida = mysqli_fetch_array($data_comida)) {           
                echo "<tr>";
                echo "<td>" . $comida['Id_Platillo'] . "</td>";
                echo "<td>" . $comida['Nombre'] . "</td>";
                echo "<td>" . $comida['Precio'] . "</td>";
                echo "<td>" . $comida['Tamano'] . "</td>";
                echo "<td>" . $comida['Descripcion'] . "</td>";
                echo "<td>" . $comida['Categoria'] . "</td>";
                echo "<td>" . $comida['Calorias'] . "</td>";
                echo '<td><img height="60" whidth="60" src="data:image/jpg;base64,' . base64_encode($comida['Foto']).'"/></td>';
                echo "<td class='text-center'>";
                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";
                echo "<button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>Tidak ada data yang tersedia pada tabel ini</p>";
            } else {
                echo "<p>Total $jumlah_data registros</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman > 1) ? "href='?halaman=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($halaman < $total_halaman) ? "href='?halaman=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

<!-- Modal Editar Platillo-->
<div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog' style="margin-bottom:100px !important;">
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Edita la tabla comida</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            
            <form action='edit.php' method='POST' enctype="multipart/form-data">
                <div class='modal-body text-start'>
                    <input type='hidden' name='edit_id' id='edit_id'>

                    <div class="col-12 mb-3">
                        <label for="edit_nombre" class="form-label">Nombre del platillo</label>
                        <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="edit_precio" class="form-label">Precio</label>
                        <input type="text" name="edit_precio" id="edit_precio" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="edit_Tamano" class="form-label">Tamano</label>
                        <select class="form-select" name="edit_Tamano" id="edit_Tamano">
                            <option value="Individual">Individual</option>
                            <option value="Mediano">Mediano</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Extra Grande">Extra Grande</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="edit_categoria" class="form-label">Categoría</label>
                        <select class="form-select" name="edit_categoria" id="edit_categoria">
                            <option value="Comida rápida">Comida rápida</option>
                            <option value="Ensalada">Ensalada</option>
                            <option value="Postre">Postre</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="edit_descripcion" class="form-label">Descripción</label>
                        <input type="text" name="edit_descripcion" id="edit_descripcion" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="edit_calorias" class="form-label">Calorías</label>
                        <input type="number" step=0.01 name="edit_calorias" id="edit_calorias" class="form-control" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="edit_foto" class="form-label">Foto</label>
                        <input type="file" step=0.01 name="edit_foto" id="edit_foto" class="form-control" required>
                    </div>
                </div>

                <div class='modal-footer'>
                    <button type='submit' name='edit_data' class='btn btn-primary'>Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>


        <!-- Modal Delete-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='hapus.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- tutup container -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- edit function -->
    <script>
    $(document).ready(function() {
        $('.editButton').on('click', function() {
            $('#editModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            $('#edit_id').val(data[0]);
            $('#edit_nombre').val(data[1]);
            $('#edit_precio').val(data[2]);

            $('#edit_Tamano option').each(function() {
                if ($(this).val() == data[3]) {
                    $(this).prop('selected', true);
                }
            });

            $('#edit_descripcion').val(data[4]);
            $('#edit_categoria').val(data[5]);
            $('#edit_calorias').val(data[6]);
        });

        $('.deleteButton').on('click', function() {
            $('#deleteModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#delete_id').val(data[0]);
        });
    });

    function clicking() {
        window.location.href = './index.php';
    }
</script>

</body>

</html>