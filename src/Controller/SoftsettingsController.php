<?php
declare(strict_types=1);

namespace App\Controller;
use App\Others\commutil;
use Cake\I18n\Date;
use Cake\I18n\Time;
/**
 * Softsettings Controller
 *
 * @property \App\Model\Table\SoftsettingsTable $Softsettings
 *
 * @method \App\Model\Entity\Softsetting[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SoftsettingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $softsettings = $this->paginate($this->Softsettings);
        $this->set(compact('softsettings'));
    }

    /**
     * View method
     *
     * @param string|null $id Softsetting id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $softsetting = $this->Softsettings->get($id, [
            'contain' => [],
        ]);

        $this->set('softsetting', $softsetting);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comm = new commutil();
        $softsetting = $this->Softsettings->newEmptyEntity();
        //$createdate= Time::now();
       // dd($createdate);
       // $this->set('createdate',$createdate);
        if ($this->request->is('post')) {
            $softsetting = $this->Softsettings->patchEntity($softsetting, $this->request->getData());
            $softsetting->msgsend=$this->request->getData('msgsend');
            $softsetting->slno = $comm->getsoftsettingsslno();
            if ($this->Softsettings->save($softsetting)) {
                $this->Flash->success(__('The Software Settings has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The softsetting could not be saved. Please, try again.'));
        }
        $this->set(compact('softsetting'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Softsetting id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $softsetting = $this->Softsettings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $softsetting = $this->Softsettings->patchEntity($softsetting, $this->request->getData());
            if ($this->Softsettings->save($softsetting)) {
                $this->Flash->success(__('The softsetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The softsetting could not be saved. Please, try again.'));
        }
        $this->set(compact('softsetting'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Softsetting id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $softsetting = $this->Softsettings->get($id);
        if ($this->Softsettings->delete($softsetting)) {
            $this->Flash->success(__('The softsetting has been deleted.'));
        } else {
            $this->Flash->error(__('The softsetting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
