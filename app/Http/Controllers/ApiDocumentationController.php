<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiDocumentationController extends Controller
{
    /**
     * Display API documentation page
     */
    public function index()
    {
        // Group routes by resource for organized display
        $apiGroups = [
            'users' => [
                'name' => 'User Management',
                'icon' => 'fas fa-users',
                'description' => 'User registration, authentication, and profile management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/users', 'description' => 'Get all users'],
                    ['method' => 'GET', 'endpoint' => '/admins', 'description' => 'Get all admin users'],
                    ['method' => 'GET', 'endpoint' => '/user/{slug}', 'description' => 'Get user by slug'],
                    ['method' => 'GET', 'endpoint' => '/user/detail/{id}', 'description' => 'Get detailed user info'],
                    ['method' => 'POST', 'endpoint' => '/user/register', 'description' => 'Register new user'],
                    ['method' => 'POST', 'endpoint' => '/user/login', 'description' => 'User login'],
                ]
            ],
            'students' => [
                'name' => 'Students',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'Student data management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/students', 'description' => 'Get all students'],
                    ['method' => 'GET', 'endpoint' => '/students/min', 'description' => 'Get minimal student list'],
                    ['method' => 'GET', 'endpoint' => '/student/{slug}', 'description' => 'Get student by slug'],
                    ['method' => 'GET', 'endpoint' => '/student/detail/{id}/{len}', 'description' => 'Get detailed student info with length parameter'],
                    ['method' => 'POST', 'endpoint' => '/siswa/edit', 'description' => 'Update student data'],
                ]
            ],
            'teachers' => [
                'name' => 'Teachers',
                'icon' => 'fas fa-chalkboard-teacher',
                'description' => 'Teacher information and management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/teachers', 'description' => 'Get all teachers'],
                    ['method' => 'GET', 'endpoint' => '/teacher/{id}', 'description' => 'Get teacher by ID'],
                ]
            ],
            'subjects' => [
                'name' => 'Subjects',
                'icon' => 'fas fa-book',
                'description' => 'Subject/course management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/subjects', 'description' => 'Get all subjects'],
                    ['method' => 'GET', 'endpoint' => '/subject/{id}', 'description' => 'Get subject by ID'],
                ]
            ],
            'comments' => [
                'name' => 'Comments',
                'icon' => 'fas fa-comments',
                'description' => 'Teacher and subject comments',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/comment/subjects', 'description' => 'Get all subject comments'],
                    ['method' => 'GET', 'endpoint' => '/comment/subject/{id}', 'description' => 'Get comments for specific subject'],
                    ['method' => 'GET', 'endpoint' => '/comment/teachers', 'description' => 'Get all teacher comments'],
                    ['method' => 'GET', 'endpoint' => '/comment/teacher/{id}', 'description' => 'Get comments for specific teacher'],
                    ['method' => 'POST', 'endpoint' => '/comment/teacher/add', 'description' => 'Add new teacher comment'],
                ]
            ],
            'schedules' => [
                'name' => 'Schedules',
                'icon' => 'fas fa-calendar-alt',
                'description' => 'Class and event scheduling',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/schedules', 'description' => 'Get all schedules'],
                    ['method' => 'GET', 'endpoint' => '/schedule/{id}', 'description' => 'Get schedule by ID'],
                ]
            ],
            'media' => [
                'name' => 'Media & Projects',
                'icon' => 'fas fa-images',
                'description' => 'Photos, projects, and media management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/photos', 'description' => 'Get all photos'],
                    ['method' => 'GET', 'endpoint' => '/photo/{id}', 'description' => 'Get photo by ID'],
                    ['method' => 'GET', 'endpoint' => '/photo/delete/{id}', 'description' => 'Delete photo by ID'],
                    ['method' => 'POST', 'endpoint' => '/photo/add', 'description' => 'Upload new photo'],
                    ['method' => 'GET', 'endpoint' => '/projects', 'description' => 'Get all projects'],
                    ['method' => 'GET', 'endpoint' => '/project/{project}', 'description' => 'Get project by ID'],
                    ['method' => 'GET', 'endpoint' => '/project/category/{id}', 'description' => 'Get projects by category ID'],
                    ['method' => 'GET', 'endpoint' => '/project/delete/{project}', 'description' => 'Delete project by ID'],
                    ['method' => 'POST', 'endpoint' => '/project/add', 'description' => 'Create new project'],
                ]
            ],
            'categories' => [
                'name' => 'Categories',
                'icon' => 'fas fa-folder',
                'description' => 'Project category management',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/categories', 'description' => 'Get all categories'],
                    ['method' => 'GET', 'endpoint' => '/category/{category:slug}', 'description' => 'Get category by slug'],
                ]
            ],
            'feedbacks' => [
                'name' => 'Feedback',
                'icon' => 'fas fa-comment-dots',
                'description' => 'User feedback and reviews',
                'routes' => [
                    ['method' => 'GET', 'endpoint' => '/feedbacks', 'description' => 'Get all feedbacks'],
                    ['method' => 'GET', 'endpoint' => '/feedback/{feedback}', 'description' => 'Get feedback by ID'],
                    ['method' => 'POST', 'endpoint' => '/feedback/add', 'description' => 'Submit new feedback'],
                ]
            ],
        ];

        return view('api-docs', compact('apiGroups'));
    }

    /**
     * Alternative: Dynamic route parsing from Laravel routes
     * This method automatically extracts routes from the Route facade
     * Note: This is more advanced but included for reference
     */
    public function dynamicIndex()
    {
        $routes = Route::getRoutes();
        $apiRoutes = [];
        
        foreach ($routes as $route) {
            // Filter only API routes (routes defined in api.php)
            if (strpos($route->uri(), 'api/') === 0 || !str_contains($route->uri(), 'sanctum')) {
                $apiRoutes[] = [
                    'method' => implode('|', $route->methods()),
                    'uri' => $route->uri(),
                    'name' => $route->getName(),
                    'action' => $route->getActionName(),
                ];
            }
        }
        
        return view('api-docs-dynamic', compact('apiRoutes'));
    }
}