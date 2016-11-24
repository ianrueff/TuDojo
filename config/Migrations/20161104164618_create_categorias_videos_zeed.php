<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriasVideosZeed extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

      $populator->addEntity('CategoriasVideos', 100, [
        'categoria_id' => function(){
            return rand(1, 10);
        },
        'video_id' => function(){
            return rand(1, 200);
        }
    ]);

      $populator->execute();
    }
}
