<?php
class admin_model extends CI_Model {
  /**
  * Public function
  *
  * Gets user data from DB through username column.
  *
  * @return	array
  */
  public function get_user_by_username($username) {
    $query = $this->db->query("SELECT * FROM pw_users WHERE username='".$username."' LIMIT 1");
    return $query->result();
  }

  /**
  * Public function
  *
  * Gets user data from DB through id column.
  *
  * @return	array
  */
  public function get_user_by_id($id) {
    $query = $this->db->query("SELECT * FROM pw_users WHERE id='".$id."' LIMIT 1");
    return $query->result();
  }

  /**
  * Public function
  *
  * Updates last admin login datetime.
  *
  * @return	array
  */
  public function set_user_last_login($username) {
    // current time
    $time = date("Y-m-d H:i:s");

    // MySQL query
    $this->db->query("UPDATE pw_users SET last_login='".$time."'");
  }

  /**
  * Public function
  *
  * Gets last admin login datetime.
  *
  * @return	array
  */
  public function get_user_last_login($username) {
    // MySQL query
    $query = $this->db->query("SELECT last_login FROM pw_users WHERE username='".$username."' LIMIT 1");

    // return query result
    return $query->result();
  }

  /**
  * Public function
  *
  * Gets website settings
  *
  * @return	array
  */
  public function get_website_settings() {
    $query = $this->db->query("SELECT * FROM pw_settings LIMIT 1");
    return $query->result();
  }

  /**
  * Public function
  *
  * Updates logs activation settings
  *
  * @return	void
  */
  public function set_logs_activation_settings($log_success,$log_failed) {
    $this->db->query("UPDATE pw_settings SET log_successful_connection_activated='".$log_success."', log_failed_attempts_activated='".$log_failed."'");
  }

  /**
  * Public function
  *
  * Updates general website settings.
  *
  * @return	void
  */
  public function set_website_settings($title, $subtitle, $keywords, $homepage_id) {
    // MySQL query
    $this->db->query("UPDATE pw_settings SET website_title='".$title."', website_subtitle='".$subtitle."', website_keywords='".$keywords."', website_homepage_id='".$homepage_id."'");
  }

  /**
  * Public function
  *
  * Updates admin user profile.
  *
  * @return	void
  */
  public function set_user_profile($id, $username, $hashed_password, $email) {
    // MySQL query
    $this->db->query("UPDATE pw_users SET username='".$username."', password='".$hashed_password."', email='".$email."' WHERE id='".$id."'");
  }
}
