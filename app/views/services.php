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
									<p><?php echo crm\Functions::countRows('services') ?></p>
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

					<div class="row clearfix">
						<div class="inline-float">
							<label class="search-label" for="search-services">Search Services:</label>
						</div>
						<div class="inline-float">
							<input class="search" id="search-services" placeholder="Search Services">
						</div>
					</div>
					
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