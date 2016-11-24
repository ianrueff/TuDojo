<?php
namespace App\Controller;

use App\Controller\AppController;


class UsersController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}

	public function isAuthorized($user)
	{
		if(isset($user['role']) and $user['role'] === 'user')
		{
			if(in_array($this->request->action, ['home', 'logout', 'view']))
			{
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	public function login()
	{
		if($this->request->is('post'))
		{
			$user = $this->Auth->identify();
			if($user)
			{
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error('Los datos son invalidos, por favor intente nuevamente', ['key' => 'auth']);
			}
		}

		if ($this->Auth->user())
		{
			return $this->redirect(['controller' => 'Users', 'action' => 'home']);
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function home()
	{
		$this->loadModel('Categorias');
		$categorias = $this->Categorias->find('all');
        $this->set('categorias', $categorias);  

		$this->render();
	}

	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set('users', $users);

		
	}

	public function view($id)
	{
		$user = $this->Users->get($id);
   	 	$this->set('user', $user);
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		if ($this->request->is('post')) 
		{
			$user = $this->Users->patchEntity($user, $this->request->data);

			$user->role = 'user';
			$user->active = 1;

			if($this->Users->save($user))
			{
				$this->Flash->Success('El usuario ha sido creado correctamente.');
				return $this->redirect(['controller' => 'Users', 'action' => 'login']);
			}
			else
			{
				$this->Flash->error('El usuario no pudo ser creado. Por favor, intente nuevamente.');
			}
		}

		$this->set(compact('user'));
	}

	public function edit($id = null)
  {
    $user = $this->Users->get($id);

    //metodo patch es como un update no insert into - metodo get con los links 

    if($this->request->is(['patch', 'post', 'put']))
    {
      $user = $this->Users->patchEntity($user, $this->request->data);
        if ($this->Users->save($user))
        {
         $this->Flash->success('El usuario ha sido modificado');
         return $this->redirect(['action' => 'index']); 
        }
        else
        {
          $this->Flash->error('El usuario no ha sido modificado, inténtelo nuevamente');
        }

    }
    //metodo set le pasa datos a la vista
    $this->set(compact('user'));
  }

  public function delete($id =  null)
  {
    $this->request->allowMethod(['post', 'delete']);
    $user = $this->Users->get($id);

    if($this->Users->delete($user))
    {
      $this->Flash->success('El usuario ha sido eliminado');
    }
    else
    {
      $this->Flash->error('El usuario no pude ser eliminado, por favor intente nuevamente');
    }

    return $this->redirect(['action' => 'index']);
  }
}
