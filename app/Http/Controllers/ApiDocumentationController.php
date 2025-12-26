<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiDocumentationController extends Controller
{
    public function index()
    {
        $endpoints = [
            // User Endpoints
            [
                'method' => 'GET',
                'url' => '/users',
                'controller' => 'UserController',
                'action' => 'index',
                'description' => 'Retrieve a list of all users',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/user/{slug}',
                'controller' => 'UserController',
                'action' => 'show',
                'description' => 'Get user details by slug',
                'parameters' => [
                    ['name' => 'slug', 'type' => 'string', 'description' => 'User slug identifier']
                ]
            ],
            [
                'method' => 'GET',
                'url' => '/user/detail/{id}',
                'controller' => 'UserController',
                'action' => 'detail',
                'description' => 'Get detailed user information by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'User ID']
                ]
            ],
            [
                'method' => 'POST',
                'url' => '/user/register',
                'controller' => 'UserController',
                'action' => 'storeData',
                'description' => 'Register a new user',
                'parameters' => [
                    ['name' => 'name', 'type' => 'string', 'description' => 'User full name'],
                    ['name' => 'email', 'type' => 'string', 'description' => 'User email address'],
                    ['name' => 'password', 'type' => 'string', 'description' => 'User password']
                ]
            ],
            [
                'method' => 'POST',
                'url' => '/user/login',
                'controller' => 'UserController',
                'action' => 'login',
                'description' => 'Authenticate user and return access token',
                'parameters' => [
                    ['name' => 'email', 'type' => 'string', 'description' => 'User email'],
                    ['name' => 'password', 'type' => 'string', 'description' => 'User password']
                ]
            ],
            // Students Endpoints
            [
                'method' => 'GET',
                'url' => '/students',
                'controller' => 'SiswaController',
                'action' => 'index',
                'description' => 'Get list of all students',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/students/min',
                'controller' => 'SiswaController',
                'action' => 'indexsmall',
                'description' => 'Get minimal student list (limited fields)',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/student/{slug}',
                'controller' => 'SiswaController',
                'action' => 'show',
                'description' => 'Get student details by slug',
                'parameters' => [
                    ['name' => 'slug', 'type' => 'string', 'description' => 'Student slug identifier']
                ]
            ],
            [
                'method' => 'GET',
                'url' => '/student/detail/{id}/{len}',
                'controller' => 'SiswaController',
                'action' => 'detail',
                'description' => 'Get detailed student information with specific length',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Student ID'],
                    ['name' => 'len', 'type' => 'integer', 'description' => 'Length of data to return']
                ]
            ],
            // Teachers Endpoints
            [
                'method' => 'GET',
                'url' => '/teachers',
                'controller' => 'TeacherController',
                'action' => 'index',
                'description' => 'Retrieve all teachers',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/teacher/{id}',
                'controller' => 'TeacherController',
                'action' => 'show',
                'description' => 'Get teacher by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Teacher ID']
                ]
            ],
            // Subjects Endpoints
            [
                'method' => 'GET',
                'url' => '/subjects',
                'controller' => 'SubjectController',
                'action' => 'index',
                'description' => 'Get all subjects',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/subject/{id}',
                'controller' => 'SubjectController',
                'action' => 'show',
                'description' => 'Get subject by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Subject ID']
                ]
            ],
            // Comments Endpoints
            [
                'method' => 'GET',
                'url' => '/comment/subjects',
                'controller' => 'SubjectCommentController',
                'action' => 'index',
                'description' => 'Get all subject comments',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/comment/subject/{id}',
                'controller' => 'SubjectCommentController',
                'action' => 'show',
                'description' => 'Get comments for a specific subject',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Subject ID']
                ]
            ],
            [
                'method' => 'GET',
                'url' => '/comment/teachers',
                'controller' => 'TeacherCommentController',
                'action' => 'index',
                'description' => 'Get all teacher comments',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/comment/teacher/{id}',
                'controller' => 'TeacherCommentController',
                'action' => 'show',
                'description' => 'Get comments for a specific teacher',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Teacher ID']
                ]
            ],
            [
                'method' => 'POST',
                'url' => '/comment/teacher/add',
                'controller' => 'TeacherCommentController',
                'action' => 'storeData',
                'description' => 'Add a new comment for a teacher',
                'parameters' => [
                    ['name' => 'teacher_id', 'type' => 'integer', 'description' => 'Teacher ID'],
                    ['name' => 'comment', 'type' => 'string', 'description' => 'Comment text'],
                    ['name' => 'rating', 'type' => 'integer', 'description' => 'Rating (1-5)']
                ]
            ],
            // Schedules Endpoints
            [
                'method' => 'GET',
                'url' => '/schedules',
                'controller' => 'ScheduleController',
                'action' => 'index',
                'description' => 'Get all schedules',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/schedule/{id}',
                'controller' => 'ScheduleController',
                'action' => 'show',
                'description' => 'Get schedule by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Schedule ID']
                ]
            ],
            // Photos Endpoints
            [
                'method' => 'GET',
                'url' => '/photos',
                'controller' => 'PhotoController',
                'action' => 'index',
                'description' => 'Get all photos',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/photo/{id}',
                'controller' => 'PhotoController',
                'action' => 'show',
                'description' => 'Get photo by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Photo ID']
                ]
            ],
            [
                'method' => 'GET',
                'url' => '/photo/delete/{id}',
                'controller' => 'PhotoController',
                'action' => 'delete',
                'description' => 'Delete a photo by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Photo ID']
                ]
            ],
            [
                'method' => 'POST',
                'url' => '/photo/add',
                'controller' => 'PhotoController',
                'action' => 'storeData',
                'description' => 'Upload a new photo',
                'parameters' => [
                    ['name' => 'image', 'type' => 'file', 'description' => 'Image file'],
                    ['name' => 'title', 'type' => 'string', 'description' => 'Photo title'],
                    ['name' => 'description', 'type' => 'string', 'description' => 'Photo description']
                ]
            ],
            // Projects Endpoints
            [
                'method' => 'GET',
                'url' => '/projects',
                'controller' => 'ProjectController',
                'action' => 'index',
                'description' => 'Get all projects',
                'parameters' => []
            ],
            [
                'method' => 'GET',
                'url' => '/project/{id}',
                'controller' => 'ProjectController',
                'action' => 'show',
                'description' => 'Get project by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Project ID']
                ]
            ],
            [
                'method' => 'GET',
                'url' => '/project/delete/{id}',
                'controller' => 'ProjectController',
                'action' => 'delete',
                'description' => 'Delete a project by ID',
                'parameters' => [
                    ['name' => 'id', 'type' => 'integer', 'description' => 'Project ID']
                ]
            ],
            [
                'method' => 'POST',
                'url' => '/project/add',
                'controller' => 'ProjectController',
                'action' => 'storeData',
                'description' => 'Create a new project',
                'parameters' => [
                    ['name' => 'title', 'type' => 'string', 'description' => 'Project title'],
                    ['name' => 'description', 'type' => 'string', 'description' => 'Project description'],
                    ['name' => 'due_date', 'type' => 'date', 'description' => 'Project due date']
                ]
            ],
        ];

        // Group endpoints into sections
        $sections = [
            'users' => [
                'name' => 'User Management',
                'icon' => '👤',
                'description' => 'Endpoints for user registration, authentication, and profile management',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'UserController');
                })
            ],
            'students' => [
                'name' => 'Students',
                'icon' => '🎓',
                'description' => 'Endpoints for managing student data',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'SiswaController');
                })
            ],
            'teachers' => [
                'name' => 'Teachers',
                'icon' => '👨‍🏫',
                'description' => 'Endpoints for teacher information',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'TeacherController');
                })
            ],
            'subjects' => [
                'name' => 'Subjects',
                'icon' => '📚',
                'description' => 'Endpoints for subject data',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'SubjectController');
                })
            ],
            'comments' => [
                'name' => 'Comments',
                'icon' => '💬',
                'description' => 'Endpoints for managing comments on teachers and subjects',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'CommentController');
                })
            ],
            'schedules' => [
                'name' => 'Schedules',
                'icon' => '📅',
                'description' => 'Endpoints for schedule management',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'ScheduleController');
                })
            ],
            'media' => [
                'name' => 'Media & Projects',
                'icon' => '📁',
                'description' => 'Endpoints for photos and projects management',
                'endpoints' => array_filter($endpoints, function($endpoint) {
                    return str_contains($endpoint['controller'], 'PhotoController') || 
                           str_contains($endpoint['controller'], 'ProjectController');
                })
            ]
        ];

        return view('welcome', compact('endpoints', 'sections'));
    }
}
