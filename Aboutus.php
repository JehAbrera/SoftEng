<?php
session_start();
$_SESSION['isLoggedIn'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleAboutus.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>About us</title>
</head>

<body>
    <div class="content-wrapper">
        <!-- Reusable Nav -->
        <nav class="nav-wrapper">
            <div class="navicon-wrapper">
                <div class="icon-container">
                    <i class="fa-solid fa-church"></i> SJCP
                </div>
            </div>
            <div class="nav-content">
                <div class="top-icon" onclick="triggerSideNav()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="nav-item">Home</div>
                <div class="nav-item">FAQs</div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">View Services</div>
                        <div class="nav-item">Set Appointment</div>
                        <div class="nav-item">View Appointment</div>
                        <div class="nav-item">Search Record</div>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <span class="dp-title">Events <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">Announcements</div>
                        <div class="nav-item">Calendar</div>
                    </div>
                </div>
                <div class="nav-item active">About Us</div>
                <?php
                if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                    echo '<div class="nav-item">Login</div>';
                } else if ($_SESSION['isLoggedIn'] == true) {
                    echo '<div class="nav-item dropdown">' ?>
                    <span class="dp-title">Profile <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item">Profile</div>
                        <div class="nav-item">Log-Out</div>
                    </div>
                <?php '</div>';
                }
                ?>
            </div>
        </nav>
        <!-- Filler Body - No need to Copy -->
        <div class="main-body-wrapper">
            <section class="main-content-start" style="background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/aboutus3.jpg) center/cover no-repeat;">
                <div class ="content-history">
                    <h3>HISTORY</h3>
                    <p> The Parish of Saint John of the Cross, established on March 18, 1992, encompasses Barangays Pembo and Rizal in Makati. 
                        The church was located on the corner of Hasmin and Sampaguita Streets in Pembo. 
                        On July 30, 1999 a parish resolution affecting the start of the construction of a new Parish Church was passed and approved 
                        by the members of the Parish Pastoral Council, and the cornerstone was laid on August 2, 1999, with the presence of His Eminence Jaime Cardinal Sin, 
                        Archbishop of Manila. The parish, originating in the 1950’s with members of the Scout Rangers Regiment, 
                        evolved from Panther's Enlisted Men's Barrio (PEMBO) into the largest barrio in Fort Bonifacio by the 1960s. 
                        Initially part of Mater Dolorosa Parish in 1987 brought significant changes to the community.
                    </p>
                </div>
            </section>
            <hr>
            <section class="main-content-end" >
                <div class ="content-history">
                    <h3>HISTORY</h3>
                    <p> PEMBO, COMEMBO and EAST REMBO were included in the territory of the new Parish. 
                        The new Parish was placed under the care of Amigonian fathers and Brothers with Rev. Fr. Donato Gatto as its first Parish Priest. 
                        PEMBO became the Chaplaincy of Saint Joseph the Worker in 1991. The conversion to the Parish of Saint John of 
                        the Cross took place on March 18, 1992, with Fr. Fernando S. Canicula as the appointed  parish priest on March 24, 1992. 
                        In October 1996, the Basic Ecclesial Communities were formed in the parish. The first street mass was held on December 4 of the same year. 
                        Over the years (1992-2000), the parish witnessed the initiation of various religious practices, celebrations, and activities, including the 
                        formation of Basic Ecclesial Communities and participation in World Youth Day. 
                    </p>
                </div>
            </section>
            <hr>
            <section class="main-content-start" style="background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(images/aboutus4.jpg) center/cover no-repeat;">
                <div class ="content-history">
                    <h3>HISTORY</h3>
                    <p> In 1996, PEMBO was split into two barangays—PEMBO and RIZAL—while a change in leadership occurred on August 15, 1998, with Rev. Fr. Andy Ortega Lim succeeding Fr. Canicula. 
                            The parish continued to evolve with the formulation and approval of Mission and Vision Statements in June 1999. 
                            The year of the Jubilee was welcomed with great hopes by our parish. Various events in the Jubilee year were attended and participated by the people. 
                            It was also the start of the submission of plans and calendar of activities for the entire year. In 2000, it  brought several memorable events, including fundraising projects, 
                            the visit of the Jubilee Cross, and the formation of the Charismatic Movement, showcasing the vibrant growth and development of the Parish of Saint John of the Cross.
                    </p>
                </div>
            </section>
            <section class = "main-content-priest">
                <div class = "content-priest">
                    <div class = "priest-img-cont"> <img src="images/FR.jpg" alt="priest" width="100%"></div>
                    <div class = "priest-desc-cont">
                        <h2> About the priest</h2>
                        <p>Rev. Fr. Clarito "Charlie" M. Jundis started preaching at St. John of the Cross Parish on November 23, 2022. 
                            Before preaching at there, he was preaching in America where started his journey of priesthood back in 1978.
                             He has been a priest for 46 years and is a builder, responsible for constructing the beautiful church of 
                             Sto. Niño de Taguig Parish. He is the first priest to initiate the construction of the church and is the founder 
                             of Sto. Niño de Taguig Catholic Church. 
                        </p>
                    </div>
                </div>
            </section>
            <section class="main-content-map">
                <div class = "content-map">
                    <div>
                        <h2> Map (Google Maps)</h2>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.952147477856!2d121.05812207465668!3d14.544729178442969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c893b4f02ca1%3A0x571d8fe4a87168cf!2s9%20Sampaguita%20St%2C%20Taguig%2C%201218%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1700128810775!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </div>
        
        <!-- Reusable Footer -->
        <footer class="footer-wrapper">
            <div class="footer-logo">
                <div class="footer-logowrap">
                    <i class="fa-solid fa-church"></i> SJCP
                </div>
                <div class="footer-addwrap">
                    <span>Catholic Rectory, 9 Sampaguita St, Taguig, 1218 Kalakhang Maynila</span>
                    <span><i class="fa-solid fa-copyright"></i>All rights reserved.</span>
                </div>
            </div>
            <div class="footer-contact">
                <div class="foot-item">
                    <div class="foot-icon">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="foot-info">
                        <span>St. John of the Cross Parish Pembo</span>
                    </div>
                </div>
                <div class="foot-item">
                    <div class="foot-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="foot-info">
                        <span>Contact Number: 8527-7925</span>
                    </div>
                </div>
                <div class="foot-item">
                    <div class="foot-icon">
                        <i class="fa-solid fa-fax"></i>
                    </div>
                    <div class="foot-info">
                        <span>Fax: 7799-5429</span>
                    </div>
                </div>
                <div class="foot-item">
                    <div class="foot-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="foot-info">
                        <span>stjohn_ofthecrosspembo@yahoo.com</span>
                        <span>juandelacruzpembo@gmail.com</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="reuse.js"></script>
</body>

</html>