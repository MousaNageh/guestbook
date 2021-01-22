<?php
//select statement 
function select($table_name, $arr_fields, $str_conditions = "", $arr_values = "")
{
  global $con;
  $fields = implode(",", $arr_fields);
  if (!empty($str_conditions) && !empty($arr_values)) {
    $stmt = $con->prepare("SELECT $fields FROM $table_name WHERE $str_conditions");
    $stmt->execute($arr_values);
    if ($stmt->rowCount() > 0)
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    else
      return false;
  } else {
    $stmt = $con->prepare("SELECT $fields FROM $table_name ");
    $stmt->execute();
    if ($stmt->rowCount() > 0)
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    else
      return false;
  }
}