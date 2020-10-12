<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Codelist Controller
 *
 * @property \App\Model\Table\CodelistTable $Codelist
 *
 * @method \App\Model\Entity\Codelist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CodelistController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $codelist = $this->paginate($this->Codelist);

        $this->set(compact('codelist'));
    }

    /**
     * View method
     *
     * @param string|null $id Codelist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $codelist = $this->Codelist->get($id, [
            'contain' => [],
        ]);

        $this->set('codelist', $codelist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $codelist = $this->Codelist->newEmptyEntity();
        if ($this->request->is('post')) {
            dd($codelist);
            $codelist = $this->Codelist->patchEntity($codelist, $this->request->getData());
            if ($this->Codelist->save($codelist)) {
                $this->Flash->success(__('The codelist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codelist could not be saved. Please, try again.'));
        }
        $this->set(compact('codelist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Codelist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $codelist = $this->Codelist->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $codelist = $this->Codelist->patchEntity($codelist, $this->request->getData());
            if ($this->Codelist->save($codelist)) {
                $this->Flash->success(__('The codelist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codelist could not be saved. Please, try again.'));
        }
        $this->set(compact('codelist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Codelist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $codelist = $this->Codelist->get($id);
        if ($this->Codelist->delete($codelist)) {
            $this->Flash->success(__('The codelist has been deleted.'));
        } else {
            $this->Flash->error(__('The codelist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
