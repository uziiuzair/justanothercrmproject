<?php 
/**
 * Admin Page (admin.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; ?>
<div class="container adminSettings">
	
	<div class="wrapper">

		<div class="row clearfix">
			<div class="pageTitle">
				<div class="row clearfix">
					<div class="span6">
						<h1>Settings for Just Another CRM</h1>
					</div>
					<div class="span6">
						<a href="#!" class="updateSettings">Save Changes</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row clearfix">
			
			<!-- Left -->
			<div class="span4 column">
				<div class="settingSelector">
					<ul>
						<li><a href="#companyInformation" class="settingOption active companyInformation" data-setting="#companyInformation">Company Information</a></li>
						<li><a href="#email" class="settingOption  email" data-setting="#email">Email</a></li>
						<li><a href="#payments" class="settingOption  payments" data-setting="#payments">Payments</a></li>
						<li><a href="#security" class="settingOption  security" data-setting="#security">Security</a></li>
						<li><a href="#automation" class="settingOption  automation" data-setting="#automation">Automation</a></li>
						<li><a href="#backup" class="settingOption  backup" data-setting="#backup">Backup</a></li>
						<li><a href="#reports" class="settingOption reports" data-setting="#reports">Reports</a></li>
					</ul>
				</div>
			</div>

			<!-- Right -->
			<div class="span8 column">
				
				<div class="settingsContainer">
					

					<!-- Company Information -->
					<div class="section-1 settingsSection current" id="companyInformation">
						<div class="row clearfix">
							
							<div class="span6 column">
								
								<!-- Company Logo -->
								<div class="panel panelCompanyLogo">
									<div class="inner">
										<div class="panelHeader">
											<h1>Company Logo</h1>
										</div>
										<div class="panelContent">
											<form action="" id="form-companyLogo">
												
												<div class="companyLogoContainer">
													<img src="https://crm.envato.dev:8890/app/includes/images/logo.png" alt="">
												</div>

												<div class="companyLogoEdit">
													<div class="dropArea"></div>
												</div>

												<div class="row">
													<a href="#!">Edit Logo</a>
												</div>

											</form>
										</div>
									</div>
								</div>

								<!-- Company Informaiton -->
								<div class="panel panelCompanyInformation">
									<div class="inner">
										<div class="panelHeader">
											<h1>Company Settings</h1>
										</div>
										<div class="panelContent">
											
											<form action="" id="form-companySettings">
												
												<div class="row ">
													<label for="companyName">Company Name</label>
													<input type="text" name="companyName" value="" placeholder="Just Another CRM">
												</div>

												<div class="row ">
													<label for="companyEmail">Company Email</label>
													<input type="text" name="companyEmail" value="" placeholder="admin@justanothercrm.co">
												</div>

												<div class="row ">
													<label for="companyPhone">Company Phone</label>
													<input type="text" name="companyPhone" value="" placeholder="0063 977 841 8944">
												</div>

												<div class="row ">
													<label for="companyFax">Company Fax</label>
													<input type="text" name="companyFax" value="" placeholder="0063 977 841 8944">
												</div>

												<div class="row ">
													<label for="companyVat">Company VAT</label>
													<input type="text" name="companyVat" value="" placeholder="0063 977 841 8944">
												</div>

												<div class="row ">
													<label for="companyTaxID">Company TAX ID Number</label>
													<input type="text" name="companyTaxID" value="" placeholder="0063 977 841 8944">
												</div>

												<div class="row ">
													<h1>Financial Information</h1>
												</div>

												<div class="row ">
													<label for="companyCurrency">Currency</label>
													<input type="text" name="companyCurrency" value="" placeholder="USD - US Dollars ($)">
												</div>


											</form>

										</div>
									</div>
								</div>

							</div>

							<div class="span6 column">
								
								<!-- Company Address -->
								<div class="panel panelCompanyAddress">
									<div class="inner">
										<div class="panelHeader">
											<h1>Company Adderss</h1>
										</div>
										<div class="panelContent">

											<form action="" id="form-companyAddress">
												
												<div class="row">
													<label for="">Address</label>
													<input type="text" value="" name="" placeholder="3212 Tower 2, The Grand Towers">
													<input type="text" value="" name="" placeholder="Pablo Ocampo Street, Vito Cruz">
												</div>
												
												<div class="row">
													<label for="">City</label>
													<input type="text" value="" name="" placeholder="Manila">
												</div>
												
												<div class="row">
													<label for="">State / Province</label>
													<input type="text" value="" name="" placeholder="Metro Manila">
												</div>
												
												<div class="row">
													<label for="">ZIP / Postal Code</label>
													<input type="text" value="" name="" placeholder="1004">
												</div>
												
												<div class="row">
													<label for="">Country</label>
													<input type="text" value="" name="" placeholder="Philippines">
												</div>
												
												<div class="row">
													<label for="">Timezone</label>
													<input type="text" value="" name="" placeholder="Philippines (GMT + 8)">
												</div>

											</form>
											
										</div>
									</div>
								</div>

							</div>
						
						</div>	
					</div>
					









					<!-- Email -->
					<div class="section-2 settingsSection" id="email">
						<div class="row clearfix">
							
							<div class="span6 column">
								
								<!-- Email Settings -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Email Settings</h1>
										</div>
										<div class="panelContent">

											<form action="" id="form-emailSettings">
												
												<div class="row">
													<label for="">Email Provider</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>
												
												<div class="row">
													<label for="">Email Encryption</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>
												
												<div class="row">
													<label for="">Email Address</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>
												
												<div class="row">
													<label for="">SMTP Username</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>
												
												<div class="row">
													<label for="">SMTP Password</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>
												
												<div class="row">
													<label for="">SMTP Port</label>
													<input type="text" name="" value="" placeholder="Sendgrid">
												</div>

											</form>
											
										</div>
									</div>
								</div>

							</div>

							<div class="span6 column">
								
							</div>
						
						</div>	
					</div>
					










					<!-- Payments -->
					<div class="section-3 settingsSection" id="payments">
						<div class="row clearfix">
							
							<div class="span12 column">
								
								<!-- Payment Gateway -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Payment Gateway</h1>
										</div>
										<div class="panelContent">
											
										</div>
									</div>
								</div>

							</div>
						
						</div>	
					</div>
					











					<!-- Security -->
					<div class="section-4 settingsSection" id="security">
						<div class="row clearfix">
							
							<div class="span6 column">

								<!-- Security -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Security</h1>
										</div>
										<div class="panelContent">
											
										</div>
									</div>
								</div>
								
							</div>

							<div class="span6 column">
								
							</div>
						
						</div>	
					</div>
					










					<!-- Automation -->
					<div class="section-5 settingsSection" id="automation">
						<div class="row clearfix">
							
							<div class="span6 column">

								<!-- Automation -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Automation</h1>
										</div>
										<div class="panelContent">
											
										</div>
									</div>
								</div>
								
							</div>

							<div class="span6 column">
								
							</div>
						
						</div>	
					</div>
					












					<!-- Backup -->
					<div class="section-6 settingsSection" id="backup">
						<div class="row clearfix">
							
							<div class="span6 column">

								<!-- Backup -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Backup</h1>
										</div>
										<div class="panelContent">
											
										</div>
									</div>
								</div>
								
							</div>

							<div class="span6 column">
								
							</div>
						
						</div>	
					</div>
					











					<!-- Reports -->
					<div class="section-7 settingsSection" id="reports">
						<div class="row clearfix">
							
							<div class="span6 column">

								<!-- Reports -->
								<div class="panel">
									<div class="inner">
										<div class="panelHeader">
											<h1>Reports</h1>
										</div>
										<div class="panelContent">
											
										</div>
									</div>
								</div>
								
							</div>

							<div class="span6 column">
								
							</div>
						
						</div>	
					</div>

				</div>

			</div>


		</div>

	</div>

</div>

<script src="/app/includes/js/page.crm.settings.js"></script>