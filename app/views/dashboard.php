<?php 
/**
 * Dashboard Page (dashboard.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

$meetings = crm\Services\Meetings::all(); 	# Upcoming Meetings

?>
<div class="container dashboard">
	
	<div class="wrapper">
		
		<div class="row clearfix">
			
			<!-- Overview -->
			<div class="row dashContainer overview">
				
				<!-- Header -->
				<div class="headerContainer row clearfix">
					<div class="headerElement title">
						<!-- <h1>Overview</h1> -->
					</div>
					<div class="headerElement"></div>
					<div class="headerElement"></div>
				</div>
				
				<!-- Content -->
				<div class="row clearfix overviewContainer">
					
					<!-- Projects Due -->
					<div class="overviewBox projectsDue">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas id="projectsDue" style="width:90px; height:90px;"></canvas>
								</div>
								<div class="right">
									<h2>Projects Due</h2>
									<p>
										<?php echo crm\Functions::countRows('projects', '0', '`status` = 4') ?> 
										<span>(<?php echo crm\Functions::countRows('projects') ?> total projects)</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Projects Due -->

					<!-- Tasks Due -->
					<div class="overviewBox tasksDue">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas id="tasksDue" style="width:90px; height:90px;"></canvas>
								</div>
								<div class="right">
									<h2>Tasks Due</h2>
									<p>
										<?php echo crm\Functions::countRows('tasks', '0', '`status` = 4') ?> 
										<span>(<?php echo crm\Functions::countRows('tasks') ?> total tasks)</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Tasks Due -->

					<!-- Open Tasks -->
					<div class="overviewBox openTasks">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas id="openTasks" style="width:90px; height:90px;"></canvas>
								</div>
								<div class="right">
									<h2>Open Tasks</h2>
									<p>
										<?php echo crm\Functions::countRows('tasks', '0', '`status` = 2') ?>
										<span>(<?php echo crm\Functions::countRows('tasks') ?> total tasks)</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Open Tasks -->

					<!-- Active Clients -->
					<div class="overviewBox activeClients">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas id="activeClient" style="width:90px; height:90px;"></canvas>
								</div>
								<div class="right">
									<h2>Active Clients</h2>
									<p>
										<?php echo crm\Functions::countRows('clients', '0', '`status` = 1') ?> 
										<span>(<?php echo crm\Functions::countRows('clients') ?> total clients)</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Active Clients -->

					<!-- Unpaid Invoices -->
					<div class="overviewBox unpaidInvoices">
						<div class="inner">
							<div class="row clearfix">
								<div class="left">
									<canvas id="unpaidInvoices" style="width:90px; height:90px;"></canvas>
								</div>
								<div class="right">
									<h2>Unpaid Invoices</h2>
									<p>
										<?php echo crm\Functions::countRows('invoices', '0', '`status` = 1') ?> 
										<span>(<?php echo crm\Functions::countRows('invoices') ?> total invoices)</span>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- /Unpaid Invoices -->

				</div>

			</div>
			<!-- /Overview -->

			<!-- Upcoming -->
			<div class="row dashContainer upcomingMeetings">
				
				<!-- Header -->
				<div class="headerContainer row clearfix">
					<div class="headerElement title">
						<h1>Upcoming Meetings</h1>
					</div>
				</div>
				
				<!-- Content -->
				<div class="row clearfix upcomingMeetingsContainer">
					
					<?php $meetingLimit = 0; ?>
					<?php foreach ($meetings as $meeting): ?>					
					<?php $meetingLimit++; if ($meetingLimit == 5) break; ?>
					<!-- Meeting -->
					<div class="meetingBox" data-meeting-id="<?php echo $meeting['id']; ?>">
						<div class="inner">
							<div class="about">
								<div class="row clearfix">
									<div class="left">
										<div class="image"></div>
									</div>
									<div class="right">
										<h2 class="meetingName"><?php echo $meeting['name']; ?></h2>
										<p class="meetingCompanyName"><?php echo $meeting['companyName']; ?></p>
										<p class="meetingPhoneNumber"><?php echo $meeting['phoneNumber']; ?></p>
									</div>
								</div>

								<div class="whenAndWhere">
									<p><span>When:</span><?php echo date('dS M Y', $meeting['date']); ?> at <?php echo date('h:m A', $meeting['timeStart']); ?></p>
									<p><span>Why:</span><?php echo $meeting['purpose']; ?></p>
									<p>
										<span>Location:</span>
										<?php echo $meeting['address']; ?> 
										(<a 
											data-map-address="<?php echo $meeting['address']; ?>" 
											data-map-lat="<?php echo $meeting['latitude']; ?>" 
											data-map-long="<?php echo $meeting['longitude']; ?>" 
											data-modal="viewAddressOnMap" 
											href="#!" 
											class="ismodal viewAddressOnMap"
											>View Map</a>)
									</p>
								</div>
							</div>
						</div>
						<div class="actions clearfix row">
							<div class="action">
								<a href="#!" class="ismodal" data-modal="showMeetingDetails" data-meeting-id="<?php echo $meeting['id']; ?>">View Details</a>
							</div>
							<div class="action">
								<a href="#!">Postpone</a>
							</div>
						</div>
					</div>
					<!-- /Meeting -->

					<?php endforeach ?>

				

				</div>

			</div>
			<!-- / Upcoming -->

			<!-- Today -->
			<div class="row dashContainer today">
				
				<!-- Header -->
				<div class="headerContainer row clearfix">
					<div class="headerElement title">
						<h1>Today</h1>
					</div>
				</div>
				
				<!-- Content -->
				<div class="row clearfix todayContainer">
					
				</div>
				
			</div>
			<!-- /Today -->

		</div>

	</div>

</div>

<div class="modalContainer">
	
	<!-- View Address on Map -->
	<div class="modal this-viewAddressOnMap" style="display:none;position:fixed; top:0; left:0;">
				
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>View Address on Map</h1>
			</div>

			<div class="modalContent">
				
				<div class="googleMapsContainer">
					
				</div>

			</div>

		</div>

	</div>


	<!-- Show Meeting Details -->
	<div class="modal this-showMeetingDetails" style="display:none;position:fixed; top:0; left:0;">
				
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Meeting Details</h1>
			</div>

			<div class="modalContent">
				
			</div>

		</div>

	</div>

</div>

<script src="/app/includes/js/page.dashboard.js"></script>
<script src="/app/includes/js/modals.js"></script>