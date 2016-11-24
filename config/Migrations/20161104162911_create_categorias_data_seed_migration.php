<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriasDataSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('Categorias', 10, [
        'nombre' => function() use($faker) {
          return $faker->firstName();
        }
        ]);
      $populator->execute();
    }
}
