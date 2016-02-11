<?php
class User
{

    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();

        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');

        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                } else {
                    // process layout
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function update($fields = array(), $id = null)
    {

        if (!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if (!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields = array())
    {
        if (!$this->_db->insert('users', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function createMembers($fields = array())
    {
        if (!$this->_db->insert('info', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function insertImage($fields = array())
    {
        if (!$this->_db->insert('timages', $fields)) {
            throw new Exception('There was a problem creating an account.');
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }
    public function findEmail($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'email';
            $data = $this->_db->get('users', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false)
    {


        if (!$username && !$password && $this->exists()) {
            //log user in
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }
                    return true;
                }
            }
        }

        return false;
    }

    public function forgotPass($username = null, $email = null)
    {


        if (!$username && !$email && $this->exists()) {
            //log user in
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if ($this->data()->email === $email) {
                    Session::put($this->_sessionName, $this->data()->id);
                }
                return true;
            }
        }


        return false;
    }
    public function forgotUser( $email = null)
    {


        if (!$email && $this->exists()) {
            //log user in
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->findEmail($email);

            if ($user) {
                if ($this->data()->email === $email) {
                    Session::put($this->_sessionName, $this->data()->id);
                }
                return true;
            }
        }


        return false;
    }


    public function hasPermission($key)
    {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if ($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            if ($permissions[$key] == true) {
                return true;
            }
        }
        return false;
    }

    public function active($key)
    {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if ($group->count()) {
            $active = json_decode($group->first()->active, true);

            if ($active[$key] == true) {
                return true;
            }
        }
        return false;
    }

    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data()
    {
        return $this->_data;
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }

    public function user_active($id)
    {
        $retVal = false;

        $user = $this->_db->get('users', array('id', '=', $id));

        if ($user->first()->active == 1) {
            $retVal = true;
        }
        return $retVal;
    }

    public function member_active($id)
    {
        $retVal = false;

        $user = $this->_db->get('info', array('id', '=', $id));

        if ($user->first()->active == 1) {
            $retVal = true;
        }
        return $retVal;
    }

    public function activate($email, $email_code)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('email', '=', $email));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($email == $row->email) && ($email_code == $row->email_code) && ($row->active) == 0) {
            $user->update('users', $row->id, array(
                'active' => '1'
            ));

            $retVal = true;
        }
        return $retVal;

    }

    public function deActivate($email, $email_code)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('email', '=', $email));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($email == $row->email) && ($email_code == $row->email_code) && ($row->active) == 1) {
            $user->update('users', $row->id, array(
                'active' => '0'
            ));

            $retVal = true;
        }
        return $retVal;

    }

    public function join($id, $tourneyJoin)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('id', '=', $id));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($id == $row->id) && ($row->$tourneyJoin) == 0) {
            $user->update('users', $row->id, array(
                $tourneyJoin => '1'
            ));

            $retVal = true;
        }
        return $retVal;

    }

    public function drop($id, $tourneyJoin)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('id', '=', $id));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($id == $row->id) && ($row->$tourneyJoin) == 1) {
            $user->update('users', $row->id, array(
                $tourneyJoin => '0'
            ));

            $retVal = true;
        }
        return $retVal;

    }

    public function createTeam($id, $teamName, $tourneyName)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('id', '=', $id));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($id == $row->id)) {
            $user->update('users', $row->id, array(
                $tourneyName => $teamName
            ));

            $retVal = true;
        }
        return $retVal;

    }

    public function createId($id, $teamId, $tourneyId)
    {
        $retVal = false;
        $user = $this->_db->get('users', array('id', '=', $id));
        $row = $user->first();


        //return "parameter".$email_code . " " . "db".$data ->email_code;

        if (($id == $row->id)) {
            $user->update('users', $row->id, array(
                $tourneyId => $teamId
            ));

            $retVal = true;
        }
        return $retVal;

    }
}