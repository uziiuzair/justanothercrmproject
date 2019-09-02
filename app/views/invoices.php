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
									<canvas style="width:80px; height:80px;" id="totalInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Total Invoices</h2>
									<p><?php echo crm\Functions::countRows('invoices') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="unpaidInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Unpaid Invoices</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 1') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="paidInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Paid Invoices</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 2') ?></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:80px; height:80px;" id="overdueInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Overdue Invoices</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 4') ?></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- / Invoice Overview -->

				<!-- Invoices -->
				<div class="row invoicesContainer" id="invoiceList">
					
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
		valueNames: [ 'invName', 'invNumber', 'invDate', 'invDue', 'invTotal' ],
		page:6,
		pagination: true
	};

	var invoiceList = new List('invoiceList', options);
</script>

<script src="/app/includes/js/page.invoices.js"></script>