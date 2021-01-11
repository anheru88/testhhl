<div class="row">
    <div class="col-md-12" style="margin-top: 15px">
        <div class="row">
            <div class="col-md-9">
                <h2>Pedidos</h2>
            </div>
            <div class="col-md-3">
                <a href="/pedidos/create" class="btn btn-primary">Crear Pedido</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Cliente</th>
                    <th>Fecha</th>
                    <th>Sub Total</th>
                    <th>Descuento</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($pedidos as $pedido) {
                    echo "<tr>";
                    echo "<td>";
                    echo $pedido->id;
                    echo "</td>";
                    echo "<td>";
                    echo $pedido->cliente->nombre;
                    echo "</td>";
                    echo "<td>";
                    echo $pedido->created_at->format('Y-m-d');
                    echo "</td>";
                    echo "<td>";
                    echo $pedido->sub_total_pedido;
                    echo "</td>";
                    echo "<td>";
                    echo $pedido->descuento_pedido;
                    echo "</td>";
                    echo "<td>";
                    echo $pedido->total_pedido;
                    echo "</td>";
                    echo '<td>
                            <div class="btn-group">
                              <a href="/pedidos/' . $pedido->id . '" class="btn btn-primary" aria-current="page">Ver</a>
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