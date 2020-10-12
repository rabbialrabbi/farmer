<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesattachment $smsdesattachment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Smsdesattachment'), ['action' => 'edit', $smsdesattachment->smsdesattachmentOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smsdesattachment'), ['action' => 'delete', $smsdesattachment->smsdesattachmentOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachment->smsdesattachmentOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smsdesattachment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smsdesattachment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesattachment view content">
            <h3><?= h($smsdesattachment->smsdesattachmentOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SmsdesattachmentOID') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->smsdesattachmentOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('DesattachID') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->desattachID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Smscontantoid') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->smscontantoid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Divisionoid') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->divisionoid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regionoid') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->regionoid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Districtoid') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->districtoid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Upazillaoid') ?></th>
                    <td><?= $this->Number->format($smsdesattachment->upazillaoid) ?></td>
                </tr>
                <tr>
                    <th><?= __('AttachDate') ?></th>
                    <td><?= h($smsdesattachment->attachDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sendingdate') ?></th>
                    <td><?= h($smsdesattachment->sendingdate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
