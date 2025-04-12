<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application - Digital Pioneer Training Institute</title>
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
            background-color: #f9fbfc;
            color: #2c3e50;
            line-height: 1.7;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
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

        main {
            flex: 1;
            padding: 40px 20px;
            background: linear-gradient(to bottom right, #f0f4f8, #ffffff);
        }

        .application-form {
            max-width: 850px;
            margin: 0 auto;
            padding: 35px 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
            text-align: left;
            animation: fadeIn 0.8s ease-in-out;
        }

        .application-form h2 {
            font-size: 2rem;
            color: #1E3A8A;
            text-align: center;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .application-form h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #FBBF24;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 1;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #1e293b;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background: #fdfdfd;
            color: #1e293b;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #aaa;
            transition: color 0.3s ease;
        }

        .form-group input:focus::placeholder,
        .form-group textarea:focus::placeholder {
            color: transparent;
        }

        .submit-btn {
            background-color: #1E3A8A;
            color: white;
            border: none;
            padding: 14px 0;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background-color: #FBBF24;
            color: #1E3A8A;
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
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

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: center;
                padding: 10px;
            }

            .logo-area {
                flex-direction: row;
                align-items: center;
                gap: 10px;
            }

            .nav-links {
                flex-direction: row;
                justify-content: center;
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav-links a {
                font-size: 0.8rem;
                padding: 5px 10px;
            }

            .application-form {
                padding: 20px;
            }

            .form-row {
                flex-direction: column;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .submit-btn {
                width: 100%;
            }
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
        </nav>
    </header>

    <main>
        <section class="application-section">
            <div class="application-form">
                <h2>Course Application Form</h2>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-error">
                        <?php 
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>
                <form action="process_application.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" required placeholder="Enter your full name"
                                   value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required placeholder="Enter your email"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number"
                               value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="course">Select Course</label>
                        <select id="course" name="course" required>
                            <option value="">Choose a course...</option>
                            <optgroup label="School of Health Sciences">
                                <option value="health_care_assistant">Health Care Assistant</option>
                                <option value="nursing_assistant">Nursing Assistant / Certified Nurse Assistant (CNA)</option>
                                <option value="medical_office_assistant">Medical Office Assistant</option>
                                <option value="medical_admin_assistant">Medical Administrative Assistant</option>
                                <option value="pharmacy_technician">Pharmacy Technician</option>
                                <option value="patient_care_technician">Patient Care Technician</option>
                                <option value="medical_billing_coding">Medical Billing & Coding</option>
                                <option value="dental_assistant">Dental Assistant</option>
                            </optgroup>
                            <optgroup label="School of Business & Administration">
                                <option value="business_administration">Business Administration</option>
                                <option value="office_administration">Office Administration</option>
                                <option value="accounting_quickbooks">Accounting with QuickBooks</option>
                                <option value="bookkeeping">Bookkeeping</option>
                                <option value="project_management">Project Management</option>
                                <option value="human_resources_management">Human Resources Management</option>
                                <option value="customer_service">Customer Service</option>
                                <option value="data_entry_specialist">Data Entry Specialist</option>
                            </optgroup>
                            <optgroup label="School of ICT & Computer Sciences">
                                <option value="web_development">Web Development</option>
                                <option value="graphic_design">Graphic Design</option>
                                <option value="ui_ux_design">UI/UX Design</option>
                                <option value="digital_marketing">Digital Marketing</option>
                                <option value="social_media_management">Social Media Management</option>
                                <option value="seo">Search Engine Optimization (SEO)</option>
                                <option value="content_writing">Content Writing</option>
                                <option value="video_editing">Video Editing</option>
                                <option value="programming_java">Programming in Java</option>
                                <option value="data_analysis_spss">Data Analysis with SPSS</option>
                                <option value="advanced_excel_financial_modeling">Advanced Excel & Financial Modeling</option>
                                <option value="cybersecurity">Cybersecurity</option>
                                <option value="computer_repair_maintenance">Computer Repair & Maintenance</option>
                                <option value="network_administration">Network Administration</option>
                                <option value="database_management">Database Management</option>
                                <option value="mobile_app_development">Mobile App Development</option>
                                <option value="cloud_computing">Cloud Computing</option>
                                <option value="software_testing">Software Testing</option>
                                <option value="it_support_specialist">IT Support Specialist</option>
                            </optgroup>
                            <optgroup label="School of Journalism & Mass Communication">
                                <option value="digital_content_creation">Digital Content Creation</option>
                                <option value="media_production">Media Production</option>
                                <option value="broadcast_journalism">Broadcast Journalism</option>
                                <option value="photography_videography">Photography & Videography</option>
                                <option value="podcasting_storytelling">Podcasting & Storytelling</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Additional Information</label>
                        <textarea id="message" name="message" placeholder="Any additional info you'd like to share..."><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="documents">Additional Documents</label>
                        <input type="file" id="documents" name="documents[]" multiple required>
                    </div>
                    <button type="submit" class="submit-btn">Submit Application</button>
                </form>
            </div>
        </section>
    </main>

    <script>
        function validateForm() {
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            const course = document.getElementById('course').value;

            if (!/^[\d\s\-+()]{10,}$/.test(phone)) {
                alert('Please enter a valid phone number');
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert('Please enter a valid email address');
                return false;
            }

            if (course === '') {
                alert('Please select a course');
                return false;
            }

            return true;
        }
    </script>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Digital Pioneer Training Institute. All rights reserved.</p>
    </footer>
</body>
</html> 