        <!--Sidebar-->

        <div class="d-flex flex-column flex-shrink-0  p-3 text-bg-dark" style="width: 280px; height: 100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

                <span class="fs-4"><i class="bi bi-bag-heart-fill"></i> Administrativo</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="consulta_familias.php" class="nav-link text-white" aria-current="page">
                        <i class="bi bi-people-fill"></i>
                        Famílias
                    </a>
                </li>
                <li>
                    <a href="consulta_produtos.php" class="nav-link text-white">
                        <i class="bi bi-basket-fill"></i>
                        Produtos/Estoque
                    </a>
                </li>
                <li>
                    <a href="consulta_marcas.php" class="nav-link text-white">
                        <i class="bi bi-tags-fill"></i>
                        Marcas
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                
                    <strong>
                        <?php
                       echo $current_user->display_name;
                        ?>
                    </strong>
                
            </div>
        </div>

        <!--fim da div sidebar-->