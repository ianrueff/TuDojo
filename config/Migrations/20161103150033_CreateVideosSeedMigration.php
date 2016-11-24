<?php

use Phinx\Migration\AbstractMigration;

class CreateVideosSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('Videos', 200, [
        'titulo' => function() use($faker) {
          return $faker->sentence($nbWords = 3, $variableNbWords = true);
        },
        'description' => function() use($faker) {
          return $faker->paragraph($nbSentences = 3, $variableNbWords = true);
        },
        'url' => function() use($faker) {
          return $faker->url;
        },
        'created' => function() use($faker) {
          return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
        },
        'modified' => function() use($faker) {
          return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
        }
      ]);
      $populator->execute();
    }
}