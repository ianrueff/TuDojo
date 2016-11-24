<?php
use Migrations\AbstractMigration;

class CreateUsersVideos extends AbstractMigration
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
        $table = $this->table('users_videos');
        $table->create();

          $refTable = $this->table('users_videos');
        $refTable->addColumn('user_id', 'integer', array('signed' => 'disable'))
                 ->addForeignKey('user_id', 'users', 'id', array('delete' => 'CASCADE', 'update'=>'NO_ACTION'))
                 ->addColumn('video_id', 'integer', array('signed' => 'disable'))
                 ->addForeignKey('video_id', 'videos', 'id', array('delete' => 'CASCADE', 'update'=>'NO_ACTION'))

                 ->update();
    }
}
