<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Http\Client;

/**
 * Districts Controller
 *
 * @property \App\Model\Table\DistrictsTable $Districts
 *
 * @method \App\Model\Entity\District[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DistrictsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
//       $http = new Client();
//        $response = $http->get(
//                'https://www.bamis.gov.bd/api/json/sms/textsms/add/?user=&#39;mrcons&#39;&pass=&#39;mrcons21&#39;&numbers=&#39;8801740773262&#39;&message=&#39;HELLO&#39;&mask=AMISDP&#160;DAE');
//        $json = $response->getJson();
//        print_r($json);
        $query = $this->Districts->find('all')->contain(['Regions']);
        foreach ($query as $user) {            
            echo $user->region->RegionName;
        };       
       // $DistrictRegionList = $this->Districts->get('all');
       // print_r($DistrictRegionList);
       // $g = $this->Districts->ju
       //$table = TableRegistry::getTableLocator()->get('Districts');
       //$data = $table->find()->contain('Regions');
       //print_r($table);
        //$this->set('DistrictRegionList',$DistrictRegionList);
        //echo '<pre>';
        //debug($g);
//        foreach ($query as $user) {           
//            print_r($user->RegionName);
//        //echo $user->Regions->RegionName;
//        };
//        $f=$this->Districts->find('all');
//        echo($f);
//        $http = new Client();
//        $response = $http->get(
//                'https://www.bamis.gov.bd/api/json/area/division/data/?user=mrcons&pass=mrcons21&dis_id=2&limit_s=0&limit=100');
//        $json = $response->getJson();
       // print_r($json);
        //$i=0;
//        foreach($json as $d){
//           // echo '<pre>';
//            print_r($d[$i]);
//            echo "<pre>";
//            //print_r($d);
//            //print_r($d[$i]['label_bn']);
//           // echo $i;
//            $i++;
//        }
            
       // $d = json_decode(json_encode($json), true);
   //    print_r($json->array('label_en'));
        
//        $i=0;
//while($d->{'array'}[$i])
//{
//    print_r($d->{'array'}[$i]->{'label_bn'});
//    echo "<br />";
//    $i++;
//}
//        
//       // $d = json_encode($json);
//        //$d= json_decode($json,true);       
//       // print_r($d);
//        $i = 0;
//        foreach ($d as $item) { //foreach element in $arr
//            $usesr = $item; //etc
//            //echo "<pre>";
//           //echo $usesr[$i]['label_bn'];
//           //$p= $item->label_en;
//           echo $item;
//          //print_r($usesr[i]['label_bn']);e
//          $i++; 
//          echo "<pre>";
//          echo $i;
//        }
       
  //      print_r($d);
//        foreach ($json as $row) {            
//                   echo "<pre>";
//             print_r($row[0]);
//       };    
        $districts = $this->paginate($this->Districts);
        $districts = $this->Districts->find('all')->contain(['Regions']);
        //$this->set(compact('regions'));
        //$this->set(compact('districts'));
        $this->set(compact('districts'));
        
    }

    /**
     * View method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $district = $this->Districts->get($id, [
            'contain' => [],
        ]);

        $this->set('district', $district);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $regions = TableRegistry::get('Regions');
        $regionList = $regions->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName']);
        $this->set('RegionName', $regionList);

        $divisions = TableRegistry::get('Divisions');
        $divisionLIst = $divisions->find('list', ['keyField' => 'DivisionOID', 'valueField' => 'DivisionName']);
        $this->set('DivisionName', $divisionLIst);

        $district = $this->Districts->newEmptyEntity();
        if ($this->request->is('post')) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The district could not be saved. Please, try again.'));
        }
        $this->set(compact('district'));
        $this->set(compact('regionList'));
        $this->set(compact('divisionLIst'));
    }

    /**
     * Edit method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $district = $this->Districts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $district = $this->Districts->patchEntity($district, $this->request->getData());
            if ($this->Districts->save($district)) {
                $this->Flash->success(__('The district has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The district could not be saved. Please, try again.'));
        }
        $this->set(compact('district'));
    }

    /**
     * Delete method
     *
     * @param string|null $id District id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $district = $this->Districts->get($id);
        if ($this->Districts->delete($district)) {
            $this->Flash->success(__('The district has been deleted.'));
        } else {
            $this->Flash->error(__('The district could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function fncsenddata($userID = 'asdas') {
      echo $userID;
    }
}
