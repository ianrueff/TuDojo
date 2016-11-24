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
                    <td>
                        <?= $this->Html->link('Ver',  ['controller' => 'CategoriasVideos', 'action' => 'index'], ['class' => 'btn btn-sm btn-info']) ?>
                    </td>   
                </tr>
            <?php endforeach ?>
                </tbody>
                </table>
        </div>
    </div>
</div>