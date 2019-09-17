<?php 
/**
 * Leads Page (leads.php)
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

?>
<div class="container leadsPage">
	
	<div class="wrapper">
		
		<div class="microWrapper" id="leadList">

			<div class="pageHeader">
				<div class="row clearfix">
					
					<div class="span6">
						<div class="row clearfix">
							<div class="inline-float">
								<h1>Leads</h1>
							</div>
							<div class="inline-float">
								<input class="search" placeholder="Search...">
							</div>
						</div>
					</div>
					
					<div class="span6">
						<a href="#!" class="ismodal headerButton" data-modal="addNewLead">Add New Lead</a>
					</div>

				</div>
			</div>

			<div class="pageContent">
				
				<div class="customersContainer">
					
					<ul class="list">
						<?php 

						$leads = crm\Services\Leads::getAll(); 
						$reverseLeads = array_reverse($leads);
						?>

						<?php foreach ($reverseLeads as $lead): ?>

						<li>
		
							<div class="customer">
								<a href="<?php echo crm\Config::SystemPublicURL; ?>leads/id/<?php echo $lead['id'] ?>">
									
									<div class="row clearfix">

										<!-- Name / Company -->
										<div class="span3">
											<p class="name"><?php echo $lead['name']; ?></p>
											<p class="company"><?php echo $lead['company']; ?></p>
										</div>

										<!-- Email -->
										<div class="span3 email thisflexes">
											<p class="title">&nbsp;</p>
											<p class="value"><?php echo $lead['email']; ?></p>
										</div>
										
										<!-- Phone -->
										<div class="span3 phone thisflexes">
											<p class="title">&nbsp;</p>
											<p class="value"><?php echo $lead['phone']; ?></p>
										</div>
										
										<!-- Staff -->
										<div class="span2 staff thisflexes">
											<p class="title">Staff</p>
											<p class="value"><?php echo crm\Users::getUserField($lead['staff_id'], 'firstname') . ' ' . crm\Users::getUserField($lead['staff_id'], 'lastname'); ?></p>
										</div>

										
										<!-- Status -->
										<div class="span1 status thisflexes">
											<p class="title">Status</p>
											<p class="value"><?php echo crm\Services\Leads::translateStatus($lead['status']); ?></p>
										</div>
	
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

	var leadList = new List('leadList', options);
</script>

<script src="/app/includes/js/page.leads.js"></script>