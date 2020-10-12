<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Division $division
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Divisions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="divisions form content">
            <?= $this->Form->create($division) ?>
            <fieldset>
                <legend><?= __('Add Division') ?></legend>
                 <table class="table table-bordered table-striped">
                    <tr>
                        <th>Division ID</th>
                        <td><?php echo $this->Form->input('DivisionID',['class'=>'form-control']); ?><td>
                    </tr>
                     <tr>
                        <th>Division Name</th>
                        <td><?php echo $this->Form->input('DivisionName',['class'=>'form-control']); ?><td>
                    </tr>
                 </table>               
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
