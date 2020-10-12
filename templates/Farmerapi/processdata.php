<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$number=1;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            
        </div>
    </aside>
    <div class="farmerapi form content">
        <?= $this->Form->create() ?>
        <fieldset>
            <div class="table-responsive">
                <table class="table table-striped table-condensed table-bordered">
                    <thead class="thead-dark">
                        <tr>                    
                            <th><?= __('Slno') ?></th>
                            <th><?= __('Description') ?></th>                                                                                 
                            <th><?= __('Action') ?></th>                    
                            <th><?= __('Last Update Date') ?></th>                                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($softsettings as $softsettings): ?>
                            <tr>                    
                                <td><?= $this->Number->format($number++) ?></td>
                                <td><?= h($softsettings->settingsdesc) ?></td>
                                <td><?= $this->Html->link(__('Process'), ['action' => 'updatetablebyapi', $softsettings->slno], ['class' => 'btn btn-info']) ?> </td>
<!--                                <td> <?= $this->Form->button('Process', ['type' =>'button','action' => 'updatetablebyapi', $softsettings->slno]) ?></td>                                        -->
                                <td><?= h($softsettings->updatedate) ?></td>                                                    
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>

