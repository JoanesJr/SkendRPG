<?php

namespace App;

class Connection {

	public static function getDb() {
		try {

			$conn = new \PDO(
				"mysql:host=localhost;dbname=skendRPG;charset=utf8",
				"root",
				"def75315901" 
			);

			return $conn;

		} catch (\PDOException $e) {
			echo $e->getMessage();
		}
	}
}

?>