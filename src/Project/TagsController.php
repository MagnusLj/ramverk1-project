<?php

namespace Malm18\Project;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use VendorName\User\HTMLForm\UserLoginForm;
use VendorName\User\HTMLForm\CreateUserForm;

use Malm18\User\User;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 */
class TagsController implements ContainerInjectableInterface
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
        $tags = new Tags();
        $tags->setDb($this->di->get("dbqb"));

        $page->add("questions/crud/tags", [
            "tags" => $tags->findAll(),
        ]);

        return $page->render([
            "title" => "Alla tags",
        ]);
    }



    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function viewsomeActionGet() : object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $tagid = $request->getGet("tagid");
        // echo $tag;

        // $questions = new Questions();
        // $questions->setDb($this->di->get("dbqb"));
        //
        // $tags = new Tags();
        // $tags->setDb($this->di->get("dbqb"));


        $this->di->get("db")->connect();
        // $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id
        //
        // ;";

        $sql = "SELECT * FROM questions JOIN tagsquestions ON tagsquestions.questionid = questions.id JOIN tags ON tags.id = tagsquestions.tagid WHERE tags.id = '$tagid';";




        $questions = $this->di->get("db")->executeFetchAll($sql);


        $tags = new Tags();
        $tags->setDb($this->di->get("dbqb"));





        // var_dump($tags);

        $page->add("questions/crud/viewsome", [
            // "items" => $oneQuestion->find("id", $id),
            // "questions" => $questions->findAllWhere("questionid = ?", $id),
            "questions" => $questions,
            "tagid" => $tagid,
            "tags" => $tags->find("id", $tagid),
            // "questioncomments" => $questioncomments->findAllWhere("questionid = ?", $id),
            // "tags" => $tags->findAllWhere("questionid = ?", $id),
        ]);

        return $page->render([
            "title" => "View a question",
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
            "title" => "A login page",
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
    public function createAction() : object
    {
        $page = $this->di->get("page");
        $form = new CreateUserForm($this->di);
        $form->check();

        $page->add("anax/v2/article/default", [
            "content" => $form->getHTML(),
        ]);

        return $page->render([
            "title" => "A create user page",
        ]);
    }
}
