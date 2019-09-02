<?php
/**
 * Print Invoice Page (invoice.print.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm;

?>

<div class="container printInvoicePage">
	
	<div class="wrapper">
		
		<div class="row debugInformation">
			<span>Debug Information</span>
		</div>

		<!-- Header -->
		<div class="row invoicePageHeader clearfix">
			
			<div class="span4 column">
				<h1>College Host Web Development</h1>
			</div>

			<div class="span3 column">
				<h2>Invoice Number #00001</h2>
			</div>
			
			<div class="span5 column">
				<nav>
					<ul>
						<li><a href="">Print Invoice</a></li>
						<li><a href="">Edit Invoice</a></li>
						<li><a href="">Save as Draft</a></li>
						<li><a href="">Send to Client</a></li>
						<li><a href="">View Invoice</a></li>
					</ul>
				</nav>
			</div>

		</div>

		<!-- Invoice -->
		<div class="row clearfix theInvoice">

			<div class="theInvoiceWrapper">
			
				<div class="span12 column">
					
					<!-- Page Top -->
					<div class="row clearfix theInvoiceTop">
						
						<div class="grid">
							
							<div class="logo">
								<img src="https://crm.envato.dev:8890/app/includes/images/logo.png" alt="">
							</div>

							<div class="title">
								<h1>Invoice</h1>
							</div>
							
							<div class="address">
								<p class="companyName">College Host (pvt) Limited</p>
								<p class="companyAddress">Islamabad, Pakistan.</p>
								<p class="companyWebsite">www.collegehost.org</p>
								<p class="companyEmail">support@collegehost.org</p>
							</div>

						</div>

					</div>

					<!-- Page Header -->
					<div class="row clearfix theInvoiceHeader">

						<div class="grid">
							
							<div class="recipient">
								
								<p>For</p>
								<p>
									<span>Selina Bhang</span>
									One Oasis Place, Sandejas St. <br>
									Malate , Manila, 1004 <br>
									Philippines
								</p>
								
							</div>

							<div class="dates">

								<p><span>Invoice Number:</span>#00001</p>
								<p><span>Issue Date:</span>6 May 2019</p>
								<p><span>Due Date:</span>16 May 2019</p>
								
							</div>

						</div>
						
					</div>

					<!-- Page Content -->
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
						<div class="theInvoiceContentRow last">
							
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


						<div class="invoiceTotals">
							
							<div class="row clearfix">
								
								<div class="offset5">
									<div class="row">
										<p><span>Discounts:</span> <span>- $50.00</span></p>
										<p><span>Tax (20%):</span> <span>$8000.00</span></p>
										<p><span>Total Price Due:</span> <span>$47,950.00</span></p>
									</div>
								</div>

							</div>

						</div>
						
					</div>

					<!-- Page Footer -->
					<div class="row clearfix theInvoiceFooter">
						<div class="span6">
							<hr>
							<h1>Thank you for your business</h1>
						</div>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>