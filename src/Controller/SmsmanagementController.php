<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use App\Others\commutil;
/**
 * Smsmanagement Controller
 *
 * @property \App\Model\Table\SmsmanagementTable $Smsmanagement
 *
 * @method \App\Model\Entity\Smsmanagement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsmanagementController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $smscontents = TableRegistry::get('smscontent');
        $smscontentList = $smscontents->find('list', ['keyField' => 'SmsContentOID', 'valueField' => 'SMSContentBodyBan']);
        $this->set('smscontentList', $smscontentList);

        $smsmanagement = $this->paginate($this->Smsmanagement->find('all')->contain(['farmerapi', 'smsfedmanagement', 'smscontent']));
//        $smsfedManagement = TableRegistry::get('smsfedmanagement');
//        $farmer = TableRegistry::get('farmer');
//        $smscontent = TableRegistry::get('Smscontent');
//               
        //$smsfedManagementList=$smsfedManagement->find('all')->contain(['smsfedmanagement','farmer','smscontent']);
        //$smsdesmanagement = $this->paginate($this->Smsdesmanagement->find('all')->contain(['smscontent','farmer','farmer.districts']));
        //$farmerList=$farmer->find('all',array('conditions' => array('farmer.DistrictOID' => 37,'farmer.ProjectOID' => 1))); 
        // $smscontentList = $smscontent->find('all');
        // print_r($smsmanagement);
        // $this->set(compact('smsmanagement','smscontentList','farmerList','smsfedManagementList'));
//       foreach ($smscontentList as $value) {
//           echo $value;
//       }
        //print_r($smsmanagement);
        $this->set(compact('smsmanagement'));
    }

    public function getsmsmanagement($id) {
        $this->autoRender = false;
        $regions = TableRegistry::get('smsmanagement');
        $regionList = $regions->find('all', ['contain' => 'farmerapi', 'conditions' => ['SmsContentOID' => $id]]);
        //dd($regionList);
        //$regionList =$regions ->find('All');         
        // $this->set('RegionName', $regionList);
        //$this->set(compact('regionList'));
        // foreach ($regionList as $value) {
        //    echo($value);
        // }
        //  return json_encode(['1','2','3']);
        //echo json_encode($regionList);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($regionList));
    }

    /**
     * View method
     *
     * @param string|null $id Smsmanagement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $smsmanagement = $this->Smsmanagement->get($id, [
            'contain' => [],
        ]);

        $this->set('smsmanagement', $smsmanagement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $smsmanagement = $this->Smsmanagement->newEmptyEntity();
        if ($this->request->is('post')) {
            $smsmanagement = $this->Smsmanagement->patchEntity($smsmanagement, $this->request->getData());
            if ($this->Smsmanagement->save($smsmanagement)) {
                $this->Flash->success(__('The Data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Data could not be saved. Please, try again.'));
        }
        $this->set(compact('smsmanagement'));
    }

    public function processreport() {
        $this->autoRender = false;
        
        $comm = new commutil();
        $smsdes= $this->Smsmanagement->newEmptyEntity();
        $smsfedManagement = TableRegistry::get('smsfedmanagement');
        $smsdesmgm = TableRegistry::get('smsdesmanagement');
        $smsmgm = TableRegistry::get('smsmanagement');
        $SmsID = 0;
        $SmsBody = '';
        $isCap = true;
        $msgstat='G';  //For Garbadge
        $smsfedmgmList = $smsfedManagement->find('all', ['conditions' => ['msgstatus IS'=> 'P']]);
      //  dd($smsfedmgmList->count());
        if ($smsfedmgmList->count()==0){             
            return $this->redirect(['action' => 'index']);
        }        
        foreach ($smsfedmgmList as $smsfedmgm) {
            $fbSMS = $smsfedmgm->FedBackSMS;
            $fbmob = $smsfedmgm->FarMobileNo;
            if ($smsdesmgm->exists(['FarMobileNo' => $fbmob])==false) {
                $isCap = false;
                 $msgstat='M'; //Mobile No Not in List
            }
            if ($isCap == true) {
                if (strlen($fbSMS) > 1) {
                    $splitstr = explode(' ', $fbSMS);
                    $SmsID = $splitstr[0];
                    if (is_numeric($SmsID)) {
                        $SmsBody = substr($fbSMS, stripos($fbSMS, ' '));
                        if ($SmsBody != "") {
                            if ($smsdesmgm->exists(['FarMobileNo' => $fbmob, 'SMSNo' => $SmsID])==false) {
                                $isCap = false;
                                $msgstat='E'; //Message ID Not Found
                            }
                        } else {
                            $isCap = false;
                            $msgstat='N'; //Message Body Not Found
                        }
                    } else {
                        $isCap = false;
                         $msgstat='L'; //SMS ID Not Correct
                    }
                    if ($isCap == true) {
                        $smsdes = $smsdesmgm->find('all', ['conditions' => ['FarMobileNo' => $fbmob, 'SMSNo' => $SmsID]]);
                        $msgstat='S'; //Specific Reply
                    }
                   
                } else if (strlen($fbSMS) == 1) {
                    if (is_numeric($fbSMS)) {
                        $Smshort = $fbSMS;
                        if ($Smshort == 1) {
                            $SmsBody = 'উপকৃত হয়েছি';
                        } else if ($Smshort == 0) {
                            $SmsBody = 'উপকৃত হই নাই';
                        } else {
                            $isCap = false;
                            $msgstat='A'; //Specific Reply
                        }
                    } else {
                        $isCap = false;
                        $msgstat='C'; //Specific Character Not Numeric
                    }
                    if ($isCap == true) {
                        $smsdes = $smsdesmgm->find('all', ['conditions' => ['FarMobileNo' => $fbmob]]);
                        $msgstat='B'; //Boolean Reply
                    }
                    
                }
            }

//            if (strlen($fbSMS) > 1) {
//                $splitstr = explode(' ', $fbSMS);
//                $SmsID = $splitstr[0];
//                $SmsBody = substr($fbSMS, stripos($fbSMS, ' '));
//
//                $isdesmgm = $smsdesmgm->exists(['FarMobileNo' => $fbmob, 'SMSNo' => $SmsID]);
//                if ($isdesmgm == true) {
//                    $smsdes = $smsdesmgm->find('all', ['conditions' => ['FarMobileNo' => $fbmob, 'SMSNo' => $SmsID]]);
//                }
//            } else if (strlen($fbSMS) == 1) {
//                print_r($fbSMS);
//                if (is_numeric($fbSMS)) {
//                    $SmsID = $fbSMS;
//                    if ($SmsID == 1) {
//                        $SmsBody = 'উপকৃত হয়েছি';
//                    }
//                    if ($SmsID == 0) {
//                        $SmsBody = 'উপকৃত হই নাই';
//                    }
//                }
//                //$smsdes=$smsdesmgm->find('all',['conditions' => ['FarMobileNo' => $fbmob]]);   
//                $isCap = $smsdesmgm->exists(['FarMobileNo' => $fbmob]);
//                if ($isCap == true) {
//                    $smsdes = $smsdesmgm->find('all', ['conditions' => ['FarMobileNo' => $fbmob]]);
//                }
//            } else {
//                $SmsBody = $fbSMS;
//                $smsdes = $smsdesmgm->find('all', ['conditions' => ['FarMobileNo' => $fbmob]]);
//                $isCap = true;
//            }
            //print_r($isCap);     
             //dd( $smsdes->first());
            if ($isCap == true) {
                
                $smsconOID = $smsdes->last()->SmsContentOID;
                $smsfarmeroid = $smsdes->last()->FarmerID;
                $smsFedMgOID = $smsfedmgm->SmsFedMngOID;
                
                $smsmgm = $this->Smsmanagement->newEmptyEntity();                
                $smsmgm->SmsMgmOID=$comm->getsmgmid();
                $smsmgm->FarmerOID = $smsfarmeroid;
                $smsmgm->SmsContentOID = $smsconOID;
                $smsmgm->SmsFedMngOID = $smsFedMgOID;
                $smsmgm->CreatedBY = 1;
                $smsmgm->CreatedDate = Time::now();
                $smsmgm->SMSBody = $SmsBody;
                $smsmgm->smstatus = $msgstat;

                if ($this->Smsmanagement->save($smsmgm) == false) {
                    $this->Flash->error(__('The smsmanagement could not be saved. Please, try again.'));
                }
            }
          
            //Here we update the status of the msgstatus of fedback Management 
                $smsfedmgm->msgstatus = $msgstat;
                $smsfedManagement->save($smsfedmgm);
                
            $isCap = true;
            $msgstat='G';
        }
        return $this->redirect(['action' => 'index']);
    }

    //Here we update the fedback Message Status

    /**
     * Edit method
     *
     * @param string|null $id Smsmanagement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $smsmanagement = $this->Smsmanagement->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsmanagement = $this->Smsmanagement->patchEntity($smsmanagement, $this->request->getData());
            if ($this->Smsmanagement->save($smsmanagement)) {
                $this->Flash->success(__('The smsmanagement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsmanagement could not be saved. Please, try again.'));
        }
        $this->set(compact('smsmanagement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smsmanagement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $smsmanagement = $this->Smsmanagement->get($id);
        if ($this->Smsmanagement->delete($smsmanagement)) {
            $this->Flash->success(__('The smsmanagement has been deleted.'));
        } else {
            $this->Flash->error(__('The smsmanagement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
