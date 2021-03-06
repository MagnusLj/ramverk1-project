<?php

namespace Malm18\Project;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Michelf\Markdown;
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
        // var_dump($_SESSION);



        $page = $this->di->get("page");
        // $people = new People();
        $questions = new Questions();
        $questions->setDb($this->di->get("dbqb"));

        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/header2A");
        } else {
            $page->add("questions/crud/headerA");
        }

        $page->add("questions/crud/view-all", [
            "items" => $questions->findAll(),
        ]);

        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/newquestion");
        }

        return $page->render([
            "title" => "A collection of questions",
        ]);
    }


    public function indexActionPost() : object
    {
        $session = $this->di->get("session");
        // $vader = $this->di->get("vader");
        // $ipHandler = new IpHandler();
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $questiontitle = $request->getPost("questiontitle");
        $questiontext = $request->getPost("questiontext");
        $tags = $request->getPost("tags");
        $questiontext2 = Markdown::defaultTransform($questiontext);
        $nick = $session->get("nick");
        $id = $session->get("id");

        $this->di->get("db")->connect();
        $sql = "SELECT MAX(id) AS maxid
                FROM Questions
        ;";
        $lastid = $this->di->get("db")->executeFetchAll($sql);
        $newid = intval($lastid[0]->maxid) + 1;

            // var_dump($lastid[0]->maxid);
            // var_dump($newid);
            // var_dump($questiontext2);
            // var_dump($nick);
            // var_dump($id);
            // var_dump($tags);
            // var_dump($request);



            // $questions = new Questions();
            // $questions->setDb($this->di->get("dbqb"));
            // $questions->nick = $nick;
            // $questions->userid = $id;
            // $questions->title = $questiontitle;
            // $questions->text = $questiontext2;
            //
            // $questions->save();



            $this->di->get("db")->connect();

            $sql = "INSERT INTO Questions ('userid', 'nick', 'title', 'text') VALUES ($id, '$nick', '$questiontitle', '$questiontext2');";

            $this->di->get("db")->execute($sql);



            // $usersz = new User();
            // $usersz->setDb($this->di->get("dbqb"));
            // $usersz->find("id", $id);
            // $points = $usersz->points;
            // $questions = $usersz->questions;
            //
            // echo "points: " . $points;
            // echo "questions: " . $questions;
            // var_dump($usersz);

            // $usersz->update("id=?", $id);
            // $usersz->points += 1;
            // $usersz->questions += 1;
            // $usersz->save();


            // "items" => $oneQuestion->find("id", $id),



            // $this->di->get("db")->connect();
            //
            // $sql = "SELECT points FROM Users WHERE userid = $id;";
            //
            // $this->di->get("db")->execute($sql);
            // //
            // $this->di->get("db")->connect();
            //
            // $sql = "UPDATE Users SET ;";
            //
            // $this->di->get("db")->execute($sql);
            //
            //
            //
            //
            // UPDATE table_name
            // SET column1 = value1, column2 = value2, ...
            // WHERE condition;
            //
            //
            //
            $usersz = new User();
            $usersz->setDb($this->di->get("dbqb"));
            $usersz->find("id", $id);
            // $usersz->update("id=?", $id);
            $usersz->points += 1;
            $usersz->questions += 1;
            $usersz->save();




        foreach ($tags as $tag) {
            // echo "tagid: " . $tag;
            // echo " questionid: " . $newid;
            // echo "<br>";
            $tagsquestions = new Tagsquestions();
            $tagsquestions->setDb($this->di->get("dbqb"));
            $tagsquestions->tagid = $tag;
            $tagsquestions->questionid = $newid;
            $tagsquestions->save();



            $tagsz = new Tags();
            $tagsz->setDb($this->di->get("dbqb"));
            $tagsz->find("id", $tag);
            $tagsz->points += 1;
            $tagsz->save();
        }

        return $response->redirect("questions");

            // return true;
    }








