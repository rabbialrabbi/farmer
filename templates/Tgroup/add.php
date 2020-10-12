<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tgroup $tgroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Group'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tgroup form content">
            <?= $this->Form->create($tgroup) ?>
            <fieldset>
                <legend><?= __('Add Group') ?></legend>
                <?php
                    echo $this->Form->control('GroupName');
                    echo $this->Form->control('GroupID');                 
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
