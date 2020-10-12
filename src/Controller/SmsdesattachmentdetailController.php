<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Smsdesattachmentdetail Controller
 *
 * @property \App\Model\Table\SmsdesattachmentdetailTable $Smsdesattachmentdetail
 *
 * @method \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsdesattachmentdetailController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $smsdesattachmentdetail = $this->paginate($this->Smsdesattachmentdetail);

        $this->set(compact('smsdesattachmentdetail'));
    }

    /**
     * View method
     *
     * @param string|null $id Smsdesattachmentdetail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smsdesattachmentdetail = $this->Smsdesattachmentdetail->get($id, [
            'contain' => [],
        ]);

        $this->set('smsdesattachmentdetail', $smsdesattachmentdetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smsdesattachmentdetail = $this->Smsdesattachmentdetail->newEmptyEntity();
        if ($this->request->is('post')) {
            $smsdesattachmentdetail = $this->Smsdesattachmentdetail->patchEntity($smsdesattachmentdetail, $this->request->getData());
            if ($this->Smsdesattachmentdetail->save($smsdesattachmentdetail)) {
                $this->Flash->success(__('The smsdesattachmentdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsdesattachmentdetail could not be saved. Please, try again.'));
        }
        $this->set(compact('smsdesattachmentdetail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Smsdesattachmentdetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smsdesattachmentdetail = $this->Smsdesattachmentdetail->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsdesattachmentdetail = $this->Smsdesattachmentdetail->patchEntity($smsdesattachmentdetail, $this->request->getData());
            if ($this->Smsdesattachmentdetail->save($smsdesattachmentdetail)) {
                $this->Flash->success(__('The smsdesattachmentdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsdesattachmentdetail could not be saved. Please, try again.'));
        }
        $this->set(compact('smsdesattachmentdetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smsdesattachmentdetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smsdesattachmentdetail = $this->Smsdesattachmentdetail->get($id);
        if ($this->Smsdesattachmentdetail->delete($smsdesattachmentdetail)) {
            $this->Flash->success(__('The smsdesattachmentdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The smsdesattachmentdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
