<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontentapi[]|\Cake\Collection\CollectionInterface $smscontentapi
 */
?>
<div class="smscontentapi index content">
    <?= $this->Html->link(__('New Smscontentapi'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Smscontentapi') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('OID') ?></th>
                    <th><?= $this->Paginator->sort('SMSNo') ?></th>
                    <th><?= $this->Paginator->sort('SMSContentBody') ?></th>
                    <th><?= $this->Paginator->sort('CreatedBy') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smscontentapi as $smscontentapi): ?>
                <tr>
                    <td><?= $this->Number->format($smscontentapi->OID) ?></td>
                    <td><?= $this->Number->format($smscontentapi->SMSNo) ?></td>
                    <td><?= h($smscontentapi->SMSContentBody) ?></td>
                    <td><?= $this->Number->format($smscontentapi->CreatedBy) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $smscontentapi->OID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smscontentapi->OID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smscontentapi->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $smscontentapi->OID)]) ?>
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
