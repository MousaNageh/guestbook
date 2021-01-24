<?php
//select all 

function select_all($table_name)
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM $table_name");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


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

//delete row 
function delete($table_name, $condtion, $data)
{
  global $con;
  $stmt = $con->prepare("DELETE FROM $table_name WHERE $condtion ");
  $stmt->execute($data);
  if ($stmt->rowCount() > 0)
    return true;
  else
    return false;
}

//update table 

function update($table_name, $arr_updated_clumns, $condtion, $arr_values)
{
  global $con;
  $updated_clumns_string = "";
  foreach ($arr_updated_clumns as $column)
    $updated_clumns_string .= $column . "= ? ,";
  $updated_clumns_string = rtrim($updated_clumns_string, ",");
  $stmt = $con->prepare("UPDATE  $table_name SET $updated_clumns_string where $condtion");
  $stmt->execute($arr_values);
  if ($stmt->rowCount() > 0)
    return true;
  else
    return false;
}

//select from two tables 
function select_all_from_two_tables($table_name1, $table_name2, $On)
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM $table_name1 JOIN $table_name2 ON $On ");
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else
    return false;
}
//select from two tables with conditon 
function select_from_two_tables($table_name1, $table_name2, $On, $condtion, $arr_value)
{
  global $con;
  $stmt = $con->prepare("SELECT * FROM $table_name1 JOIN $table_name2 ON $On WHERE $condtion ");
  $stmt->execute($arr_value);
  if ($stmt->rowCount() > 0) {
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else
    return false;
}