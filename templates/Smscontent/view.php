<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Smscontent $smscontent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $smscontent->SmsContentOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Smscontent'), ['action' => 'delete', $smscontent->SmsContentOID], ['confirm' => __('Are you sure you want to delete # {0}?', $smscontent->SmsContentOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Smscontent'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Smscontent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="smscontent view content">
            <h3><?= h($smscontent->SmsContentOID) ?></h3>
            <table>
                 <tr>
                    <th><?= __('SMSNo') ?></th>
                    <td><?= $this->Number->format($smscontent->SMSNo) ?></td>
                </tr>
                <tr>
                    <th><?= __('SMSContentBody') ?></th>
                    <td><?= h($smscontent->SMSContentBody) ?></td>
                </tr>
                <tr>
                    <th><?= __('CNote') ?></th>
                    <td><?= h($smscontent->CNote) ?></td>
                </tr>                                              
            </table>
        </div>
    </div>
</div>
