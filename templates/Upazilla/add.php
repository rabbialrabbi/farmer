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
            <?= $this->Html->link(__('List Upazilla'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="upazilla form content">
            <?= $this->Form->create($upazilla) ?>
            <fieldset>
                <legend><?= __('Add Upazilla') ?></legend>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Upazilla ID</th>
                        <td><?php echo $this->Form->input('UpazillaID', ['class' => 'form-control']); ?><td>
                    </tr>
                     <tr>
                        <th>Upazilla Name</th>
                        <td><?php echo $this->Form->input('UpazillaName', ['class' => 'form-control']); ?><td>
                    </tr>
                    <tr>
                        <th>District Name</th>
                        <td><?php echo $this->Form->input('DistrictOID', ['type' => 'select', 'options' => $districtList,
                'empty' => '-Select District-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                </table>              
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
        </div>
    </div>
</div>
