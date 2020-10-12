<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Upazilla Controller
 *
 * @property \App\Model\Table\UpazillaTable $Upazilla
 *
 * @method \App\Model\Entity\Upazilla[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UpazillaController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $upazilla = $this->paginate($this->Upazilla);

        $this->set(compact('upazilla'));
    }

    /**
     * View method
     *
     * @param string|null $id Upazilla id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $upazilla = $this->Upazilla->get($id, [
            'contain' => [],
        ]);

        $this->set('upazilla', $upazilla);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    { 
        $districts = TableRegistry::get('Districts');
        $districtList = $districts->find('list', ['keyField' => 'DistrictOID', 'valueField' => 'DistrictName']);
        $this->set('DistrictName', $districtList);
        
        $upazilla = $this->Upazilla->newEmptyEntity();
        if ($this->request->is('post')) {
            $upazilla = $this->Upazilla->patchEntity($upazilla, $this->request->getData());
            if ($this->Upazilla->save($upazilla)) {
                $this->Flash->success(__('The upazilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The upazilla could not be saved. Please, try again.'));
        }
        $this->set(compact('upazilla'));
        $this->set(compact('districtList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Upazilla id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $upazilla = $this->Upazilla->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $upazilla = $this->Upazilla->patchEntity($upazilla, $this->request->getData());
            if ($this->Upazilla->save($upazilla)) {
                $this->Flash->success(__('The upazilla has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The upazilla could not be saved. Please, try again.'));
        }
        $this->set(compact('upazilla'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Upazilla id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $upazilla = $this->Upazilla->get($id);
        if ($this->Upazilla->delete($upazilla)) {
            $this->Flash->success(__('The upazilla has been deleted.'));
        } else {
            $this->Flash->error(__('The upazilla could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
