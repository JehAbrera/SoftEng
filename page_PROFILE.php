<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylePROFILE.css">
    <!-- Font Awesome Icon Script -->
    <script src="https://kit.fontawesome.com/678a3c402d.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
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
                <div class="nav-item">About Us</div>
                <?php
                if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] == false) {
                    echo '<div class="nav-item">Login</div>';
                } else if ($_SESSION['isLoggedIn'] == true) {
                    echo '<div class="nav-item dropdown">';
                    echo '<span class="dp-title">Profile <i class="fa-solid fa-angle-down"></i></span>';
                    echo '<div class="dropdown-content">';
                    echo '<div class="nav-item">Profile</div>';
                    echo '<div class="nav-item">Log-Out</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </nav>

        <div class="body-container">
            <div class="sidebar">
                <div class="user-name">Firstname, LastName</div>
                <button class="styled-button" onclick="toggleEditable()">Edit Profile</button>
                <button class="styled-button" onclick="togglePasswordChange()">Change Password</button>
               <button class="styled-button" id="deleteAccountButton">Delete Account</button>

                <br>
                <br>
                <button class="styled-button">View Appointment</button>
            </div>
            <div class="main-content" id="mainContent">
                <form id="profileForm">
                    
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" value="Name" disabled data-default="Name">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" disabled data-default="">
                    </div>
                    <div class="form-group">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="text" id="contactNumber" name="contactNumber" disabled data-default="">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="text" id="email" name="email" disabled data-default="">
                    </div>

                    <!-- Password change form group -->
                    <div class="form-group" id="passwordChangeGroup" style="display: none;">
                        <div class="input-wrapper">
                            <label for="currentPassword">Current Password:</label>
                            <input type="password" id="currentPassword" name="currentPassword" disabled>
                        </div>
                        <div class="input-wrapper">
                            <label for="newPassword">New Password:</label>
                            <input type="password" id="newPassword" name="newPassword" disabled>
                        </div>
                        <div class="input-wrapper">
                            <label for="confirmNewPassword">Confirm New Password:</label>
                            <input type="password" id="confirmNewPassword" name="confirmNewPassword" disabled>
                        </div>
                    </div>

                    <!-- Add Save and Cancel buttons-->
                    <div class="button-container" style="display: none;">
                        <button class="cancel-button" type="button" onclick="cancelChanges()">Cancel</button>
                        <button class="save-button" type="button" onclick="saveChanges()">Save Changes</button>
                    </div>
					
					<div id="confirmation-popup" class="delete-confirmation-popup" style="display: none;">
						<i class="fa-solid fa-xmark close-icon" onclick="closeConfirmationPopup()"></i>
						
						<div class="confirmation-message">
							Are you sure you want to delete your account?
						</div>
						<div class="confirmation-buttons">
							<button class="styled-button" onclick="deleteAccount()">Yes</button>
							<button class="styled-button" onclick="closeConfirmationPopup()">No</button>
						</div>
					</div>


                </form>
            </div>
        </div>
    </div>
    <script src="reuse.js"></script>
    <script>
	function hideAllSections() {
            // Hide main content
            var mainContent = document.getElementById('mainContent');
            mainContent.classList.remove('editable');

            // Hide password change section
            var passwordChangeGroup = document.getElementById('passwordChangeGroup');
            passwordChangeGroup.style.display = 'none';

            // Hide Save and Cancel buttons
            var buttonContainer = document.querySelector('.main-content .button-container');
            buttonContainer.style.display = 'none';

            // Disable all form elements
            var formElements = document.querySelectorAll('.main-content #profileForm input');
            for (var i = 0; i < formElements.length; i++) {
                formElements[i].setAttribute('disabled', 'disabled');
            }
        }

        function toggleEditable() {
			hideAllSections(); // Call the function to hide all sections
			
            var mainContent = document.getElementById('mainContent');
            mainContent.classList.toggle('editable');

            var editButton = document.querySelector('.styled-button');
            editButton.classList.toggle('clicked');

            var form = document.getElementById('profileForm');
            var formElements = form.elements;

            // Store the initial values when switching to editable mode
            if (mainContent.classList.contains('editable')) {
                for (var i = 0; i < formElements.length; i++) {
                    var element = formElements[i];
                    if (!element.hasAttribute('data-default')) {
                        element.setAttribute('data-default', element.value);
                    }
                }
            }

            // Toggle the display of Save and Cancel buttons
            var buttonContainer = document.querySelector('.main-content .button-container');
            buttonContainer.style.display = buttonContainer.style.display === 'none' || buttonContainer.style.display === '' ? 'flex' : 'none';

            // Toggle the input fields and labels based on the editable class
            for (var i = 0; i < formElements.length; i++) {
                var element = formElements[i];
                if (mainContent.classList.contains('editable')) {
                    element.removeAttribute('disabled');
                } else {
                    element.setAttribute('disabled', 'disabled');
                }
            }
        }

        function togglePasswordChange() {
			hideAllSections();
			
			
            var passwordChangeGroup = document.getElementById('passwordChangeGroup');
            var mainContent = document.getElementById('mainContent');
            var buttonContainer = document.querySelector('.main-content .button-container');
            var passwordFields = document.querySelectorAll('.main-content #passwordChangeGroup input');

            // Toggle the Save and Cancel buttons
            buttonContainer.style.display = buttonContainer.style.display === 'none' || buttonContainer.style.display === '' ? 'flex' : 'none';

            // Toggle the input fields
            var formElements = document.querySelectorAll('.main-content #profileForm input');
            for (var i = 0; i < formElements.length; i++) {
                var element = formElements[i];
                if (mainContent.classList.contains('editable')) {
                    element.removeAttribute('readonly');
                    element.removeAttribute('disabled');
                } else {
                    element.setAttribute('readonly', 'readonly');
                    element.setAttribute('disabled', 'disabled');
                }
            }

            // Toggle the input fields on the password
            passwordChangeGroup.style.display = passwordChangeGroup.style.display === 'none' || passwordChangeGroup.style.display === '' ? 'block' : 'none';

            // Toggle the readonly attribute for password fields specifically
            for (var i = 0; i < passwordFields.length; i++) {
                var element = passwordFields[i];
                if (passwordChangeGroup.style.display === 'block') {
                    element.removeAttribute('readonly');
                    element.removeAttribute('disabled');
                } else {
                    element.setAttribute('readonly', 'readonly');
                    element.setAttribute('disabled', 'disabled');
                }
            }
			
        }

			   function saveChanges() {
			
			alert("Changes saved!");

			// Disable password fields
			var passwordFields = document.querySelectorAll('.main-content #passwordChangeGroup input');
			for (var i = 0; i < passwordFields.length; i++) {
				passwordFields[i].setAttribute('readonly', 'readonly');
				passwordFields[i].setAttribute('disabled', 'disabled');
			}

			// Hide the Save and Cancel buttons
			var buttonContainer = document.querySelector('.main-content .button-container');
			buttonContainer.style.display = 'none';
		}

				function cancelChanges() {
					var form = document.getElementById('profileForm');
					var formElements = form.elements;

					// Reset the input fields to their initial values
					for (var i = 0; i < formElements.length; i++) {
						var element = formElements[i];
						if (element.hasAttribute('data-default')) {
							element.value = element.getAttribute('data-default');
						}
					}

            toggleEditable(); // Toggle back to non-editable mode

            // Hide the Save and Cancel buttons
            var buttonContainer = document.querySelector('.main-content .button-container');
            buttonContainer.style.display = 'none';

            // Hide the password change labels and input fields
            var passwordChangeGroup = document.getElementById('passwordChangeGroup');
            passwordChangeGroup.style.display = 'none';

            // Disable password fields
            var passwordFields = document.querySelectorAll('.main-content #passwordChangeGroup input');
            for (var i = 0; i < passwordFields.length; i++) {
                passwordFields[i].setAttribute('disabled', 'disabled');
            }
        }

  

		 document.getElementById('deleteAccountButton').addEventListener('click', function () {
			confirmDeleteAccount();
		});

		function confirmDeleteAccount() {
			hideAllSections();
			var confirmationPopup = document.getElementById('confirmation-popup');
			confirmationPopup.style.display = 'flex';
		}

		function closeConfirmationPopup() {
			var confirmationPopup = document.getElementById('confirmation-popup');
			confirmationPopup.style.display = 'none';
		}

		function deleteAccount() {
			// Add your logic here to delete the account
			alert("Account deleted!"); // Placeholder, replace with actual delete account logic
			closeConfirmationPopup();
		}
    </script>
</body>

</html>
