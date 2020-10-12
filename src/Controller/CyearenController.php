<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cyearen Controller
 *
 * @property \App\Model\Table\CyearenTable $Cyearen
 *
 * @method \App\Model\Entity\Cyearen[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CyearenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $cyearen = $this->paginate($this->Cyearen);

        $this->set(compact('cyearen'));
    }

    /**
     * View method
     *
     * @param string|null $id Cyearen id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cyearen = $this->Cyearen->get($id, [
            'contain' => [],
        ]);

        $this->set('cyearen', $cyearen);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cyearen = $this->Cyearen->newEmptyEntity();
        if ($this->request->is('post')) {
            $cyearen = $this->Cyearen->patchEntity($cyearen, $this->request->getData());
            if ($this->Cyearen->save($cyearen)) {
                $this->Flash->success(__('The cyearen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cyearen could not be saved. Please, try again.'));
        }
        $this->set(compact('cyearen'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cyearen id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cyearen = $this->Cyearen->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cyearen = $this->Cyearen->patchEntity($cyearen, $this->request->getData());
            if ($this->Cyearen->save($cyearen)) {
                $this->Flash->success(__('The cyearen has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cyearen could not be saved. Please, try again.'));
        }
        $this->set(compact('cyearen'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cyearen id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cyearen = $this->Cyearen->get($id);
        if ($this->Cyearen->delete($cyearen)) {
            $this->Flash->success(__('The cyearen has been deleted.'));
        } else {
            $this->Flash->error(__('The cyearen could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
