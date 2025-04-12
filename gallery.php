<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gallery - Digital Pioneer Training Institute</title>
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

        /* ===== GALLERY SECTION ===== */
        .gallery-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .gallery-section h2 {
            color: #1E3A8A;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(30, 58, 138, 0.9);
            color: white;
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        .gallery-caption h3 {
            margin-bottom: 5px;
            font-size: 1.2em;
        }

        .gallery-caption p {
            font-size: 0.9em;
            opacity: 0.9;
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

            .gallery-section {
                grid-template-columns: 1fr;
            }

            .gallery-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .gallery-content {
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
        <section class="gallery-section">
            <h2>Our Gallery</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="images/Classroom.jpg.jpg" alt="Classroom Session">
                    <div class="gallery-caption">
                        <h3>Classroom Learning</h3>
                        <p>Students engaged in interactive learning sessions</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/Lab.jpg.jpg" alt="Computer Lab">
                    <div class="gallery-caption">
                        <h3>Computer Lab</h3>
                        <p>State-of-the-art facilities for practical training</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/Health practical.jpg.jpg" alt="Health Practical">
                    <div class="gallery-caption">
                        <h3>Health Training</h3>
                        <p>Practical training in healthcare skills</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/Workshop.jpg.jpg" alt="Workshop">
                    <div class="gallery-caption">
                        <h3>Workshop Session</h3>
                        <p>Hands-on training in specialized skills</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/Outdoor arena.jpg.jpg" alt="Outdoor Arena">
                    <div class="gallery-caption">
                        <h3>Outdoor Arena</h3>
                        <p>Modern learning environment</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/Corridor.jpg.jpg" alt="School Corridor">
                    <div class="gallery-caption">
                        <h3>School Facilities</h3>
                        <p>State-of-the-art infrastructure</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/health skills lab.jpg.jpg" alt="Health Skills Lab">
                    <div class="gallery-caption">
                        <h3>Health Skills Lab</h3>
                        <p>Specialized training facilities</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="images/staffroom.jpg.jpg" alt="Staff Room">
                    <div class="gallery-caption">
                        <h3>Staff Facilities</h3>
                        <p>Dedicated spaces for our educators</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>
</body>
</html> 