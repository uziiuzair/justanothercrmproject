<?php 
/**
 * Project Page (project.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

/**
 * Get the Project Details
 * @return stdclass
 */
$project_id 		= crm\Routes::getServerRequest('project/id/'); 				# Get Project ID
$project_id 		= stripcslashes($project_id);								# SQL Injection Protection I suppose?

$projectsArray 		= crm\Services\Projects::get($project_id);					# Get Project Details > Into an Array
$client 			= crm\Services\Clients::get($projectsArray->client_id);		# Get Client Details > into an Array
$currency 		 	= crm\Functions::getCurrency($projectsArray->currency_id); 	# Get Currency
$staffAssignedID 	= unserialize($projectsArray->assigned); 					# Get Staff information
$staffAssignedArray = crm\Users::getAllWithID($staffAssignedID); 				# Get Staff information
$staffArray 		= crm\Users::getAll(); 										# Get All Staff (Consider doing this with Ajax)
$milestones 		= crm\Services\Projects::milestones($projectsArray->id); 	# Get All Milestones
$servicesPurchased 	= crm\Services\Services::forProject($projectsArray->id);		# Get All Services Purchased by this Project
$servicesArray 		= crm\Services\Services::all(); 								# All Services
$proposals 			= crm\Services\Proposals::forProject($projectsArray->id); 		# All proposals for this Project
$invoices 			= crm\Services\Invoices::forProject($projectsArray->id); 			# All invoices for this Project
$files 				= crm\Media::forProject($projectsArray->id); 				# All files for this Project

# The following will be moved to the Translation File
$statusTranslation = array('1' => 'Not Started', '2' => 'Pending', '3' => 'Started', '4' => 'Due Soon', '5' => 'Overdue', '6' => 'Done', '7' => 'Awaiting Feedback', '8' => 'Cancelled');

?>
<!-- Bleh -->
<link rel="stylesheet" href="/app/includes/js/datepicker/classic.css">
<link rel="stylesheet" href="/app/includes/js/datepicker/classic.date.css">

