<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District $district
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit District'), ['action' => 'edit', $district->DistrictOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete District'), ['action' => 'delete', $district->DistrictOID], ['confirm' => __('Are you sure you want to delete # {0}?', $district->DistrictOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Districts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New District'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="districts view content">
            <h3><?= h($district->DistrictOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('DistrictName') ?></th>
                    <td><?= h($district->DistrictName) ?></td>
                </tr>
                <tr>
                    <th><?= __('DistrictOID') ?></th>
                    <td><?= $this->Number->format($district->DistrictOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DistrictID') ?></th>
                    <td><?= $this->Number->format($district->DistrictID) ?></td>
                </tr>
                <tr>
                    <th><?= __('RegionOID') ?></th>
                    <td><?= $this->Number->format($district->RegionOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DivisionOID') ?></th>
                    <td><?= $this->Number->format($district->DivisionOID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
