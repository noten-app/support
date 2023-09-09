<?php

// Check login state
require($_SERVER["DOCUMENT_ROOT"] . "/res/php/session.php");
start_session();
require($_SERVER["DOCUMENT_ROOT"] . "/res/php/checkLogin.php");
if (!checkLogin()) header("Location: https://account.noten-app.de/login/?continue=support");

// Get config
require($_SERVER["DOCUMENT_ROOT"] . "/config.php");

// DB Connection
$con = mysqli_connect(
  config_db_host,
  config_db_user,
  config_db_password,
  config_db_name
);
if (mysqli_connect_errno()) exit("Error with the Database");

?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Support | Noten-App</title>
  <link rel="stylesheet" href="/res/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="/res/fontawesome/css/regular.min.css" />
  <link rel="stylesheet" href="/res/fontawesome/css/solid.min.css" />
  <link rel="stylesheet" href="/res/css/fonts.css" />
  <link rel="stylesheet" href="/res/css/main.css" />
  <link rel="apple-touch-icon" sizes="180x180" href="https://assets.noten-app.de/images/logo/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="https://assets.noten-app.de/images/logo/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="https://assets.noten-app.de/images/logo/favicon-16x16.png" />
  <link rel="mask-icon" href="https://assets.noten-app.de/images/logo/safari-pinned-tab.svg" color="#eb660e" />
  <link rel="shortcut icon" href="https://assets.noten-app.de/images/logo/favicon.ico" />
  <meta name="apple-mobile-web-app-title" content="Noten-App" />
  <meta name="application-name" content="Noten-App" />
  <meta name="msapplication-TileColor" content="#282c36" />
  <meta name="msapplication-TileImage" content="https://assets.noten-app.de/images/logo/mstile-144x144.png" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <main>
    <!-- Q1 -->
    <div class="questions question" id="question-root">
      What's the Problem about?
    </div>
    <select class="inputs input" id="input-root">
      <option value="account">My Account</option>
      <option value="app">Application</option>
      <option value="beta">Beta</option>
      <option value="other">Other</option>
    </select>
    <!-- Q2 -->
    <div class="questions question" id="question-account">
      What do you have a Problem with?
    </div>
    <select class="inputs input" id="input-account">
      <option value="account-login">I can't log in</option>
      <option value="account-email">I want to change my E-Mail</option>
      <option value="account-other">Other</option>
    </select>
    <div class="questions question" id="question-app">
      What Feature do you have a Problem with?
    </div>
    <select class="inputs input" id="input-app">
      <option value="app-subjects">Subjects</option>
      <option value="app-homework">Homework</option>
      <option value="app-grades">Grades</option>
      <option value="app-other">Other</option>
    </select>
    <div class="questions question" id="question-beta">
      What do you have a Problem with?
    </div>
    <select class="inputs input" id="input-beta">
      <option value="beta-login">I can't register</option>
      <option value="beta-other">Other</option>
    </select>
    <div class="questions question" id="question-other">
      What do you want to do?
    </div>
    <select class="inputs input" id="input-other">
      <option value="other-feature">I want to recommend a new feature</option>
      <option value="other-bug">I want to report a bug</option>
      <option value="other-disclosure">
        I want to open a Responsible Disclosure Process
      </option>
      <option value="other-other">Other</option>
    </select>
    <!-- QL -->
    <div class="questions question" id="question-last-text">
      Please describe your Problem<br>
      <span class="small">You can write in German or English</span>
    </div>
    <textarea class="inputs input" id="input-last-text" name="" cols="30" rows="10"></textarea>

    <!-- Other controls -->
    <div class="control-back" id="control-back">
      <i class="fa-solid fa-house"></i>
    </div>
    <div class="control-submit" id="control-submit">
      <i class="fa-solid fa-forward-step"></i>
    </div>
    <div class="control-messages"></div>
  </main>
  <script src="https://assets.noten-app.de/js/jquery/jquery-3.6.1.min.js"></script>
  <script src="questions.js"></script>
</body>

</html>