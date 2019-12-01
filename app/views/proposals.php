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

					<div class="row clearfix">
						<div class="inline-float">
							<label class="search-label" for="search-proposals">Search Proposal:</label>
						</div>
						<div class="inline-float">
							<input class="search" id="search-proposals" placeholder="Search Proposal">
						</div>
					</div>
					
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
		valueNames: [ 'proposalProjectName', 'proposalNumber' ],
		page:6,
		pagination: true
	};

	var proposalsList = new List('proposalsList', options);
</script>

<script src="/app/includes/js/page.invoices.js"></script>