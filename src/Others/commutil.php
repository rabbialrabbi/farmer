<?php

namespace App\Others;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Http\Client;
use Cake\Event\Event;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class commutil {

    public function getsmscontentoid() {
        $smscontents = TableRegistry::get('smscontent');
        $d = $smscontents->find('all')->select('smscontentoid')->max('smscontentoid');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->smscontentoid + 1;
    }
    
    public function getautofarmeroid() {
        $farmerapi = TableRegistry::get('farmerapi');
        $d = $farmerapi->find('all')->select('OID')->max('OID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->OID + 1;
    }

    public function getsoftsettingsslno() {
        $softsettings = TableRegistry::get('softsettings');
        $d = $softsettings->find('all')->select('slno')->max('slno');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->slno + 1;
    }

    public function getdivisionoid() {
        $divisions = TableRegistry::get('divisions');
        $d = $divisions->find('all')->select('DivisionOID')->max('DivisionOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->DivisionOID + 1;
    }

    public function getregionoid() {
        $divisions = TableRegistry::get('regions');
        $d = $divisions->find('all')->select('RegionOID')->max('RegionOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->RegionOID + 1;
    }

    public function getdistrictoid() {
        $divisions = TableRegistry::get('districts');
        $d = $divisions->find('all')->select('DistrictOID')->max('DistrictOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->DistrictOID + 1;
    }

    public function getupazillaoid() {
        $divisions = TableRegistry::get('upazilla');
        $d = $divisions->find('all')->select('Upazilla_oid')->max('Upazilla_oid');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->Upazilla_oid + 1;
    }

    public function getunionoid() {
        $divisions = TableRegistry::get('tunion');
        $d = $divisions->find('all')->select('UnionOID')->max('UnionOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->UnionOID + 1;
    }

    public function getfarmeroid() {
        $divisions = TableRegistry::get('farmerapi');
        $d = $divisions->find('all')->select('OID')->max('OID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->OID + 1;
    }

    public function getgroupoid() {
        $divisions = TableRegistry::get('tgroup');
        $d = $divisions->find('all')->select('GroupOID')->max('GroupOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->GroupOID + 1;
    }

    public function getprojectoid() {
        $divisions = TableRegistry::get('project');
        $d = $divisions->find('all')->select('ProjectOID')->max('ProjectOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        return $d->ProjectOID + 1;
    }

    public function getsmsdesattachid() {
        $divisions = TableRegistry::get('smsdesattachment');
        $d = $divisions->find('all')->select('desattachID')->max('desattachID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        if($d==null){
            return 1;
        }
        else{
            return $d->desattachID + 1;
        }
        
    }

    public function getsmsdesattadetailschid() {
        $divisions = TableRegistry::get('smsdesattachmentdetail');
        $d = $divisions->find('all')->select('desattachdeatailsid')->max('desattachdeatailsid');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        if($d==null){
            return 1;
        }
        else{
            return $d->desattachdeatailsid + 1;
        }
        
    }

    public function getsmsdesmgmid() {
        $divisions = TableRegistry::get('smsdesmanagement');
        $d = $divisions->find('all')->select('SmsDesMngOID')->max('SmsDesMngOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        if($d==null){
            return 1;
        }
        else{
           return $d->SmsDesMngOID + 1;
        }
        
    }
  public function getsmgmid() {
        $divisions = TableRegistry::get('smsmanagement');
        $d = $divisions->find('all')->select('SmsMgmOID')->max('SmsMgmOID');
        //$d=$smscontents->find(all,['fields'=>['smscontentoid'=>]]);
        //$response = $smscontents-> get($smscontentoid);
        if($d==null){
            return 1;
        }
        else{
           return $d->SmsMgmOID + 1;
        }
        
    }
}
