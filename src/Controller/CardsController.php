<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cards Controller
 *
 * @property \App\Model\Table\CardsTable $Cards
 */
class CardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cards->find()
            ->contain(['Themes', 'Users']);
        $cards = $this->paginate($query);

        $this->set(compact('cards'));
    }

    /**
     * View method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $card = $this->Cards->get($id, contain: ['Themes', 'Users']);
        $this->set(compact('card'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $themes = $this->Cards->Themes->find('list', limit: 200)->all();
        $users = $this->Cards->Users->find('list', limit: 200)->all();
        $this->set(compact('card', 'themes', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $themes = $this->Cards->Themes->find('list', limit: 200)->all();
        $users = $this->Cards->Users->find('list', limit: 200)->all();
        $this->set(compact('card', 'themes', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
