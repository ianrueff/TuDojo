<div class="row">
    <div class="col-md-12 ">
        <div class="page-header">

            <?php foreach ($Categorias as $categoria): ?>

               <h2>Videos de <?= h($categoria->nombre)?></h2>

            <?php endforeach ?>

        </div>
        <ul class="list-group">

            <?php foreach ($Videos as $video): ?>
            <li class="list-group-item">
                <h4 class="list-group-item-heading"><?= h($video->titulo) ?></h4>
                <p>
                    <strong class="text-info">
                        <small>
                            <?= $this->Html->link($video->url, null, ['target' => 'blank']) ?>
                        </small>
                    </strong>
                </p>
                <p class="list-group-item-text">
                    <?= h($video->description) ?>
                </p>
            <?php if($current_user['role'] == 'admin'): ?>

              <?= $this->Html->link('Favorito', ['controller' => 'UsersVideos','action' => 'favorito', $video->id], ['class' => 'btn btn-sm btn-warning' ]) ?>

              <?php else: ?>
                
              <?= $this->Html->link('Favorito', ['controller' => 'UsersVideos','action' => 'favorito', $video->id], ['class' => 'btn btn-sm btn-warning' ]) ?>
    
            </li>
            <?php endif; ?>
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
