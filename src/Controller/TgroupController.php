<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tgroup Controller
 *
 * @property \App\Model\Table\TgroupTable $Tgroup
 *
 * @method \App\Model\Entity\Tgroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TgroupController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $tgroup = $this->paginate($this->Tgroup);

        $this->set(compact('tgroup'));
    }

    /**
     * View method
     *
     * @param string|null $id Tgroup id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tgroup = $this->Tgroup->get($id, [
            'contain' => [],
        ]);

        $this->set('tgroup', $tgroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tgroup = $this->Tgroup->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $tgroup = $this->Tgroup->patchEntity($tgroup, $this->request->getData());
            if ($this->Tgroup->save($tgroup)) {
                $this->Flash->success(__('The tgroup has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tgroup could not be saved. Please, try again.'));           
        }
        $this->set(compact('tgroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tgroup id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tgroup = $this->Tgroup->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tgroup = $this->Tgroup->patchEntity($tgroup, $this->request->getData());
            if ($this->Tgroup->save($tgroup)) {
                $this->Flash->success(__('The tgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tgroup could not be saved. Please, try again.'));
        }
        $this->set(compact('tgroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tgroup id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tgroup = $this->Tgroup->get($id);
        if ($this->Tgroup->delete($tgroup)) {
            $this->Flash->success(__('The tgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The tgroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
