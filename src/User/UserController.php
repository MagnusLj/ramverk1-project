<?php

namespace Malm18\User;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Malm18\User\HTMLForm\UserLoginForm;
use Malm18\User\HTMLForm\CreateUserForm;
use Malm18\User\HTMLForm\EditForm;
use Malm18\User\HTMLForm\UpdateForm;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class UserController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var $data description
     */
    //private $data;



    // /**
    //  * The initialize method is optional and will always be called before the
    //  * target method/action. This is a convienient method where you could
    //  * setup internal properties that are commonly used by several methods.
    //  *
    //  * @return void
    //  */
    // public function initialize() : void
    // {
    //     ;
    // }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");

        $page->add("anax/v2/article/default", [
            "content" => "An index page",
        ]);

        return $page->render([
            "title" => "A index page",
        ]);
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function loginAction() : object
    {
        $page = $this->di->get("page");

        $form = new UserLoginForm($this->di);
        $form->check();

        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Logga in",
        ]);
    }


    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function logoutAction() : object
    {
        $page = $this->di->get("page");
        $response = $this->di->get("response");
        $session = $this->di->get("session");

        // $nick = $_SESSION["nick"] ?? null;

        $nick = $session->get("nick") ?? null;

        $_SESSION["nick"] = null;

        $session->set("nick", null);

        $session->set("id", null);

        // $_SESSION["flashmessage"] = "Användare $nick har loggat ut.";

        return $response->redirect("questions");

        if (!$res) {
            $this->form->rememberValues();
            $this->form->addOutput("User or password did not match.");
            return false;
        }

        // $this->form->addOutput("User " . $user->nick . " logged in.");
    }



    /**
     * Description.
     *
     * @param datatype $variable Description
     *
     * @throws Exception
     *
     * @return object as a response object
     */
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateUserForm($this->di);
        $form->check();

        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Skapa ny användare",
        ]);
    }


    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function updateAction() : object
    {
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $id = $session->get("id");
        $form = new UpdateForm($this->di, $id);
        $form->check();

        $page->add("people/crud/update", [
            "form" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "Uppdatera uppgifter",
        ]);
    }
}
