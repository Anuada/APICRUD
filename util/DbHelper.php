<?php

/**
 * The **`DbHelper`** class is a utility for interacting with a **`MySQL`** database using the mysqli extension. It provides methods for basic CRUD operations and specific queries related to a visitor logging system.
 */
class DbHelper
{
    private $hostname = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $database = "form_submit";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    /**
     * The **`fetchRecords`** function retrieves all records from a specified database table.
     * 
     * @param string $table The name of the table to fetch records from.
     * @return array 
     */     public function fetchRecords($table, $args = null)
    {
       if ($args != null) {
        $key = array_keys($args);
        $value = array_values ($args);
        $condition = $this->condition($key, $value, "0", "AND");
        $sql = "SELECT * FROM `$table` WHERE $condition";

       } else {
        $sql = "SELECT * FROM `$table`";

       }
       $query = $this->conn->query($sql);
        $rows = [];
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * The **`fetchRecord`** function retrieves a single record from a specified table based on the provided conditions.
     * 
     * @param string $table The name of the table to fetch the record from.
     * @param array $args An associative array of column names and their corresponding values, used to build the **`WHERE`** clause of the query.
     * @return array|bool|null
     */
    public function fetchRecord(string $table, array $args)
    {
        $keys = array_keys($args);
        $values = array_values($args);
        $condition = $this->condition($keys, $values, 0, " AND ");
        $sql = "SELECT * FROM `$table` WHERE $condition";
        $query = $this->conn->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    /**
     * The **`deleteRecord`** function deletes a record from a specified table based on the given conditions and returns the number of affected rows.
     * 
     * @param string $table The name of the table from which to delete the record.
     * @param array $args An associative array of column names and values used to build the **`WHERE`** clause for deletion.
     * @return int|string
     */
    public function deleteRecord(string $table, array $args)
    {
        $key = array_keys($args);
        $value = array_values($args);
        $condition = $this->condition($key, $value, 0, " AND ");
        $sql = "DELETE FROM `$table` WHERE $condition";
        $this->conn->query($sql);
        return $this->conn->affected_rows;
    }

    public function getAllRecords($table)
    {
        $rows = [];
        $sql = "SELECT * FROM `$table`";
        $query = $this->conn->query($sql);
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * The **`addRecord`** function inserts a new record into a specified table using the provided data and returns the number of affected rows.
     * 
     * @param string $table The name of the table where the new record will be inserted.
     * @param array $args An associative array of column names and values to insert into the table.
     * @return int|string
     */
    public function addRecord(string $table, array $args)
    {
        $key = array_keys($args);
        $value = array_values($args);
        $keys = implode("`, `", $key);
        $values = implode("', '", $value);
        $sql = "INSERT INTO `$table` (`$keys`) VALUES ('$values')";
        $this->conn->query($sql);
        return $this->conn->affected_rows;
    }

    /**
     * The **`updateRecord`** function updates an existing record in a specified table based on the provided data and returns the number of affected rows.
     * 
     * @param string $table The name of the table where the record will be updated.
     * @param array $args An associative array of column names and values. The first key-value pair is used as the **`WHERE`** condition, while the rest are used to update the record.
     * @return int|string
     */
    public function updateRecord(string $table, array $args)
    {
        $key = array_keys($args);
        $value = array_values($args);
        $set = $this->condition($key, $value, 1, ", ");
        $sql = "UPDATE `$table` SET $set WHERE `$key[0]` = '$value[0]'";
        $this->conn->query($sql);
        return $this->conn->affected_rows;
    }

    /**
     * Get the current year
     * @return int|string
     */
    public function getCurrentYear()
    {
        $sql = "SELECT CURRENT_DATE AS `currentDate`";
        $query = $this->conn->query($sql);
        $date = $query->fetch_assoc();
        $year = date("Y", strtotime($date["currentDate"]));
        return $year;
    }

    /**
     * The **`condition`** function generates a conditional SQL-like string based on key-value pairs. It takes four parameters:
     *
     * @param array $key an array of keys (likely representing column names),
     * @param array $value an array of corresponding values,
     * @param int $index the starting point from which to begin constructing the condition,
     * @param string $implode a string that is used to concatenate the conditions (such as AND or OR).
     * @return string
     */
    private function condition(array $key, array $value, int $index, string $implode)
    {
        $condition = [];
        for ($i = $index; $i < count($key); $i++) {
            $condition[] = "`" . $key[$i] . "` = '" . $value[$i] . "'";
        }
        $cond = implode($implode, $condition);
        return $cond;
    }

    /**
     * The **`getAllLogs`** function retrieves and returns all visitor logs from the database, including details such as visitor name, purpose, type, status, office, date, and time.
     * @return array
     */
    /*   public function getAllLogs(): array
    {
        $sql = "SELECT 
                    `v`.`id`, 
                    CONCAT(COALESCE(NULLIF(`v`.`fname`,''), `e`.`fname`), ' ', COALESCE(NULLIF(`v`.`lname`,''), `e`.`lname`)) AS `title`,
                    `v`.`purpose`, 
                    `v`.`type`, 
                    `v`.`status`,
                    `v`.`office`, 
                    DATE_FORMAT(`v`.`date`, '%Y-%m-%d') AS `start`, 
                    DATE_FORMAT(`v`.`date`, '%Y-%m-%d') AS `end`, 
                    DATE_FORMAT(`v`.`date`, '%I:%i %p') AS `time` 
                FROM `visitor_info` `v`
                LEFT JOIN `employee_info` `e`
                ON `v`.`employee_id` = `e`.`tin_number`
                ";
        $query = $this->conn->query($sql);
        $rows = [];
        while ($row = $query->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * The **`allClients`** function retrieves the count of accepted employees and visitors for a given month.
     * 
     * @param string $month The month and year in the format **`'YYYY-MM'`** to filter the records.
     * @return array|bool|null
     */

    public function getRecordByNameAndAge($fname, $lname, $age)
    {
        // Use $this->conn for the database connection
        $sql = $this->conn->prepare("SELECT * FROM info WHERE fname = ? AND lname = ? AND age = ?");
        $sql->bind_param("ssi", $fname, $lname, $age); // 'ssi' indicates string, string, integer
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_assoc();
    }


    public function allClients(string $month)
    {
        $sql = "SELECT 
                    COUNT(CASE WHEN type = 'Employee' THEN 1 END) AS employee_count,
                    COUNT(CASE WHEN type = 'Visitor' THEN 1 END) AS visitor_count
                FROM 
                    visitor_info
                WHERE
                    DATE_FORMAT(date, '%Y-%m') = '$month' AND status = 'Accepted'
                ";
        $query = $this->conn->query($sql);
        return $query->fetch_assoc();
    }
}
