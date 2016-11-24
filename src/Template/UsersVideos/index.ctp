<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>
                Mi lista
                <?= $this->Html->link('Buscar Videos nuevos', ['controller' => 'Users', 'action' => 'home'], ['class' => 'btn btn-primary pull-right', 'escape' => false]); ?>
            </h2>
        </div>
        <ul class="list-group">

            <?php foreach ($Videos as $video): ?>
            <li class="list-group-item">
                <h4 class="list-group-item-heading"><?= h($video->video->titulo) ?></h4>
                <p>
                    <strong class="text-info">
                        <small>
                            <?= $this->Html->link($video->video->url, null, ['target' => 'blank']) ?>
                        </small>
                    </strong>
                </p>
                <p class="list-group-item-text">
                    <?= h($video->video->description) ?>
                </p>

                <?= $this->Html->link('Eliminar', ['action' => 'delete', $video->id], ['confirm' => 'Eliminar enlace?', 'class' => 'btn btn-sm btn-danger']) ?>

            </li>

            <?php endforeach ?>
        </ul>

        <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->prev('< Anterior') ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next('Siguiente >') ?>
      </ul>
      <p><?= $this->Paginator->counter() ?></p>
    </div>

    </div>
</div>
