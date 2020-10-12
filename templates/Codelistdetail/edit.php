<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Codelistdetail $codelistdetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $codelistdetail->ListItemID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $codelistdetail->ListItemID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List List Item'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codelistdetail form content">
            <?= $this->Form->create($codelistdetail) ?>
            <fieldset>
                <legend><?= __('Edit List Item') ?></legend>
                <div class="panel panel-default">                   
                    <div class="panel-body">
                        <table class="table table-striped table-condensed">
                            
                            <tr><th>Code Name</th><td><?= h($codelistdetail->codelist->CodeListNameEnglish) ?></td></tr>
                            <tr><th>List Code</th><td><?= $this->Form->input('ListItemCode',['class'=>'form-control']); ?></td></tr>
                            <tr><th>List Name(Eng)</th><td><?= $this->Form->input('ListItemNameEng',['class'=>'form-control']); ?></td></tr>
                            <tr><th>List Name(Bng)</th><td><?= $this->Form->input('ListItemNameBng',['class'=>'form-control']); ?></td></tr>                            
                        </table>        
                    </div>
                </div>                              
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
