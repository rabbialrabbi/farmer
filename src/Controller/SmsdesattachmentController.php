<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\I18nDateTimeInterface;
use Cake\Error;
use Cake\Event\Event;
use Cake\Log\Log;
use App\Others\commutil;

/**
 * Smsdesattachment Controller
 *
 * @property \App\Model\Table\SmsdesattachmentTable $Smsdesattachment
 *
 * @method \App\Model\Entity\Smsdesattachment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsdesattachmentController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    var $farmerapi;
    var $smscontent;
    var $regionlist;
    var $districtlist;
    var $upazillalist;

    public function index() {

        $smsdesattachment = $this->paginate($this->Smsdesattachment->find('all')->contain(['Smscontent', 'divisions', 'regions', 'districts', 'upazilla']));
//        // dd($smsdesattachment);
        $this->set(compact('smsdesattachment'));
        $this->fillalllist();
//        $query = [];
//        $query = ['smscontantoid' => "1",
//            'divisionoid' => "", 'regionoid' => "1", 'districtoid' => "1", 'upazillaoid' => "1"];
//
//        $newdataquery = [];
//        //$newdataquery = ['attachDate BETWEEN ? AND ?' => ['2001-02-01', '2001-01-03']];
//        $startdate='2001-02-01';
//        $enddate='2001-01-03';
//        $newdataquery = ['attachDate <=' => $startdate, 'attachDate >=' => $enddate];
//        foreach ($query as $key => $data) {
//            if (strlen($data) > 0) {
//                $newdataquery[$key] = $data;
//            }
//        }
        //$smsdesattachment = $this->Smsdesattachment->find('all', ['contain' => ['Smscontent', 'divisions', 'regions', 'districts', 'upazilla']]);
        //dd($smsdesattachment);
        //$this->set(compact('smsdesattachment'));
        //$this->fillalllist();
        //debug($newdataquery);
//        foreach ($query as $key => $data) {
//            if (strlen($data) > 0) {
//                $newdataquery[$key] = $data;
//            }
//        }
//        dd($newdataquery);
    }

    //Here we fill the sms Des Attachment list
    public function fillsmsdesattachmentlist($startdate, $enddate, $smscontentoid = "", $divisionoid = "", $regionid = "", $districtid = "", $upazillaid = "") {
        $this->autoRender = false;
        $query = ['smscontantoid' => $smscontentoid, 'Smsdesattachment.divisionoid' => $divisionoid, 'Smsdesattachment.regionoid' => $regionid, 'Smsdesattachment.districtoid' => $districtid, 'Smsdesattachment.upazillaoid' => $upazillaid];
        $newdataquery = ['attachDate >=' => $startdate, 'attachDate <=' => $enddate];
        foreach ($query as $key => $data) {
            if (strlen($data) > 0) {
                $newdataquery[$key] = $data;
            }
        }

        //  $this->Log(print_r($newdataquery, true) , 'debug');
//        $query = ['? BETWEEN ? AND ?' => [attachDate, $startdate, $enddate], 'smscontantoid' => $smscontentoid,
//            'divisionoid' => $divisionoid, 'regionoid' => $regionid, 'districtoid' => $districtid, 'upazillaoid' => $upazillaid];
//        $newdataquery = [];
//        if ($startdate != "" && $enddate != "") {
//            $newdataquery = ['? BETWEEN ? AND ?' => [attachDate, $startdate, $enddate]];
//        }
//        foreach ($query as $key => $data) {
//            if (strlen($data) > 0) {
//                $newdataquery[$key] = $data;
//            }
//        }
        // dd($smsdesattachmentlist);
        //$smsdesattachlist = $this->Smsdesattachment->find('all')->contain(['Smscontent', 'divisions', 'regions', 'districts', 'upazilla'])->limit(10);
        $smsdesattachmentlist = $this->Smsdesattachment->find('all', ['contain' => ['Smscontent', 'divisions', 'regions', 'districts', 'upazilla'], 'conditions' => $newdataquery]);
//        $smsdesattachlist = $this->Smsdesattachment->find('all')->where($query);
        // $this->Log(print_r($smsdesattachmentlist, true), 'debug');
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($smsdesattachmentlist));


//        $query = ['name'=> $name, 'status'=> $status, 'id'=> $code_transaction];
//$newdataquery =[];
//foreach($query as $key => $data) {
// if (strlen($data) > 0 )
//     $newdataquery[$key] = $data;
//}
//$orders = $this->Orders->find('all')->where($newdataquery);
//$conditions = array(
//            'conditions' => array(
//            'and' => array(
//                '? BETWEEN ? AND ?' => array($date, 'Item.date_start', 'Item.date_end'),
//                'Item.title LIKE' => "%$title%",
//                'Item.status_id =' => '1'
//                )));
//
//        $this->set('items', $this->Item->find('all', $conditions));
//
//
//
//WHERE (('2012-10-06' BETWEEN 'Item.date_start' AND 'Item.date_end') AND (`Item`.`title` LIKE '%%') AND (`Item`.`status_id` = 1))        
    }

    //Here we fill all the List
    private function fillalllist() {
        $this->fillsmscontentlist();
        $this->filldivision();
        $this->set('regionlist', '');
        $this->set('districtlist', '');
        $this->set('upazillalist', '');

        // $this->fillregion(1, true);
        // $this->filldistrict(1, true);
        // $this->fillupazilla(1, true);
    }

    private function fillsmscontentlist() {
        $smscontent = TableRegistry::get('smscontent');
        //$smscontentlist = $smscontent->find('list', ['keyField' => 'SmsContentOID', 'valueField' => 'SMSHeadingBan']);
        $smscontentlist = $smscontent->find('all');
        $this->set('smscontentlist', $smscontentlist);
        $this->set('smscontent', $smscontentlist);
    }

    public function fillfarmerlist($upazillaid="",$projectid="",$groupid="",$strstat=false) {
        $this->autoRender = $strstat;
        $f = new Log();
        //debug($upazillaid);
        $f->debug(strval($strstat));
        $farmer = TableRegistry::get('farmerapi');
        if ($upazillaid != "") {
            $query = ['upazillaoid' => $upazillaid, 'projectoid' => $projectid, 'groupoid' => $groupid];
            foreach ($query as $key => $data) {
                if (strlen($data) > 0) {
                    $newdataquery[$key] = $data;
                }
            }
            $farmerlist = $farmer->find('all', ['fields' => ['farmer_name', 'phone', 'OID'],'conditions' => $newdataquery]);            
        }
       
        else if ($upazillaid==""){
             $farmerlist = $farmer->find('all', ['fields' => ['farmer_name', 'phone', 'OID']])->limit(10);
        }
        // debug($farmerlist);
        //dd($farmerlist);
        $this->set('farmerapis', $farmerlist);
        $this->set('data', $farmerlist);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($farmerlist));
    }

    private function filldivision() {
        $division = TableRegistry::get('divisions');
        $divisionlist = $division->find('list', ['keyField' => 'Divisionoid', 'valueField' => 'DivisionName']);
        $this->set('divisionlist', $divisionlist);
    }

    public function fillregion($divisionid) {
        $this->autoRender = false;
        $region = TableRegistry::get('regions');
        $regionlist = $region->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName', 'conditions' => ['DivisionOID' => $divisionid]]);
        // $this->set('regionlist', $regionlist);
//        if ($stat == true) {
        $this->set('regionlist', $regionlist);
//        } else {
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($regionlist));
        // }
    }

    public function filldistrict($regionsoid) {
        $this->autoRender = false;
        $district = TableRegistry::get('districts');
        $districtlist = $district->find('list', ['keyField' => 'DistrictOID', 'valueField' => 'DistrictName', 'conditions' => ['regionoid' => $regionsoid]]);

//        if ($stat == true) {
        $this->set('districtlist', $districtlist);
//        } else {
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($districtlist));
        // }
    }

    public function fillupazilla($disrictoid) {
        $this->autoRender = false;
        $upazilla = TableRegistry::get('upazilla');
        $upazillalist = $upazilla->find('list', ['keyField' => 'Upazilla_oid', 'valueField' => 'UpazillaName', 'conditions' => ['DistrictOID' => $disrictoid]]);
//        if ($stat == true) {
        $this->set('upazillalist', $upazillalist);
//        } else {
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($upazillalist));
        // }
    }

    public function fillunion($upazillaoid) {
        $this->autoRender = false;
        $union = TableRegistry::get('tunion');
        $unionlist = $union->find('list', ['keyField' => 'Unionoid', 'valueField' => 'UnionName', 'conditions' => ['UpazillaOID' => $upazillaoid]]);
        $this->set('unionName', $unionlist);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($unionlist));
    }

    private function fillProjectgroup() {
        $group = TableRegistry::get('tgroup');
        $smstype = TableRegistry::get('codelistdetail');
        $project = TableRegistry::get('project');
        $groupList = $group->find('list', ['keyField' => 'GroupOID', 'valueField' => 'GroupName']);
        $this->set('GroupName', $groupList);
        $projectList = $project->find('list', ['keyField' => 'ProjectOID', 'valueField' => 'ProjectName']);
        $this->set('ProjectName', $projectList);
        $smstypeList = $smstype->find('list', ['keyField' => 'ListItemID', 'valueField' => 'ListItemNameEng', 'conditions' => ['codelistid' => 1]]);
        $this->set('smstypelist', $smstypeList);
        $suggestiontypeList = $smstype->find('list', ['keyField' => 'ListItemID', 'valueField' => 'ListItemNameEng', 'conditions' => ['codelistid' => 2]]);
        $this->set('suggestiontypelist', $suggestiontypeList);
        //$this->set(compact('groupList','projectList'));
    }

    /**
     * View method
     *
     * @param string|null $id Smsdesattachment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $smsdesattachment = $this->Smsdesattachment->get($id, [
            'contain' => [],
        ]);

        $this->set('smsdesattachment', $smsdesattachment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        //var $farmerlist;
        //var $smscontentlist;
        $comm = new commutil();
        $this->filldivision();
        $this->set('checked', '');
        $this->set('RegionName', '');
        $this->set('DistrictName', '');
        $this->set('UpazillaName', '');
        $this->set('unionName', '');
        $this->set('farmerapi', '');
        $this->fillfarmerlist("","","",true);
        $this->fillProjectgroup();
        $this->fillsmscontentlist();
        $smsdesattachment = $this->Smsdesattachment->newEmptyEntity();

        if ($this->request->is('post')) {
            $smsdesattachment = $this->Smsdesattachment->patchEntity($smsdesattachment, $this->request->getData(), ['associated' => ['smsdesattachmentdetail', 'smsdesattachmentdetail.farmerapi', 'smscontent']]);
            //dd($smsdesattachment);
            // dd($this->request->getData());

            $smsdesattachment->smscontantoid = $this->getsmscontentoid();
            $smsconid = $smsdesattachment->smscontantoid;
            $smsdesattachment->desattachID = $comm->getsmsdesattachid();
            $smsdesattachment->attachDate = Time::parseDate($this->request->getData('attachDate'), 'Y-M-d');
            $smsdesattachment->fromdate = Time::parseDate($this->request->getData('fromdate'), 'Y-M-d');
            $smsdesattachment->todate = Time::parseDate($this->request->getData('todate'), 'Y-M-d');
            $smsdesattachment->divisionoid = $this->request->getData('divisionoid');
            $smsdesattachment->regionoid = $this->request->getData('regionoid');
            $smsdesattachment->districtoid = $this->request->getData('districtoid');
            $smsdesattachment->upazillaoid = $this->request->getData('upazillaoid');
            $smsdesattachment->unionoid = $this->request->getData('unionoid');
            $smsdesattachment->projectid = $this->request->getData('projectid');
            $smsdesattachment->groupid = $this->request->getData('groupid');
            $smsdesattachment->smslanguage = $this->request->getData('smslanguage');
            $smsdesattachment->SMStypeid = $this->request->getData('SMSTypeID');
            $smsdesattachment->SuggestionTypeID = 6;  //Hard Coded Attachment
            $save = true;
            //dd($smsdesattachment);
            if (!$this->Smsdesattachment->save($smsdesattachment)) {
                $save = false;
            }
            $desid = $smsdesattachment->desattachID;
            //dd($this->request->getData('farmeroid'));
            if (!$this->savefarmerlist($this->request->getData('farmeroid'), $desid, $smsconid)) {
                $save = false;
            }
            if (!$this->savesmscontentstatus($smsconid)) {
                $save = false;
            }
            if ($save == true) {
                $this->Flash->success(__('The Attachment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Attachment could not be saved. Please, try again.'));
        }
        $this->set(compact('smsdesattachment'));
    }

    //Here we save sms content Status
    private function savesmscontentstatus($smsconid) {
        try {
            $smscontent = TableRegistry::get('smscontent');
            $smscon = $smscontent->get($smsconid);
            $smscon->SuggestionTypeID = 6;  //For the Attachment Status
            $smscontent->save($smscon);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    //Here we save the farmer database
    private function savefarmerlist($farmerlist, $desattachid, $smsconid) {
        // dd($farmerlist);
        $comm = new commutil();
        $smsdestab = TableRegistry::getTableLocator()->get('smsdesattachmentdetail');
        $save = true;
        foreach ($farmerlist as $key => $value) {
            //dd($value);
            if ($value == '1') {
                //dd($key);
                $smsdeslist = $smsdestab->find('all', ['conditions' => ['desattachid' => $desattachid, 'farmeroid' => $key]]);
                if ($smsdeslist->count() == 0) {
                    $smsdest = $smsdestab->newEmptyEntity();
                    $smsdest->desattachdeatailsid = $comm->getsmsdesattadetailschid();
                    $smsdest->desattachid = $desattachid;
                    $smsdest->farmeroid = $key;
                    if (!$smsdestab->save($smsdest)) {
                        $save = false;
                    }
                    $smsdesdetailsoid = $smsdest->desattachdeatailsid;
                    // $farmeroid = $key;
                    // debug($smsdesdetailsoid . '-' . $farmeroid);
                    if (!$this->savedesmanagement($key, $smsconid, $desattachid, $smsdesdetailsoid)) {
                        $save = false;
                    }
                }
            }
        }
        return $save;
    }

    //Here we save Desimination Management 
    private function savedesmanagement($farmeroid, $smscontentoid, $desattachid, $desattachdetid) {
        $comm = new commutil();
        $smsdesmgmtab = TableRegistry::getTableLocator()->get('smsdesmanagement');
        $save = true;
        $farmer = $this->getfarmer($farmeroid);
        //dd($farmer->phone);
        $smscontent = $this->getsmscontent($smscontentoid);

        $smsdesmgmlist = $smsdesmgmtab->find('all', ['conditions' => ['desattachmentdetailsid' => $desattachdetid]]);

        if ($smsdesmgmlist->count() == 0) {
            $smsdesmgm = $smsdesmgmtab->newEmptyEntity();

            $smsdesmgm->SmsDesMngOID = $comm->getsmsdesmgmid();
            $smsdesmgm->SmsContentOID = $smscontentoid;
            $smsdesmgm->FarmerID = $farmeroid;
            $smsdesmgm->FarMobileNo = $farmer->phone;
            $smsdesmgm->SMSNo = $smscontent->SMSNo;
            $smsdesmgm->SMSSlNo = $smscontent->SMSSlNo;
            $smsdesmgm->MonthID = $smscontent->MonthID;
            $smsdesmgm->CYearNo = $smscontent->CYearNo;
            $smsdesmgm->CreatedDate = Time::now();
            $smsdesmgm->CreatedBY = 1;
            $smsdesmgm->desattachmentdetailsid = $desattachdetid;
            $smsdesmgm->desattachmentid = $desattachid;

            if (!$smsdesmgmtab->save($smsdesmgm)) {
                $save = false;
            }
        }
        return $save;
    }

    private function getfarmer($farmeroid) {

        $farmertab = TableRegistry::getTableLocator()->get('farmerapi');
        $farmer = $farmertab->find('all', ['conditions' => ['OID' => $farmeroid]]);
        return $farmer->first();
    }

    private function getsmscontent($smscontentoid) {
        $smscontenttab = TableRegistry::getTableLocator()->get('smscontent');
        $smscontent = $smscontenttab->find('all', ['conditions' => ['SmsContentOID' => $smscontentoid]]);
        return $smscontent->first();
    }

    private function getsmscontentoid() {
        if ($this->request->getData('smscontentlist') == '') {
            return 0;
        } else {
            return $this->request->getData('smscontentlist');
        }

//        foreach ($smscontent as $key => $value) {
//            if ($value == '0') {
//                return $key;
//            }
//        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Smsdesattachment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $smsdesattachment = $this->Smsdesattachment->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsdesattachment = $this->Smsdesattachment->patchEntity($smsdesattachment, $this->request->getData());
            if ($this->Smsdesattachment->save($smsdesattachment)) {
                $this->Flash->success(__('The smsdesattachment has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsdesattachment could not be saved. Please, try again.'));
        }
        $this->set(compact('smsdesattachment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smsdesattachment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $smsdesattachment = $this->Smsdesattachment->get($id);
        if ($this->Smsdesattachment->delete($smsdesattachment)) {
            $this->Flash->success(__('The smsdesattachment has been deleted.'));
        } else {
            $this->Flash->error(__('The smsdesattachment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
