<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../../library/function.php";


if (
    isset($_POST["bil_id"])
    && isset($_POST["del_id"])
  
) {
	//==============get paramter for table bill
    $bil_id = $_POST["bil_id"];
	$del_id = $_POST["del_id"];
	
	
    $insertArray = array();

    array_push($insertArray, htmlspecialchars(strip_tags($del_id)));
	array_push($insertArray, htmlspecialchars(strip_tags($bil_id)));
	  

    $sql = "update bill set del_id = ? where bil_id = ?";
    $result = dbExec($sql, $insertArray);

	
	

    $resJson = array("result" => "success", "code" => "200", "message" => "done");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
} else {
    //bad request
    $resJson = array("result" => "fail", "code" => "400", "message" => "error");
    echo json_encode($resJson, JSON_UNESCAPED_UNICODE);
}
