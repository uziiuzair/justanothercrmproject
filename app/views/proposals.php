<?php
/**
 * Proposals Page (proposals.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$proposals = crm\Services\Proposals::all();
$logs = '';

?>
<div class="container proposalsPage">
	
	<div class="wrapper">
		
		<div class="row clearfix">
			
			<!-- Main Content -->
			<div class="span9 column">
				
				<!-- Invoice Overview -->
				<div class="row proposalOverview clearfix">
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="totalInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Total Proposals</h2>
									<p><?php echo crm\Functions::countRows('invoices') ?> <span>(10% increase)</span></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="unpaidInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Accepted Proposals</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 1') ?> <span>(10% increase)</span></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="paidInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Rejected Proposals</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 2') ?> <span>(10% increase)</span></p>
								</div>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas style="width:70px; height:80px;" id="overdueInvoices"></canvas>
								</div>
								<div class="right">
									<h2>Expired Proposals</h2>
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 4') ?> <span>(10% increase)</span></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- / Invoice Overview -->

				<!-- Invoices -->
				<div class="row proposalContainer" id="proposalsList">
					
					<ul class="list">

						<?php foreach ($proposals as $proposal): ?>

						<!-- Invoice Element -->
						<li>
							<div class="proposal">
								<div class="row clearfix">
									<div class="proposalProjectName">
										<h2><?php echo $proposal['title'] ?></h2>
										<p><?php echo crm\Services\Clients::get($proposal['client_id'])->firstname . ' ' . crm\Services\Clients::get($proposal['client_id'])->lastname; ?> (<?php echo crm\Services\Clients::get($proposal['client_id'])->company; ?>)</p>
									</div>
									<div class="proposalNumber">
										<h2>Proposal Number</h2>
										<p>#<?php echo strtoupper($proposal['proposalNumber']) ?></p>
									</div>
									<div class="proposalDate">
										<h2>Proposal Date</h2>
										<p><?php echo date('d M Y', $proposal['created']) ?></p>
									</div>
									<div class="proposalDueDate">
										<h2>Expiry Date</h2>
										<p><?php echo date('d M Y', $proposal['duedate']) ?></p>
									</div>
									<div class="proposalTotalAmount">
										<h2>Total Amount</h2>
										<p>$<?php echo number_format($proposal['total'], 2) ?></p>
									</div>
									<div class="proposalActions">
										<ul>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>proposal/print/<?php echo $proposal['id'] ?>">View</a>
											</li>
											<li>
												<a href="<?php echo crm\Config::SystemPublicURL; ?>proposal/id/<?php echo $proposal['id'] ?>">Edit</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<!-- / Invoice Element -->

						<?php endforeach ?>

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
				<div class="panel transparent no-padding createProposal">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="panelHeader">
								<h1>Create Proposal</h1>
							</div>

							<div class="panelContent">
								
								<div class="row clearfix">

									<div class="half">
										<a href="#createBlankProposal" data-modal="createBlankProposal" class="ismodal">Blank Proposal</a>
									</div>

									<div class="half">
										<a href="#createTemplateProposal" data-modal="createTemplateProposal" class="ismodal">From Template</a>
									</div>

								</div>

							</div>

						</div>			
					</div>
				</div>

				<!-- Project Timeline -->
				<div class="panel no-padding proposalsLogTimeline">
					<div class="inner">
						<div class="panelHeader">
							<h1>Proposal Timeline</h1>
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

<!-- Modal Container -->
<div class="modalContainer">
	

	<!-- Create Blank Proposal -->
	<div class="modal this-createBlankProposal" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Blank Proposal</h1>
			</div>

			<div class="modalContent">

			</div>

		</div>

	</div>
	<!-- / Create Blank Proposal -->
	

	<!-- Create Blank Proposal -->
	<div class="modal this-createTemplateProposal" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Template Proposal</h1>
			</div>

			<div class="modalContent">

			</div>

		</div>

	</div>
	<!-- / Create Template Proposal -->



</div>





<!-- Scripts -->
<script>
	var options = {
		valueNames: [ 'invName', 'invNumber', 'invDate', 'invDue', 'invTotal' ],
		page:6,
		pagination: true
	};

	var proposalsList = new List('proposalsList', options);
</script>

<script src="/app/includes/js/page.invoices.js"></script>