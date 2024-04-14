<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "attendance";
    $connect = mysqli_connect($hostname, $username, $password, $database);
    if(!$connect){
        die("Something went wrong!".mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $data[$key] = $value;
        }
        return $data;
    }

    function selectAllData($table){
        $connect = $GLOBALS["connect"];
        $query = "SELECT * FROM $table";
        $result = mysqli_query($connect, $query);
        return $result;
    }

    function insertData($sql, $values, $datatypes){
        $connect = $GLOBALS["connect"];
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            }else{
                mysqli_stmt_close($stmt);
                die("Query Cannot be Executed - Insert");
            }
        }else{
            die("Query Cannot be Prepared - Insert");
        }
    }

    
    function selectData($sql, $values, $datatypes){
        $connect = $GLOBALS["connect"];
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            }else{
                mysqli_stmt_close($stmt);
                die("Query Cannot be Executed - Select");
            }
        }else{
            die("Query Cannot be Prepared - Select");
        }
    }

    function updateData($sql, $values, $datatypes){
        $connect = $GLOBALS["connect"];
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            }else{
                mysqli_stmt_close($stmt);
                die("Query Cannot be Executed - Update");
            }
        }else{
            die("Query Cannot be Prepared - Update");
        }
    }

    function deleteData($sql, $values, $datatypes){
        $connect = $GLOBALS["connect"];
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $result;
            }else{
                mysqli_stmt_close($stmt);
                die("Query Cannot be Executed - Delete");
            }
        }else{
            die("Query Cannot be Prepared - Delete");
        }
    }
?>