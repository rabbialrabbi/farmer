<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Http\Client;
use Cake\Event\Event;

/**
 * Smsdesmanagement Controller
 *
 * @property \App\Model\Table\SmsdesmanagementTable $Smsdesmanagement
 *
 * @method \App\Model\Entity\Smsdesmanagement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmsdesmanagementController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $smscontents = TableRegistry::get('smscontent');
        $smscontentList = $smscontents->find('list', ['keyField' => 'SmsContentOID', 'valueField' => 'SMSContentBodyBan']);
        $smsdesmanagement = $this->paginate($this->Smsdesmanagement->find()->contain(['smscontent', 'farmerapi', 'farmerapi.districts']));
        //debug($smsdesmanagement->farmerapi);
        $this->set(compact('smsdesmanagement', 'smscontentList'));

        // $r=$this->fillfarmerlist(3);
    }

    /**
     * View method
     *
     * @param string|null $id Smsdesmanagement id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $smsdesmanagement = $this->Smsdesmanagement->get($id, [
            'contain' => [],
        ]);
        $this->set('smsdesmanagement', $smsdesmanagement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    //Here we get the Farmer List
    public function fillfarmerlist($smscontentid) {

        $this->autoRender = false;
        $smsdesattachment = TableRegistry::get('smsdesattachmentdetail');
        $smsdesmgm = $smsdesattachment->find('all', ['contain' => ['smsdesattachment', 'farmerapi'], 'conditions' => ['smscontantoid' => $smscontentid]]);
        // debug($smsdesmgm);
        $this->set('tblfarmerlist', $smsdesmgm);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($smsdesmgm));
    }

    public function add() {
        $messageid='';
        $smscontent = TableRegistry::get('smscontent');
        $farmtble = TableRegistry::get('farmerapi');
        $farmerapilist = $farmtble->find('all')->limit(10);
        $smscontentList = $smscontent->find('list', ['keyField' => 'SmsContentOID', 'valueField' => 'SMSContentBodyBan', 'conditions' => ['SuggestionTypeID' => 4]]);
        $this->set('SMSContentBody', $smscontentList);

        if ($this->request->is('post')) {
            $smsConOID = $this->request->getData('SmsContentOID');
             $smscon = $smscontent->get($smsConOID);
            $smsdesmanagemenlist = $this->Smsdesmanagement->find('all', ['conditions' => ['AND'=>['SmsContentOID' => $smsConOID, 'status!=' => 'S']]]);
            foreach ($smsdesmanagemenlist as $smsdesmanagemen) {
                $smsdesmanagemen->SendingDate = Time::now();
                $smsdesmanagemen->status = 'S';

//               //******************Dim For Time Being************************
                if ($this->getsoftsettings()==1) {  //Message send Status is yes
                    if ($smscon->SMSTypeID==1)  //Text Message
                    {
                        $this->sendBodySMS($smsBody,$farmer->FarMob,$smsno);
                    }
                    else {
                      $messageid = $this->sendaudionfile($smsBody,$farmer->FarMob);
                    }
                }
                $smsdesmanagemen->messageid=$messageid;
                 $this->Smsdesmanagement->save($smsdesmanagemen);
//               //break;
//               //******************Dim For Time Being************************
            }

            $smscon->SuggestionTypeID = 5;  //for SMS send Status update
            $smscontent->save($smscon);

            $this->Flash->success(__('All SMS Has Been Send'));
        }
        $this->set(compact( 'smscontentList', 'farmerapilist'));
    }
    //Here we get the Software Settings
    private function getsoftsettings(){
         $softwaresettingstab = TableRegistry::get('softsettings');
         $softwaresettings=$softwaresettingstab->get(17);
         return $softwaresettings->msgsend;
    }
    public function getsmsdissemination($id) {
        $this->autoRender = false;
        //return('Hello');
        $smsdes = TableRegistry::get('smsdesmanagement');
        $smsdesmgmList = $smsdes->find('all', ['contain' => ['farmerapi', 'farmerapi.Districts'], 'conditions' => ['SmsContentOID' => $id, 'smsdesmanagement.status'=>'S']]);
        $this->set('data', $smsdesmgmList);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($smsdesmgmList));
    }
    public function sendaudionfile($msgd,$farmb) {
        $curl = curl_init();

        $this->autoRender = false;
        $sceid=$this->getscearioid($msgd);
        $sendermobileno="8804445654310";
       // dd($sceid);
        //$stri= "{\n    \"bulkId\": \"BULK-ID-123-xyz\",\n    \"messages\": [\n        {\n            \"scenarioId\": \".$sceid.\",\n            \"from\": \"8804445654310\",\n            \"destinations\": [\n                {\n                    \"to\": \"8801740773262\"\n                },\n                {\n                    \"to\": \"8801838247420\"\n                }\n            ],\n            \"parameters\": {\n                \"foo\": \"bar\"\n            },\n            \"notifyUrl\": \"https://www.example.com/voice/advanced\",\n            \"notifyContentType\": \"application/json\",\n            \"callbackData\": \"DLR callback data\",\n            \"validityPeriod\": 720,\n            \"sendAt\": \"2016-07-07T17:00:00.000+01:00\",\n            \"record\": false,\n            \"retry\": {\n                \"minPeriod\": 1,\n                \"maxPeriod\": 5,\n                \"maxCount\": 5\n            }\n        }\n    ]\n}";
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://3v5j9n.api.infobip.com/voice/ivr/1/messages",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            //CURLOPT_POSTFIELDS => "{\n    \"bulkId\": \"BULK-ID-123-xyz\",\n    \"messages\": [\n        {\n            \"scenarioId\": \"D132FA3B9236AEEE5D32A48F5F4DA77F\",\n            \"from\": \"8804445654310\",\n            \"destinations\": [\n                {\n                    \"to\": \"8801740773262\"\n                },\n                {\n                    \"to\": \"8801838247420\"\n                }\n            ],\n            \"parameters\": {\n                \"foo\": \"bar\"\n            },\n            \"notifyUrl\": \"https://www.example.com/voice/advanced\",\n            \"notifyContentType\": \"application/json\",\n            \"callbackData\": \"DLR callback data\",\n            \"validityPeriod\": 720,\n            \"sendAt\": \"2016-07-07T17:00:00.000+01:00\",\n            \"record\": false,\n            \"retry\": {\n                \"minPeriod\": 1,\n                \"maxPeriod\": 5,\n                \"maxCount\": 5\n            }\n        }\n    ]\n}",
            //CURLOPT_POSTFIELDS => "{\n    \"bulkId\": \"BULK-ID-123-xyz\",\n    \"messages\": [\n        {\n            \"scenarioId\": \"{$sceid}\",\n            \"from\": \"8804445654310\",\n            \"destinations\": [\n                {\n                    \"to\": \"8801740773262\"\n                },\n                {\n                    \"to\": \"8801923121777\"\n                }\n            ],\n            \"parameters\": {\n                \"foo\": \"bar\"\n            },\n            \"notifyUrl\": \"https://www.example.com/voice/advanced\",\n            \"notifyContentType\": \"application/json\",\n            \"callbackData\": \"DLR callback data\",\n            \"validityPeriod\": 720,\n            \"sendAt\": \"2016-07-07T17:00:00.000+01:00\",\n            \"record\": false,\n            \"retry\": {\n                \"minPeriod\": 1,\n                \"maxPeriod\": 5,\n                \"maxCount\": 5\n            }\n        }\n    ]\n}",
            CURLOPT_POSTFIELDS => "{\n    \"bulkId\": \"BULK-ID-123-xyz\",\n    \"messages\": [\n        {\n            \"scenarioId\": \"{$sceid}\",\n            \"from\": \"{$sendermobileno}\",\n            \"destinations\": [\n                {\n                    \"to\": \"{$farmb}\"\n                }\n                            ],\n            \"parameters\": {\n                \"foo\": \"bar\"\n            },\n            \"notifyUrl\": \"http://ownssms.safeit-bd.com?sender=$sendermobileno&receiver=$farmb&cdate=2019-07-27&message=testmessage444444&id=4234234&pairedmessageid=2123123123\",\n            \"notifyContentType\": \"application/json\",\n            \"callbackData\": \"DLR callback data\",\n            \"validityPeriod\": 720,\n            \"sendAt\": \"2016-07-07T17:00:00.000+01:00\",\n            \"record\": false,\n            \"retry\": {\n                \"minPeriod\": 1,\n                \"maxPeriod\": 5,\n                \"maxCount\": 5\n            }\n        }\n    ]\n}",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Basic bXIuY29uc3VsdGFudDpAVklQMTIzNDVAdmlwOzo==",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        //dd($response);
        $err = curl_error($curl);

        $arr = json_decode($response, true);
        $msgid=$arr['messages'][0]['messageId'];

        curl_close($curl);
        return $msgid;
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    private function getscearioid($msgbdy) {
        $curl = curl_init();
        //$this->autoRender = false;
        $msgdd="আপনি এই বার্তা থেকে উপকৃত হয়ে থাকলে ১ চাপুন, অথবা ০ চাপুন";
        $msgdesc=$msgbdy.$msgdd;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://3v5j9n.api.infobip.com/voice/ivr/1/scenarios",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            //CURLOPT_POSTFIELDS => "{\n   \"name\": \"mrc\",\n    \"description\": \"This simple scenario is used as an example how to implement two actions (say and hangup).\",\n    \"script\": [\n        {\n            \"say\": \"Dear Customer, we will show you how to use create, read, update, delete scenarios methods.\",\n            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"en\",\n                \"voice\": {\n                    \"name\": \"Joanna\",\n                    \"gender\": \"female\"\n                }\n            }\n        },\n        \"hangup\"\n    ]\n}",
           // CURLOPT_POSTFIELDS => "{\n   \"name\": \"mrc\",\n    \"description\": \"This simple scenario is used as an example how to implement two actions (say and hangup).\",\n    \"script\": [\n        {\n            \"say\": \" এহসাণ ভাই রাতে ভাল ঘুম হইছে। ভাল থাকবেণ । \",\n            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n        },\n        \"hangup\"\n    ]\n}",
          //    CURLOPT_POSTFIELDS => "{\n   \"name\": \"mrc\",\n    \"description\": \"This simple scenario is used as an example how to implement two actions (say and hangup).\",\n    \"script\": [\n        {\n \"audioFileUrl\": \"http://localhost:8080/SMSDAEEXTgrid/upload/farmer.wma\",\n            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"en\",\n                \"voice\": {\n                    \"name\": \"Joanna\",\n                    \"gender\": \"female\"\n                }\n            }\n        },\n        \"hangup\"\n    ]\n}",
            CURLOPT_POSTFIELDS=>"{\n
  \"name\": \"scenario\",
  \"script\": [\n
    {\n
      \"say\": \"{$msgdesc}\",\n
     \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n
    }\n,
    {\n
      \"collectInto\": \"scheduleTime\"
    }\n,
    {\n
      \"switch\": \"scheduleTime\",
      \"case\": {\n
        \"1\": [\n
          {\n
            \"say\": \"আপনি ১ চাপ দিয়েছেন ।\",\n
            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n
          }\n
        ]\n,
        \"0\":[\n
          {\n
            \"say\": \"আপনি ০ চাপ দিয়েছেন।\",\n
            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n
          }\n
        ]\n,
        \"__default\": [\n
          {\n
            \"say\": \"আপনাকে আবার আমরা কৃষির খবর জানানো হবে\",\n
            \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n
          }\n,
          \"hangup\"
        ]\n
      }\n
    }\n,
    {\n \"say\": \"আপনাকে অনেক ধন্যবাদ\",\n
    \"options\": {\n                \"speechRate\": 1,\n                \"language\": \"bn\",\n                \"voice\": {\n                    \"name\": \"Sushmita (beta)\",\n                    \"gender\": \"female\"\n                }\n            }\n
    }\n,
    \"hangup\"
  ]\n
}\n",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Basic bXIuY29uc3VsdGFudDpAVklQMTIzNDVAdmlwOzo==",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
       // dd($response);
        $err = curl_error($curl);

        curl_close($curl);
        $arr = json_decode($response, true);
        return $arr['id'];
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
    //Here we send the SMS
    function sendBodySMS($smsBody, $mobNo, $smsno) {

        $dBody = ' উত্তর দেবার কোড:' . $smsno . 'অথবা উপকৃত হলে 1 , না হলে 0 চাপুন';

        $http = new Client();
        $smsBody = $smsBody . $dBody;
        //   https://api.mobireach.com.bd/SendTextMessage?Username=testuser&Password=XXXXXX&From=88018XXXXXXXX&To=8801XXXXXXXXX&Message=testmessage;
        //$dd='https://www.bamis.gov.bd/api/json/sms/textsms/add/?user=&#39;mrcons&#39;&pass=&#39;mrcons21&#39;&numbers=&#39;8801740773262&#39;&message=&#39;HELLO&#39;&mask=AMISDP&#160;DAE';
        $userName = 'mr.consultant';
        $psw = '@VIP12345@vip;:';
        $from = '8804445654310';
        $dd = 'https://3v5j9n.api.infobip.com/sms/1/text/query?username=' . $userName . '&password=' . $psw . '&to=' . $mobNo . '&text=' . $smsBody . '&from=' . $from;
        // $smsSendUrl='https://api.mobireach.com.bd/SendTextMessage?Username=mr.consultant&Password=Mrconsdae@1122&From=8801847433097&To='.$mobNo.'&Message='.$smsBody;
        $smsSendUrl = $dd;
        //$smsSendUrl='https://www.bamis.gov.bd/api/json/sms/textsms/add/?user=mrcons&pass=mrcons21&mask=AMISDP DAE&numbers='.$mobNo.'&message='.$smsBody;
        // $http->
//       $smsSendUrl=$http ->post('https://www.bamis.gov.bd/api/json/sms/textsms/add', [
//           'user' => 'mrcons',
//           'pass' => 'mrcons21',
//           'mask' => '8801847433097',
//           'numbers' => $mobNo,
//           'message' => $smsBody],
//           ['type' => 'json']
//       );
        //   $f =$http->buildUrl($smsSendUrl);
        //   $ff=$http->post($f);
        //   print_r($ff);
        // debug($smsSendUrl);
        // $strUrl = $http->buildUrl($smsSendUrl);
        $response = $http->get($smsSendUrl);

        //  debug($response);
        // $json = $response->getJson();
        // debug($json);
    }

    function fillDataSourceCombo() {

        $regions = TableRegistry::get('Regions');
        $divisions = TableRegistry::get('Divisions');
        $districts = TableRegistry::get('Districts');
        $upazillas = TableRegistry::get('upazilla');
        $unions = TableRegistry::get('tunion');
        $group = TableRegistry::get('tgroup');
        $project = TableRegistry::get('project');

        $regionList = $regions->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName']);
        $this->set('RegionName', $regionList);

        $divisionList = $divisions->find('list', ['keyField' => 'DivisionID', 'valueField' => 'DivisionName']);
        $this->set('DivisionName', $divisionList);

        $districtList = $districts->find('list', ['keyField' => 'DistrictOID', 'valueField' => 'DistrictName']);
        $this->set('DistrictName', $districtList);

        $upazillaList = $upazillas->find('list', ['keyField' => 'UpazillaOID', 'valueField' => 'UpazillaName']);
        $this->set('UpazillaName', $upazillaList);

        $unionList = $unions->find('list', ['keyField' => 'UnionOID', 'valueField' => 'UnionName']);
        $this->set('UnionName', $unionList);

        $groupList = $group->find('list', ['keyField' => 'GroupOID', 'valueField' => 'GroupName']);
        $this->set('GroupName', $groupList);

        $projectList = $project->find('list', ['keyField' => 'ProjectOID', 'valueField' => 'ProjectName']);
        $this->set('ProjectName', $projectList);
        $this->set(compact('regionList', 'divisionList', 'districtList', 'upazillaList', 'unionList', 'groupList', 'projectList'));
        // $this->set(compact('regionList','districtList','upazillaList','unionList','groupList','projectList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Smsdesmanagement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getregion($id) {
        $this->autoRender = false;
        $regions = TableRegistry::get('Regions');
        $regionList = $regions->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName', 'conditions' => ['DivisionOID' => $id]]);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($regionList));
    }

    public function edit($id = null) {
        $smsdesmanagement = $this->Smsdesmanagement->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smsdesmanagement = $this->Smsdesmanagement->patchEntity($smsdesmanagement, $this->request->getData());
            if ($this->Smsdesmanagement->save($smsdesmanagement)) {
                $this->Flash->success(__('The smsdesmanagement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smsdesmanagement could not be saved. Please, try again.'));
        }
        $this->set(compact('smsdesmanagement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smsdesmanagement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $smsdesmanagement = $this->Smsdesmanagement->get($id);
        if ($this->Smsdesmanagement->delete($smsdesmanagement)) {
            $this->Flash->success(__('The smsdesmanagement has been deleted.'));
        } else {
            $this->Flash->error(__('The smsdesmanagement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
