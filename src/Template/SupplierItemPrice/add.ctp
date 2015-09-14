<div class="supplierItemPrice form large-10 medium-9 columns">
    <?= $this->Form->create($supplierItemPrice) ?>
    <fieldset>
        <legend><?= __('Add Supplier Item Price') ?></legend>
        <?php
			echo $this->Form->input('supplier_id',
					['type'=>'select',
					'options' => $supplier]);
			echo $this->Form->input('item_id',
					['type'=>'select',
					'options' => $item]);
            echo $this->Form->input('price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
