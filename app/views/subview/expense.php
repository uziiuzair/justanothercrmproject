<?php 
/**
 * Staff Page (staff.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$expense_id = crm\Routes::getServerRequest('expense/id/');				#	Get the Expense ID
$expense_id = stripcslashes($expense_id);								#	Sanitize the Expense ID

$expenseArray 	= crm\Services\Expenses::get($expense_id);				#	Get Expense Information based on Expense ID
$itemArray 		= crm\Services\Expenses::items($expenseArray->id);		#	Get Expense Items
$staffArray 	= crm\Users::get($expenseArray->staff_id); 				# 	Get Staff Information based on Staff ID


?>
<div class="container expensePage">
	
	<div class="wrapper">

		<div class="row debugInformation">
			<span>Debug Information</span>
			<?php print_r($expenseArray) ?>
			<span>Expense Items</span>
			<?php print_r($itemArray) ?>
		</div>

		<div class="row clearfix pageHeader">
			<div class="inline-float p-r-50">
				<h1><?php echo $expenseArray->name ?></h1>
			</div>
			<div class="inline-float p-r-50">
				<p>#<?php echo sprintf('%06d', $expenseArray->id) ?></p>
			</div>
			<div class="inline-float p-r-50">
				<p><?php echo $expenseArray->description ?></p>
			</div>
			<div class="float-right">
				<a href="#fileReimbursement" data-ajax="fileReimbursement" data-staff-id="<?php echo $expenseArray->staff_id; ?>" class="isajax">File for Reimbursement</a>
			</div>
		</div>

		<div class="row clearfix">

			<!-- Left Column -->
			<div class="span7">

				<div class="row clearfix">
					
					<div class="span6 column">

						<!-- Staff Information -->
						<div class="panel no-padding staffInformation">
							<div class="inner">			
								<div class="panelHeader">
									<h1>Staff Information</h1>
								</div>
								<div class="panelContent">
									
									<div class="row clearfix">
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-envelope"></i>
												</span> Name:
											</span> <?php echo $staffArray->firstname . ' ' . $staffArray->lastname; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-envelope"></i>
												</span> Email:
											</span> <?php echo $staffArray->email; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-mobile"></i>
												</span> Phone:
											</span> 
											<?php echo $staffArray->phone; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-mobile"></i>
												</span> Reference:
											</span> 
											<?php echo $expenseArray->receiptNumber; ?>
										</p>
									</div>

								</div>
							</div>
						</div>
						<!-- / Staff Information -->
						
					</div>
					
					<div class="span6 column">
						
						<!-- Expense Information -->
						<div class="panel no-padding expenseInformation">
							<div class="inner">			
								<div class="panelHeader">
									<h1>Expense Information</h1>
								</div>
								<div class="panelContent">
									
									<div class="row clearfix">
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-envelope"></i>
												</span> Title:
											</span> <?php echo $staffArray->firstname . ' ' . $staffArray->lastname; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-envelope"></i>
												</span> Date:
											</span> <?php echo $staffArray->email; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-mobile"></i>
												</span> Customer:
											</span> 
											<?php echo $staffArray->phone; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-mobile"></i>
												</span> Account:
											</span> 
											<?php echo $expenseArray->account_id; ?>
										</p>
										<p>
											<span>
												<span class="svgContainer">
													<i class="fal fa-mobile"></i>
												</span> Total Amount:
											</span> 
											<?php echo crm\Functions::getCurrency($expenseArray->currency, 'prefix'). $expenseArray->amount; ?>
										</p>
									</div>

								</div>
							</div>
						</div>
						<!-- / Expense Information -->

					</div>	

				</div>

				<div class="row clearfix">
					<div class="span12 column">

						<!-- Purchase Breakdown -->
						<div class="panel no-padding purchaseBreakdown">
							<div class="inner">			
								<div class="panelHeader">
									<h1>Purchase Breakdown</h1>
								</div>
								<div class="panelContent">
									<div class="breakdownWrapper">
										<?php foreach ($itemArray as $item): ?>

											<!-- Item -->
											<div class="breakdownItem" data-item="<?php echo $item['id']; ?>">
												<div class="row clearfix">
													<dv class="half">
														<h2 class="expenseName"><?php echo $item['name']; ?></h2>
													</dv>
													<dv class="half">
														<p class="expensePrice"><?php echo crm\Functions::getCurrency($item['currencyPrefix'], 'prefix') . $item['total']; ?></p>
													</dv>
												</div>
												<div class="row clearfix">
													<div class="half">
														<p class="expenseDesc"><?php echo $item['description']; ?></p>
													</div>
													<div class="half">
														<p class="expenseActions"><a href="">Edit</a> . <a href="">Delete</a></p>
													</div>
												</div>
											</div>
											<!-- / Item -->
											
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
						<!-- / Purchase Breakdown -->
						
					</div>
				</div>
				
			</div>
			<!-- / Left Column -->
			
			<!-- Right Column -->
			<div class="span5 column">
				
				<!-- Receipt -->
				<div class="panel no-padding receiptPanel">
					<div class="inner">			
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="left">
									<h1>Receipt</h1>
								</div>
								<div class="right">
									<p><a href="#" class="ismodal" data-modal="addReceipt">Add Receipt</a></p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							
							<div class="receiptContainer">
								
							</div>

						</div>
					</div>
				</div>
				<!-- / Receipt -->

			</div>
			<!-- / Right Column -->

		</div>

	</div>

</div>



<!-- Modal Container -->
<div class="modalContainer">
	
	<!-- Edit Lead Profile -->
	<div class="modal this-addReceipt" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg 
					aria-hidden="true" 
					focusable="false" 
					data-prefix="fal" 
					data-icon="times" 
					role="img" 
					xmlns="http://www.w3.org/2000/svg" 
					viewBox="0 0 320 512" 
					class="svg-inline--fa fa-times fa-w-10 fa-3x">
					<path 
						fill="currentColor" 
						d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" 
						class="">
					</path>
				</svg>
			</div>

			<div class="modalHeader">
				<h1>Add Receipt</h1>
			</div>

			<div class="modalContent"></div>

		</div>
	</div>


</div>
