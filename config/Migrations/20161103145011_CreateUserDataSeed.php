<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateUserDataSeed extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('Users', 50, [
        'nombre' => function() use($faker) {
          return $faker->firstName();
        },
        'apellido' => function() use($faker) {
          return $faker->lastName();
        },
        'foto' => function() use($faker) {
          return $faker->imageUrl($width = 240, $height = 180);
        },
        'email' => function() use($faker) {
          return $faker->safeEmail();
        },
        'password' => function() use($faker) {
          $hasher = new DefaultPasswordHasher();
          return $hasher->hash('secret');
        },
        'role' => 'user',
        'active' => function(){
          return rand(0,1);
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
