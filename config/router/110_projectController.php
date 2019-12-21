<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Userlist.",
            "mount" => "peoplelist",
            "handler" => "\Malm18\Project\PeopleListController",
        ],
        [
            "info" => "Questions.",
            "mount" => "questions",
            "handler" => "\Malm18\Project\QuestionsController",
        ],
    ]
];
