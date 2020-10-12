<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontent[]|\Cake\Collection\CollectionInterface $smscontent
 */
$number = 1;

?>
<?php

use Cake\Routing\Router; ?>
<div class="smscontent index content">
    <?= $this->Html->link(__('New Advisory Content'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Advisory content') ?></h3>

    <table class="table bg-warning table-responsive table-condensed table-bordered">
        <tr>           
            <td>Type</td>
            <td><?=
                $this->Form->input('SMSTypeID', ['type' => 'select', 'options' => $smstypelist,
                    'id' => 'smstypeid', 'empty' => '-Select Advisory Type-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                ?></td>

            <td>Status</td>
            <td><?=
                $this->Form->input('SuggestionTypeID', ['type' => 'select', 'options' => $smsstatuslist,
                    'id' => 'suggestiontypeid', 'empty' => '-Select Suggestion Status-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                ?></td>
            <td></td>
            <td> <?= $this->Form->button('Search', ['id' => 'cmdsearch', 'type' => 'button', 'class' => 'btn btn-default']) ?></td>
        </tr>
    </table>


    <div class="table-responsive">
        <table id="tblsmscontent" class="table table-striped table-condensed table-bordered">
            <thead>
                <tr>
                    <th><?= __('Advisory ID') ?></th>                    
                    <th><?= __('Advisory No') ?></th>                    
                    <th><?= __('Advisory BODY (Ban)') ?></th> 
                    <th><?= __('Advisory BODY (Eng)') ?></th> 
                    <th><?= __('Type') ?></th> 
                    <th><?= __('Status') ?></th>                     
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($smscontent as $smscontent): ?>
                    <tr>                    
                        <td class="col-md-1"><?= $this->Number->format($number++) ?></td>
                        <td class="col-md-1"><?= $this->Number->format($smscontent->SMSNo) ?></td>
                        <td class="col-md-4"><?= h($smscontent->SMSContentBodyBan) ?></td>                    
                        <td class="col-md-4"><?= h($smscontent->SMSContentBodyEng) ?></td>                    
                        <td class="col-md-4"><?= h($smscontent->codelistdetail_b->ListItemNameEng) ?></td>     
                        <td class="col-md-4"><?= h($smscontent->codelistdetail_a->ListItemNameEng) ?></td>     

                        <td class="actions">    
                            <?= $this->Html->link(__('View'), ['action' => 'view', $smscontent->SmsContentOID]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smscontent->SmsContentOID]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $smscontent->SmsContentOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smscontent->SmsContentOID)]) ?>
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
        $("#cmdsearch").click(function () {
            var smstypeid="",suggestiontypeid="";
            if ($('#smstypeid').children("option:selected").val() > 0) {                            
                   smstypeid = $('#smstypeid').children("option:selected").val();
                    
               }
               if ($('#suggestiontypeid').children("option:selected").val() > 0) {                            
                   suggestiontypeid = $('#suggestiontypeid').children("option:selected").val();
                   // alert(suggestiontypeid);
               }
             
            //debugger;
            searchcontent(smstypeid,suggestiontypeid);
        });
        function searchcontent(smstypeid,suggestiontypeid) {
            //alert(smstypeid+' '+suggestiontypeid);
        var t = 1;
            debugger;
            $.ajax({
               url: '<?php echo Router::url(['controller'=>'smscontent','action'=>'searchcontent']); ?>'+'/'+ smstypeid +'/' + suggestiontypeid,                                  
                type: 'GET',
                dataType: 'json',
                data: {smstypeid:smstypeid,suggestiontypeid:suggestiontypeid},
                success: function (response) {
                   // alert(response);
                    debugger;
                    $('#tblsmscontent tbody').empty();
                    $.each(response, function(i){                                       
                    $("#tblsmscontent").find('tbody').append("<tr><td class='col-md-1'>" + t++ + "</td><td class='col-md-1'>" + response[i].SMSNo + "</td>" +
                            "<td class='col-md-4'>" + response[i].SMSContentBodyBan + "</td>" +
                            "<td class='col-md-4'>" + response[i].SMSContentBodyEng + "</td>" +
                            "<td class='col-md-4'>" + response[i].codelistdetail_b.ListItemNameEng + "</td>" +
                            "<td class='col-md-4'>" + response[i].codelistdetail_a.ListItemNameEng + "</td>" +   
                            "<td class='actions'><a href='/SMSDAEEXT/smscontent/view/" + response[i].SmsContentOID + 
                            "'>View</a> <a href='/SMSDAEEXT/smscontent/edit/" + response[i].SmsContentOID + 
                            "'>Edit</a> <a href='/SMSDAEEXT/smscontent/delete/" + response[i].SmsContentOID + 
                            "'>Delete</a>" +
                            "</td>" +
                            "</tr>");
                    }); 
                    },
                            error: function (xhr) {
                            var err = JSON.parse(xhr.responseText);
                            alert(err.message + smstypeid);
                        }
            });
        }

    });
</script>