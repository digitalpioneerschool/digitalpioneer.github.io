<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact Us - Digital Pioneer Training Institute</title>
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

        /* ===== CONTACT SECTION ===== */
        .contact-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .contact-info {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .contact-info h2 {
            color: #1E3A8A;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .contact-details {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            transition: all 0.3s ease;
            animation: slideIn 0.5s ease-in-out;
        }

        .contact-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .contact-item i {
            color: #1E3A8A;
            font-size: 1.5em;
            margin-top: 5px;
        }

        .contact-item h3 {
            color: #1E3A8A;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .contact-item p {
            color: #333;
            margin: 0;
            line-height: 1.5;
        }

        .contact-item div {
            flex: 1;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1E3A8A;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background-color: #1E3A8A;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #FBBF24;
            color: #1E3A8A;
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

            .contact-section {
                grid-template-columns: 1fr;
            }

            .contact-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .contact-form {
                padding: 20px;
            }
        }

        #contact-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        #contact-details h3 {
            color: #1E3A8A;
            margin-bottom: 15px;
            font-size: 1.2em;
            border-bottom: 2px solid #1E3A8A;
            padding-bottom: 5px;
        }

        #contact-details p {
            color: #333;
            margin: 10px 0;
            line-height: 1.5;
            font-size: 1em;
        }

        #contact-details p:first-of-type {
            font-weight: bold;
            color: #1E3A8A;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateX(-20px); }
            to { transform: translateX(0); }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
        <section class="contact-section">
            <div class="contact-form">
                <h2>Send us a Message</h2>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                        <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" style="color: #155724; background-color: #d4edda; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                        <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
                <form action="process_contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>
</body>
</html> 