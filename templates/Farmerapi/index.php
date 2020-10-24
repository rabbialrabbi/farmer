<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Farmerapi[]|\Cake\Collection\CollectionInterface $farmerapi
 */
use Cake\Routing\Router;

$number = 1;
?>
<?php echo $this->Html->css('bootstrap'); ?>
<?php echo $this->Html->css('font-awesome'); ?>
<?php echo $this->Html->css('/js/dataTables/dataTables.bootstrap'); ?>
<?php echo $this->Html->css('style'); ?>


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
    <form action="" id="farmerSearchForm">
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
    </form>

    <div class="table-responsive">
<!--        <table id="tblfarmerlist" class="table table-striped table-condensed table-bordered" id="dataTables-example">-->
        <table  class="table table-striped table-condensed table-bordered" id="dataTables-example">
            <thead class="thead-dark">
                <tr>
                    <th><?= __('ID') ?></th>
                    <th><?= __('Farmer Name') ?></th>
                    <th><?= __('Mobile No') ?></th>
                    <th><?= __('District Name') ?></th>
                    <th><?= __('Upazilla Name') ?></th>
                    <th><?= __('Union Name') ?></th>
                    <th><?= __('Project Name') ?></th>
                    <th><?= __('Group Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($farmerapi as $farmerapi): ?>
                    <tr>
                        <td><?= $this->Number->format($number++) ?></td>
                        <td><?= h($farmerapi->farmer_name) ?></td>
                        <td><?= h($farmerapi->phone) ?></td>
                        <td><?= h($farmerapi->district_name) ?></td>
                        <td><?= h($farmerapi->upazila_name) ?></td>
                        <td><?= h($farmerapi->union_name) ?></td>
                        <td><?= h($farmerapi->project_name) ?></td>
                        <td><?= h($farmerapi->group_name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $farmerapi->OID]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $farmerapi->OID]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $farmerapi->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $farmerapi->OID)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <table>
        <tr>
            <td>
                <?php
                $departments='';
                echo $this->Form->control('search', ['type' => 'select', 'options' => $departments, 'default' => 'your value']);
                ?>
            </td>
        </tr>

    </table>
    <div class="spinner-border" role="status" id="loader">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php echo $this->Html->script('jquery-3.1.0'); ?>
<?php echo $this->Html->script('bootstrap'); ?>
<?php //echo $this->Html->script('dataTables/jquery.dataTables'); ?>
<?php //echo $this->Html->script('dataTables/dataTables.bootstrap'); ?>
<?php echo $this->Html->script('custom'); ?>

