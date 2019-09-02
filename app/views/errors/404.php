<?php  
/**
 * Error 404: Page not found (404.php)
 *
 * Error page for users logged in to the CRM
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; ?>
<div class="container error404">
	
	<div class="wrapper">
		<h1>Seems like something went wrong</h1>
		<h2>Here are some of the pages you can check out:</h2>

		<ul>
			<li>
				<span><a href="<?php echo crm\Routes::url('dashboard'); ?>">Dashboard</a></span>
				<span><a href="<?php echo crm\Routes::url('invoice'); ?>">Invoice</a></span>
			</li>
			<li>
				<span><a href="<?php echo crm\Routes::url('clients'); ?>">Customers</a></span>
				<span><a href="<?php echo crm\Routes::url('proposals'); ?>">Proposals</a></span>
			</li>
			<li>
				<span><a href="<?php echo crm\Routes::url('leads'); ?>">Leads</a></span>
				<span><a href="<?php echo crm\Routes::url('expenses'); ?>">Expenses</a></span>
			</li>
			<li>
				<span><a href="<?php echo crm\Routes::url('projects'); ?>">Projects</a></span>
				<span><a href="<?php echo crm\Routes::url('staff'); ?>">Staff</a></span>
			</li>
			<li>
				<span><a href="<?php echo crm\Routes::url('tickets'); ?>">Tickets</a></span>
				<span><a href="<?php echo crm\Routes::url('tasks'); ?>">Tasks</a></span>
			</li>
		</ul>

		<h3>Or, try searching for something specific?</h3>

		<form action="" id="form-error-searchbox">
			<input type="text" class="stoken" value="" name="stoken">
			<input type="text" placeholder="Type something here" name="search">
		</form>
		
	</div>

</div>