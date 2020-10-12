<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Softsetting $softsetting
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Softsetting'), ['action' => 'edit', $softsetting->slno], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Softsetting'), ['action' => 'delete', $softsetting->slno], ['confirm' => __('Are you sure you want to delete # {0}?', $softsetting->slno), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Softsettings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Softsetting'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="softsettings view content">
            <h3><?= h($softsetting->slno) ?></h3>
            <table>
                 <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($softsetting->settingsdesc) ?></td>
                </tr>
                <tr>
                    <th><?= __('URL') ?></th>
                    <td><?= h($softsetting->urldesc) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($softsetting->cuserName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($softsetting->cuserpsw) ?></td>
                </tr>
                <tr>
                    <th><?= __('EME No') ?></th>
                    <td><?= h($softsetting->emeino) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slno') ?></th>
                    <td><?= $this->Number->format($softsetting->slno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($softsetting->createddate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Date') ?></th>
                    <td><?= h($softsetting->updatedate) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
