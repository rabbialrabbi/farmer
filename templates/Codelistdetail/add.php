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
            <?= $this->Html->link(__('List Item'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="codelistdetail form content">
            <?= $this->Form->create($codelistdetail) ?>
            <fieldset>
                <legend><?= __('Add List Item') ?></legend>
               <table class="table table-striped table-condensed table-bordered">
                    <tr><th>Code List</th><td><?= $this->Form->input('CodeListID',['type'=>'select','options'=>$codelistid,
                        'empty'=>'-Select Code List-','class'=>'form-control','templateVars'=>['class'=>'col-md-4']]);  ?></td></tr>
                    <tr><th>List Item Code</th><td><?= $this->Form->input('ListItemCode',['class'=>'form-control']); ?></td></tr>
                    <tr><th>List Item Name(Eng)</th><td><?= $this->Form->input('ListItemNameEng',['class'=>'form-control']); ?></td></tr>
                    <tr><th>List Item Name(Bng)</th><td><?= $this->Form->input('ListItemNameBng',['class'=>'form-control']); ?></td></tr>
               </table>                                                     
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
