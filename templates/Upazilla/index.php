<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upazilla[]|\Cake\Collection\CollectionInterface $upazilla
 */
?>
<div class="upazilla index content">
    <?= $this->Html->link(__('New Upazilla'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Upazilla') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('UpazillaOID') ?></th>
                    <th><?= $this->Paginator->sort('UpazillaName') ?></th>
                    <th><?= $this->Paginator->sort('UpazillaID') ?></th>
                    <th><?= $this->Paginator->sort('DistrictOID') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($upazilla as $upazilla): ?>
                <tr>
                    <td><?= $this->Number->format($upazilla->UpazillaOID) ?></td>
                    <td><?= h($upazilla->UpazillaName) ?></td>
                    <td><?= $this->Number->format($upazilla->UpazillaID) ?></td>
                    <td><?= $this->Number->format($upazilla->DistrictOID) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $upazilla->UpazillaOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $upazilla->UpazillaOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $upazilla->UpazillaOID], ['confirm' => __('Are you sure you want to delete # {0}?', $upazilla->UpazillaOID)],['class'=>'btn btn-primary']) ?>
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
