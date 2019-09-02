<?php 
/**
 * FOOTER (footer.php)
 *
 * Serves as the default footer for the CRM
 * 
 * @package 	Just Another CRM Project
 * @author 		uziiuzair (https://www.uziiuzair.com/)
 * @since 		v1.0
 */

use uziiuzair\crm; 

$staff 		= crm\Users::getAll();
$countries 	= crm\Functions::getCountries();

?>
					<div class="footer">
						<p style="text-align: center; padding:10px 0; font-weight: 300;">&copy; 2018 - <?php echo date('Y') . ' ' . crm\Config::SystemApplicationName; ?></p>
					</div>
				</div>
			</div>
		</main>

		<!-- Modal Container -->
		<div class="modalContainer">
			
			<!-- Add New Client -->
			<?php // Ajax for this form can be found in app.js ?>
			<div class="modal this-addNewClient" style="display:none;position:fixed; top:0; left:0;">
				
				<div class="cover"></div>
				<div class="inner">
					
					<div class="close">
						<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
					</div>

					<div class="modalHeader">
						<h1>Add New Client</h1>
					</div>

					<div class="modalContent">

						<form action="" id="form-clientCreate">
							
							<div class="row clearfix">
								<div class="half"><label for="firstName">First Name</label><input id="firstName" type="text" name="firstName"></div>
								<div class="half"><label for="lastName">Last Name</label><input id="lastName" type="text" name="lastName"></div>
							</div> 

							<div class="row clearfix">
								<div class="third">
									<label for="companyName">Company Name</label>
									<input type="text" name="companyName" id="companyName">
								</div>
								<div class="third">
									<label for="clientEmail">Email Address</label>
									<input type="text" name="clientEmailAddress" id="clientEmail">
								</div>
								<div class="third">
									<label for="clientPhoen">Phone</label>
									<input type="text" name="clientPhoenNumber" id="clientPhone">
								</div>
							</div>

							<div class="row">
								<div class="twothird padding-right">
									<label for="clientAddress">Address</label>
									<input type="text" name="clientAddress" id="clientAddress">
								</div>
								<div class="third nopadding-right">
									<label for="">City</label>
									<input type="text" name="">
								</div>
							</div>

							<div class="row clearfix">
								<div class="third">
									<label for="">Postal Code</label>
									<input type="text" name="">
								</div>
								<div class="third">
									<label for="">State</label>
									<input type="text" name="">
								</div>
								<div class="third">
									<label for="clientCountry">Country</label>
									<select name="clientCountry" class="selectbox" style="width:100%;">
										<?php $countries = crm\Functions::getCountries(); ?>
										<?php foreach ($countries as $country): ?>
											<option value="<?php echo $country['id'] ?>"><?php echo $country['name'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="row clearfix">
								<button>Create Client Profile</button>
							</div>

						</form>
						
					</div>

				</div>

			</div>


			<!-- Add New Project -->
			<?php // Ajax for this form can be found in app.js ?>
			<div class="modal this-addNewProject" style="display:none;position:fixed; top:0; left:0;">
				
				<div class="cover"></div>
				<div class="inner">
					
					<div class="close">
						<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
					</div>

					<div class="modalHeader">
						<h1>Add New Project</h1>
					</div>

					<div class="modalContent">
						
						<form action="" id="form-projectCreate">
							
							<div class="row clearfix">
								<div class="half">
									<label for="projectName">Project Name</label>
									<input id="projectName" type="text" name="projectName">
								</div>
								<div class="half">
									<label for="projectClient">Client</label>
									<input id="projectClient" type="text" name="projectClient">
								</div>
							</div>
	
							<div class="row clearfix">
								<div class="third">
									<label for="projectStartDate">Start Date</label>
									<input class="datepicker" id="projectStartDate" type="text" name="projectStartDate">
								</div>
								<div class="third">
									<label for="projectEndDate">End Date</label>
									<input class="datepicker" id="projectEndDate" type="text" name="projectEndDate">
								</div>
								<div class="third">
									<label for="projectValue">Project Value</label>
									<input id="projectValue" type="text" name="projectValue">
								</div>
							</div>

							<div class="row clearfix">
								<label for="projectDescription">Description</label>
								<textarea name="projectDescription" id="projectDescription"></textarea>
							</div>

							<div class="row clearfix">
								<button>Create Project</button>
							</div>

						</form>

					</div>

				</div>
				
			</div>



			<!-- Add New Expense -->
			<?php // Ajax for this form can be found in app.js ?>
			<div class="modal this-addNewExpense" style="display:none;position:fixed; top:0; left:0;">
				
				<div class="cover"></div>
				<div class="inner">
					
					<div class="close">
						<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
					</div>

					<div class="modalHeader">
						<h1>Add New Expense</h1>
					</div>

					<div class="modalContent">
						
					</div>

				</div>
				
			</div>



			<!-- Add New Invoice -->
			<?php // Ajax for this form can be found in app.js ?>
			<div class="modal this-addNewInvoice" style="display:none;position:fixed; top:0; left:0;">
				
				<div class="cover"></div>
				<div class="inner">
					
					<div class="close">
						<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
					</div>

					<div class="modalHeader">
						<h1>Add New Invoice</h1>
					</div>

					<div class="modalContent">
						
					</div>

				</div>

			</div>




			<!-- Add New Lead -->
			<?php // Ajax for this form can be found in app.js ?>
			<div class="modal this-addNewLead" style="display:none;position:fixed; top:0; left:0;">
				
				<div class="cover"></div>
				<div class="inner">
					
					<div class="close">
						<svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-times fa-w-10 fa-3x"><path fill="currentColor" d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z" class=""></path></svg>
					</div>

					<div class="modalHeader">
						<h1>Add New Lead</h1>
					</div>

					<div class="modalContent">

						<form action="" method="post" id="form-leadCreate">
							
							<div class="row clearfix">
								<div class="span2 padding-right">
									<label for="leadTitle">Title</label>
									<select id="leadTitle" name="leadTitle" class="selectbox" required>
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
									<label for="leadFirstName">First Name</label>
									<input id="leadFirstName" type="text" name="leadFirstName"  placeholder="John" required>
								</div>
								<div class="span5 padding-left">
									<label for="leadLastName">Last Name</label>
									<input id="leadLastName" type="text" name="leadLastName" placeholder="Doe" required>
								</div>
							</div>
	
							<div class="row clearfix">
								<div class="third">
									<label for="leadStaff">Assign Staff</label>
									<select name="leadStaff" class="selectbox" id="leadStaff" required>
										<?php foreach ($staff as $member): ?>
										<option value="<?php echo $member['id'] ?>"><?php echo $member['firstname'] . ' ' . $member['lastname'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="third">
									<label for="leadStatus">Status</label>
									<select name="leadStatus" class="selectbox" id="leadStatus" required>
										<option value="1">New</option>
										<option value="2">Contacted</option>
										<option value="3">Working</option>
										<option value="4">Qualified</option>
										<option value="5">Unqualified</option>
										<option value="6">Lost</option>
										<option value="7">Junk</option>
									</select>
								</div>
								<div class="third">
									<label for="leadSource">Source</label>
									<input id="leadSource" type="text" name="leadSource" placeholder="http://www.example.com" required>
								</div>
							</div>

							<div class="row clearfix">
								<div class="third">
									<label for="leadEmail">Email</label>
									<input id="leadEmail" type="email" name="leadEmail" placeholder="john.doe@example.com" required>
								</div>
								<div class="third">
									<label for="leadPhone">Phone</label>
									<input id="leadPhone" type="text" name="leadPhone" placeholder="+1 (123) 456 7890" required>
								</div>
								<div class="third">
									<label for="leadWebsite">Website</label>
									<input id="leadWebsite" type="url" name="leadWebsite" placeholder="http://www.realexample.com/" required>
								</div>
							</div>

							<div class="row clearfix">
								<div class="half">
									<label for="leadCompany">Company</label>
									<input id="leadCompany" type="title" name="leadCompany" placeholder="Example Inc." required>
								</div>
								<div class="half">
									<label for="leadCompanyTitle">Title</label>
									<input id="leadCompanyTitle" type="text" name="leadCompanyTitle" placeholder="CEO of Example" required>
								</div>
							</div>

							<div class="row clearfix">
								<div class="span12">
									<label for="leadCompanyStreet">Address Street</label>
									<input id="leadCompanyStreet" type="title" name="leadCompanyStreet" placeholder="123 Example Ave" required>
								</div>
							</div>

							<div class="row clearfix">
								<div class="span3 padding-right">
									<label for="leadCompanyCity">City</label>
									<input id="leadCompanyCity" type="title" name="leadCompanyCity" placeholder="Example City" required>
								</div>
								<div class="span3 padding-left padding-right">
									<label for="leadCompanyState">State</label>
									<input id="leadCompanyState" type="title" name="leadCompanyState" placeholder="State of Example" required>
								</div>
								<div class="span3 padding-left padding-right">
									<label for="leadCompanyZip">Zip</label>
									<input id="leadCompanyZip" type="title" name="leadCompanyZip" placeholder="3XM9L3" required>
								</div>
								<div class="span3 padding-left">
									<label for="leadCompanyCountry">Country</label>
									<select name="leadCompanyCountry" class="selectbox" id="leadCompanyCountry" required>
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
										<span class="initial">Create Lead</span>
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

		<script src="/app/includes/js/jquery.validate.js"></script>
		<script src="/app/includes/js/modals.js"></script>
		<script src="/app/includes/js/crm.js"></script>
		<script src="/app/includes/js/app.js"></script>

	</body>
</html>