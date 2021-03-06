<?php
namespace App\Model;

use Nette\Database\Context;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Security\Identity;
use Nette\Security\Passwords;

class MyAuthenticator implements IAuthenticator
{

    /** @var  Context */
    public $database;

    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    /**
     * @param array $credentials
     * @return Identity
     * @throws AuthenticationException
     */
    function authenticate(array $credentials) {

        list($username, $password) = $credentials;

        $row = $this->database->table('users')->where('username', $username)->fetch();

        if(!$row){
            throw new AuthenticationException('User not found!');
        }

        if($password !== $row->password){

            throw new AuthenticationException('Invalid password');
        }

        return new Identity($row->id, '', ['username' => $row->username]);
    }

}