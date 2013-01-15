<?php
/**
 * MysqlSearch.php
 *
 * This is file with MysqlSearch class
 *
 * @category	classes
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * MysqlSearch
 *
 * This class search in row of mysql table
 *
 * @version 1.0
 */
final class MysqlSearch {

	/**
	 * _db_connect
	 *
	 * @var string
	 */
	private $_db_connect = '';
	
	/**
	 * _db_charset
	 *
	 * @var string
	 */
	private $_db_charset = 'utf8';
	
	/**
	 * Constructor
	 * 
	 * This constructor initialize connect to DB
	 *
	 * @param array $data
	 * @return boolean
	 */
	public function __construct($data = '') {
		
		if (is_array($data)) {
			
			$this -> _db_connect = mysql_connect($data['server'], $data['user'], $data['password']);
			
			mysql_set_charset($this -> _db_charset, $this -> _db_connect);
			
			$db_selected = mysql_select_db($data['db_name'], $this -> _db_connect);
			
			return ($db_selected) ? true : false;
		}
		
		return false;
	}

	/**
	 * findKeywords
	 * 
	 * This function fint our keywords in row of table
	 *
	 * @param string $keywords
	 * @return array $search_results_array
	 */
    public function findKeywords($keywords) {
		
		/**
		 * Create a keywords array
		 */
		$keywords_array = explode(" ",$keywords);
		
		/**
		 * Select data query
		 */
		if(!$this->searchcolumns) {
			$this->searchcolumns = "*";
			$search_data_sql = "SELECT ".$this->searchcolumns." FROM ".$this->table;
		} else {
			$search_data_sql = "SELECT ".$this->entry_identifier.",".$this->searchcolumns." FROM ".$this->table;
		}
		
		/**
		 * Run query, assigning ref
		 */
		$search_data_ref = mysql_query($search_data_sql);
		
		/**
		 * Define $search_results_array, ready for population with refined results
		 */
		$search_results_array = array();
		
		if($search_data_ref) {
			while($all_data_array = mysql_fetch_array($search_data_ref)) {

				/**
				 * Get an entry indentifier
				 */
				$my_ident = $all_data_array[$this->entry_identifier];
		
				/**
				 * Cycle each value in the product entry
				 */
				foreach($all_data_array as $entry_key=>$entry_value) {

					/**
					 * Cycle each keyword in the keywords_array
					 */
					foreach($keywords_array as $keyword) {

						/**
						 * If the keyword exists...
						 */
						if($keyword) {

							/**
							 * Check if the entry_value contains the keyword
							 */
							if(stristr($entry_value,$keyword)) {
	
								/**
								 * If it does, increment the keywords_found_[keyword] array value
								 * This array can also be used for relevence results
								 */
								$keywords_found_array[$keyword] = (isset($keywords_found_array[$keyword]) and !empty($keywords_found_array[$keyword])) ? $keywords_found_array[$keyword]++ : '';
							}
						} else {

							/**
							 * This is a fix for when a user enters a keyword with a space after it.  The trailing space will cause a NULL value to 
							 * be entered into the array and will not be found.  If there is a NULL value, we increment the keywords_found value anyway.
							 */
							$keywords_found_array[$keyword]++;
						}

						unset($keyword);
					}
					
					/**
					 * Now we compare the value of $keywords_found against the number of elements in the keywords array.
					 * If the values do not match, then the entry does not contain all keywords so do not show it.
					 */
					$keywords_found_array = (isset($keywords_found_array)) ? $keywords_found_array : array();
					
					if(sizeof($keywords_found_array) == sizeof($keywords_array)) {
	
						/**
						 * If the entry contains the keywords, push the identifier onto an results array, then break out of the loop. 
						 * We're not searching for relevence, only the existence of the keywords, therefore we no longer need to continue searching
						 */
						array_push($search_results_array,"$my_ident");

						break;
					}
				}
			
				/**
				 * Delete variables
				 */
				unset($keywords_found_array);
				unset($entry_key);
				unset($entry_value);
			}
		}

		$this->numresults = sizeof($search_results_array);

		/**
		 * Return the results array
		 */
		return $search_results_array;
	}

	/**
	 * setIdentifier
	 * 
	 * This function set name of primary key of our table 
	 *
	 * @param string $entry_identifier
	 */
	public function setIdentifier($entry_identifier) {
		
		/**
		 * Set the db entry identifier
		 * This is the column that the user wants returned in their results array.
		 * Generally this should be the primary key of the table.
		 */
		$this->entry_identifier = $entry_identifier;
	}

	/**
	 * setTable
	 * 
	 * This function set our table name
	 *
	 * @param string $table
	 */
		public function setTable($table) {

			/**
			 * Set which table we are searching
			 */
			$this->table = $table;
		}

	/**
	 * setSearchColumns
	 * 
	 * This function set search column of our table
	 *
	 * @param string $columns
	 */
	public function setSearchColumns($columns) {
		$this->searchcolumns = $columns;
	}

    /**
	 * Destructor
	 *
	 * This function to close mysql connect
	 */
	public function __destruct() {
		mysql_close($this -> _db_connect);
	}
}

###################################################################
#http://code.activestate.com/recipes/125901-php-mysql-search-class/
#
# -=[ MySQL Search Class ]=- 
#
#      version 1.5
#
# (c) 2002 Stephen Bartholomew
#
# Functionality to search through a MySQL database, across
# all columns, for multiple keywords
#
# Usage:
#
#    Required:
#        $mysearch = new MysqlSearch;
#        $mysearch->setIdentifier("MyPrimaryKey");
#        $mysearch->setTable("MyTable");
#        $results_array = $mysearch->find($mysearchterms);
#
#    Optional:
#        This will force the columns that are searched
#        $mysearch->setSearchColumns("Name, Description");
#
#             Set the ORDER BY attribute for SQL query
#            $mysearch->setorderby("Name"); 
#
###################################################################
?>