<?php 
/**
 * Invoices Page (invoices.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

$invoices = crm\Services\Invoices::all();	# An array of Invoices
$logs = '';

$countTotalInvoices 	= crm\Functions::countRows('invoices');
$countUnpaidInvoices 	= crm\Functions::countRows('invoices', '0', '`status` = 1');
$countPaidInvoices 		= crm\Functions::countRows('invoices', '0', '`status` = 2');
$countOverdueInvoices 	= crm\Functions::countRows('invoices', '0', '`status` = 4');



?>
<div class="container invoicesPage">
	
	<div class="wrapper">
		
		<div class="row clearfix">
			
			<!-- Main Content -->
			<div class="span9 column">
				
				<!-- Invoice Overview -->
				<div class="row invoicesOverview clearfix">
					
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
									<h2>Total Invoices</h2>
									<p><?php echo $countTotalInvoices; ?></p>
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
									<h2>Unpaid Invoices</h2>
									<p><?php echo $countUnpaidInvoices ?></p>
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
									<h2>Paid Invoices</h2>
									<p><?php echo $countPaidInvoices; ?></p>
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
									<h2>Overdue Invoices</h2>
									<p><?php echo $countOverdueInvoices; ?></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- / Invoice Overview -->

				<!-- Invoices -->
				<div class="row invoicesContainer" id="invoiceList">

					<div class="row clearfix">
						<div class="inline-float">
							<label class="search-label" for="search-invoices">Search Invoice:</label>
						</div>
						<div class="inline-float">
							<input class="search" id="search-invoices" placeholder="Search Invoice">
						</div>
					</div>
					
					<ul class="list">

						<?php foreach ($invoices as $invoice): ?>

						<!-- Invoice Element -->
						<li>
							<div class="invoice">
								<div class="row clearfix">
									<div class="invoiceProjectName">
										<h2><?php echo $invoice['project_id'] ?></h2>
										<p><?php echo $invoice['client_id'] ?> (<?php echo $invoice['client_id'] ?>)</p>
									</div>
									<div class="invoiceNumber">
										<h2>Invoice Number</h2>
										<p>#<?php echo $invoice['invoiceNumber'] ?></p>
									</div>
									<div class="invoiceDate">
										<h2>Invoiced Date</h2>
										<p><?php echo date('d M Y', $invoice['dateSent']) ?></p>
									</div>
									<div class="invoiceDueDate">
										<h2>Due Date</h2>
										<p><?php echo date('d M Y', $invoice['dueDate']) ?></p>
									</div>
									<div class="invoiceTotalAmount">
										<h2>Total Amount</h2>
										<p>$<?php echo number_format($invoice['total'], 2) ?></p>
									</div>
									<div class="invoiceActions">
										<ul>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>invoice/print/<?php echo $invoice['id'] ?>">View</a>
											</li>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>invoice/id/<?php echo $invoice['id'] ?>">Edit</a>
											</li>
											<li>
												<a href="#!" data-invoice-paid="<?php echo $invoice['id'] ?>">Mark as Paid</a>
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
			<div class="span3 column colSidebar">
				

				<!-- Create new Proposal -->
				<div class="panel transparent no-padding createInvoice">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="panelHeader">
								<h1>Create Invoice</h1>
							</div>

							<div class="panelContent">
								
								<div class="row clearfix">

									<div class="half">
										<a href="#createNewInvoice" data-modal="createNewInvoice" class="ismodal">New Invoice</a>
									</div>

								</div>

							</div>

						</div>			
					</div>
				</div>

				<!-- Project Timeline -->
				<div class="panel no-padding invoicesLogTimeline">
					<div class="inner">
						<div class="panelHeader">
							<h1>Invoice Timeline</h1>
						</div>
						<div class="panelContent">
							<div class="line"></div>
							<div class="timelineContainer">
								<?php if (empty($logs)): ?>
									<ul>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p><a href="">Selina’s</a> account was created by <a href="">Uzair Hayat</a></p></div>
										</li>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p><a href="">Selina’s</a> account was created by <a href="">Uzair Hayat</a></p></div>
										</li>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p><a href="">Selina’s</a> account was created by <a href="">Uzair Hayat</a></p></div>
										</li>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p><a href="">Selina’s</a> account was created by <a href="">Uzair Hayat</a></p></div>
										</li>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p><a href="">Selina’s</a> account was created by <a href="">Uzair Hayat</a></p></div>
										</li>
									</ul>
								<?php else: ?>
									<ul>
									<?php foreach ($logs as $log): ?>
										
										<li data-log="<?php echo $log['id']; ?>"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s', $log['created']) ?></p></div>
											<div class="task"><p><?php echo $log['log'] ?></p></div>
										</li>
										
									<?php endforeach ?>
									</ul>
								<?php endif ?>
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
		valueNames: [ 'invoiceProjectName', 'invoiceNumber' ],
		page:6,
		pagination: true
	};

	var invoiceList = new List('invoiceList', options);
</script>

<script src="/app/includes/js/page.invoices.js"></script>