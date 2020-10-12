<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District[]|\Cake\Collection\CollectionInterface $districts
 */
?>
<div class="districts index content">
    <?= $this->Html->link(__('New District'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Districts') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed ">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('DistrictID') ?></th>
                    <th><?= $this->Paginator->sort('DistrictName') ?></th>                    
                    <th>Region Name</th>                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($districts as $district): ?>
                <tr>
                    <td><?= $this->Number->format($district->DistrictID) ?></td>
                    <td><?= h($district->DistrictName) ?></td>                   
                    <td><?= h($district->region->RegionName) ?></td>  
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $district->DistrictOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $district->DistrictOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $district->DistrictOID], ['confirm' => __('Are you sure you want to delete # {0}?', $district->DistrictOID)],['class'=>'btn btn-primary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
