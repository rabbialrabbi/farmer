<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tunion[]|\Cake\Collection\CollectionInterface $tunion
 */
?>
<div class="tunion index content">
    <?= $this->Html->link(__('New Tunion'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tunion') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('UnionOID') ?></th>
                    <th><?= $this->Paginator->sort('UnionName') ?></th>
                    <th><?= $this->Paginator->sort('UnionID') ?></th>
                    <th><?= $this->Paginator->sort('UpazillaOID') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tunion as $tunion): ?>
                <tr>
                    <td><?= $this->Number->format($tunion->UnionOID) ?></td>
                    <td><?= h($tunion->UnionName) ?></td>
                    <td><?= $this->Number->format($tunion->UnionID) ?></td>
                    <td><?= $this->Number->format($tunion->UpazillaOID) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tunion->UnionOID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tunion->UnionOID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tunion->UnionOID], ['confirm' => __('Are you sure you want to delete # {0}?', $tunion->UnionOID)]) ?>
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
