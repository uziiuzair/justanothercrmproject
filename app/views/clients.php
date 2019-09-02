<?php 
/**
 * Clients Page (clients.php)
 *
 * Shows a list of all clients
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

?>
<div class="container customerPage">
	
	<div class="wrapper">
		
		<div class="microWrapper">

			<div class="pageHeader">
				<div class="row clearfix">
					
					<div class="span6">
						<h1>Customers</h1>
					</div>
					
					<div class="span6">
						<a href="#!" class="ismodal headerButton" data-modal="addNewClient">Add New Client</a>
					</div>

				</div>
			</div>

			<div class="pageContent">
				
				<div class="customersContainer" id="clientList">
					
					<ul class="list">
						<?php $clients = crm\Services\Clients::getAll(); ?>

						<?php foreach ($clients as $client): ?>

						<li>
		
							<div class="customer">
								<a href="<?php echo crm\Config::SystemPublicURL; ?>clients/id/<?php echo $client['id'] ?>">
									
									<div class="row clearfix">

										<!-- Name / Company -->
										<div class="span4">
											<p class="name">
												<?php echo $client['firstname'] . ' ' . $client['lastname']; ?>
											</p>
											<p class="company">
												<?php echo $client['company']; ?>
											</p>
										</div>

										<!-- Email -->
										<div class="span3 thisflexes">
											<p class="email">
												<?php echo $client['email']; ?>
											</p>
										</div>
										
										<!-- Phoen -->
										<div class="span3 thisflexes">
											<p class="phone">
												<?php echo $client['phone']; ?>
											</p>
										</div>

										<div class="span2"></div>
								
									</div>

								</a>
							</div>

						</li>

						

						<?php  endforeach ?>
					</ul>	

					<div class="paginationContainer">
						<ul class="pagination"></ul>
					</div>

				</div>

				

			</div>
			
		</div>

	</div>

</div>


<script>
	var options = {
		valueNames: [ 'name', 'company', 'email', 'phone' ],
		page:7,
		pagination: true
	};

	var clientList = new List('clientList', options);
</script>