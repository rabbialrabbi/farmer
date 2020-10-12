<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsfedmanagement $smsfedmanagement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit|'), ['action' => 'edit', $smsfedmanagement->SmsFedMngOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete|'), ['action' => 'delete', $smsfedmanagement->SmsFedMngOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsfedmanagement->SmsFedMngOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List|'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsfedmanagement view content">
            <h3><?= h($smsfedmanagement->SmsFedMngOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('SMSID') ?></th>
                    <td><?= $this->Number->format($smsfedmanagement->SMSID) ?></td>
                </tr>
                <tr>
                    <th><?= __('MobileNo') ?></th>
                    <td><?= h($smsfedmanagement->FarMobileNo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($smsfedmanagement->FedDate) ?></td>
                </tr>  
                <tr>
                    <th><?= __('FedBack SMS') ?></th>
                    <td><?= h($smsfedmanagement->FedBackSMS) ?></td>
                </tr>                                             
            </table>
        </div>
    </div>
</div>
