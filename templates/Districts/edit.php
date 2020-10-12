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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $district->DistrictOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $district->DistrictOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Districts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="districts form content">
            <?= $this->Form->create($district) ?>
            <fieldset>
                <legend><?= __('Edit District') ?></legend>
                <?php
                    echo $this->Form->control('DistrictName');
                    echo $this->Form->control('DistrictID');
                    echo $this->Form->control('RegionOID');
                    echo $this->Form->control('DivisionOID');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
