<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crop $crop
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Crop'), ['action' => 'edit', $crop->cropsOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Crop'), ['action' => 'delete', $crop->cropsOID], ['confirm' => __('Are you sure you want to delete # {0}?', $crop->cropsOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Crops'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Crop'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="crops view content">
            <h3><?= h($crop->cropsOID) ?></h3>
            <table class="table table-condensed table-striped">
                 <tr>
                    <th><?= __('Crops Name English') ?></th>
                    <td><?= h($crop->CropsNameEn) ?></td>
                </tr>   
                <tr>
                    <th><?= __('Crops Name Bangla') ?></th>
                    <td><?= h($crop->CropsNameBn) ?></td>
                </tr>          
                 
            </table>
        </div>
    </div>
</div>
