<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Crops Controller
 *
 * @property \App\Model\Table\CropsTable $Crops
 *
 * @method \App\Model\Entity\Crop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CropsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $crops = $this->paginate($this->Crops);

        $this->set(compact('crops'));
    }

    /**
     * View method
     *
     * @param string|null $id Crop id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crop = $this->Crops->get($id, [
            'contain' => [],
        ]);

        $this->set('crop', $crop);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crop = $this->Crops->newEmptyEntity();
        if ($this->request->is('post')) {
            $crop = $this->Crops->patchEntity($crop, $this->request->getData());
            if ($this->Crops->save($crop)) {
                $this->Flash->success(__('The crop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crop could not be saved. Please, try again.'));
        }
        $this->set(compact('crop'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Crop id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crop = $this->Crops->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crop = $this->Crops->patchEntity($crop, $this->request->getData());
            if ($this->Crops->save($crop)) {
                $this->Flash->success(__('The crop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crop could not be saved. Please, try again.'));
        }
        $this->set(compact('crop'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Crop id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crop = $this->Crops->get($id);
        if ($this->Crops->delete($crop)) {
            $this->Flash->success(__('The crop has been deleted.'));
        } else {
            $this->Flash->error(__('The crop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
