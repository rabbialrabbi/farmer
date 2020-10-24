<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer[]|\Cake\Collection\CollectionInterface $farmer
 */
?>
<div class="farmer index content">
    <?= $this->Html->link(__('New Farmer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Farmer') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= __('Farmer ID') ?></th>
                    <th><?= __('Farmer Name') ?></th>
                    <th><?= __('Mobile No') ?></th>
                    <th><?= __('District Name') ?></th>
                    <th><?= __('Upazilla Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($farmer as $farmer): ?>
                <tr>
                    <td><?= $this->Number->format($farmer->FarmerID) ?></td>
                    <td><?= h($farmer->FarmerName) ?></td>
                    <td><?= h($farmer->FarMob) ?></td>
                    <td><?= h($farmer->district->DistrictName) ?></td>
                    <td><?= h($farmer->upazilla->UpazillaName) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $farmer->OID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farmer->OID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farmer->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $farmer->OID)]) ?>
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
