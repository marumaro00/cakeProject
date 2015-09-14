<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Inventory'), ['action' => 'edit', $inventory->reference_date]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inventory'), ['action' => 'delete', $inventory->reference_date], ['confirm' => __('Are you sure you want to delete # {0}?', $inventory->reference_date)]) ?> </li>
        <li><?= $this->Html->link(__('List Inventory'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inventory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Location'), ['controller' => 'Location', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Location', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Unit'), ['controller' => 'Unit', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Unit', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="inventory view large-10 medium-9 columns">
    <h2><?= h($inventory->item_id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Item') ?></h6>
            <p><?= $inventory->has('item') ? $this->Html->link($inventory->item->name, ['controller' => 'Item', 'action' => 'view', $inventory->item->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Location') ?></h6>
            <p><?= $inventory->has('location') ? $this->Html->link($inventory->location->name, ['controller' => 'Location', 'action' => 'view', $inventory->location->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Unit') ?></h6>
            <p><?= $inventory->has('unit') ? $this->Html->link($inventory->unit->name, ['controller' => 'Unit', 'action' => 'view', $inventory->unit->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($inventory->quantity) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Reference Date') ?></h6>
            <p><?= h($inventory->reference_date) ?></p>
        </div>
    </div>
</div>
