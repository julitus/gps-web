<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class RestUsersController extends AppController
{

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Users');

        $this->Auth->allow(['register', 'signin']);
    }

    public function signin()
    {
        $user = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['email']]])->first();

        if (!is_null($user)) {
            if ((new DefaultPasswordHasher)->check($this->request->data['password'], $user->password)) {
                $status = '200';
                $message = 'Ok';
            } else {
                $status = '401';
                $message = 'Contraseña incorrecta';
                $user = null;
            }
        } else {
            $status = '204';
            $message = 'No hay contenido';
        }
        
        $this->set([
            'status' => $status,
            'message' => $message,
            'response' => $user,
            '_serialize' => ['status', 'message', 'response']
        ]);
    }


    public function register()
    {
        $status = '500';
        $message = 'Error interno del servidor';
        $response = null;

        if (isset($this->request->data['name']) and isset($this->request->data['email']) and isset($this->request->data['password']) and isset($this->request->data['phone'])) {

            $user = $this->Users->newEntity();
            
            $this->request->data['role'] = 2;
            $this->request->data['master_id'] = 1;
            $this->request->data['repassword'] = $this->request->data['password'];
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($user = $this->Users->save($user)) {
                $status = '200';
                $message = 'Ok';
                $response = $user;
            }
        }

        $this->set([
            'status' => $status,
            'message' => $message,
            'response' => $response,
            '_serialize' => ['status', 'message', 'response']
        ]);
    }


}