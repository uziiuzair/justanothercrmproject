<?php 
/**
 * Dashboard Page (dashboard.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

$meetings = crm\Services\Meetings::forStaff(); 	# Upcoming Meetings

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
									<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90.184" viewBox="0 0 90 90.184">
										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,290.249l7.733-7.637a40.111,40.111,0,0,1,6.742,11.062,41.223,41.223,0,0,1,2.687,12.185H1099.37a31.6,31.6,0,0,0-1.822-7.911A34.524,34.524,0,0,0,1093.137,290.249Z" transform="translate(-693.362 -370.144)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(375.51 -95.241) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.017, -1, 1, -0.017, 353.15, -83.021)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 345.815, -58.922)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 357.984, -36.845)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 381.792, -29.539)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(403.9 -41.124) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(411.334 -65.021) rotate(45)" fill="#ebecec"/>
										</g>
									</svg>

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
									<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90.184" viewBox="0 0 90 90.184">
										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,290.249l7.733-7.637a40.111,40.111,0,0,1,6.742,11.062,41.223,41.223,0,0,1,2.687,12.185H1099.37a31.6,31.6,0,0,0-1.822-7.911A34.524,34.524,0,0,0,1093.137,290.249Z" transform="translate(-693.362 -370.144)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(375.51 -95.241) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.017, -1, 1, -0.017, 353.15, -83.021)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 345.815, -58.922)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 357.984, -36.845)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 381.792, -29.539)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(403.9 -41.124) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(411.334 -65.021) rotate(45)" fill="#ebecec"/>
										</g>
									</svg>
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
									<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90.184" viewBox="0 0 90 90.184">
										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,290.249l7.733-7.637a40.111,40.111,0,0,1,6.742,11.062,41.223,41.223,0,0,1,2.687,12.185H1099.37a31.6,31.6,0,0,0-1.822-7.911A34.524,34.524,0,0,0,1093.137,290.249Z" transform="translate(-693.362 -370.144)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(375.51 -95.241) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.017, -1, 1, -0.017, 353.15, -83.021)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 345.815, -58.922)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 357.984, -36.845)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 381.792, -29.539)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(403.9 -41.124) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(411.334 -65.021) rotate(45)" fill="#ebecec"/>
										</g>
									</svg>
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
									<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90.184" viewBox="0 0 90 90.184">
										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,290.249l7.733-7.637a40.111,40.111,0,0,1,6.742,11.062,41.223,41.223,0,0,1,2.687,12.185H1099.37a31.6,31.6,0,0,0-1.822-7.911A34.524,34.524,0,0,0,1093.137,290.249Z" transform="translate(-693.362 -370.144)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(375.51 -95.241) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.017, -1, 1, -0.017, 353.15, -83.021)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 345.815, -58.922)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 357.984, -36.845)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 381.792, -29.539)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(403.9 -41.124) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(411.334 -65.021) rotate(45)" fill="#ebecec"/>
										</g>
									</svg>
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
									<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90.184" viewBox="0 0 90 90.184">
										<g id="Group_45" data-name="Group 45" transform="translate(-333.469 107.377)">
											<path id="Path_18" data-name="Path 18" d="M1093.137,290.249l7.733-7.637a40.111,40.111,0,0,1,6.742,11.062,41.223,41.223,0,0,1,2.687,12.185H1099.37a31.6,31.6,0,0,0-1.822-7.911A34.524,34.524,0,0,0,1093.137,290.249Z" transform="translate(-693.362 -370.144)" fill="#ebecec"/>
											<path id="Path_19" data-name="Path 19" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(375.51 -95.241) rotate(-45)" fill="#ebecec"/>
											<path id="Path_20" data-name="Path 20" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.017, -1, 1, -0.017, 353.15, -83.021)" fill="#29aeb7"/>
											<path id="Path_21" data-name="Path 21" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.719, -0.695, 0.695, -0.719, 345.815, -58.922)" fill="#29aeb7"/>
											<path id="Path_22" data-name="Path 22" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.999, 0.035, -0.035, -0.999, 357.984, -36.845)" fill="#29aeb7"/>
											<path id="Path_23" data-name="Path 23" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="matrix(-0.695, 0.719, -0.719, -0.695, 381.792, -29.539)" fill="#29aeb7"/>
											<path id="Path_24" data-name="Path 24" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(403.9 -41.124) rotate(90)" fill="#29aeb7"/>
											<path id="Path_25" data-name="Path 25" d="M0,7.637,7.733,0a40.112,40.112,0,0,1,6.742,11.062,41.226,41.226,0,0,1,2.687,12.185H6.233a31.586,31.586,0,0,0-1.821-7.912A34.521,34.521,0,0,0,0,7.637Z" transform="translate(411.334 -65.021) rotate(45)" fill="#ebecec"/>
										</g>
									</svg>
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

			<?php if (!empty($meetings)): ?>
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
										<div class="image" style="background-image: url(<?php echo crm\Services\Clients::getBusinessLogo($meeting['client_id']) ?>)"></div>
									</div>
									<div class="right">
										<h2 class="meetingName"><?php echo $meeting['recipientName']; ?></h2>
										<p class="meetingCompanyName"><?php echo $meeting['recipientCompany']; ?></p>
										<p class="meetingPhoneNumber"><?php echo $meeting['recipientPhone']; ?></p>
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
			<?php endif ?>

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