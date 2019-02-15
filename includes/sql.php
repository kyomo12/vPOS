<?php
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE ID='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;

     }
}


/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE ID=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(ID) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }

}


/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }


 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT * FROM USER WHERE USERNAME ='%s' AND `PASSWORD`='%s' LIMIT 1", $username, sha1($password));
    $result =find_by_sql($sql);
    if(count($result) == '1'){
        return $result[0]['ID'];
    }
   return false;
  }


  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/

   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT ID,USERNAME,PASSWORD,USER_LEVEL FROM USER WHERE USERNAME ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['PASSWORD'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('USER',$user_id);
        endif;
      }
    return $current_user;
  }


  function is_superuser(){
    $user = current_user();
    $super_user = $user['SUPER_USER'];
    if($super_user == '1' || $super_user == '2' || $super_user == '3'){
      return true;
    }else{
      return false;
    }

  }


  function is_admin(){
    $user = current_user();
    $super_user = $user['SUPER_USER'];
    if($super_user == '1'){
      return true;
    }else{
      return false;
    }

  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.ID,u.NAME,u.USERNAME,u.USER_LEVEL,u.IS_ACTIVE,u.LAST_LOGIN,";
      $sql .="g.GROUP_NAME ";
      $sql .="FROM USER u ";
      $sql .="LEFT JOIN USER_GROUP g ";
      $sql .="ON g.GROUP_LEVEL=u.USER_LEVEL ORDER BY u.NAME ASC";
      $result = find_by_sql($sql);
      return $result;
  }


  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
  {
    global $db;
    $date = make_date();
    $sql = "UPDATE USER SET LAST_LOGIN='{$date}' WHERE ID ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
  }

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT GROUP_NAME FROM USER_GROUPS WHERE GROUP_NAME = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT GROUP_LEVEL FROM USER_GROUPS WHERE GROUP_LEVEL = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['USER_LEVEL']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Please login...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['GROUP_STATUS'] === '0'):
           $session->msg('d','This level user has been banned!');
           redirect('dashboard.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['USER_LEVEL'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "Sorry! you dont have permission to view the page.");
            redirect('dashboard.php', false);
        endif;

     }








