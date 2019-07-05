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

  /**
  * Public function
  *
  * Creates a page in the databse
  *
  * @return	void
  */
  public function create_page($page_name,$page_url,$page_title,$page_content,$page_order,$user_id) {
    // current time
    $created_on     = date("Y-m-d H:i:s");
    $last_modified  = $created_on;

    // remove html
    $name     = htmlentities($page_name);
    $url      = htmlentities($page_url);
    $title    = htmlentities($page_title);
    $content  = htmlentities($page_content);

    // TODO: menu order management: update page at the current $page_order, if any

    // execute query
    $this->db->query("INSERT INTO pw_pages (name, url, title, content, created_on, created_by, last_modified, modified_by, menu_order) VALUES('".$name."', '".$url."', '".$title."', '".$content."', '".$created_on."', '".$user_id."', '".$last_modified."', '".$user_id."', '".$page_order."')");
  }

  /**
  * Public function
  *
  * Edits a page in the databse
  *
  * @return	void
  */
  public function edit_page($page_id,$page_name,$page_url,$page_title,$page_content,$page_order,$user_id) {
    // current time
    $last_modified  = date("Y-m-d H:i:s");

    // remove html
    $name     = htmlentities($page_name);
    $url      = htmlentities($page_url);
    $title    = htmlentities($page_title);
    $content  = htmlentities($page_content);

    // TODO: menu order management: update page at the current $page_order, if any

    // execute query
    $this->db->query("UPDATE pw_pages SET name='".$name."', url='".$url."', title='".$title."', content='".$content."', last_modified='".$last_modified."', modified_by='".$user_id."', menu_order='".$page_order."' WHERE id='".$page_id."'");
  }
}
