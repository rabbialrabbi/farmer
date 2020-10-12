<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Smsfedmanagement Controller
 *
 * @property \App\Model\Table\SmsfedmanagementTable $Smsfedmanagement
 *
 * @method \App\Model\Entity\Smsfedmanagement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsfedmanagementController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {        
        //  $smsfedmanagement = $this->paginate($this->Smsfedmanagement->find('all')->contain('farmerapi'));
                
//        $smsfedmanagement = $this->paginate($this->Smsfedmanagement->find()
//                ->join(['table' => 'farmerapi',                      
//                       'type' => 'LEFT',
//                       'conditions' =>['farmerapi.phone = smsfedmanagement.FarMobileNo']  
//                        ]));      
//        $ff=$this->Smsfedmanagement->find('all',
//                ['joins' => [['table' => 'farmerapi',
//                          'alias' => 'p',
//                          'type' =>'LEFT',
//                          'foreignkey' => false,
//                    '      conditions'=>['smsfedmanagement.FarMobileNo = p.phone']]]]);
//        dd($ff);
        $smsfedmanagement = $this->Smsfedmanagement->find('all',
                ['joins' => [['table' => 'farmerapi',
                          'alias' => 'p',
                          'type' =>'LEFT',
                          'foreignkey' => false,
                    '      conditions'=>['smsfedmanagement.FarMobileNo = p.phone']]]])->contain('farmerapi');
               
        //dd($smsfedmanagement);
        $this->set(compact('smsfedmanagement'));        
    }

    /**
     * View method
     *
     * @param string|null $id Smsfedmanagement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $smsfedmanagement = $this->Smsfedmanagement->get($id, [
            'contain' => [],
        ]);
        $this->set('smsfedmanagement', $smsfedmanagement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smsfedmanagement = $this->Smsfedmanagement->newEmptyEntity();
        if ($this->request->is('post')) {
            $smsfedmanagement = $this->Smsfedmanagement->patchEntity($smsfedmanagement, $this->request->getData());
            if ($this->Smsfedmanagement->save($smsfedmanagement)) {
                $this->Flash->success(__('The smsfedmanagement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsfedmanagement could not be saved. Please, try again.'));
        }
        $this->set(compact('smsfedmanagement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Smsfedmanagement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smsfedmanagement = $this->Smsfedmanagement->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsfedmanagement = $this->Smsfedmanagement->patchEntity($smsfedmanagement, $this->request->getData());
            if ($this->Smsfedmanagement->save($smsfedmanagement)) {
                $this->Flash->success(__('The smsfedmanagement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Data could not be saved. Please, try again.'));
        }
        $this->set(compact('smsfedmanagement'));
    }
    
    public function GetReport(){
            
    }
    /**
     * Delete method
     *
     * @param string|null $id Smsfedmanagement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smsfedmanagement = $this->Smsfedmanagement->get($id);
        if ($this->Smsfedmanagement->delete($smsfedmanagement)) {
            $this->Flash->success(__('The smsfedmanagement has been deleted.'));
        } else {
            $this->Flash->error(__('The smsfedmanagement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
