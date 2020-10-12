<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tgroup[]|\Cake\Collection\CollectionInterface $tgroup
 */
$number=1;
?>
<div class="tgroup index content">
    <?= $this->Html->link(__('New Group'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Group') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('GroupID') ?></th>                       
                    <th><?= $this->Paginator->sort('GroupName') ?></th>                                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tgroup as $tgroup): ?>
                <tr>
                    <td><?= $number++ ?></td>                    
                    <td><?= h($tgroup->GroupName) ?></td>
                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tgroup->GroupOID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tgroup->GroupOID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tgroup->GroupOID], ['confirm' => __('Are you sure you want to delete # {0}?', $tgroup->OID)]) ?>
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
