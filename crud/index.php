<?php include 'template/header.php'?>

<?php
include_once 'model/conexion.php';
$sentencia = $bd ->  query("select * from persona");
$persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
                        <!-- inicio alerta -->
                        <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de Personas
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Puesto de Trabajo</th>
                                <th scope="col">Numero de Contacto</th>
                                <th scope="col" colspan="2">Opciones</th>
                                </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach($persona as $dato){

                                
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->codigo; ?></td>
                                <td><?php echo $dato->nombres; ?></td>
                                <td><?php echo $dato->apellidos; ?></td>
                                <td><?php echo $dato->puesto; ?></td>
                                <td><?php echo $dato->contacto; ?></td>
                                <td><a href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil"></i></a></td>
                                <td><a href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-file-earmark-minus-fill"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                    <div>
                        <form class="p-4" method="POST" action="registrar.php">
                            <div class="mb-3">
                                <label class="form-label">Nombres:</label>
                                <input type="text" class="form-control" name="txtNombres" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="txtApellidos" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Puesto de Trabajo:</label>
                                <input type="text" class="form-control" name="txtPuesto" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Numero de Contacto:</label>
                                <input type="text" class="form-control" name="txtContacto" autofocus required>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'?>
