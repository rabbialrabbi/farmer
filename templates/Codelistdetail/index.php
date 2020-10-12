<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelistdetail[]|\Cake\Collection\CollectionInterface $codelistdetail
 */
?>
<div class="codelistdetail index content">
    <?= $this->Html->link(__('New List Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('List Item') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th><?= __('Code Name') ?></th>                    
                    <th><?= __('List Item Code') ?></th>
                    <th><?= __('List Item (Eng)') ?></th>
                    <th><?= __('List Item (Bng)') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($codelistdetail as $codelistdetail): ?>
                <tr>
                    <td><?= h($codelistdetail->codelist->CodeListNameEnglish) ?></td>
                    <td><?= h($codelistdetail->ListItemCode) ?></td>
                    <td><?= h($codelistdetail->ListItemNameEng) ?></td>
                    <td><?= h($codelistdetail->ListItemNameBng) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $codelistdetail->ListItemID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $codelistdetail->ListItemID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $codelistdetail->ListItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $codelistdetail->ListItemID)]) ?>
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
