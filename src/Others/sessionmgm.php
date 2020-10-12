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
use Cake\I18n\Time;
use Cake\I18n\Date;
use App\Controller\AppController;

class sessionmgm extends AppController {

    //Here we get the union By OID
    public function getunionbyid($id = null) {
        if ($this->request->getSession()->read('unionlist') == null) {
            $uniontbl = TableRegistry::getTableLocator()->get('tunion');
            $this->request->getSession()->write('unionlist', $uniontbl->find('all')->toArray());
        }
        $tunionarray = $this->request->getSession()->read('unionlist');
        //return $tunionarray;
        foreach ($tunionarray as $value) {
            if ($value['UnionID'] == $id) {
                return $value['UnionOID'];
            }
        }
        return null;
    }
    public function getupazilabyid($id = null) {
        if ($this->request->getSession()->read('upazilalist') == null) {
            $uniontbl = TableRegistry::getTableLocator()->get('upazilla');
            $this->request->getSession()->write('upazilalist', $uniontbl->find('all')->toArray());
        }
        $tunionarray = $this->request->getSession()->read('upazilalist');
        //return $tunionarray;
        foreach ($tunionarray as $value) {
            if ($value['Upazilla_oid'] == $id) {
                return $value['Upazilla_oid'];
            }
        }
        return null;
    }
    public function getsetuseringo($user,$staflg){
        if ($staflg=='w'){
             $this->request->getSession()->write('userinfo', $user);
             //dd($this->request->getSession()->read('userinfo'));
        }
        else if ($staflg=='r')    {
            $u=$this->request->getSession()->read('userinfo');
            //dd($u);
            return $u;
        }
        return null;
    }
    public function getdistrictbyid($id = null) {
        if ($this->request->getSession()->read('districtlist') == null) {
            $uniontbl = TableRegistry::getTableLocator()->get('districts');
            $this->request->getSession()->write('districtlist', $uniontbl->find('all')->toArray());
        }
        $tunionarray = $this->request->getSession()->read('districtlist');
        //return $tunionarray;
        foreach ($tunionarray as $value) {
            if ($value['DistrictOID'] == $id) {
                return $value['DistrictOID'];
            }
        }
        return null;
    }
}




















