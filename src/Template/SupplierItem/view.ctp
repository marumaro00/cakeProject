<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Supplier Item'), ['action' => 'edit', $supplierItem->supplier_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Item'), ['action' => 'delete', $supplierItem->supplier_id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItem->supplier_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Item'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplier'), ['controller' => 'Supplier', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Supplier', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="supplierItem view large-10 medium-9 columns">
    <h2><?= h($supplierItem->supplier_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Supplier') ?></h6>
            <p><?= $supplierItem->has('supplier') ? $this->Html->link($supplierItem->supplier->name, ['controller' => 'Supplier', 'action' => 'view', $supplierItem->supplier->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $supplierItem->has('item') ? $this->Html->link($supplierItem->item->name, ['controller' => 'Item', 'action' => 'view', $supplierItem->item->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Status') ?></h6>
            <p><?= $this->Number->format($supplierItem->status) ?></p>
        </div>
    </div>
</div>
