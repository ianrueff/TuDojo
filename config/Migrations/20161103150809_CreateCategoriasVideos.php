<?php
use Migrations\AbstractMigration;

class CreateCategoriasVideos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('categorias_videos');
        $table->create();

        $refTable = $this->table('categorias_videos');
        $refTable->addColumn('categoria_id', 'integer', array('signed' => 'disable'))
                 ->addForeignKey('categoria_id', 'categorias', 'id', array('delete' => 'CASCADE', 'update'=>'NO_ACTION'))
                 ->addColumn('video_id', 'integer', array('signed' => 'disable'))
                 ->addForeignKey('video_id', 'videos', 'id', array('delete' => 'CASCADE', 'update'=>'NO_ACTION'))

                 ->update();
    }
}
