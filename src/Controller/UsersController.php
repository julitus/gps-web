<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'register']);
    }

    public function login()
    {   
        $this->viewBuilder()->layout('initial');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                if ($user['role'] == 1) {
                    $this->Auth->setUser($user);
                    $this->Flash->success(__('Bienvenido ' . $user['name']));
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('La cuenta ingresada no es de un Maestro.'));
                }
            } else {
                $this->Flash->error(__('Correo electrónico o contraseña invalidos, Pruebe nuevamente.'));
            }
        }
    }

    public function register()
    {
        $this->viewBuilder()->layout('initial');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role = 1;
            if ($user = $this->Users->save($user)) {
                
                $user->key = $this->generateKey($user->id);
                $user = $this->Users->save($user);

                $this->Auth->setUser($user->toArray());
                $this->Flash->success(__('El Maestro fue creado exitosamente. Bienvenido ' . $user->name));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Hubo un error al crear el Maestro. Por favor, intentelo nuevamente.'));
        }
        $this->set(compact('user'));
    }

    public function devices()
    {
        $this->paginate = [];
        $devices = $this->paginate($this->Users->find()->where(['Users.master_id' => $this->request->session()->read('Auth.User.id')]));

        $this->set(compact('devices'));
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    private function generateKey($id)
    {   
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $key = '';
        for ($i = 0; $i < 8; $i++) {
            $key .= $chars[mt_rand(0, 35)];
        }
        return $key;
    }

}
