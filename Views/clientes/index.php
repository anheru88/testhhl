<div class="row">
    <div class="col-md-12">
        <h2>Clientes</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th># Pedidos</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    echo "<td>";
                    echo $cliente->id;
                    echo "</td>";
                    echo "<td>";
                    echo $cliente->name;
                    echo "</td>";
                    echo "<td>";
                    echo $cliente->email;
                    echo "</td>";
                    echo "<td>";
                    echo count($cliente->pedidos);
                    echo "</td>";
                    echo '<td>
                            <div class="btn-group">
                              <a href="/clientes/' . $cliente->id . '" class="btn btn-primary active" aria-current="page">Ver</a>
                              <a href="#" class="btn btn-primary">Editar</a>
                              <a href="#" class="btn btn-primary">Eliminar</a>
                            </div>
                        </td>';
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    if ($currentPage !== 1) {
                        echo '<li class="page-item"><a class="page-link" href="/clientes?page=' . ($currentPage - 1) . '">Previous</a></li>';
                    }

                    for ($i = 1; $i <= $pages; $i++) {
                        if ($currentPage === $i) {
                            echo ' <li class="page-item active" aria-current="page"><a class="page-link" href="/clientes?page=' . $i . '">'.$i.'</a></li>';
                        }else{
                            echo ' <li class="page-item"><a class="page-link" href="/clientes?page=' . $i . '">'.$i.'</a></li>';
                        }
                    }
                    if ($currentPage !== $pages) {
                        echo '<li class="page-item"><a class="page-link" href="/clientes?page=' . ($currentPage + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>