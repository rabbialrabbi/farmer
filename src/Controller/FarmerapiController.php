<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Client;
use Cake\Log\Log;
use App\Others\commutil;
use App\Others\sessionmgm;
use App\Others\processmanager;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Http\Response;

//use Cake\Http\Session;
/**
 * Farmerapi Controller
 *
 * @property \App\Model\Table\FarmerapiTable $Farmerapi
 *
 * @method \App\Model\Entity\Farmerapi[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
//echo $this->Html->css('ui.jqgrid');
//echo $this->Html->script('grid.locale-en');
//echo $this->Html->script('jquery.jqGrid.min');

class FarmerapiController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    var $regionlist;
    var $districtlist;
    var $upazillalist;

    public function index() {
        //  $comm = new processmanager();
        //  $r=$comm->storedatainsession();
        //  print_r($this->request->getSession()->read('Name'));
        // $division = TableRegistry::getTableLocator()->get('farmerapi');
        // dd($division->find('all')->count());
//        $sesman=new sessionmgm();
//        $t=$sesman->getunionbyid(1);
//
//        foreach ($t as $key => $value) {
//            debug($value['UnionOID']);
////            foreach ($value as $val) {
////                dd($val);
////            }
//        }
        // $farmerapi = $this->paginate($this->Farmerapi);
        //$farmerapi = $this->paginate($this->Farmerapi);
//        $sessmgm=new sessionmgm();
//        $ttt=$sessmgm->getsetuseringo(null,'r');
//        $this->viewBuilder()->setLayout('master');
//        dd($this->Auth->identify());
        $farmerapi = $this->Farmerapi->find('All')->limit(20);
        $this->set(compact('farmerapi'));
        $this->fillalllist();

        // $this->adminshowgrid();
//        exit();
    }

//    public function adminshowgrid() {
//        try {
//            $mydata = [
//                ["divisionoid" => "11", "divisionname" => "test", "labelen" => "note"],
//                ["divisionoid" => "21", "divisionname" => "test2", "labelen" => "note2"],
//                ["divisionoid" => "31", "divisionname" => "test3", "labelen" => "note3"],
//                ["divisionoid" => "41", "divisionname" => "test4", "labelen" => "note4"],
//                ["divisionoid" => "51", "divisionname" => "test5", "labelen" => "note5"],
//                ["divisionoid" => "61", "divisionname" => "test6", "labelen" => "note6"],
//                ["divisionoid" => "71", "divisionname" => "test7", "labelen" => "note7"],
//                ["divisionoid" => "81", "divisionname" => "test8", "labelen" => "note8"],
//                ["divisionoid" => "91", "divisionname" => "test9", "labelen" => "note9"],
//                ["divisionoid" => "101", "divisionname" => "test10", "labelen" => "note10"],
//                ["divisionoid" => "111", "divisionname" => "test11", "labelen" => "note11"],
//                ["divisionoid" => "121", "divisionname" => "test12", "labelen" => "note12"]
//            ];
//
//            $f = new Log();
//            $f->debug(json_encode($mydata));
//
//            $this->autoRender = false;
//            //$divisiontable = TableRegistry::get('divisions');
//            $divisiontable = $mydata;
//
//            // get how many rows we want to have into the grid - rowNum parameter in the grid
//            //$f->debug('Halar por'.$this->request->getQuery('rows'));
//            //print_r($this->request->getData());
//            //$this->Log(print_r($this->request->getQueryParams()));
//            //$f->debug(print_r($this->request->getData()));
//            //$limit = $this->params['url']['rows'];
//            //$limit = $this->request->getParam(['url']['rows']);
//            $limit = $this->request->getQuery('rows');
//            // get index row - i.e. user click to sort. At first time sortname parameter -
//            // after that the index from colModel
//            $sidx = $this->request->getQuery('sidx');
//            // sorting order - at first time sortorder
//            $sord = $this->request->getQuery('sord');
//            $page = $this->request->getQuery('page');
//
//            // if we not pass at first time index use the first column for the index or what you want
//            if (!$sidx) {
//                $sidx = 1;
//            }
//            // calculate the number of rows for the query. We need this for paging the result
//            //$row = $divisiontable->find('all')->count();
//            $row = 10;
//            $count = $row;
//
//            //$f->debug(strval($count));
//            // calculate the total pages for the query
//            if ($count > 0) {
//                $total_pages = ceil($count / $limit);
//            } else {
//                $total_pages = 0;
//            }
//            // if for some reasons the requested page is greater than the total
//            // set the requested page to total page
//            if ($page > $total_pages) {
//                $page = $total_pages;
//            }
//            $start = $limit * $page - $limit;
//            // calculate the starting position of the rows
//            // if for some reasons start position is negative set it to 0
//            // typical case is that the user type 0 for the requested page
//            if ($start < 0) {
//                $start = 0;
//            }
//
//            // the actual query for the grid data
//            $limit_range = $start . "," . $limit;
//            $sort_range = $sidx . " " . $sord;
//            //$result = $this->{Model_Name}->findAll(null, "id,name", $sort_range, $limit_range, 1, null);
//            // $divisiontable->recursive = -1;
////        $result = $divisiontable->find('all', array(
////            'fields' => array('DivisionOID', 'DivisionName', 'label_en'),
////            'order' => $sort_range,
////            //'limit' => $limit_range
////            //'limit' => 10
////        ));
//            $i = 0;
//            //$f->debug('Halar po'.$result);
//            $response->page = $page;
//            $response->total = $total_pages;
//            $response->records = $count;
//            //$this->log
//            //dd($result);
////        foreach ($result as $result) {
////              //debug($result);
////           // $this->Log('halar po'.print_r($result->OID));
////           //  $f->debug('Halar po'.$this->response->rows[$i]);
////            $response->rows[$i]['DivisionOID'] = $result->DivisionOID;
////            $response->rows[$i]['cell'] = array($result->DivisionOID, $result->DivisionName,$result->label_en);
////            $i++;
////           // $f->debug('Halar po'.strval($i));
////        }
//            $f->debug(json_encode($mydata));
//            //dd($response);
//            //debug(json_encode($response));
//            echo $this->response
//                    ->withType('application/json')
//                    ->withStringBody(json_encode($mydata));
//
//            $this->set('mdata', $mydata);
//            //   echo json_encode($mydata);
//            //writing exit() is necessary.
//            exit();
//        } catch (Exception $ex) {
//            $f->debug('Halar po' . strval($ex));
//        }
//    }
//    public function adminshowgridbackup() {
//        $f = new Log();
//        $f->debug('Halar po kukur ');
//        $this->autoRender = false;
//        $limit = $this->request->getQuery('rows');
//        // get index row - i.e. user click to sort. At first time sortname parameter -
//        // after that the index from colModel
//        $sidx = $this->request->getQuery('sidx');
//        // sorting order - at first time sortorder
//        $sord = $this->request->getQuery('sord');
//        $page = $this->request->getQuery('page');
//        // if we not pass at first time index use the first column for the index or what you want
//        if (!$sidx) {
//            $sidx = 1;
//        }
//        // calculate the number of rows for the query. We need this for paging the result
//        $row = $this->Farmerapi->find('all')->count();
//        $count = $row;
//        // calculate the total pages for the query
//        if ($count > 0) {
//            $total_pages = ceil($count / $limit);
//        } else {
//            $total_pages = 0;
//        }
//        // if for some reasons the requested page is greater than the total
//        // set the requested page to total page
//        if ($page > $total_pages) {
//            $page = $total_pages;
//        }
//        $start = $limit * $page - $limit;
//        // calculate the starting position of the rows
//        // if for some reasons start position is negative set it to 0
//        // typical case is that the user type 0 for the requested page
//        if ($start < 0) {
//            $start = 0;
//        }
//        // the actual query for the grid data
//        $limit_range = $start . "," . $limit;
//        $sort_range = $sidx . " " . $sord;
//        //$result = $this->{Model_Name}->findAll(null, "id,name", $sort_range, $limit_range, 1, null);
//        $this->Farmerapi->recursive = -1;
//        $result = $this->Farmerapi->find('all', array(
//            'fields' => array('OID', 'farmer_name', 'phone','district_name','upazila_name','union_name','group_name','project_name'),
//            'order' => $sort_range,
//            //'conditions'=>['upa_id'=>140],
//            // 'limit' => $limit_range
//            'limit' => $limit
//        ));
//        $i = 0;
//
//        foreach ($result as $result) {
//            $response->rows[$i]['id'] = strval($i);
//            $response->rows[$i]['cell'] = array(strval($result->OID), strval($result->farmer_name), $result->phone,$result->district_name,$result->upazila_name,$result->union_name,$result->group_name,$result->project_name);
//            $i++;
//        }
//        $response->page = $page;
//        $response->total = $total_pages;
//        $response->records = $count;
//        echo json_encode($response);
//        exit();
//    }
//   public function  adminshowgridbackup() {
//        $f = new Log();
//        $f->debug('Halar po kukur ');
//        $this->autoRender = false;
//        // get how many rows we want to have into the grid - rowNum parameter in the grid
//        //$f->debug('Halar por'.$this->request->getQuery('rows'));
//        //print_r($this->request->getData());
//         //$this->Log(print_r($this->request->getQueryParams()));
//         //$f->debug(print_r($this->request->getData()));
//        //$limit = $this->params['url']['rows'];
//
//        //$limit = $this->request->getParam(['url']['rows']);
//        $limit = $this->request->getQuery('rows');
//        // get index row - i.e. user click to sort. At first time sortname parameter -
//        // after that the index from colModel
//        $sidx = $this->request->getQuery('sidx');
//        // sorting order - at first time sortorder
//        $sord =$this->request->getQuery('sord');
//        $page =$this->request->getQuery('page');
//
//        // if we not pass at first time index use the first column for the index or what you want
//        if (!$sidx){
//            $sidx = 1;
//        }
//        // calculate the number of rows for the query. We need this for paging the result
//        $row = $this->Farmerapi->find('all')->count();
//        $count = $row;
//      //  $f->debug(strval($count));
//        // calculate the total pages for the query
//        if ($count > 0) {
//            $total_pages = ceil($count / $limit);
//        } else {
//            $total_pages = 0;
//        }
//        // if for some reasons the requested page is greater than the total
//        // set the requested page to total page
//        if ($page > $total_pages){
//            $page = $total_pages;
//        }
//        $start = $limit * $page - $limit;
//        // calculate the starting position of the rows
//        // if for some reasons start position is negative set it to 0
//        // typical case is that the user type 0 for the requested page
//        if ($start < 0){
//            $start = 0;
//        }
//        // the actual query for the grid data
//        $limit_range = $start . "," . $limit;
//        $sort_range = $sidx . " " . $sord;
//        //$result = $this->{Model_Name}->findAll(null, "id,name", $sort_range, $limit_range, 1, null);
//       // $this->Farmerapi->recursive = -1;
//        $result = $this->Farmerapi->find('all', array(
//            'fields' => array('OID','FarmerID', 'phone'),
//            'order' => $sort_range,
//            'conditions'=>['upa_id'=>140],
//            //'limit' => $limit_range
//            'limit' => 10
//        ));
//        $i = 0;
//        // $f->debug('Halar po');
//         $page=1;
//         $total_pages=1;
//         $count=10;
//        // $response=[];
//      //  $response->page = $page;
//       // $response->total = $total_pages;
//       // $response->records = $count;
//        //$this->log
//       //$f->debug('halar po'.strval($result->count()));
//        foreach ($result as $result) {
//              //$f->debug('Halar po'.print_r($result->OID));
//           // $this->Log('halar po'.print_r($result->OID));
//           //  $f->debug('Halar po'.$this->response->rows[$i]);
//            $response->rows[$i]['id'] = strval($i);
//            $response->rows[$i]['cell'] = array(strval($result->OID), strval($result->FarmerID),$result->phone);
//            $i++;
//           // $f->debug('Halar po'.strval($i));
//        }
//        $response->page = $page;
//        $response->total = $total_pages;
//        $response->records = $count;
//         //$f->debug(dd($response));
//        //dd($response);
//         //$f->debug('Hello '.json_encode($response));
//         //$f->debug('Hello I am Here');
//         //$this->set('data','response');
////         return $this->response
////                        ->withType('application/json')
////                        ->withStringBody(json_encode($response));
//
//       //  $this->set(compact('response'));
//       // echo json_encode($response);
//   // $f->debug('Hello There'.json_encode($response));
////    $json_data = json_encode($response);
////    $response = $this->response->withType('json')->withStringBody($json_data);
////
////  //  $f->debug();
////    return $response;
////       // return json_encode($response);
//    //    $this->RequestHandler->respondAs('json');
//    //$this->response->getType('application/json');
//    //$this->autoRender = false;
//    echo json_encode($response);
//        //writing exit() is necessary.
//      //  exit();
//    }
    //Here we get the Fill List
    private function fillalllist() {
        $this->filldivision();
        $this->set('regionlist', '');
        $this->set('districtlist', '');
        $this->set('upazillalist', '');
    }

    //***************************Here we get the division*********************
    private function filldivision() {
        $division = TableRegistry::get('divisions');
        $divisionlist = $division->find('list', ['keyField' => 'DivisionOID', 'valueField' => 'DivisionName']);
        $this->set('divisionlist', $divisionlist);
    }

    public function fillregion($divisionid) {
        $this->autoRender = false;
        $region = TableRegistry::get('regions');
        $regionlist = $region->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName', 'conditions' => ['DivisionOID' => $divisionid]]);
        $this->set('regionlist', $regionlist);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($regionlist));
    }

    public function filldistrict($regionsoid) {
        $this->autoRender = false;
        $district = TableRegistry::get('districts');
        $districtlist = $district->find('list', ['keyField' => 'DistrictOID', 'valueField' => 'label_en', 'conditions' => ['regionoid' => $regionsoid]]);
        $this->set('districtlist', $districtlist);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($districtlist));
    }

    public function fillupazilla($disrictoid) {
        $this->autoRender = false;
        $upazilla = TableRegistry::get('upazilla');
        $upazillalist = $upazilla->find('list', ['keyField' => 'Upazilla_oid', 'valueField' => 'UpazillaName', 'conditions' => ['DistrictOID' => $disrictoid]]);
        $this->set('upazillalist', $upazillalist);
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($upazillalist));
    }

    public function fillfarmerlistduplicate() {
        $this->autoRender = false;
        $farmerapilist = $this->Farmerapi->find('All');
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($farmerapilist));
    }

    //***************************Here we get the division*********************
    public function fillfarmerlist($divisionoid = "", $regionid = "", $districtid = "", $upazillaid = "") {
        $this->autoRender = false;
        $newdataquery = [];
        $query = ['districts.DivisionOID' => $divisionoid, 'districts.RegionOID' => $regionid, 'Farmerapi.districtoid' => $districtid, 'Farmerapi.upazillaoid' => $upazillaid];
        foreach ($query as $key => $data) {
            if (strlen($data) > 0) {
                $newdataquery[$key] = $data;
            }
        }
        $this->Log(print_r($newdataquery, true), 'debug');
        $farmerapilist = $this->Farmerapi->find('all', ['contain' => ['districts', 'districts.regions', 'districts.divisions'], 'conditions' => $newdataquery]);
        $this->Log(print_r($farmerapilist, true), 'debug');
        return $this->response
                        ->withType('application/json')
                        ->withStringBody(json_encode($farmerapilist));
    }

    /**
     * View method
     *
     * @param string|null $id Farmerapi id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ProcessFarmerData() {
        $this->autoRender = false;
        set_time_limit(800);
        $http = new Client();
        $farmersapi = TableRegistry::getTableLocator()->get('farmerapi');
        $farmersapiTable = $farmersapi->find('all');
        //dd($farmersapiTable->count());
        $division = TableRegistry::get('divisions');
        $divisionTable = $division->find('all');
        $this->addDistrict(1);
        foreach ($divisionTable as $divisionen) {

            $farmerdivisionwiseList = $http->get('https://www.bamis.gov.bd/api/json/farmers/data/?user=mrcons&pass=mrcons21&div_id=' . $divisionen->DivisionID . '&limit_s=0&limit=0');
            $data = $farmerdivisionwiseList->getJson();

            foreach ($data['data'] as $farmerapi) {
                $farmer = $farmersapi->newEmptyEntity();
                $farmer->FarmerID = $farmerapi['id'];
                $farmer->farmer_name = $farmerapi['farmer_name'];
                $farmer->group_name = $farmerapi['group_name'];
                $this->addGroup($farmerapi['group_name']);
                $farmer->project_name = $farmerapi['project_name'];
                $this->addProject($farmerapi['project_name']);
                $farmer->phone = $farmerapi['phone'];
                $farmer->verified = $farmerapi['verified'];
                $farmer->createon = $farmerapi['createon'];
                $farmer->uni_id = $farmerapi['uni_id'];
                $this->addUnion($farmerapi['uni_id']);
                $farmer->upa_id = $farmerapi['upa_id'];
                $this->addUpazilla($farmerapi['upa_id']);
                $farmer->dis_id = $farmerapi['dis_id'];
                $this->addDistrict($farmerapi['dis_id']);
                $farmer->district_name = $farmerapi['district_name'];
                $farmer->upazila_name = $farmerapi['upazila_name'];
                $farmer->union_name = $farmerapi['union_name'];
                $farmer->record_time = $farmerapi['record_time'];

                $farmersapi->save($farmer);
            }
        }
    }

    private function addDistrict($districtid) {
        $http = new Client();
        $district = TableRegistry::getTableLocator()->get('districts');
        $districtTable = $district->find('all', ['conditions' => ['DistrictID' => $districtid]]);
        if ($districtTable->count() == 0) {
            $districtListApi = $http->get('https://www.bamis.gov.bd/api/json/area/district/data/?user=mrcons&pass=mrcons21&dis_id=' . $districtid . '&limit_s=0&limit=0');
            $data = $districtListApi->getJson();
            foreach ($data['data'] as $districtapi) {
                $dis = $district->newEmptyEntity();
                $dis->DistrictID = $districtapi['id'];
                $dis->RegionOID = $districtapi['reg_id'];
                $this->addRegion($districtapi['reg_id']);
                $dis->DivisionOID = $districtapi['div_id'];
                //$this->addDisvision($districtapi['div_id']);
                $dis->DistrictName = $districtapi['label_bn'];
                $dis->pstate = $districtapi['pstate'];
                $dis->statecode = $districtapi['statecode'];
                $dis->country = $districtapi['country'];
                $dis->label_en = $districtapi['label_en'];
                $dis->label_bn = $districtapi['label_bn'];
                $dis->loc_lat = $districtapi['loc_lat'];
                $dis->loc_lon = $districtapi['loc_lon'];
                $dis->crops = $districtapi['crops'];
                $dis->status = $districtapi['status'];
                $dis->upuser = $districtapi['upuser'];
                $dis->useradd = $districtapi['useradd'];
                $dis->createon = $districtapi['createon'];
                $dis->lastupdate = $districtapi['lastupdate'];
                $district->save($dis);
            }
        }
    }

    private function addDivision($divisionID) {
        $http = new Client();
        $division = TableRegistry::getTableLocator()->get('divisions');
        $divisionTable = $division->find('all', ['conditions' => ['DivisionID' => $divisionID]]);
        if ($divisionTable->count() == 0) {
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/division/data/?user=mrcons&pass=mrcons21&div_id=' . $divisionID . '&limit_s=0&limit=0');
            $data = $divisionListApi->getJson();
            foreach ($data['data'] as $divisionapi) {
                $div = $division->newEmptyEntity();
                $div->DivisionID = $divisionapi['id'];
                $div->DivisionName = $divisionapi['label_bn'];
                $div->country = $divisionapi['country'];
                $div->statecode = $divisionapi['statecode'];
                $div->label_en = $divisionapi['label_en'];
                $div->label_bn = $divisionapi['label_bn'];
                $div->loc_lat = $divisionapi['loc_lat'];
                $div->loc_lon = $divisionapi['loc_lon'];
                $div->crops = $divisionapi['crops'];
                $div->status = $divisionapi['status'];
                $div->upuser = $divisionapi['upuser'];
                $div->useradd = $divisionapi['useradd'];
                $div->createon = $divisionapi['createon'];
                $div->lastupdate = $divisionapi['lastupdate'];
                $division->save($div);
            }
        }
    }

    private function addRegion($regionID) {
        $http = new Client();
        $region = TableRegistry::getTableLocator()->get('regions');
        $regionTable = $region->find('all', ['conditions' => ['RegionID' => $regionID]]);
        if ($regionTable->count() == 0) {
            $regionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/region/data/?user=mrcons&pass=mrcons21&reg_id=' . $regionID . '&limit_s=0&limit=0');
            $data = $regionListApi->getJson();
            foreach ($data['data'] as $regionapi) {
                $dis = $region->newEmptyEntity();
                $dis->RegionID = $regionapi['id'];
                $dis->DivisionID = $regionapi['div_id'];
                $this->addDivision($regionapi['div_id']);
                $dis->RegionName = $regionapi['label_bn'];
                $dis->pstate = $regionapi['pstate'];
                $dis->country = $regionapi['country'];
                $dis->statecode = $regionapi['statecode'];
                $dis->label_en = $regionapi['label_en'];
                $dis->label_bn = $regionapi['label_bn'];
                $dis->loc_lat = $regionapi['loc_lat'];
                $dis->loc_lon = $regionapi['loc_lon'];
                $dis->crops = $regionapi['crops'];
                $dis->status = $regionapi['status'];
                $dis->upuser = $regionapi['upuser'];
                $dis->useradd = $regionapi['useradd'];
                $dis->createon = $regionapi['createon'];
                $dis->lastupdate = $regionapi['lastupdate'];
                $region->save($dis);
            }
        }
    }

    private function addUnion($unionID) {
        $http = new Client();
        $union = TableRegistry::getTableLocator()->get('tunion');
        $unionTable = $union->find('all', ['conditions' => ['unionid' => $unionID]]);
        if ($unionTable->count() == 0) {
            $unionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/union/data/?user=mrcons&pass=mrcons21&uni_id=' . $unionID . '&limit_s=0&limit=0');
            $data = $unionListApi->getJson();
            foreach ($data['data'] as $unionapi) {
                $dis = $union->newEmptyEntity();
                $dis->UnionID = $unionapi['id'];
                $dis->UpazillaOID = $unionapi['upa_id'];
                $dis->UnionName = $unionapi['label_bn'];
                $dis->pstate = $unionapi['pstate'];
                $dis->country = $unionapi['country'];
                $dis->statecode = $unionapi['statecode'];
                $dis->label_en = $unionapi['label_en'];
                $dis->label_bn = $unionapi['label_bn'];
                $dis->loc_lat = $unionapi['loc_lat'];
                $dis->loc_lon = $unionapi['loc_lon'];
                $dis->crops = $unionapi['crops'];
                $dis->status = $unionapi['status'];
                $dis->upuser = $unionapi['upuser'];
                $dis->useradd = $unionapi['useradd'];
                $dis->createon = $unionapi['createon'];
                $dis->lastupdate = $unionapi['lastupdate'];
                $union->save($dis);
            }
        }
    }

    private function addUpazilla($upazillaID) {
        $http = new Client();
        $upazilla = TableRegistry::getTableLocator()->get('upazilla');
        $upazillaTable = $upazilla->find('all', ['conditions' => ['upazillaid' => $upazillaID]]);
        if ($upazillaTable->count() == 0) {
            $upazillaListApi = $http->get('https://www.bamis.gov.bd/api/json/area/upazilla/data/?user=mrcons&pass=mrcons21&upa_id=' . $upazillaID . '&limit_s=0&limit=0');
            $data = $upazillaListApi->getJson();
            foreach ($data['data'] as $upazillaapi) {
                $dis = $upazilla->newEmptyEntity();
                $dis->UpazillaID = $upazillaapi['id'];
                $dis->UpazillaName = $upazillaapi['label_bn'];
                $dis->pstate = $upazillaapi['pstate'];
                $dis->country = $upazillaapi['country'];
                $dis->statecode = $upazillaapi['statecode'];
                $dis->label_en = $upazillaapi['label_en'];
                $dis->label_bn = $upazillaapi['label_bn'];
                $dis->loc_lat = $upazillaapi['loc_lat'];
                $dis->loc_lon = $upazillaapi['loc_lon'];
                $dis->crops = $upazillaapi['crops'];
                $dis->status = $upazillaapi['status'];
                $dis->upuser = $upazillaapi['upuser'];
                $dis->useradd = $upazillaapi['useradd'];
                $dis->createon = $upazillaapi['createon'];
                $dis->lastupdate = $upazillaapi['lastupdate'];
                $upazilla->save($dis);
            }
        }
    }

    private function addProject($projectName) {
        $project = TableRegistry::getTableLocator()->get('project');

        $projectTable = $project->find('all', ['conditions' => ['ProjectName' => $projectName]]);
        if ($projectTable->count() == 0) {
            $dis = $project->newEmptyEntity();
            $dis->ProjectName = $projectName;
            $project->save($dis);
        }
    }

    private function addGroup($groupName) {
        $group = TableRegistry::getTableLocator()->get('tgroup');

        $groupTable = $group->find('all', ['conditions' => ['GroupName' => $groupName]]);
        if ($groupTable->count() == 0) {
            $dis = $group->newEmptyEntity();
            $dis->GroupName = $groupName;
            $group->save($dis);
        }
    }

    public function view($id = null) {
        $farmerapi = $this->Farmerapi->get($id, [
            'contain' => [],
        ]);

        $this->set('farmerapi', $farmerapi);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    private function filllist() {
        $this->set('regionlist', '');
        $this->set('divisionlist', '');
        $this->set('districtlist', '');
        $this->set('upazillalist', '');
        $this->set('unionlist', '');
        $this->set('projectlist', '');
        $this->set('grouplist', '');

        $regions = TableRegistry::get('Regions');
        $regionlist = $regions->find('list', ['keyField' => 'RegionOID', 'valueField' => 'RegionName']);
        $this->set('regionlist', $regionlist);

        $divisions = TableRegistry::get('Divisions');
        $divisionlist = $divisions->find('list', ['keyField' => 'DivisionOID', 'valueField' => 'DivisionName']);
        $this->set('divisionlist', $divisionlist);

        $divisions = TableRegistry::get('Districts');
        $districtlist = $divisions->find('list', ['keyField' => 'DistrictOID', 'valueField' => 'DistrictName']);
        $this->set('districtlist', $districtlist);

        $divisions = TableRegistry::get('Upazilla');
        $upazillalist = $divisions->find('list', ['keyField' => 'UpazillaOID', 'valueField' => 'UpazillaName']);
        $this->set('upazillalist', $upazillalist);

        $divisions = TableRegistry::get('Tunion');
        $unionlist = $divisions->find('list', ['keyField' => 'UnionOID', 'valueField' => 'UnionName']);
        $this->set('unionlist', $unionlist);

        $divisions = TableRegistry::get('Project');
        $projectlist = $divisions->find('list', ['keyField' => 'ProjectOID', 'valueField' => 'ProjectName']);
        $this->set('projectlist', $projectlist);

        $divisions = TableRegistry::get('Tgroup');
        $grouplist = $divisions->find('list', ['keyField' => 'GroupOID', 'valueField' => 'GroupName']);
        $this->set('grouplist', $grouplist);
    }

    private function getdisidfromoid($disoid, $stat) {
        $districts = TableRegistry::get('Districts');
        $disid = $districts->get($disoid);
        if ($disid != null) {
            if ($stat == 1) {
                return $disid->DistrictID;
            } else if ($stat == 2) {
                return $disid->DistrictName;
            }
        }
        return 0;
    }

    private function getupaidfromoid($upoid, $stat) {
        $districts = TableRegistry::get('Upazilla');
        $upaz = $districts->get($upoid);
        if ($upaz != null) {
            if ($stat == 1) {
                return $upaz->UpazillaID;
            } else if ($stat == 2) {
                return $upaz->UpazillaName;
            }
        }
        return 0;
    }

    private function getprojidfromoid($projoid) {
        $districts = TableRegistry::get('project');
        $upaz = $districts->get($projoid);
        if ($upaz!=null){
            return $upaz->ProjectName;
        }
        return null;
    }

    private function getgroidfromoid($grpid) {
        $districts = TableRegistry::get('tgroup');
        $upaz = $districts->get($grpid);
        if ($upaz!=null){
            return $upaz->GroupName;
        }
        return null;
    }

    private function getuniidfromoid($unoid, $stat) {
        $districts = TableRegistry::get('Tunion');
        $union = $districts->get($unoid);
        if ($union != null) {
            if ($stat == 1) {
                return $union->UnionID;
            } else if ($stat == 2) {
                return $union->UnionName;
            }
        }
        return 0;
    }

    public function add() {
        $sessmgm = new sessionmgm();
        $userinfo = $sessmgm->getsetuseringo(null, 'r');
        $comm = new commutil();
        $this->filllist();
        $farmerapi = $this->Farmerapi->newEmptyEntity();
        if ($this->request->is('post')) {
            // dd($this->request->getAttribute('DistrictOID'));
            $farmerapi['dis_id'] = $this->getdisidfromoid($this->request->getData('DistrictOID'), 1);
            $farmerapi['districtoid'] = $this->request->getData('DistrictOID');
            $farmerapi['district_name'] = $this->getdisidfromoid($this->request->getData('DistrictOID'), 2);

            $farmerapi['upa_id'] = $this->getupaidfromoid($this->request->getData('UpazillaOID'), 1);
            $farmerapi['upazillaoid'] = $this->request->getData('UpazillaOID');
            $farmerapi['upazila_name'] = $this->getupaidfromoid($this->request->getData('UpazillaOID'), 2);

            $farmerapi['uni_id'] = $this->getuniidfromoid($this->request->getData('UnionOID'), 1);
            $farmerapi['unionoid'] = $this->request->getData('UnionOID');
            $farmerapi['union_name'] = $this->getuniidfromoid($this->request->getData('UnionOID'), 2);

            $faroid = $comm->getautofarmeroid();
            $farmerapi['OID'] = $faroid;
            $farmerapi['FarmerID'] = $faroid;
            $farmerapi['farmer_name'] = $this->request->getData('FarmerName');
            $farmerapi['phone'] = $this->request->getData('FarMob');

            $farmerapi['phone'] = $this->request->getData('FarMob');

            $farmerapi['groupoid'] = $this->request->getData('GroupOID');
            $farmerapi['group_name'] = $this->getgroidfromoid($this->request->getData('GroupOID'));

            $farmerapi['projectoid'] = $this->request->getData('ProjectOID');
            $farmerapi['project_name'] = $this->getprojidfromoid($this->request->getData('ProjectOID'));
            //        $sessmgm=new sessionmgm();
//        $ttt=$sessmgm->getsetuseringo(null,'r');
            $farmerapi['verified'] = $userinfo['id'];
            $farmerapi['createon'] = Time::now();
            $farmerapi['record_time'] = Time::now();
            $farmerapi['lastupdate'] = Time::now();
            //dd(session('user'));
            //dd($farmerapi);

            if ($this->Farmerapi->save($farmerapi)) {
                $this->Flash->success(__('The farmerapi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Farmer could not be saved. Please, try again.'));
        }
        $this->set(compact('farmerapi'));
//        $this->set(compact('regionList'));
//        $this->set(compact('divisionlist'));
//        $this->set(compact('districtlist'));
//        $this->set(compact('upazillalist'));
//        $this->set(compact('unionlist'));
//        $this->set(compact('projectlist'));
//        $this->set(compact('grouplist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Farmerapi id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $farmerapi = $this->Farmerapi->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $farmerapi = $this->Farmerapi->patchEntity($farmerapi, $this->request->getData());
            if ($this->Farmerapi->save($farmerapi)) {
                $this->Flash->success(__('The farmerapi has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farmerapi could not be saved. Please, try again.'));
        }
        $this->set(compact('farmerapi'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Farmerapi id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $farmerapi = $this->Farmerapi->get($id);
        if ($this->Farmerapi->delete($farmerapi)) {
            $this->Flash->success(__('The farmerapi has been deleted.'));
        } else {
            $this->Flash->error(__('The farmerapi could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Here we Fill Up the Process Data
    public function processdata() {
        $tblsoftset = TableRegistry::getTableLocator()->get('softsettings');
        $softsettings = $tblsoftset->find('all', ['conditions' => ['AND' => ['slno >' => 1, 'slno <' => 8]]]);
        //dd($softsettings);
        $this->set(compact('softsettings'));
    }

    //Here we Update the table by api
    public function updatetablebyapi($id = null) {
        $this->autoRender = false;
        $procesmana = new processmanager();

        if ($id == 2) {  //Here we get the divisionz
            if ($procesmana->updatedivision() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        } else if ($id == 3) {  //Here we go for the Region
            if ($procesmana->updateregion() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        } else if ($id == 4) {  //Here we go for the District
            if ($procesmana->updatedistrict() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        } else if ($id == 5) {  //Here we go for the Upazilla
            if ($procesmana->updateupazilla() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        } else if ($id == 6) {  //Here we go for the union
            if ($procesmana->updateunion() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        } else if ($id == 7) {  //Here we go for the Farmer
            if ($procesmana->updatefarmer() == true) {
                if ($procesmana->updatesoftsettings($id) == true) {
                    $this->redirect(['action' => 'processdata']);
                }
            }
        }
    }

}
