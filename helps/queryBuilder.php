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
//insert data into database 
function insert($table_name, $arr_columns_names, $arr_values)
{
  global $con;
  $columns = implode(",", $arr_columns_names);
  $question_mark = "";
  for ($number_of_fields = 0; $number_of_fields < count($arr_columns_names); $number_of_fields++)
    $question_mark .= "?,";
  $question_mark = rtrim($question_mark, ",");
  $stmt = $con->prepare("INSERT INTO $table_name($columns) VALUES ($question_mark)");
  $stmt->execute($arr_values);
  if ($stmt->rowCount() > 0)
    return true;
  else
    return false;
}