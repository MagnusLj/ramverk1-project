<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "id" => "rm-menu",
    "wrapper" => null,
    "class" => "rm-default rm-mobile",

    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "home",
            "title" => "Första sidan, börja här.",
        ],
        // [
        //     "text" => "Redovisning",
        //     "url" => "redovisning",
        //     "title" => "Redovisningstexter från kursmomenten.",
        //     "submenu" => [
        //         "items" => [
        //             [
        //                 "text" => "Kmom01",
        //                 "url" => "redovisning/kmom01",
        //                 "title" => "Redovisning för kmom01.",
        //             ],
        //             [
        //                 "text" => "Kmom02",
        //                 "url" => "redovisning/kmom02",
        //                 "title" => "Redovisning för kmom02.",
        //             ],
        //             [
        //                 "text" => "Kmom03",
        //                 "url" => "redovisning/kmom03",
        //                 "title" => "Redovisning för kmom03.",
        //             ],
        //             [
        //                 "text" => "Kmom04",
        //                 "url" => "redovisning/kmom04",
        //                 "title" => "Redovisning för kmom04.",
        //             ],
        //             [
        //                 "text" => "Kmom05",
        //                 "url" => "redovisning/kmom05",
        //                 "title" => "Redovisning för kmom05.",
        //             ],
        //             [
        //                 "text" => "Kmom06",
        //                 "url" => "redovisning/kmom06",
        //                 "title" => "Redovisning för kmom06.",
        //             ],
        //         ],
        //     ],
        // ],
        [
            "text" => "Om",
            "url" => "about",
            "title" => "Om denna webbplats.",
        ],
        // [
        //     "text" => "Styleväljare",
        //     "url" => "style",
        //     "title" => "Välj stylesheet.",
        // ],
        // [
        //     "text" => "Verktyg",
        //     "url" => "verktyg",
        //     "title" => "Verktyg och möjligheter för utveckling.",
        // ],
        // [
        //     "text" => "IP-kollare",
        //     "url" => "ip-checker",
        //     "title" => "Kolla IP-adress.",
        // ],
        // [
        //     "text" => "IP-JSON",
        //     "url" => "ip-json-checker/ipJsonChecker",
        //     "title" => "Kolla IP-adress.",
        // ],
        // [
        //     "text" => "Väder",
        //     "url" => "vader",
        //     "title" => "Blir det ruskigt måntro?",
        // ],
        // [
        //     "text" => "JSON-väder",
        //     "url" => "json-vader/JsonVader",
        //     "title" => "JSON-väder",
        // ],
        // [
        //     "text" => "Böcker",
        //     "url" => "book",
        //     "title" => "Böcker",
        // ],
        [
            "text" => "Användare",
            "url" => "peoplelist",
            "title" => "Användare",
        ],
        [
            "text" => "Skapa konto",
            "url" => "user/create",
            "title" => "Skapa konto",
        ],
        [
            "text" => "Frågor",
            "url" => "questions",
            "title" => "Frågor",
        ],
        [
            "text" => "Tags",
            "url" => "tags",
            "title" => "Tags",
        ],
    ],
];
