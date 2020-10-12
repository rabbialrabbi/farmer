<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmerapi $farmerapi
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $farmerapi->OID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $farmerapi->OID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Farmerapi'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmerapi form content">
            <?= $this->Form->create($farmerapi) ?>
            <fieldset>
                <legend><?= __('Edit Farmerapi') ?></legend>
                <?php
                    echo $this->Form->control('FarmerID');
                    echo $this->Form->control('FarmerName');
                    echo $this->Form->control('FarmerMobileNo');
                    echo $this->Form->control('DivisionID');
                    echo $this->Form->control('DivisionName');
                    echo $this->Form->control('RegionID');
                    echo $this->Form->control('RegionName');
                    echo $this->Form->control('DistrictID');
                    echo $this->Form->control('DistrictName');
                    echo $this->Form->control('UpazillaID');
                    echo $this->Form->control('UpazillaName');
                    echo $this->Form->control('UnionID');
                    echo $this->Form->control('UnionName');
                    echo $this->Form->control('CategoryID');
                    echo $this->Form->control('CategoryName');
                    echo $this->Form->control('ProjectID');
                    echo $this->Form->control('ProjectName');
                    echo $this->Form->control('GroupID');
                    echo $this->Form->control('GroupName');
                    echo $this->Form->control('CreatedBy');
                    echo $this->Form->control('CreateDate');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
