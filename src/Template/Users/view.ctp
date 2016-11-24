<div class="well">
  <h2><?= $user->nombre . ' ' . $user->apellido ?></h2>
  <br>
  <dl class="">

    <dt>Nombre</dt>
    <dd>
      <?= $user->nombre ?>
      &nbsp;
    </dd>
    <br>

    <dt>Apellido</dt>
    <dd>
      <?= $user->apellido ?>
      &nbsp;
    </dd>
    <br>

    <dt>Email</dt>
    <dd>
      <?= $user->email ?>
      &nbsp;
    </dd>
    <br>
       <dt>foto</dt>
    <dd>
      <?= $user->foto ?>
      &nbsp;
    </dd>
    <br>
    <dt>Habilitado</dt>
    <dd>
      <?= $user->active ? 'SI' : 'NO' ?>
      &nbsp;
    </dd>
    <br>

    <dt>Creado</dt>
    <dd>
      <?= $user->created->nice() ?>
      &nbsp;
    </dd>
    <br>

    <dt>Modificado</dt>
    <dd>
      <?= $user->modified->nice() ?>
      &nbsp;
    </dd>
    <br>

  </dl>
</div>
