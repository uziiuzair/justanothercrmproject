<?php 
/**
 * Staff Page (staff.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$staff_id = crm\Routes::getServerRequest('staff/member/');				#	Get the Staff ID
$staff_id = stripcslashes($staff_id);									#	Sanitize the Staff ID

$staffArray 		= crm\Users::get($staff_id);						#	Get Staff Information based on Staff ID
$departmentArray	= crm\Users::departments();							# 	Get Array of All Departments

$gravatar 	= crm\Users::getGravatar($staffArray->email);				#	Get Photo of Staff Member not based on Staff ID
$logs 	  	= crm\Functions::getlogs('staff_log', $staffArray->id);		#	Get Logs based on Staff ID... sorta
$proposals 	= crm\Services\Proposals::forStaff($staffArray->id);		#	Get Proposals based on Staff ID
$projects 	= crm\Services\Projects::forStaff($staffArray->id);			#	Get Projects based on Staff ID
$clients 	= crm\Services\Clients::forStaff($staffArray->id);			#	Get Clients based on... you guessed it... Staff ID!!
$reimbursements = crm\Services\Expenses::reimbursementsForStaff($staffArray->id);	#	Get Staff reimbursement requests


?>
<div class="container staffMemberPage">
	
	<div class="wrapper">

		<div class="row debugInformation">
			<span>Debug Information</span>
			<?php print_r($staffArray) ?>
			<!-- <span>Gravatar</span>
			<?php print_r($gravatar) ?>
			<span>logs</span>
			<?php print_r($logs) ?>
			<span>proposals</span>
			<?php print_r($proposals) ?>
			<span>projects</span>
			<?php print_r($projects) ?>
			<span>clients</span>
			<?php print_r($clients) ?> -->
			<span>Reimbursements</span>
			<?php print_r($reimbursements) ?>
		</div>

		<div class="row clearfix">

			<!-- Section 1 -->
			<div class="span3 column">

				<!-- Staff Gravatar Photo -->
				<div class="panel no-padding">
					<div class="inner">			
						<div class="panelContent">
							
							<div class="staffProfilePicture" style="background-image: url(<?php echo $gravatar; ?>)"></div>

							<div class="staffControls">
								<ul class="clearfix">
									<li><a data-modal="editStaffProfile" class="ismodal" href="#editProfile">Edit Profile</a></li>
									<li><a data-modal="markAsResigned" 	class="isajax" href="#markAsResigned">Mark as Resigned</a></li>
									<li><a data-modal="uploadPhoto" 	class="ismodal" href="#uploadPhoto">Upload Photo</a></li>
									<li><a data-modal="markAsAway" 		class="isajax" href="#markAsAway">Mark as Away</a></li>
									<li><a data-modal="makeAdmin" 		class="isajax" href="#makeAdmin">Make Admin</a></li>
									<li><a data-modal="deleteStaff" 	class="ismodal" href="#deleteStaff">Delete Staff</a></li>
								</ul>
							</div>

						</div>			
					</div>
				</div>

				<!-- Staff Timeline -->
				<div class="panel staffTimeline no-padding">
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

				<!-- Staff Information -->
				<div class="panel staffInformation">
					<div class="inner">
						<div class="panelHeader">
							<h1>Staff Information</h1>
						</div>			
						<div class="panelContent">
							
							<div class="row">
								<h2 class="clientName">
									<?php echo $staffArray->firstname . ' ' . $staffArray->lastname; ?>
								</h2>
							</div>

							<div class="row clientInfoMisc">
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-envelope"></i>
										</span> Email:
									</span> 
									<span class="span-right"><?php echo $staffArray->email; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-mobile"></i>
										</span> Phone:
									</span> 
									<span class="span-right"><?php echo $staffArray->phone; ?></span>
								</p>
								<p class="clearfix">
									<span class="span-left">
										<span class="svgContainer">
											<i class="fal fa-mobile"></i>
										</span> Department:
									</span> 
									<span class="span-right"><?php echo crm\Users::department($staffArray->department_id); ?></span>
								</p>
							</div>

						</div>			
					</div>
				</div>
				<!-- / Staff Information -->


				<!-- Staff Overview -->
				<div class="row staffOverview clearfix">
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<h2>Assigned Projects</h2>
								<p><?php echo crm\Functions::countRows('projects', $staffArray->id) ?> <span>Projects</span></p>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<h2>Assigned Tasks</h2>
								<p><?php echo crm\Functions::countRows('tasks', $staffArray->id, "NOT `status` = '6'") # Get all Tasks that are not complete ?> <span>Tasks</span></p>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<h2>Assigned Leads</h2>
								<p><?php echo crm\Functions::countRows('leads', $staffArray->id) ?> <span>Leads</span></p>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<h2>Assigned Clients</h2>
								<p><?php echo crm\Functions::countRows('clients', $staffArray->id) ?> <span>Clients</span></p>
							</div>
						</div>
					</div>
					
					<div class="overviewBox">
						<div class="inner">
							<div class="row clearfix">
								<h2>Assigned Proposals</h2>
								<p><?php echo crm\Functions::countRows('proposals', $staffArray->id) ?> <span>Proposals</span></p>
							</div>
						</div>
					</div>

				</div>
				<!-- / Staff Overview -->



				<!-- Reimbursement Requests -->
				<div class="reimbursementRequestsWrapper">
					
					<div class="panelHeader">
						<h1>Reimbursement Requests</h1>
					</div>

					<div class="reimbursementRequestList">

						<ul>
							
							<li>
								<div class="reimbursement">
									<div class="row clearfix">
										<div class="expenseProjectName">
											<h2>Expense Name</h2>
											<p>Client Name (Client Company)</p>
										</div>
										<div class="expenseNumber">
											<h2>Expense ID</h2>
											<p>#00001</p>
										</div>
										<div class="expenseDate">
											<h2>Expense Date</h2>
											<p>16 May 2019</p>
										</div>
										<div class="expenseActions">
											<ul>
												<li>
													<a href="<?php echo crm\Config::SystemPublicURL; ?>expense/id/1">View</a>
												</li>
												<li>
													<a href="#!" data-expense-reimbursed="1">Reimburse</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="reimbursement">
									<div class="row clearfix">
										<div class="expenseProjectName">
											<h2>Expense Name</h2>
											<p>Client Name (Client Company)</p>
										</div>
										<div class="expenseNumber">
											<h2>Expense ID</h2>
											<p>#00001</p>
										</div>
										<div class="expenseDate">
											<h2>Expense Date</h2>
											<p>16 May 2019</p>
										</div>
										<div class="expenseActions">
											<ul>
												<li>
													<a href="<?php echo crm\Config::SystemPublicURL; ?>expense/id/1">View</a>
												</li>
												<li>
													<a href="#!" data-expense-reimbursed="1">Reimburse</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>

							<li>
								<div class="reimbursement">
									<div class="row clearfix">
										<div class="expenseProjectName">
											<h2>Expense Name</h2>
											<p>Client Name (Client Company)</p>
										</div>
										<div class="expenseNumber">
											<h2>Expense ID</h2>
											<p>#00001</p>
										</div>
										<div class="expenseDate">
											<h2>Expense Date</h2>
											<p>16 May 2019</p>
										</div>
										<div class="expenseActions">
											<ul>
												<li>
													<a href="<?php echo crm\Config::SystemPublicURL; ?>expense/id/1">View</a>
												</li>
												<li>
													<a href="#!" data-expense-reimbursed="1">Reimburse</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>


							<li>
								<div class="reimbursement">
									<div class="row clearfix">
										<div class="expenseProjectName">
											<h2>Expense Name</h2>
											<p>Client Name (Client Company)</p>
										</div>
										<div class="expenseNumber">
											<h2>Expense ID</h2>
											<p>#00001</p>
										</div>
										<div class="expenseDate">
											<h2>Expense Date</h2>
											<p>16 May 2019</p>
										</div>
										<div class="expenseActions">
											<ul>
												<li>
													<a href="<?php echo crm\Config::SystemPublicURL; ?>expense/id/1">View</a>
												</li>
												<li>
													<a href="#!" data-expense-reimbursed="1">Reimburse</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</li>


						</ul>
						
					</div>

				</div>
				<!-- / Reimbursement Requests -->




				
			</div>

			<!-- Section 3 -->
			<div class="span4 column">

				<!-- Proposals -->
				<div class="panel staffProposals no-padding">
					<div class="inner">
						<div class="panelHeader">
							<div class="row clearfix">
								<div class="left">
									<h1>Proposals</h1>
								</div>
							</div>
						</div>			
						<div class="panelContent">
							
							<?php if (empty($proposals)): ?>
								<div class="noProposalsWrapper">
									<p>No Proposals Found.</p>
								</div>
							<?php else: ?>
								<div class="existingProposalsWrapper">
								<?php foreach ($proposals as $proposal): ?>
									
									<div class="individualProposal" data-proposal-id="<?php echo $proposal['id'] ?>">
										
										<div class="row clearfix">
											<div class="half">
												<h2 class="proposalName"><?php echo crm\Functions::generateString($proposal['title'], 35) ?></h2>
											</div>
											<div class="half">
												<p class="proposalValue"><?php echo crm\Functions::getCurrency(2, 'prefix') . number_format($proposal['total'],2) ?></p>
											</div>
										</div>
										<div class="row clearfix">
											<div class="half">
												<p class="proposalDescription"><?php echo $proposal['proposalNumber'] ?></p>
											</div>
											<div class="half">
												<p class="proposalActions">
													<a href="<?php echo crm\Config::SystemPublicURL; ?>proposal/print/<?php echo $proposal['id'] ?>">View</a> . 
													<a href="<?php echo crm\Config::SystemPublicURL; ?>proposal/id/<?php echo $proposal['id'] ?>">Edit</a> . 
													<a href="#!" class="isModal" data-proposal-id="<?php echo $proposal['id'] ?>" data-modal="deleteProposal">Delete</a>
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
				<!-- / Proposals -->

				<!-- Projects -->
				<div class="panel staffProjects no-padding">
					<div class="inner">
						<div class="panelHeader">
							<h1>Projects</h1>
						</div>			
						<div class="panelContent">
							
							<?php if (empty($projects)): ?>
								<div class="noProjectsWrapper">
									<p>No Projects Found.</p>
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
				<!-- / Projects -->

			</div>

		</div>

	</div>

</div>

<!-- Modal Container -->
<div class="modalContainer">
	
	<div class="modal this-editStaffProfile" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Edit Client Profile</h1>
			</div>

			<div class="modalContent">

				<form action="" id="form-clientUpdate" data-clientID="<?php echo $staffArray->id; ?>">
					
					<div class="row clearfix">
						<div class="half"><label for="firstName">First Name</label><input id="firstName" type="text" name="firstName" value="<?php echo $staffArray->firstname; ?>"></div>
						<div class="half"><label for="lastName">Last Name</label><input id="lastName" type="text" name="lastName" value="<?php echo $staffArray->lastname; ?>"></div>
					</div>

					<div class="row clearfix">
						<div class="half">
							<label for="clientEmail">Email Address</label>
							<input type="text" name="clientEmailAddress" id="clientEmail" value="<?php echo $staffArray->email; ?>">
						</div>
						<div class="half">
							<label for="clientPhoen">Phone</label>
							<input type="text" name="clientPhoenNumber" id="clientPhoen" value="<?php echo $staffArray->phone; ?>">
						</div>
					</div>

					<div class="row clearfix">
						<div class="half">
							<label for="staffDepartment">Department</label>
							<select name="staffDepartment" class="selectbox" id="staffDepartment">
								<option value="<?php echo $staffArray->department_id ?>" selected><?php echo crm\Users::department($staffArray->department_id) ?></option>
								<?php foreach ($departmentArray as $department): ?>
									<option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="half">
							<label for="staffAdmin">Is Staff an Admin?</label>
							<select name="staffAdmin" class="selectbox" id="staffAdmin">
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
						</div>
					</div> 

					<div class="row clearfix">
						<button>Update Profile</button>
					</div>

				</form>
				
			</div>

		</div>

	</div>



</div>