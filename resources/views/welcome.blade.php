<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="API Documentation - RESTful endpoints for the application">
    <title>API Documentation</title>

    <!-- Favicon -->
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📚</text></svg>">

    <style>
        /* Dark Minimalist Color Palette */
        :root {
            --bg-primary: #0a0a0a;
            --bg-secondary: #121212;
            --bg-surface: #1e1e1e;
            --bg-card: #252525;

            --text-primary: #f5f5f5;
            --text-secondary: #b0b0b0;
            --text-muted: #888888;

            --border-color: #333333;
            --divider-color: #2a2a2a;

            --accent-primary: #6366f1;
            --accent-secondary: #8b5cf6;
            --accent-success: #10b981;
            --accent-warning: #f59e0b;
            --accent-danger: #ef4444;

            --radius-sm: 4px;
            --radius-md: 8px;
            --radius-lg: 12px;

            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.25);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.35);
        }

        /* Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            padding: 20px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-top: 20px;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .header-info {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .info-badge {
            background-color: var(--bg-surface);
            padding: 6px 12px;
            border-radius: var(--radius-md);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Main Layout */
        .main-layout {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        @media (min-width: 992px) {
            .main-layout {
                grid-template-columns: 1fr 2fr;
            }
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--bg-surface);
            border-radius: var(--radius-lg);
            padding: 25px;
            height: fit-content;
            box-shadow: var(--shadow-md);
            position: fixed;
        }

        .sidebar h2 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--accent-primary);
            font-weight: 500;
        }

        .section-list {
            list-style: none;
        }

        .section-list li {
            margin-bottom: 12px;
        }

        .section-list a {
            color: var(--text-secondary);
            text-decoration: none;
            display: block;
            padding: 8px 12px;
            border-radius: var(--radius-md);
            transition: all 0.2s ease;
        }

        .section-list a:hover {
            background-color: var(--bg-card);
            color: var(--text-primary);
        }

        .section-list a.active {
            background-color: var(--bg-card);
            color: var(--accent-primary);
            border-left: 3px solid var(--accent-primary);
        }

        /* Content */
        .content {
            margin-left: 40dvw;
            background-color: var(--bg-surface);
            border-radius: var(--radius-lg);
            padding: 30px;
            box-shadow: var(--shadow-md);
        }

        /* Section */
        .section {
            margin-bottom: 40px;
        }

        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--divider-color);
        }

        .section-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--bg-card);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 500;
        }

        /* Endpoint Card */
        .endpoint-card {
            background-color: var(--bg-card);
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .endpoint-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .endpoint-header {
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .method {
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .method-get {
            background-color: rgba(16, 185, 129, 0.15);
            color: var(--accent-success);
        }

        .method-post {
            background-color: rgba(245, 158, 11, 0.15);
            color: var(--accent-warning);
        }

        .endpoint-url {
            font-family: 'Courier New', monospace;
            color: var(--text-primary);
            font-size: 1rem;
            word-break: break-all;
            flex-grow: 1;
            margin: 0 15px;
        }

        .endpoint-controller {
            color: var(--text-muted);
            font-size: 0.9rem;
            background-color: rgba(99, 102, 241, 0.1);
            padding: 4px 10px;
            border-radius: var(--radius-sm);
            border: 1px solid rgba(99, 102, 241, 0.3);
        }

        .endpoint-body {
            padding: 0 20px 20px;
            border-top: 1px solid var(--border-color);
            margin-top: 10px;
            padding-top: 20px;
        }

        .endpoint-description {
            color: var(--text-secondary);
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .params-list {
            list-style: none;
        }

        .params-list li {
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
        }

        .params-list li:last-child {
            border-bottom: none;
        }

        .param-name {
            font-family: 'Courier New', monospace;
            color: var(--accent-secondary);
            min-width: 120px;
        }

        .param-type {
            color: var(--accent-warning);
            font-size: 0.85rem;
            background-color: rgba(245, 158, 11, 0.1);
            padding: 2px 8px;
            border-radius: var(--radius-sm);
            margin: 0 15px;
        }

        .param-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px 0;
            color: var(--text-muted);
            font-size: 0.9rem;
            border-top: 1px solid var(--divider-color);
        }

        /* Utility Classes */
        .highlight {
            color: var(--accent-primary);
            font-weight: 500;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: var(--radius-sm);
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 10px;
        }

        .badge-new {
            background-color: rgba(99, 102, 241, 0.2);
            color: var(--accent-primary);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .container {
                padding: 0 15px;
            }

            .content,
            .sidebar {
                padding: 20px;
            }

            .endpoint-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .endpoint-url {
                margin: 0;
            }

            .params-list li {
                flex-wrap: wrap;
                gap: 10px;
            }

            .param-name {
                min-width: auto;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #444;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1>API Documentation</h1>
            <p>Complete reference for all RESTful endpoints available in the application</p>

            <div class="header-info">
                <div class="info-badge">
                    <span>📍</span>
                    <span>Routes stored in: <span class="highlight">api.php</span></span>
                </div>
                <div class="info-badge">
                    <span>📊</span>
                    <span><span class="highlight">{{ count($endpoints) }}</span> endpoints documented</span>
                </div>
                <div class="info-badge">
                    <span>🔄</span>
                    <span>Last updated: <span class="highlight">{{ date('F j, Y') }}</span></span>
                </div>
            </div>
        </header>

        <div class="main-layout">
            <!-- Sidebar Navigation -->
            <aside class="sidebar">
                <h2>API Sections</h2>
                <ul class="section-list">
                    @foreach ($sections as $sectionId => $section)
                        <li>
                            <a href="#{{ $sectionId }}" class="{{ $loop->first ? 'active' : '' }}">
                                {{ $section['name'] }}
                                <span class="badge badge-new">{{ count($section['endpoints']) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <!-- Main Content -->
            <main class="content">
                @foreach ($sections as $sectionId => $section)
                    <section class="section" id="{{ $sectionId }}">
                        <div class="section-header">
                            <div class="section-icon">
                                {{ $section['icon'] }}
                            </div>
                            <h2 class="section-title">{{ $section['name'] }}</h2>
                        </div>

                        <p class="endpoint-description">{{ $section['description'] }}</p>

                        @foreach ($section['endpoints'] as $endpoint)
                            <div class="endpoint-card">
                                <div class="endpoint-header">
                                    <span
                                        class="method method-{{ $endpoint['method'] }}">{{ $endpoint['method'] }}</span>
                                    <span class="endpoint-url">{{ $endpoint['url'] }}</span>
                                    <span
                                        class="endpoint-controller">{{ $endpoint['controller'] }}@{{ $endpoint['action'] }}</span>
                                </div>

                                <div class="endpoint-body">
                                    <p class="endpoint-description">{{ $endpoint['description'] }}</p>

                                    @if (!empty($endpoint['parameters']))
                                        <h4
                                            style="margin-bottom: 10px; color: var(--text-primary); font-size: 0.95rem;">
                                            Parameters:</h4>
                                        <ul class="params-list">
                                            @foreach ($endpoint['parameters'] as $param)
                                                <li>
                                                    <span class="param-name">{{ $param['name'] }}</span>
                                                    <span class="param-type">{{ $param['type'] }}</span>
                                                    <span class="param-desc">{{ $param['description'] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </section>
                @endforeach
            </main>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>API Documentation &copy; {{ date('Y') }} • Built with Laravel • Dark Minimalist Theme</p>
            <p style="margin-top: 5px; font-size: 0.8rem;">All endpoints are defined in the <span
                    class="highlight">routes/api.php</span> file</p>
        </footer>
    </div>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('.section-list a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                window.scrollTo({
                    top: targetElement.offsetTop - 20,
                    behavior: 'smooth'
                });

                // Update active link
                document.querySelectorAll('.section-list a').forEach(link => {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            });
        });

        // Update active link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('.section');
            const navLinks = document.querySelectorAll('.section-list a');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.clientHeight;

                if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                    currentSection = '#' + section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === currentSection) {
                    link.classList.add('active');
                }
            });
        });

        // Copy endpoint URL on click
        document.querySelectorAll('.endpoint-url').forEach(element => {
            element.addEventListener('click', function() {
                const url = this.textContent;
                navigator.clipboard.writeText(url).then(() => {
                    const originalText = this.textContent;
                    this.textContent = 'Copied!';
                    this.style.color = 'var(--accent-success)';

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.color = 'var(--text-primary)';
                    }, 1500);
                });
            });

            // Add cursor pointer to indicate it's clickable
            element.style.cursor = 'pointer';
            element.title = 'Click to copy endpoint URL';
        });
    </script>
</body>

</html>
