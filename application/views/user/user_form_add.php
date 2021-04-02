<section class="content-header">
    <h1>Users
        <small>Pengguna / Karyawan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Add User</h3>
			<div class="pull-right">
				<a href="<?=site_url('user')?>" class="btn btn-flat btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<?php // echo validation_errors() ?>
					<form action="" method="post" autocomplete="off">
						<div class="form-group <?=form_error('name') ? 'has-error' : null?>">
							<label for="name">Name *</label>
							<input type="text" name="name" id="name" value="<?=set_value('name')?>" class="form-control">
							<?=form_error('name')?>
						</div>
						<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
							<label for="username">Username *</label>
							<input type="text" name="username" id="username" value="<?=set_value('username')?>" class="form-control">
							<?=form_error('username')?>
						</div>
						<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
							<label for="password">Password *</label>
							<input type="password" name="password" id="password" value="<?=set_value('password')?>" class="form-control">
							<?=form_error('password')?>
						</div>
						<div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
							<label for="passconf">Repeat Confirmation *</label>
							<input type="password" name="passconf" id="passconf" value="<?=set_value('passconf')?>" class="form-control">
							<?=form_error('passconf')?>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<textarea name="address" id="address" class="form-control"><?=set_value('address')?></textarea>
						</div>
						<div class="form-group <?=form_error('level') ? 'has-error' : null?>">
							<label for="level">Level *</label>
							<select name="level" id="level" class="form-control">
								<option value="">- Pilih -</option>
								<option value="1" <?=set_value('level') == 1 ? 'selected' : null?>>Admin</option>
								<option value="2" <?=set_value('level') == 2 ? 'selected' : null?>>Kasir</option>
							</select>
							<?=form_error('level')?>
						</div>
						<div class="form-group pull-right">
							<button type="submit" name="add" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Save</button> 
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>