<?php
class           Mysql
{

    var         $database;
    var         $connection;

    function    __construct($db, $user, $pwd) {
        $this->connection = mysql_connect($db, $user, $pwd) or die('Could not connect to DataBase<br />');
        $this->database = mysql_select_db('menelu', $this->connection) or die('Could not select DataBase<br />');
    }

    function     __destruct() {
        if (isset($this->connection))
            mysql_close($this->connection);
    }

    function    getDatabase() {
        return $this->database;
    }

    function    executeQuery($query) {
        $query = mysql_real_escape_string($query);
        $result = mysql_query($query);
        return $result;
    }
}
?>
