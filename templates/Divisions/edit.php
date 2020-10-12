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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $division->DivisionOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $division->DivisionOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Divisions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="divisions form content">
            <?= $this->Form->create($division) ?>
            <fieldset>
                <legend><?= __('Edit Division') ?></legend>
                <?php
                    echo $this->Form->control('DivisionName');
                    echo $this->Form->control('DivisionID');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
