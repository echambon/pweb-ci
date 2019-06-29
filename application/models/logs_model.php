<?php
class logs_model extends CI_Model {
  /**
  * Public function
  *
  * Insert new log entry.
  *
  * @return	void
  */
  public function log_admin_connection($username,$log_error_id) {
    // current datetime
    $login_date = date("Y-m-d H:i:s");

    // ipadress
    $ip_address = $this->get_user_ip_address();

    // insert row in pw_logs
    $this->db->query("INSERT INTO pw_logs (username, login_date, ip_address, error) VALUES('".$username."', '".$login_date."', '".$ip_address."', '".$log_error_id."')");
  }

  /**
  * Public function
  *
  * Gets user IP adress
  *
  * @return	string
  */
  private function get_user_ip_address() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      //ip from share internet
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      //ip pass from proxy
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }

  /**
  * Public function
  *
  * Get logs data and apply limit/offset/order
  *
  * @return	array
  */
  public function get_logs_ordered_with_limit($str_where,$limit,$offset,$order_by,$desc) {
    $sql_query = "SELECT * FROM pw_logs";

    if(!empty($str_where)) {
      $sql_query = $sql_query . " WHERE " . $str_where;
    }

    $sql_query = $sql_query . " ORDER BY " . $order_by;

    if($desc) {
      $sql_query = $sql_query . " DESC";
    }

    if(strcmp($limit,"all") != 0) {
      $sql_query = $sql_query . " LIMIT " . strval($limit);
      $sql_query = $sql_query . " OFFSET " . strval($offset);
    }

    // execute query
    $query = $this->db->query($sql_query);

    // return result
    return $query->result();
  }

  // todo : function to count amount of logs
  /**
  * Public function
  *
  * Get number of logs
  *
  * @return	array
  */
  public function get_logs_number() {
    $query = $this->db->query("SELECT COUNT(id) AS count FROM pw_logs");
    return $query->result();
  }
}
