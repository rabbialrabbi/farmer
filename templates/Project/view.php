<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->OID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->OID], ['confirm' => __('Are you sure you want to delete # {0}?', $project->OID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Project'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="project view content">
            <h3><?= h($project->OID) ?></h3>
            <table>
                <tr>
                    <th><?= __('ProjectName') ?></th>
                    <td><?= h($project->ProjectName) ?></td>
                </tr>
                <tr>
                    <th><?= __('OID') ?></th>
                    <td><?= $this->Number->format($project->OID) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectID') ?></th>
                    <td><?= $this->Number->format($project->ProjectID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UpazillaOID') ?></th>
                    <td><?= $this->Number->format($project->UpazillaOID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
