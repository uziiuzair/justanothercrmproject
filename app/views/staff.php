<?php
/**
 * Staff Page (staff.php) 
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

$staffArray 		= crm\Users::getAll();
$departmentArray	= crm\Users::departments();


?>
<div class="container staffPage">
	
	<div class="wrapper">

		<!-- <div class="row debugInformation">
			<span>Debug Information</span>
			<span>Staff</span>
			<?php print_r($staffArray) ?>
			<span>Departments</span>
			<?php print_r($departmentArray) ?>
		</div> -->
		
		<div class="microWrapper">

			<div class="pageHeader">
				<div class="row clearfix">
					
					<div class="span6">
						<h1>Staff</h1>
					</div>
					
					<div class="span6">
						<a href="#!" class="ismodal headerButton" data-modal="addNewStaff">Add New Staff Member</a>
					</div>

				</div>
			</div>
			
			<div class="pageContent">
				
				<div class="row clearfix">
				
					<div class="span4">
						
						<div class="staffCategoryWrapper">

							<div class="panelHeader">
								<h1>Departments</h1>
							</div>
							
							<ul>
								<?php foreach ($departmentArray as $department): ?>
									<!-- Department -->
									<li>
										<div data-department-id="<?php echo $department['id'] ?>" class="row clearfix staffCategory">
											<div class="half">
												<h1><?php echo $department['name'] ?></h1>
											</div>
											<div class="half">
												<p><?php echo crm\Functions::countRows('users', null, '`department_id` = ' . $department['id']) ?> Members</p>
											</div>
										</div>
									</li>
									<!-- / Department -->
								<?php endforeach ?>
							</ul>

							<div class="row staffCategoryActions">
								<form action="" id="form-staffDepartment">
									<div class="row clearfix">
										<div class="inline">
											<a href="#!">+</a>
										</div>
										<div class="inline">
											<input type="text" name="departmentName" id="departmentName" placeholder="New Department Name" required>
										</div>
									</div>
									<div class="row clearfix">
										<div class="errorContainer"></div>
									</div>
								</form>
							</div>

						</div>

					</div>
					<div class="span8">
						
						<div class="staffContainer" id="staffList">
							
							<ul class="list">

								<?php foreach ($staffArray as $member): ?>

									<li>
										<div class="staffMember" data-staff-department="<?php echo $member['department_id']; ?>">
											<a href="<?php echo crm\Config::SystemPublicURL; ?>staff/member/<?php echo $member['id'] ?>">
												<div class="row clearfix">
													<div class="name">
														<h2><?php echo $member['firstname'] . ' ' . $member['lastname'] ?></h2>
														<p class="department"><?php echo crm\Users::department($member['department_id']) ?></p></div>
													<div class="email">
														<h2>Email</h2>
														<p><?php echo $member['email'] ?></p>
													</div>
													<div class="phone">
														<h2>Phone</h2>
														<p><?php echo $member['phone'] ?></p>
													</div>
													<div class="member">
														<h2>Member Since</h2>
														<p><?php echo date('d M Y, h:m a', $member['signup_date']) ?></p>
													</div>
												</div>
											</a>
										</div>
									</li>
									
								<?php endforeach ?>
								
							</ul>

							<div class="paginationContainer">
								<ul class="pagination"></ul>
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
	
	<div class="modal this-addNewStaff" style="display:none;position:fixed; top:0; left:0;">
		
		<div class="cover"></div>
		<div class="inner">
			
			<div class="close">
				<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
			</div>

			<div class="modalHeader">
				<h1>Add New Staff</h1>
			</div>

			<div class="modalContent">

				<form action="#" id="form-addStaff">
					
					<div class="row clearfix">

						<div class="half">
							<label for="staffFirstName">First Name</label>
							<input id="staffFirstName" type="text" name="staffFirstName" placeholder="John" required>
						</div>

						<div class="half">
							<label for="staffLastName">Last Name</label>
							<input id="staffLastName" type="text" name="staffLastName" placeholder="Doe" required>
						</div>
						
					</div>


					<div class="row clearfix">
						
						<div class="third">
							<label for="staffUsername">Username</label>
							<input id="staffUsername" type="text" name="staffUsername" placeholder="johndoe" required>
						</div>
						
						<div class="third">
							<label for="staffEmail">Email Address</label>
							<input id="staffEmail" type="email" name="staffEmail" placeholder="johndoe@justanothercrm.co" required>
						</div>

						<div class="third">
							<label for="staffPhone">Phone Number</label>
							<input id="staffPhone" type="phone" name="staffPhone" placeholder="+63 (933) 123 4567" required>
						</div>
						
					</div>

					<div class="row clearfix">

						<div class="half">
							<label for="staffDepartment">Department</label>
							<select name="staffDepartment" class="selectbox" id="staffDepartment">
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
						<div class="span6">
							<button class="submitting">
								<span class="showProgress" style="display: none; padding-right:10px;"><i class="fa fa-spinner fa-spin"></i></span>
								<span class="initial">Add Staff</span>
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

<script src="/app/includes/js/page.staff.js"></script>