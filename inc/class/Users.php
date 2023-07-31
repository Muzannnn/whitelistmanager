<?php
 
class Users {

    public static function GetUser($user_id = null)
    {
        if ($user_id == null)
        {
            $user_id = $_SESSION['id'];    
        }
        
        return $GLOBALS['DB']->GetContent('users', ['id' => $user_id])[0];
    }

    public static function GetUserList()
    {
        
        return $GLOBALS['DB']->GetContent('whitelist_users');
    }


    public function GetUsername($id = null)
    {
        if ($id == null)
        {
            $id = $_SESSION['id'];
        }
        
        $username = Account::GetUser($id)['username'];
        return $username;
    }

    public function isUsernameExist($username)
    {
        if ($GLOBALS['DB']->Count("users", ["username" => $username]) != 0)
        {
            return true;
        }
        return false;
    }

    public function CreateUser($username, $password, $confirm_password, $role = null)
    {
        if ($role == null)
        {
            $role = 3;
        }

		if ($password != $confirm_password)
		{
			return "Les mot de passe ne conresponde pas.";
            header("Location: reg");
		}
		else if (Account::isUsernameExist($username))
		{
			return "Le pseudo demandé et déjà en cours d'utilisation.";
            header("Location: reg");
		}


		$GLOBALS['DB']->Insert("users", ["username" => $username, "password" => $passworddb, "role" => 3]);


        return "success";
    }

    public function Auth($username, $password)
    {
        if (Account::isUsernameExist($username))
        {
            $user = $GLOBALS['DB']->GetContent("users", ["username" => $username])[0];
            if(Account::isPasswordTrue($user, $password))
            {
                $_SESSION['id'] = $user["id"];
                return true;
            }
        }
        return false;
    }

    public function UnWhiteListed($id){
        $GLOBALS['DB']->Update("whitelist_users", ["id" => $id], ["whitelisted" => "false"]);
    }

    public function WhiteListed($id){
        $GLOBALS['DB']->Update("whitelist_users", ["id" => $id], ["whitelisted" => "true"]);
    }


    public function Disconnect()
    {
        session_unset();
        session_destroy();
    }
}