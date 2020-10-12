<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmerapi $farmerapi
 */
?>
<style>
.red-square {
  height: 100%;
  width: 50%;
  display: flex;
  align-items: center;  
  justify-content: center;
}
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Farmerapi'), ['action' => 'edit', $farmerapi->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Farmerapi'), ['action' => 'delete', $farmerapi->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $farmerapi->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Farmerapi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Farmerapi'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmerapi view content red-square">
            
            <table class="table table-condensed table-responsive table-bordered">
                 <tr>
                    <th><?= __('Farmer ID') ?></th>
                    <td><?= $this->Number->format($farmerapi->FarmerID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($farmerapi->farmer_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile No') ?></th>
                    <td><?= h($farmerapi->phone) ?></td>
                </tr>                              
                <tr>
                    <th><?= __('District Name') ?></th>
                    <td><?= h($farmerapi->district_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Upazilla Name') ?></th>
                    <td><?= h($farmerapi->upazila_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Union Name') ?></th>
                    <td><?= h($farmerapi->union_name) ?></td>
                </tr>
               
                <tr>
                    <th><?= __('Project Name') ?></th>
                    <td><?= h($farmerapi->project_nam) ?></td>
                </tr>
                <tr>
                    <th><?= __('Group Name') ?></th>
                    <td><?= h($farmerapi->group_name) ?></td>
                </tr>                                             
            </table>
        </div>
    </div>
</div>
