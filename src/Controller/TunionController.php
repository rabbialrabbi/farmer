<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tunion Controller
 *
 * @property \App\Model\Table\TunionTable $Tunion
 *
 * @method \App\Model\Entity\Tunion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TunionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tunion = $this->paginate($this->Tunion);

        $this->set(compact('tunion'));
    }

    /**
     * View method
     *
     * @param string|null $id Tunion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tunion = $this->Tunion->get($id, [
            'contain' => [],
        ]);

        $this->set('tunion', $tunion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tunion = $this->Tunion->newEmptyEntity();
        if ($this->request->is('post')) {
            $tunion = $this->Tunion->patchEntity($tunion, $this->request->getData());
            if ($this->Tunion->save($tunion)) {
                $this->Flash->success(__('The tunion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tunion could not be saved. Please, try again.'));
        }
        $this->set(compact('tunion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tunion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tunion = $this->Tunion->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tunion = $this->Tunion->patchEntity($tunion, $this->request->getData());
            if ($this->Tunion->save($tunion)) {
                $this->Flash->success(__('The tunion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tunion could not be saved. Please, try again.'));
        }
        $this->set(compact('tunion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tunion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tunion = $this->Tunion->get($id);
        if ($this->Tunion->delete($tunion)) {
            $this->Flash->success(__('The tunion has been deleted.'));
        } else {
            $this->Flash->error(__('The tunion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
