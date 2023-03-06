<?php

    include_once 'database.php';
    $GLOBALS['connect'] = $connect;

    function getFaculty($ID=NULL){
        if($ID==NULL){
            $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM faculty");
            $all_data = array();

            while($row=mysqli_fetch_assoc(($query))){
                array_push($all_data,$row);
            }

            return $all_data;

        } else {

                $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM faculty WHERE facID='".$ID."'");
                $all_data = array();
    
                while($row=mysqli_fetch_assoc(($query))){
                    array_push($all_data,$row);
                }
    
                return $all_data;
        }
        

    }

    function getDepartment($facID=NULL){
        if($facID==NULL){
            $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM department");
            $all_data = array();

            while($row=mysqli_fetch_assoc(($query))){
                array_push($all_data,$row);
            }

            return $all_data;

        } else {

                $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM department WHERE facID='".$facID."'");
                $all_data = array();
    
                while($row=mysqli_fetch_assoc(($query))){
                    array_push($all_data,$row);
                }
    
                return $all_data;
    

        }
    }

    function getSubject($depID=NULL,$semester){

        if($depID==NULL){
            $query = mysqli_query($GLOBALS['connect'],"SELECT * FROM subject");
            $all_data = array();

            while($row=mysqli_fetch_assoc(($query))){
                array_push($all_data,$row);
            }

            return $all_data;

        } else {

                $sql = "SELECT * FROM subject WHERE depID='$depID' AND semester='$semester'";
                $query = mysqli_query($GLOBALS['connect'],$sql);
                $all_data = array();
    
                while($row=mysqli_fetch_assoc(($query))){
                    array_push($all_data,$row);
                }
    
                return $all_data;
    
        }
    }

    if(isset($_REQUEST['type'])){
        if($_REQUEST['type']=="department"){
            echo json_encode(getDepartment($_REQUEST['facID']));
        }
        else if($_REQUEST['type']=="subject"){
            echo json_encode(getSubject($_REQUEST['depID'],$_REQUEST['semester']));
        }
    } else {
        echo json_encode(getFaculty());
    }
?>