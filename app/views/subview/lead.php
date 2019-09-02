<?php 
/**
 * Lead Page (lead.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;
use uziiuzair\crm\Services\Leads as Leads;
use uziiuzair\crm\Services\Tasks as Tasks;
use uziiuzair\crm\Functions as Functions;
use uziiuzair\crm\Users as Users;

$lead_id = crm\Routes::getServerRequest('leads/id/');
$lead_id = stripcslashes($lead_id);
$leadArray = Leads::get($lead_id);

$gravatar 			= Leads::getBusinessLogo($leadArray->email); 		# User Logo (Uploaded or Gravatar)
$logs 	  			= Functions::getlogs('lead_log', $leadArray->id);	# User Logs
$meetings 			= '';
$proposals 			= '';
$tasks 				= Tasks::get($leadArray->id, 'lead');
$countries			= Functions::getCountries();
$staffAssignedID 	= unserialize($leadArray->assigned); 				# Get Staff information
$staffAssignedArray = Users::getAllWithID($staffAssignedID); 			# Staff Array

?>
<div class="container leadPage">
	
	<div class="wrapper">
		
		<div class="row debugInformation">
			<span>lead:</span>
			<?php print_r($leadArray); ?>
			<span>logs:</span>
			<?php print_r($logs); ?>
			<span>tasks:</span>
			<?php print_r($tasks); ?>
			<span>proposals:</span>
			<?php print_r($proposals); ?>
		</div>

		<div class="row clearfix">

			<!-- Section 1 -->
			<div class="span3 column">
				
				<!-- Client Gravatar Photo -->
				<div class="panel no-padding">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="leadProfilePicture" style="background-image: url(<?php echo $gravatar; ?>)"></div>

							<div class="leadControls">
								<ul class="clearfix">
									<li><a data-modal="editLeadProfile" class="ismodal" href="#editProfile">Edit Profile</a></li>
									<li><a data-modal="convertToClient" class="ismodal" href="#editProfile">Convert to Client</a></li>
									<li><a data-modal="uploadPhoto" 	class="ismodal" href="#editProfile">Upload Photo</a></li>
									<li><a data-ajax="deleteLead" 		data-id="<?php echo $leadArray->id; ?>" data-delete-active="0" href="#deleteLead">Delete Lead</a></li>
									<li><a data-ajax="markLeadAsLost" 	data-id="<?php echo $leadArray->id; ?>" href="#markAsLost">Mark as Lost</a></li>
									<li><a data-ajax="markLeadAsJunk" 	data-id="<?php echo $leadArray->id; ?>" href="#masAsJunk">Mark as Junk</a></li>
								</ul>
							</div>

						</div>			
					</div>
				</div>

				<!-- Assigned Staff -->
				<div class="panel no-padding leadAssignedStaff">
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
												<p class="staffDepartment">Marketing Department</p>
											</div>
											<div class="half">
												<p class="staffActions"><a href="#!">Remove</a></p>
											</div>
										</div>
									</div>
									
								<?php endforeach ?>

							</div>
						</div>
					</div>
				</div>

				<!-- Client Timeline -->
				<div class="panel leadTimeline no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Timeline</h1>
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
			
			<!-- Section 2 -->
			<div class="span5 column">
				
				<!--  -->
				<div class="panel clientInformation">
					<div class="inner">
						<div class="panelHeader">
							<h1>Lead Information</h1>
						</div>			
						<div class="panelContent">
							
							<div class="row">
								<h2 class="clientName"><?php echo  $leadArray->honorific . ' '. $leadArray->name; ?></h2>
								<p class="clientCompany"><?php echo $leadArray->company; ?></p>
							</div>

							<div class="row clientInfoMisc">
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-envelope"></i>
										</span> Email:
									</span> 
									<span class="span-right"><?php echo $leadArray->email; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-mobile"></i>
										</span> Phone:
									</span> 
									<span class="span-right"><?php echo $leadArray->phone; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-map-marker"></i>
										</span> Address Street:
									</span> 
									<span class="span-right"><?php echo $leadArray->addressStreet; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> City:
									</span> 
									<span class="span-right"><?php echo $leadArray->addressCity; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> State:
									</span> 
									<span class="span-right"><?php echo $leadArray->addressState; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> Postal Code:
									</span> 
									<span class="span-right"><?php echo $leadArray->addressZip; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-globe-<?php echo strtolower(Functions::getCountry($leadArray->addressCountry, 'continent')); ?>"></i>
										</span> Country:
									</span> 
									<span class="span-right"><?php echo Functions::getCountry($leadArray->addressCountry); ?></span>
								</p>
							</div>

						</div>			
					</div>
				</div>

				<!--  -->
				<div class="panel clientTaskAdd">
					<div class="inner">
						<div class="panelHeader">
							<h1>Add a Task</h1>
						</div>
						<div class="panelContent">
							<form action="" method="post" id="form-newTask" data-form="newTask" data-task-type="client">
								
								<input type="hidden" name="tasktype" value="lead">
								<input type="hidden" name="lead_id" value="<?php echo $leadArray->id; ?>">
								<input type="hidden" name="staff_id" value="<?php echo crm\Sessions::get('studioUserLogin')->id; ?>">
								
								<input type="text" name="newTask" class="addFocus" placeholder="Type something here…" required autocomplete="off">
								<div class="row">
									<ul class="clearfix">
										<li>
											<select name="newTaskPriority" id="">
												<option value="2">Set Priority</option>
												<option value="1">Low</option>
												<option value="2">Medium</option>
												<option value="3">High</option>
												<option value="4">Urgent</option>
											</select>
										</li>
										<li>
											<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline" required>
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


				<div class="clientTasksContainer">

					<ul class="list">
						<?php $reversedTasks = array_reverse($tasks); ?>
						<?php foreach ($reversedTasks as $task): ?>
						<li>
							<div class="panel clientTask" data-task="<?php echo $task['id'] ?>" data-project='<?php echo $task['project_id'] ?>'>
								<div class="inner">
									<div class="panelHeader">
										<h1>RE: <?php 
										if (strlen($task['name']) >= 27) {
										    echo substr($task['name'], 0, 25). "...";
										}
										else {
										    echo $task['name'];
										} 
										?></h1>
									</div>
									<div class="panelContent">
										<p><?php echo $task['description'] ?></p>

										<form action="" data-task="<?php echo $task['id'] ?>" data-project='<?php echo $task['project_id'] ?>' id="form-tasksUpdate">
											<div class="row">
											<ul class="clearfix">
												<li>
													<select name="newTaskPriority" id="">
														<option selected value="<?php echo $task['priority'] ?>"><?php echo Tasks::translatePriority($task['priority']); ?></option>
														<option value="2">Set Priority</option>
														<option value="1">Low</option>
														<option value="2">Medium</option>
														<option value="3">High</option>
														<option value="4">Urgent</option>
													</select>
												</li>
												<li>
													<input class="datepicker" name="newTaskDeadline" placeholder="Set Deadline" value="<?php echo date('d F, Y', $task['end']) ?>">
												</li>
											</ul>
										</div>
										</form>
									</div>
								</div>
							</div>
						</li>
						<?php endforeach ?>

					</ul>
				



				</div>

			</div>
			
			<!-- Section 3 -->
			<div class="span4 column">
				
				<!--  -->
				<div class="panel leadProposals no-padding">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Proposals</h1>
								</div>
								<div class="half">
									<p><a href="#AddReminder" class="ismodal" data-modal="createLeadProposal">Add Proposal</a></p>
								</div>
							</div>
						</div>			
						<div class="panelContent">
							
							<?php if (empty($proposals)): ?>
								<div class="noProposalsWrapper">
									<p>No Proposals Found. <a class="ismodal" data-modal="createLeadProposal" href="#">Create One?</a></p>
								</div>
							<?php else: ?>
								<div class="existingProposalsWrapper">
								<?php foreach ($proposals as $proposal): ?>
									
									<div class="individualProposal" data-project-id="<?php //echo $project['id'] ?>">
										
										<div class="row clearfix">
											<div class="half">
												<h2 class="proposalName"><?php //echo Functions::generateString($proposal['name'], 35) ?></h2>
											</div>
											<div class="half">
												<p class="proposalValue"><?php //echo Functions::getCurrency($proposal['currency_id'], 'prefix') . number_format($proposal['value'],2) ?></p>
											</div>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="proposalDescription"><?php //echo $proposal['description'] ?></p>
											</div>
											<div class="half">
												<p class="proposalActions">
													<a href="<?php //echo crm\Config::SystemPublicURL; ?>proposal/id/<?php //echo $proposal['id'] ?>">View</a> . 
													<a href="#!" class="isModal" data-modal="editProposal">Edit</a> . 
													<a href="#!" class="isModal" data-modal="deleteProposal">Delete</a>
												</p>
											</div>
										</div>

									</div>
										
								<?php endforeach ?>
								</div>
							<?php endif ?>

						</div>			
					</div>
				</div>
				
				<!--  -->
				<div class="panel clientInvoices no-padding">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="half">
									<h1>Reminders</h1>
								</div>
								<div class="half">
									<p><a href="#AddReminder" class="ismodal" data-modal="createLeadReminder">Add Reminder</a></p>
								</div>
							</div>
						</div>			
						<div class="panelContent">
							
							<?php if (!empty($invoices)): ?>
								<div class="noInvoicesWrapper">
									<p>No Invoices Found. <a class="ismodal" data-modal="createLeadReminder" href="#">Create One?</a></p>
								</div>
							<?php else: ?>
								<div class="existingInvoicesWrapper">
									
									<?php //foreach ($invoices as $invoice): ?>
										
									<div class="individualInvoice" data-invoice-id="">
										
										<div class="row clearfix">
											<div class="half">
												<h2 class="invoiceName">Invoice #001</h2>
											</div>
											<div class="half">
												<p class="invoiceDue">Due on May 23, 2019</p>
											</div>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="invoiceStatus">Unpaid</p>
											</div>
											<div class="half">
												<p class="invoiceActions"><a href="">View</a> . <a href="#!" class="isModal" data-modal="deleteInvoice">Delete</a></p>
											</div>
										</div>

									</div>

									<?php //endforeach ?>
								</div>
							<?php endif ?>

						</div>			
					</div>
				</div>

			</div>

		</div>

	</div>

</div>

<!-- Modal Container -->
<div class="modalContainer">
	
	<!-- Edit Lead Profile -->
	<div class="modal this-editLeadProfile" style="display:none;position:fixed; top:0; left:0;">
		
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
				<h1>Edit Lead Profile</h1>
			</div>

			<div class="modalContent">
				
				<form action="" id="form-leadUpdate" data-clientID="<?php echo $leadArray->id; ?>">
					
					<div class="row clearfix">
						<div class="span2 padding-right">
							
							<label for="leadUpdateTitle">Title</label>
							
							<select 
								id="leadUpdateTitle" 
								name="leadUpdateTitle" 
								class="selectbox" 
								>
								<option value="<?php echo $leadArray->honorific; ?>" selectec><?php echo $leadArray->honorific; ?></option>
								<option value="Mr.">Mr.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
								<option value="Ms.">Ms.</option>
								<option value="Sir.">Sir.</option>
								<option value="Dr.">Dr.</option>
								<option value="Lady">Lady</option>
								<option value="Lord">Lord</option>
							</select>
						
						</div>
						
						<div class="span5 padding-left padding-right">
							
							<label for="leadUpdateName">Name</label>
							<input 
								placeholder="<?php echo $leadArray->name; ?>" 
								value="<?php echo $leadArray->name; ?>" 
								name="leadUpdateName"  
								id="leadUpdateName" 
								type="text" 
								>
						
						</div>
						
						<div class="span5 padding-left">
						
							<label for="leadUpdateCompany">Company</label>
							<input 
								placeholder="<?php echo $leadArray->company; ?>" 
								value="<?php echo $leadArray->company; ?>" 
								name="leadUpdateCompany" 
								id="leadUpdateCompany" 
								type="text" 
								>
						
						</div>
					</div>

					<div class="row clearfix">
						
						<div class="half">
						
							<label for="leadUpdateStatus">Status</label>
							<select 
								name="leadUpdateStatus" 
								class="selectbox" 
								id="leadUpdateStatus" >
								<option selected value="<?php echo $leadArray->status; ?>"><?php echo Leads::translateStatus($leadArray->status); ?></option>
								<option value="1">New</option>
								<option value="2">Contacted</option>
								<option value="3">Working</option>
								<option value="4">Qualified</option>
								<option value="5">Unqualified</option>
								<option value="6">Lost</option>
								<option value="7">Junk</option>
							</select>
						
						</div>
						<div class="half">
						
							<label for="leadUpdateSource">Source</label>
							<input 
								id="leadUpdateSource" 
								type="text" 
								name="leadUpdateSource" 
								placeholder="<?php echo $leadArray->source; ?>" 
								>
						
						</div>
					</div>

					<div class="row clearfix">
						<div class="third">
						
							<label for="leadUpdateEmail">Email</label>
							<input 
								id="leadUpdateEmail" 
								type="email" 
								name="leadUpdateEmail" 
								placeholder="<?php echo $leadArray->email; ?>" 
								>
						
						</div>
						<div class="third">
						
							<label for="leadUpdatePhone">Phone</label>
							<input 
								id="leadUpdatePhone" 
								type="text" 
								name="leadUpdatePhone" 
								placeholder="<?php echo $leadArray->phone; ?>" 
								>
						
						</div>
						<div class="third">
						
							<label for="leadUpdateWebsite">Website</label>
							<input 
								id="leadUpdateWebsite" 
								type="url" 
								name="leadUpdateWebsite" 
								placeholder="<?php echo $leadArray->website; ?>" 
								>
						
						</div>
					</div>

					<div class="row clearfix">
						<div class="half">
						
							<label for="leadUpdateCompany">Company</label>
							<input 
								id="leadUpdateCompany" 
								type="title" 
								name="leadUpdateCompany" 
								placeholder="<?php echo $leadArray->company; ?>" 
								>
						
						</div>
						<div class="half">
						
							<label for="leadUpdateCompanyTitle">Title</label>
							<input 
								id="leadUpdateCompanyTitle" 
								type="text" 
								name="leadUpdateCompanyTitle" 
								placeholder="<?php echo $leadArray->title; ?>" 
								>
						
						</div>
					</div>

					<div class="row clearfix">
						<div class="span12">
						
							<label for="leadUpdateCompanyStreet">Address Street</label>
							<input 
								id="leadUpdateCompanyStreet" 
								type="title" 
								name="leadUpdateCompanyStreet" 
								placeholder="<?php echo $leadArray->addressStreet; ?>" 
								>
						
						</div>
					</div>

					<div class="row clearfix">
						<div class="span3 padding-right">
						
							<label for="leadUpdateCompanyCity">City</label>
							<input 
								id="leadUpdateCompanyCity" 
								type="title" 
								name="leadUpdateCompanyCity" 
								placeholder="<?php echo $leadArray->addressCity; ?>" 
								>
						
						</div>
						<div class="span3 padding-left padding-right">
						
							<label for="leadUpdateCompanyState">State</label>
							<input 
								id="leadUpdateCompanyState" 
								type="title" 
								name="leadUpdateCompanyState" 
								placeholder="<?php echo $leadArray->addressState; ?>" 
								>
						
						</div>
						<div class="span3 padding-left padding-right">
						
							<label for="leadUpdateCompanyZip">Zip</label>
							<input 
								id="leadUpdateCompanyZip" 
								type="title" 
								name="leadUpdateCompanyZip" 
								placeholder="<?php echo $leadArray->addressZip; ?>" 
								>
						
						</div>
						<div class="span3 padding-left">
							
							<label for="leadUpdateCompanyCountry">Country</label>
							<select 
								name="leadUpdateCompanyCountry" 
								id="leadUpdateCompanyCountry" 
								class="selectbox" 
								>
								
								<option value="<?php echo $leadArray->addressCountry; ?>" selected><?php echo Functions::getCountry($leadArray->addressCountry); ?></option>
								<?php foreach ($countries as $country): ?>
								<option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
								<?php endforeach ?>
							
							</select>
						
						</div>
					</div>

					<div class="row clearfix">
						<div class="span6">
							<button class="submitting">
								<span class="showProgress" style="display: none; padding-right:10px;"><i class="fa fa-spinner fa-spin"></i></span>
								<span class="initial">Update Lead</span>
							</button>
						</div>
						<div class="span6">
							<p class="errorContainer" style="text-align:right; display:none;"></p>
						</div>
					</div>

				</form>


			</div>
		</div>

	</div>
	<!-- / Edit Lead Profile -->



	<!-- Convert to Client -->
	<div class="modal this-convertToClient" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Convert to Client</h1>
			</div>

			<div class="modalContent"></div>
		</div>

	</div>
	<!-- / Convert to Client -->

	<!-- Upload Photo -->
	<div class="modal this-uploadPhoto" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Upload Photo</h1>
			</div>

			<div class="modalContent"></div>
		</div>

	</div>
	<!-- / Upload Photo -->

	<!-- Delete Lead -->
	<div class="modal this-deleteLead" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Delete Lead</h1>
			</div>

			<div class="modalContent"></div>
		</div>

	</div>
	<!-- / Delete Lead -->

	<!-- Create Lead Proposal -->
	<div class="modal this-createLeadProposal" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Lead Proposal</h1>
			</div>

			<div class="modalContent"></div>
		</div>

	</div>
	<!-- / Create Lead Proposal -->

	<!-- Create Lead Reminder -->
	<div class="modal this-createLeadReminder" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Lead Reminder</h1>
			</div>

			<div class="modalContent"></div>
		</div>

	</div>
	<!-- / Create Lead Reminder -->

</div>
<script src="/app/includes/js/page.lead.js"></script>