<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontent $smscontent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">

            <?= $this->Html->link(__('List Advisory content'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <legend></legend>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smscontent form content">
            <?= $this->Form->create($smscontent) ?>
            <fieldset>
                <legend><?= __('Add Advisory Content') ?></legend>

                <table class="table table-striped table-condensed table-bordered">
                    <tr>
                        <td class="col-md-1"><?= __('Year') ?></td>

                        <td><?= $this->Form->input('CYearNo', ['type' => 'text','value'=>$CYearNo]); ?></td>

                        <td class="col-md-1"><?= __('Month') ?></td>
                        <td><?= $this->Form->input('MonthName', ['type' => 'text','value'=>$MonthName]); ?>
                            <?= $this->Form->input('MonthID', ['type' => 'hidden','value'=>$MonthID]); ?>
                        </td>

                        <td class="col-md-1"><?= __('SL No') ?></td>
                        <td><?= $this->Form->input('SMSSlNo', ['type' => 'text','value'=>$SMSSlNo]); ?> </td>

                        <td class="col-md-1"><?= __('SMS No') ?></td>
                        <td><?= $this->Form->input('SMSNo', ['type' => 'text','value'=>$SMSNo]); ?></td>
                    </tr>
                    <tr>
                        <td>Crops</td>
                        <td colspan="3">
                            <?=$this->Form->input('cropsOID', ['type' => 'select', 'options' => $cropslist,
                                'empty' => '-Select Crops-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                            ?>
                        </td>
                        <td>Advisory Type</td>
                        <td colspan="3"><?=
                            $this->Form->input('SMSTypeID', ['type' => 'select', 'options' => $smstypelist,
                                'empty' => '-Select Advisory Type-', 'class' => 'form-control', 'templateVars' => ['class' => 'col-md-4']]);
                            ?></td>
                    </tr>
                    <tr>
                        <td><?= __('Heading(Eng)') ?></td>
                        <td colspan="3"><?= $this->Form->input('SMSHeadingEng', ['class' => 'form-control']); ?></td>
                        <td><?= __('Heading(Bng)') ?></td>
                        <td colspan="3"><?= $this->Form->input('SMSHeadingBan', ['class' => 'form-control']); ?></td>
                    </tr>

                    <tr>
                        <td><?= __('Advisory Content (Eng)') ?></td>
                        <td colspan="3"><?= $this->Form->textarea('SMSContentBodyEng',  ['class' => 'form-control']); ?></td>
                        <td><?= __('Advisory Content (Bng)') ?></td>
                        <td colspan="3"><?= $this->Form->textarea('SMSContentBodyBan',  ['class' => 'form-control']); ?></td>
                    </tr>
                    <tr>
                        <td><?= __('Note') ?></td>
                        <td colspan="7"><?= $this->Form->textarea('CNote',  ['class' => 'form-control']); ?></td>
                    </tr>
                </table>
            </fieldset>
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
