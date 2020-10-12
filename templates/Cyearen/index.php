<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cyearen[]|\Cake\Collection\CollectionInterface $cyearen
 */
?>
<div class="cyearen index content">
    <?= $this->Html->link(__('New Year'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Year') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= $this->Paginator->sort('Slno','SL No') ?></th>
                    <th><?= $this->Paginator->sort('Cyear','Year') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cyearen as $cyearen): ?>
                <tr>
                    <td><?= $this->Number->format($cyearen->CyearOID) ?></td>
                    <td><?= $this->Number->format($cyearen->Slno) ?></td>
                    <td><?= $this->Number->format($cyearen->Cyear) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cyearen->CyearOID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cyearen->CyearOID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cyearen->CyearOID], ['confirm' => __('Are you sure you want to delete # {0}?', $cyearen->CyearOID)]) ?>
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
