<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crop $crop
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Crops'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="crops form content">
            <?= $this->Form->create($crop) ?>
            <fieldset>
                <legend><?= __('Add Crop') ?></legend>
                <table class="table table-striped table-condensed">                                        
                    <tr><th>Crops Name English</th><td><?= $this->Form->input('CropsNameEn',['class'=>'form-control']); ?></td></tr>
                    <tr><th>Crops Name Bangla</th><td><?= $this->Form->input('CropsNameBn',['class'=>'form-control']); ?></td></tr>
                </table>                
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>    
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
