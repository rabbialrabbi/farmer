<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsmanagement[]|\Cake\Collection\CollectionInterface $smsmanagement
 */
$number = 1;
 use Cake\Routing\Router;
?>
<div class="smsmanagement index content">
    <table class="table table-striped">
        <tr>
            <td>
                <?= $this->Html->link(__('Process'), ['action' => 'processreport'], ['class' => 'btn btn-success  btn-sm']) ?>
            </td>
        </tr>
    </table>


    <div class="table-responsive">
        <table>
            <tr>
                <td></td>
                <td>SMS</td>
                <td><?php
                    echo $this->Form->input('smscontentoid', ['type' => 'select', 'options' => $smscontentList,
                        'empty' => '-Select SMS-', 'id' => 'smscontentid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                    ?><td>  
                <td></td>
            </tr>
        </table>    
        <table id="smsconlist" class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Farmer Name</th>
                    <th>Mobile No</th>
                    <th>District Name</th>
                    <th>Upazilla Name</th>
                    <th>Union Name</th>
                    <th>Feedback SMS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smsmanagement as $smsmanagement): ?>
                    <tr>
                        <td><?= $number++ ?></td>
                        <td><?= h($smsmanagement->farmerapi->farmer_name) ?></td>
                        <td><?= h($smsmanagement->farmerapi->phone) ?></td>
                        <td><?= h($smsmanagement->farmerapi->district_name) ?></td>
                        <td><?= h($smsmanagement->farmerapi->upazila_name) ?></td>
                        <td><?= h($smsmanagement->farmerapi->union_name) ?></td>
                        <td><?= h($smsmanagement->SMSBody) ?></td>
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

       
    </div>
</div>
 <script type="text/javascript">
            $(document).ready(function () {
                $("#smscontentid").change(function () {
                    //alert('I am In here');
                    var t = 1;
                    if ($(this).children("option:selected").val() > 0) {
                        var selectedCountry = $(this).children("option:selected").val();
                      //  debugger;    
                        $.ajax({
                            url: '<?php echo Router::url(['controller'=>'smsmanagement','action'=>'getsmsmanagement']); ?>'+'/'+selectedCountry,                              
                            type: 'GET',
                            dataType: 'json',
                            data: {id: selectedCountry},
                            success: function (data) {
                                //debugger;
                                $('#smsconlist tbody').empty();
                                $.each(data, function (i) {
                                    $("#smsconlist").find('tbody').append("<tr><td>" + t++ + "</td><td>" + data[i]['farmerapi'].farmer_name + "</td>" +
                                            "<td>" + data[i]['farmerapi'].phone + "</td>" +
                                            "<td>" + data[i]['farmerapi'].district_name + "</td>" +
                                              "<td>" + data[i]['farmerapi'].upazila_name + "</td>" +
                                                "<td>" + data[i]['farmerapi'].union_name + "</td>" +
                                                "<td>" + data[i].SMSBody + "</td>" +
                                            "</tr>");
                                });
                            },
                            error: function (xhr) {
                                var err = JSON.parse(xhr.responseText);
                                alert(err.message + selectedCountry);
                            }
                        });
                    }
                });
            });
        </script>