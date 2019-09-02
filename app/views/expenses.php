<?php
/**
 * Expenses Page (expenses.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */
use uziiuzair\crm;
$expenses = crm\Services\Expenses::all();
$expenseAccounts = crm\Services\Expenses::accounts();

?>

<div class="container expensesPage">
	
	<div class="wrapper">
		
		<div class="row clearfix">
			
			<!-- Main Content -->
			<div class="span9 column">
				
				<!-- Invoice Overview -->
				<div class="row expensesOverview clearfix">
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="totalExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Total Expenses</h2>
									<p><?php echo crm\Functions::countRows('expenses') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="last30Days"></canvas>
								</div>
								<div class="right">
									<h2>Last 30 Days</h2>
									<p><?php echo crm\Functions::countRows('expenses') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="recurringExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Recurring Expenses</h2>
									<p><?php echo crm\Functions::countRows('expenses') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="todaysExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Today's Expenses</h2>
									<p><?php echo crm\Functions::countRows('expenses') ?></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- / Invoice Overview -->

				<!-- Invoices -->
				<div class="row expensesContainer" id="expensesList">
					
					<ul class="list">

						<?php foreach ($expenses as $expense): ?>

						<!-- Invoice Element -->
						<li>
							<div class="expense">
								<div class="row clearfix">
									<div class="expenseProjectName">
										<h2><?php echo $expense['name'] ?></h2>
										<p>
											<?php echo crm\Services\Clients::get($expense['client_id'])->firstname . ' ' .crm\Services\Clients::get($expense['client_id'])->lastname ; ?>	
										</p>
									</div>
									<div class="expenseNumber">
										<h2>Expense ID</h2>
										<p>#<?php echo sprintf('%06d', $expense['id']) ?></p>
									</div>
									<div class="expenseDate">
										<h2>Expense Account</h2>
										<p><?php echo $expense['account_id'] ?></p>
									</div>
									<div class="expenseDueDate">
										<h2>Expense Date</h2>
										<p><?php echo date('d M Y', $expense['datePaid']) ?></p>
									</div>
									<div class="expenseTotalAmount">
										<h2>Total Amount</h2>
										<p>$<?php echo number_format($expense['amount'], 2) ?></p>
									</div>
									<div class="expenseActions">
										<ul>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>expense/id/<?php echo $expense['id'] ?>">View / Edit</a>
											</li>
											<li>
												<a href="#!" data-expense-delete="<?php echo $expense['id'] ?>">Delete</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<!-- / Invoice Element -->

						<?php  endforeach ?>

					</ul>

					<div class="paginationContainer">
						<ul class="pagination"></ul>
					</div>

				</div>
				<!-- / Invoices -->

			</div>

			<!-- Sidebar -->
			<div class="span3 column">

				<!-- Expense Accounts -->
				<div class="panel expenseAccounts no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Expense Accounts</h1>
						</div>

						<div class="panelContent">
							
							<div class="expenseAccountContainer">
								
								<ul>

									<?php foreach ($expenseAccounts as $account): ?>

										<li class="theExpenseAccount">
											
											<a href="#!">
												<div class="expenseAccount">
													<div class="row clearfix">
														<div class="half">
															<h1 class="expenseAccountName"><?php echo $account['name'] ?></h1>
														</div>
														<div class="half">
															<p class="expenseAccountSpending">$50.00 / <?php echo number_format($account['budget'], 2) ?></p>
														</div>
													</div>
													<div class="row clearfix">
														<div class="expenseBudgeting">
															<div class="line" style="width:25%;"></div>
														</div>
													</div>
												</div>
											</a>

										</li>
										
									<?php endforeach ?>
									
								</ul>

							</div>

							<div class="addNewExpenseAccount">
								<form action="">
									<div class="row clearfix">
										<div class="inline">
											<a href="#!">+</a>
										</div>
										<div class="inline">
											<input type="text" name="categoryName" id="categoryName" placeholder="New Category Name" required="">
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
				
				

			</div>

		</div>

	</div>

</div>

<!-- Scripts -->
<script>
	var options = {
		valueNames: [ 'invName', 'invNumber', 'invDate', 'invDue', 'invTotal' ],
		page:6,
		pagination: true
	};

	var expenseList = new List('expenseList', options);
</script>

<script src="/app/includes/js/page.expenses.js"></script>