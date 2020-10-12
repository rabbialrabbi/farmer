<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelistdetail $codelistdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit List Item'), ['action' => 'edit', $codelistdetail->ListItemID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete List Item'), ['action' => 'delete', $codelistdetail->ListItemID], ['confirm' => __('Are you sure you want to delete # {0}?', $codelistdetail->ListItemID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List List Item'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New List Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codelistdetail view content">
            <h3><?= h($codelistdetail->ListItemID) ?></h3>
            <table class="table table-striped table-condensed">
                 <tr>
                    <th><?= __('Code Name') ?></th>
                    <td><?= h($codelistdetail->codelist->CodeListNameEnglish) ?></td>
                </tr>
                <tr>
                    <th><?= __('List Item Code') ?></th>
                    <td><?= h($codelistdetail->ListItemCode) ?></td>
                </tr>
                <tr>
                    <th><?= __('List Item (Eng)') ?></th>
                    <td><?= h($codelistdetail->ListItemNameEng) ?></td>
                </tr>
                <tr>
                    <th><?= __('List Item (Bng)') ?></th>
                    <td><?= h($codelistdetail->ListItemNameBng) ?></td>
                </tr>                
            </table>
        </div>
    </div>
</div>
