<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesmanagement $smsdesmanagement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Smsdesmanagement'), ['action' => 'edit', $smsdesmanagement->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smsdesmanagement'), ['action' => 'delete', $smsdesmanagement->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesmanagement->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smsdesmanagement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smsdesmanagement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesmanagement view content">
            <h3><?= h($smsdesmanagement->OID) ?></h3>
            <table>
                <tr>
                    <th><?= __('OID') ?></th>
                    <td><?= $this->Number->format($smsdesmanagement->OID) ?></td>
                </tr>
                <tr>
                    <th><?= __('SMSContentOID') ?></th>
                    <td><?= $this->Number->format($smsdesmanagement->SMSContentOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('FarmerOID') ?></th>
                    <td><?= $this->Number->format($smsdesmanagement->FarmerOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedBY') ?></th>
                    <td><?= $this->Number->format($smsdesmanagement->CreatedBY) ?></td>
                </tr>
                <tr>
                    <th><?= __('SendingDate') ?></th>
                    <td><?= h($smsdesmanagement->SendingDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedDate') ?></th>
                    <td><?= h($smsdesmanagement->CreatedDate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