<script type="text/javascript">
    $(document).ready(function () {

        $('#divisionoid').on('change',function (event) {
            let selectedCountry = event.target.options[event.target.selectedIndex].value;
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
        })
        $('#regionoid').on('change',function (event) {
            let selectedCountry = event.target.options[event.target.selectedIndex].value;
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
        })

        $('#districtoid').on('change',function (event) {
            let selectedCountry = event.target.options[event.target.selectedIndex].value;
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
        });

        $("#cmdsearch").on('click',function () {

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

            searchcontent(divisionoid, regionid, districtid, upazillaid);
            //searchcontent(1,3,districtid,upazillaid);
        });

        $('#dataTables-example').DataTable({

            //  draw: true
            //  processing: true,
            //   serverSide: false
//        ajax:[{url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'fillfarmerlistduplicate']); ?>',
//              type: 'GET',
//              dataType: 'json',
//              data: [{function (d) {
//              return JSON.stringify(d);
//              }}]
//          }],
//        deferLoading: 600
        });
        var table = $('#dataTables-example').DataTable();
        //table.column(1).search('director').column(2).search('london').draw();
        var colldx;
      // table.columns().flatten().each(function (colIdx) {
       var select = $('#districtoid')
//                    .appendTo(
//                            table.column(1).footer()
//                            )
                    .on('change', function () {
                        alert($(this).val());
                        table
                                .column(3)
                                .search($(this).val())
                                .draw();
                    });

            // Get the search data for the first column and add to the select list

//            table
//                    .column(3)
//                    .cache('search')
//                    .sort()
//                    .unique()
//                    .each(function (d) {
//                       //  alert(d);
//                        select.append($('<option value="' + d + '">' + d + '</option>'));
//                    });
            var select = $('#upazilla_oid')
//                    .appendTo(
//                            table.column(1).footer()
//                            )
                    .on('change', function () {
                        table
                                .column(4)
                                .search($(this).val())
                                .draw();
                    });

            // Get the search data for the first column and add to the select list

            table
                    .column(4)
                    .cache('search')
                    .sort()
                    .unique()
                    .each(function (d) {
                      // alert(d);
                        select.append($('<option value="' + d + '">' + d + '</option>'));
                    });

      //  });
      //  $('#divisionoid').change(function () {
      //
      //      if ($(this).children("option:selected").val() > 0) {
      //          var selectedCountry = $(this).children("option:selected").val();
      //          $.ajax({
      //              //url: '/SMSDAEEXT/farmerapi/fillregion' + '/' + selectedCountry,
      //              url: '<?php //echo Router::url(['controller' => 'farmerapi', 'action' => 'fillregion']); ?>//' + '/' + selectedCountry,
      //              //url: '/SMSDAEEXT/farmerapi/fillregion' + '/' + selectedCountry,
      //              type: 'GET',
      //              dataType: 'json',
      //              data: {divisionid: selectedCountry},
      //              success: function (data) {
      //                  $('#regionoid').find('option').remove();
      //                  $('#regionoid').append($('<option>').text("-সিলেক্ট রিজিওন-"));
      //                  $.each(data, function (key, value) {
      //                      $('#regionoid').append('<option value=' + key + '>' + value + '</option>');
      //                  });
      //              },
      //              error: function (xhr) {
      //                  var err = JSON.parse(xhr.responseText);
      //                  alert(err.message + selectedCountry);
      //              }
      //          });
      //      }
      //  });
        //District Information
        //$("#regionoid").change(function () {
        //    if ($(this).children("option:selected").val() > 0) {
        //        var selectedCountry = $(this).children("option:selected").val();
        //        $.ajax({
        //
        //            url: '<?php //echo Router::url(['controller' => 'farmerapi', 'action' => 'filldistrict']); ?>//' + '/' + selectedCountry,
        //            type: 'GET',
        //            dataType: 'json',
        //            data: {regionsoid: selectedCountry},
        //            success: function (data) {
        //                $('#districtoid').find('option').remove();
        //                $('#districtoid').append($('<option>').text("-সিলেক্ট জেলা-"));
        //                $.each(data, function (key, value) {
        //                    $('#districtoid').append('<option value=' + value + '>' + value + '</option>');
        //                });
        //            },
        //            error: function (xhr) {
        //                var err = JSON.parse(xhr.responseText);
        //                alert(err.message + selectedCountry);
        //            }
        //        });
        //    }
        //});
        //Upazilla Information
        //$("#districtoid").change(function () {
        //    if ($(this).children("option:selected").val() > 0) {
        //        var selectedCountry = $(this).children("option:selected").val();
        //        $.ajax({
        //            url: '<?php //echo Router::url(['controller' => 'farmerapi', 'action' => 'fillupazilla']); ?>//' + '/' + selectedCountry,
        //            type: 'GET',
        //            dataType: 'json',
        //            data: {disrictoid: selectedCountry},
        //            success: function (data) {
        //                $('#upazilla_oid').find('option').remove();
        //                $('#upazilla_oid').append($('<option>').text("-সিলেক্ট উপজেলা-"));
        //                $.each(data, function (key, value) {
        //                    $('#upazilla_oid').append('<option value=' + key + '>' + value + '</option>');
        //                });
        //            },
        //            error: function (xhr) {
        //                var err = JSON.parse(xhr.responseText);
        //                alert(err.message + selectedCountry);
        //            }
        //        });
        //    }
        //});

        function searchcontent(divisionoid, regionid, districtid, upazillaid) {
            //alert(startdate+' '+enddate+' '+smscontentoid+' '+divisionoid+' '+regionid+' '+districtid+' '+upazillaid);
            var t = 1;
            // debugger;
            $('#loader').delay(5000).css('display', 'block');
            $.ajax({
                url: '<?php echo Router::url(['controller' => 'farmerapi', 'action' => 'fillfarmerlist']); ?>' + '/' + divisionoid + '/' + regionid + '/' + districtid + '/' + upazillaid,
                type: 'GET',
                dataType: 'json',
                data: {divisionoid: divisionoid, regionid: regionid, districtid: districtid, upazillaid: upazillaid},
                success: function (response) {
                    $('#loader').css('display', 'none');
                    // debugger;
                    $('#dataTables-example tbody').empty();
                    $.each(response, function (i) {
                        $("#dataTables-example").find('tbody').append("<tr><td class='col-md-1'>" + t++ + "</td><td class='col-md-1'>" + response[i].farmer_name + "</td>" +
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


    });
</script>


