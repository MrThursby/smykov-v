<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'owner' => [
            'users' => 'c,r,u',
            'profile' => 'r,u',
            'school_courses' => 'c,r,u,d',
            'school_forks' => 'c,r,u,d',
            'school_sections' => 'c,r,u,d',
            'school_lessons' => 'c,r,u,d',
            'school_homework' => 'c,r,u,d',
            'school_purchases' => 'c,r,u,d',
            'school_review' => 'c,r,u,d',
            'blog_categories' => 'c,r,u,d',
            'blog_posts' => 'c,r,u,d',
            'navigation_menu' => 'c,r,u,d',
            'navigation_items' => 'c,r,u,d',
            'comments' => 'c,r,u,d',
            'marks' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u',
            'profile' => 'r,u',
            'school_courses' => 'c,r,u,d',
            'school_forks' => 'c,r,u,d',
            'school_sections' => 'c,r,u,d',
            'school_lessons' => 'c,r,u,d',
            'school_homework' => 'c,r,u,d',
            'school_purchases' => 'c,r,u,d',
            'school_review' => 'c,r,u,d',
            'blog_categories' => 'c,r,u,d',
            'blog_posts' => 'c,r,u,d',
            'navigation_menu' => 'c,r,u,d',
            'navigation_items' => 'c,r,u,d',
            'comments' => 'c,r,u,d',
            'marks' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
        ],
        'editor' => [
            'profile' => 'r,u',
            'school_courses' => 'c,r,u,d',
            'school_forks' => 'c,r,u,d',
            'school_sections' => 'c,r,u,d',
            'school_lessons' => 'c,r,u,d',
            'school_homework' => 'c,r',
            'school_purchases' => 'c',
            'school_review' => 'c',
            'blog_categories' => 'c,r,u,d',
            'blog_posts' => 'c,r,u,d',
            'navigation_menu' => 'c,r,u,d',
            'navigation_items' => 'c,r,u,d',
            'comments' => 'c,r',
            'marks' => 'c,r',
            'pages' => 'c,r,u,d',
        ],
        'moderator' => [
            'users' => 'r,u',
            'profile' => 'r,u',
            'school_courses' => 'r',
            'school_forks' => 'r',
            'school_sections' => 'r',
            'school_homework' => 'c,r,d',
            'school_purchases' => 'c,r',
            'school_review' => 'c,r,d',
            'blog_categories' => 'r',
            'blog_posts' => 'r',
            'navigation_menu' => 'r',
            'navigation_items' => 'r',
            'comments' => 'c,r,u,d',
            'marks' => 'c,r,u,d',
            'pages' => 'r',
        ],
        'user' => [
            'profile' => 'r,u',
            'school_courses' => 'r',
            'school_homework' => 'c',
            'school_purchases' => 'c',
            'school_review' => 'c',
            'blog_categories' => 'r',
            'blog_posts' => 'r',
            'comments' => 'c',
            'marks' => 'c',
            'pages' => 'r',
        ],
        'banned' => [
            'profile' => 'r',
            'school_courses' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
