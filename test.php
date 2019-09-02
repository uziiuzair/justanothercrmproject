<?php 
require 'app/vendor/autoload.php';
use uziiuzair\crm;

/**
 * Tasks
 */
// $tasksArray = array(
// 	'lead_id' 		=> 12,
// 	'staff_id' 		=> 1,
// 	'name' 			=> 'First Task',
// 	'description' 	=> 'This is the first task',
// 	'priority' 		=> 3,
// 	'start' 		=> '0',
// 	'end' 			=> '0',
// 	'status' 		=> 1,
// 	'billable' 		=> 1,
// 	'price' 		=> 0,
// 	'discount' 		=> 0,
// 	'visible' 		=> 0,
// );

// // echo crm\Services\Tasks::create($tasksArray);
// print_r(crm\Services\Tasks::create($tasksArray));

/**
 * Leads
 */
// $leadsArray = array(
// 	'staff_id'		=> '1',
// 	'honorific'		=> 'Mr.', 
// 	'name'			=> 'Uzair Hayat', 
// 	'email'			=> 'uzair.hayat@odvcreative.com', 
// 	'phone'			=> '09778418944', 
// 	'company'		=> 'ODV Creative', 
// 	'title'			=> 'Digital Specialist',
// 	'addressStreet'	=> 'Street Name',
// 	'addressCity'	=> 'City Name', 
// 	'addressState'	=> 'State Name', 
// 	'addressZip'	=> 'Zip Code', 
// 	'addressCountry' => '2',
// 	'source'		=> 'https://www.odvcreative.com/',
// 	'status'		=> '2',
// 	'website'		=> 'https://www.odvcreative.com/'
// );

// echo crm\Services\Leads::create('test', $leadsArray);
// echo crm\Services\Leads::archive();
// print_r(crm\Services\Leads::activeLeads());


/**
 * Logs
 */
// $logsArray = array(
// 	'client_id' => '0', 
// 	'project_id' => '0', 
// 	'staff_id' 	=> '1',
// 	'title' 	=> 'The Title', 
// 	'log' 		=> 'The Message'
// );

// echo crm\Functions::createLog('system_log', $logsArray);


/**
 * Functions
 */
// echo crm\Functions::getCountry(46);
// print_r(crm\Functions::getContinent('Americas'));

// $staffArray = array(
// 	'firstname' 		=> 'Manolo',
// 	'lastname' 			=> 'Tan',
// 	'username' 			=> 'manolo',
// 	'email' 			=> 'business@uziiuzair.com',
// 	'phone' 			=> '123456789011',
// 	'password'			=> 'test',
// 	'department_id' 	=> '1',
// 	'is_admin' 			=> '0'
// );

// // new User
// echo crm\Users::create($staffArray);
// echo crm\Users::departmentCreate('PR Team');