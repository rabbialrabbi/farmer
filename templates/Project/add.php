<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Project'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="project form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <table class="table table-striped table-condensed">                    
                    <tr><th>Project Name</th>
                        <td>                            
                             <?= $this->Form->input('ProjectName', ['type' => 'text']); ?>    
                        </td>
                    </tr>
                    <tr>
                        <th>Select Upazilla</th>
                        <td>                            
                                <?=$this->Form->input('upazillaID', ['type' => 'select', 'options' => $upazillalist,
                                'empty' => '-Select Upazilla-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);?>                            
                        </td>
                    </tr>
                </table>                
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
