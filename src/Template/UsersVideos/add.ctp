<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="page-header">
      <h2>Crear enlace</h2>
    </div>
    <?= $this->Form->create($usersVideo, ['novalidate']) ?>
    <fieldset>
      <?= $this->element('usersVideos/fields') ?>
    </fieldset>
    <?= $this->Form->button('Crear') ?>
    <?= $this->Form->end() ?>
  </div>
</div>
