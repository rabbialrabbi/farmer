<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmer $farmer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Farmer'), ['action' => 'edit', $farmer->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Farmer'), ['action' => 'delete', $farmer->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $farmer->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Farmer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Farmer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmer view content">
            <h3><?= h($farmer->OID) ?></h3>
            <table>
                <tr>
                    <th><?= __('FarmerName') ?></th>
                    <td><?= h($farmer->FarmerName) ?></td>
                </tr>
                <tr>
                    <th><?= __('FarmerAdd') ?></th>
                    <td><?= h($farmer->FarmerAdd) ?></td>
                </tr>
                <tr>
                    <th><?= __('FarMob') ?></th>
                    <td><?= h($farmer->FarMob) ?></td>
                </tr>
                <tr>
                    <th><?= __('OID') ?></th>
                    <td><?= $this->Number->format($farmer->OID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DivisionID') ?></th>
                    <td><?= $this->Number->format($farmer->DivisionID) ?></td>
                </tr>
                <tr>
                    <th><?= __('RegionID') ?></th>
                    <td><?= $this->Number->format($farmer->RegionID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DistrictID') ?></th>
                    <td><?= $this->Number->format($farmer->DistrictID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UpazillaID') ?></th>
                    <td><?= $this->Number->format($farmer->UpazillaID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UnionID') ?></th>
                    <td><?= $this->Number->format($farmer->UnionID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CategoryID') ?></th>
                    <td><?= $this->Number->format($farmer->CategoryID) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectID') ?></th>
                    <td><?= $this->Number->format($farmer->ProjectID) ?></td>
                </tr>
                <tr>
                    <th><?= __('GroupID') ?></th>
                    <td><?= $this->Number->format($farmer->GroupID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedBy') ?></th>
                    <td><?= $this->Number->format($farmer->CreatedBy) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedDate') ?></th>
                    <td><?= h($farmer->CreatedDate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
