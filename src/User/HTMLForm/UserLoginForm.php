<?php

namespace Malm18\User\HTMLForm;

use Anax\HTMLForm\FormModel;
use Psr\Container\ContainerInterface;
//?
use Malm18\User\User;

/**
 * Example of FormModel implementation.
 */
class UserLoginForm extends FormModel
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
                "legend" => "Logga in här"
            ],
            [
                "nick" => [
                    "type"        => "text",
                    //"description" => "Here you can place a description.",
                    //"placeholder" => "Here is a placeholder",
                ],

                "lösenord" => [
                    "type"        => "password",
                    //"description" => "Here you can place a description.",
                    //"placeholder" => "Here is a placeholder",
                ],

                "submit" => [
                    "type" => "submit",
                    "value" => "Logga in",
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

        // Try to login
        // $db = $this->di->get("dbqb");
        // $db->connect();
        // $user = $db->select("password")
        //            ->from("User")
        //            ->where("acronym = ?")
        //            ->execute([$acronym])
        //            ->fetch();
        //
        // // $user is false if user is not found
        // if (!$user || !password_verify($password, $user->password)) {
        //    $this->form->rememberValues();
        //    $this->form->addOutput("User or password did not match.");
        //    return false;
        // }

        $user = new User();
        $user->setDb($this->di->get("dbqb"));
        $res = $user->verifyPassword($nick, $password);
        $response = $this->di->get("response");
        $session = $this->di->get("session");

        if (!$res) {
            $this->form->rememberValues();
            $this->form->addOutput("Användarnamn eller lösenord var fel.");
            return false;
        }

        // $this->form->addOutput("User " . $user->nick . " logged in.");

        $session->set("nick", $user->nick);

        $session->set("id", $user->id);

        // $_SESSION["nick"] = $user->nick;
        //
        // $_SESSION["id"] = $user->id;
        // $_SESSION["flashmessage"] = "Välkommen, o store $user->nick!";

        return $response->redirect("questions");

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
    //     $acronym       = $this->form->value("user");
    //     $password      = $this->form->value("password");
    //
    //     // Try to login
    //     $db = $this->di->get("dbqb");
    //     $db->connect();
    //     $user = $db->select("password")
    //             ->from("User")
    //             ->where("acronym = ?")
    //             ->execute([$acronym])
    //             ->fetch();
    //
    //     // $user is null if user is not found
    //     if (!$user || !password_verify($password, $user->password)) {
    //     $this->form->rememberValues();
    //     $this->form->addOutput("User or password did not match.");
    //     return false;
    // }
    //
    // $this->form->addOutput("User logged in.");
    // return true;
    // }
}
