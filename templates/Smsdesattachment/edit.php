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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smsdesattachment->smsdesattachmentOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachment->smsdesattachmentOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smsdesattachment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesattachment form content">
            <?= $this->Form->create($smsdesattachment) ?>
            <fieldset>
                <legend><?= __('Edit Smsdesattachment') ?></legend>
                <?php
                    echo $this->Form->control('desattachID');
                    echo $this->Form->control('attachDate', ['empty' => true]);
                    echo $this->Form->control('smscontantoid');
                    echo $this->Form->control('sendingdate', ['empty' => true]);
                    echo $this->Form->control('divisionoid');
                    echo $this->Form->control('regionoid');
                    echo $this->Form->control('districtoid');
                    echo $this->Form->control('upazillaoid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
