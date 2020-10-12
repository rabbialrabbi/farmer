<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontentapi $smscontentapi
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Smscontentapi'), ['action' => 'edit', $smscontentapi->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smscontentapi'), ['action' => 'delete', $smscontentapi->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $smscontentapi->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smscontentapi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smscontentapi'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smscontentapi view content">
            <h3><?= h($smscontentapi->OID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SMSContentBody') ?></th>
                    <td><?= h($smscontentapi->SMSContentBody) ?></td>
                </tr>
                <tr>
                    <th><?= __('OID') ?></th>
                    <td><?= $this->Number->format($smscontentapi->OID) ?></td>
                </tr>
                <tr>
                    <th><?= __('SMSNo') ?></th>
                    <td><?= $this->Number->format($smscontentapi->SMSNo) ?></td>
                </tr>
                <tr>
                    <th><?= __('CreatedBy') ?></th>
                    <td><?= $this->Number->format($smscontentapi->CreatedBy) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
