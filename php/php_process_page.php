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
        <title>SDSU NHM - Event Signed Up</title>
        <meta charset="utf-8" />
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
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
            <h4>Thank you for signing up!</h4>
            <!-- <section class="processPageSection">
                <article class="processPageArticle"> -->
                
                <?php
                    $firstname = $_SESSION['firstname'];
                    $lastname = $_SESSION['lastname'];
                    $email = $_SESSION['email'];
                    $address1 = $_SESSION['address1'];
                    $address2 = $_SESSION['address2'];
                    $city = $_SESSION['city'];
                    $state = $_SESSION['state'];
                    $zip = $_SESSION['zip'];
                    $country = $_SESSION['country'];
                    $phone = $_SESSION['phone'];
                    $event = $_SESSION['event'];
                    $newsletter2 = $_SESSION['newsletter2'];
                    $other = $_SESSION['other'];
                    $total = $_SESSION['total'];
                    $under5 = $_SESSION['under5'];
                    $between5and12 = $_SESSION['between5and12'];
                    $between13and17 = $_SESSION['between13and17'];
                    $over17 = $_SESSION['over17'];
                    
                    $address = "";
                ?>

                /*
                 JS script for capitalizing the first letter of the name
                 */
                <script type="text/javascript">
                    var name = "";
                    var str = '<?php echo $firstname; ?>' + " ";
                    str += '<?php echo $lastname; ?>';
                    var words = str.split(" ");
                    for (i = 0; i < words.length; i++) {
                        word = words[i];
                        name += word.charAt(0).toUpperCase() + word.substr(1).toLowerCase() + " ";
                    }
                    document.write("Name:<br />" + name + "<br /><br />");
                </script>
                
                <?php
                echo "Email:<br />" . $email . "<br /><br />";
                if ($address1 != null) {
                    $address = $address1 . "<br /><br />";
                }
                if ($address2 != null) {
                    $address = $address1 . "<br />" . $address2 . "<br /><br />";
                    //echo $address2 . "<br />";
                }
                if ($city != null) {
                    $address = $address1 . "<br />" . $address2 . "<br />" . $city . "<br /><br />";
                    //echo $city . " ";
                }
                if ($state != null) {
                    $address = $address1 . "<br />" . $address2 . "<br />" . $city . $state . "<br /><br />";
                    //echo $state . ", ";
                }
                if ($zip != null) {
                    $address = $address1 . "<br />" . $address2 . "<br />" . $city . " " . $state . ", " . $zip . "<br /><br />";
                    //echo $zip . "<br />";
                }
                if ($country != null) {
                    $address = $address1 . "<br />" . $address2 . "<br />" . $city . " " . $state . ", " . $zip . "<br />" . $country . "<br /><br />";
                    //echo $country . "<br />";
                }
                if ($address != null) {
                    echo "Address:<br />" . $address;
                }
                if ($phone != null) {
                    echo "Phone:<br />" . $phone . "<br /><br />";
                }
                echo "Event:<br />" . $event . "<br /><br />";
                echo "Total: " . $total . "<br />";
                echo "Under 5: " . $under5 . "<br />";
                echo "Between 5 and 12: " . $between5and12 . "<br />";
                echo "Between 13 and 17: " . $between13and17 . "<br />";
                echo "Over 17: " . $over17 . "<br /><br />";
                if ($newsletter2 != null) {
                    echo "Newsletter:<br />" . $newsletter2 . "<br /><br />";
                }
                if ($other != null) {
                    echo "What other events would you like to see offered?:<br />" . $other . "<br /><br />";
                }
                ?>
            <!-- </article>
            </section> -->
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




