<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesattachment[]|\Cake\Collection\CollectionInterface $smsdesattachment
 */
$number = 1;
use Cake\Routing\Router; 
?>

<div class="smsdesattachment index content">
    <?= $this->Html->link(__('New Attachment'), ['action' => 'add'], ['class' => 'button float-right']) ?>    
     
    <h3><?= __('Attachment') ?></h3>

    <table class="table bg-warning table-responsive table-bordered table-condensed">
        <tr>          
            <td><?= __('Start Date') ?></td>
            <td><?= $this->Form->input('startdate', ['type' => 'date','id' => 'startdate']) ?></td>
            <td><?= __('End Date') ?></td>
            <td><?= $this->Form->input('enddate', ['type' => 'date','id' => 'enddate']) ?></td>            
        </tr>
        <tr>
            <td><?= __('Advisory Content') ?> </td>
            <td colspan="3"><?=
                $this->Form->input('SmsContentOID', ['type' => 'select', 'options' => $smscontentlist,
                    'empty' => '-Advisory-', 'id' => 'smscontentoid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                ?></td>
        </tr>
        <tr>
            <td><?= __('Division') ?> </td>
            <td><?=
                $this->Form->input('DivisionOid', ['type' => 'select', 'options' => $divisionlist,
                    'empty' => '-বিভাগ-', 'id' => 'divisionoid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                ?></td>
            <td><?= __('Region') ?> </td>
            <td><?=
                $this->Form->input('RegionOid', ['type' => 'select', 'options' => $regionlist,
                    'empty' => '-রিজিওণ-', 'id' => 'regionoid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                ?></td>
        </tr>
        <tr>
            <td><?= __('District') ?> </td>
            <td><?=
                $this->Form->input('DistrictOid', ['type' => 'select', 'options' => $districtlist,
                    'empty' => '-জেলা-', 'id' => 'districtoid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                ?></td>
            <td><?= __('Upazilla') ?> </td>
            <td><?=
                $this->Form->input('Upazilla_oid', ['type' => 'select', 'options' => $upazillalist,
                    'empty' => '-উপজেলা-', 'id' => 'upazilla_oid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                ?></td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td> <?= $this->Form->button('Search', ['id' => 'cmdsearch', 'type' => 'button', 'class' => 'btn btn-success  btn-sm btn-block']) ?></td>
        </tr>
    </table>

    <div class="table-responsive">
        <table id="tbldesattachment" class="table table-striped table-condensed table-bordered">
            <thead class="thead-light">
                <tr>                    
                    <th><?= __('ID') ?></th>
                    <th><?= __('Attach Date') ?></th>
                    <th><?= __('SMS Content') ?></th>
                    <th><?= __('Division') ?></th>
                    <th><?= __('Region') ?></th>
                    <th><?= __('District') ?></th>
                    <th><?= __('Upazilla') ?></th>                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smsdesattachment as $smsdesattachment): ?>
                    <tr>
                        <td class="col-md-1"><?= $this->Number->format($number++) ?></td>                    
                        <td class="col-md-1"><?= date_format($smsdesattachment->attachDate, 'Y-m-d') ?></td>                    
                        <td class="col-md-2"><?= h($smsdesattachment->smscontent->SMSContentBodyBan) ?></td>                   
                        <td class="col-md-1"><?= h($smsdesattachment->division->DivisionName) ?></td>
                        <td class="col-md-1"><?= h($smsdesattachment->region->RegionName) ?></td>
                        <td class="col-md-1"><?= h($smsdesattachment->district->DistrictName) ?></td>
                        <td class="col-md-1"><?= h($smsdesattachment->upazilla->UpazillaName) ?></td>              
                        <td class="actions col-md-1">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $smsdesattachment->desattachID]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smsdesattachment->desattachID]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smsdesattachment->desattachID], ['confirm' => __('Are you sure you want to delete # {0}?', $smsdesattachment->desattachID)]) ?>
                        </td>
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
         $('#divisionoid').change(function () {
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();               
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillregion']); ?>'+'/'+ selectedCountry,                    
                    //url:  '@Url.Action("fillregion", "smsdesattachment")',        
                    type: 'GET',
                    dataType: 'json',
                    data: {divisionid: selectedCountry},
                    success: function (data) {
                        $('#regionoid').find('option').remove();
                        $('#regionoid').append($('<option>').text("-সিলেক্ট রিজিওন-"));
                        $.each(data, function (key, value) {
                            $('#regionoid').append('<option value=' + key + '>' + value + '</option>');
                        });
                    },
                    error: function (xhr) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message + selectedCountry);
                    }
                });
            }
        });
        //District Information
        $("#regionoid").change(function () {
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'filldistrict']); ?>'+'/'+ selectedCountry,
                    type: 'GET',
                    dataType: 'json',
                    data: {regionsoid: selectedCountry},
                    success: function (data) {
                        $('#districtoid').find('option').remove();
                        $('#districtoid').append($('<option>').text("-সিলেক্ট জেলা-"));
                        $.each(data, function (key, value) {
                            $('#districtoid').append('<option value=' + key + '>' + value + '</option>');
                        });
                    },
                    error: function (xhr) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message + selectedCountry);
                    }
                });
            }
        });
        //Upazilla Information
        $("#districtoid").change(function () {
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillupazilla']); ?>'+'/'+ selectedCountry,                    
                    type: 'GET',
                    dataType: 'json',
                    data: {disrictoid: selectedCountry},
                    success: function (data) {
                        $('#upazilla_oid').find('option').remove();
                        $('#upazilla_oid').append($('<option>').text("-সিলেক্ট উপজেলা-"));
                        $.each(data, function (key, value) {
                            $('#upazilla_oid').append('<option value=' + key + '>' + value + '</option>');
                        });
                    },
                    error: function (xhr) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message + selectedCountry);
                    }
                });
            }
        });
        $("#cmdsearch").click(function () {
           // alert('Hello I am Here');
            var startdate="",enddate="",smscontentoid="",divisionoid="",regionid="",districtid="",upazillaid="";
            
            if($('#startd   ate').val()!==""){startdate = $('#startdate').val();}                                    
            if($('#enddate').val()!==""){enddate = $('#enddate').val();}                       
            if ($('#smscontentoid').children("option:selected").val() > 0) {smscontentoid = $('#smscontentoid').children("option:selected").val();}            
            if ($('#divisionoid').children("option:selected").val() > 0) {divisionoid = $('#divisionoid').children("option:selected").val();}
            if ($('#regionoid').children("option:selected").val() > 0) {regionid = $('#regionoid').children("option:selected").val();}
            if ($('#districtoid').children("option:selected").val() > 0) {districtid = $('#districtoid').children("option:selected").val();}
            if ($('#upazilla_oid').children("option:selected").val() > 0) {upazillaid = $('#upazilla_oid').children("option:selected").val();}
                         //debugger;
           
            searchcontent(startdate,enddate,smscontentoid,divisionoid,regionid,districtid,upazillaid);
        });
        function searchcontent(startdate,enddate,smscontentoid,divisionoid,regionid,districtid,upazillaid) {
             //alert(startdate+' '+enddate+' '+smscontentoid+' '+divisionoid+' '+regionid+' '+districtid+' '+upazillaid);                
        var t = 1;
           // debugger;
            $.ajax({                
                url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillsmsdesattachmentlist']); ?>'+'/'+ startdate +'/' + enddate +'/' + smscontentoid +'/' + divisionoid +'/' + regionid +'/' + districtid +'/' + upazillaid,               
                type: 'GET',
                dataType: 'json',
                data: {startdate:startdate,enddate:enddate,smscontentoid:smscontentoid,divisionoid:divisionoid,regionid:regionid,districtid:districtid,upazillaid:upazillaid},
                success: function (response) {                      
                    $('#tbldesattachment tbody').empty();
                    $.each(response, function(i){                                       
                    $("#tbldesattachment").find('tbody').append("<tr><td class='col-md-1'>" + t++ + "</td><td class='col-md-1'>" + response[i].attachDate.toString('DD/MM/YYYY') + "</td>" +
                            "<td class='col-md-2'>" + response[i].smscontent.SMSContentBodyBan + "</td>" +
                            "<td class='col-md-1'>" + response[i].division.DivisionName + "</td>" +
                            "<td class='col-md-1'>" + response[i].region.RegionName + "</td>" +
                            "<td class='col-md-1'>" + response[i].district.DistrictName + "</td>" +   
                            "<td class='col-md-1'>" + response[i].upazilla.UpazillaName + "</td>" +                               
                            "<td class='actions col-md-1'><a href='/SMSDAEEXT/smsdesattachment/view/" + response[i].desattachID + 
                            "'>View</a> <a href='/SMSDAEEXT/smsdesattachment/edit/" + response[i].desattachID + 
                            "'>Edit</a> <a href='/SMSDAEEXT/smsdesattachment/delete/" + response[i].desattachID + 
                            "'>Delete</a>" +
                            "</td>" +
                            "</tr>");
                    }); 
                    },
                            error: function (xhr) {
                            var err = JSON.parse(xhr.responseText);
                            alert(err.message );
                        }
            });
        }

    });
</script>