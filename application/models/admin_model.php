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
    $query = $this->db->query("SELECT * FROM pw_users WHERE username='".$username."'");
    return $query->result();
  }
}
