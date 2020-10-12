<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Softsetting $softsetting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Softsettings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softsettings form content">
            <?= $this->Form->create($softsetting) ?>
            <fieldset>
                <legend><?= __('Add Softsetting') ?></legend>
                <table class='table table-responsive table-bordered table-condensed'>
                    <tr>
                        <td><?= (_('Software Description')) ?></td>
                        <td><?= $this->Form->input('settingsdesc', ['class' => 'form-control']) ?></td>
                    </tr>
                    <tr>
                        <td><?= (_('URL')) ?></td>
                        <td><?= $this->Form->input('urldesc', ['class' => 'form-control']) ?></td>
                    </tr>
                    <tr>
                        <td><?= (_('User Name')) ?></td>
                        <td><?= $this->Form->input('cuserName', ['class' => 'form-control']) ?></td>
                    </tr>
                    <tr>
                        <td><?= (_('Password')) ?></td>
                        <td><?= $this->Form->input('cuserpsw', ['class' => 'form-control']) ?></td>
                    </tr>
                    <tr>
                        <td><?= (_('IMEI No')) ?></td>
                        <td><?= $this->Form->input('emeino', ['class' => 'form-control']) ?></td>
                    </tr>
                    <tr>
                    <tr>
                        <td><?= (_('Send Message Flag')) ?></td>
                        <td><?= $this->Form->radio('msgsend', [1 => 'হ্যা', 2 => 'না']); ?></td>
                    </tr>
                        
                    <tr>
                        <td><?= (_('Create Date')) ?></td>
                        <td><?= $this->Form->input('createddate', ['type'=>'date', 'class' => 'form-control']) ?></td>
                    </tr>
                    <td><?= (_('Update Date')) ?></td>
                    <td><?= $this->Form->input('updatedate', ['type'=>'date','class' => 'form-control']) ?></td>
                    </tr>                    
                </table>              
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
