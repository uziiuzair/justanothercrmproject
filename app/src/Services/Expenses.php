<?php   
/**
 * Expenses
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

namespace uziiuzair\crm\Services;
use uziiuzair\crm\Config;
use uziiuzair\crm\Sessions;

/**
 * Class expenses
 * @package studio\app
 */
class Expenses
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
		

	}





	/**
	 * Get Expense with ID
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function get($expense_id) {

		if (!Config::$db) {
			Config::db();
		}

		$expense_id 	= stripslashes($expense_id);
		$expense_id 	= Config::$db->escape_string($expense_id);

		$expense = new \stdClass();

		$stmt = Config::$db->prepare("SELECT * FROM `expenses` WHERE `id` = ?");
		$stmt->bind_param('i', $expense_id);
		$stmt->bind_result(
			$expense->id,
			$expense->staff_id,
			$expense->client_id,
			$expense->project_id,
			$expense->account_id,
			$expense->invoice_id,
			$expense->order_id,
			$expense->currency,
			$expense->name,
			$expense->description,
			$expense->created,
			$expense->updated,
			$expense->amount,
			$expense->tax,
			$expense->datePaid,
			$expense->dateDue,
			$expense->amountExclTax,
			$expense->media_id,
			$expense->receiptNumber,
			$expense->note
		);
		$stmt->execute();
		$stmt->fetch();

		if ($expense->id === '') {
			return 'Invoice not found';
		} else {
			return $expense;
		}

		$stmt->close();

	}




	/**
	 * List All expenses
	 * @return [type] [description]
	 */
	public static function all() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM expenses");

		return $query->fetch_all(MYSQLI_ASSOC);

	}	





	/**
	 * Get All expenses for Client with ID
	 * @param  [type] $id [description]
	 * @return array
	 */
	public static function forClient($id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM expenses WHERE `client_id` = $id");

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




	public static function accounts() {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM expenseAccounts");

		return $query->fetch_all(MYSQLI_ASSOC);

	}





	public static function expensesOccured($account_id) {

		if (!Config::$db) {
			Config::db();
		}

	}




	public static function items($expense_id) {

		if (!Config::$db) {
			Config::db();
		}

		$query = Config::$db->query("SELECT * FROM expenseItems WHERE `expense_id` = $expense_id");

		return $query->fetch_all(MYSQLI_ASSOC);

	}






}