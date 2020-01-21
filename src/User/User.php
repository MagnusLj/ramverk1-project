<?php

namespace Malm18\User;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class User extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "User";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    // public $id;
    // public $acronym;
    // public $password;
    // public $created;
    // public $updated;
    // public $deleted;
    // public $active;

    public $id;
    public $nick;
    public $email;
    public $gravatarUrl;
    public $password;
    public $created;
    public $updated;
    public $deleted;
    public $active;
    public $points;


    /**
 * Set the password.
 *
 * @param string $password the password to use.
 *
 * @return void
 */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


// /**
//  * Verify the acronym and the password, if successful the object contains
//  * all details from the database row.
//  *
//  * @param string $acronym  acronym to check.
//  * @param string $password the password to use.
//  *
//  * @return boolean true if acronym and password matches, else false.
//  */
//     public function verifyPassword($acronym, $password)
//     {
//         $this->find("acronym", $acronym);
//         return password_verify($password, $this->password);
//     }

/**
 * Verify the acronym and the password, if successful the object contains
 * all details from the database row.
 *
 * @param string $nick  acronym to check.
 * @param string $password the password to use.
 *
 * @return boolean true if acronym and password matches, else false.
 */
    public function verifyPassword($nick, $password)
    {
        $this->find("nick", $nick);
        return password_verify($password, $this->password);
    }




    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mp | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    public function getGravatar($email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }










}
