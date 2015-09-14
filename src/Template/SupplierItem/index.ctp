<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Supplier Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier'), ['controller' => 'Supplier', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Supplier', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="supplierItem index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('supplier_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($supplierItem as $supplierItem): ?>
        <tr>
            <td>
                <?= $supplierItem->has('supplier') ? $this->Html->link($supplierItem->supplier->name, ['controller' => 'Supplier', 'action' => 'view', $supplierItem->supplier->id]) : '' ?>
            </td>
            <td>
                <?= $supplierItem->has('item') ? $this->Html->link($supplierItem->item->name, ['controller' => 'Item', 'action' => 'view', $supplierItem->item->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($supplierItem->status) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $supplierItem->supplier_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierItem->supplier_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierItem->supplier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItem->supplier_id)]) ?>
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
