<?php
class logs_model extends CI_Model {
  /**
   * Public function
   *
   * Insert new log entry.
   *
   * @return	void
   */
  public function log_admin_connection($username) {
    // current datetime
    $login_date = date("Y-m-d H:i:s");

    // ipadress
    $ip_address = $this->get_user_ip_address();

    // insert row in pw_logs
    $this->db->query("INSERT INTO pw_logs (username, login_date, ip_address) VALUES('".$username."', '".$login_date."', '".$ip_address."')");
    //return $query->result();
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
}