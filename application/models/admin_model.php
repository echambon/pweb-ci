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
}
