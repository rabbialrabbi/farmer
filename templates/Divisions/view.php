<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Division $division
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Division'), ['action' => 'edit', $division->DivisionOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Division'), ['action' => 'delete', $division->DivisionOID], ['confirm' => __('Are you sure you want to delete # {0}?', $division->DivisionOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Divisions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Division'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="divisions view content">
            <h3><?= h($division->DivisionOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('DivisionName') ?></th>
                    <td><?= h($division->DivisionName) ?></td>
                </tr>
                <tr>
                    <th><?= __('DivisionOID') ?></th>
                    <td><?= $this->Number->format($division->DivisionOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DivisionID') ?></th>
                    <td><?= $this->Number->format($division->DivisionID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
