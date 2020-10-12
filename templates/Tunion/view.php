<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tunion $tunion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tunion'), ['action' => 'edit', $tunion->UnionOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tunion'), ['action' => 'delete', $tunion->UnionOID], ['confirm' => __('Are you sure you want to delete # {0}?', $tunion->UnionOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tunion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tunion'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tunion view content">
            <h3><?= h($tunion->UnionOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('UnionName') ?></th>
                    <td><?= h($tunion->UnionName) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnionOID') ?></th>
                    <td><?= $this->Number->format($tunion->UnionOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnionID') ?></th>
                    <td><?= $this->Number->format($tunion->UnionID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UpazillaOID') ?></th>
                    <td><?= $this->Number->format($tunion->UpazillaOID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
