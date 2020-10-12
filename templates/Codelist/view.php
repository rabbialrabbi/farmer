<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelist $codelist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Codelist'), ['action' => 'edit', $codelist->CodeListID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Codelist'), ['action' => 'delete', $codelist->CodeListID], ['confirm' => __('Are you sure you want to delete # {0}?', $codelist->CodeListID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Codelist'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Codelist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codelist view content">
            <h3><?= h($codelist->CodeListID) ?></h3>
            <table class="table table-striped table-condensed">
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($codelist->CodeListCode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code Name(Eng)') ?></th>
                    <td><?= h($codelist->CodeListNameEnglish) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code Name(Bng)') ?></th>
                    <td><?= h($codelist->CodeListNameBangla) ?></td>
                </tr>             
            </table>
        </div>
    </div>
</div>
