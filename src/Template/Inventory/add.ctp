<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Inventory'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Location'), ['controller' => 'Location', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Location', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Unit'), ['controller' => 'Unit', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Unit', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="inventory form large-10 medium-9 columns">
    <?= $this->Form->create($inventory) ?>
    <fieldset>
        <legend><?= __('Add Inventory') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $item]);
            echo $this->Form->input('location_id', ['options' => $location, 'empty' => true]);
            echo $this->Form->input('quantity');
            echo $this->Form->input('unit_id', ['options' => $unit, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
