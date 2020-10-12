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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smscontentapi->OID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smscontentapi->OID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smscontentapi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smscontentapi form content">
            <?= $this->Form->create($smscontentapi) ?>
            <fieldset>
                <legend><?= __('Edit Smscontentapi') ?></legend>
                <?php
                    echo $this->Form->control('SMSNo');
                    echo $this->Form->control('SMSContentBody');
                    echo $this->Form->control('CreatedBy');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
