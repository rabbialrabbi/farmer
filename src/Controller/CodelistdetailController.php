<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Codelistdetail Controller
 *
 * @property \App\Model\Table\CodelistdetailTable $Codelistdetail
 *
 * @method \App\Model\Entity\Codelistdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CodelistdetailController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $codelistdetail = $this->paginate($this->Codelistdetail->find('all')->contain(['codelist']));        
        $this->set(compact('codelistdetail'));
    }

    private function fillCodeList(){
        $crops = TableRegistry::get('codelist');
        $cropslist = $crops->find('list', ['keyField' => 'CodeListID', 'valueField' => 'CodeListNameEnglish']);        
        $this->set('codelistid', $cropslist);
    }
    /**
     * View method
     *
     * @param string|null $id Codelistdetail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $codelistdetail = $this->Codelistdetail->get($id, [
            'contain' => ['codelist'],
        ]);
       
        $this->set('codelistdetail', $codelistdetail);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->fillCodeList();
        $codelistdetail = $this->Codelistdetail->newEmptyEntity();
        if ($this->request->is('post')) {
            $codelistdetail = $this->Codelistdetail->patchEntity($codelistdetail, $this->request->getData());
            if ($this->Codelistdetail->save($codelistdetail)) {
                $this->Flash->success(__('The codelistdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codelistdetail could not be saved. Please, try again.'));
        }
        $this->set(compact('codelistdetail'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Codelistdetail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {               
        $codelistdetail = $this->Codelistdetail->get($id, [
            'contain' => ['codelist'],
        ]);
        //dd($codelistdetail);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $codelistdetail = $this->Codelistdetail->patchEntity($codelistdetail, $this->request->getData());
            if ($this->Codelistdetail->save($codelistdetail)) {
                $this->Flash->success(__('The codelistdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The codelistdetail could not be saved. Please, try again.'));
        }
        $this->set(compact('codelistdetail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Codelistdetail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $codelistdetail = $this->Codelistdetail->get($id);
        if ($this->Codelistdetail->delete($codelistdetail)) {
            $this->Flash->success(__('The codelistdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The codelistdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
