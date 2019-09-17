<?php 
/**
 * Client Page (client.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$customer_id = crm\Routes::getServerRequest('clients/id/');
$customer_id = stripcslashes($customer_id);
$clientArray = crm\Services\Clients::get($customer_id);

$gravatar = crm\Services\Clients::getBusinessLogo($clientArray->email);
$projects = crm\Services\Projects::forClient($clientArray->id);
$invoices = crm\Services\Invoices::forClient($clientArray->id);
$logs 	  = crm\Functions::getlogs('client_log', $customer_id);
$services = '';
$notes 	  = '';
$meetings = '';
$tasks 	  = crm\Services\Tasks::get($clientArray->id, 'client');

?>
<div class="container clientPage">
	
	<div class="wrapper">

		<div class="row clearfix">
			
			<!-- Section 1 -->
			<div class="span3 column">
				
				<!-- Client Gravatar Photo -->
				<div class="panel no-padding">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="clientProfilePicture" style="background-image: url(<?php echo $gravatar; ?>)"></div>

							<div class="clientControls">
								<ul class="clearfix">
									<li><a data-modal="editClientProfile" class="ismodal" href="#editProfile">Edit Profile</a></li>
									<li><a data-ajax="allowClientLogin" class="isajax" href="#allowClientLogin">Allow Client Login</a></li>
									<li><a data-modal="uploadClientPhoto" class="ismodal" href="#uploadPhoto">Upload Photo</a></li>
									<li><a data-modal="deleteThisClient" class="ismodal" href="#deleteClient">Delete Client</a></li>
								</ul>
							</div>

						</div>			
					</div>
				</div>


				<!-- Client Timeline -->
				<div class="panel clientTimeline no-padding">
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

				<!-- Client Files -->
				<div class="panel clientFiles">
					<div class="inner">
						<div class="panelHeader">
							<h1>Files</h1>
						</div>
						<div class="panelContent">
							<div class="existingFilesWrapper">
								
								<div class="individualFile" data-file-id="">
									
									<div class="row clearfix">
										<div class="half">
											<h2 class="fileName">Web Hosting Proposal</h2>
										</div>
										<div class="half">
											<p class="fileDate">May 23, 2019</p>
										</div>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="fileTag">Proposals</p>
										</div>
										<div class="half">
											<p class="fileActions"><a href="">View</a> . <a href="#!" class="isModal" data-modal="deleteFile">Delete</a></p>
										</div>
									</div>

								</div>

								<div class="individualFile" data-file-id="">
									
									<div class="row clearfix">
										<div class="half">
											<h2 class="fileName">Web Hosting Proposal</h2>
										</div>
										<div class="half">
											<p class="fileDate">May 23, 2019</p>
										</div>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="fileTag">Proposals</p>
										</div>
										<div class="half">
											<p class="fileActions"><a href="">View</a> . <a href="#!" class="isModal" data-modal="deleteFile">Delete</a></p>
										</div>
									</div>

								</div>

								<div class="individualFile" data-file-id="">
									
									<div class="row clearfix">
										<div class="half">
											<h2 class="fileName">Web Hosting Proposal</h2>
										</div>
										<div class="half">
											<p class="fileDate">May 23, 2019</p>
										</div>
									</div>
									<div class="row clearfix">
										<div class="half">
											<p class="fileTag">Proposals</p>
										</div>
										<div class="half">
											<p class="fileActions"><a href="">View</a> . <a href="#!" class="isModal" data-modal="deleteFile">Delete</a></p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Client Notes -->
				<div class="panel clientNotes">
					<div class="inner">
						<div class="panelHeader">
							<h1>Notes</h1>
						</div>
						<div class="panelContent">
							<p>#clientNotes</p>
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
							<h1>Client Information</h1>
						</div>			
						<div class="panelContent">
							
							<div class="row">
								<h2 class="clientName"><?php echo $clientArray->firstname . ' ' . $clientArray->lastname; ?></h2>
								<p class="clientCompany"><?php echo $clientArray->company; ?></p>
							</div>

							<div class="row clientInfoMisc">
								<p>
									<span>
										<span class="svgContainer">
											<i class="fal fa-envelope"></i>
										</span> Email:
									</span> <?php echo $clientArray->email; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fal fa-mobile"></i>
										</span> Phone:
									</span> 
									<?php echo $clientArray->phone; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fal fa-map-marker"></i>
										</span> Address:
									</span> 
									<?php echo $clientArray->address; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> City:
									</span> 
									<?php echo $clientArray->city; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> State:
									</span> 
									<?php echo $clientArray->state; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fa fa-"></i>
										</span> Postal Code:
									</span> 
									<?php echo $clientArray->zip; ?>
								</p>
								<p>
									<span>
										<span class="svgContainer">
											<i class="fal fa-globe-<?php echo strtolower(crm\Functions::country($clientArray->country, 'continent')); ?>"></i>
										</span> Country:
									</span> 
									<?php echo crm\Functions::country($clientArray->country); ?>
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

								<input type="hidden" name="tasktype" value="client">
								<input type="hidden" name="client_id" value="<?php echo $clientArray->id; ?>">
								<input type="hidden" name="staff_id" value="<?php echo crm\Sessions::get('studioUserLogin')->id; ?>">

								<input type="text" name="newTask" class="addFocus" placeholder="Type something here…" required autocomplete="off">

								<div class="row">
									<ul class="clearfix">
										<li>
											<select name="newTaskPriority" id="" required>
												<option value="0">Set Priority</option>
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
											<select name="newTaskProhect" id="">
												<option value="-1">Select Project</option>
												<option value="0">No Project</option>
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


				<div class="clientTasksContainer" id="clientTasks">
					
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
														<?php if ($task['priority'] != 0): ?>
															<option selected value="<?php echo $task['priority'] ?>"><?php echo crm\Services\Tasks::translatePriority($task['priority']); ?></option>
														<?php endif ?>
														<option value="0">Set Priority</option>
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

					<div class="paginationContainer">
						<ul class="pagination"></ul>
					</div>



				</div>
			
			</div>

			<!-- Section 3 -->
			<div class="span4 column">

				<div class="panel no-padding revenue">
					<div class="inner">
						<div class="panelContent">
							<canvas id="revenueByClient" style="height:270px; width:100%"></canvas>
						</div>
					</div>
				</div>
				
				<!--  -->
				<div class="panel clientProjects no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Projects</h1>
						</div>			
						<div class="panelContent">
							
							<?php if (empty($projects)): ?>
								<div class="noProjectsWrapper">
									<p>No Projects Found. <a class="ismodal" data-modal="createProject" href="#">Create One?</a></p>
								</div>
							<?php else: ?>
								<div class="existingProjectsWrapper">
								<?php foreach ($projects as $project): ?>
									
									<div class="individualProject" data-project-id="<?php echo $project['id'] ?>">
										
										<div class="row clearfix">
											<div class="half">
												<h2 class="projectName"><?php echo crm\Functions::generateString($project['name'], 35) ?></h2>
											</div>
											<div class="half">
												<p class="projectValue"><?php echo crm\Functions::getCurrency($project['currency_id'], 'prefix') . number_format($project['value'],2) ?></p>
											</div>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="projectDescription"><?php echo $project['description'] ?></p>
											</div>
											<div class="half">
												<p class="projectActions">
													<a href="<?php echo crm\Config::SystemPublicURL; ?>project/id/<?php echo $project['id'] ?>">View</a> . 
													<a href="#!" class="isModal" data-modal="editProject">Edit</a> . 
													<a href="#!" class="isModal" data-modal="deleteProject">Delete</a></p>
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
							<h1>Invoices</h1>
						</div>			
						<div class="panelContent">
							
							<?php if (!empty($invoices)): ?>
								<div class="noInvoicesWrapper">
									<p>No Invoices Found. <a class="ismodal" data-modal="createInvoice" href="#">Create One?</a></p>
								</div>
							<?php else: ?>
								<div class="existingInvoicesWrapper">
									
									<?php foreach ($invoices as $invoice): ?>
										
									<div class="individualInvoice" data-invoice-id="<?php echo $invoice['id'] ?>">
										
										<div class="row clearfix">
											<div class="half">
												<h2 class="invoiceName">Invoice #<?php echo $invoice['id'] ?></h2>
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
												<p class="invoiceActions">
													<a href="<?php echo crm\Config::SystemPublicURL; ?>invoice/id/<?php echo $invoice['id'] ?>"">View</a> . 
													<a href="#!" class="isModal" data-modal="deleteInvoice">Delete</a>
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
				<div class="panel clientMeetings no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Upcoming Meetings</h1>
						</div>			
						<div class="panelContent">
							
							<?php if (empty($meetings)): ?>
								<div class="noMeetingsWrapper">
									<p>No Meetings Found. <a class="ismodal" data-modal="createProject" href="#">Create One?</a></p>
								</div>
							<?php else: ?>
								<div class="noMeetingsWrapper">
									<p>No Meetings Found. <a class="ismodal" data-modal="createProject" href="#">Create One?</a></p>
								</div>
								<?php //foreach ($meetings as $project): ?>
									
									<?php //print_r($project); ?>

								<?php //endforeach ?>
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
	
	<div class="modal this-editClientProfile" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Edit Client Profile</h1>
			</div>

			<div class="modalContent">

				<form action="" id="form-clientUpdate" data-clientID="<?php echo $clientArray->id; ?>">
					
					<div class="row clearfix">
						<div class="half"><label for="firstName">First Name</label><input id="firstName" type="text" name="firstName" value="<?php echo $clientArray->firstname; ?>"></div>
						<div class="half"><label for="lastName">Last Name</label><input id="lastName" type="text" name="lastName" value="<?php echo $clientArray->lastname; ?>"></div>
					</div>

					<div class="row">
						<label for="companyName">Company Name</label>
						<input type="text" name="companyName" id="companyName" value="<?php echo $clientArray->company; ?>">
					</div> 

					<div class="row clearfix">
						<div class="half">
							<label for="clientEmail">Email Address</label>
							<input type="text" name="clientEmailAddress" id="clientEmail" value="<?php echo $clientArray->email; ?>">
						</div>
						<div class="half">
							<label for="clientPhoen">Phone</label>
							<input type="text" name="clientPhoenNumber" id="clientPhoen" value="<?php echo $clientArray->phone; ?>">
						</div>
					</div>

					<div class="row">
						<label for="addressLineOne">Address</label>
						<input type="text" name="addressLineOne" id="addressLineOne" value="<?php echo $clientArray->address; ?>">
					</div>

					<div class="row clearfix">
						<div class="third">
							<label for="">City</label>
							<input type="text" name="" value="<?php echo $clientArray->city; ?>">
						</div>
						<div class="third">
							<label for="">Postal Code</label>
							<input type="text" name="" value="<?php echo $clientArray->zip ?>">
						</div>
						<div class="third">
							<label for="">State</label>
							<input type="text" name="" value="<?php echo $clientArray->state ?>">
						</div>
					</div>

					<div class="row">
						<label for="clientCountry">Country</label>
						<select name="clientCountry" class="selectbox" style="width:100%;">
							<option value="<?php echo $clientArray->country ?>"><?php echo crm\Functions::country($clientArray->country) ?></option>
							<?php $countries = crm\Functions::countries(); ?>
							<?php foreach ($countries as $country): ?>
								<option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="row clearfix">
						<button>Update Profile</button>
					</div>

				</form>
				
			</div>

		</div>

	</div>

	<div class="modal this-uploadClientPhoto" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Upload Client Photo</h1>
			</div>

			<div class="modalContent">
				
				<div class="row clearfix">
					
					<!-- Profile Photo -->
					<div class="half">
						<div class="clientProfilePicture" style="background-image: url(<?php echo $gravatar; ?>);width: 90%; height: 291px; background-size: cover; background-position: center;"></div>
					</div>

					<!-- Upload -->
					<div class="half">

						<form action="/upload/client/logo" method="post" id="form-clientLogo" enctype="multipart/form-data">
							
							<input type="hidden" name="client_id" value="<?php echo $clientArray->id; ?>">
							<input type="hidden" name="upload_type" value="client_logo">

							<div class="row">
								
								<label for="">Logo Type</label>

								<ul>
									<li>
										<input type="radio" class="whatLogo" name="logoType" value="gravatar" checked id="gravatar"> 
										<label for="gravatar">Gravatar</label>
										<div class="check"></div>
									</li>
									<li>
										<input type="radio" class="whatLogo" name="logoType" value="upload" id="logo"> 
										<label for="logo">Upload</label>
										<div class="check"></div>
									</li>
								</ul>

							</div>

							<div class="row" id="uploadTheLogo" data-selected="selected" style="display:none">
								<div class="fallback">
									<input name="upload_photo" type="file" >
								</div>
							</div>

							<div class="row clearfix">
								<div class="span6">
									<button class="submitting">
										<span class="showProgress" style="display: none; padding-right:10px;"><i class="fa fa-spinner fa-spin"></i></span>
										<span class="initial">Upload</span>
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

		</div>

	</div>

	<div class="modal this-deleteThisClient" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Delete This Client</h1>
			</div>

			<div class="modalContent">
				
			</div>

		</div>

	</div>

	<div class="modal this-createProject" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Project</h1>
			</div>

			<div class="modalContent">
				
			</div>

		</div>

	</div>

	<div class="modal this-createInvoice" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Invoice</h1>
			</div>

			<div class="modalContent">
				
			</div>

		</div>

	</div>

	<div class="modal this-createMeeting" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Create Meeting</h1>
			</div>

			<div class="modalContent">
				
			</div>

		</div>

	</div>

</div>


<!-- More Bleh -->
<script src="/app/includes/js/page.client.js"></script>