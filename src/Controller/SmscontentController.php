<?php

declare(strict_types=1);

namespace App\Controller;

//namespace App\others;

use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\I18nDateTimeInterface;
use Cake\Error;
use App\Others\commutil;

/**
 * Smscontent Controller
 *
 * @property \App\Model\Table\SmscontentTable $Smscontent
 *
 * @method \App\Model\Entity\Smscontent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SmscontentController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {

        //  $ff=new commutil();
        //$drt=$ff->getsmscontentoid(1);
        //dd($drt);
        //$d=checkAndGenerateRandomNumber(1);
        $this->fillList();
        $smscontent = $this->paginate($this->Smscontent->find('all', ['contain' => ['codelistdetailA', 'codelistdetailB']]));
        //debug($smscontent);
        $this->set(compact('smscontent'));
    }

    //Here we save the audio file
//    private function saveaudionfile() {
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://3v5j9n.api.infobip.com/tts/3/single",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 30,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "POST",
//            CURLOPT_POSTFIELDS => "{\n  \"from\": \"442032864231\",\n  \"to\": \"41793026727\",\n  \"text\": \"Test Voice message.\",\n \"language\": \"en\",\n \"voice\": {\n \"name\": \"Joanna\",\n \"gender\": \"female\" }\n}",
//            CURLOPT_HTTPHEADER => array(
//                "accept: application/json",
//                "authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==",
//                "content-type: application/json"
//            ),
//        ));
//        $response = curl_exec($curl);
//        $err = curl_error($curl);
//        curl_close($curl);
//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            echo $response;
//        }
//    }

    //Here we search the Content
    //$smstypeid,$suggestiontypeid
    public function searchcontent($smstypeid = "", $suggestiontypeid = "") {
        $this->autoRender = false;
        // debug($this->request->getData());
        $smsdesattachment = TableRegistry::get('smscontent');
        $query = ['SMSTypeID' => $smstypeid, 'SuggestionTypeID' => $suggestiontypeid];
        foreach ($query as $key => $data) {
            if (strlen($data) > 0) {
                $newdataquery[$key] = $data;
            }
        }
        //       dd($smsdesmgm);
        //$smsdesmgm = $smsdesattachment->find('all', ['contain' => ['codelistdetailA', 'codelistdetailB'],'conditions' => ['SMSTypeID' => $smstypeid, 'SuggestionTypeID' =>$suggestiontypeid]]);
        //$smsdesmgm = $smsdesattachment->find('all', ['contain' => ['codelistdetailA', 'codelistdetailB'],'conditions'=>['OR'=>[['SMSTypeID' => $smstypeid],['SuggestionTypeID' => $suggestiontypeid]]]]);
        $smsdesmgm = $smsdesattachment->find('all', ['contain' => ['codelistdetailA', 'codelistdetailB'], 'conditions' => $newdataquery]);
//        dd($smsdesmgm);
//
//        //$this->set('smscontentlist', $smsdesmgm);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($smsdesmgm));
    }

    //here we fill content List
    public function fillcontentlist($smstypeid) {
        $this->autoRender = false;
        $smsdesattachment = TableRegistry::get('smscontent');
        $smsdesmgm = $smsdesattachment->find('all', ['contain' => ['codelistdetailA', 'codelistdetailB'], 'conditions' => ['SMSTypeID' => $smstypeid]]);

        //$this->set('smscontentlist', $smsdesmgm);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($smsdesmgm));
    }

    private function fillList() {
        $this->fillSmsTypeList();
        $this->fillSmsstatusList();
    }

    /**
     * View method
     *
     * @param string|null $id Smscontent id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $smscontent = $this->Smscontent->get($id, [
            'contain' => [],
        ]);
        $this->set('smscontent', $smscontent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $comm = new commutil();

        $this->fillCropList();
        $this->fillSmsTypeList();
        //$this->fillSmsstatusList();
        $this->fillSMSNo();
        $smscontent = $this->Smscontent->newEmptyEntity();

        if ($this->request->is('post')) {

            $smscontent = $this->Smscontent->patchEntity($smscontent, $this->request->getData());
            $smscontent->SmsContentOID = $comm->getsmscontentoid();
            $smscontent->SuggestionTypeID = 4; //This is Draft
            $smscontent->CreatedBy = 1;
            $smscontent->CreatedDate = Time::now();
            $smscontent->CYearNo = $this->getCyearSlNo(date('Y'));
            //dd($smscontent);
            if ($this->Smscontent->save($smscontent)) {
                $this->Flash->success(__('The SMS Content has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The SMS Content could not be saved. Please, try again.'));
        }

        $this->set(compact('smscontent'));
    }

    private function fillSMSNo() {
        $now = Time::now();
        $cyear = $now->year;
        $this->set('CYearNo', $cyear);
        $this->set('MonthID', date('n'));
        $this->set('MonthName', date('F'));
        $smsconslno = $this->getSMSSlNo($cyear, date('n'));
        //dd($cyear,date('n'));
        $this->set('SMSSlNo', $smsconslno);
        $smsno = $this->getCyearSlNo($cyear) . date('n') . $smsconslno;

        $this->set('SMSNo', $smsno);
    }

    private function getCyearSlNo($cyear) {
        $yearen = TableRegistry::get('cyearen');
        $year = $yearen->findByCyear($cyear);
        return $year->first()->Slno;
    }

    private function getSMSSlNo($cyear, $cmonth) {
        $slno = $this->getCyearSlNo($cyear);
        $smsconcount = $this->Smscontent->find('all', ['conditions' => ['cyearNo' => $slno, 'MonthID' => $cmonth]]);

        if ($smsconcount->count() > 0) {
            return $smsconcount->count() + 1;
        } else {
            return 1;
        }
    }

    private function fillCropList() {
        $code = TableRegistry::get('crops');
        $cropslist = $code->find('list', ['keyField' => 'cropsOID', 'valueField' => 'CropsNameEn']);
        $this->set('cropslist', $cropslist);
    }

    private function fillSmsTypeList() {
        $smstype = TableRegistry::get('codelistdetail');
        $smstypelist = $smstype->find('list', ['keyField' => 'ListItemID', 'valueField' => 'ListItemNameEng', 'conditions' => ['CodelistID' => 1]]);
        $this->set('smstypelist', $smstypelist);
    }

    private function fillSmsstatusList() {
        $smstype = TableRegistry::get('codelistdetail');
        $smsstatuslist = $smstype->find('list', ['keyField' => 'ListItemID', 'valueField' => 'ListItemNameEng', 'conditions' => ['CodelistID' => 2]]);
        $this->set('smsstatuslist', $smsstatuslist);
    }

    /**
     * Edit method
     *
     * @param string|null $id Smscontent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $smscontent = $this->Smscontent->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smscontent = $this->Smscontent->patchEntity($smscontent, $this->request->getData());
            if ($this->Smscontent->save($smscontent)) {
                $this->Flash->success(__('The smscontent has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The smscontent could not be saved. Please, try again.'));
        }
        $this->set(compact('smscontent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Smscontent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $smscontent = $this->Smscontent->get($id);
        if ($this->Smscontent->delete($smscontent)) {
            $this->Flash->success(__('The smscontent has been deleted.'));
        } else {
            $this->Flash->error(__('The smscontent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
