<?php
class pages_model extends CI_Model {
  /**
  * Public function
  *
  * Get pages data and apply limit/offset/order
  *
  * @return	array
  */
  public function get_pages_ordered_with_limit($str_where,$limit,$offset,$order_by,$desc) {
    $sql_query = "SELECT * FROM pw_pages";

    if(!empty($str_where)) {
      $sql_query = $sql_query . " WHERE " . $str_where;
    }

    $sql_query = $sql_query . " ORDER BY " . $order_by;

    if($desc) {
      $sql_query = $sql_query . " DESC";
    }

    if(strcmp($limit,"9999") != 0) {
      $sql_query = $sql_query . " LIMIT " . strval($limit);
      $sql_query = $sql_query . " OFFSET " . strval($offset);
    }

    // execute query
    $query = $this->db->query($sql_query);

    // return result
    return $query->result();
  }

  /**
  * Public function
  *
  * Get number of pages
  *
  * @return	array
  */
  public function get_pages_number() {
    $query = $this->db->query("SELECT COUNT(id) AS count FROM pw_pages");
    return $query->result();
  }
}
