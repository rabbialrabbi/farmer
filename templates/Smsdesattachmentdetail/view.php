<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesattachmentdetail $smsdesattachmentdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Smsdesattachmentdetail'), ['action' => 'edit', $smsdesattachmentdetail->smsdesattadetOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smsdesattachmentdetail'), ['action' => 'delete', $smsdesattachmentdetail->smsdesattadetOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachmentdetail->smsdesattadetOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smsdesattachmentdetail'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smsdesattachmentdetail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesattachmentdetail view content">
            <h3><?= h($smsdesattachmentdetail->smsdesattadetOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SmsdesattadetOID') ?></th>
                    <td><?= $this->Number->format($smsdesattachmentdetail->smsdesattadetOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Desattachdeatailsid') ?></th>
                    <td><?= $this->Number->format($smsdesattachmentdetail->desattachdeatailsid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Desattachid') ?></th>
                    <td><?= $this->Number->format($smsdesattachmentdetail->desattachid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Farmeroid') ?></th>
                    <td><?= $this->Number->format($smsdesattachmentdetail->farmeroid) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
