<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
declare(strict_types=1);

namespace App\Others;

use Cake\ORM\TableRegistry;
use Cake\Http\Client;
use Cake\Http\Session;
use Cake\Log\Log;
use App\Others\commutil;
use App\Others\sessionmgm;
use Cake\I18n\Time;
use Cake\I18n\Date;

//use App\Controller\AppController;

class processmanager {

    var $ff = null;

    public function updatesoftsettings($slno = null) {
        $this->autoRender = false;
        $tblsoftset = TableRegistry::getTableLocator()->get('softsettings');
        if ($slno != null) {
            $softsett = $tblsoftset->get($slno);
            if ($softsett != null) {
                $softsett->updatedate = Time::now();
                if ($tblsoftset->save($softsett)) {
                    return true;
                }
            }
        }
        return false;
    }

    //##################Division#####################################
    public function updatedivision() {
        // $this->Log('Update Division', 'debug');
        $this->autoRender = false;
        $comm = new commutil();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $division = TableRegistry::getTableLocator()->get('divisions');
            //$this->Log('Update Division 3', 'debug');
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/division/data/?user=mrcons&pass=mrcons21&limit_s=0&limit=0');
            //$this->Log('Update Division 4', 'debug');
            $data = $divisionListApi->getJson();
            //$this->Log(print_r($divisionListApi, true), 'debug');

            foreach ($data['data'] as $divisionapi) {
                $div = $this->getdivisionEntity($divisionapi['id']);
                if ($div->DivisionID == null) {
                    $div->DivisionOID = $comm->getdivisionoid();
                }
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
                $div->lastupdate = Time::parseDate($divisionapi['lastupdate'], 'Y-M-d');
                $t = $division->save($div);
                // $this->Log(print_r($t, true), 'debug');
            }
            return true;
        } catch (Exception $ex) {
            //$this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get the Division Entity
    private function getdivisionEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');
        $division = TableRegistry::getTableLocator()->get('divisions');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['DivisionID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    //######################Region#################################
    public function updateregion() {
        // $this->Log('Update Division', 'debug');
        $this->autoRender = false;
        $comm = new commutil();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $division = TableRegistry::getTableLocator()->get('regions');
            //$this->Log('Update Division 3', 'debug');
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/region/data/?user=mrcons&pass=mrcons21&limit_s=0&limit=0');
            //$this->Log('Update Division 4', 'debug');
            $data = $divisionListApi->getJson();
            //$this->Log(print_r($divisionListApi, true), 'debug');

            foreach ($data['data'] as $regionapi) {
                $dis = $this->getregionEntity($regionapi['id']);
                if ($dis->RegionID == null) {
                    $dis->RegionOID = $comm->getregionoid();
                }
                $dis->RegionID = $regionapi['id'];
                $dis->DivisionID = $regionapi['div_id'];
                $dis->DivisionOID = $this->getdivisionbyid($regionapi['div_id']);
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
                $dis->lastupdate = Time::now();
                $t = $division->save($dis);
                // $this->Log(print_r($t, true), 'debug');
            }
            return true;
        } catch (Exception $ex) {
            //$this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get division by id
    private function getdivisionbyid($id = null) {
        $division = TableRegistry::getTableLocator()->get('divisions');
        if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['DivisionID' => $id]]);
            $division = $divlist->first();
            return $division->DivisionOID;
        }
        return null;
    }

