<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('List %s', __('Login Accounts'));?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
		</p>

		<table class="table">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('login_id');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('login_name');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('login_auth');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('create_date');?></th>
				<th><?php echo $this->BootstrapPaginator->sort('update_date');?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
		<?php foreach ($loginAccounts as $loginAccount): ?>
			<tr>
				<td><?php echo h($loginAccount['LoginAccount']['login_id']); ?>&nbsp;</td>
				<td><?php echo h($loginAccount['LoginAccount']['login_name']); ?>&nbsp;</td>
				<td><?php echo h($loginAccount['LoginAccount']['login_auth']); ?>&nbsp;</td>
				<td><?php echo h($loginAccount['LoginAccount']['create_date']); ?>&nbsp;</td>
				<td><?php echo h($loginAccount['LoginAccount']['update_date']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('action' => 'view', $loginAccount['LoginAccount']['login_id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $loginAccount['LoginAccount']['login_id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $loginAccount['LoginAccount']['login_id']), null, __('Are you sure you want to delete # %s?', $loginAccount['LoginAccount']['login_id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Login Account')), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>