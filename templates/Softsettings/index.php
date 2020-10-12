<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Softsetting[]|\Cake\Collection\CollectionInterface $softsettings
 */
?>
<div class="softsettings index content">
    <?= $this->Html->link(__('New Settings'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Software Settings') ?></h3>
    <div >
        <table class="table table-responsive table-bordered table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('slno') ?></th>
                    <th><?= $this->Paginator->sort('settingsdesc') ?></th>
                    <th><?= $this->Paginator->sort('urldesc') ?></th>                                 
                    <th><?= $this->Paginator->sort('updatedate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($softsettings as $softsetting): ?>
                <tr>
                    <td class="col-md-1"><?= $this->Number->format($softsetting->slno) ?></td>
                    <td class="col-md-1"><?= h($softsetting->settingsdesc) ?></td>
                    <td class="col-md-2"><?= h($softsetting->urldesc) ?></td>                   
                    <td class="col-md-1"><?= h($softsetting->createddate) ?></td>                   
                    <td class="actions col-md-2">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $softsetting->slno]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $softsetting->slno]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $softsetting->slno], ['confirm' => __('Are you sure you want to delete # {0}?', $softsetting->slno)]) ?>
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
