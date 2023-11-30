<?php
session_start();
$_SESSION['isLoggedIn'] = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleServices.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>View Services</title>
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
                    <span class="nav-item.active">Services <i class="fa-solid fa-angle-down"></i></span>
                    <div class="dropdown-content">
                        <div class="nav-item active">View Services</div>
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
                <div class="nav-item">About Us</div>
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
            <section class="main-content"> 
                <div class="main-content-title"> 
                    <h1> Church Services </h1>
                </div> 
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                    <div class="services-title" onclick="triggerServicesContent(service1)"> 
                        <h2>Private Wedding </h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service1" style="background: url(images/privatewed.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>Tuesday to Saturday (9:00 AM, 10:30 AM, 2:00 PM, 3:30 PM)</p>
                            <br>
                            <h3> Basic Requirements(Groom and Bride): </h3>
                            <p> 1. PSA birth certificate (Photocopy) 
                                <br>2. 2x2 ID picture  
                                <br>3. CENOMAR (Certificate of No Marriage - Photocopy)
                                <br>4. Baptismal Certificate (Original Copy) - with validity of 4 months prior to wedding and bears the notation "FOR MARRIAGE PURPOSES."
                                <br>5. Confirmation Certificate (Original Copy) - with validity of 4 months prior to wedding and bears the notation "FOR MARRIAGE PURPOSES."
                                <br>6. Publication of Wedding Banns - posted for 3 consecutive Sundays in the parishes where the couple resides.
                                <br>7. Pre-Cana Seminar - Every last Saturday of the month from 8:00 AM – 5:00 PM @ SJCP Conference Room
                                <br>8. Marriage License - from the City or Municipal Hall
                                <br>9. Marriage Contract for Civilly Married (Photocopy)
                                <br>10. Live-In License - for more than 5 years Live-In Couple – from City Hall
                                <br>11. Wedding Interview - to be scheduled and conducted by the SJCP Priest
                                <br>12. Confession
                                <br>13. Long Brown Envelope
                            </p>
                            <br>
                            <h3> Wedding Package: </h3>
                            <p> -Eucharist (Wedding Mass)
                                <br>-Tulle Decor (In the Sanctuary [Altar] and 10 pots along the nave)
                                <br>-Altar Candles (for candle sponsors)
                                <br>-Red Carpet
                                <br>-Choir (Mass and Pictorial)
                                <br>-Lighted Chandeliers
                                <br>-Availability of Church Staff as Wedding Coordinator
                                <br>-Use of Church for 1 Hour and 15 minutes
                                <br>-Civil Registration of Marriage Contract
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service2)"> 
                        <h2>Mass Wedding </h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service2" style="background: url(images/masswed.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>To be announced</p>
                            <br>
                            <h3> Requirements for Mass Wedding: </h3>
                            <p> 1. PSA birth certificate (Photocopy) 
                                <br>2. 2x2 ID picture  
                                <br>3. CENOMAR (Certificate of No Marriage - Photocopy)
                                <br>4. Baptismal Certificate (Original Copy) - with validity of 4 months prior to wedding and bears the notation "FOR MARRIAGE PURPOSES."
                                <br>5. Confirmation Certificate (Original Copy) - with validity of 4 months prior to wedding and bears the notation "FOR MARRIAGE PURPOSES."
                                <br>6. Publication of Wedding Banns - posted for 3 consecutive Sundays in the parishes where the couple resides.
                                <br>7. Marriage License(from the City or Municipal Hall) or Marriage Contract for Civilly Married (Photocopy) or Live-In License (for more than 5 years Live-In Couple from the City Hall)
                                <br>8. Long Brown Envelope
                            </p>
                            <br>
                            <h3> Wedding Package: </h3>
                            <p> -Eucharist (Wedding Mass)
                                <br>-Tulle Decor (In the Sanctuary [Altar] and 10 pots along the nave)
                                <br>-Altar Candles (for candle sponsors)
                                <br>-Red Carpet
                                <br>-Choir (Mass and Pictorial)
                                <br>-Lighted Chandeliers
                                <br>-Availability of Church Staff as Wedding Coordinator
                                <br>-Use of Church for 1 Hour and 15 minutes
                                <br>-Civil Registration of Marriage Contract
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service3)"> 
                        <h2>Confirmation (Kumpil) </h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service3" style="background: url(images/kumpil.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>To be announced</p>
                            <br>
                            <h3> Requirements for Confirmation: </h3>
                            <p> 1. PSA birth certificate (Photocopy) 
                            <br>2. Baptismal Certificate (Original Copy)
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service4)"> 
                        <h2>Private Baptism </h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service4" style="background: url(images/solobap.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>Tuesday to Saturday (9 AM, 10 AM, 11 AM, 2 PM, 3 PM - Baptism Ceremony)</p>
                            <br>
                            <h3> Requirements for Private Baptism: </h3>
                            <p> 1. Child’s PSA/LOCAL birth certificate (Photocopy) 
                                <br>2. Marriage Contract of Parents (Photocopy) 
                                <br>3. Seminar (No Seminar, No Baptism)
                                <br>4. Baptismal Donation: Php 3,000.00
                                <br>-Big Candle, Baptismal Cloth, 4 pcs Guide, 2 pcs Small Candle, and Unlimited Sponsors
                            </p>
                            <br>
                            <h3> Note: </h3>
                            <p> -Parents and Sponsors are required to attend the seminar 
                                <br>-White dress or polo and pants for the child
                                <br>-Any colors for the parents and sponsors
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service5)"> 
                        <h2>Mass Baptism </h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service5" style="background: url(images/massbap.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>- Every Sunday Schedule Only</p>
                            <p>- 10:00 AM - Seminar</p>
                            <p>- 11:00 AM - Baptism Ceremony</p>
                            <br>
                            <h3> Requirements for Mass Baptism: </h3>
                            <p> 1. Child’s PSA/LOCAL birth certificate (Photocopy) 
                                <br>2. Marriage Contract of Parents (Photocopy) 
                                <br>3. Seminar (No Seminar, No Baptism)
                                <br>4. Baptismal Donation (Not less than Php 500) - Big Candle, Baptismal Cloth, 4 pcs Guide, 2 pcs Small Candle, 1 Pair of Sponsor
                                <br>-Additional Sponsor: Php 50 per head
                            </p>
                            <br>
                            <h3> Note: </h3>
                            <p> -Parents and Sponsors are required to attend the seminar 
                                <br>-White dress or polo and pants for the child
                                <br>-Any colors for the parents and sponsors
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service6)"> 
                        <h2>Funeral Mass and Funeral Blessing</h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service6" style="background: url(images/funeral.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>8am-1pm, Tuesday-Saturday</p>
                            <br>
                            <h3> Requirements Funeral Mass and Funeral Blessing: </h3>
                            <p> 1. Death certificate (Photocopy) 
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service7)"> 
                        <h2>Mass Intention</h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service7" style="background: url(images/massintention.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>Monday to Friday</p>
                            <p>-6:00 PM</p>
                            <p>Saturday</p>
                            <p>-5:00 PM - San Pancratio Chapel</p>
                            <p>-6:10 PM - Fatima Chapel</p>    
                            <p>-7:15 PM - San Isidro Chapel</p>
                            <p>Sunday</p>
                            <p>-6:00 AM - Tagalog <br>
                                -7:30 AM - English <br>
                                -9:00 AM - Children’s Mass <br>
                                -4:30 PM - Tagalog <br>
                                -5:00 PM - Sto. Nino Chapel <br>
                                -6:00 PM - Youth and Adult Mass <br>
                            </p>
                            <br>
                            <h3> Purposes of Mass Intention: </h3>
                            <p> Thanksgiving
                                <br>Healing and Recovery
                                <br>Special Intention
                                <br>Soul
                            </p>
                            <br>
                            <h3> Note: </h3>
                            <p> -Parents and Sponsors are required to attend the seminar 
                                <br>-White dress or polo and pants for the child
                                <br>-Any colors for the parents and sponsors
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="main-content-body">
                <div class="main-content-services">
                <div class="services-title" onclick="triggerServicesContent(service8)"> 
                        <h2>Blessing</h2> 
                        <div class="services-icon">  
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="services-content" id="service8" style="background: url(images/blessing.jpg)center/cover no-repeat;">
                        <div class="services-row"> 
                            <h3> Schedule: </h3>
                            <p>To bee announced</p>
                            <br>
                            <h3> Types of Blessing: </h3>
                            <p> House Blessing
                                <br>Car Blessing
                                <br>Motorcycle Blessing
                            </p>
                            <br>
                            <h3> Note: </h3>
                            <p> -Parents and Sponsors are required to attend the seminar 
                                <br>-White dress or polo and pants for the child
                                <br>-Any colors for the parents and sponsors
                            </p>
                        </div>
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