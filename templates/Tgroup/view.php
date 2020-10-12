<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tgroup $tgroup
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $tgroup->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $tgroup->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $tgroup->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Group'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Group'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tgroup view content">
            <h3><?= h($tgroup->OID) ?></h3>
            <table>
                <tr>
                    <th><?= __('OID') ?></th>
                    <td><?= $this->Number->format($tgroup->OID) ?></td>
                </tr>
                <tr>
                    <th><?= __('GroupName') ?></th>
                    <td><?= h($tgroup->GroupName) ?></td>
                </tr>
                <tr>
                    <th><?= __('GroupID') ?></th>
                    <td><?= $this->Number->format($tgroup->GroupID) ?></td>
                </tr>              
            </table>
        </div>
    </div>
</div>
