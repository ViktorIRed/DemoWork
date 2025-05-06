<?php
class Database
{
    private static $conn;

    public static function connect()
    {
        if (!self::$conn) {
            self::$conn = mysqli_connect("localhost", "root", "", "news");
            if (!self::$conn)
                die("Error connect Database");
        }
    }
    public static function getAllNews()
    {
        return mysqli_query(self::$conn, "SELECT * FROM `news` ORDER BY date DESC");
    }
    public static function getNewsById($id)
    {
        return mysqli_fetch_assoc(mysqli_query(self::$conn, "SELECT * FROM `news` WHERE `id` = '$id'"));
    }

    public static function getLatestNewsId()
    {
        return mysqli_fetch_assoc(mysqli_query(self::$conn, "SELECT id FROM news ORDER BY id DESC LIMIT 1;"))['id'];
    }
}

?>