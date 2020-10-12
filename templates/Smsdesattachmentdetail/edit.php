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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smsdesattachmentdetail->smsdesattadetOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachmentdetail->smsdesattadetOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smsdesattachmentdetail'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesattachmentdetail form content">
            <?= $this->Form->create($smsdesattachmentdetail) ?>
            <fieldset>
                <legend><?= __('Edit Smsdesattachmentdetail') ?></legend>
                <?php
                    echo $this->Form->control('desattachdeatailsid');
                    echo $this->Form->control('desattachid');
                    echo $this->Form->control('farmeroid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
