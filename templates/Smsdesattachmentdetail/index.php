<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesattachmentdetail[]|\Cake\Collection\CollectionInterface $smsdesattachmentdetail
 */
?>
<div class="smsdesattachmentdetail index content">
    <?= $this->Html->link(__('New Smsdesattachmentdetail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Smsdesattachmentdetail') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('smsdesattadetOID') ?></th>
                    <th><?= $this->Paginator->sort('desattachdeatailsid') ?></th>
                    <th><?= $this->Paginator->sort('desattachid') ?></th>
                    <th><?= $this->Paginator->sort('farmeroid') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smsdesattachmentdetail as $smsdesattachmentdetail): ?>
                <tr>
                    <td><?= $this->Number->format($smsdesattachmentdetail->smsdesattadetOID) ?></td>
                    <td><?= $this->Number->format($smsdesattachmentdetail->desattachdeatailsid) ?></td>
                    <td><?= $this->Number->format($smsdesattachmentdetail->desattachid) ?></td>
                    <td><?= $this->Number->format($smsdesattachmentdetail->farmeroid) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $smsdesattachmentdetail->smsdesattadetOID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smsdesattachmentdetail->smsdesattadetOID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smsdesattachmentdetail->smsdesattadetOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachmentdetail->smsdesattadetOID)]) ?>
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
