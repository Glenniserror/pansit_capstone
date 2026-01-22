<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exported Project</title>
    <meta property="og:title" content="Exported Project" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />
     @vite(['resources/css/dashboard/student_dashboard.css'])

    <!-- Reset and default styles -->
    <style data-tag="reset-style-sheet">
        html { line-height: 1.15; }
        body { margin: 0; }
        * { box-sizing: border-box; border-width: 0; border-style: solid; -webkit-font-smoothing: antialiased; }
        p, li, ul, pre, div, h1, h2, h3, h4, h5, h6, figure, blockquote, figcaption { margin: 0; padding: 0; }
        button { background-color: transparent; }
        button, input, optgroup, select, textarea { font-family: inherit; font-size: 100%; line-height: 1.15; margin: 0; }
        button, select { text-transform: none; }
        button, [type="button"], [type="reset"], [type="submit"] { -webkit-appearance: button; color: inherit; }
        button::-moz-focus-inner, [type="button"]::-moz-focus-inner, [type="reset"]::-moz-focus-inner, [type="submit"]::-moz-focus-inner { border-style: none; padding: 0; }
        button:-moz-focus, [type="button"]:-moz-focus, [type="reset"]:-moz-focus, [type="submit"]:-moz-focus { outline: 1px dotted ButtonText; }
        a { color: inherit; text-decoration: inherit; }
        pre { white-space: normal; }
        input { padding: 2px 4px; }
        img { display: block; }
        details { display: block; margin: 0; padding: 0; }
        summary::-webkit-details-marker { display: none; }
        [data-thq="accordion"] [data-thq="accordion-content"] { max-height: 0; overflow: hidden; transition: max-height 0.3s ease-in-out; padding: 0; }
        [data-thq="accordion"] details[data-thq="accordion-trigger"][open] + [data-thq="accordion-content"] { max-height: 1000vh; }
        details[data-thq="accordion-trigger"][open] summary [data-thq="accordion-icon"] { transform: rotate(180deg); }
        html { scroll-behavior: smooth; }
    </style>
    <style data-tag="default-style-sheet">
        html { font-family: Inter; font-size: 16px; }
        body { font-weight: 400; font-style: normal; text-decoration: none; text-transform: none; letter-spacing: normal; line-height: 1.15; color: var(--dl-color-theme-neutral-dark); background: var(--dl-color-theme-neutral-light); fill: var(--dl-color-theme-neutral-dark); }
    </style>

    <!-- External fonts and libraries -->
    <link rel="stylesheet" href="https://unpkg.com/animate.css@4.1.1/animate.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" data-tag="font" />
    <link rel="stylesheet" href="https://unpkg.com/@teleporthq/teleport-custom-scripts/dist/style.css" />

    <!-- Link to the separate CSS file -->
    <link rel="stylesheet" href="css/dashboard.css" />
