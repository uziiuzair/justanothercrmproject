<?php 
/**
 * Projects Page (projects.php)
 *
 * Shows a list of all the projects
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */
use uziiuzair\crm; 

$projects 	= crm\Services\Projects::all();
$logs 		= crm\Functions::getlogs('project_log');

?>
<div class="container projects">
	
	<div class="wrapper">

	<!-- 	<div class="row debugInformation">
			<span>Projects:</span>
		</div> -->
	
		<div class="row clearfix">

			<!-- Projects List -->
			<div class="span9 column">

				<!-- Invoice Overview -->
				<div class="row projectsOverview clearfix">
					
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
									<p><?php echo crm\Functions::countRows('invoices') ?></p>
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
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 1') ?></p>
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
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 2') ?></p>
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
									<p><?php echo crm\Functions::countRows('invoices', '0', '`status` = 4') ?></p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- / Invoice Overview -->

				<div class="projectsContainer"  id="projectsList">

					<div class="row clearfix">
						<div class="inline-float">
							<label class="search-label" for="search-projects">Search Project:</label>
						</div>
						<div class="inline-float">
							<input class="search" id="search-projects" placeholder="Search Projects">
						</div>
					</div>

					<ul class="list clearfix">

					<?php foreach ($projects as $project): ?>

						<li>
				
							<!-- Project -->
							<div class="project" data-project-id="<?php echo $project['id'] ?>">
								<div class="inner">
									<div class="row projectDetails">
										<h1 class="projectName">
											<?php 
											if (strlen($project['name']) >= 27) {
											    echo substr($project['name'], 0, 25). "...";
											}
											else {
											    echo $project['name'];
											}
											?>
										</h1>
										<p class="projectCompany"><?php echo crm\Services\Clients::get($project['client_id'])->firstname . ' ' . crm\Services\Clients::get($project['client_id'])->lastname ?>
										</p>
									</div>

									<div class="projectTasksOverviewChart">
										<canvas id="projectChart-<?php echo $project['id'] ?>" width="100%" height="100px"></canvas>
									</div>

									<div class="projectDetails row">
										<div class="row clearfix">
											<div class="half">
												<p class="projectStarted">Started on, <?php echo date('d M Y', $project['start']) ?></p>
											</div>
											<div class="half">
												<p class="projectDue">Due on, <?php echo date('d M Y', $project['end']) ?></p>
											</div>
										</div>

										<div class="row clearfix">
											<div class="actions">
												<ul>
													<li><a href="<?php echo crm\Config::SystemPublicURL; ?>project/id/<?php echo $project['id'] ?>">View Project</a></li>
													<li>
														<select name="projectPriority" id="">
															<option value="-1">Set Priority</option>
															<option value="1">Low</option>
															<option value="2">Medium</option>
															<option value="3">High</option>
															<option value="4">Urgent</option>
														</select>
													</li>
													<li>
														<select name="projectStatus" id="">
															<option value="-1">Set Status</option>
															<option value="1">Pitch</option>
															<option value="2">On Going</option>
															<option value="2">On Hold</option>
															<option value="3">Submitted</option>
															<option value="4">Completed</option>
															<option value="4">Cancelled</option>
														</select>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Project -->

						</li>

					<?php  endforeach ?>

					</ul>

					<div class="paginationContainer">
						<ul class="pagination clearfix"></ul>
					</div>

				</div>
			</div>

			<!-- Projects Misc -->
			<div class="span3 column colSidebar">

				<!-- Create new Proposal -->
				<div class="panel transparent no-padding createProjects">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="panelHeader">
								<h1>Create Project</h1>
							</div>

							<div class="panelContent">
								
								<div class="row clearfix">

									<div class="half">
										<a href="#addNewProject" data-modal="addNewProject" class="ismodal">New Project</a>
									</div>

								</div>

							</div>

						</div>			
					</div>
				</div>
				
				<div class="panel productivityTracker no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Daily Productivity Tracker</h1>
						</div>
						<div class="panelContent">
							<div class="productivityTrackerWrapper">
								
								<ul>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 50%;"></div>
											<div class="undone" style="height: 70%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 80%;"></div>
											<div class="undone" style="height: 90%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 60%;"></div>
											<div class="undone" style="height: 100%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 20%;"></div>
											<div class="undone" style="height: 30%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 20%;"></div>
											<div class="undone" style="height: 50%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 80%;"></div>
											<div class="undone" style="height: 80%;"></div>
										</div>
									</li>
									
									<li>
										<div class="bar">
											<div class="done" style="height: 30%;"></div>
											<div class="undone" style="height: 90%;"></div>
										</div>
									</li>

								</ul>

							</div>
						</div>
					</div>
				</div>
				<!-- Project Timeline -->
				<div class="panel no-padding projectsLogTimeline">
					<div class="inner">
						<div class="panelHeader">
							<h1>Projects Timeline</h1>
						</div>
						<div class="panelContent">
							<div class="line"></div>
							<div class="timelineContainer">
								<?php if (empty($logs)): ?>
									<ul>
										<li data-log="0"> 
											<div class="time"><p><?php echo date('d M, Y H:i:s') ?></p></div>
											<div class="task"><p>No logs found</p></div>
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
<script>

	// Chart Data
	var ChartOptions = {
		title: { display: false },
		legend: { display: false },
		tooltips: { enabled: false },
		responsive: true,
		maintainAspectRatio: false,
		hover: { mode: 'index' },
		scales: {
			xAxes: [{
				display: false,
				gridLines: false,
				scaleLabel: {
					display: true,
					labelString: 'Month'
				}
			}],
			yAxes: [{
				display: false,
				gridLines: false,
				scaleLabel: {
					display: true,
					labelString: 'Value'
				},
				ticks: {
					beginAtZero: true
				}
			}]
		},
		elements: {
			line: {
				tension: 0.19
			},
			point: {
				radius: 4,
				borderWidth: 12
			}
		}
	}

	// Initialize Charts
	<?php foreach ($projects as $project): ?>

		var projectChart<?php echo $project['id'] ?> = $('#projectChart-<?php echo $project['id'] ?>');
		var myChart = new Chart(projectChart<?php echo $project['id'] ?>, {
			type: 'line',
			data: {
				labels: [
					'<?php echo crm\Functions::daysAgo(432000); ?>', 
					'<?php echo crm\Functions::daysAgo(345600); ?>', 
					'<?php echo crm\Functions::daysAgo(259200); ?>', 
					'<?php echo crm\Functions::daysAgo(172800); ?>', 
					'<?php echo crm\Functions::daysAgo(86400); ?>', 
					'<?php echo crm\Functions::daysAgo(); ?>'
				],

				datasets: [{
					data: [
						<?php echo rand(1, 20) ?>,
						<?php echo rand(1, 20) ?>,
						<?php echo rand(1, 20) ?>,
						<?php echo rand(1, 20) ?>,
						<?php echo rand(1, 20) ?>,
						<?php echo rand(1, 20) ?>
					],
					
					backgroundColor: [ 'rgba(0, 175, 178, 0)' ],
					borderColor: [ 'rgba(0, 175, 178, 1)' ],
					pointBackgroundColor: [ 'rgba(0, 175, 178, 1)' ],
					pointBorderColor: [ 'rgba(0, 175, 178, 1)' ],
					pointHoverBackgroundColor: [ 'rgba(0, 175, 178, 1)' ],
					borderWidth: 1 
				}]
			},
			options: ChartOptions
		});
	<?php endforeach ?>

</script>

<script src="/app/includes/js/page.projects.js"></script>