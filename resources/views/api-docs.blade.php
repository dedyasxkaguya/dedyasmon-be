<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="API Documentation - Complete reference for all endpoints">
    
    <title>API Documentation - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Source+Code+Pro:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        /* Custom Styles for YouTube-inspired layout */
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-bg: #f8f9fa;
            --border-color: #dee2e6;
            --sidebar-width: 280px;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            color: #212529;
            line-height: 1.6;
        }
        
        /* Code and endpoint styling */
        code, .endpoint-url {
            font-family: 'Source Code Pro', monospace;
            font-size: 0.9rem;
        }
        
        /* Method badges */
        .method-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            min-width: 65px;
            text-align: center;
            display: inline-block;
        }
        
        .method-get {
            background-color: rgba(25, 135, 84, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(25, 135, 84, 0.3);
        }
        
        .method-post {
            background-color: rgba(255, 193, 7, 0.1);
            color: #856404;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }
        
        .method-put {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
            border: 1px solid rgba(13, 110, 253, 0.3);
        }
        
        .method-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(220, 53, 69, 0.3);
        }
        
        /* Sidebar styling */
        #sidebar {
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            background-color: var(--light-bg);
            border-right: 1px solid var(--border-color);
            z-index: 100;
            transition: transform 0.3s ease;
        }
        
        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid var(--border-color);
            background-color: white;
        }
        
        .nav-link {
            color: #495057;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 0.25rem;
            transition: all 0.2s;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 0.75rem;
        }
        
        /* Main content area */
        #main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            transition: margin-left 0.3s ease;
        }
        
        /* Sticky header */
        .sticky-header {
            position: sticky;
            top: 0;
            z-index: 99;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }
        
        /* API Section Cards */
        .api-section {
            background-color: white;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .api-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        }
        
        .section-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            background-color: rgba(248, 249, 250, 0.5);
            border-radius: 10px 10px 0 0;
        }
        
        .section-body {
            padding: 1.5rem;
        }
        
        /* Endpoint row styling */
        .endpoint-row {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: background-color 0.2s;
        }
        
        .endpoint-row:hover {
            background-color: rgba(248, 249, 250, 0.5);
        }
        
        .endpoint-row:last-child {
            border-bottom: none;
        }
        
        /* Parameter highlighting */
        .param-highlight {
            color: #e83e8c;
            font-weight: 500;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            #sidebar {
                transform: translateX(-100%);
            }
            
            #sidebar.show {
                transform: translateX(0);
            }
            
            #main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block !important;
            }
        }
        
        /* Copy to clipboard button */
        .copy-btn {
            font-size: 0.8rem;
            padding: 0.25rem 0.5rem;
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        
        .copy-btn:hover {
            opacity: 1;
        }
        
        /* Search box */
        .search-box {
            position: relative;
        }
        
        .search-box .form-control {
            padding-left: 2.5rem;
        }
        
        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation (YouTube-style) -->
    <nav id="sidebar" class="d-none d-lg-block">
        <div class="sidebar-header">
            <h4 class="mb-0">
                <i class="fas fa-code text-primary me-2"></i>
                API Documentation
            </h4>
            <p class="text-muted mb-0 small mt-1">{{ count($apiGroups) }} resource groups, {{ array_sum(array_map(fn($group) => count($group['routes']), $apiGroups)) }} endpoints</p>
            
            <!-- Search Box -->
            <div class="mt-3 search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="search-endpoints" class="form-control form-control-sm" placeholder="Search endpoints...">
            </div>
        </div>
        
        <div class="p-3">
            <ul class="nav flex-column" id="sidebar-nav">
                <!-- Introduction Link -->
                <li class="nav-item">
                    <a class="nav-link active" href="#introduction">
                        <i class="fas fa-home"></i>
                        Introduction
                    </a>
                </li>
                
                <!-- Resource Group Links -->
                @foreach($apiGroups as $key => $group)
                <li class="nav-item">
                    <a class="nav-link" href="#{{ $key }}">
                        <i class="{{ $group['icon'] }}"></i>
                        {{ $group['name'] }}
                        <span class="badge bg-light text-dark float-end">{{ count($group['routes']) }}</span>
                    </a>
                </li>
                @endforeach
                
                <!-- API Info -->
                <li class="nav-item mt-4 pt-3 border-top">
                    <div class="px-3">
                        <small class="text-muted d-block mb-1">API Base URL</small>
                        <code class="text-primary">{{ url('/') }}</code>
                        
                        <small class="text-muted d-block mt-3 mb-1">Routes File</small>
                        <code>routes/api.php</code>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main id="main-content">
        <!-- Sticky Header (YouTube-style) -->
        <header class="sticky-header">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- Mobile Toggle Button -->
                    <button class="btn btn-outline-secondary d-lg-none sidebar-toggle" type="button" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    
                    <!-- Breadcrumb -->
                    <div class="d-none d-md-block">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active">API Documentation</li>
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="h4 mb-0 d-none d-md-block">API Documentation</h1>
                    
                    <!-- Documentation Info -->
                    <div class="d-flex align-items-center">
                        <span class="badge bg-primary me-2">v1.0</span>
                        <small class="text-muted">Updated: {{ now()->format('M d, Y') }}</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="container-fluid px-4 py-4">
            <!-- Introduction Section -->
            <section id="introduction" class="mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="api-section">
                            <div class="section-header">
                                <h2 class="h4 mb-2">
                                    <i class="fas fa-home text-primary me-2"></i>
                                    API Introduction
                                </h2>
                                <p class="text-muted mb-0">
                                    Welcome to the {{ config('app.name', 'Laravel') }} API documentation. This reference covers all available endpoints for managing users, students, teachers, and other resources.
                                </p>
                            </div>
                            <div class="section-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="mb-3">Getting Started</h5>
                                        <ul class="list-unstyled">
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> All endpoints return JSON responses</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Use proper HTTP methods for each endpoint</li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> API base URL: <code>{{ url('/') }}</code></li>
                                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Authentication may be required for some endpoints</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="mb-3">HTTP Methods</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="method-badge method-get">GET</span>
                                            <span class="method-badge method-post">POST</span>
                                            <span class="method-badge method-put">PUT</span>
                                            <span class="method-badge method-delete">DELETE</span>
                                        </div>
                                        <p class="small text-muted mt-3">
                                            <strong>GET:</strong> Retrieve resources<br>
                                            <strong>POST:</strong> Create new resources<br>
                                            <strong>PUT/PATCH:</strong> Update existing resources<br>
                                            <strong>DELETE:</strong> Remove resources
                                        </p>
                                    </div>
                                </div>
                                
                                <!-- Quick Stats -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h5 class="mb-3">API Statistics</h5>
                                        <div class="row text-center">
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="border rounded p-3">
                                                    <h3 class="text-primary">{{ count($apiGroups) }}</h3>
                                                    <small class="text-muted">Resource Groups</small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="border rounded p-3">
                                                    <h3 class="text-success">{{ array_sum(array_map(fn($group) => count(array_filter($group['routes'], fn($route) => $route['method'] === 'GET')), $apiGroups)) }}</h3>
                                                    <small class="text-muted">GET Endpoints</small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="border rounded p-3">
                                                    <h3 class="text-warning">{{ array_sum(array_map(fn($group) => count(array_filter($group['routes'], fn($route) => $route['method'] === 'POST')), $apiGroups)) }}</h3>
                                                    <small class="text-muted">POST Endpoints</small>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-6 mb-3">
                                                <div class="border rounded p-3">
                                                    <h3 class="text-danger">{{ array_sum(array_map(fn($group) => count(array_filter($group['routes'], fn($route) => $route['method'] === 'DELETE')), $apiGroups)) }}</h3>
                                                    <small class="text-muted">DELETE Endpoints</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- API Resource Sections -->
            <!--
                DYNAMIC LOOPING EXAMPLE:
                This section demonstrates how to loop through the API groups data
                to automatically generate documentation for all endpoints.
                This makes it easy to maintain - just update the controller data.
            -->
            @foreach($apiGroups as $key => $group)
            <section id="{{ $key }}" class="mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="api-section">
                            <!-- Section Header -->
                            <div class="section-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h2 class="h4 mb-1">
                                            <i class="{{ $group['icon'] }} text-primary me-2"></i>
                                            {{ $group['name'] }}
                                        </h2>
                                        <p class="text-muted mb-0">{{ $group['description'] }}</p>
                                    </div>
                                    <span class="badge bg-primary">{{ count($group['routes']) }} endpoints</span>
                                </div>
                            </div>
                            
                            <!-- Section Body with Endpoints -->
                            <div class="section-body p-0">
                                <!--
                                    LOOP THROUGH ROUTES:
                                    For each route in the group, display a formatted endpoint row.
                                    This shows how to dynamically generate documentation from data.
                                -->
                                @foreach($group['routes'] as $route)
                                <div class="endpoint-row" data-searchable="{{ strtolower($group['name'] . ' ' . $route['description'] . ' ' . $route['endpoint']) }}">
                                    <div class="row align-items-center">
                                        <!-- HTTP Method -->
                                        <div class="col-md-2 col-sm-3 mb-2 mb-sm-0">
                                            <span class="method-badge method-{{ strtolower($route['method']) }}">
                                                {{ $route['method'] }}
                                            </span>
                                        </div>
                                        
                                        <!-- Endpoint URL -->
                                        <div class="col-md-6 col-sm-5 mb-2 mb-sm-0">
                                            <code class="endpoint-url">
                                                {{ $route['endpoint'] }}
                                            </code>
                                            <button class="btn btn-sm copy-btn" 
                                                    data-bs-toggle="tooltip" 
                                                    title="Copy to clipboard"
                                                    data-clipboard-text="{{ $route['endpoint'] }}">
                                                <i class="far fa-copy"></i>
                                            </button>
                                        </div>
                                        
                                        <!-- Description -->
                                        <div class="col-md-4 col-sm-4">
                                            <span class="text-muted">{{ $route['description'] }}</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Example Request (Collapsible) -->
                                    <div class="mt-2">
                                        <a class="btn btn-sm btn-link text-decoration-none p-0" 
                                           data-bs-toggle="collapse" 
                                           href="#example-{{ $key }}-{{ $loop->index }}" 
                                           role="button">
                                            <small>
                                                <i class="fas fa-code me-1"></i>
                                                Show example request
                                            </small>
                                        </a>
                                        
                                        <div class="collapse mt-2" id="example-{{ $key }}-{{ $loop->index }}">
                                            <div class="card card-body bg-light border-0 p-3">
                                                <!-- Example cURL Request -->
                                                <small class="text-muted d-block mb-1">cURL Example:</small>
                                                <pre class="bg-dark text-light p-3 rounded mb-0"><code>curl -X {{ $route['method'] }} "{{ url('/') }}{{ $route['endpoint'] }}"
    -H "Content-Type: application/json"</code></pre>
                                                
                                                <!-- Parameters (if any) -->
                                                @if(str_contains($route['endpoint'], '{'))
                                                <div class="mt-3">
                                                    <small class="text-muted d-block mb-1">Parameters:</small>
                                                    <!-- Extract parameters from endpoint -->
                                                    @php
                                                        preg_match_all('/\{([^\}]+)\}/', $route['endpoint'], $matches);
                                                        $params = $matches[1] ?? [];
                                                    @endphp
                                                    
                                                    @if(!empty($params))
                                                    <div class="d-flex flex-wrap gap-2">
                                                        @foreach($params as $param)
                                                        <span class="badge bg-light text-dark">
                                                            {{ $param }}
                                                        </span>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- END OF ROUTE LOOP -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
            <!-- END OF GROUP LOOP -->
            
            <!-- Quick Reference Section -->
            <section id="quick-reference" class="mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0 bg-light">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <i class="fas fa-rocket text-primary me-2"></i>
                                    Quick Reference
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Most Used Endpoints</h6>
                                        <ul class="list-unstyled">
                                            @foreach(['/user/login', '/users', '/students', '/teachers', '/projects'] as $popularEndpoint)
                                                @php
                                                    $found = false;
                                                    foreach($apiGroups as $group) {
                                                        foreach($group['routes'] as $route) {
                                                            if ($route['endpoint'] === $popularEndpoint) {
                                                                $found = $route;
                                                                break 2;
                                                            }
                                                        }
                                                    }
                                                @endphp
                                                @if($found)
                                                <li class="mb-2">
                                                    <span class="method-badge method-{{ strtolower($found['method']) }} me-2">{{ $found['method'] }}</span>
                                                    <code class="small">{{ $found['endpoint'] }}</code>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-2">Need Help?</h6>
                                        <p class="small">
                                            If you encounter issues with the API, please check:
                                        </p>
                                        <ul class="small">
                                            <li>Correct HTTP method for the endpoint</li>
                                            <li>Required parameters in the URL</li>
                                            <li>Proper authentication headers</li>
                                            <li>Valid JSON format for POST requests</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light border-top py-4 mt-5">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-2">API Documentation</h6>
                    <p class="small text-muted mb-0">
                        Generated from <code>routes/api.php</code> • 
                        Built with Laravel {{ app()->version() }} • 
                        Bootstrap 5.3
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small text-muted mb-0">
                        Last updated: {{ now()->format('F j, Y') }}<br>
                        Total endpoints: {{ array_sum(array_map(fn($group) => count($group['routes']), $apiGroups)) }}
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Clipboard.js for copy functionality -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    
    <script>
        // DOM Ready Function
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Mobile sidebar toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
            
            // Initialize clipboard.js
            const clipboard = new ClipboardJS('.copy-btn');
            
            clipboard.on('success', function(e) {
                // Show success feedback
                const originalTitle = e.trigger.getAttribute('title');
                e.trigger.setAttribute('title', 'Copied!');
                e.trigger.querySelector('i').className = 'fas fa-check text-success';
                
                setTimeout(function() {
                    e.trigger.setAttribute('title', originalTitle);
                    e.trigger.querySelector('i').className = 'far fa-copy';
                }, 2000);
                
                e.clearSelection();
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        // Update active nav link
                        document.querySelectorAll('#sidebar-nav .nav-link').forEach(link => {
                            link.classList.remove('active');
                        });
                        this.classList.add('active');
                        
                        // Smooth scroll to target
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                        
                        // Close sidebar on mobile after click
                        if (window.innerWidth < 992) {
                            sidebar.classList.remove('show');
                        }
                    }
                });
            });
            
            // Search functionality
            const searchInput = document.getElementById('search-endpoints');
            if (searchInput) {
                searchInput.addEventListener('keyup', function() {
                    const searchTerm = this.value.toLowerCase();
                    const endpointRows = document.querySelectorAll('.endpoint-row');
                    
                    endpointRows.forEach(row => {
                        const searchableText = row.getAttribute('data-searchable');
                        if (searchableText.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                    
                    // Also search in section headers
                    document.querySelectorAll('.api-section').forEach(section => {
                        const sectionVisible = Array.from(section.querySelectorAll('.endpoint-row'))
                            .some(row => row.style.display !== 'none');
                        
                        if (sectionVisible || searchTerm === '') {
                            section.style.display = '';
                        } else {
                            section.style.display = 'none';
                        }
                    });
                });
            }
            
            // Highlight active section in sidebar on scroll
            window.addEventListener('scroll', function() {
                const sections = document.querySelectorAll('section[id]');
                const scrollPosition = window.scrollY + 100;
                
                let currentSection = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    
                    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                        currentSection = section.getAttribute('id');
                    }
                });
                
                // Update active nav link
                document.querySelectorAll('#sidebar-nav .nav-link').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + currentSection) {
                        link.classList.add('active');
                    }
                });
                
                // Make sure introduction is active by default
                if (!currentSection && scrollPosition < 100) {
                    document.querySelector('#sidebar-nav .nav-link[href="#introduction"]').classList.add('active');
                }
            });
            
            // Auto-expand section if hash is present in URL
            if (window.location.hash) {
                const targetSection = document.querySelector(window.location.hash);
                if (targetSection) {
                    setTimeout(() => {
                        window.scrollTo({
                            top: targetSection.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }, 100);
                }
            }
        });
    </script>
</body>
</html>