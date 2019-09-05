<?php  
/**
 * Invoices
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * Class invoices
 * @package studio\app
 */
class Invoices
{

	/**
	 * Create a new Project
	 * @param  $staff_id [<description>]
	 * @param  $details [<description>]
	 * @return [type] [description]
	 */
	public static function create($staff_id, array $details) {

		# Invoce Statuses:
		# 1	-	Unpaid
		# 2	-	Paid
		# 3	-	Draft
		# 4	-	Overdue
		# 5	-	Cancelled
		# 6	-	Refunded
		# 7	-	Collection (Disputed)

	}





	/**
	 * Get Project with ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function get($invoice_id) {

		if (!Config::$db) {
			Config::db();
		}

		$invoice_id 	= stripslashes($invoice_id);
		$invoice_id 	= Config::$db->escape_string($invoice_id);

		$invoice = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `invoices` WHERE `id` = ?");
		$stmt->bind_param('i', $invoice_id);
		$stmt->bind_result(
			$invoice->id,
			$invoice->client_id,
			$invoice->staff_id,
			$invoice->copy_id,
			$invoice->expense_id,
			$invoice->proposal_id,
			$invoice->project_id,
			$invoice->order_id,
			$invoice->logo_id,
			$invoice->currency_id,
			$invoice->accentColor,
			$invoice->textColor,
			$invoice->linkColor,
			$invoice->invoiceNumber,
			$invoice->frequency,
			$invoice->created,
			$invoice->updated,
			$invoice->dueDate,
			$invoice->dateSent,
			$invoice->datePaid,
			$invoice->note,
			$invoice->footnote,
			$invoice->toc,
			$invoice->status,
			$invoice->subTotal,
			$invoice->totalDiscount,
			$invoice->totalTax,
			$invoice->total,
			$invoice->companyStreet,
			$invoice->companyCity,
			$invoice->companyState,
			$invoice->companyCountry,
			$invoice->companyZip,
			$invoice->billingStreet,
			$invoice->billingCity,
			$invoice->billingState,
			$invoice->billingZip,
			$invoice->billingCountry,
			$invoice->shippingStreet,
			$invoice->shippingCity,
			$invoice->shippingState,
			$invoice->shippingZip,
			$invoice->shippingCountry,
			$invoice->recurring,
			$invoice->billedBy,
			$invoice->customFields
		);
		
		$stmt->execute();
		$stmt->fetch();

		if ($invoice->id === '') {
			return 'Invoice not found';
		} else {
			return $invoice;
		}

		$stmt->close();

	}




	/**
	 * List All invoices
	 * @return [type] [description]
	 */
	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM invoices");

		return $query->fetch_all(MYSQLI_ASSOC);

	}	





	/**
	 * Get All invoices for Client with ID
	 * @param  [type] $id [description]
	 * @return array
	 */
	public static function forClient($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM invoices WHERE `client_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Gets all Invoices with the Project ID
	 * @param  int $id 	 Project ID
	 * @return array    
	 */
	public static function forProject($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM invoices WHERE `project_id` = $id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	/**
	 * Update Invoice
	 * @param  [type] $id      [description]
	 * @param  array  $details [description]
	 * @return [type]          [description]
	 */
	public static function update($id, array $details) {

	}







}