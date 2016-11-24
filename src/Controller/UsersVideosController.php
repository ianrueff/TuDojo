<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersVideos Controller
 *
 * @property \App\Model\Table\UsersVideosTable $UsersVideos
 */
class UsersVideosController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'favorito', 'delete']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    public function index()
    {

        /*$this->loadModel('Videos');
        $user = $this->Auth->user('id');
        $videos = $this->Videos->find()
            ->contain('UsersVideos')
            ->matching('UsersVideos')
            ->where(['UsersVideos.user_id' => $user]);

        $this->set('Videos', $this->paginate($videos));*/

        $this->loadModel('UsersVideos');
        $user = $this->Auth->user('id');
        $videos = $this->UsersVideos->find()
            ->contain('Videos')
            ->where(['user_id' => $user]);

        $this->set('Videos', $this->paginate($videos));

    }

    /**
     * View method
     *
     * @param string|null $id Users Video id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersVideo = $this->UsersVideos->get($id, [
            'contain' => []
        ]);

        $this->set('usersVideo', $usersVideo);
        $this->set('_serialize', ['usersVideo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersVideo = $this->UsersVideos->newEntity();
        if ($this->request->is('post')) {
            $usersVideo = $this->UsersVideos->patchEntity($usersVideo, $this->request->data);
            if ($this->UsersVideos->save($usersVideo)) {
                $this->Flash->success(__('The users video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users video could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usersVideo'));
        $this->set('_serialize', ['usersVideo']);
    }

    public function delete($id = null)
    {

        $usersVideo = $this->UsersVideos->get($id);


        if ($this->UsersVideos->delete($usersVideo)) {
            $this->Flash->success(__('El video ha sido eliminado.'));
        } else {
            $this->Flash->error(__('El video no pudo ser eliminado. Por favor, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);

    }

    public function favorito($id = null)
    {

        $this->loadModel('Videos');
        $this->loadModel('Users');

        $usersVideos = $this->UsersVideos->newEntity();

        $user = $this->Auth->user('id');
        $video = $this->Videos->get($id);


        $usersVideos = $this->UsersVideos->patchEntity($usersVideos ,$this->request->data);
        $usersVideos->user_id = $user;
        $usersVideos->video_id = $video['id'];

            if ($this->UsersVideos->save($usersVideos)) 
            {
                $this->Flash->success('El video ha sido agregado a Mi Lista');
                return $this->redirect(['action' => 'index']); 
            }
            else
            {
                $this->Flash->error('El video no pude ser agregado, por favor intente nuevamente');
                return $this->redirect(['action' => 'index']); 
            }

      
    }
}
