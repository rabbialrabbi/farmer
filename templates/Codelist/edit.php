<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelist $codelist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $codelist->CodeListID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $codelist->CodeListID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Codelist'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codelist form content">
            <?= $this->Form->create($codelist) ?>
            <fieldset>
                <legend><?= __('Edit Codelist') ?></legend>
                <div class="panel panel-default">                   
                    <div class="panel-body">
                        <table class="table table-striped table-condensed">
                            <tr><th>Code</th><td><?= $this->Form->input('CodeListCode',['class'=>'form-control']); ?></td></tr>
                            <tr><th>Code Name(Eng)</th><td><?= $this->Form->input('CodeListNameEnglish',['class'=>'form-control']); ?></td></tr>
                            <tr><th>Code Name(Bng)</th><td><?= $this->Form->input('CodeListNameBangla',['class'=>'form-control']); ?></td></tr>                            
                        </table>        
                    </div>
                </div>               
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
