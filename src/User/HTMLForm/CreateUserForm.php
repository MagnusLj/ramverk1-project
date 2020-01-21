<?php

namespace Malm18\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
//?
use Malm18\User\User;

/**
 * Example of FormModel implementation.
 */
class CreateUserForm extends FormModel
{



    /**
     * Constructor injects with DI container.
     *
     * @param Psr\Container\ContainerInterface $di a service container
     */




    public function __construct(ContainerInterface $di)
    {
        parent::__construct($di);
        $this->form->create(
            [
                "id" => __CLASS__,
                "legend" => "Skapa konto",
            ],
            [
                "nick" => [
                    "type"        => "text",
                ],
                "email" => [
                    "type"        => "email",
                ],
                "lösenord" => [
                    "type"        => "password",
                ],

                "lösenord-igen" => [
                    "type"        => "password",
                    "validation" => [
                        "match" => "lösenord"
                    ],
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Skapa konto",
                    "callback" => [$this, "callbackSubmit"]
                ],
            ]
        );
    }






    /**
     * Callback for submit-button which should return true if it could
     * carry out its work and false if something failed.
     *
     * @return boolean true if okey, false if something went wrong.
     */
    public function callbackSubmit()
    {
        // Get values from the submitted form
        $nick       = $this->form->value("nick");
        $email       = $this->form->value("email");
        $password      = $this->form->value("lösenord");
        $passwordAgain = $this->form->value("lösenord-igen");

        // Check password matches
        if ($password !== $passwordAgain) {
            $this->form->rememberValues();
            $this->form->addOutput("Password did not match.");
            return false;
        }

        // Save to database
        // $db = $this->di->get("dbqb");
        // $password = password_hash($password, PASSWORD_DEFAULT);
        // $db->connect()
        //    ->insert("User", ["acronym", "password"])
        //    ->execute([$acronym])
        //    ->fetch();
        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $user->nick = $nick;
        $user->email = $email;

        $user->gravatarUrl = $user->getGravatar($email);





        $user->setPassword($password);
        $user->save();

        $this->form->addOutput("Kontot skapades.");
        return true;
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
    public function getGravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
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




    // /**
    //  * Callback for submit-button which should return true if it could
    //  * carry out its work and false if something failed.
    //  *
    //  * @return boolean true if okey, false if something went wrong.
    //  */
    //  public function callbackSubmit()
    // {
    //     // Get values from the submitted form
    //     $acronym       = $this->form->value("acronym");
    //     $password      = $this->form->value("password");
    //     $passwordAgain = $this->form->value("password-again");
    //
    //     // Check password matches
    //     if ($password !== $passwordAgain ) {
    //         $this->form->rememberValues();
    //         $this->form->addOutput("Password did not match.");
    //         return false;
    //     }
    //
    //     // Save to database
    //     $db = $this->di->get("dbqb");
    //     $password = password_hash($password, PASSWORD_DEFAULT);
    //     $db->connect()
    //        ->insert("User", ["acronym", "password"])
    //        ->execute([$acronym, $password]);
    //
    //     $this->form->addOutput("User was created.");
    //     return true;
    // }
}
