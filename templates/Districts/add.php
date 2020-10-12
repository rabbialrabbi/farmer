<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\District $district
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Districts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="districts form content">
            <?= $this->Form->create($district) ?>
            <fieldset>
                <legend><?= __('Add District') ?></legend>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>District ID</th>
                        <td><?php echo $this->Form->input('DistrictID',['class'=>'form-control']); ?><td>
                    </tr>
                    <tr>
                        <th>District Name</th>
                        <td><?php echo $this->Form->input('DistrictName',['class'=>'form-control']); ?><td>                            
                    </tr>
                    <tr>
                        <th>Region Name</th>
                        <td><?php echo $this->Form->input('RegionOID',['type'=>'select','options'=>$regionList ,
                        'empty'=>'-Select Region-','class'=>'form-control','templateVars'=>['class'=>'col-md-4']]); ?><td>                            
                    </tr>
                    <tr>
                        <th>Division Name</th>
                        <td><?php echo $this->Form->input('DivisionOID',['type'=>'select','options'=>$divisionLIst ,
                        'empty'=>'-Select Division-','class'=>'form-control','templateVars'=>['class'=>'col-md-4']]); ?><td>                            
                    </tr>
                </table>               
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
