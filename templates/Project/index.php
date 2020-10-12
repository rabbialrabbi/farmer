<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $project
 */
?>
<div class="project index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project') ?></h3>
    <div class="table-responsive">
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ProjectID') ?></th>
                    <th><?= $this->Paginator->sort('ProjectName') ?></th>                    
                    <th><?= _('Upazilla Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($project as $project): ?>
                <tr>                   
                    <td><?= $this->Number->format($project->ProjectOID) ?></td>
                    <td><?= h($project->ProjectName) ?></td>                    
                     <td><?= h($project->upazilla->upazillaName) ?></td>                              
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->ProjectOID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->ProjectOID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->ProjectOID],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $project->ProjectOID)]) ?>
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
