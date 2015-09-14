<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Admin Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Admin'), ['controller' => 'Admin', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admin', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="adminImage index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('admin_id') ?></th>
            <th><?= $this->Paginator->sort('file_directory') ?></th>
            <th><?= $this->Paginator->sort('file_size') ?></th>
            <th><?= $this->Paginator->sort('file_path') ?></th>
            <th><?= $this->Paginator->sort('file_name') ?></th>
            <th><?= $this->Paginator->sort('file_type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($adminImage as $adminImage): ?>
        <tr>
            <td><?= $this->Number->format($adminImage->id) ?></td>
            <td>
                <?= $adminImage->has('admin') ? $this->Html->link($adminImage->admin->id, ['controller' => 'Admin', 'action' => 'view', $adminImage->admin->id]) : '' ?>
            </td>
            <td><?= h($adminImage->file_directory) ?></td>
            <td><?= h($adminImage->file_size) ?></td>
            <td><?= h($adminImage->file_path) ?></td>
            <td><?= h($adminImage->file_name) ?></td>
            <td><?= h($adminImage->file_type) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $adminImage->admin_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adminImage->admin_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adminImage->admin_id], ['confirm' => __('Are you sure you want to delete # {0}?', $adminImage->admin_id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
