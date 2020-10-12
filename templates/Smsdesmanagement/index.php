<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesmanagement[]|\Cake\Collection\CollectionInterface $smsdesmanagement
 */
$number = 1;
use Cake\Routing\Router; 
?>
<div class="smsdesmanagement Index content">
<?= $this->Html->link(__('New'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <h3><?= __('Dissemination') ?></h3>
    <div class="table-responsive">
        <table class="table-striped table-bordered">
            <tr>
                <td class="col-md-2"></td>
                <td align="right" class="col-md-2">SMS</td>
                <td class="col-md-4"><?php
    echo $this->Form->input('smscontentoid', ['type' => 'select', 'options' => $smscontentList,
        'empty' => '-Select SMS-', 'id' => 'SmsContentOID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
?><td>  
                <td class="col-md-2"></td>
            </tr>            
        </table>    
        <table id="smsdisseminationList" class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th><?= __('ID') ?></th>                   
                    <th><?= __('District Name') ?></th>
                    <th><?= __('Upazilla Name') ?></th>
                    <th><?= __('Union Name') ?></th>
                    <th><?= __('Farmer Name') ?></th>       
                    <th><?= __('Phone') ?></th>       
                    <th><?= $this->Paginator->sort('SendingDate') ?></th>                                        
                </tr>
            </thead>
            <tbody>                              
<?php foreach ($smsdesmanagement as $smsdesmanagement): ?>                
                    <tr>                    
                        <td><?= $this->Number->format($number++) ?></td>                    
                        <td><?= h($smsdesmanagement->farmerapi['district_name']) ?></td>
                        <td><?= h($smsdesmanagement->farmerapi['upazila_name']) ?></td>
                        <td><?= h($smsdesmanagement->farmerapi['union_name']) ?></td>
                        <td><?= h($smsdesmanagement->farmerapi['farmer_name']) ?></td>       
                        <td><?= h($smsdesmanagement->farmerapi['phone']) ?></td>           
                        <td><?= h($smsdesmanagement->SendingDate) ?></td>                    
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
<?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>

        <script type="text/javascript">
            $(document).ready(function () {
                //debugger;
                //$("#smscontentid").multilineSelectmenu('destroy');
                $("#SmsContentOID").multilineSelectmenu;
                // alert('Hello there 1');
                $("#SmsContentOID").change(function () {
                    var t = 1;
                    if ($(this).children("option:selected").val() > 0) {
                        var selectedCountry = $(this).children("option:selected").val();
                        debugger;
                        $.ajax({
                            url: '<?php echo Router::url(['controller'=>'Smsdesmanagement','action'=>'getsmsdissemination']); ?>'+'/'+ selectedCountry,                                 
                            type: 'GET',
                            dataType: 'json',
                            data: {id: selectedCountry},
                            success: function (data) {
                                // debugger;
                                //alert(data[0]['farmer']);
                                $('#smsdisseminationList tbody').empty();
                                $.each(data, function (i) {
                                    $("#smsdisseminationList").find('tbody').append("<tr><td>" + t++ + "</td><td>" + data[i]['farmerapi'].district_name + "</td>" +
                                            "<td>" + data[i]['farmerapi'].upazila_name + "</td>" +
                                            "<td>" + data[i]['farmerapi'].union_name + "</td>" +
                                            "<td>" + data[i]['farmerapi'].farmer_name + "</td>" +
                                            "<td>" + data[i]['farmerapi'].phone + "</td>" +
                                            "<td>" + data[i].SendingDate + "</td>" +
                                            "</tr>");
                                });
                            },
                            error: function (xhr) {
                                //console.log(xhr);
                                var err = JSON.parse(xhr.responseText);
                                alert(err.message + selectedCountry);
                            }
                        });
                    }
                });
            });
        </script>
    </div>
</div>
