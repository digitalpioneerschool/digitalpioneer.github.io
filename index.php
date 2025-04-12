<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Digital Pioneer Training Institute</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/kTcVt2+2XzU/4ROuQ0bX4gH1/fQTx5y8wO7pQypc1/0wco8gAyPiYI4eD76sO+HqzU6o7N9IPc5xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
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

        a {
            text-decoration: none;
            color: inherit;
        }

        h1, h2, h3 {
            color: #1E3A8A;
        }

        .header {
            background: linear-gradient(to right, #1E3A8A, #0F172A);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-area img {
            height: 50px;
            border-radius: 50%;
            background: white;
            padding: 3px;
        }

        .logo-area h1 {
            font-size: 1.5em;
            margin-bottom: 2px;
            color: white;
        }

        .logo-area small {
            color: #FBBF24;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-links a {
            font-weight: 600;
            color: #FBBF24;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .login-button {
            padding: 8px 16px;
            background: #FBBF24;
            color: #1E3A8A;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hero {
            background: url('images/ict.jpg') center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 100px 20px;
            position: relative;
        }

        .hero::before {
            content: none;
        }

        .hero h1, .hero p, .cta-button {
            position: relative;
            z-index: 2;
            padding-left: 60px;
        }

        .hero h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.1em;
            max-width: 600px;
            margin: 0 auto;
            background: linear-gradient(to right, rgba(30, 58, 138, 0.8), rgba(15, 23, 42, 0.8));
            padding: 10px;
            border-radius: 5px;
            color: #FBBF24;
        }

        .cta-button {
            margin-top: 20px;
            display: inline-block;
            padding: 12px 25px;
            background-color: #FBBF24;
            color: #1E3A8A;
            border-radius: 5px;
            font-weight: bold;
        }

        .info-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 20px;
        }

        .info-card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: linear-gradient(to right, #1E3A8A, #0F172A);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .info-card.email {
            width: 300px;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
        }

        .info-card i {
            font-size: 2em;
            margin-bottom: 10px;
            color: #1E3A8A;
        }

        .info-card h3 {
            margin-bottom: 5px;
            color: #1E3A8A;
        }

        .info-card p {
            margin: 0 15px;
        }

        .courses {
            background: #f8fafc;
            padding: 40px 20px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .course-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .course-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .course-card h3 {
            padding: 10px 15px 5px;
        }

        .course-card p {
            padding: 0 15px 10px;
            font-size: 0.9em;
            color: #555;
        }

        .course-card a {
            display: block;
            margin: 0 15px 15px;
            padding: 10px;
            text-align: center;
            background: #1E3A8A;
            color: white;
            border-radius: 5px;
        }

        footer {
            background: #1E3A8A;
            color: white;
            padding: 20px 10px;
            text-align: center;
        }

        footer p {
            font-size: 0.85em;
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

            .hero {
                text-align: center;
                padding: 20px;
            }

            .course-grid {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .info-card {
                padding: 20px;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.6);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-area">
            <img src="images/school-logo.jpg" alt="Logo">
            <div>
                <h1>Digital Pioneer Training Institute</h1>
                <small>Leading Innovation in Skills-Based Training</small>
            </div>
        </div>
        <nav class="nav-links">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="courses.php">Courses</a>
            <a href="application.php">Apply</a>
            <a href="contact.php">Contact</a>
            <a href="gallery.php">Gallery</a>
            <button class="login-button" onclick="document.getElementById('loginModal').style.display='block'">Login</button>
        </nav>
    </header>

    <section class="hero">
        <h1>Empowering Futures</h1>
        <p>At our Schools of Health Sciences, Business, ICT & Computer Sciences, and Journalism & Mass Communication, we turn raw talent into real-world game-changers.</p>
        <a href="application.php" class="cta-button">Apply Now</a>
    </section>

    <section class="courses">
        <h2 style="text-align: center; margin-bottom: 30px;">Featured Courses</h2>
        <div class="course-grid">
            <div class="course-card">
                <img src="images/digital-marketing.jpg" alt="School of Business">
                <h3>School of Business</h3>
                <p>Develop leadership and strategic management skills.</p>
                <a href="courses.php">Learn More</a>
            </div>
            <div class="course-card">
                <img src="images/health-care-assistant.jpg" alt="School of Health Sciences">
                <h3>School of Health Sciences</h3>
                <p>Train for a career in healthcare and patient support.</p>
                <a href="courses.php">Learn More</a>
            </div>
            <div class="course-card">
                <img src="images/web-development.jpg" alt="School of ICT and Computer Sciences">
                <h3>School of ICT and Computer Sciences</h3>
                <p>Learn to design and develop cutting-edge technology.</p>
                <a href="courses.php">Learn More</a>
            </div>
            <div class="course-card">
                <img src="images/journalism.jpeg" alt="School of Journalism, Media and Mass Communication">
                <h3>School of Journalism, Media and Mass Communication</h3>
                <p>Master the art of storytelling and media production.</p>
                <a href="courses.php">Learn More</a>
            </div>
        </div>
    </section>

    <section class="info-grid">
        <div class="info-card" onclick="window.location.href='https://www.google.com/maps/place/Ruaka,+Nairobi'">
            <p><i class="fas fa-map-marker-alt"></i> 📍 Ruaka, Nairobi</p>
        </div>
        <div class="info-card" onclick="window.location.href='tel:+254713093046'">
            <p><i class="fas fa-phone"></i> 📞 +254 713 093 046</p>
        </div>
        <div class="info-card" onclick="window.location.href='mailto:digitalpioneertraininginstitut@gmail.com'">
            <p><i class="fas fa-envelope"></i> ✉️ digitalpioneertraininginstitut@gmail.com</p>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <h2 style="color:#1E3A8A; text-align:center;">Login</h2>
            <form method="POST" action="login.php">
                <label for="username">Username</label>
                <input type="text" name="username" required style="width:100%; margin-bottom:10px;">
                <label for="password">Password</label>
                <input type="password" name="password" required style="width:100%; margin-bottom:15px;">
                <button type="submit" class="login-button" style="width:100%;">Login</button>
            </form>
        </div>
    </div>

    <script>
        window.onclick = function(event) {
            const modal = document.getElementById('loginModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        document.querySelector('.login-button').addEventListener('click', function() {
            // Assuming login validation is successful
            window.location.href = '/school_portal/admin/dashboard.php';
        });
    </script>
</body>
</html>
