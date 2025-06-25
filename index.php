
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>lab task</title>
    <link rel="icon" type="image/x-icon" href="images/icooo.jpg" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <img
      src="images/html.png"
      alt="this is a logo"
      height="70px"
      class="img"
    />
    <h1 class="heading">AQI</h1>
    <div class="box">
      <div class="left-stack">
        <div class="orange">
          <form  action="confirm1.php" method="post" onsubmit=" return validate()">
            <div>
              <p id="messageBox"></p>
              <p id="errorMessage"></p>
            </div>
            <div>
              <label for="name" style="margin-left: 1.5ch;">Name</label>
            </div>
            <div>
              <input
                type="text"
                id="name"
                name="name"
                class="registration"
                placeholder="Enter your name"
              />
            </div>

            <div>
              <label for="password" style="margin-left: 1.5ch;">Password</label>
            </div>
            <div>
              <input
                type="password"
                id="password"
                name="password"
                class="registration"
                placeholder="Enter your password"
              />
            </div>

            <div>
              <label for="repassword" style="margin-left: 1.5ch;">Confirm Password</label>
            </div>
            <div>
              <input
                type="password"
                id="repassword"
                name="repassword"
                class="registration"
                placeholder="Re-enter your password"
              />
            </div>
            <div>
              <label style="margin-left: 1.5ch;"></tab>Gender</label><br />
              <input type="radio" name="gender" id="male" value="male" style="margin-left: 1.5ch;"/>
              <label for="male">Male</label>
              <input type="radio" name="gender" id="female" value="female" style="margin-left: 1ch;"/>
              <label for="female">Female</label>
            </div>

            <div>
              <br><label for="email" style="margin-left: 1.5ch;">Email</label>
            </div>
            <div>
              <input
                type="email"
                id="email"
                name="email"
                class="registration"
                placeholder="Enter your email"
              />
            </div>

            <div>
              <label for="DOB" style="margin-left: 1.5ch;">Date of Birth</label>
            </div>
            <div>
              <input type="date" name="date" class="registration" id="DOB" />
            </div>

            <div>
              <label for="division" style="margin-left: 1.5ch;">Choose your division:</label>
              <select id="division" name="division" class="registration">
                <option value="dhaka">Dhaka</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="sylhet">Sylhet</option>
                <option value="mymensingh">Mymensingh</option>
                <option value="rongpur">Rongpur</option>
                <option value="khulna">Khulna</option>
              </select>
            </div>

            <div>
              <label for="color" style="margin-left: 1.5ch;"> Select a color</label>
              <input type="color" name="color" id="color">
            </div>

            <div class="button_container">
              <button type="submit" class="button" name="submit_registration">Sign in</button>
            </div>
          </form>
        </div>

        <div class="gray">
          <form  action="login.php" method="post">
            <div class="formgroup">
              <label for="email" style="margin-left: 1.5ch;"> Email</label>
              
            </div>
            <div>
              <input
                type="text"
                id="login_email"
                name="email"
                class="login"
                placeholder="Enter your email"
              />
              
            </div>
            <div class="formgroup">
              <label for="login_password" style="margin-left: 1.5ch;">Password</label>
              
            </div>
            <div>
              <input
                type="login_password"
                id="login_password"
                name="password"
                class="login"
                placeholder="Enter your password"
              />

            </div>
            <div class="button_container">
              <button type="submit" class="button" name="submit_login">log in</button>
            </div>
          </form>
        </div>
      </div>

      <div class="blue">
        <div class="table_container">
          <table class="blur">
            <caption class="table_class">AQI TABLE</caption>
            <tr><th>City</th><th>AQI</th></tr>
            <tr><td>Dhaka</td><td>150</td></tr>
            <tr><td>Chittagong</td><td>120</td></tr>
            <tr><td>Rajshahi</td><td>90</td></tr>
            <tr><td>Sylhet</td><td>80</td></tr>
            <tr><td>Khulna</td><td>110</td></tr>
            <tr><td>Mymensingh</td><td>75</td></tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
