<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smsdesattachment $smsdesattachment
 */
$number = 1;
use Cake\Routing\Router;
?>
<style>
    .scrollable_panel{
        max-height: 300px;
        overflow: auto;
    }
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">            
            <?= $this->Html->link(__('Attachment List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smsdesattachment form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <!--                            Sender Infor-->
                            <div class="panel-heading">প্রাপক নির্বাচন</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <td>বিভাগ</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('divisionoid', ['type' => 'select', 'options' => $divisionlist,
                                                'empty' => '-সিলেক্ট ডিভিশন-', 'id' => 'DivisionID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>রিজিওন</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('regionoid', ['type' => 'select', 'options' => $RegionName,
                                                'empty' => '-সিলেক্ট রিজিওন-', 'id' => 'RegionOID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>জেলা</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('districtoid', ['type' => 'select', 'options' => $DistrictName,
                                                'empty' => '-সিলেক্ট জেলা-', 'id' => 'DistrictOID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>উপজেলা</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('upazillaoid', ['type' => 'select', 'options' => $UpazillaName,
                                                'empty' => '-সিলেক্ট উপজেলা-', 'id' => 'upazillaOID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>ইউনিয়ন</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('unionoid', ['type' => 'select', 'options' => $unionName,
                                                'empty' => '-সিলেক্ট ইউনিয়ন-', 'id' => 'unionOID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>                                    
                                    <tr>
                                        <td>প্রজেক্ট</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('projectid', ['type' => 'select', 'options' => $ProjectName,
                                                'empty' => '-সিলেক্ট প্রজেক্ট-', 'id' => 'projectid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>গ্রুপ</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('groupid', ['type' => 'select', 'options' => $GroupName,
                                                'empty' => '-সিলেক্ট গ্রুপ-', 'id' => 'groupid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                </table>
                            </div>                                
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">কন্টেন্ট নির্বাচন</div>
                            <div class="panel-body">
                                <table class="table table-bordered table-condensed">
                                    <tr>
                                        <td>ধরন</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('SMSTypeID', ['type' => 'select', 'options' => $smstypelist,
                                                'empty' => '-ধরন-', 'id' => 'smstypeid', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>                                   
                                    <tr>
                                        <td>পরামর্শের অবস্থা</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('SuggestionTypeID', ['type' => 'select', 'options' => $suggestiontypelist,
                                                'empty' => '-পরামর্শের অবস্থা-', 'id' => 'SuggestionTypeID', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>তারিখ হই্তে</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('fromdate', ['type' => 'date',
                                                'class' => 'form-control', 'id' => 'fromdate', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>তারিখ পর্যন্ত</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('todate', ['type' => 'date',
                                                'class' => 'form-control', 'id' => 'todate', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>প্রাপক</td><td>:</td>                                        
                                        <td><?= $this->Form->radio('smslanguage', [1 => 'বাংলা', 2 => 'ইংলিশ']); ?></td>
                                    </tr>
                                    <tr>
                                        <td>সংযূক্তির তারিখ</td><td>:</td>                                        
                                        <td><?=
                                            $this->Form->input('attachDate', ['type' => 'date',
                                                'id' => 'attachDate', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-2']]);
                                            ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6" >
                        <div class="panel panel-primary">
                            <div class="panel-heading">প্রাপকের লিষ্ট</div>
                            <div class="panel-body scrollable_panel" >
                                <table id="tblfarmerlist"  class="table table-striped table-condensed table-bordered" id="farmerlist">
                                    <thead class="thead-dark">
                                        <tr>                    
                                            <th><?= __('ID') ?></th>
                                            <th><?= __('Farmer Name') ?></th>
                                            <th><?= __('Mobile No') ?></th>
                                            <th><?= __('সিলেক্ট') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($farmerapis as $farmerapi): ?>
                                            <tr>                    
                                                <td><?= $this->Number->format($number++) ?></td>
                                                <td><?= h($farmerapi->farmer_name) ?></td>
                                                <td><?= h($farmerapi->phone) ?></td>                                                
                                                <td><?= $this->Form->control("farmeroid.{$farmerapi->OID}", ['type' => 'checkbox', 'label' => '']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">কন্টেন্ট লিষ্ট</div>
                            <div class="panel-body scrollable_panel">
                                <table class="table table-striped table-condensed table-bordered">
<!--                                    <thead>
                                        <tr>
                                            <th><?= __('সিলেক্ট') ?></th>                                                      
                                            <th><?= __('SMS BODY (Ban)') ?></th>                                            
                                        </tr>
                                    </thead>-->
                                    <tbody>
                                        <?php foreach ($smscontent as $smscontent): ?>
                                            <tr>                    
                                                <td class="col-md-6">
                                                    <?= $this->Form->input('smscontentlist', array('type' => 'radio', 'separator' => '</l><l>', 'options' => ["{$smscontent->SmsContentOID}" => "{$smscontent->SMSContentBodyBan}"])) ?> 
                                                    <!-- <?= $this->Form->radio("SmsContentOID.{$smscontent->SmsContentOID}", [0 => ''], ['class' => 'radio', 'before' => '<label>', 'after' => '</label>', 'label' => false]); ?>  -->
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <legend><?= __('Add') ?></legend>              
            </fieldset>

            <?= $this->Form->button(__('Save Attachment'), array('class' => 'btn btn-primary')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        //Region Information
        $('#DivisionID').change(function () {

            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillregion']); ?>'+'/'+ selectedCountry,                    
                    type: 'GET',
                    dataType: 'json',
                    data: {divisionid: selectedCountry},
                    success: function (data) {
                        $('#RegionOID').find('option').remove();
                        $('#RegionOID').append($('<option>').text("-সিলেক্ট রিজিওন-"));
                        $.each(data, function (key, value) {
                            $('#RegionOID').append('<option value=' + key + '>' + value + '</option>');
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
        $("#RegionOID").change(function () {
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'filldistrict']); ?>'+'/'+ selectedCountry,                                        
                    type: 'GET',
                    dataType: 'json',
                    data: {regionsoid: selectedCountry},
                    success: function (data) {
                        $('#DistrictOID').find('option').remove();
                        $('#DistrictOID').append($('<option>').text("-সিলেক্ট জেলা-"));
                        $.each(data, function (key, value) {

                            $('#DistrictOID').append('<option value=' + key + '>' + value + '</option>');
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
        $("#DistrictOID").change(function () {
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillupazilla']); ?>'+'/'+ selectedCountry,                    
                    type: 'GET',
                    dataType: 'json',
                    data: {disrictoid: selectedCountry},
                    success: function (data) {
                        $('#upazillaOID').find('option').remove();
                        $('#upazillaOID').append($('<option>').text("-সিলেক্ট উপজেলা-"));
                        $.each(data, function (key, value) {
                            $('#upazillaOID').append('<option value=' + key + '>' + value + '</option>');
                        });
                    },
                    error: function (xhr) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message + selectedCountry);
                    }
                });
            }
        });
        //union Information
        $("#upazillaOID").change(function () {
            if ($('#upazillaOID').children("option:selected").val() > 0) {
                fillUnion();
                fillfarmer();
            }
        });
        //For Project 
        $("#projectid").change(function () {
            if ($('#projectid').children("option:selected").val() > 0) {
                fillfarmer();
            }
        });
        //For group
        $("#groupid").change(function () {
            if ($('#groupid').children("option:selected").val() > 0) {
                fillfarmer();
            }
        });
        //Here we fill the Union List
        function fillUnion() {
            if ($('#upazillaOID').children("option:selected").val() > 0) {
                var selectedCountry = $('#upazillaOID').children("option:selected").val();
                $.ajax({
                    url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillunion']); ?>'+'/'+ selectedCountry,                                    
                    type: 'GET',
                    dataType: 'json',
                    data: {disrictoid: selectedCountry},
                    success: function (data) {
                        $('#unionOID').find('option').remove();
                        $('#unionOID').append($('<option>').text("-সিলেক্ট ইউনিয়ন-"));
                        $.each(data, function (key, value) {
                            $('#unionOID').append('<option value=' + key + '>' + value + '</option>');
                        });
                    },
                    error: function (xhr) {
                        var err = JSON.parse(xhr.responseText);
                        alert(err.message + selectedCountry);
                    }
                });
            }
        }
        function fillfarmer() {
            var upazillaid = "", projectid = "", groupid = "";
           debugger;
            if ($('#upazillaOID').children("option:selected").val() > 0) {
                upazillaid = $('#upazillaOID').children("option:selected").val();
            }
            if ($('#projectid').children("option:selected").val() > 0) {
                projectid = $('#projectid').children("option:selected").val();
            }
            if ($('#groupid').children("option:selected").val() > 0) {
                groupid = $('#groupid').children("option:selected").val();
            }
            fillfarmerlistbyid(upazillaid,projectid,groupid);
        }

        function fillfarmerlistbyid(upazillaid, projectid, groupid) {
            var $t = 1;
           //alert(upazillaid);
           debugger;
            $.ajax({
                url: '<?php echo Router::url(['controller'=>'smsdesattachment','action'=>'fillfarmerlist']); ?>'+'/'+ '/' + upazillaid + '/' + projectid + '/' + groupid,                
                type: 'GET',
                dataType: 'json',
                data: {upazillaid: upazillaid, projectid: projectid, groupid: groupid},
                success: function (data) {
                    // debugger;
                    // alert(data[0]['farmer']);
                    $('#tblfarmerlist tbody').empty();
                    $.each(data, function (i) {
                        // console.log("<td>" + "<input id="check1" type="checkbox" checked="checked">" + "</td>");                                     
                        $("#tblfarmerlist").find('tbody').append("<tr><td>" + $t++ + "</td><td>" + data[i].farmer_name + "</td>" +
                                "<td>" + data[i].phone + "</td>" +
                                "<td><input id=farmeroid." + data[i].OID + " name=farmeroid[" + data[i].OID + "] type='checkbox' value=1></td>" +
                                "</tr>");
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                    var err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        }
    });
</script>