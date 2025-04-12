<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Digital Pioneer Training Institute</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        /* ===== GENERAL RESET ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f8;
            color: #333;
            line-height: 1.6;
        }

        /* ===== HEADER STYLING ===== */
        .hero-header {
            background: linear-gradient(to right, #1E3A8A, #0F172A);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo-title {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .school-logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: white;
            padding: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .title-text h1 {
            font-size: 1.8em;
            margin-bottom: 5px;
            font-weight: 800;
        }

        .title-text p {
            color: #FBBF24;
            font-weight: 600;
            font-size: 1rem;
            margin: 0;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        nav a {
            color: #FBBF24;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            background-color: rgba(251, 191, 36, 0.1);
            transform: translateY(-2px);
        }

        /* ===== COURSES SECTION ===== */
        .courses-section {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .courses-section h2 {
            color: #1E3A8A;
            margin-bottom: 30px;
            font-size: 2em;
            text-align: center;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .course-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-card h3 {
            color: #1E3A8A;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .course-card p {
            margin-bottom: 20px;
            color: #666;
        }

        .course-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1E3A8A;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .course-btn:hover {
            background-color: #FBBF24;
            color: #1E3A8A;
        }

        .course-card ul {
            list-style: none;
            padding: 0;
        }

        .course-card li {
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
            font-weight: normal;
        }

        .course-card li::after {
            content: attr(data-description);
            position: absolute;
            left: 0;
            top: 100%;
            width: 100%;
            background: white;
            color: #333;
            padding: 5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            display: none;
            z-index: 10;
            font-size: 0.9em;
        }

        .course-card li:hover::after {
            display: block;
        }

        /* ===== FOOTER STYLING ===== */
        footer {
            background-color: #0F172A;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 0.9rem;
        }

        footer a {
            color: #FBBF24;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #1E3A8A;
        }

        @media (max-width: 768px) {
            .hero-header {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }

            .logo-title {
                flex-direction: row;
                align-items: center;
                gap: 10px;
            }

            nav {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
                gap: 5px;
            }

            nav a {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            .courses-section {
                grid-template-columns: 1fr;
            }

            .course-card {
                margin-bottom: 20px;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header class="hero-header">
        <div class="logo-title">
            <img src="images/school-logo.jpg" alt="School Logo" class="school-logo">
            <div class="title-text">
                <h1>Digital Pioneer Training Institute</h1>
                <p>Leading Innovation in Skills-Based Training</p>
            </div>
        </div>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="courses.php">Courses</a>
            <a href="application.php">Apply</a>
            <a href="contact.php">Contact</a>
            <a href="gallery.php">Gallery</a>
        </nav>    
    </header>

    <main id="courses-section">
        <section class="course-group">
            <h2>🎓 Our Courses by School</h2>

            <div class="course-grid">
                <div class="course-card">
                    <h3>🩺 School of Health Sciences</h3>
                    <ul>
                        <li data-description="Foundational training in patient care, hygiene, mobility, and basic clinical tasks."><strong>Health Care Assistant</strong></li>
                        <li data-description="Core nursing support skills — vital signs, patient hygiene, bedside care, and infection control."><strong>Nursing Assistant / Certified Nurse Assistant (CNA)</strong></li>
                        <li data-description="Administrative support training for clinics and hospitals: medical records, appointments, patient communication."><strong>Medical Office Assistant</strong></li>
                        <li data-description="Learn clinic management, medical billing, and front-office coordination."><strong>Medical Administrative Assistant</strong></li>
                        <li data-description="Basics of drug dispensing, inventory, and prescription processing."><strong>Pharmacy Technician</strong></li>
                        <li data-description="Advanced patient handling techniques for long-term care, rehab, and hospital support roles."><strong>Patient Care Technician</strong></li>
                        <li data-description="Learn insurance claim processes, diagnostic coding, and health record systems."><strong>Medical Billing & Coding</strong></li>
                        <li data-description="Gain practical knowledge in chair-side support, patient prep, and oral health documentation."><strong>Dental Assistant</strong></li>
                    </ul>
                </div>

                <div class="course-card">
                    <h3>💼 School of Business & Administration</h3>
                    <ul>
                        <li data-description="Manage teams, strategy, operations, and more with this all-rounder business course."><strong>Business Administration</strong></li>
                        <li data-description="Train in clerical duties, communication, scheduling, and workplace etiquette."><strong>Office Administration</strong></li>
                        <li data-description="Master bookkeeping, financial reporting, and operations using QuickBooks software."><strong>Accounting with QuickBooks</strong></li>
                        <li data-description="Track income, expenses, and balance sheets for small businesses."><strong>Bookkeeping</strong></li>
                        <li data-description="Learn how to plan, lead, and execute projects using timelines, budgets, and stakeholder coordination."><strong>Project Management</strong></li>
                        <li data-description="From recruitment to staff development, learn to manage people with professionalism and empathy."><strong>Human Resources Management</strong></li>
                        <li data-description="Build client relations, handle complaints, and create wow-factor experiences."><strong>Customer Service</strong></li>
                        <li data-description="Sharpen your typing, accuracy, and database management skills — perfect for remote work."><strong>Data Entry Specialist</strong></li>
                    </ul>
                </div>

                <div class="course-card">
                    <h3>💻 School of ICT & Computer Sciences</h3>
                    <ul>
                        <li data-description="Build websites using HTML, CSS, JavaScript, WordPress, and UI/UX fundamentals."><strong>Web Development</strong></li>
                        <li data-description="Design like a pro using Adobe Photoshop, Illustrator, and Lightroom."><strong>Graphic Design</strong></li>
                        <li data-description="Learn user-focused design principles to craft clean, intuitive digital experiences."><strong>UI/UX Design</strong></li>
                        <li data-description="Train in SEO, social media, Google Ads, content strategy, and analytics — earn globally recognized certs."><strong>Digital Marketing</strong></li>
                        <li data-description="Grow brands online through content creation, scheduling, engagement, and platform strategy."><strong>Social Media Management</strong></li>
                        <li data-description="Optimize websites to rank high and convert — perfect for digital marketers and freelancers."><strong>Search Engine Optimization (SEO)</strong></li>
                        <li data-description="Learn to craft blogs, product descriptions, and online articles that sell and inform."><strong>Content Writing</strong></li>
                        <li data-description="Create stunning video content using Adobe Premiere Pro and After Effects."><strong>Video Editing</strong></li>
                        <li data-description="Learn object-oriented coding through real-world projects and prep for Oracle Java certification."><strong>Programming in Java</strong></li>
                        <li data-description="Analyze large datasets, interpret statistics, and create research-ready reports."><strong>Data Analysis with SPSS</strong></li>
                        <li data-description="Dashboards, formulas, pivot tables — master Excel for business and analytics."><strong>Advanced Excel & Financial Modeling</strong></li>
                        <li data-description="Train in ethical hacking, threat analysis, penetration testing, and security risk management."><strong>Cybersecurity</strong></li>
                        <li data-description="Diagnose and fix PCs, laptops, and peripherals — a hands-on tech career starter."><strong>Computer Repair & Maintenance</strong></li>
                        <li data-description="Set up and manage LANs, routers, switches, and basic network security."><strong>Network Administration</strong></li>
                        <li data-description="Learn how to organize, manage, and secure data using modern database systems."><strong>Database Management</strong></li>
                        <li data-description="Create Android and iOS apps using cross-platform tools and coding logic."><strong>Mobile App Development</strong></li>
                        <li data-description="Understand cloud infrastructure, virtual machines, and SaaS platforms."><strong>Cloud Computing</strong></li>
                        <li data-description="Learn QA processes, bug tracking, and testing automation — vital for development teams."><strong>Software Testing</strong></li>
                        <li data-description="Troubleshoot hardware, software, and user issues in real-time — a solid entry into the tech industry."><strong>IT Support Specialist</strong></li>
                    </ul>
                </div>

                <div class="course-card">
                    <h3>📸 School of Journalism & Mass Communication</h3>
                    <ul>
                        <li data-description=""><strong>Digital Content Creation</strong></li>
                        <li data-description=""><strong>Media Production</strong></li>
                        <li data-description=""><strong>Broadcast Journalism</strong></li>
                        <li data-description=""><strong>Photography & Videography</strong></li>
                        <li data-description=""><strong>Podcasting & Storytelling</strong></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>
</body>
</html> 