<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Login Account');?></h2>
		<dl>
			<dt><?php echo __('Login Id'); ?></dt>
			<dd>
				<?php echo h($loginAccount['LoginAccount']['login_id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Login Name'); ?></dt>
			<dd>
				<?php echo h($loginAccount['LoginAccount']['login_name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Login Auth'); ?></dt>
			<dd>
				<?php echo h($loginAccount['LoginAccount']['login_auth']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Create Date'); ?></dt>
			<dd>
				<?php echo h($loginAccount['LoginAccount']['create_date']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Update Date'); ?></dt>
			<dd>
				<?php echo h($loginAccount['LoginAccount']['update_date']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Html->link(__('Edit %s', __('Login Account')), array('action' => 'edit', $loginAccount['LoginAccount']['login_id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete %s', __('Login Account')), array('action' => 'delete', $loginAccount['LoginAccount']['login_id']), null, __('Are you sure you want to delete # %s?', $loginAccount['LoginAccount']['login_id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List %s', __('Login Accounts')), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New %s', __('Login Account')), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

