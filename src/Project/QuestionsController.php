<?php

namespace Malm18\Project;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
// use VendorName\User\HTMLForm\UserLoginForm;
// use VendorName\User\HTMLForm\CreateUserForm;

use Malm18\User\User;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class QuestionsController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;




    // /**
    //  * Description.
    //  *
    //  * @param datatype $variable Description
    //  *
    //  * @throws Exception
    //  *
    //  * @return object as a response object
    //  */
    // public function indexActionGet() : object
    // {
    //     $page = $this->di->get("page");
    //
    //     $page->add("anax/v2/article/default", [
    //         "content" => "An index page",
    //     ]);
    //
    //     return $page->render([
    //         "title" => "A index page",
    //     ]);
    // }




    /**
     * Show all items.
     *
     * @return object as a response object
     */
    public function indexActionGet() : object
    {
        $page = $this->di->get("page");
        // $people = new People();
        $questions = new Questions();
        $questions->setDb($this->di->get("dbqb"));

        $page->add("questions/crud/view-all", [
            "items" => $questions->findAll(),
        ]);

        return $page->render([
            "title" => "A collection of questions",
        ]);
    }

// findWhere(column, värde_pa_kolumn)

    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function onequestionActionGet() : object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $id = $request->getGet("id");
        echo $id;
        $oneQuestion = new Questions();
        $oneQuestion->setDb($this->di->get("dbqb"));
        // $form->check();

        $page->add("questions/crud/onequestion", [
            "items" => $oneQuestion->find("id", $id),
        ]);

        return $page->render([
            "title" => "View a question",
        ]);
    }








    // /**
    //  * Description.
    //  *
    //  * @param datatype $variable Description
    //  *
    //  * @throws Exception
    //  *
    //  * @return object as a response object
    //  */
    // public function loginAction() : object
    // {
    //     $page = $this->di->get("page");
    //     $form = new UserLoginForm($this->di);
    //     $form->check();
    //
    //     $page->add("anax/v2/article/default", [
    //         "content" => $form->getHTML(),
    //     ]);
    //
    //     return $page->render([
    //         "title" => "A login page",
    //     ]);
    // }
    //
    //
    //
    // /**
    //  * Description.
    //  *
    //  * @param datatype $variable Description
    //  *
    //  * @throws Exception
    //  *
    //  * @return object as a response object
    //  */
    // public function createAction() : object
    // {
    //     $page = $this->di->get("page");
    //     $form = new CreateUserForm($this->di);
    //     $form->check();
    //
    //     $page->add("anax/v2/article/default", [
    //         "content" => $form->getHTML(),
    //     ]);
    //
    //     return $page->render([
    //         "title" => "A create user page",
    //     ]);
    // }
}
