<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adminImage->admin_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adminImage->admin_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Admin Image'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Admin'), ['controller' => 'Admin', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Admin'), ['controller' => 'Admin', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="adminImage form large-10 medium-9 columns">
    <?= $this->Form->create($adminImage) ?>
    <fieldset>
        <legend><?= __('Edit Admin Image') ?></legend>
        <?php
            echo $this->Form->input('file_directory');
            echo $this->Form->input('file_size');
            echo $this->Form->input('file_path');
            echo $this->Form->input('file_name');
            echo $this->Form->input('file_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
