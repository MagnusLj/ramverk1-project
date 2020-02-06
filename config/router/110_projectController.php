<?php
/**
 * Routes for controller.
 */
return [
    "routes" => [
        [
            "info" => "Hem",
            "mount" => "home",
            "handler" => "\Malm18\Project\HomeController",
        ],
        [
            "info" => "Om",
            "mount" => "about",
            "handler" => "\Malm18\Project\AboutController",
        ],
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
        [
            "info" => "Tags.",
            "mount" => "tags",
            "handler" => "\Malm18\Project\TagsController",
        ],
    ]
];
