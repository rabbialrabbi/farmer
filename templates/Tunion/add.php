<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tunion $tunion
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tunion'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tunion form content">
            <?= $this->Form->create($tunion) ?>
            <fieldset>
                <legend><?= __('Add Tunion') ?></legend>
                <?php
                    echo $this->Form->control('UnionName');
                    echo $this->Form->control('UnionID');
                    echo $this->Form->control('UpazillaOID');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