</head>
<body>
    <div>
        <div class="studentdashboard-container1">
            <div class="studentdashboard-thq-studentdashboard-elm">
                <div class="studentdashboard-thq-group10-elm"></div>
                <span class="studentdashboard-thq-text-elm10">Math Learning Assistant</span>
                <span class="studentdashboard-thq-text-elm11">Welcome back, Student!</span>
                <span class="studentdashboard-thq-text-elm14">Continue your mathematics learning journey</span>
                <img alt="icons8openbook64114573" src="images/icons8openbook64114573-3qic-200h.png" class="studentdashboard-thq-icons8openbook6411-elm" />
                <div class="studentdashboard-thq-group11-elm"></div>
                <span class="studentdashboard-thq-text-elm15">Logout</span>
                <div class="studentdashboard-thq-group18-elm">
                    <div class="studentdashboard-thq-group12-elm1"></div>
                    <img alt="Rectangle14573" src="images/rectangle14573-b8c-200h.png" class="studentdashboard-thq-rectangle1-elm1" />
                    <span class="studentdashboard-thq-text-elm16">Overall Progress</span>
                    <span class="studentdashboard-thq-text-elm17">Quizzes Completed</span>
                    <span class="studentdashboard-thq-text-elm18">12/20</span>
                    <span class="studentdashboard-thq-text-elm19">46%</span>
                    <span class="studentdashboard-thq-text-elm20">Across all modules</span>
                    <span class="studentdashboard-thq-text-elm21">Keep going!</span>
                    <div class="studentdashboard-thq-group12-elm2"></div>
                    <span class="studentdashboard-thq-text-elm22">7 days</span>
                    <span class="studentdashboard-thq-text-elm23">Current Streak</span>
                    <span class="studentdashboard-thq-text-elm24">Personal best!</span>
                </div>
                <img alt="image1074573" src="images/image1074573-mx7o-200h.png" class="studentdashboard-thq-image107-elm" />
                <img alt="image1084573" src="images/image1084573-4v4-200w.png" class="studentdashboard-thq-image108-elm" />
                <img alt="image1094573" src="images/image1094573-8s2e-200h.png" class="studentdashboard-thq-image109-elm" />
                <div class="studentdashboard-thq-group201-elm">
                    <div class="studentdashboard-container2">
                        <img alt="Rectangle84573" src="images/rectangle84573-nssw8-200h.png" class="studentdashboard-thq-rectangle8-elm" />
                        <div class="studentdashboard-thq-group32-elm">
                            <img alt="Rectangle94573" src="images/rectangle94573-9g9g-200h.png" class="studentdashboard-thq-rectangle9-elm" />
                            <img alt="Rectangle44573" src="images/rectangle44573-fj3f-300h.png" class="studentdashboard-thq-rectangle4-elm" />
                            <img alt="Rectangle34573" src="images/rectangle34573-800p-300h.png" class="studentdashboard-thq-rectangle3-elm" />
                            <img alt="Rectangle114573" src="images/rectangle114573-sxfm-300h.png" class="studentdashboard-thq-rectangle11-elm" />
                            <div class="studentdashboard-thq-group183-elm"></div>
                            <div class="studentdashboard-thq-group184-elm"></div>
                            <img alt="Rectangle54573" src="images/rectangle54573-bh3-200h.png" class="studentdashboard-thq-rectangle5-elm" />
                            <img alt="Rectangle144573" src="images/rectangle144573-8zs9-200h.png" class="studentdashboard-thq-rectangle14-elm" />
                            <img alt="Rectangle74573" src="images/rectangle74573-tte4f-200h.png" class="studentdashboard-thq-rectangle7-elm" />
                            <img alt="Rectangle134573" src="images/rectangle134573-q5zi-200h.png" class="studentdashboard-thq-rectangle13-elm" />
                            <img alt="Rectangle104573" src="images/rectangle104573-62rl-200h.png" class="studentdashboard-thq-rectangle10-elm" />
                            <span class="studentdashboard-thq-text-elm25">AI Chatbot</span>
                            <span class="studentdashboard-thq-text-elm26">Summative Test</span>
                            <span class="studentdashboard-thq-text-elm27">Offline Materials</span>
                            <img alt="image1104573" src="images/image1104573-oxvm-200h.png" class="studentdashboard-thq-image110-elm" />
                            <div class="studentdashboard-thq-group31-elm">
                                <span class="studentdashboard-thq-text-elm28">Get instant help with your math questions</span>
                                <span class="studentdashboard-thq-text-elm29">Test your knowledge with interactive summative test</span>
                                <span class="studentdashboard-thq-text-elm30">Download assessment to practice offline</span>
                                <span class="studentdashboard-thq-text-elm31">Start Chat</span>
                                <span class="studentdashboard-thq-text-elm32">Start Summative Test</span>
                                <span class="studentdashboard-thq-text-elm33">View Downloads</span>
                            </div>
                            <img alt="image1114573" src="images/image1114573-cvxl-200w.png" class="studentdashboard-thq-image111-elm" />
                        </div>
                    </div>
                    <img alt="image1304573" src="images/image1304573-d3im-200h.png" class="studentdashboard-thq-image130-elm" />
                </div>
                <img alt="Rectangle14573" src="images/rectangle14573-zyr-900h.png" class="studentdashboard-thq-rectangle1-elm2" />
                <div class="studentdashboard-thq-group200-elm">
                    <span class="studentdashboard-thq-text-elm34">Learning Modules</span>
                    <span class="studentdashboard-thq-text-elm35">Track your progress across all topics</span>
                </div>
                <div class="studentdashboard-thq-group199-elm">
                    <div class="studentdashboard-thq-group195-elm">
                        <div class="studentdashboard-thq-group22-elm1">
                            <img alt="Rectangle24573" src="images/rectangle24573-3frr-200h.png" class="studentdashboard-thq-rectangle2-elm1" />
                            <span class="studentdashboard-thq-text-elm36">View Topics</span>
                        </div>
                    </div>
                    <div class="studentdashboard-thq-group196-elm">
                        <div class="studentdashboard-thq-group22-elm2">
                            <img alt="Rectangle24573" src="images/rectangle24573-hy35-200h.png" class="studentdashboard-thq-rectangle2-elm2" />
                            <span class="studentdashboard-thq-text-elm37">View Topics</span>
                        </div>
                    </div>
                    <div class="studentdashboard-thq-group197-elm">
                        <div class="studentdashboard-thq-group22-elm3">
                            <img alt="Rectangle24573" src="images/rectangle24573-3838-200h.png" class="studentdashboard-thq-rectangle2-elm3" />
                            <span class="studentdashboard-thq-text-elm38">View Topics</span>
                        </div>
                    </div>
                    <div class="studentdashboard-thq-group198-elm">
                        <div class="studentdashboard-thq-group187-elm">
                            <img alt="Frame4573" src="images/frame4573-zwp.svg" class="studentdashboard-thq-frame-elm1" />
                            <span class="studentdashboard-thq-text-elm39">Sequences and Series</span>
                            <span class="studentdashboard-thq-text-elm40">100 %</span>
                            <img alt="Rectangle4573" src="images/rectangle4573-n9hq-200h.png" class="studentdashboard-thq-rectangle-elm1" />
                            <img alt="Rectangle4573" src="images/rectangle4573-fecd-200h.png" class="studentdashboard-thq-rectangle-elm2" />
                        </div>
                        <div class="studentdashboard-thq-group188-elm">
                            <img alt="Frame4573" src="images/frame4573-qvca.svg" class="studentdashboard-thq-frame-elm2" />
                            <span class="studentdashboard-thq-text-elm41">Polynomials and Polynomial Equations</span>
                            <span class="studentdashboard-thq-text-elm42">0 %</span>
                            <img alt="Rectangle4573" src="images/rectangle4573-64qu-200h.png" class="studentdashboard-thq-rectangle-elm3" />
                        </div>
                        <div class="studentdashboard-thq-group189-elm">
                            <img alt="Frame4573" src="images/frame4573-ik8g.svg" class="studentdashboard-thq-frame-elm3" />
                            <span class="studentdashboard-thq-text-elm43">Advanced Equations and Functions</span>
                            <span class="studentdashboard-thq-text-elm44">0 %</span>
                            <img alt="Rectangle4573" src="images/rectangle4573-dq2-200h.png" class="studentdashboard-thq-rectangle-elm4" />
                        </div>
                    </div>
                </div>
            </div>
            <a href="https://play.teleporthq.io/signup" class="studentdashboard-link">
                <div aria-label="Sign up to TeleportHQ" class="studentdashboard-container3">
                    <svg width="24" height="24" viewBox="0 0 19 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="studentdashboard-icon1">
                        <path d="M9.1017 4.64355H2.17867C0.711684 4.64355 -0.477539 5.79975 -0.477539 7.22599V13.9567C-0.477539 15.3829 0.711684 16.5391 2.17867 16.5391H9.1017C10.5687 16.5391 11.7579 15.3829 11.7579 13.9567V7.22599C11.7579 5.79975 10.5687 4.64355 9.1017 4.64355Z" fill="#B23ADE"></path>
                        <path d="M10.9733 12.7878C14.4208 12.7878 17.2156 10.0706 17.2156 6.71886C17.2156 3.3671 14.4208 0.649963 10.9733 0.649963C7.52573 0.649963 4.73096 3.3671 4.73096 6.71886C4.73096 10.0706 7.52573 12.7878 10.9733 12.7878Z" fill="#FF5C5C"></path>
                        <path d="M17.7373 13.3654C19.1497 14.1588 19.1497 15.4634 17.7373 16.2493L10.0865 20.5387C8.67402 21.332 7.51855 20.6836 7.51855 19.0968V10.5141C7.51855 8.92916 8.67402 8.2807 10.0865 9.07221L17.7373 13.3654Z" fill="#2874DE"></path>
                    </svg>
                    <span class="studentdashboard-text">Built in TeleportHQ</span>
                </div>
            </a>
        </div>
        <link rel="canonical" href="https://glennpogi-vz386g.teleporthq.app/" />
    </div>
</body>
</html>