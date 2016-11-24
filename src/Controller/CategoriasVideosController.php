<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriasVideos Controller
 *
 * @property \App\Model\Table\CategoriasVideosTable $CategoriasVideos
 */
class CategoriasVideosController extends AppController
{

   public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index($categorias = null)
    {
        
        $this->loadModel('Videos');
        $this->loadModel('Categorias');
        $current_categoria = $this->Categorias->find()
            ->where(['Categorias.id' => $categorias]);

        $this->set('Categorias', $this->paginate($current_categoria));

        $categorias;
        $videos = $this->Videos->find()
            ->contain('CategoriasVideos')
            ->matching('CategoriasVideos')
            ->where(['CategoriasVideos.categoria_id' => $categorias]);

        $this->set('Videos', $this->paginate($videos));

       /* $query = $categorias->find('all')
            ->contain(['categoria_id']);
            foreach ($query as $categorias)
            {
                echo $categorias->video_id[0]->titulo;
            }*/
    }

    /**
     * View method
     *
     * @param string|null $id Categorias Video id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriasVideo = $this->CategoriasVideos->get($id, [
            'contain' => ['Categorias', 'Videos']
        ]);

        $this->set('categoriasVideo', $categoriasVideo);
        $this->set('_serialize', ['categoriasVideo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriasVideo = $this->CategoriasVideos->newEntity();
        if ($this->request->is('post')) {
            $categoriasVideo = $this->CategoriasVideos->patchEntity($categoriasVideo, $this->request->data);
            if ($this->CategoriasVideos->save($categoriasVideo)) {
                $this->Flash->success(__('The categorias video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias video could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->CategoriasVideos->Categorias->find('list', ['limit' => 200]);
        $videos = $this->CategoriasVideos->Videos->find('list', ['limit' => 200]);
        $this->set(compact('categoriasVideo', 'categorias', 'videos'));
        $this->set('_serialize', ['categoriasVideo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categorias Video id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriasVideo = $this->CategoriasVideos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriasVideo = $this->CategoriasVideos->patchEntity($categoriasVideo, $this->request->data);
            if ($this->CategoriasVideos->save($categoriasVideo)) {
                $this->Flash->success(__('The categorias video has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categorias video could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->CategoriasVideos->Categorias->find('list', ['limit' => 200]);
        $videos = $this->CategoriasVideos->Videos->find('list', ['limit' => 200]);
        $this->set(compact('categoriasVideo', 'categorias', 'videos'));
        $this->set('_serialize', ['categoriasVideo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categorias Video id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriasVideo = $this->CategoriasVideos->get($id);
        if ($this->CategoriasVideos->delete($categoriasVideo)) {
            $this->Flash->success(__('The categorias video has been deleted.'));
        } else {
            $this->Flash->error(__('The categorias video could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    
}
