<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Upazilla $upazilla
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $upazilla->UpazillaOID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $upazilla->UpazillaOID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Upazilla'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="upazilla form content">
            <?= $this->Form->create($upazilla) ?>
            <fieldset>
                <legend><?= __('Edit Upazilla') ?></legend>
                <?php
                    echo $this->Form->control('UpazillaName');
                    echo $this->Form->control('UpazillaID');
                    echo $this->Form->control('DistrictOID');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
