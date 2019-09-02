<?php
/**
 * Services Page (services.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */
use uziiuzair\crm;
use uziiuzair\crm\Services\Services as Services;

$services = Services::all();
$productCategory = crm\Services\Expenses::accounts();
$logs = Services::allCategories();

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
									<canvas style="width:80px; height:80px;" id="totalExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Total Sold</h2>
									<p><?php echo crm\Functions::countRows('services') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="last30Days"></canvas>
								</div>
								<div class="right">
									<h2>Last 30 Days</h2>
									<p><?php echo crm\Functions::countRows('services') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="recurringExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Recurring Sales</h2>
									<p><?php echo crm\Functions::countRows('services') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="todaysExpenses"></canvas>
								</div>
								<div class="right">
									<h2>Overdue Sales</h2>
									<p><?php echo crm\Functions::countRows('services') ?></p>
								</div>
							</div>
						</div>
					</div>


				</div>
				<!-- / Invoice Overview -->

				<!-- Invoices -->
				<div class="row expensesContainer" id="servicesList">
					
					<ul class="list">

						<?php foreach ($services as $service): ?>

						<!-- Invoice Element -->
						<li>
							<div class="expense" data-category="<?php echo $service['category_id']; ?>">
								<div class="row clearfix">
									<div class="expenseProjectName serviceName">
										<h2><?php echo $service['name'] ?></h2>
										<p><?php echo Services::getCategory($service['category_id'], 'name'); ?></p>
									</div>
									<div class="expenseNumber serviceDescription">
										<h2>&nbsp;</h2>
										<p><?php echo $service['description']; ?></p>
									</div>
									<div class="expenseDate serviceCode">
										<h2>SKU</h2>
										<p><?php echo $service['serviceCode'] ?></p>
									</div>
									<div class="expenseDueDate serviceSale">
										<h2>Sale Price</h2>
										<p>$<?php echo $service['salePrice'] ?></p>
									</div>
									<div class="expenseTotalAmount servicePurchase">
										<h2>Purchase Price</h2>
										<p>$<?php echo $service['purchasePrice'] ?></p>
									</div>
									<div class="expenseActions">
										<ul>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>service/id/<?php echo $service['id'] ?>">View / Edit</a>
											</li>
											<li>
												<a href="#!" data-service-delete="<?php echo $service['id'] ?>">Delete</a>
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
							<h1>Product Categories</h1>
						</div>

						<div class="panelContent">
							
							<div class="expenseAccountContainer">
								
								<ul>

									<?php foreach ($productCategory as $category): ?>

										<li class="theExpenseAccount">
											
											<a href="#!">
												<div class="expenseAccount">
													<div class="row clearfix">
														<div class="half">
															<h1 class="expenseAccountName">Digital Services</h1>
														</div>
														<div class="half">
															<p class="expenseAccountSpending">50 Services</p>
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
		valueNames: [ 'serviceName', 'serviceDescription', 'serviceCode', 'serviceSale', 'servicePurchase' ],
		page:6,
		pagination: true
	};

	var servicesList = new List('servicesList', options);
</script>

<script src="/app/includes/js/page.services.js"></script>