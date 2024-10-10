<?php
    class shirtView{
        function showShirts($shirts){
            require_once 'templates/layouts/header.phtml';?>
            <table class="table">
            <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Precio</th>
            </tr>
            </thead>
            <?php
            foreach($shirts as $shirt){
                ?>
                <tr>
                    <td><img src="<?php echo 'imgs/' . $shirt->imagen; ?>" alt="Imagen de la camiseta" width="100px" height="100px"></td>
                    <td><?php echo "$shirt->precio"?></td>
                    <td><?php echo "<a href='description/$shirt->id_camiseta' "?>class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Ver mas</a></td>
                </tr>
                <?php
            }
            echo '</table';
        }

        function showDetail($shirt, $team){
            require_once 'templates/layouts/header.phtml';?>
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
                        <td><?php echo "$shirt->tipo_camiseta" ?></td>
                        <td><?php echo "$shirt->precio" ?></td>
                    </tr>
        <?php
        }
    }