    //Here we get the Division Entity
    private function getregionEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');
        $division = TableRegistry::getTableLocator()->get('regions');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['RegionID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    //####################District###################################
    public function updatedistrict() {
        // $this->Log('Update Division', 'debug');
        $this->autoRender = false;
        $comm = new commutil();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $division = TableRegistry::getTableLocator()->get('districts');
            //$this->Log('Update Division 3', 'debug');
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/district/data/?user=mrcons&pass=mrcons21&limit_s=0&limit=0');
            //$this->Log('Update Division 4', 'debug');
            $data = $divisionListApi->getJson();
            //$this->Log(print_r($divisionListApi, true), 'debug');            
            foreach ($data['data'] as $districtapi) {
                $dis = $this->getdistrictEntity($districtapi['id']);
                if ($dis->DistrictID == null) {
                    $dis->DistrictOID = $comm->getdistrictoid();
                }
                $dis->DistrictID = $districtapi['id'];
                $dis->RegionOID = $this->getregionbyid($districtapi['reg_id']);
                $dis->DivisionOID = $this->getdivisionbyid($districtapi['div_id']);
                $dis->reg_id = $districtapi['reg_id'];
                $dis->div_id = $districtapi['div_id'];
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
                $dis->lastupdate = Time::now();
                $t = $division->save($dis);
                // $this->Log(print_r($t, true), 'debug');
            }
            return true;
        } catch (Exception $ex) {
            //$this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get division by id
    private function getregionbyid($id = null) {
        $division = TableRegistry::getTableLocator()->get('regions');
        if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['RegionID' => $id]]);
            $division = $divlist->first();
            return $division->RegionOID;
        }
        return null;
    }

    //Here we get the Division Entity
    private function getdistrictEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');
        $division = TableRegistry::getTableLocator()->get('districts');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['DistrictID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    //####################Upazilla###################################
    public function updateupazilla() {
        // $this->Log('Update Division', 'debug');
        $this->autoRender = false;
        $comm = new commutil();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $division = TableRegistry::getTableLocator()->get('upazilla');
            //$this->Log('Update Division 3', 'debug');
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/upazilla/data/?user=mrcons&pass=mrcons21&limit_s=0&limit=0');
            //$this->Log('Update Division 4', 'debug');
            $data = $divisionListApi->getJson();
            //$this->Log(print_r($divisionListApi, true), 'debug');            
            foreach ($data['data'] as $upazillaapi) {
                $dis = $this->getupazillaEntity($upazillaapi['id']);
                if ($dis->UpazillaID == null) {
                    $dis->Upazilla_oid = $comm->getupazillaoid();
                }
                $dis->UpazillaID = $upazillaapi['id'];
                $dis->dis_id = $upazillaapi['dis_id'];
                $dis->DistrictOID = $this->getdistrictbyid($upazillaapi['dis_id']);
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
                $dis->lastupdate = Time::now();
                $t = $division->save($dis);
                // $this->Log(print_r($t, true), 'debug');
            }
            return true;
        } catch (Exception $ex) {
            //$this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get division by id
    private function getdistrictbyid($id = null) {
        $division = TableRegistry::getTableLocator()->get('districts');
        if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['DistrictID' => $id]]);
            if ($divlist->count() > 0) {
                $division = $divlist->first();
                return $division->DistrictOID;
            }
            return null;
        }
        return null;
    }

    //Here we get the Division Entity
    private function getupazillaEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');
        $division = TableRegistry::getTableLocator()->get('upazilla');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['UpazillaID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    //####################Union###################################
    public function updateunion() {
        // $this->Log('Update Division', 'debug');
        $this->autoRender = false;
        $comm = new commutil();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $division = TableRegistry::getTableLocator()->get('tunion');
            //$this->Log('Update Division 3', 'debug');
            $divisionListApi = $http->get('https://www.bamis.gov.bd/api/json/area/union/data/?user=mrcons&pass=mrcons21&limit_s=0&limit=0');
            //$this->Log('Update Division 4', 'debug');
            $data = $divisionListApi->getJson();
            //$this->Log(print_r($divisionListApi, true), 'debug');            
            foreach ($data['data'] as $unionapi) {
                $dis = $this->getunionEntity($unionapi['id']);
                if ($dis->UnionID == null) {
                    $dis->UnionOID = $comm->getunionoid();
                }
                $dis->UnionID = $unionapi['id'];
                $dis->upa_id = $unionapi['upa_id'];
                $dis->UpazillaOID = $this->getupazilabyid($unionapi['upa_id']);
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
                $dis->lastupdate = Time::now();
                $t = $division->save($dis);
            }
            return true;
        } catch (Exception $ex) {
            //$this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get division by id
    private function getupazilabyid($id = null) {
        $division = TableRegistry::getTableLocator()->get('upazilla');
        if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['UpazillaID' => $id]]);
            if ($divlist->count() > 0) {
                $division = $divlist->first();
                return $division->Upazilla_oid;
            }
            return null;
        }
        return null;
    }

    //Here we get the Division Entity
    private function getunionEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');               
        $division = TableRegistry::getTableLocator()->get('tunion');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['UnionID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    //####################Farmer###################################
    public function updatefarmer() {
        // $this->Log('Update Division', 'debug');
        $f = new Log();

        $this->autoRender = false;
        $comm = new commutil();
        $sessmgm = new sessionmgm();
        // $this->Log('Update Division 1', 'debug');
        try {
            $http = new Client();
            //$this->Log('Update Division 2', 'debug');
            $farmersapi = TableRegistry::getTableLocator()->get('farmerapi');

            $division = TableRegistry::get('divisions');
            $divisionTable = $division->find('all');
            $tt = 1;

            // dd($tt);
            foreach ($divisionTable as $divisionen) {
                $farmerdivisionwiseList = $http->get('https://www.bamis.gov.bd/api/json/farmers/data/?user=mrcons&pass=mrcons21&div_id=' . $divisionen->DivisionID . '&limit_s=0&limit=0');
                $data = $farmerdivisionwiseList->getJson();
                foreach ($data['data'] as $farmerapi) {
                    $farmer = $this->getfarmerEntity($farmerapi['id']);
                    if ($farmer->FarmerID == null) {
                        $farmer->OID = $comm->getfarmeroid();
                    }
                  //  if ($farmer->farmer_name == null) {  //This is Extra For the Time Being
                        //$f->debug('adsa',$farmer);
                        $farmer->FarmerID = $farmerapi['id'];
                        $farmer->farmer_name = $farmerapi['farmer_name'];

                        $farmer->phone = $farmerapi['phone'];
                        $farmer->verified = $farmerapi['verified'];
                        $farmer->createon = $farmerapi['createon'];

                        $farmer->uni_id = $farmerapi['uni_id'];
                        // $farmer->unionoid = $this->getunionbyid($farmerapi['uni_id']);
                        //$this->Log('ssdasda', 'debug');
                        $farmer->unionoid = $sessmgm->getunionbyid($farmerapi['uni_id']);

                        $farmer->upa_id = $farmerapi['upa_id'];
                        //$farmer->upazillaoid = $this->getupazilabyid($farmerapi['upa_id']);
                        $farmer->upazillaoid = $sessmgm->getupazilabyid($farmerapi['upa_id']);

                        $farmer->dis_id = $farmerapi['dis_id'];
                        //$farmer->districtoid = $this->getdistrictbyid($farmerapi['dis_id']);
                        $farmer->districtoid = $sessmgm->getdistrictbyid($farmerapi['dis_id']);

                        $farmer->district_name = $farmerapi['district_name'];
                        $farmer->upazila_name = $farmerapi['upazila_name'];
                        $farmer->union_name = $farmerapi['union_name'];

                        $farmer->group_name = $farmerapi['group_name'];
                        $farmer->groupoid = $this->addGroup($farmerapi['group_name']);

                        $farmer->project_name = $farmerapi['project_name'];
                        $farmer->projectoid = $this->addProject($farmerapi['project_name']);

                        $farmer->record_time = $farmerapi['record_time'];
                        $farmer->lastupdate = Time::now();
                        $farmersapi->save($farmer);
                    //}
                    $tt++;
                    $f->debug(strval($tt), $farmer);
                }
            }
            return true;
        } catch (Exception $ex) {
            $this->Log(print_r($ex, true), 'debug');
            return false;
        }
    }

    //Here we get the Group Information
    private function addGroup($groupName) {
        $group = TableRegistry::getTableLocator()->get('tgroup');
        $comm = new commutil();
        $groupTable = $group->find('all', ['conditions' => ['GroupName' => $groupName]]);
        $groupoid = $comm->getgroupoid();
        if ($groupTable->count() == 0) {
            $dis = $group->newEmptyEntity();
            $dis->GroupOID = $groupoid;
            $dis->GroupName = $groupName;
            $group->save($dis);
            return $groupoid;
        } else {
            return $groupTable->first()->GroupOID;
        }
        return $groupoid;
    }

    private function addproject($projectName) {
        $group = TableRegistry::getTableLocator()->get('project');
        $comm = new commutil();
        $groupTable = $group->find('all', ['conditions' => ['ProjectName' => $projectName]]);
        //$groupTable = $group->find('all');

        $groupoid = $comm->getprojectoid();
        if ($groupTable->count() == 0) {
            $dis = $group->newEmptyEntity();
            $dis->ProjectOID = $groupoid;
            $dis->ProjectName = $projectName;
            $group->save($dis);
            return $groupoid;
        } else {
            return $groupTable->first()->ProjectOID;
        }
        return $groupoid;
    }

    //Here we get division by id
    private function getunionbyid($id = null) {

        $division = TableRegistry::getTableLocator()->get('tunion');
        if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['UnionID' => $id]]);
            if ($divlist->count() > 0) {
                $divisione = $divlist->first();
                return $divisione->UnionOID;
            } else {
                return null;
            }
        }
        return null;
    }

    //Here we get the Division Entity
    private function getfarmerEntity($id = null) {
        $this->autoRender = false;
        //$this->Log(print_r('Helllo'.$id,true), 'debug');
        $division = TableRegistry::getTableLocator()->get('farmerapi');
        if ($id == null) {
            return $division->newEmptyEntity();
        } else if ($id != null) {
            $divlist = $division->find('all', ['conditions' => ['FarmerID' => $id]]);
            $diventity = $divlist->first();
            // $this->Log(print_r($diventity,true), 'debug');
            if ($diventity != null) {
                return $diventity;
            } else {
                return $division->newEmptyEntity();
            }
        }
    }

    public function storedatainsession() {
        //$session =  getSession();
        if ($this->request->getSession()->read('Name') == null) {
            $this->request->getSession()->write('Name', 'Here We are');
        }
        dd($this->request->getSession()->read('Name'));


        //Session::read('ddd');
//        $farmerapi=$session->check('farmerapi');
//        if ($farme==null){
//            $farmer = TableRegistry::getTableLocator()->get('farmerapi');
//            $session->write('farmerapi',$farmer);
//        }          
//        return $farmerapi;
    }

}
