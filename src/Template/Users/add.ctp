<div class="row"> 
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Crear usuario</h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->input('nombre', ['label' => 'Nombre']);
                echo $this->Form->input('apellido', ['label' => 'Apellido']);
                echo $this->Form->input('foto', ['label' => 'Foto']);
                echo $this->Form->input('email', ['label' => 'Correo Electrónico']);
                echo $this->Form->input('password', ['label' => 'Contraseña']);
                echo $this->Form->input('role', ['options' => ['admin' => 'Administrador', 'user' => 'Usuario']]);
                echo $this->Form->input('active', ['label' => 'Activo']);
            //echo $this->Form->input('videos._ids', ['options' => $videos]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>