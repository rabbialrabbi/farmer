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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smsdesmanagement->OID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesmanagement->OID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smsdesmanagement'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesmanagement form content">
            <?= $this->Form->create($smsdesmanagement) ?>
            <fieldset>
                <legend><?= __('Edit Smsdesmanagement') ?></legend>
                <?php
                    echo $this->Form->control('SMSContentOID');
                    echo $this->Form->control('FarmerOID');
                    echo $this->Form->control('SendingDate');
                    echo $this->Form->control('CreatedBY');
                    echo $this->Form->control('CreatedDate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
