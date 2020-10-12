<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cyearen $cyearen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Year'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cyearen form content">
            <?= $this->Form->create($cyearen) ?>
            <fieldset>
                <legend><?= __('Add Year') ?></legend>
                 <table class="table table-striped table-condensed">                                        
                    <tr><th>SL No</th><td><?= $this->Form->input('Slno',['class'=>'form-control']); ?></td></tr>
                    <tr><th>Year</th><td><?= $this->Form->input('Cyear',['class'=>'form-control']); ?></td></tr>
                </table>                 
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
