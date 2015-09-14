<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $supplierItemPrice->item_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $supplierItemPrice->item_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Supplier Item Price'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item'), ['controller' => 'Item', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Item', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supplier'), ['controller' => 'Supplier', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Supplier', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="supplierItemPrice form large-10 medium-9 columns">
    <?= $this->Form->create($supplierItemPrice) ?>
    <fieldset>
        <legend><?= __('Edit Supplier Item Price') ?></legend>
        <?php
            echo $this->Form->input('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
