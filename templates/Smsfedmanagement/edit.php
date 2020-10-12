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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smsfedmanagement->SmsFedMngOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smsfedmanagement->SmsFedMngOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smsfedmanagement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsfedmanagement form content">
            <?= $this->Form->create($smsfedmanagement) ?>
            <fieldset>
                <legend><?= __('Edit') ?></legend>
                 <table>
                    <tr><th>SMS No</th><td><?= $this->Form->input('SMSID',['class'=>'form-control']); ?></td></tr>
                    <tr><th>Mobile No</th><td><?= $this->Form->textarea('FarMobileNo',['class'=>'form-control']);  ?></td></tr>
                    <tr><th>Date</th><td><?= $this->Form->textarea('FedDate',['class'=>'form-control']);  ?></td></tr>
                    <tr><th>FeedBack</th><td><?= $this->Form->textarea('FedBackSMS',['class'=>'form-control']);  ?></td></tr>
                </table>                        
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
