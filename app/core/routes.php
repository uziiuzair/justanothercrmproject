<?php use uziiuzair\crm;

/**
 * Getting the server request
 */
$page = crm\Routes::getServerRequest();

if (!crm\Sessions::get('studioUserLogin')) {
	$page = 'login';
}

switch ($page) {


	case 'dashboard':
		
		crm\Templates::get_header('Dashboard');
		crm\Templates::view('dashboard');
		crm\Templates::get_footer();

		break;
		

	case 'clients':

		crm\Templates::get_header('Clients');
		crm\Templates::view('clients');
		crm\Templates::get_footer();
		

		break;

	case 'clients/id':

		crm\Templates::get_header('Client');
		crm\Templates::view('subview/client');
		crm\Templates::get_footer();

		break;
		

	case 'expenses':

		crm\Templates::get_header('Expenses');
		crm\Templates::view('expenses');
		crm\Templates::get_footer();
		

		break;
		

	case 'expense/id':

		crm\Templates::get_header('Expenses');
		crm\Templates::view('subview/expense');
		crm\Templates::get_footer();
		

		break;
		

	case 'invoices':

		crm\Templates::get_header('Invoices');
		crm\Templates::view('invoices');
		crm\Templates::get_footer();
		

		break;


	case 'invoice/print':

		crm\Templates::get_header('Print Invoice');
		crm\Templates::view('subview/invoice.print');
		crm\Templates::get_footer();

		break;


	case 'invoice/id':

		crm\Templates::get_header('Invoice');
		crm\Templates::view('subview/invoice');
		crm\Templates::get_footer();

		break;
		

	case 'leads':

		crm\Templates::get_header('Leads');
		crm\Templates::view('leads');
		crm\Templates::get_footer();
		

		break;

	case 'leads/id':

		crm\Templates::get_header('Lead');
		crm\Templates::view('subview/lead');
		crm\Templates::get_footer();

		break;
		

	case 'projects':

		crm\Templates::get_header('Projects');
		crm\Templates::view('projects');
		crm\Templates::get_footer();
		

		break;

	case 'project/id':

		crm\Templates::get_header('Project');
		crm\Templates::view('subview/project');
		crm\Templates::get_footer();

		break;
		

	case 'proposals':

		crm\Templates::get_header('Proposals');
		crm\Templates::view('proposals');
		crm\Templates::get_footer();
		

		break;
		

	case 'proposal/id':

		crm\Templates::get_header('Proposal');
		crm\Templates::view('subview/proposal');
		crm\Templates::get_footer();

		break;
		

	case 'proposal/print':

		crm\Templates::get_header('Proposal');
		crm\Templates::view('subview/proposal.print');
		crm\Templates::get_footer();

		break;
		

	case 'staff':

		crm\Templates::get_header('Staff');
		crm\Templates::view('staff');
		crm\Templates::get_footer();
		

		break;
		

	case 'staff/member':

		crm\Templates::get_header('Staff');
		crm\Templates::view('subview/staff');
		crm\Templates::get_footer();
		

		break;
		

	case 'services':

		crm\Templates::get_header('Services');
		crm\Templates::view('services');
		crm\Templates::get_footer();
		

		break;
		

	case 'calendar':

		crm\Templates::get_header('Calendar');
		crm\Templates::view('calendar');
		crm\Templates::get_footer();
		

		break;
		

	case 'editor/new':

		crm\Templates::get_header('Editor');
		crm\Templates::view('editor');
		crm\Templates::get_footer();

		break;
		

	case 'editor/document':

		crm\Templates::get_header('Editor');
		crm\Templates::view('subview/document');
		crm\Templates::get_footer();

		break;


	case 'account/settings':

		crm\Templates::get_header('Account Settings');
		crm\Templates::view('settings');
		crm\Templates::get_footer();
		

		break;
		


	case 'login':

		# Check if Session Exists
		if (!crm\Sessions::get('studioUserLogin')) {
			crm\Templates::view('login.admin');
		} else {
			header('Location: ' . crm\Config::SystemPublicURL . crm\Config::SystemDefaultPage);
		}

		
		

		break;
		

	case 'client/dashboard':

		crm\Templates::view('client/dashboard');

		break;
		

	case 'client/projects':

		crm\Templates::view('client/projects');

		break;
		

	case 'client/invoices':

		crm\Templates::view('client/invoices');
		

		break;
		

	case 'login/client':
		
		crm\Templates::view('client/login');

		break;


	case 'crm/settings':

		crm\Templates::get_header('CRM Settings');
		crm\Templates::view('admin');
		crm\Templates::get_footer();

		break;
	

	default:
	
		# Check if Session Exists
		if (!crm\Sessions::get('studioUserLogin')) {
			crm\Templates::view('errors/404.nosession');
		} else {
			crm\Templates::get_header('Page not found');
			crm\Templates::view('errors/404');
			crm\Templates::get_footer();
			
		}
		

		break;

}