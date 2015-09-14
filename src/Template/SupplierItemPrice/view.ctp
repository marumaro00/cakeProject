<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Supplier Item Price'), ['action' => 'edit', $supplierItemPrice->item_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Supplier Item Price'), ['action' => 'delete', $supplierItemPrice->item_id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItemPrice->item_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Supplier Item Price'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier Item Price'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supplier'), ['controller' => 'Supplier', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Supplier', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="supplierItemPrice view large-10 medium-9 columns">
    <h2><?= h($supplierItemPrice->item_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $supplierItemPrice->has('item') ? $this->Html->link($supplierItemPrice->item->code, ['controller' => 'Item', 'action' => 'view', $supplierItemPrice->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Supplier') ?></h6>
            <p><?= $supplierItemPrice->has('supplier') ? $this->Html->link($supplierItemPrice->supplier->name, ['controller' => 'Supplier', 'action' => 'view', $supplierItemPrice->supplier->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Price') ?></h6>
            <p><?= $this->Number->format($supplierItemPrice->price) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Reference Date') ?></h6>
            <p><?= h($supplierItemPrice->reference_date) ?></p>
        </div>
    </div>
</div>
