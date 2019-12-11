<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Positions Controller
 *
 * @property \App\Model\Table\PositionsTable $Positions
 *
 * @method \App\Model\Entity\Position[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PositionsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
    }

    public function locations()
    {
        $positions = $this->Positions->find()
            ->select(['Positions__created' => 'DISTINCT ON(Positions.user_id) user_id, Positions.created', 'Positions.lat', 'Positions.lng', 'Users.id', 'Users.name'])
            ->where(['Positions.master_id' => $this->request->session()->read('Auth.User.id')])
            ->contain(['Users'])
            ->order(['Positions.user_id', 'Positions.created' => 'DESC']);

        $this->set(compact('positions'));
        $this->set('_serialize', ['positions']);
    }

    public function history($id = null)
    {
        $user = $this->Positions->Users->get($id);

        $positions = $this->Positions->find()
            ->select(['Positions.created', 'Positions.lat', 'Positions.lng'])
            ->where(['Positions.user_id' => $id])
            ->order(['Positions.created' => 'ASC']);

        $this->set(compact('positions', 'user'));
        $this->set('_serialize', ['positions']);
    }

}
