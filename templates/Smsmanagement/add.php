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
            <?= $this->Html->link(__('List Smsmanagement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsmanagement form content">
            <?= $this->Form->create($smsmanagement) ?>
            <fieldset>
                <legend><?= __('Add Smsmanagement') ?></legend>
                <?php
                    echo $this->Form->control('FarmerOID');
                    echo $this->Form->control('SMSContentOID');
                    echo $this->Form->control('SMSFedManOID');
                    echo $this->Form->control('CreatedBY');
                    echo $this->Form->control('CreatedDate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
