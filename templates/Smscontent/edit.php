<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontent $smscontent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $smscontent->SmsContentOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $smscontent->SmsContentOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Smscontent'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smscontent form content">
            <?= $this->Form->create($smscontent) ?>
            <fieldset>
                <legend><?= __('Edit Smscontent') ?></legend>
                <table>
                    <tr><th>SMS No</th><td><?= $this->Form->input('SMSNo',['class'=>'form-control']); ?></td></tr>
                    <tr><th>SMS Content</th><td><?= $this->Form->textarea('SMSContentBody',['class'=>'form-control']);  ?></td></tr>
                    <tr><th>Note</th><td><?= $this->Form->textarea('CNote',['class'=>'form-control']);  ?></td></tr>
                </table>               
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