<div class="container projectPage">
	
	<div class="wrapper">

		<div class="row debugInformation">
			<!-- <?php print_r($projectsArray); ?>
			<span>client:</span>
			<?php print_r($client); ?>
			<span>Services:</span>
			<?php print_r($servicesPurchased ); ?>
			<span>Staff:</span>
			<?php print_r($staffAssignedArray); ?>
			<span>Milestones:</span>
			<?php print_r($milestones); ?>
			<span>Files:</span>
			<?php print_r($files); ?>
			<span>Proposals:</span>
			<?php print_r($proposals); ?>
			<span>Invoices:</span>
			<?php print_r($invoices); ?> -->
			<!-- <?php print_r($servicesArray) ?> -->
		</div>

		<div class="row clearfix">
			
			<!-- Left Column -->
			<div class="span3 column">
				
				<!-- Business Logo -->
				<div class="panel no-padding projectBusinessLogo">
					<div class="inner">
						<div class="panelContent">
							<div class="clientBusinessLogo">
								<img src="https://crm.envato.dev:8890/app/includes/images/logo.png" alt="">
							</div>
						</div>
					</div>
				</div>

				<!-- Client Information -->
				<div class="panel no-padding projectClientInformation">
					<div class="inner">
						<div class="panelHeader">
							<h1>Client Information</h1>
						</div>
						<div class="panelContent">
							<ul>
								<li>
									<p>
										<span class="icon">
											<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user fa-w-14 fa-3x"><path fill="currentColor" d="M313.6 288c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zM416 464c0 8.8-7.2 16-16 16H48c-8.8 0-16-7.2-16-16v-41.6C32 365.9 77.9 320 134.4 320c19.6 0 39.1 16 89.6 16 50.4 0 70-16 89.6-16 56.5 0 102.4 45.9 102.4 102.4V464zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0-224c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" class=""></path></svg>
										</span> 
										<span class="type">Name:</span> 
										<?php echo $client->firstname . ' ' . $client->lastname ?>
									</p>
								</li>
								<li>
									<p>
										<span class="icon">
											<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-envelope fa-w-16 fa-3x"><path fill="currentColor" d="M464 64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM48 96h416c8.8 0 16 7.2 16 16v41.4c-21.9 18.5-53.2 44-150.6 121.3-16.9 13.4-50.2 45.7-73.4 45.3-23.2.4-56.6-31.9-73.4-45.3C85.2 197.4 53.9 171.9 32 153.4V112c0-8.8 7.2-16 16-16zm416 320H48c-8.8 0-16-7.2-16-16V195c22.8 18.7 58.8 47.6 130.7 104.7 20.5 16.4 56.7 52.5 93.3 52.3 36.4.3 72.3-35.5 93.3-52.3 71.9-57.1 107.9-86 130.7-104.7v205c0 8.8-7.2 16-16 16z" class=""></path></svg>
										</span> 
										<span class="type">Email:</span> 
										<?php echo $client->email ?>
									</p>
								</li>
								<li>
									<p>
										<span class="icon">
											<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="mobile" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-mobile fa-w-10 fa-3x"><path fill="currentColor" d="M192 416c0 17.7-14.3 32-32 32s-32-14.3-32-32 14.3-32 32-32 32 14.3 32 32zM320 48v416c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h224c26.5 0 48 21.5 48 48zm-32 0c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v416c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V48z" class=""></path></svg>
										</span> 
										<span class="type">Phone:</span> 
										<?php echo $client->phone ?>
									</p>
								</li>
								<li>
									<p>
										<span class="icon">
											<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sack" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sack fa-w-16 fa-3x"><path fill="currentColor" d="M334.89 121.63l43.72-71.89C392.77 28.47 377.53 0 352 0H160.15c-25.56 0-40.8 28.5-26.61 49.76l43.57 71.88C-9.27 240.59.08 392.36.08 412c0 55.23 49.11 100 109.68 100h292.5c60.58 0 109.68-44.77 109.68-100 0-19.28 8.28-172-177.05-290.37zM160.15 32H352l-49.13 80h-93.73zM480 412c0 37.49-34.85 68-77.69 68H109.76c-42.84 0-77.69-30.51-77.69-68v-3.36c-.93-59.86 20-173 168.91-264.64h110.1C459.64 235.46 480.76 348.94 480 409z" class=""></path></svg>
										</span> 
										<span class="type">Budget:</span> 
										<?php echo $currency . number_format($projectsArray->budget, 2) ?>
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Quick Menu -->
				<div class="panel no-padding projectQuickMenu">
					<div class="inner">
						<div class="panelHeader">
							<h1>Quick Menu</h1>
						</div>
						<div class="panelContent">
							<div class="projectControls">
								<ul class="clearfix">
									<li><a data-modal="editProject" class="ismodal" href="#editProject">Edit Project</a></li>
									<li><a data-ajax="startProject" class="isajax" href="#startProject">Start Project</a></li>
									<li><a data-modal="assignStaff" class="ismodal" href="#assignStaff">Assign Staff</a></li>
									<li><a data-modal="createProposal" class="ismodal" href="#createProposal">Create Proposal</a></li>
									<li><a data-modal="createInvoice" class="ismodal" href="#createInvoice">Create Invoice</a></li>
									<li><a data-modal="addService" class="ismodal" href="#addService">Add Service</a></li>
									<li><a data-modal="addExpense" class="ismodal" href="#addExpense">Add Expense</a></li>
									<li><a data-modal="addFile" class="ismodal" href="#addFile">Add File</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Assigned Staff -->
				<div class="panel no-padding projectAssignedStaff">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Assigned Staff</h1>
								</div>
								<div class="half">
									<p align="right"><a data-modal="assignStaff" class="ismodal" href="#assignStaff">Add Staff</a></p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<div class="existingStaffWrapper">
								
								<?php foreach ($staffAssignedArray as $staff): ?>

									<!-- Staff -->
									<div class="individualStaff" data-staff-id="<?php echo $staff['id']; ?>">
										<div class="row clearfix">
											<dv class="half">
												<h2 class="staffName"><?php echo $staff['firstname'] . ' ' . $staff['lastname']; ?></h2>
											</dv>
											<dv class="half">
												<p class="staffAssigned">Assigned by <a href="">Uzair Hayat</a></p>
											</dv>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="staffDepartment"><?php echo crm\Users::department($staff['department_id']) ?></p>
											</div>
											<div class="half">
												<p class="staffActions"><a href="#!" data-ajax="removeStaffFromProject" data-staff-id="<?php echo $staff['id']; ?>" class="isajax">Remove</a></p>
											</div>
										</div>
									</div>
									
								<?php endforeach ?>

							</div>
						</div>
					</div>
				</div>
				
				<!-- Move from -->
				<!-- Project Files -->
				<div class="panel no-padding projectFiles">
					
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Files</h1>
								</div>
								<div class="half">
									<p align="right">
										<a data-modal="addInvoice" class="ismodal" href="#addInvoice">Add Files</a>
									</p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<div class="existingFilesWrapper">

								<?php if (empty($files)): ?>
									<div class="noMeetingsWrapper">
										<p>No Files Found. <a class="ismodal" data-modal="uploadFile" href="#">Add One?</a></p>
									</div>
								<?php else: ?>
									<?php foreach ($files as $file): ?>
										
										<!-- File -->
										<div class="individualFile" data-file-id="<?php echo $file['id'] ?>">
											
											<div class="row clearfix">
												<div class="half">
													<h2 class="fileName"><?php echo $file['name'] ?></h2>
												</div>
												<div class="half">
													<p class="fileDate"><?php echo $file['created'] ?></p>
												</div>
											</div>
											<div class="row clearfix">
												<div class="half">
													<p class="fileTag">
														<?php echo $file['tags'] ?>
													</p>
												</div>
												<div class="half">
													<p class="fileActions"><a href="">View</a> . <a href="#!" class="isModal" data-modal="deleteFile">Delete</a></p>
												</div>
											</div>

										</div>

									<?php endforeach ?>
								<?php endif ?>

							</div>
						</div>
					</div>

				</div>
				

				<!-- Project Timeline -->
				<div class="panel no-padding projectTimeline">
					<div class="inner">
						<div class="panelHeader">
							<h1>Project Timeline</h1>
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
			
			<!-- Center Column -->
			<div class="span5 column">
				
				<!-- Project Information -->
				<div class="panel no-padding projectInformation">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Project Information</h1>
								</div>
								<div class="half">
									<p align="right"><a data-modal="editProject" class="ismodal" href="#editProject">Edit Project</a></p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							
							<!-- Project Name -->
							<h1 class="projectName"><?php echo $projectsArray->name; ?></h1>
							<!-- / Project Name -->
							
							<!-- Client Information -->
							<p class="projectClientCompany">
								<?php if (!empty($client->company)): ?>
									<?php echo $client->company; ?>
								<?php else: ?>
									<?php echo $client->firstname . ' ' . $client->lastname; ?>	
								<?php endif ?>
							</p>
							<!-- / Client Information -->

							<!-- Project Information -->
							<div class="row">
								<ul class="clearfix">

									<!-- Deadline to complete the project -->
									<li>
										<h2>Deadline</h2>
										<p><?php echo date('d M, Y', $projectsArray->end); ?></p>
									</li>
									
									<!-- Project Status-->
									<li>
										<h2>Status</h2>
										<p> 
											<?php if (isset($statusTranslation[$projectsArray->status])): ?>
												<?php echo $statusTranslation[$projectsArray->status] ?>
											<?php else: ?>
												Um. Huston, we've got a problem..
											<?php endif ?>
										</p>
									</li>
								
									<!-- Has this project been billed or not? -->
									<li>
										<h2>Billed to Client</h2>
										<p><?php echo $projectsArray->billed = ($projectsArray->billed != 0) ? 'Yes' : 'No' ; ?></p>
									</li>
									
									<!-- Value of the Project as opposed to the Budget suggested by the client -->
									<li>
										<h2>Project Value</h2>
										<p><?php echo $currency . number_format($projectsArray->value, 2) ?></p>
									</li>

								</ul>
							</div>
							<!-- / Project Information -->

						</div>
					</div>
				</div>
				<!-- / Project Information -->
				

				<!-- Project Tasks -->
				<div class="row">
					
					<!--  -->
					<div class="panel projectTaskAdd">
						<div class="inner">
							<div class="panelHeader">
								<h1>Add a Task</h1>
							</div>
							<div class="panelContent">
								<form action="" method="post" id="form-newTask" data-form="newTask" data-task-type="project">

									<input type="hidden" name="tasktype" value="project">
									<input type="hidden" name="project_id" value="<?php echo $projectsArray->id; ?>">
									<input type="hidden" name="staff_id" value="<?php echo crm\Sessions::get('studioUserLogin')->id; ?>">

									<input type="text" name="newTask" class="addFocus" placeholder="Type something here…" required autocomplete="off">

									<div class="row">
										<ul class="clearfix">
											<li>
												<select name="newTaskPriority" id="">
													<option value="-1">Set Priority</option>
													<option value="1">Low</option>
													<option value="2">Medium</option>
													<option value="3">High</option>
													<option value="4">Urgent</option>
												</select>
											</li>
											<li>
												<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline">
											</li>
											<li>
												<select name="newTaskMilestone" id="">
													<option value="-1">Set Milestone</option>
													<option value="0">No Milestone</option>
													<?php foreach ($milestones as $milestone): ?>
													<option value="<?php echo $milestone['id'] ?>"><?php echo $milestone['name'] ?></option>
													<?php endforeach; ?>
												</select>
											</li>
											<li>
												<button class="addFocus">Submit</button>
											</li>
										</ul>
									</div>
								</form>
							</div>
						</div>
					</div>


					<!-- Tasks Container -->
					<div class="projectTasksContainer">
						
						<ul class="list">
							<li>
								<div class="panel projectTask" data-task="2" data-project='1'>
									<div class="inner">
										<div class="panelHeader">
											<h1>RE: Could you add the following links to the website?</h1>
										</div>
										<div class="panelContent">
											<p>Hey Uzair, could you add the following links to the Selectionne website? I will need these by next Monday.  I hope that would be possible?</p>

											<form action="" data-task="2" data-project='1' id="form-tasksUpdate">
												<div class="row">
													<ul class="clearfix">
														<li>
															<select name="newTaskPriority" id="">
																<option value="-1">Set Priority</option>
																<option value="1">Low</option>
																<option value="2">Medium</option>
																<option value="3">High</option>
																<option value="4">Urgent</option>
															</select>
														</li>
														<li>
															<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline">
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div>
							</li>
						</ul>

					</div>

				</div>

			</div>
		
			<!-- Right Column -->
			<div class="span4 column">
				
				<!-- Project Milestones -->
				<div class="panel no-padding projectMilestones">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Project Milestones</h1>
								</div>
								<div class="half">
									<p align="right">
										<a data-modal="addMilestone" class="ismodal" href="#addMilestone">Add Milestone</a>
									</p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<?php if (empty($milestones)): ?>
								<p style="margin-bottom: 0;">No Milestones Found. <a class="ismodal" data-modal="addMilestone" href="#">Create One?</a></p>
							<?php else: ?>
								<div class="line"></div>
								<div class="timelineContainer">
								<ul>
								<?php foreach ($milestones as $milestone): ?>
									<li class="milestone" id="milestone-<?php echo $milestone['id'] ?>" data-milestone-id="<?php echo $milestone['id'] ?>" data-milestone-due="<?php echo $milestone['end'] ?>"> 
										<div class="row clearfix">
											<div class="half">
												<div class="time"><p><?php echo date('d M, Y H:i:s', $milestone['end']) ?></p></div>
												<div class="task"><p><?php echo $milestone['name'] ?></p></div>
											</div>
											<div class="half">
												<style>
													#milestone-<?php echo $milestone['id'] ?> .progress:before { width: <?php echo $milestone['progress'] ?>%; }
												</style>
												<div class="progress" data-progress="<?php echo $milestone['progress'] ?>"></div>
											</div>
										</div>
									</li>
								<?php endforeach ?>
								</ul>
								</div>
							<?php endif ?>
						</div>
					</div>
				</div>

				<!-- Projects Services -->
				<div class="panel no-padding projectServices">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Services</h1>
								</div>
								<div class="half">
									<p align="right">
										<a data-modal="addService" class="ismodal" href="#addService">Add Services</a>
									</p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<div class="existingServicesWrapper">

								<?php foreach ($servicesPurchased as $service): ?>

									<?php $serviceDetails = crm\Services\Services::get(array($service['service_id'])); ?>

									<!-- Service -->
									<div class="individualService" data-service-id="<?php echo $service['service_id'] ?>">
										<div class="row clearfix">
											<dv class="half">
												<h2 class="serviceName"><?php echo $serviceDetails[0]['name'] ?></h2>
											</dv>
											<dv class="half">
												<p class="servicePrice"><?php echo $currency . number_format($service['salePrice'], 2); ?></p>
											</dv>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="serviceCategory"><?php echo $serviceDetails[0]['description'] ?></p>
											</div>
											<div class="half">
												<p class="serviceActions"><a href="#!">View</a> . <a href="#!">Edit</a> . <a href="#!">Delete</a></p>
											</div>
										</div>
									</div>
									
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>

				<!-- Project Expenses -->
				<div class="panel no-padding projectExpenses">
					
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Expenses</h1>
								</div>
								<div class="half">
									<p align="right">
										<a data-modal="addInvoice" class="ismodal" href="#addInvoice">Add Expenses</a>
									</p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<div class="existingExpensesWrapper">
								
								<!-- Expense -->
								<div class="individualExpense" data-expense-id="">
									<div class="row clearfix">
										<dv class="half">
											<h2 class="expenseName">Web Hosting</h2>
										</dv>
										<dv class="half">
											<p class="expensePrice">$12,000.00</p>
										</dv>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="expenseCategory">Web Hosting</p>
										</div>
										<div class="half">
											<p class="expenseActions"><a href="">View</a> . <a href="">Edit</a> . <a href="">Delete</a></p>
										</div>
									</div>
								</div>
								
								<!-- Expense -->
								<div class="individualExpense" data-expense-id="">
									<div class="row clearfix">
										<dv class="half">
											<h2 class="expenseName">Branding & Identity</h2>
										</dv>
										<dv class="half">
											<p class="expensePrice">$12,000.00</p>
										</dv>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="expenseCategory">Web Hosting</p>
										</div>
										<div class="half">
											<p class="expenseActions"><a href="">View</a> . <a href="">Edit</a> . <a href="">Delete</a></p>
										</div>
									</div>
								</div>
								
								<!-- Expense -->
								<div class="individualExpense" data-expense-id="">
									<div class="row clearfix">
										<dv class="half">
											<h2 class="expenseName">Security & Management</h2>
										</dv>
										<dv class="half">
											<p class="expensePrice">$12,000.00</p>
										</dv>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="expenseCategory">Web Hosting</p>
										</div>
										<div class="half">
											<p class="expenseActions"><a href="">View</a> . <a href="">Edit</a> . <a href="">Delete</a></p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>


				<!-- Move to -->
				<!-- Proposal & Invoices -->
				<div class="panel no-padding projectProposalsInvoices">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Proposals & Invoices</h1>
								</div>
								<div class="half">
									<p align="right">
										<a data-modal="addInvoice" class="ismodal" href="#addInvoice">Add Invoice</a> . 
										<a data-modal="addProposal" class="ismodal" href="#addProposal">Add Proposal</a>
									</p>
								</div>
							</div>
						</div>
						<div class="panelContent">
							<div class="existingProposalWrapper">
								
								<!-- Proposal -->
								<div class="individualProposal" data-proposal-id="">
									<div class="row clearfix">
										<dv class="half">
											<h2 class="proposalName">Proposal #0001</h2>
										</dv>
										<dv class="half">
											<p class="proposalDate">Accepted on May 3, 2019</p>
										</dv>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="proposalStatus">Accepted</p>
										</div>
										<div class="half">
											<p class="proposalActions"><a href="">View</a> . <a href="">Edit</a> . <a href="">Delete</a></p>
										</div>
									</div>
								</div>

								<!-- Invoice -->
								<div class="individualProposal" data-proposal-id="">
									<div class="row clearfix">
										<dv class="half">
											<h2 class="proposalName">Invoice #0001</h2>
										</dv>
										<dv class="half">
											<p class="proposalDate">Due on May 23, 2019</p>
										</dv>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="proposalStatus">Unpaid</p>
										</div>
										<div class="half">
											<p class="proposalActions"><a href="">View</a> . <a href="">Edit</a> . <a href="">Delete</a></p>
										</div>
									</div>
								</div>

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
	

	<!-- MODAL: Edit Project -->
	<div class="modal this-editProject" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Edit Project</h1>
			</div>

			<div class="modalContent">

				<form action="#" id="form-projectUpdate" data-projectID="<?php echo $projectsArray->id; ?>">
					
					<div class="row clearfix">
						<label for="projectName">Project Name</label><input id="projectName" type="text" name="projectName" value="<?php echo $projectsArray->name; ?>">
					</div>

					<div class="row clearfix">
						<div class="half">
							<label for="projectStart">Project Start</label><input id="projectStart" class="datepicker" type="text" name="projectStart" value="<?php echo date('d F, Y', $projectsArray->start); ?>">
						</div>
						<div class="half">
							<label for="projectEnd">Project End</label><input id="projectEnd" class="datepicker"type="text" name="projectEnd" value="<?php echo date('d F, Y', $projectsArray->end); ?>">
						</div>
					</div>
					
					<div class="row clearfix">
						<div class="third">
							<label for="projectBudget">Project Budget</label><input id="projectBudget" type="text" name="projectBudget" value="<?php echo $projectsArray->budget; ?>">
						</div>
						<div class="third">
							<label for="projectValue">Project Value</label><input id="projectValue" type="text" name="projectValue" value="<?php echo $projectsArray->value; ?>">
						</div>
						<div class="third">
							<label for="projectStatus">Project Status</label>
							<select name="projectStatus" class="selectbox"  id="projectStatus">
								<option value="<?php echo $projectsArray->status; ?>"><?php echo $statusTranslation[$projectsArray->status]; ?></option>
								<option value="1">Not Started</option>
								<option value="2">Pending</option>
								<option value="3">Started</option>
								<option value="4">Due Soon</option>
								<option value="5">Overdue</option>
								<option value="6">Done</option>
								<option value="7">Awaiting Feedback</option>
								<option value="8">Cancelled</option>
							</select>
						</div>
					</div>

					<div class="row clearfix">
						<label for="projectDescription">Project Description</label>
						<textarea id="projectDescription" type="text" name="projectDescription"><?php echo $projectsArray->description; ?></textarea>
					</div>

					<div class="row clearfix">
						<button>Update Project</button>
					</div>

				</form>
				
			</div>

		</div>

	</div>
	<!-- / MODAL: Edit Project -->


	<!-- MODAL: Add Milestone -->
	<div class="modal this-addMilestone" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Add Milestone</h1>
			</div>

			<div class="modalContent">

				<form action="#" id="form-addMilestone" data-projectID="<?php echo $projectsArray->id; ?>">

					<input type="hidden" name="project_id" value="<?php echo $projectsArray->id; ?>">

					<div class="row clearfix">
						<label for="projectMilestoneName">Milestone Name</label><input id="projectMilestoneName" type="text" name="projectMilestoneName" placeholder="">
					</div>

					<div class="row clearfix">
						<div class="third">
							<label for="projectMilestoneStart">Start Date</label><input id="projectMilestoneStart" class="datepicker" type="text" name="projectMilestoneStart" placeholder="Start Date">
						</div>
						<div class="third">
							<label for="projectMilestoneEnd">End End</label><input id="projectMilestoneEnd" class="datepicker" type="text" name="projectMilestoneEnd" placeholder="End Date">
						</div>
					</div>

					<div class="row clearfix">
						<button>Add Milestone</button>
					</div>

				</form>

			</div>

		</div>

	</div>
	<!-- / MODAL: Add Milestone -->



	<!-- MODAL: Assign Staff -->
	<div class="modal this-assignStaff" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Assign Staff</h1>
			</div>

			<div class="modalContent">

				<form action="#" id="form-assignStaff" data-projectID="<?php echo $projectsArray->id; ?>">

					<div class="row clearfix">
						<label for="assignedStaff">Select Staff</label>
						<select name="assignedStaff" class="selectbox"  id="assignedStaff">
							<?php foreach ($staffArray as $staff): ?>
								<option value="<?php echo $staff['id']; ?>"><?php echo $staff['firstname'] . ' ' . $staff['lastname']; ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="row clearfix">
						<button>Assign Staff</button>
					</div>

				</form>

			</div>

		</div>

	</div>
	<!-- / MODAL: Assign Staff -->



	<!-- MODAL: Add Service -->
	<div class="modal this-addService" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Add Service</h1>
			</div>

			<div class="modalContent">

				<form action="#" id="form-addService" data-projectID="<?php echo $projectsArray->id; ?>">

					<div class="row clearfix">
						<label for="theService">Select Service</label>
						<select name="theService" class="selectbox"  id="theService">
							<?php foreach ($servicesArray as $service): ?>
								<?php if ($service['disabled'] != 1): ?>
									<option value="<?php echo $service['id']; ?>"><?php echo $service['name']; ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>

					<div class="row clearfix">
						<div class="half">
							<label for="servicePurchasePrice">Purchase Price</label>
							<input id="servicePurchasePrice" type="text" name="servicePurchasePrice" placeholder="">
						</div>
						<div class="half">
							<label for="serviceSalePrice">Sale Price</label>
							<input id="serviceSalePrice" type="text" name="serviceSalePrice" placeholder="">
						</div>
					</div>

					<div class="row clearfix">
						<button>Add Service</button>
					</div>

				</form>

			</div>

		</div>

	</div>
	<!-- / MODAL: Add Service -->



</div>

<!-- More Bleh -->
<script src="/app/includes/js/datepicker/picker.js"></script>
<script src="/app/includes/js/datepicker/picker.date.js"></script>
<script src="/app/includes/js/dropzone.js"></script>
<script src="/app/includes/js/page.project.js"></script>