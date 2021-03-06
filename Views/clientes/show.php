<div class="row">
    <div class="col-md-12" style="margin-top: 15px">
        <h2>Cliente #: <?php echo $cliente->id; ?></h2>
        <form>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="<?php echo $cliente->nombre ?>" disabled>
                </div>

                <div class="col-sm-6">
                    <label for="lastName" class="form-label">Correo Electronico</label>
                    <input type="text" class="form-control" value="<?php echo $cliente->email ?>" disabled>
                </div>
            </div>
        </form>

        <h2>Pedidos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th># Pedido</th>
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
                              <a href="/pedidos/' . $pedido->id . '" class="btn btn-primary">Ver</a>
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
                        echo '<li class="page-item"><a class="page-link" href="/clientes/'. $cliente->id .'?page=' . ($currentPage - 1) . '">Previous</a></li>';
                    }

                    for ($i = 1; $i <= $pages; $i++) {
                        if ($currentPage === $i) {
                            echo ' <li class="page-item active" aria-current="page"><a class="page-link" href="/clientes/'. $cliente->id .'?page=' . $i . '">'.$i.'</a></li>';
                        }else{
                            echo ' <li class="page-item"><a class="page-link" href="/clientes/'. $cliente->id .'?page=' . $i . '">'.$i.'</a></li>';
                        }
                    }
                    if ($currentPage !== $pages) {
                        echo '<li class="page-item"><a class="page-link" href="/clientes/'. $cliente->id .'?page=' . ($currentPage + 1) . '">Next</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

</div>