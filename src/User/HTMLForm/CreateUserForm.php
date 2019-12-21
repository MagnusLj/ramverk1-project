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
        $user->setPassword($password);
        $user->save();

        $this->form->addOutput("Kontot skapades.");
        return true;
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
