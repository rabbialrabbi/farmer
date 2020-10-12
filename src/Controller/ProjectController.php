<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\I18n\Time;
use Cake\I18n\I18nDateTimeInterface;
use Cake\Error;
/**
 * Project Controller
 *
 * @property \App\Model\Table\ProjectTable $Project
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //$project = $this->paginate($this->Project);
         $project = $this->paginate($this->Project->find('All')->contain(['upazilla']));
        //debug($project);
        $this->set(compact('project'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Project->get($id, [
            'contain' => [],
        ]);    
        $this->set('project', $project);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->fillUpazilla();
        $project = $this->Project->newEmptyEntity();
        //printf($project);
        if ($this->request->is('post')) {
            $project = $this->Project->patchEntity($project, $this->request->getData());
            //debug($project);
            $project->ProjectOID=$this->getAutoProjectID();
            if ($this->Project->save($project)) {
                $this->Flash->success(__('The project has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }
    private function fillUpazilla(){
        $code = TableRegistry::get('upazilla');
        $upazillalist = $code->find('list', ['keyField' => 'Upazilla_oid', 'valueField' => 'UpazillaName']);        
        $this->set('upazillalist', $upazillalist);
    }
    
    private function getAutoProjectID(){        
        $projectlist=$this->Project->find('all');
        
        if ($projectlist->count()>0)
        {
            return $projectlist->count()+1;
        }
        else {
            return 1;
        }        
    }
    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Project->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Project->patchEntity($project, $this->request->getData());
            if ($this->Project->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Project->get($id);
        if ($this->Project->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
