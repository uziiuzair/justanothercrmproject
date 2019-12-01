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
									<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70.143" viewBox="0 0 70 70.143">
  										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,288.552l6.015-5.94a31.2,31.2,0,0,1,5.244,8.6,32.06,32.06,0,0,1,2.09,9.477h-8.5a24.569,24.569,0,0,0-1.417-6.153A26.848,26.848,0,0,0,1093.137,288.552Z" transform="translate(-708.097 -374.554)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(366.167 -97.938) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.017, -1, 1, -0.017, 348.776, -88.433)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 343.071, -69.69)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 352.536, -52.519)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 371.054, -46.836)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(388.249 -55.847) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(394.03 -74.434) rotate(45)" fill="#ebecec"/>
  										</g>
									</svg>

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
									<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70.143" viewBox="0 0 70 70.143">
  										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,288.552l6.015-5.94a31.2,31.2,0,0,1,5.244,8.6,32.06,32.06,0,0,1,2.09,9.477h-8.5a24.569,24.569,0,0,0-1.417-6.153A26.848,26.848,0,0,0,1093.137,288.552Z" transform="translate(-708.097 -374.554)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(366.167 -97.938) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.017, -1, 1, -0.017, 348.776, -88.433)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 343.071, -69.69)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 352.536, -52.519)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 371.054, -46.836)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(388.249 -55.847) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(394.03 -74.434) rotate(45)" fill="#ebecec"/>
  										</g>
									</svg>

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
									<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70.143" viewBox="0 0 70 70.143">
  										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,288.552l6.015-5.94a31.2,31.2,0,0,1,5.244,8.6,32.06,32.06,0,0,1,2.09,9.477h-8.5a24.569,24.569,0,0,0-1.417-6.153A26.848,26.848,0,0,0,1093.137,288.552Z" transform="translate(-708.097 -374.554)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(366.167 -97.938) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.017, -1, 1, -0.017, 348.776, -88.433)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 343.071, -69.69)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 352.536, -52.519)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 371.054, -46.836)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(388.249 -55.847) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(394.03 -74.434) rotate(45)" fill="#ebecec"/>
  										</g>
									</svg>

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
									<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70.143" viewBox="0 0 70 70.143">
  										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,288.552l6.015-5.94a31.2,31.2,0,0,1,5.244,8.6,32.06,32.06,0,0,1,2.09,9.477h-8.5a24.569,24.569,0,0,0-1.417-6.153A26.848,26.848,0,0,0,1093.137,288.552Z" transform="translate(-708.097 -374.554)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(366.167 -97.938) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.017, -1, 1, -0.017, 348.776, -88.433)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 343.071, -69.69)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 352.536, -52.519)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 371.054, -46.836)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(388.249 -55.847) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,5.94,6.015,0a31.2,31.2,0,0,1,5.244,8.6,32.064,32.064,0,0,1,2.09,9.477h-8.5a24.567,24.567,0,0,0-1.417-6.153A26.85,26.85,0,0,0,0,5.94Z" transform="translate(394.03 -74.434) rotate(45)" fill="#ebecec"/>
  										</g>
									</svg>

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

					<div class="row clearfix">
						<div class="inline-float">
							<label class="search-label" for="search-expenses">Search Expense:</label>
						</div>
						<div class="inline-float">
							<input class="search" id="search-expenses" placeholder="Search Expense">
						</div>
					</div>
					
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

										<?php 
											$totalSpend = crm\Services\Expenses::expensesIncurred($account['id']);
											$totalBudget = $account['budget'];

											$spendingPercentage = ($totalSpend/$totalBudget) * 100;
										?>
										<li class="theExpenseAccount">
											
											<a href="#!">
												<div class="expenseAccount">
													<div class="row clearfix">
														<div class="half">
															<h1 class="expenseAccountName"><?php echo $account['name'] ?></h1>
														</div>
														<div class="half">
															<p class="expenseAccountSpending">$<?php echo number_format($totalSpend, 2) ?> / <?php echo number_format($totalBudget, 2) ?></p>
														</div>
													</div>

													

													<div class="row clearfix">
														<div class="expenseBudgeting">
															<div class="line" style="width:<?php echo $spendingPercentage; ?>%;"></div>
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
		valueNames: [ 'expenseProjectName', 'expenseNumber', 'expenseDate' ],
		page:6,
		pagination: true
	};

	var expenseList = new List('expenseList', options);
</script>

<script src="/app/includes/js/page.expense.js"></script>