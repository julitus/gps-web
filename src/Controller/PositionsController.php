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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Masters']
        ];
        $positions = $this->paginate($this->Positions);

        $this->set(compact('positions'));
    }

    /**
     * View method
     *
     * @param string|null $id Position id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => ['Users', 'Masters']
        ]);

        $this->set('position', $position);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $position = $this->Positions->newEntity();
        if ($this->request->is('post')) {
            $position = $this->Positions->patchEntity($position, $this->request->getData());
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position could not be saved. Please, try again.'));
        }
        $users = $this->Positions->Users->find('list', ['limit' => 200]);
        $masters = $this->Positions->Masters->find('list', ['limit' => 200]);
        $this->set(compact('position', 'users', 'masters'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Position id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $position = $this->Positions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $position = $this->Positions->patchEntity($position, $this->request->getData());
            if ($this->Positions->save($position)) {
                $this->Flash->success(__('The position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The position could not be saved. Please, try again.'));
        }
        $users = $this->Positions->Users->find('list', ['limit' => 200]);
        $masters = $this->Positions->Masters->find('list', ['limit' => 200]);
        $this->set(compact('position', 'users', 'masters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Position id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $position = $this->Positions->get($id);
        if ($this->Positions->delete($position)) {
            $this->Flash->success(__('The position has been deleted.'));
        } else {
            $this->Flash->error(__('The position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
