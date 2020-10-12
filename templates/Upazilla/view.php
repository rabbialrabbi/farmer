<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upazilla $upazilla
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Upazilla'), ['action' => 'edit', $upazilla->UpazillaOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Upazilla'), ['action' => 'delete', $upazilla->UpazillaOID], ['confirm' => __('Are you sure you want to delete # {0}?', $upazilla->UpazillaOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Upazilla'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Upazilla'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="upazilla view content">
            <h3><?= h($upazilla->UpazillaOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('UpazillaName') ?></th>
                    <td><?= h($upazilla->UpazillaName) ?></td>
                </tr>
                <tr>
                    <th><?= __('UpazillaOID') ?></th>
                    <td><?= $this->Number->format($upazilla->UpazillaOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UpazillaID') ?></th>
                    <td><?= $this->Number->format($upazilla->UpazillaID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DistrictOID') ?></th>
                    <td><?= $this->Number->format($upazilla->DistrictOID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
