<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->RegionOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->RegionOID], ['confirm' => __('Are you sure you want to delete # {0}?', $region->RegionOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="regions view content">
            <h3><?= h($region->RegionOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('RegionName') ?></th>
                    <td><?= h($region->RegionName) ?></td>
                </tr>
                <tr>
                    <th><?= __('RegionOID') ?></th>
                    <td><?= $this->Number->format($region->RegionOID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
