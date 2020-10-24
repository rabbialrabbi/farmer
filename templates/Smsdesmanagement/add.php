<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesmanagement $smsdesmanagement
 */
$number = 1;
use Cake\Routing\Router;
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesmanagement form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Add') ?></legend>
                <table class="table table-bordered table-condensed">
                    <tr>
                        <th>SMS Content</th><td><?php
                            echo $this->Form->input('SmsContentOID', ['type' => 'select', 'options' => $smscontentList,
                                'id' => 'SmsContentOID', 'empty' => '-Select SMS Content-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                            ?><td>
                    </tr>
                </table>

                <table id="tblfarmerlist" class="table table-striped table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th><?= __('ID') ?></th>
                            <th><?= __('District') ?></th>
                            <th><?= __('Upazilla') ?></th>
                            <th><?= __('Union') ?></th>
                            <th><?= __('Farmer Name') ?></th>
                            <th><?= __('Mobile No') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($farmerapilist as $farmerapi): ?>
                            <tr>
                                <td><?= $this->Number->format($number++) ?></td>
                                <td><?= h($farmerapi->district_name) ?></td>
                                <td><?= h($farmerapi->upazila_name) ?></td>
                                <td><?= h($farmerapi->union_name) ?></td>
                                <td><?= h($farmerapi->farmer_name) ?></td>
                                <td><?= h($farmerapi->phone) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </fieldset>


            <?= $this->Form->button(__('Send SMS'), array('class' => 'btn btn-primary')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#SmsContentOID").change(function () {
            var t = 1;
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();

                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesmanagement','action'=>'fillfarmerlist']); ?>'+'/'+ selectedCountry,
                    type: 'GET',
                    dataType: 'json',
                    data: {smscontentid: selectedCountry},
                    success: function (data) {
                        $('#tblfarmerlist tbody').empty();
                        $.each(data, function (i) {
                            $("#tblfarmerlist").find('tbody').append("<tr><td>" + t++ + "</td><td>" + data[i].farmerapi.district_name + "</td>" +
                                     "<td>" + data[i].farmerapi.upazila_name + "</td>" +
                                     "<td>" + data[i].farmerapi.union_name + "</td>" +
                                     "<td>" + data[i].farmerapi.farmer_name + "</td>" +
                                    "<td>" + data[i].farmerapi.phone + "</td>" +
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
