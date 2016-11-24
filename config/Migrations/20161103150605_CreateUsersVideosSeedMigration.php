<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersVideosSeedMigration extends AbstractMigration
{
     public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('UsersVideos', 250, [
        'user_id' => function(){
            return rand(1, 51);
        },
        'video_id' => function(){
            return rand(1, 200);
        }
    ]);

      $populator->execute();
    }
}
