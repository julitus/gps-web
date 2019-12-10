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
        $this->loadModel('Notifications');

        $this->Auth->allow(['register', 'signin']);
    }

    public function signin()
    {
        $user = $this->Users->find('all', ['conditions' => ['Users.email' => $this->request->data['email']]])->first();

        if (!is_null($user)) {
            if ((new DefaultPasswordHasher)->check($this->request->data['password'], $user->password)) {
                if ($this->request->data['phone'] == $user->phone) {
                    $status = '200';
                    $message = 'Ok';
                } else {
                    $status = '203';
                    $message = 'El usuario no corresponde al Dispositivo registrado';
                    $user = null;    
                }
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

        if (isset($this->request->data['name']) and isset($this->request->data['email']) and isset($this->request->data['password']) and isset($this->request->data['phone']) and isset($this->request->data['key'])) {

        	$master = $this->Users->find()->where(['Users.key' => $this->request->data['key']])->first();

        	if (!is_null($master)) {

        		$user = $this->Users->newEntity();
            
	            $this->request->data['role'] = 2;
	            $this->request->data['master_id'] = $master->id;
	            $this->request->data['repassword'] = $this->request->data['password'];
	            $user = $this->Users->patchEntity($user, $this->request->data);
	            if ($user = $this->Users->save($user)) {

                    $notification = $this->Notifications->newEntity();
                    $notification->title = "Dispositivo";
                    $notification->body = $user->name + " ha sido agregado";
                    $notification->sender_id = $user->id;
                    $notification->receiver_id = $master->id;
                    $this->Notifications->save($notification);

	                $status = '200';
	                $message = 'Ok';
	                $response = $user;
	            }

        	} else {
        		$status = '401';
                $message = 'La llave no existe.';
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