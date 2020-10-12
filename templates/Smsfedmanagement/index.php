<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsfedmanagement[]|\Cake\Collection\CollectionInterface $smsfedmanagement
 */
$number=1;
?>
<div class="smsfedmanagement index content">
    <?= $this->Html->link(__('New'), ['action' => 'add'], ['class' => 'button float-right']) ?>    
    <h3><?= __('Feedback') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>                    
                    <th><?= __('SMS ID') ?></th>
                    <th><?= __('Mobile No') ?></th>                    
                    <th><?= __('SMS') ?></th>                               
                    <th><?= __('Farmer Name') ?></th>   
                    <th><?= __('District Name') ?></th>   
                    <th><?= __('Upazilla Name') ?></th>   
                    <th><?= __('Union Name') ?></th>   
                     <th><?= __('Date') ?></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($smsfedmanagement as $smsfedmanagement): ?>
                <tr>                    
                    <td><?= $this->Number->format($number++) ?></td>
                    <td><?= h($smsfedmanagement->FarMobileNo) ?></td>
                    <td><?= h($smsfedmanagement->FedBackSMS) ?></td>                    
                    <td><?php               
                        echo $smsfedmanagement->farmerapi->farmer_name ?? "";                     
                    ?></td>   
                    <td><?php               
                        echo $smsfedmanagement->farmerapi->district_name ?? "";                     
                    ?></td>  
                      <td><?php               
                        echo $smsfedmanagement->farmerapi->upazila_name ?? "";                     
                    ?></td>  
                      <td><?php               
                        echo $smsfedmanagement->farmerapi->union_name ?? "";                     
                    ?></td>  
                    <td><?= h($smsfedmanagement->FedDate) ?></td>                       
                </tr>
               
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
