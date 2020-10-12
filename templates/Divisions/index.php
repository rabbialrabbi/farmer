<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Division[]|\Cake\Collection\CollectionInterface $divisions
 */
?>
<div class="divisions index content">
    <?= $this->Html->link(__('New Division'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Divisions') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('DivisionID') ?></th>
                    <th><?= $this->Paginator->sort('DivisionName') ?></th>                   
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($divisions as $division): ?>
                <tr>
                    <td><?= $this->Number->format($division->DivisionID) ?></td>
                    <td><?= h($division->DivisionName) ?></td>                    
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $division->DivisionOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $division->DivisionOID],['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $division->DivisionOID], ['confirm' => __('Are you sure you want to delete # {0}?', $division->DivisionOID)],['class'=>'btn btn-primary']) ?>
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
