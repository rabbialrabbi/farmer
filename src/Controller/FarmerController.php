<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
/**
 * Farmer Controller
 *
 * @property \App\Model\Table\FarmerTable $Farmer
 *
 * @method \App\Model\Entity\Farmer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FarmerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //echo('Hello There');
        $farmer = $this->paginate($this->Farmer->find('All')->contain(['Districts','Upazilla']));
        //$farmer = $this->paginate($this->Farmer->find('All'));
      // debug($farmer);
        $this->set(compact('farmer'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $farmer = $this->Farmer->get($id, [
            'contain' => [],
        ]);

        $this->set('farmer', $farmer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regions = TableRegistry::get('Regions');
        $regionList=$regions->find('list', ['keyField' => 'RegionOID','valueField' => 'RegionName']);
        $this->set('RegionName',$regionList);
        
        $divisions = TableRegistry::get('Divisions');
        $divisionLIst=$divisions->find('list', ['keyField' => 'DivisionOID','valueField' => 'DivisionName']);
        $this->set('DivisionName',$divisionLIst);
        
        $divisions = TableRegistry::get('Districts');
        $districtList=$divisions->find('list', ['keyField' => 'DistrictOID','valueField' => 'DistrictName']);
        $this->set('DistrictName',$districtList);
        
        $divisions = TableRegistry::get('Upazilla');
        $upazillaList=$divisions->find('list', ['keyField' => 'UpazillaOID','valueField' => 'UpazillaName']);
        $this->set('UpazillaName',$upazillaList);
        
        $divisions = TableRegistry::get('Tunion');
        $unionList=$divisions->find('list', ['keyField' => 'UnionOID','valueField' => 'UnionName']);
        $this->set('UnionName',$unionList);
        
        $divisions = TableRegistry::get('Tunion');
        $unionList=$divisions->find('list', ['keyField' => 'UnionOID','valueField' => 'UnionName']);
        $this->set('UnionName',$unionList);
        
        $divisions = TableRegistry::get('Category');
        $categoryList=$divisions->find('list', ['keyField' => 'CategoryOID','valueField' => 'CategoryName']);
        $this->set('CategoryName',$categoryList);
        
        $divisions = TableRegistry::get('Project');
        $projectList=$divisions->find('list', ['keyField' => 'ProjectOID','valueField' => 'ProjectName']);
        $this->set('ProjectName',$projectList);
        
        $divisions = TableRegistry::get('Tgroup');
        $groupList=$divisions->find('list', ['keyField' => 'GroupOID','valueField' => 'GroupName']);
        $this->set('GroupName',$groupList);
        
        
        $farmer = $this->Farmer->newEmptyEntity();
        if ($this->request->is('post')) {
            $farmer = $this->Farmer->patchEntity($farmer, $this->request->getData());
            if ($this->Farmer->save($farmer)) {
                $this->Flash->success(__('The farmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farmer could not be saved. Please, try again.'));
        }
        $this->set(compact('farmer'));
        
        $this->set(compact('regionList'));
        $this->set(compact('divisionLIst'));
        $this->set(compact('districtList'));
         $this->set(compact('upazillaList'));
         $this->set(compact('unionList'));
         $this->set(compact('categoryList'));
         $this->set(compact('projectList'));
         $this->set(compact('groupList'));
     
    }

    /**
     * Edit method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $farmer = $this->Farmer->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $farmer = $this->Farmer->patchEntity($farmer, $this->request->getData());
            if ($this->Farmer->save($farmer)) {
                $this->Flash->success(__('The farmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farmer could not be saved. Please, try again.'));
        }
        $this->set(compact('farmer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $farmer = $this->Farmer->get($id);
        if ($this->Farmer->delete($farmer)) {
            $this->Flash->success(__('The farmer has been deleted.'));
        } else {
            $this->Flash->error(__('The farmer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
