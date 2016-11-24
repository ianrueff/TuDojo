<?php
          echo $this->Form->input('nombre', ['label' => 'Nombre']);
          echo $this->Form->input('apellido', ['label' => 'Apellido']);
          echo $this->Form->input('email');
          echo $this->Form->input('password', ['label' => 'Clave', 'value' => '']);
?>