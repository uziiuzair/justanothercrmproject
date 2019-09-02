<?php 
/**
 * Invoice Page (invoice.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

$invoice_id = crm\Routes::getServerRequest('invoice/id/');
$invoice_id = stripcslashes($invoice_id);

$invoiceArray = crm\Services\Invoices::get($invoice_id);

$clientsArray 	= crm\Services\Clients::getAll();
$staffArray		= crm\Users::getAll();
$currency 		= '';


?>

<style>
	.accentColor   	{ background-color: #<?php echo $invoiceArray->accentColor ?>; }
	.textColor		{ color: #<?php echo $invoiceArray->textColor ?>; }
	.linkColor		{ color: #<?php echo $invoiceArray->linkColor ?>; }
</style>

<div class="container editInvoicePage">
	
	<div class="wrapper">
		
		<div class="row debugInformation">
			<span>Debug Information</span>
			<?php print_r($invoiceArray) ?>
			<span>Clients</span>
			<?php print_r($clientsArray) ?>
			<span>Staff</span>
			<?php print_r($staffArray) ?>
		</div>

		<!-- Header -->
		<div class="row invoicePageHeader clearfix">
			
			<div class="span4 column">
				<h1>Create Invoice</h1>
			</div>
			
			<div class="offset5 column">
				<nav>
					<ul>
						<li><a href="#!" class="isajax">Save as Draft</a></li>
						<li><a href="#!" class="isajax">Send to Client</a></li>
						<li><a href="<?php echo crm\Config::SystemPublicURL; ?>invoice/print/<?php echo $invoiceArray->id ?>">View Invoice</a></li>
						<li><a href="#!" class="isajax">Update Invoice</a></li>
					</ul>
				</nav>
			</div>

		</div>

		<!-- Invoice -->
		<div class="row clearfix theInvoice">

			<div class="theInvoiceWrapper">

				<!-- Invoice Header -->
				<div class="row clearfix theInvoiceHeader">

					<!-- Left Column -->
					<div class="span9">

						<!-- Invoice Logo -->
						<div class="invoicePanels invoiceLogo">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Company Logo</h2>
									</div>
									<div class="right">
										<ul>
											<li><a href="">Update</a></li>
											<li><a href="">Remove</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">
								<div class="logoContainer">
									<img src="https://crm.envato.dev:8890/app/includes/images/logo.png" alt="College Host">
								</div>
							</div>
						</div>
						<!-- /Invoice Logo -->

						<!-- Invoice Recipient -->
						<div class="invoicePanels invoiceRecipient">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Recipient</h2>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">
								<div class="row clearfix">

									<!-- To -->
									<div class="span6">
										<div class="left">
											<p>To:</p>
										</div>
										<div class="left">
											<select name="" id="">
												<?php if (!empty($invoiceArray->client_id)): ?>
													<option value="<?php echo $invoiceArray->client_id ?>" selected><?php echo $clientsArray[$invoiceArray->client_id]['firstname'] . ' ' . $clientsArray[$invoiceArray->client_id]['lastname'] ?></option>
												<?php endif ?>
												
												<?php foreach ($clientsArray as $client): ?>
													<option value="<?php echo $client['id'] ?>"><?php echo $client['firstname'] . ' ' . $client['lastname'] ?></option>
												<?php endforeach ?>												
											</select>
											<p><?php echo $clientsArray[$invoiceArray->client_id]['email'] ?></p>
										</div>
									</div>
									<!-- /To -->

									<!-- CC -->
									<div class="span6">
										<div class="left">
											<p>CC:</p>
										</div>
										<div class="left">
											<select name="" id="">
												<?php if (!empty($invoiceArray->staff_id)): ?>
													<option value="<?php echo $invoiceArray->staff_id ?>" selected><?php echo $staffArray[$invoiceArray->staff_id]['firstname'] . ' ' . $staffArray[$invoiceArray->staff_id]['lastname'] ?></option>
												<?php endif ?>
												<?php foreach ($staffArray as $staff): ?>
													<option value="<?php echo $staff['id'] ?>"><?php echo $staff['firstname'] . ' ' . $staff['lastname'] ?></option>
												<?php endforeach ?>		
											</select>
											<p><?php echo $staffArray[$invoiceArray->staff_id]['email'] ?></p>
										</div>
									</div>
									<!-- /CC -->

								</div>
								<div class="row clearfix">
									<div class="left">
										<p>Notes:</p>
									</div>
									<div class="left">
										<textarea name="" id=""><?php echo $invoiceArray->note ?></textarea>
									</div>
								</div>
							</div>
						</div>
						<!-- /Invoice Recipient -->

						<!-- Invoice Colors -->
						<div class="invoicePanels invoiceColors">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Invoice Colors</h2>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">
								
								<!-- Accent Color -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Accent Color:</label>
									</div>
									<div class="left">
										<select name="" id="" style="color:#<?php echo $invoiceArray->accentColor; ?> !important;">
											<?php if (!empty($invoiceArray->accentColor)): ?>
												<option value="<?php echo $invoiceArray->accentColor ?>" selected>#<?php echo $invoiceArray->accentColor ?></option>
											<?php endif ?>
											<option value="">#00afb1</option>
										</select>
									</div>
								</div>
								<!-- /Accent Color -->
								
								<!-- Accent Color -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Text Color:</label>
									</div>
									<div class="left">
										<select name="" id="" style="color:#<?php echo $invoiceArray->textColor; ?> !important;">
											<?php if (!empty($invoiceArray->textColor)): ?>
												<option value="<?php echo $invoiceArray->textColor ?>" selected>#<?php echo $invoiceArray->textColor ?></option>
											<?php endif ?>
											<option value="">#7057d2</option>
										</select>
									</div>
								</div>
								<!-- /Accent Color -->
								
								<!-- Accent Color -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Link Color:</label>
									</div>
									<div class="left">
										<select name="" id="" style="color:#<?php echo $invoiceArray->linkColor; ?> !important;">
											<?php if (!empty($invoiceArray->linkColor)): ?>
												<option value="<?php echo $invoiceArray->linkColor ?>" selected>#<?php echo $invoiceArray->linkColor ?></option>
											<?php endif ?>
											<option value="">#7057d2</option>
										</select>
									</div>
								</div>
								<!-- /Accent Color -->

							</div>
						</div>
						<!-- /Invoice Colors -->
						
					</div>
					<!-- /Left Column -->

					<!-- Right Column -->
					<div class="span3">

						<!-- Invoice CompanyAddress -->
						<div class="invoicePanels invoiceCompanyAddress">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Company Address</h2>
									</div>
									<div class="right">
										<ul>
											<li><a href="">Edit</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">
								<div class="row clearfix">
									<p>College Host (Pvt) Limited.</p>
									<p>Islamabad, Pakistan.</p>
									<p>www.collegehost.org</p>
									<p>support@collegehost.org</p>
								</div>
							</div>
						</div>
						<!-- /Invoice CompanyAddress -->

						<!-- Invoice Information -->
						<div class="invoicePanels invoiceInformation">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Invoice Information</h2>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Frequency</label>
									</div>
									<div class="left">
										<select name="" id="">
											<?php if (!empty($invoiceArray->frequency)): ?>
												<option value="<?php echo $invoiceArray->frequency ?>" selected><?php echo $invoiceArray->frequency ?></option>
											<?php endif ?>
											<option value="">Just Once</option>
										</select>
									</div>
								</div>
								<!-- / -->

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Invoice Number</label>
									</div>
									<div class="left">
										<input type="text" value="<?php echo $invoiceArray->invoiceNumber ?>">
									</div>
								</div>
								<!-- / -->

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Issue Date:</label>
									</div>
									<div class="left">
										<input type="text" value="<?php echo date('d M Y', $invoiceArray->created) ?>">
									</div>
								</div>
								<!-- / -->

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Reference:</label>
									</div>
									<div class="left">
										<input type="text" value="<?php //echo $invoiceArray->reference ?>">
									</div>
								</div>
								<!-- / -->

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Due Date:</label>
									</div>
									<div class="left">
										<input type="text" value="<?php echo date('d M Y', $invoiceArray->dueDate) ?>">
									</div>
								</div>
								<!-- / -->
								
							</div>
						</div>
						<!-- /Invoice Information -->

						<!-- Invoice Customizations -->
						<div class="invoicePanels invoiceCustomizations">
							<div class="invoicePanelHead">
								<div class="row clearfix">
									<div class="left">
										<h2>Invoice Customizations</h2>
									</div>
								</div>
							</div>
							<div class="invoicePanelContent">

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Bill by:</label>
									</div>
									<div class="left">
										<select name="" id="">
											<?php if (!empty($invoiceArray->billedBy)): ?>
												<option value="<?php echo $invoiceArray->billedBy ?>" selected><?php echo $invoiceArray->billedBy ?></option>
											<?php endif ?>
											<option value="">Quantity</option>
										</select>
									</div>
								</div>
								<!-- / -->

								<!--  -->
								<div class="row clearfix">
									<div class="left">
										<label for="">Currency:</label>
									</div>
									<div class="left">
										<select name="" id="">
											<option value="">US dollars</option>
										</select>
									</div>
								</div>
								<!-- / -->
								
							</div>
						</div>
						<!-- /Invoice Customizations -->
						
					</div>
					<!-- /Right Column -->
					
				</div>
				<!-- /Invoice Header -->


				<!-- Invoice Content -->
				<div class="row clearfix theInvoiceContent">

					<!-- Header -->
					<div class="theInvoiceContentRow invoiceHeader">
						
						<div class="row clearfix">
							<div class="rowColumn itemDescription">
								<h1>Item Description</h1>
							</div>
							<div class="rowColumn unitPrice">
								<h1>Unit Price</h1>
							</div>
							<div class="rowColumn quantity">
								<h1>Quantity</h1>
							</div>
							<div class="rowColumn totalPrice">
								<h1>Total Price</h1>
							</div>
						</div>

					</div>

					<!-- Row -->
					<div class="theInvoiceContentRow">
						
						<div class="row clearfix">
							<div class="rowColumn itemDescription">

								<h1>Initial deposit</h1>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna </p>
							
							</div>
							
							<div class="rowColumn unitPrice">

								<h1>$20,000.00</h1>
							
							</div>
							
							<div class="rowColumn quantity">

								<h1>01</h1>
							
							</div>
							
							<div class="rowColumn totalPrice">

								<h1>$20,000.00</h1>
							
							</div>
						</div>

					</div>

					<!-- Row -->
					<div class="theInvoiceContentRow">
						
						<div class="row clearfix">
							
							<div class="rowColumn itemDescription">

								<h1>Initial deposit</h1>
								<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna </p>
							
							</div>
							
							<div class="rowColumn unitPrice">

								<h1>$20,000.00</h1>
							
							</div>
							
							<div class="rowColumn quantity">

								<h1>01</h1>
							
							</div>
							
							<div class="rowColumn totalPrice">

								<h1>$20,000.00</h1>
							
							</div>

						</div>

					</div>

					<div class="theInvoiceContentRow last">
						<a href="">Add new Row</a>
					</div>


					<div class="invoiceTotals">
						
						<div class="row clearfix">
							
							<div class="offset6">
								<div class="row">
									<div class="row clearfix totalRow">
										<div class="left">Discounts:</div>
										<div class="left">
											<div class="left inner"><input type="text" value="50"></div>
											<div class="left inner">
												<select name="" id="">
													<option value="">$</option>
												</select>
											</div>
										</div>
										<div class="left">- $50.00</div>
									</div>
									<div class="row clearfix totalRow">
										<div class="left">Tax (20%):</div>
										<div class="left">
											<div class="left inner"><input type="text" value="20"></div>
											<div class="left inner">
												<select name="" id="">
													<option value="">%</option>
												</select>
											</div>
										</div>
										<div class="left">$8000.00</div>
									</div>
									<div class="row clearfix totalRow">
										<div class="left">Shipping:</div>
										<div class="left">
											<div class="left inner"><input type="text" value="$0.00"></div>
										</div>
										<div class="left">$0.00</div>
									</div>
									<div class="row clearfix totalRow">
										<div class="left">Total Price Due:</div>
										<div class="left">&nbsp;</div>
										<div class="left">$47,950.00</div>
									</div>
								</div>
							</div>

						</div>

					</div>
					
				</div>
				<!-- /Invoice Content -->


				<!-- Invoice Footer -->
				<div class="row clearfix theInvoiceFooter">

					<div class="row clearfix">
						
						<div class="span6">
							<!-- Invoice FooterNote -->
							<div class="invoicePanels invoiceFooterNote">
								<div class="invoicePanelHead">
									<div class="row clearfix">
										<div class="left">
											<h2>Footer Note</h2>
										</div>
										<div class="right">
											<ul>
												<li><a href="">Update</a></li>
												<li><a href="">Remove</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="invoicePanelContent">
									<hr>
									<textarea>Thank you for your business</textarea>
								</div>
							</div>
							<!-- /Invoice FooterNote -->
						</div>

						<div class="offset6">
							<!-- Invoice TOC -->
							<div class="invoicePanels invoiceTOC">
								<div class="invoicePanelHead">
									<div class="row clearfix">
										<div class="left">
											<h2>Terms & Conditions</h2>
										</div>
										<div class="right">
											<ul>
												<li><a href="">Update</a></li>
												<li><a href="">Remove</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="invoicePanelContent">
									<textarea name="" id="">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum</textarea>
								</div>
							</div>
							<!-- /Invoice TOC -->
						</div>

					</div>
					
				</div>
				<!-- /Invoice Footer -->
			
				

			</div>

		</div>

	</div>

</div>