// findWhere(column, värde_pa_kolumn)

    // /**
    //  * Handler with form to update an item.
    //  *
    //  * @param int $id the id to update.
    //  *
    //  * @return object as a response object
    //  */
    // public function onequestionActionGet() : object
    // {
    //     $page = $this->di->get("page");
    //     $request = $this->di->get("request");
    //     $id = $request->getGet("id");
    //     echo $id;
    //     $oneQuestion = new Questions();
    //     $oneQuestion->setDb($this->di->get("dbqb"));
    //
    //     $answers = new Answers();
    //     $answers->setDb($this->di->get("dbqb"));
    //     // $form->check();
    //
    //     $page->add("questions/crud/onequestion", [
    //         "items" => $oneQuestion->find("id", $id),
    //         "answers" => $answers->find("questionid", $id),
    //     ]);
    //
    //     return $page->render([
    //         "title" => "View a question",
    //     ]);
    // }




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

        $answers = new Answers();
        $answers->setDb($this->di->get("dbqb"));

        $questioncomments = new Questioncomments();
        $questioncomments->setDb($this->di->get("dbqb"));

        $answercomments = new Answercomments();
        $answercomments->setDb($this->di->get("dbqb"));

    //    $tags = new Tags();
    //    $tags->setDb($this->di->get("dbqb"));

    //    $tags = new Tagsquestions();
    //    $tags->setDb($this->di->get("dbqb"));

        $this->di->get("db")->connect();
        $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id

        ;";
        $tags = $this->di->get("db")->executeFetchAll($sql);

        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/header2");
        } else {
            $page->add("questions/crud/header");
        }

        $page->add("questions/crud/onequestion", [
            "items" => $oneQuestion->find("id", $id),
            "answers" => $answers->findAllWhere("questionid = ?", $id),
            "questioncomments" => $questioncomments->findAllWhere("questionid = ?", $id),

            // "tags" => $tags->findAllWhere("questionid = ?", $id),

            "tags" => $tags,
        ]);


        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/newanswercomment");
        }


        return $page->render([
            "title" => "View a question",
        ]);
    }



    public function onequestionActionPost() : object
    {
        $session = $this->di->get("session");
        // $vader = $this->di->get("vader");
        // $ipHandler = new IpHandler();
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $commenttext = $request->getPost("commenttext") ?? null;
        $answertext = $request->getPost("answertext") ?? null;

        // if (strlen($commenttext < 2)) {
        //     $commenttext = null;
        // }
        //
        // if (strlen($answertext < 2)) {
        //     $answertext = null;
        // }

        // $tags = $request->getPost("tags");
        $commenttext2 = Markdown::defaultTransform($commenttext);
        $answertext2 = Markdown::defaultTransform($answertext);

        if (strlen($commenttext < 2)) {
            $commenttext = null;
        }

        if (strlen($answertext < 2)) {
            $answertext = null;
        }

        // if (strlen($answertext2 < 2)) {
        //     $answertext2 = null;
        // }

        // echo strlen($commenttext2);
        // echo strlen($answertext2);

        $nick = $session->get("nick");
        $userid = $session->get("id");
        $id = $request->getGet("id");


        $this->di->get("db")->connect();
        // $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id
        //
        // ;";

        $sql = "SELECT title FROM Questions WHERE id = $id;";

        //     $title = $_POST["contentTitle"];
        // $app->db->connect();
        // $sql = "INSERT INTO products (title) VALUES (?);";
        // $app->db->execute($sql, [$title]);
        // $questiontitle = $this->di->get("db")->execute($sql);

        $questiontitle = $this->di->get("db")->executeFetchAll($sql);

        echo "questiontitle";
        var_dump($questiontitle[0]->title);

        $questiontitle2 = $questiontitle[0]->title;

        // $this->di->get("db")->connect();
        // $sql = "SELECT MAX(id) AS maxid
        //         FROM Questions
        // ;";
        // $lastid = $this->di->get("db")->executeFetchAll($sql);
        // $newid = intval($lastid[0]->maxid) + 1;

            // var_dump($commenttext2);
            // var_dump($answertext2);
            // var_dump($id);
            // var_dump($nick);

            // echo "commenttext2: " . $commenttext2;
            // echo "<br>answertext2: " . $answertext2;
            // echo "<br>questionid: " . $id;
            // echo "<br>userid: " . $userid;
            // echo "<br>nick: " . $nick;
            //
            // var_dump($commenttext2);
            // var_dump($answertext2);
            // var_dump($id);
            // var_dump($userid);
            // var_dump($nick);

            // var_dump($id);
            // var_dump($tags);
            // var_dump($request);

        if (strlen($commenttext2) > 1) {
            // $comments = new Questioncomments();
            // $comments->setDb($this->di->get("dbqb"));
            // $comments->questionid = $id;
            // $comments->userid = $userid;
            // $comments->text = $commenttext2;
            // $comments->nick = $nick;
            //
            // $comments->save();



            $this->di->get("db")->connect();
            // $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id
            //
            // ;";

            $sql = "INSERT INTO Questioncomments ('questionid', 'userid', 'text', 'nick') VALUES ($id, $userid, '$commenttext2', '$nick');";

            //     $title = $_POST["contentTitle"];
            // $app->db->connect();
            // $sql = "INSERT INTO products (title) VALUES (?);";
            // $app->db->execute($sql, [$title]);
            $this->di->get("db")->execute($sql);

            // $questions = $this->di->get("db")->executeFetchAll($sql);



            // return $response->redirect("questions/onequestion?id={$id}");
        }



        if (strlen($answertext2) > 1) {
            // $comments = new Questioncomments();
            // $comments->setDb($this->di->get("dbqb"));
            // $comments->questionid = $id;
            // $comments->userid = $userid;
            // $comments->text = $commenttext2;
            // $comments->nick = $nick;
            //
            // $comments->save();



            $this->di->get("db")->connect();
            // $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id
            //
            // ;";

            $sql = "INSERT INTO Answers ('questionid', 'questiontitle', 'userid', 'text', 'nick') VALUES ($id, '$questiontitle2', $userid, '$answertext2', '$nick');";

            //     $title = $_POST["contentTitle"];
            // $app->db->connect();
            // $sql = "INSERT INTO products (title) VALUES (?);";
            // $app->db->execute($sql, [$title]);
            $this->di->get("db")->execute($sql);



            $usersz = new User();
            $usersz->setDb($this->di->get("dbqb"));
            $usersz->find("id", $userid);
            // $usersz->update("id=?", $id);
            $usersz->points += 1;
            $usersz->answers += 1;
            $usersz->save();

            // $questions = $this->di->get("db")->executeFetchAll($sql);



            // return $response->redirect("questions/onequestion?id={$id}");
        }

        return $response->redirect("questions/onequestion?id={$id}");

            // foreach ($tags as $tag) {
            //     echo "tagid: " . $tag;
            //     echo " questionid: " . $newid;
            //     echo "<br>";
            //     $tagsquestions = new Tagsquestions();
            //     $tagsquestions->setDb($this->di->get("dbqb"));
            //     $tagsquestions->tagid = $tag;
            //     $tagsquestions->questionid = $newid;
            //     $tagsquestions->save();
            // }

            // return $response->redirect("questions");

            // return true;
    }







    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function oneanswerActionGet() : object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $id = $request->getGet("id");
        $answerid = $request->getGet("answerid");
        // echo $id;
        $oneQuestion = new Questions();
        $oneQuestion->setDb($this->di->get("dbqb"));

        $answers = new Answers();
        $answers->setDb($this->di->get("dbqb"));

        $answercomments = new Answercomments();
        $answercomments->setDb($this->di->get("dbqb"));
        // $form->check();


        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/header2");
        } else {
            $page->add("questions/crud/header");
        }


        $page->add("questions/crud/oneanswer", [
            "items" => $oneQuestion->find("id", $id),
            "answers" => $answers->find("id", $answerid),
            "answercomments" => $answercomments->findAllWhere("answerid = ?", $answerid),
        ]);


        if ($_SESSION["nick"] ?? null) {
            $page->add("questions/crud/newanswercomment2");
        }



        return $page->render([
            "title" => "View a question",
        ]);
    }





    public function oneanswerActionPost() : object
    {
        $session = $this->di->get("session");
        // $vader = $this->di->get("vader");
        // $ipHandler = new IpHandler();
        $request = $this->di->get("request");
        $response = $this->di->get("response");
        $commenttext = $request->getPost("commenttext") ?? null;
        // $answertext = $request->getPost("answertext") ?? null;

        // if (strlen($commenttext < 2)) {
        //     $commenttext = null;
        // }
        //
        // if (strlen($answertext < 2)) {
        //     $answertext = null;
        // }

        // $tags = $request->getPost("tags");
        $commenttext2 = Markdown::defaultTransform($commenttext);
        // $answertext2 = Markdown::defaultTransform($answertext);

        if (strlen($commenttext < 2)) {
            $commenttext = null;
        }

        // if (strlen($answertext < 2)) {
        //     $answertext = null;
        // }

        // if (strlen($answertext2 < 2)) {
        //     $answertext2 = null;
        // }

        // echo strlen($commenttext2);
        // echo strlen($answertext2);

        $nick = $session->get("nick");
        $userid = $session->get("id");
        $questionid = $request->getGet("id");
        $answerid = $request->getGet("answerid");


        // $this->di->get("db")->connect();
        // $sql = "SELECT MAX(id) AS maxid
        //         FROM Questions
        // ;";
        // $lastid = $this->di->get("db")->executeFetchAll($sql);
        // $newid = intval($lastid[0]->maxid) + 1;

            // var_dump($commenttext2);
            // var_dump($answertext2);
            // var_dump($id);
            // var_dump($nick);

            // echo "commenttext2: " . $commenttext2;
            // echo "<br>questionid: " . $questionid;
            // echo "<br>answerid: " . $answerid;
            // echo "<br>userid: " . $userid;
            // echo "<br>nick: " . $nick;
            //
            // var_dump($commenttext2);
            // var_dump($questionid);
            // var_dump($userid);
            // var_dump($nick);

            // var_dump($id);
            // var_dump($tags);
            // var_dump($request);

        if (strlen($commenttext2) > 1) {
            $this->di->get("db")->connect();

            $sql = "INSERT INTO Answercomments ('answerid', 'userid', 'text', 'nick') VALUES ($answerid, $userid, '$commenttext2', '$nick');";

            $this->di->get("db")->execute($sql);
        }


        return $response->redirect("questions/oneanswer?oneanswer?id={$questionid}&answerid={$answerid}");
    }










    /**
     * Handler with form to update an item.
     *
     * @param int $id the id to update.
     *
     * @return object as a response object
     */
    public function oneusersActionGet() : object
    {
        $page = $this->di->get("page");
        $request = $this->di->get("request");
        $id = $request->getGet("id");
        // echo $id;

        $questions = new Questions();
        $questions->setDb($this->di->get("dbqb"));

        $answers = new Answers();
        $answers->setDb($this->di->get("dbqb"));

        $questioncomments = new Questioncomments();
        $questioncomments->setDb($this->di->get("dbqb"));

        $answercomments = new Answercomments();
        $answercomments->setDb($this->di->get("dbqb"));

        $users = new User();
        $users->setDb($this->di->get("dbqb"));

    //    $tags = new Tags();
    //    $tags->setDb($this->di->get("dbqb"));

    //    $tags = new Tagsquestions();
    //    $tags->setDb($this->di->get("dbqb"));

        $this->di->get("db")->connect();
        // $sql = "SELECT * FROM tagsquestions JOIN tags ON tagsquestions.tagid = tags.id WHERE questionid = $id
        // ;";
        // $tags = $this->di->get("db")->executeFetchAll($sql);


        // SELECT *
        // FROM kurs AS k
        //     JOIN kurstillfalle AS kt
        //         ON k.kod = kt.kurskod;


        // var_dump($tags);

        $page->add("questions/crud/oneusers", [
            "items" => $questions->find("id", $id),
            "questions" => $questions->findAllWhere("userid = ?", $id),
            "answers" => $answers->findAllWhere("userid = ?", $id),
            "questioncomments" => $questioncomments->findAllWhere("questionid = ?", $id),
            "users" => $users->find("id", $id),

            // "tags" => $tags->findAllWhere("questionid = ?", $id),



            // "tags" => $tags,




        ]);

        // var_dump($answers->findAllWhere("userid = ?", $id));

        return $page->render([
            "title" => "View a question",
        ]);
    }





// findAllWhere("id = ?", $id)



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
