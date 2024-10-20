<?php
require_once 'app/controllers/shirt.controller.php';
class shirtView
{
    function showShirts($shirts)
    {
        require_once 'templates/layouts/header.phtml'; ?>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <?php
            foreach ($shirts as $shirt) {
            ?>
                <tr>
                    <td><img src="<?php echo 'imgs/' . $shirt->imagen; ?>" alt="Imagen de la camiseta" width="100px" height="100px"></td>
                    <td><?php echo "$shirt->precio" ?></td>
                    <td><?php echo "<a href='description/$shirt->id_camiseta' " ?>class="btn btn-info">Ver mas</a></td>
                </tr>
            <?php
            }
            echo '</table';
        }

        function showDetail($shirt, $team)
        {
            require_once 'templates/layouts/header.phtml'; ?>
            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Temporada</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="<?php echo 'imgs/' . $shirt->imagen; ?>" alt="Imagen de la camiseta" width="150px" height="150px"></td>
                        <td><?php echo "$team->nombre" ?></td>
                        <td><?php echo "$shirt->temporada" ?></td>
                        <td><?php echo "$shirt->tipo" ?></td>
                        <td><?php echo "$shirt->precio" ?></td>
                    </tr>
                </tbody>
            <?php
        }
        function showCrud($shirts, $teams, $error = '')
        {
            require_once 'templates/layouts/header.phtml'; ?>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Agregar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva camiseta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php $controller = new shirtController();
                                $controller->showFormCrud($teams);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Temporada</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($shirts as $shirt) { ?>
                            <tr>
                                <td><?php echo "$shirt->id_camiseta" ?></td>
                                <td><img src="<?php echo 'imgs/' . $shirt->imagen; ?>" alt="Imagen de la camiseta" width="150px" height="150px"></td>
                                <td><?php echo "$shirt->temporada" ?></td>
                                <td><?php echo "$shirt->tipo" ?></td>
                                <td><?php echo "$shirt->precio" ?></td>
                                <td><?php echo "<a href='modify/$shirt->id_camiseta' " ?>class="btn btn-warning">Modificar</a></td>
                                <td><?php echo "<a href='delete/$shirt->id_camiseta' " ?>class="btn btn-danger">Eliminar</a></td>
                            </tr>
                <?php
                        }
                        echo "</tbody>";
                    }
                    function showError($error = '')
                    {
                        require_once 'templates/error.phtml';
                    }
                    function showFormCrud($teams){
                        require_once 'templates/formCrud.phtml';
                    }
                    function showFormUpdate($id, $teams){
                        require_once 'templates/formUpdate.phtml';
                    }
                }
