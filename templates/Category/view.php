<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->CategoryOID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->CategoryOID], ['confirm' => __('Are you sure you want to delete # {0}?', $category->CategoryOID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="category view content">
            <h3><?= h($category->CategoryOID) ?></h3>
            <table>
                <tr>
                    <th><?= __('CategoryName') ?></th>
                    <td><?= h($category->CategoryName) ?></td>
                </tr>
                <tr>
                    <th><?= __('CategoryOID') ?></th>
                    <td><?= $this->Number->format($category->CategoryOID) ?></td>
                </tr>
                <tr>
                    <th><?= __('CategoryID') ?></th>
                    <td><?= $this->Number->format($category->CategoryID) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
