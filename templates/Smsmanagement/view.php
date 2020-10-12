<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsmanagement $smsmanagement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Smsmanagement'), ['action' => 'edit', $smsmanagement->SmsMgmOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smsmanagement'), ['action' => 'delete', $smsmanagement->SmsMgmOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsmanagement->SmsMgmOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smsmanagement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smsmanagement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsmanagement view content">
            <h3><?= h($smsmanagement->SmsMgmOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SmsMgmOID') ?></th>
                    <td><?= $this->Number->format($smsmanagement->SmsMgmOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('FarmerOID') ?></th>
                    <td><?= $this->Number->format($smsmanagement->FarmerOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('SMSContentOID') ?></th>
                    <td><?= $this->Number->format($smsmanagement->SMSContentOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('SMSFedManOID') ?></th>
                    <td><?= $this->Number->format($smsmanagement->SMSFedManOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedBY') ?></th>
                    <td><?= $this->Number->format($smsmanagement->CreatedBY) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedDate') ?></th>
                    <td><?= h($smsmanagement->CreatedDate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
