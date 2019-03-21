<!--
Blackburn, Sydney
CS545_00
Assignment #3
Fall 2018
-->

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SDSU NHM - Events Sign Up</title>
        <meta charset="utf-8" />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../css/style.css?v=1.1" />
        <!-- JS -->
        <script type="text/javascript" src="../js/total.js"></script>
    </head>
    <body>
        <header>
            <!-- logo and slogan -->
            <div class="clearfix">
                <div class="boxHeader">
                    <a href="../index.html">
                        <img id="logo" src="../images/logo.png" alt="SDSU Natural History Museum" />
                    </a>
                </div>
                <div class="boxHeader">
                    <h4 id="slogan">DISCOVER. EXPERIENCE. ENJOY.</h4>
                </div>
            </div>
            <!-- navigation -->
            <nav>
                <a class="inactive" href="../pages/about.html">ABOUT US</a>
                <a class="inactive" href="../pages/exhibits.html">EXHIBITS</a>
                <a class="inactive" href="../pages/events.html">EVENTS</a>
                <div class="dropdown">
                    <a href="#" class="dropbtn">MAKE A DIFFERENCE</a>
                    <ul class="dropdown-content">
                        <li><a class="inactive" href="../pages/member.html">MEMBER</a></li>
                        <li><a class="inactive" href="../pages/volunteer.html">VOLUNTEER/INTERN</a></li>
                        <li><a class="inactive" href="../pages/donate.html">DONATE</a></li>
                    </ul>
                </div>
                <a class="inactive" href="../pages/contact.html">CONTACT</a>
            </nav>
        </header>

        <!-- main body -->
        <!-- WARNINGS: ARTICLE/SECTION LACKS HEADING
         Some of the content within the articles were just pictures so they didn't need headings. Other contents (paragraphs) within articles/sections didn't need headings because they were used to keep the layout -->
        <div id="container">
            <h3>Sign up for the SDSU NHM's upcoming events!</h3>
            <hr />
            <section class="upcomingEventsSignupSection">
                <article class="upcomingEventsSignupArticle">
                <?php
                    
                // define variables and set to empty values
                $firstname = $lastname = $email = "";
                $address1 = $address2 =  "";
                $city = $state = $zip = $country = "";
                $phone = $event = "";
                $newsletter2 = $other = "";
                $total = $under5 = $between5and12 = $between13and17 = $over17 = "";
                $firstnameErr = $lastnameErr = $emailErr = "";
                $address1Err = $address2Err = "";
                $cityErr = $stateErr = $zipErr = $countryErr = "";
                $phoneErr = $eventErr = "";
                $otherErr = "";
                $totalErr = $under5Err = $between5and12Err = $between13and17Err = $over17Err = "";
                
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                
                function test_valid_characters($data) {
                    $stripped = str_replace(' ', '', $data);
                    if (!ctype_alpha($stripped)) {
                        return false;
                    }
                    return true;
                }
                
                function test_valid_digits($data) {
                    $stripped = str_replace(' ', '', $data);
                    if (!ctype_digit($stripped)) {
                        return false;
                    }
                    return true;
                }
                
                function test_valid_phone_number($data) {
                    $stripped = str_replace('-', '', $data);
                    $stripped = str_replace(' ', '', $stripped);
                    if (!ctype_digit($stripped)) {
                        return false;
                    }
                    return true;
                }
                
                /* Old total function
                function test_number_of_attendees($totalNum, $num1, $num2, $num3, $num4) {
                    if (intval($num1) + intval($num2) + intval($num3) + intval($num4) != intval($totalNum)) {
                        return false;
                    }
                    return true;
                }
                 */
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $valid = true;
                    
                    // First name checks
                    if (empty(filter_input(INPUT_POST, "firstname"))) {
                        $valid = false;
                        $firstnameErr = "<br />First name is required";
                    } else if (!test_valid_characters(filter_input(INPUT_POST, "firstname"))){
                        $valid = false;
                        echo $valid;
                        $firstnameErr = "<br />First name should only contain letters";
                    } else {
                        $_SESSION['firstname'] = test_input(filter_input(INPUT_POST, "firstname"));
                        $firstname = test_input(filter_input(INPUT_POST, "firstname"));
                        $firstnameErr = "";
                    }
                    
                    // Last name checks
                    if (empty(filter_input(INPUT_POST, "lastname"))) {
                        $valid = false;
                        $lastnameErr = "<br />Last name is required";
                    } else if (!test_valid_characters(filter_input(INPUT_POST, "lastname"))){
                        $valid = false;
                        $lastnameErr = "<br />Last name should only contain letters";
                    } else {
                        $_SESSION['lastname'] = test_input(filter_input(INPUT_POST, "lastname"));
                        $lastname = test_input(filter_input(INPUT_POST, "lastname"));
                        $lastnameErr = "";
                    }
                    
                    // Email checks
                    if (empty(filter_input(INPUT_POST, "email"))) {
                        $valid = false;
                        $emailErr = "<br />Email is required";
                    }  else {
                        $_SESSION['email'] = test_input(filter_input(INPUT_POST, "email"));
                        $email = test_input(filter_input(INPUT_POST, "email"));
                        $emailErr = "";
                        
                        if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
                            $valid = false;
                            $emailErr = "<br />Invalid email format, please enter valid email";
                        }
                    }
                    
                    // Address Line 1 checks
                    if (empty(filter_input(INPUT_POST, "address1"))) {
                        $_SESSION['address1'] = "";
                    } else {
                        $_SESSION['address1'] = test_input(filter_input(INPUT_POST, "address1"));
                        $address1 = test_input(filter_input(INPUT_POST, "address1"));
                        $address1Err = "";
                    }
                    
                    // Address Line 2 checks
                    if (empty(filter_input(INPUT_POST, "address2"))) {
                        $_SESSION['address2'] = "";
                    } else {
                        $_SESSION['address2'] = test_input(filter_input(INPUT_POST, "address2"));
                        $address2 = test_input(filter_input(INPUT_POST, "address2"));
                        $address2Err = "";
                    }
                    
                    // City checks
                    if (empty(filter_input(INPUT_POST, "city"))) {
                        $_SESSION['city'] = "";
                    } else if (!test_valid_characters(filter_input(INPUT_POST, "city"))){
                        $valid = false;
                        $cityErr = "<br />City should only contain letters";
                    } else {
                        $_SESSION['city'] = test_input(filter_input(INPUT_POST, "city"));
                        $city = test_input(filter_input(INPUT_POST, "city"));
                        $cityErr = "";
                    }
                    
                    // State checks
                    if (empty(filter_input(INPUT_POST, "state"))) {
                        $_SESSION['state'] = "";
                    } else if (!test_valid_characters(filter_input(INPUT_POST, "state"))){
                        $valid = false;
                        $stateErr = "<br />State should only contain letters";
                    } else {
                        $_SESSION['state'] = test_input(filter_input(INPUT_POST, "state"));
                        $state = test_input(filter_input(INPUT_POST, "state"));
                        $stateErr = "";
                    }
                    
                    // Zip checks
                    if (empty(filter_input(INPUT_POST, "zip"))) {
                        $_SESSION['zip'] = "";
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "zip"))){
                        $valid = false;
                        $zipErr = "<br />Zip should only contain numbers";
                    } else {
                        $_SESSION['zip'] = test_input(filter_input(INPUT_POST, "zip"));
                        $zip = test_input(filter_input(INPUT_POST, "zip"));
                        $zipErr = "";
                    }
                    
                    // Country checks
                    if (empty(filter_input(INPUT_POST, "country"))) {
                        $_SESSION['country'] = "";
                    } else if (!test_valid_characters(filter_input(INPUT_POST, "country"))){
                        $valid = false;
                        $countryErr = "<br />Country should only contain letters";
                    } else {
                        $_SESSION['country'] = test_input(filter_input(INPUT_POST, "country"));
                        $country = test_input(filter_input(INPUT_POST, "country"));
                        $countryErr = "";
                    }
                    
                    // Phone checks
                    if (empty(filter_input(INPUT_POST, "phone"))) {
                        $_SESSION['phone'] = "";
                    } else if (!test_valid_phone_number(filter_input(INPUT_POST, "phone"))){
                        $valid = false;
                        $phoneErr = "<br />Phone number should only contain numbers and hyphens";
                    } else {
                        $_SESSION['phone'] = test_input(filter_input(INPUT_POST, "phone"));
                        $phone = test_input(filter_input(INPUT_POST, "phone"));
                        $phoneErr = "";
                    }
                    
                    // Event checks
                    if (empty(filter_input(INPUT_POST, "event"))) {
                        $valid = false;
                        $eventErr = "<br />Event is required";
                    } else {
                        $_SESSION['event'] = test_input(filter_input(INPUT_POST, "event"));
                        $event = test_input(filter_input(INPUT_POST, "event"));
                        $eventErr = "";
                    }
                    
                    /* Old Total Checks
                    // Total checks
                    if (empty(filter_input(INPUT_POST, "total"))) {
                        $total = test_input(filter_input(INPUT_POST, "total"));
                        $valid = false;
                        $totalErr = "<br />Total number of attendees is required";
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "total"))){
                        $total = test_input(filter_input(INPUT_POST, "total"));
                        $valid = false;
                        $totalErr = "<br />Total should only contain numbers";
                    } else if (filter_input(INPUT_POST, "total") > 20) {
                        $total = test_input(filter_input(INPUT_POST, "total"));
                        $valid = false;
                        $totalErr = "<br />20 person limit";
                    } else if (!test_number_of_attendees(filter_input(INPUT_POST, "total"), filter_input(INPUT_POST, "under5"), filter_input(INPUT_POST, "between5and12"), filter_input(INPUT_POST, "between13and17"), filter_input(INPUT_POST, "over17"))) {
                        $total = test_input(filter_input(INPUT_POST, "total"));
                        $valid = false;
                        $totalErr = "<br />Total number of attendees does not add up";
                    } else {
                        $_SESSION['total'] = test_input(filter_input(INPUT_POST, "total"));
                        $total = test_input(filter_input(INPUT_POST, "total"));
                        $totalErr = "";
                    }
                    */
                     
                    // Under 5 checks
                    if (empty(filter_input(INPUT_POST, "under5"))) {
                        $under5 = "0";
                        $_SESSION['under'] = $under5;
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "under5"))){
                        $under5 = test_input(filter_input(INPUT_POST, "under5"));
                        $valid = false;
                        $under5Err = "<br />Total should only contain numbers";
                    } else {
                        $_SESSION['under5'] = test_input(filter_input(INPUT_POST, "under5"));
                        $under5 = test_input(filter_input(INPUT_POST, "under5"));
                        $under5Err = "";
                    }
                    
                    // Between 5 and 12 checks
                    if (empty(filter_input(INPUT_POST, "between5and12"))) {
                        $between5and12 = "0";
                        $_SESSION['between5and12'] = $between5and12;
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "between5and12"))){
                        $between5and12 = test_input(filter_input(INPUT_POST, "between5and12"));
                        $valid = false;
                        $between5and12Err = "<br />Total should only contain numbers";
                    } else {
                        $_SESSION['between5and12'] = test_input(filter_input(INPUT_POST, "between5and12"));
                        $between5and12 = test_input(filter_input(INPUT_POST, "between5and12"));
                        $between5and12Err = "";
                    }
                    
                    // Between 13 and 17 checks
                    if (empty(filter_input(INPUT_POST, "between13and17"))) {
                        $between13and17 = "0";
                        $_SESSION['between13and17'] = $between13and17;
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "between13and17"))){
                        $between13and17 = test_input(filter_input(INPUT_POST, "between13and17"));
                        $valid = false;
                        $between13and17Err = "<br />Total should only contain numbers";
                    } else {
                        $_SESSION['between13and17'] = test_input(filter_input(INPUT_POST, "between13and17"));
                        $between13and17 = test_input(filter_input(INPUT_POST, "between13and17"));
                        $between13and17Err = "";
                    }
                    
                    // Over 17 checks
                    if (empty(filter_input(INPUT_POST, "over17"))) {
                        $over17 = "0";
                        $_SESSION['over17'] = $over17;
                    } else if (!test_valid_digits(filter_input(INPUT_POST, "over17"))){
                        $over17 = test_input(filter_input(INPUT_POST, "over17"));
                        $valid = false;
                        $over17Err = "<br />Total should only contain numbers";
                    } else {
                        $_SESSION['over17'] = test_input(filter_input(INPUT_POST, "over17"));
                        $over17 = test_input(filter_input(INPUT_POST, "over17"));
                        $over17Err = "";
                    }
                    
                    // Send total to processing page
                    $_SESSION['total'] = $under5 + $between5and12 + $between13and17 + $over17;
                    $total = $under5 + $between5and12 + $between13and17 + $over17;
                    
                    // Newsletter checks
                    if (empty(filter_input(INPUT_POST, "newsletter2"))) {
                        $_SESSION['newsletter2'] = "";
                    } else {
                        $_SESSION['newsletter2'] = test_input(filter_input(INPUT_POST, "newsletter2"));
                    }
                    
                    // other checks
                    if (empty(filter_input(INPUT_POST, "other"))) {
                        $_SESSION['other'] = "";
                    } else {
                        $_SESSION['other'] = test_input(filter_input(INPUT_POST, "other"));
                        $other = test_input(filter_input(INPUT_POST, "other"));
                        $otherErr = "";
                    }
                    
                    if($valid){
                        header("location:php_process_page.php");
                        exit();
                    }
                }
                ?>
                
                <h4>Please fill out this form and click Submit when finished</h4>
                
                <form id="upcomingEventsForm" name="upcomingEventsSignUp" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    
                    <table>
                        <!-- First name field -->
                        <tr>
                            <td>First Name:<span class="required">*</span></td>
                            <td>
                                <input type="text" name="firstname" id="firstname" size="40"  maxlength="60" value="<?php echo $firstname; ?>"><span class="error"><?php echo " " . $firstnameErr;?></span>
                            </td>
                        </tr>
                        
                        <!-- Last name field -->
                        <tr>
                            <td>Last Name:<span class="required">*</span></td>
                            <td><input type="text" name="lastname" id="lastname" size="40"  maxlength="60" value="<?php echo $lastname; ?>"><span class="error"><?php echo " " . $lastnameErr;?></span>
                            </td>
                        </tr>
                        
                        <!-- Email field -->
                        <tr>
                            <td>Email:<span class="required">*</span></td>
                            <td><input type="email" name="email" id="email" size="40"  maxlength="60" value="<?php echo $email; ?>"><span class="error"><?php echo " " . $emailErr;?></span>
                            </td>
                        </tr>
                        
                        <!-- Address1 field -->
                        <tr>
                            <td>Address Line 1:<span class="optional">&#160;</span></td>
                            <td><input type="address1" name="address1" id="address1" size="40"  maxlength="60" value="<?php echo $address1; ?>"><span class="error"><?php echo " " . $address1Err;?></span>
                            </td>
                        </tr>
                                
                        <!-- Address2 field -->
                        <tr>
                            <td>Address Line 2:<span class="optional">&#160;</span></td>
                            <td><input type="address2" name="address2" id="address2" size="40"  maxlength="60" value="<?php echo $address2; ?>"><span class="error"><?php echo " " . $address2Err;?></span>
                            </td>
                        </tr>
                                
                        <!-- City, State, Zip field -->
                        <tr>
                            <td>City, State, Zip:<span class="optional">&#160;</span></td>
                            <td><input type="city" name="city" id="city" size="26"  maxlength="30" value="<?php echo $city; ?>"><span class="error"><?php echo " " . $cityErr;?></span>
                                <input type="state" name="state" id="state" size="4"  maxlength="2" value="<?php echo $state; ?>"><span class="error"><?php echo " " . $stateErr;?></span>
                                <input type="zip" name="zip" id="zip" size="5"  maxlength="5" value="<?php echo $zip; ?>"><span class="error"><?php echo " " . $zipErr;?></span>
                            </td>
                        </tr>
                                
                        <!-- Country field -->
                        <tr>
                            <td>Country:<span class="optional">&#160;</span></td>
                            <td><input type="country" name="country" id="country" size="40"  maxlength="60" value="<?php echo $country; ?>"><span class="error"><?php echo " " . $countryErr;?></span>
                            </td>
                        </tr>
                                
                        <!-- Phone field -->
                        <tr>
                            <td>Phone Number:<span class="optional">&#160;</span></td>
                            <td><input type="phone" name="phone" id="phone" size="40"  maxlength="60" value="<?php echo $phone; ?>" placeholder="ex. 000-000-0000"><span class="error"><?php echo " " . $phoneErr;?></span>
                            </td>
                        </tr>
                                
                        <!-- Event Field -->
                        <tr>
                            <td>Event:<span class="required">*</span></td>
                            <td>
                                <select name="event" id="event">
                                    <option value="" disabled selected>Select event</option>
                                    <option value="Citizen Science Project">Citizen Science Project</option>
                                    <option value="BRCC Mission">BRCC Mission</option>
                                    <option value="Binational Expeditions">Binational Expeditions</option>
                                    <option value="Paleontological Mitigation Services">Paleontological Mitigation Services</option>
                                    <option value="Minerals">Minerals</option>
                                    <option value="San Diego">San Diego</option>
                                </select><span class="error"><?php echo " " . $eventErr;?></span>
                            </td>
                        </tr>
                                
                        <!-- Total field -->
                        <tr>
                            <td>Total number of attendees:<span class="required">*</span></td>
                            <td><input type="total" name="total" id="total" size="40"  maxlength="2" value="<?php echo $total; ?>" placeholder="(20 person limit)"><span class="error"><?php echo " " . $totalErr;?></span>
                                </td>
                        </tr>
                                
                        <!-- Under 5 field -->
                        <tr>
                            <td>Number of attendees<br />under 5:<span class="required">*</span></td>
                            <td><input type="under5" name="under5" id="under5" size="35"  maxlength="2" value="<?php echo $under5; ?>"><span class="error"><?php echo " " . $under5Err;?></span>
                            </td>
                        </tr>
                                
                        <!-- 5 to 12 field -->
                        <tr>
                            <td>Number of attendees<br />between 5 and 12:<span class="required">*</span></td>
                            <td><input type="between5and12" name="between5and12" id="between5and12" size="35"  maxlength="2" value="<?php echo $between5and12; ?>"><span class="error"><?php echo " " . $between5and12Err;?></span>
                            </td>
                        </tr>
                                
                        <!-- 13 to 17 field -->
                        <tr>
                            <td>Number of attendees<br />between 13 and 17:<span class="required">*</span></td>
                            <td><input type="between13and17" name="between13and17" id="between13and17" size="35"  maxlength="2" value="<?php echo $between13and17; ?>"><span class="error"><?php echo " " . $between13and17Err;?></span>
                            </td>
                        </tr>
                                
                        <!-- Over 17 field -->
                        <tr>
                            <td>Number of attendees<br />over 17:<span class="required">*</span></td>
                            <td><input type="over17" name="over17" id="over17" size="35"  maxlength="2" value="<?php echo $over17; ?>"><span class="error"><?php echo " " . $over17Err;?></span>
                            </td>
                        </tr>
                                    
                        <!-- Newsletter Field -->
                        <tr>
                            <td>Newsletter:<span class="optional"></span></td>
                            <td><input type="checkbox" name="newsletter" id="newsletter" value="Signed up" checked> <label for="newsletter">Sign up for our newsletter</label>
                            </td>
                        </tr>
                                    
                        <!-- Other Field -->
                        <tr>
                            <td>What other events would<br />you like to see offered?<span class="optional">&#160;</span></td>
                            <td><textarea name="other" id="other" rows="5" cols="40" value="<?php echo $other; ?>"></textarea><span class="error"><?php echo " " . $otherErr;?></span>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" value="Submit">
                    <input type="reset"><br /><br />
                    </form>
                </article>
            </section>
        </div>

        <!-- footer -->
        <footer>
            <hr />
            <div class="clearfix">
                <div class="boxFooter">
                    <address>
                        San Diego State University <br />
                        Natural History Museum <br />
                        San Diego, CA 92182-0000 <br />
                        (619) 594-5200 <br />
                        <a href="mailto:nhmuseum@sdsu.edu" target="_top">nhmuseum@sdsu.edu</a> <br />
                    </address>
                </div>
                <div class="boxFooter">
                    <p id="name">
                    Sydney Blackburn <br />
                    CS 545 <br />
                    Fall 2018 <br />
                    <br /><br />
                    <script type="text/javascript">
                        document.write("Last Modified: " + document.lastModified);
                    </script>
                    </p>
                </div>
                <div class="boxFooter">
                    <div id="newsletter">
                        <p>Receive the latest information about our new exhibitions, programs, events, and more.</p>
                        <form action="#">
                            Email:
                            <input type="text" name="firstname">
                                <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>



