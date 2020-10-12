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
            <?= $this->Html->link(__('List Farmer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="farmerapi form content">
            <?= $this->Form->create($farmerapi) ?>
            <fieldset>
                <legend><?= __('Add Farmer') ?></legend>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Region Name</th>
                        <td><?php echo $this->Form->input('RegionOID', ['type' => 'select', 'options' => $regionlist,
                'empty' => '-Select Region-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>Division Name</th>
                        <td><?php echo $this->Form->input('DivisionOID', ['type' => 'select', 'options' => $divisionlist,
                            'empty' => '-Select Division-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>District Name</th>
                        <td><?php echo $this->Form->input('DistrictOID', ['type' => 'select', 'options' => $districtlist,
                            'empty' => '-Select District-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>Upazilla Name</th>
                        <td><?php echo $this->Form->input('UpazillaOID', ['type' => 'select', 'options' => $upazillalist,
                            'empty' => '-Select Upazilla-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>Union Name</th>
                        <td><?php echo $this->Form->input('UnionOID', ['type' => 'select', 'options' => $unionlist,
                            'empty' => '-Select Union-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>                    
                    <tr>
                        <th>Project Name</th>
                        <td><?php echo $this->Form->input('ProjectOID', ['type' => 'select', 'options' => $projectlist,
                            'empty' => '-Select Project-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>Group Name</th>
                        <td><?php echo $this->Form->input('GroupOID', ['type' => 'select', 'options' => $grouplist,
                            'empty' => '-Select Group-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
            ?><td>                            
                    </tr>
                    <tr>
                        <th>Farmer Name</th>
                        <td><?php echo $this->Form->input('FarmerName', ['class' => 'form-control']); ?><td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $this->Form->input('FarmerAdd', ['class' => 'form-control']); ?><td>                            
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td><?php echo $this->Form->input('FarMob', ['class' => 'form-control']); ?><td>                            
                    </tr>
                </table>                    
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
