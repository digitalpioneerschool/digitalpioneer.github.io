<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About Us - Digital Pioneer Training Institute</title>
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

        /* ===== CONTENT SECTION ===== */
        .content-section {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .content-section h2 {
            color: #1E3A8A;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .content-section p {
            margin-bottom: 15px;
            font-size: 1.1em;
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

            .about-section {
                grid-template-columns: 1fr;
            }

            .about-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .about-content {
                padding: 20px;
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

    <main>
        <section class="content-section">
            <h2>About Us</h2>
            <p>Welcome to Digital Pioneer Training Institute, where we equip learners with practical skills for the modern workforce. Located in Ruaka, Nairobi, we bridge the gap between education and employability.</p>
            <p>Our specialized programs include:</p>
            <ul>
                <li>School of Health Sciences – Compassionate healthcare training.</li>
                <li>School of Business – Innovative leadership and entrepreneurship.</li>
                <li>School of ICT & Computer Sciences – Cutting-edge tech skills.</li>
                <li>School of Journalism & Mass Communication – Modern media expertise.</li>
            </ul>
            <p>We blend academic excellence with real-world experience, guided by passionate educators and industry experts.</p>
            <h3>Our Mission</h3>
            <p>To nurture adaptable professionals through skill-based training.</p>
            <h3>Our Vision</h3>
            <p>To be a leading center of excellence in career-focused education.</p>
            <h3>Why Choose Us?</h3>
            <ul>
                <li>Industry-aligned curriculum</li>
                <li>Qualified lecturers</li>
                <li>Affordable programs</li>
                <li>State-of-the-art tools</li>
                <li>Inclusive campus environment</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>
</body>
</html> 