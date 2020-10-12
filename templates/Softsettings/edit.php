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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $softsetting->slno],
                ['confirm' => __('Are you sure you want to delete # {0}?', $softsetting->slno), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Softsettings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softsettings form content">
            <?= $this->Form->create($softsetting) ?>
            <fieldset>
                <legend><?= __('Edit Softsetting') ?></legend>
                <?php
                    echo $this->Form->control('settingsdesc');
                    echo $this->Form->control('urldesc');
                    echo $this->Form->control('cuserName');
                    echo $this->Form->control('cuserpsw');
                    echo $this->Form->control('emeino');
                    echo $this->Form->control('createddate', ['empty' => true]);
                    echo $this->Form->control('updatedate', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
