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
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300' rel='stylesheet' type='text/css'>
  </head>
  <body class="survey">
       
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

      <div class="row banner">
        <div class="large-12 column.large-centered">
          <div class="instructions">
           <p>Work your way through the app answering questions about your lifestyle. There are a few questions about you and your location that will be used to incorporate government data related to your region.<br/><br/>Please choose the best answer available for each question.</p>
          </div> 
        </div>
      </div>
      <br>
      <div class="row">
      <form action="score.php" method="POST">
        
        <div class="row">
          <div class="medium-12 columns">
            <h4>Your Vital Stats</h4>
          </div>
        </div>
        
        <div class="row">
          <div class="medium-2 columns">
              <label>Location</label>
          </div>
          <div class="medium-5 columns">
              <input name="city" placeholder="city" type="text" />
          </div>
          <div class="medium-5 columns required">
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
          </div>
         </div>
   
        <div class="row">
          <div class="medium-2 columns">
            <label>Gender</label>
          </div>
          <div class="medium-10 columns" id="gender-input">
            <input type="radio" name="gender" value="Females" id="Females"><label for="Females">Female</label>
            <input type="radio" name="gender" value="Males" id="Males"><label for="Males">Male</label>
            <input type="radio" name="gender" value="Custom" id="Custom">
            <input type="text" name="gender-custom" value="" id="Custom" placeholder="fill in the blank" style="max-width: 10rem;"> 
          </div>
        </div>

        <div class="row">
          <div class="medium-2 columns">
            <label>Age</label>
          </div>
          <div class="medium-10 columns">
            <input type="text" name="age" value="" id="Years" class="left inline" placeholder="years">
          </div>
        </div>

        <div class="row">
          <div class="medium-2 columns">
            <label>Height</label>
          </div>
          <div class="medium-5 columns">
            <input type="text" name="height-ft" value="" id="Feet" placeholder="feet">
          </div>
          <div class="medium-5 columns">
            <input type="text" name="height-in" value="" id="Inches" placeholder="inches">
          </div>
        </div>

        <div class="row">
          <div class="medium-2 columns">
            <label>Weight</label>
          </div>
          <div class="medium-10 columns">
            <input type="text" name="weight" value="" id="Pounds" placeholder="lbs">
          </div>
        </div>

      <div class="row">
        <div class="medium-12 columns">
          <h4>Health Indicators</h4>
        </div>
      </div>

      <div class="row">
          <div class="medium-12 columns">
                  <label>In general, would you say your health is:
                    <select name="general-health" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>s
                      <option value="20">Excellent</option>
                      <option value="15">Good</option>
                      <option value="10">Fair</option>
                      <option value="5">Poor</option>
                      <option value="0">Very Poor</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
                  <label>Do you have any long-term disabilities, health problems or mental health problems (health conditions that have lasted or are expected to last 6 months or over)?
                    <select name="longterm-dis" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">Yes</option>
                      <option value="20">No</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
                  <label>During the last 12 months, how often did you drink enough to feel intoxicated or drunk, that is, when your speech was slurred, you felt unsteady on your feet, or you had blurred vision?
                    <select name="drunk" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">Frequently</option>
                      <option value="2.5">Occasionally</option>
                      <option value="5">Never</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
                  <label>How often do you smoke cigarettes?
                    <select name="cigarettes" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">Everyday</option>
                      <option value="2.5">Occasionally</option>
                      <option value="5">Never</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
                  <label>Does anyone smoke inside your home?
                    <select name="smoke-home" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">Yes</option>
                      <option value="5">No</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
                  <label>How often are you exposed to Second-hand smoke?
                    <select name="secondhand-smoke" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">Everyday</option>
                      <option value="2.5">Occasionally</option>
                      <option value="5">Never</option>
                    </select>
                  </label>
          </div>
        </div>
        <div class="row">
        <div class="medium-12 columns">
          <h4>Ecological Diversity and Resilience</h4>
        </div>
      </div>

      <div class="row">
          <div class="medium-12 columns">
                  <label>Do you feel responsible for conserving the natural environment?
                    <select name="environmentalism" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>s
                      <option value="15">Highly responsible</option>
                      <option value="25">Somewhat responsible</option>
                      <option value="15">A little responsible</option>
                      <option value="0">Not at all responsible</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
          <div class="medium-12 columns">
           <h5>In the past 12 months, how often did you:</h5>
          </div>
          <div class="medium-12 columns">
                  <label>Visit green spaces or nature parks:
                  <select name="parks" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="30">Always</option>
                      <option value="20">Frequently</option>
                      <option value="10">Sometimes</option>
                      <option value="0">Never</option>
                    </select>
                  </label>
          </div>
        </div>

        <div class="row">
           <div class="medium-12 columns">
                  <label>Travel Sustainably (Walk, bicycle, public transport):
                  <select name="travel" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="30">Always</option>
                      <option value="20">Frequently</option>
                      <option value="10">Sometimes</option>
                      <option value="0">Never</option>
                    </select>
                  </label>
          </div>
        </div>
<<<<<<< HEAD
        <div class="row">
        <div class="medium-12 columns">
          <h4>Psychological Wellbeing</h4>
        </div>
      </div>

      <div class="row">
          <div class="medium-12 columns">
                  <label>On a scale of 0 to 10, I consider myself:
                   <select name="parks" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="0">0/option>
                      <option value="2">1</option>
                      <option value="4">2</option>
                      <option value="6">3</option>
                      <option value="8">4</option>
                      <option value="10">5</option>
                      <option value="12">6</option>
                      <option value="14">7</option>
                      <option value="16">8</option>
                      <option value="18">9</option>
                      <option value="20">10</option>
                    </select>
                  </label>
          </div>
        </div>
        <div class="row">
           <div class="medium-12 columns">
                  <label>How much do you enjoy life?
                  <select name="travel" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="5">Not at all</option>
                      <option value="10">A little</option>
                      <option value="15">Quite a lot</option>
                      <option value="20">An extreme amount</option>
                    </select>
                  </label>
          </div>
        </div>
        <div class="row">
           <div class="medium-12 columns">
                  <label>During the last year, would you describe your life as:
                  <select name="travel" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="5">Very stressful</option>
                      <option value="10">Moderately stressful</option>
                      <option value="15">Somewhat stressful</option>
                      <option value="20">Not at all stressful</option>
                    </select>
                  </label>
          </div>
        </div>
        <div class="row">
           <div class="medium-12 columns">
                  <label>How many people are so close to you that you can count on them if you are sick?
                  <select name="travel" autocomplete="off">
                      <option value="" selected="selected" disabled="disabled">Select</option>
                      <option value="20">More than 8</option>
                      <option value="17.5">6 to 8</option>
                      <option value="15">3 to 5</option>
                      <option value="10">1 to 2</option>
                      <option value="0">none</option>
                    </select>
                  </label>
          </div>
        </div>

        
=======

>>>>>>> 1bd5c3b0b88f834609a61480695e89d3a6225af3
      <div class="row">
        <div class="medium-12 columns" style="text-align: center;">
          <input class="medium alert radius button" type="submit" value="Submit"/>
        </div>
      </div>      
    </form>
</div>


<hr>
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
    <script src="js/happy.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>
