<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Supplier Item Price'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier'), ['controller' => 'Supplier', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Supplier', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="supplierItemPrice index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('supplier_id') ?></th>
            <th><?= $this->Paginator->sort('reference_date') ?></th>
            <th><?= $this->Paginator->sort('price') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($supplierItemPrice as $supplierItemPrice): ?>
        <tr>
            <td>
                <?= $supplierItemPrice->has('item') ? $this->Html->link($supplierItemPrice->item->code, ['controller' => 'Item', 'action' => 'view', $supplierItemPrice->item->id]) : '' ?>
            </td>
            <td>
                <?= $supplierItemPrice->has('supplier') ? $this->Html->link($supplierItemPrice->supplier->name, ['controller' => 'Supplier', 'action' => 'view', $supplierItemPrice->supplier->id]) : '' ?>
            </td>
            <td><?= h($supplierItemPrice->reference_date) ?></td>
            <td><?= $this->Number->format($supplierItemPrice->price) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $supplierItemPrice->item_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierItemPrice->item_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierItemPrice->item_id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItemPrice->item_id)]) ?>
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
