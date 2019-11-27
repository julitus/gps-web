<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class RestPositionsController extends AppController
{

	public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Positions');

        $this->Auth->allow(['position']);
    }

    public function position()
    {
    	$status = '500';
        $message = 'Error interno del servidor';
        $response = $this->request->data;

        if (isset($this->request->data['lat']) and isset($this->request->data['lng']) and isset($this->request->data['user_id']) and isset($this->request->data['master_id'])) {

            $position = $this->Positions->newEntity();
            
            $position = $this->Positions->patchEntity($position, $this->request->data);
            if ($position = $this->Positions->save($position)) {
                $status = '200';
                $message = 'Ok';
                $response = $position;
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