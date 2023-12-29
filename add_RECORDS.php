<?php
session_start();
require 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleADDREC.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>The SJCP - Records</title>
    <link rel="icon" type="image/png" href="tabicon.png">
    </script>
</head>

<body>
    <div class="content-wrapper">
        <!-- Nav Wrapper -->
        <!-- Add active class on active button of current page -->
        <div class="nav-wrapper">
            <div class="icon-wrapper">
                <i class="fa-solid fa-church"></i> SJCP
            </div>
            <div class="nav-items">
                <button>Dashboard</button>
                <button>Add Announcement</button>
                <button class="active-btn">Records</button>
                <button>Appointments</button>
                <button>Log-out</button>
            </div>
        </div>

        <!-- Main Content Wrapper -->
        <div class="main-content">
            <?php if (!isset($_GET['page'])) { ?>
                <div class="opt-area">
                    <button onclick="location.href = '?page=Baptism'">Baptism</button>
                    <button onclick="location.href = '?page=Confirmation'">Confirmation</button>
                    <button onclick="location.href = '?page=Wedding'">Wedding</button>
                    <button onclick="location.href = '?page=Funeral'">Funeral</button>
                </div>
            <?php } else if (isset($_GET['page'])) { ?>
                <form action="" method="post">
                    <button type="button" onclick="location.href = '?'" class="backbtn">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <?php if ($_GET['page'] == 'Baptism') { ?>
                        <!--BAPTISM FORM-->
                        <div class="form-title">
                            To be baptized's information
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="lastName">Last Name* </label>
                                    <input type="text" id="lastName" name="lastName" maxlength="40" placeholder="Dela Cruz" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="firstName">First Name* </label>
                                    <input type="text" id="firstName" name="firstName" maxlength="40" placeholder="Juan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="middleName">Middle Name </label>
                                    <input type="text" id="middleName" name="middleName" maxlength="40" placeholder="Tomas" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div>
                                <b>Gender*</b>
                                <div style="display: flex">
                                    <div>
                                        <input type="radio" id="genderMale" name="gender" value="Male" required>
                                        <label for="genderMale">Male </label> <br>
                                    </div>
                                    <div>
                                        <input type="radio" id="genderFemale" name="gender" value="Female" required>
                                        <label for="genderFemale">Female </label> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="dob"><strong>Birth Date*</strong> </label>
                                <input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" required><br>
                            </div>
                            <div class="input-box">
                                <label for="pob"><strong>Birth Place*</strong> </label>
                                <input type="text" id="pob" name="pob" maxlength="120" placeholder="Taguig City" required><br>
                            </div>
                        </div>
                        <div>
                            <div class="input-box">
                                <label for="address"><strong>Present Address*</strong> </label>
                                <input type="text" id="address" name="address" maxlength="120" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" required><br>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="fatherName"><strong>Father's Name*</strong> </label>
                                <input type="text" id="fatherName" name="fatherName" maxlength="100" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="fatherPob"><strong>Father's Birth Place*</strong> </label>
                                <input type="text" id="fatherPob" name="fatherPob" maxlength="120" placeholder="Taguig City" required><br>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="motherName"><strong>Mother's Maiden Name*</strong> </label>
                                <input type="text" id="motherName" name="motherName" maxlength="100" placeholder="Maria Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="motherPob"><strong>Mother's Birth Place*</strong> </label>
                                <input type="text" id="motherPob" name="motherPob" maxlength="120" placeholder="Makati City" required><br>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="contactNum"><strong>Parent/Guardian's Contact Number*</strong></label>
                                <div class="contactnum">
                                    <input type="text" name="mobile1" value="+63" id="" readonly>
                                    <input type="tel" id="contactNum" name="contactNum" maxlength="10" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="9123456789" pattern="[9]{1}[0-9]{9}" required><br>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="marriage_type"><strong>Parents' Type of Marriage*</strong> </label>
                                <select id="marriage_type" name="marriage_type">
                                    <option value="default" disabled selected hidden></option>
                                    <option value="Catholic Marriage" title="Catholic Marriage = married in church and officiated by a priest">Catholic Marriage</option>
                                    <option value="Civil Marriage" title="Civil Marriage = married in court and officiated by a lawyer">Civil Marriage</option>
                                </select>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="godfatherName"><strong>Godfather's Name*</strong> </label>
                                <input type="text" id="godfatherName" name="godfatherName" placeholder="Francis Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="godfatherAddress"><strong>Godfather's Address*</strong> </label>
                                <input type="text" id="godfatherAddress" name="godfatherAddress" placeholder="Taguig City" maxlength="120" required><br>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="godmotherName"><strong>Godmother's Name*</strong></label>
                                <input type="text" id="godmotherName" name="godmotherName" maxlength="100" placeholder="Teresa Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="godmotherAddress"><strong>Godmother's Address*</strong></label>
                                <input type="text" id="godmotherAddress" name="godmotherAddress" placeholder="Makati City" maxlength="120" required><br>
                            </div>
                        </div>
                    <?php } else if ($_GET['page'] == 'Confirmation') { ?>
                        <!--CONFIRMATION FORM-->
                        <div class="form-title">
                            Confirmant's Name
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="lastName">Last Name* </label>
                                    <input type="text" id="lastName" name="lastName" placeholder="San Pedro" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="firstName">First Name* </label>
                                    <input type="text" id="firstName" name="firstName" placeholder="Juana" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="middleName">Middle Name </label>
                                    <input type="text" id="middleName" name="middleName" placeholder="Agustin" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="dob"><strong>Birth Date*</strong> </label>
                                    <input type="date" id="dob" name="dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="age"><strong>Age*</strong> </label>
                                    <input type="num" id="age" name="age" min="0" placeholder="30" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" max="120" maxlength="3" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="pob"><strong>Birth Place*</strong> </label>
                                    <input type="text" id="pob" name="pob" maxlength="120" placeholder="Taguig City" required><br>
                                </div>
                            </div>
                            <div class="form-grid-cont">
                                <div>
                                    <b>Gender*</b>
                                    <div style="display: flex">
                                        <div>
                                            <input type="radio" id="genderMale" name="gender" value="Male" required>
                                            <label for="genderMale">Male </label> <br>
                                        </div>
                                        <div>
                                            <input type="radio" id="genderFemale" name="gender" value="Female" required>
                                            <label for="genderFemale">Female </label> <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label for="placeBap"><strong>Place of Baptism*</strong> </label>
                                    <input type="text" id="placeBap" name="placeBap" maxlength="120" placeholder="Taguig City" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="dateBap"><strong>Date of Baptism*</strong></label>
                                    <input type="date" name="dateBap" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-1 month')); ?>" required><br>
                                </div>
                            </div>
                            <div class="grid-cont">
                                <div class="input-box">
                                    <label for="address"><strong>Present Address*</strong> </label>
                                    <input type="text" id="address" name="address" maxlength="120" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="contactNum"><strong>Contact Number*</strong></label>
                                    <div class="contactnum">
                                        <input type="text" name="mobile1" value="+63" id="" disabled>
                                        <input type="tel" id="contactNum" name="informantContactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-cont">
                                <div class="input-box">
                                    <label for="fathName"><strong>Father's Name* </strong> </label>
                                    <input type="text" id="fathName" name="fathName" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="mothName"><strong>Mother's Maiden Name* </strong> </label>
                                    <input type="text" id="mothName" name="mothName" placeholder="Maria Tomas" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                            </div>
                            <div class="grid-cont">
                                <div class="input-box">
                                    <label for="godfatherName"><strong>Godfather's Name*</strong> </label>
                                    <input type="text" id="godfatherName" name="godfatherName" placeholder="Francis Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="godmotherName"><strong>Godmother's Name*</strong></label>
                                    <input type="text" id="godmotherName" name="godmotherName" maxlength="100" placeholder="Teresa Tomas" title="Format: FirstName LastName" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($_GET['page'] == 'Wedding') { ?>
                        <!--WEDDING FORM-->
                        <div class="form-title">
                            Groom's Information
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="groom_lastName"><strong>Last Name* </strong></label>
                                    <input type="text" id="groom_lastName" name="groom_lastName" placeholder="Dela Cruz" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="groom_firstName"><strong>First Name* </strong></label>
                                    <input type="text" id="groom_firstName" name="groom_firstName" placeholder="Juan" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="groom_middleName"><strong>Middle Name </strong></label>
                                    <input type="text" id="groom_middleName" name="groom_middleName" placeholder="Tomas" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div class="input-box">
                                <label for="groom_contactNum"><strong>Contact Number* </strong></label>
                                <div class="contactnum">
                                    <input type="text" name="mobile1" value="+63" id="" disabled>
                                    <input type="tel" id="groom_contactNum" name="groom_contactNum" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="10" pattern="[9]{1}[0-9]{9}" required><br>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="groom_dob"><strong>Birth Date* </strong></label>
                                <input type="date" id="groom_dob" name="groom_dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" required><br>
                            </div>
                            <div class="input-box">
                                <label for="groom_pob"><strong>Birth Place* </strong> </label>
                                <input type="text" id="groom_pob" name="groom_pob" placeholder="Taguig City" maxlength="120" required><br>
                            </div>
                        </div>
                        <div>
                            <div class="input-box">
                                <label for="groom_address"><strong>Present Address* </strong> </label>
                                <input type="text" id="groom_address" name="groom_address" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div class="input-box">
                                <label for="groom_fatherName"><strong>Father's Name* </strong> </label>
                                <input type="text" id="groom_fatherName" name="groom_fatherName" placeholder="Joseph Dela Cruz" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="groom_motherName"><strong>Mother's Maiden Name* </strong> </label>
                                <input type="text" id="groom_motherName" name="groom_motherName" placeholder="Maria Tomas" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="groom_religion"><strong>Religion* </strong> </label>
                                <select id="groom_religion" name="groom_religion">
                                    <option value="" disabled selected hidden>Select Religion</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Catholic">Catholic</option>
                                    <option value="Protestant">Protestant</option>
                                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                    <option value="Jehovah&lsquo;s Witness">Jehovah&lsquo;s Witness</option>
                                    <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                                    <option value="Islam">Islam</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-title">
                            Bride's Information
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="bride_lastName"><strong>Last Name* </strong></label>
                                    <input type="text" id="bride_lastName" name="bride_lastName" placeholder="San Pedro" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="bride_firstName"><strong>First Name* </strong></label>
                                    <input type="text" id="bride_firstName" name="bride_firstName" placeholder="Juana" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="bride_middleName"><strong>Middle Name </strong></label>
                                    <input type="text" id="bride_middleName" name="bride_middleName" placeholder="Agustin" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div class="input-box">
                                <label for="bride_contactNum"><strong>Contact Number* </strong></label>
                                <div class="contactnum">
                                    <input type="text" name="mobile1" value="+63" id="" disabled>
                                    <input type="tel" id="bride_contactNum" name="bride_contactNum" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength="10" pattern="[9]{1}[0-9]{9}" required><br>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="bride_dob"><strong>Birth Date* </strong></label>
                                <input type="date" id="bride_dob" name="bride_dob" min="<?= date('Y-m-d', strtotime('-100 years')); ?>" max="<?= date('Y-m-d', strtotime('-18 years')); ?>" required><br>
                            </div>
                            <div class="input-box">
                                <label for="bride_pob"><strong>Birth Place* </strong> </label>
                                <input type="text" id="bride_pob" name="bride_pob" maxlength="120" placeholder="Taguig City" required><br>
                            </div>
                        </div>
                        <div>
                            <div class="input-box">
                                <label for="bride_address"><strong>Present Address* </strong> </label>
                                <input type="text" id="bride_address" name="bride_address" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div class="input-box">
                                <label for="bride_fatherName"><strong>Father's Name* </strong> </label>
                                <input type="text" id="bride_fatherName" name="bride_fatherName" placeholder="Francis San Pedro" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="bride_motherName"><strong>Mother's Maiden Name* </strong> </label>
                                <input type="text" id="bride_motherName" name="bride_motherName" placeholder="Teresa Agustin" title="Format: FirstName LastName" maxlength="100" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                            </div>
                            <div class="input-box">
                                <label for="bride_religion"><strong>Religion* </strong> </label>
                                <select id="bride_religion" name="bride_religion">
                                    <option value="" disabled selected hidden>Select Religion</option>
                                    <option value="Roman Catholic">Roman Catholic</option>
                                    <option value="Catholic">Catholic</option>
                                    <option value="Protestant">Protestant</option>
                                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                    <option value="Jehovah&lsquo;s Witness">Jehovah&lsquo;s Witness</option>
                                    <option value="Seventh Day Adventist">Seventh Day Adventist</option>
                                    <option value="Islam">Islam</option>
                                </select>
                            </div>
                        </div>
                    <?php } else if ($_GET['page'] == 'Funeral') { ?>
                        <!--FUNERAL FORM-->
                        <div class="form-title">
                            Deceased's Information
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="lastName">Last Name* </label>
                                    <input type="text" id="lastName" name="lastName" maxlength="40" placeholder="Dela Cruz" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="firstName">First Name* </label>
                                    <input type="text" id="firstName" name="firstName" maxlength="40" placeholder="Juan" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="middleName">Middle Name </label>
                                    <input type="text" id="middleName" name="middleName" maxlength="40" placeholder="Tomas" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                        </div>
                        <div class="form-grid-cont">
                            <div class="input-box">
                                <label for="age"><strong>Age*</strong> </label>
                                <input type="num" id="age" name="age" min="0" placeholder="30" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" max="120" maxlength="3" required><br>
                            </div>
                            <div>
                                <b>Gender*</b>
                                <div style="display: flex">
                                    <div>
                                        <input type="radio" id="genderMale" name="gender" value="Male" required>
                                        <label for="genderMale">Male </label> <br>
                                    </div>
                                    <div>
                                        <input type="radio" id="genderFemale" name="gender" value="Female" required>
                                        <label for="genderFemale">Female </label> <br>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="cause_of_death"><strong>Cause of Death*</strong></label>
                                <input type="text" id="cause_of_death" name="cause_of_death" placeholder="Ischaemic heart disease" title="Please indicate the cause stated on the deceased's death certificate." maxlength="120" required><br>
                            </div>
                            <div class="input-box">
                                <label for="date_of_death"><strong>Date of Death*</strong></label>
                                <input type="date" name="date_of_death" min="<?= date('Y-m-d', strtotime('-1 month')); ?>" max="<?php echo date("Y-m-d"); ?>" required><br>
                            </div>
                            <div class="input-box">
                                <label for="date_of_internment"><strong>Date of Internment*</strong> </label>
                                <input type="date" id="date_of_internment" name="date_of_internment" min="<?php echo date("Y-m-d"); ?>" max="<?= date('Y-m-d', strtotime('+1 month')); ?>" required><br>
                            </div>
                            <div class="input-box">
                                <label for="place_of_cemetery"><strong>Place of Cemetery*</strong> </label>
                                <input type="text" id="place_of_cemetery" name="place_of_cemetery" placeholder="Manila American Cemetery and Memorial" maxlength="120" required><br>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div>
                                <b>Sacrament Received*</b>
                                <div style="display: flex">
                                    <div>
                                        <input type="radio" id="sacramentYes" name="sacrament" value="Yes" required>
                                        <label for="sacramentYes">Yes </label><br>
                                    </div>
                                    <div>
                                        <input type="radio" id="sacramentNo" name="sacrament" value="No" required>
                                        <label for="sacramentNo">No </label><br>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <b>Casket or Urn*</b>
                                <div style="display: flex" title="Casket is for funeral masses while Urn is for funeral blessings">
                                    <div>
                                        <input type="radio" id="burialCasket" name="burial" value="Casket" title="Funeral Mass" required>
                                        <label for="burialCasket">Casket </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="burialUrn" name="burial" value="Urn" title="Funeral Blessing" required>
                                        <label for="burialUrn">Urn </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-title">
                            <a title="Informant = person who gave the deceased's death certificate information to the church">Informant's Information</a>
                        </div>
                        <div>
                            <b>Name</b>
                            <div class="form-grid-cont">
                                <div class="input-box">
                                    <label for="informantLastName">Last Name* </label>
                                    <input type="text" id="informantLastName" name="informantLastName" placeholder="San Pedro" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="informantFirstName">First Name* </label>
                                    <input type="text" id="informantFirstName" name="informantFirstName" placeholder="Juana" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*" required><br>
                                </div>
                                <div class="input-box">
                                    <label for="informantMiddleName">Middle Name </label>
                                    <input type="text" id="informantMiddleName" name="informantMiddleName" placeholder="Agustin" maxlength="40" pattern="[A-Za-zÀ-ÖØ-öø-ÿ.\s\-]*"><br>
                                </div>
                            </div>
                        </div>
                        <div class="grid-cont">
                            <div class="input-box">
                                <label for="contactNum"><strong>Contact Number*</strong></label>
                                <div class="contactnum">
                                    <input type="text" name="mobile1" value="+63" id="" disabled>
                                    <input type="tel" id="contactNum" name="informantContactNum" maxlength="10" placeholder="9123456789" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" pattern="[9]{1}[0-9]{9}" required><br>
                                </div>
                            </div>
                            <div class="input-box">
                                <label for="address"><strong>Present Address*</strong> </label>
                                <input type="text" id="address" name="informantAddress" placeholder="9 Sampaguita St., Brgy. Pembo, Taguig City" maxlength="120" required><br>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="button-area">
                        <button type="button" onclick="openForm(clearForm)" id="clear">Cancel</button>
                        <button type="button" onclick="openForm(submitForm)" id="submit">Save</button>
                    </div>
                    <div id="clearForm">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Discard changes made?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(clearForm)">No</button>
                                <button type="reset" onclick="openForm(clearForm)">Yes</button>
                            </div>
                        </div>
                    </div>
                    <div id="submitForm">
                        <div class="popupForm">
                            <div class="icon-box"></div>
                            <div class="headertext-box">
                                Save changes?
                            </div>
                            <div class="form-btnarea">
                                <button type="button" onclick="openForm(submitForm)">No</button>
                                <button type="submit" name="submit" value="change">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
    <script src="jsRECORDS.js"></script>
</body>

</html>