<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script src="js/vendor/modernizr.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
  </head>
  <body>
       
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
           
          <li class="name">
            <h1>
              <a href="#">
                Top Bar Title
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
     
        <section class="top-bar-section">
           
          <ul class="left">
            <li><a class="active" href="#">Home</a></li>
            <li class="divider"></li>
            <li><a href="#">Get Your Score</a></li>
            <li class="divider"></li>
            <li><a href="#">Are You Happy?</a></li>
          </ul>
    
        </section>
      </nav>
      <div class="row">
      <div class="medium-12 columns">
      <form action="score.php" method="POST">
      <div class="panel">
          <h4>Location</h4>
          <p>Where do you live?</p>
            <div class="row">
              <div class="large-6 columns">
                <label>City
                  <input name="city" type="text" />
                </label>
              </div>
              <div class="large-6 columns required">
                <label>Province
                  <select name="province">
                    <option value="Alberta">Alberta</option>
                    <option value="British Columbia">British Columbia</option>
                    <option value="Manitoba">Manitoba</option>
                    <option value="New Brunswick">New Brunswick</option>
                    <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                    <option value="Nova Scotia">Nova Scotia</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Prince Edward Island">Prince Edward Island</option>
                    <option value="Quebec">Quebec</option>
                    <option value="Saskatchewan">Saskatchewan</option>
                    <option disabled="disabled" value="Northwest Territories">Northwest Territories</option>
                    <option disabled="disabled" value="Nunavut">Nunavut</option>
                    <option disabled="disabled" value="Yukon">Yukon</option>
                  </select>
                </label>
              </div>
            </div>
        </div>

      <div class="panel">
            <h4>Gender</h4>
            <p>How do you identify?</p>
            <div class="row">
              <div class="large-12 columns required" id="gender-input">
                <input type="radio" name="gender" value="Females" id="Females"><label for="Females">Female</label>
                <input type="radio" name="gender" value="Males" id="Males"><label for="Males">Male</label>
              </div>
            </div>
      </div>

      <div class="panel">
          <h4>Health Indicators</h4>
          <p>Tell us about your health status.</p>
            <div class="row">
              <div class="large-12 columns">
                <label> In general, would you say your health is: </label>
                <input type="radio" name="general-health" value="Excellent" id="Excellent"><label for="Excellent">Excellent</label>
                <input type="radio" name="general-health" value="Good" id="Good"><label for="Good">Good</label>
                <input type="radio" name="general-health" value="Fair" id="Fair"><label for="Fair">Fair</label>
                <input type="radio" name="general-health" value="Poor" id="Poor"><label for="Poor">Poor</label>
                <input type="radio" name="general-health" value="VeryPoor" id="VeryPoor"><label for="VeryPoor">Very Poor</label>
              </div>
            </div>

            <div class="row">
              <div class="large-12 columns">
                <label>Do you have any long-term disabilities, health problems or mental health problems (health conditions that have lasted or are expected to last 6 months or over)?</label>
                <input type="radio" name="longterm-dis" value="Yes" id="Yes"><label for="Yes">Yes</label>
                <input type="radio" name="longterm-dis" value="No" id="No"><label for="No">No</label>
              </div>
            </div>

            <div class="row">
              <div class="large-12 columns">
                <label>During the last 12 months, how often did you drink enough to feel intoxicated or drunk, that is, when your speech was slurred, you felt unsteady on your feet, or you had blurred vision? </label>
                <input type="radio" name="drunk" value="Everyday" id="Everyday"><label for="Everyday">Everyday</label>
                <input type="radio" name="drunk" value="Occasionally" id="Occasionally"><label for="Occasionally">Occasionally</label>
                <input type="radio" name="drunk" value="Never" id="Never"><label for="Never">Never</label>
              </div>
            </div>

            <div class="row">
              <div class="large-12 columns">
                <label>How often do you smoke cigarettes?</label>
                <input type="radio" name="cigarettes" value="Everyday" id="Everyday"><label for="Everyday">Everyday</label>
                <input type="radio" name="cigarettes" value="Occasionally" id="Occasionally"><label for="Occasionally">Occasionally</label>
                <input type="radio" name="cigarettes" value="Never" id="Never"><label for="Never">Never</label>
              </div>
            </div>

            <div class="row">
              <div class="large-12 columns">
                <label>Does anyone smoke inside your home?</label>
                <input type="radio" name="smoke-home" value="Yes" id="Yes"><label for="Yes">Yes</label>
                <input type="radio" name="smoke-home" value="No" id="No"><label for="No">No</label>
              </div>
            </div>

            <div class="row">
              <div class="large-12 columns">
                <label>How often are you exposed to Second-hand smoke?</label>
                <input type="radio" name="secondhand-smoke" value="Everyday" id="Everyday"><label for="Everyday">Everyday</label>
                <input type="radio" name="secondhand-smoke" value="Occasionally" id="Occasionally"><label for="Occasionally">Occasionally</label>
                <input type="radio" name="secondhand-smoke" value="Never" id="Never"><label for="Never">Almost Never / Never</label>
              </div>
            </div>

      </div>




      <div class="panel">
        <input type="submit" value="submit"/>
      </div>      

          </form>
      </div>
  </div>
</div>
       <footer class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-6 columns">
              <p style="font-size: 70%;">© 2015 <a href="http://www.yppofbc.ca/" target="_blank" style="color: #000000;">Your Political Party of BC</a></p>
            </div>
            
            <div class="large-6 columns">
            <ul class="inline-list right">
              <li><a href="http://twitter.com/yppofbc" target="_blank"><img src="img/icons/twitter.png" alt="twitter"></a></li>
              <li><a href="http://facebook.com/yppbc" target="_blank"><img src="img/icons/facebook.png" alt="facebook"></a></li>
              <li><a href="http://instagram.com/yppofbc" target="_blank"><img src="img/icons/instagram.png" alt="instagram"></a></li>
            </ul>
            </div>
          </div>
        </div>
      </footer>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>
