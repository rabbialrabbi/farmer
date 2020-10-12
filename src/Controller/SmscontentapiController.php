<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Smscontentapi Controller
 *
 * @property \App\Model\Table\SmscontentapiTable $Smscontentapi
 *
 * @method \App\Model\Entity\Smscontentapi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmscontentapiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $smscontentapi = $this->paginate($this->Smscontentapi);

        $this->set(compact('smscontentapi'));
    }

    /**
     * View method
     *
     * @param string|null $id Smscontentapi id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smscontentapi = $this->Smscontentapi->get($id, [
            'contain' => [],
        ]);

        $this->set('smscontentapi', $smscontentapi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smscontentapi = $this->Smscontentapi->newEmptyEntity();
        if ($this->request->is('post')) {
            $smscontentapi = $this->Smscontentapi->patchEntity($smscontentapi, $this->request->getData());
            if ($this->Smscontentapi->save($smscontentapi)) {
                $this->Flash->success(__('The smscontentapi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smscontentapi could not be saved. Please, try again.'));
        }
        $this->set(compact('smscontentapi'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Smscontentapi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smscontentapi = $this->Smscontentapi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smscontentapi = $this->Smscontentapi->patchEntity($smscontentapi, $this->request->getData());
            if ($this->Smscontentapi->save($smscontentapi)) {
                $this->Flash->success(__('The smscontentapi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smscontentapi could not be saved. Please, try again.'));
        }
        $this->set(compact('smscontentapi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smscontentapi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smscontentapi = $this->Smscontentapi->get($id);
        if ($this->Smscontentapi->delete($smscontentapi)) {
            $this->Flash->success(__('The smscontentapi has been deleted.'));
        } else {
            $this->Flash->error(__('The smscontentapi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
