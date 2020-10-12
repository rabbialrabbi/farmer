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
            <?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsfedmanagement form content">
            <?= $this->Form->create($smsfedmanagement) ?>
            <fieldset>
                <legend><?= __('Add FeedBack') ?></legend>
                <table class="table table-striped table-condensed">
                    <tr><th>SMSID</th><td><?= $this->Form->input('SMSID',['class'=>'form-control']); ?></td></tr>
                     <tr><th>Feedback Date</th><td><?= $this->Form->input('FedDate',['class'=>'form-control']); ?></td></tr>
                     <tr><th>Feedback SMS</th><td><?= $this->Form->input('FedBackSMS',['class'=>'form-control']); ?></td></tr>
                </table>               
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
