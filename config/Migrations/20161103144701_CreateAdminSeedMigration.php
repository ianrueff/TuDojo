<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator ->addEntity('Users', 1, [
            'nombre' => 'Ian',
            'apellido' => 'Rueff',
            'foto' => 'www.queti.com/pepe',
            'email' => 'ianrueff@gmail.com',
            'password' => function() {
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash('secret');
            },
            'role' => 'admin',
            'active' => 1,
            'created' => function () use ($faker) {
                return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            },
            'modified' => function () use ($faker) {
                return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            }

        ]);

        $populator->execute();
    }
}