<h2>Bienvenido <?= $this->Html->link($current_user['nombre']. ' ' . $current_user['apellido'], ['controller' => 'Users', 'action' => 'view', $current_user['id']])?></h2>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>Categorias</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th> <?= $this->Paginator->sort('nombre') ?></th>
                        <th>Tipos</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categorias as $categorias): ?>
                <tr>
                    <td><?= h($categorias->nombre) ?></td>
                    <td><?= h($categorias->id) ?></td>
                    <td>
                        <?= $this->Html->link('Ver',  ['controller' => 'CategoriasVideos', 'action' => 'index', $categorias->id], ['class' => 'btn btn-sm btn-info']) ?>
                    </td>   
                </tr>
            <?php endforeach ?>
                </tbody>
                </table>
        </div>
    </div>
</div>