<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cyearen $cyearen
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Year'), ['action' => 'edit', $cyearen->CyearOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Year'), ['action' => 'delete', $cyearen->CyearOID], ['confirm' => __('Are you sure you want to delete # {0}?', $cyearen->CyearOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Year'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Year'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cyearen view content">
            <h3><?= h($cyearen->CyearOID) ?></h3>
            <table class="table table-striped table-condensed">
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($cyearen->CyearOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sl no') ?></th>
                    <td><?= $this->Number->format($cyearen->Slno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($cyearen->Cyear) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
