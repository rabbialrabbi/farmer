<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmerapi[]|\Cake\Collection\CollectionInterface $farmerapi
 */
use Cake\Routing\Router;

//echo $this->html->css('ui.jqgrid');
//echo $this->html->css('jquery-ui.min');
//echo $this->Html->script('jquery-3.1.0.min');
//echo $this->Html->script('jquery-ui.min');
//echo $this->Html->script('grid.locale-en');
//echo $this->Html->script('jquery.jqGrid.min');
//echo $this->Html->script('jquery.jqGrid.src');
//echo $this->Html->script('jquery.jqGrid.src');


$number = 1;
?>
<div class="farmerapi index content">

    <h3><?= __('Farmer') ?></h3>
    <table class="table table-striped">
        <tr>                                 
            <td>
                <?= $this->Html->link(__('Process'), ['action' => 'processdata'], ['class' => 'btn btn-info']) ?>
                <?= $this->Html->link(__('New Farmer'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </td>
        </tr>
    </table>
    <table class="table bg-warning table-responsive table-bordered table-condensed">      
        <tr>
            <td><?= __('Division') ?> </td>
            <td><?=
                $this->Form->input('Divisionoid', ['type' => 'select', 'options' => $divisionlist,
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
            <td> 
                <?= $this->Form->button('Search', ['id' => 'cmdsearch', 'type' => 'button', 'class' => 'btn btn-success  btn-sm btn-block']); ?>
            </td>
        </tr>
    </table>

    <!--    <div class="col-md-9">
            <button id="append" type="button" class="btn btn-default">Append</button>
            <button id="clear" type="button" class="btn btn-default">Clear</button>
            <button id="removeSelected" type="button" class="btn btn-default">Remove Selected</button>
            <button id="destroy" type="button" class="btn btn-default">Destroy</button>
            <button id="init" type="button" class="btn btn-default">Init</button>
            <button id="clearSearch" type="button" class="btn btn-default">Clear Search</button>
            <button id="clearSort" type="button" class="btn btn-default">Clear Sort</button>
            <button id="getCurrentPage" type="button" class="btn btn-default">Current Page Index</button>
            <button id="getRowCount" type="button" class="btn btn-default">Row Count</button>
            <button id="getTotalRowCount" type="button" class="btn btn-default">Total Row Count</button>
            <button id="getTotalPageCount" type="button" class="btn btn-default">Total Page Count</button>
            <button id="getSearchPhrase" type="button" class="btn btn-default">Search Phrase</button>
            <button id="getSortDictionary" type="button" class="btn btn-default">Sort Dictionary</button>
            <button id="getSelectedRows" type="button" class="btn btn-default">Selected Rows</button>
            div class="table-responsive"
            <table id="grid" class="table table-condensed table-hover table-striped" data-selection="true" data-multi-select="true" data-row-select="true" data-keep-selection="true">
                <thead>
                    <tr>
                        <th data-column-id="id" data-identifier="true" data-type="numeric" data-align="right" data-width="40">ID</th>
                        <th data-column-id="sender" data-order="asc" data-align="center" data-header-align="center" data-width="75%">Sender</th>
                        <th data-column-id="received" data-css-class="cell" data-header-css-class="column" data-filterable="true">Received</th>
                        <th data-column-id="link" data-formatter="link" data-sortable="false" data-width="75px">Link</th>
                        <th data-column-id="status" data-type="numeric" data-visible="false">Status</th>
                        <th data-column-id="hidden" data-visible="false" data-visible-in-selection="false">Hidden</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>me@rafaelstaib.com</td>
                        <td>11.12.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>me@rafaelstaib.com</td>
                        <td>12.12.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>me@rafaelstaib.com</td>
                        <td>10.12.2014</td>
                        <td>Link</td>
                        <td>2</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>mo@rafaelstaib.com</td>
                        <td>12.08.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ma@rafaelstaib.com</td>
                        <td>12.06.2014</td>
                        <td>Link</td>
                        <td>3</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>me@rafaelstaib.com</td>
                        <td>12.12.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>ma@rafaelstaib.com</td>
                        <td>12.11.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>mo@rafaelstaib.com</td>
                        <td>15.12.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>me@rafaelstaib.com</td>
                        <td>24.12.2014</td>
                        <td>Link</td>
                        <td>0</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>ma@rafaelstaib.com</td>
                        <td>14.12.2014</td>
                        <td>Link</td>
                        <td>1</td>
                        <td>Hidden value 1</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>mo@rafaelstaib.com</td>
                        <td>12.12.2014</td>
                        <td>Link</td>
                        <td>999</td>
                        <td>Hidden value 1</td>
                    </tr>
                </tbody>
            </table>
            /div
        </div>-->



</div>
<div style="width: 500px">
    <table id="list" class="table table-responsive"></table>
    <div id="pager"></div>
</div>

<!--<link rel="stylesheet" type="text/css" href="webroot/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="webroot/css/ui.jqgrid.css" />

<script type="text/javascript" src="webroot/js/i18n/grid.locale-en.js"></script>
<script type="text/javascript" src="webroot/js/jquery.js"></script>
<script type="text/javascript" src="webroot/js/grid.base.js"></script>
<script type="text/javascript" src="webroot/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="webroot/js/jquery.jqGrid.min.js"></script>
<script type="text/javascript" src="webroot/js/jquery.jqGrid.src.js"></script>

<script type="text/javascript" src="webroot/js/grid.common.js"></script>
<script type="text/javascript" src="webroot/js/grid.formedit.js"></script>
<script type="text/javascript" src="webroot/js/grid.inlinedit.js"></script>
<script type="text/javascript" src="webroot/js/grid.custom.js"></script>
<script type="text/javascript" src="webroot/js/jquery.fmatter.js"></script>
<script type="text/javascript" src="webroot/js/jquery.searchFilter.js"></script>
<script type="text/javascript" src="webroot/js/grid.jqueryui.js"></script>-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js"></script>
<style>
    html, body { font-size: 75%; }
    .ui-jqgrid .ui-jqgrid-bdiv .myAltRowClass {
        background-color: #DCFFFF;
        background-image: none;
    }
</style>
<script type="text/javascript">


    $(document).ready(function () {
        var tdd;
        // debugger;
        tdd = filljqgrid();
        $('#divisionoid').change(function () {
            debugger;
            if ($(this).children("option:selected").val() > 0) {
                var selectedCountry = $(this).children("option:selected").val();
                $.ajax({
                    //url: '/SMSDAEEXT/farmerapi/fillregion' + '/' + selectedCountry,
                    url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'fillregion']); ?>' + '/' + selectedCountry,
                    //url: '/SMSDAEEXT/farmerapi/fillregion' + '/' + selectedCountry,                   
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

                    url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'filldistrict']); ?>' + '/' + selectedCountry,
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
                    url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'fillupazilla']); ?>' + '/' + selectedCountry,
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
            var divisionoid = "", regionid = "", districtid = "", upazillaid = "";
            if ($('#divisionoid').children("option:selected").val() > 0) {
                divisionoid = $('#divisionoid').children("option:selected").val();
            }
            if ($('#regionoid').children("option:selected").val() > 0) {
                regionid = $('#regionoid').children("option:selected").val();
            }
            if ($('#districtoid').children("option:selected").val() > 0) {
                districtid = $('#districtoid').children("option:selected").val();
            }
            if ($('#upazilla_oid').children("option:selected").val() > 0) {
                upazillaid = $('#upazilla_oid').children("option:selected").val();
            }
            // debugger;

            searchcontent(divisionoid, regionid, districtid, upazillaid);
            //searchcontent(1,3,districtid,upazillaid);
        });
        function searchcontent(divisionoid, regionid, districtid, upazillaid) {
            //alert(startdate+' '+enddate+' '+smscontentoid+' '+divisionoid+' '+regionid+' '+districtid+' '+upazillaid);                
            var t = 1;
            debugger;
            $('#loader').delay(5000).css('display', 'block');
            $.ajax({
                url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'fillfarmerlist']); ?>' + '/' + divisionoid + '/' + regionid + '/' + districtid + '/' + upazillaid,
                type: 'GET',
                dataType: 'json',
                data: {divisionoid: divisionoid, regionid: regionid, districtid: districtid, upazillaid: upazillaid},
                success: function (response) {
                    $('#loader').css('display', 'none');
                    debugger;
                    $('#tblfarmerlist tbody').empty();
                    $.each(response, function (i) {
                        $("#tblfarmerlist").find('tbody').append("<tr><td class='col-md-1'>" + t++ + "</td><td class='col-md-1'>" + response[i].farmer_name + "</td>" +
                                "<td class='col-md-2'>" + response[i].phone + "</td>" +
                                "<td class='col-md-1'>" + response[i].district_name + "</td>" +
                                "<td class='col-md-1'>" + response[i].upazila_name + "</td>" +
                                "<td class='col-md-1'>" + response[i].union_name + "</td>" +
                                "<td class='col-md-1'>" + response[i].project_name + "</td>" +
                                "<td class='col-md-1'>" + response[i].group_name + "</td>" +
                                "<td class='actions col-md-1'><a href='<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'view']); ?>'" + '"/"' + response[i].OID +
                                ">View</a> <a href='<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'edit']); ?>'" + '' / '' + response[i].OID +
                                ">Edit</a> <a href='<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'delete']); ?>'" + "/" + response[i].OID +
                                "'>Delete</a>" +
                                "</td>" +
                                "</tr>");
                    });
                },
                error: function (xhr) {
                    var err = JSON.parse(xhr.responseText);
                    alert(err.message);
                }
            });
        }
        //Here we fill the JQ Grid
        function filljqgrid() {

            var ttt;
            var curId = 0;
            $('#list').jqGrid({
                url: 'farmerapi/adminshowgridbackup',
                datatype: 'json',
                mtype: 'GET',
                colNames: ['oid', 'farmer_name', 'phone', 'district_name', 'upazila_name', 'union_name', 'group_name', 'project_name'],
                colModel: [
                    {name: 'oid', index: 'oid', width: 20},
                    {name: 'farmer_name', index: 'farmer_name', width: 90},
                    {name: 'phone', index: 'phone', width: 90},
                    {name: 'district_name', index: 'district_name', width: 90},
                    {name: 'upazila_name', index: 'upazila_name', width: 90},
                    {name: 'union_name', index: 'union_name', width: 90},
                    {name: 'group_name', index: 'group_name', width: 90},
                    {name: 'project_name', index: 'project_name', width: 90},
                ],
                jsonReader: {
                    root: 'rows',
                    id: 'OID',
                    repeatitems: true,
                    page: function (obj) {
                        return 1;
                    },
                    total: function (obj) {
                        return 1;
                    },
                    records: function (obj) {
                        return obj.rows.length;
                    },
                },
                guiStyle: "bootstrap",
                iconSet: "fontAwesome",
                height: "100%",
                width: "1000px",
                pager: '#pager',
                rowNum: 25,
                rowList: [25, 50, 100],
                sortname: 'OID',
                sortorder: 'asc',
                viewrecords: true,
                caption: 'Data',
                altrows: true,

                searching: {
                    closeAfterSearch: true,
                    closeAfterReset: true,
                    closeOnEscape: true,
                    searchOnEnter: true,
                    multipleSearch: true,
                    multipleGroup: true,
                    showQuery: true
                }                
            });
            //debugger;
            $('#list').navGrid('#pager', {edit: true, add: true, del: true});
        }

    });
</script>