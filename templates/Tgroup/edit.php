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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tgroup->OID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tgroup->OID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tgroup'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tgroup form content">
            <?= $this->Form->create($tgroup) ?>
            <fieldset>
                <legend><?= __('Edit Group') ?></legend>
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
