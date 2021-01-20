<?php
#number_format();

global $conn;

function OpenConnection()
{
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ebook";

    if(!$conn)
    {
        $conn = mysqli_connect($servername, $username, $password, $dbname)
            or die("Không thể kết nối đến Database");
        mysqli_set_charset($conn, 'utf8');
    }
}

function CloseConnection()
{
    global $conn;
     
    if ($conn){
        mysqli_close($conn);
    }
}

function LoadData($sql)
{
    global $conn;
    OpenConnection();  

    $query = mysqli_query($conn, $sql); 
    $result = array();
     
    if ($query)
    {
        while ($row = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
    }
    #CloseConnection();
    return $result;
}

function Insert($sql)
{
    global $conn;
    OpenConnection();  

    $query = mysqli_query($conn, $sql); 
     
    if ($query)
        return true;
    #CloseConnection();
    return false;
}

class DataProvider 
{
	public static function ExecuteQuery($sql)
	{
		$connection = mysqli_connect('localhost','root','') or
			die ("couldn't connect to localhost");

		
		mysqli_select_db($connection, 'Ebook');
				
		mysqli_query($connection, "set names 'utf8'");
		
		$result = mysqli_query($connection, $sql);
		
		mysqli_close($connection);
		
		return $result;
	}
    
    
	public static function ChangeURL($path)
	{
		echo '<script type = "text/javascript">';
		echo 'location = "'.$path.'";';
		echo '</script>';
	}
}