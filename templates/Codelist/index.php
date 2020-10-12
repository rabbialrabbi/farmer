<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelist[]|\Cake\Collection\CollectionInterface $codelist
 */
?>
<div class="codelist index content">
    <?= $this->Html->link(__('New Codelist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Codelist') ?></h3>
    <div class="table table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>                    
                    <th><?= __('Code') ?></th>
                    <th><?= __('Code English') ?></th>
                    <th><?= __('Code Bangla') ?></th>                  
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($codelist as $codelist): ?>
                <tr>
                   
                    <td><?= h($codelist->CodeListCode) ?></td>
                    <td><?= h($codelist->CodeListNameEnglish) ?></td>
                    <td><?= h($codelist->CodeListNameBangla) ?></td>                  
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $codelist->CodeListID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $codelist->CodeListID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $codelist->CodeListID], ['confirm' => __('Are you sure you want to delete # {0}?', $codelist->CodeListID)]) ?>
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
