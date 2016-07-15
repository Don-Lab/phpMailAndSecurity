<DOCTYPE! html>
<head>
  <title>PHP Mail</title>
</head>
<body>
  <div class="row">
    <div class="col-100">
      <h1>PHP Mailing</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-100">
      <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="emailForm" onsubmit="validMail()">  <!--$_SERVER["PHP_SELF"]; refers the action to the php code in the running file-->
        Send To (Email):<input name="sEmail" type="text"><br />
        Your Email:<input name="from" type="text"><br />
        Email's Subject<input name="sub" type="text"><br />
        Comment:<textarea name="text"></textarea><br />
        <input type="submit">
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sEmail = test_input($_POST["sEmail"]);  //$_POST["nameAttribute"]; takes the value from the input
        $from = test_input($_POST["from"]); //the from is simply text that shows in the from section in the email, anything can be put here
        $sub = test_input($_POST["sub"]);
        $text = test_input($_POST["text"]);
      }
      function test_input($in) {
        $in = trim($in); //trim() removes unnecessary characters (extra space, newline, tab)
        $in = stripslashes($in); // stripslashes() removes backslashes
        $in = htmlspecialchars($in); //htmlspecialchars() is a method that replaces < and > with &lt and &gt entities to prevent Cross-site Scripting Attacks (XSS)
        return $in;
      }
        mail($sEmail, $sub, $text, "From:" . $from);
        //mail($sendToEmail, $subject, $text, "From:" . $from);
        //"From:" . $yourEmail is not required but is helpful

      //test the code with a real web server (not MAMP or WAMP) because the mailing settings are already set
      //email typically ends up in the spam folder
      //the email is sent from the server's email address. the from email shows where it says where its from like this: "person@ex1.com via serverEmail@ex2.com"
      ?>
    </div>
  </div>

  <style>
  * {
    box-sizing: border-box;
  }
  .row:after {
    clear: both;
    content: "";
    display: block;
  }
  .col-50 {
    width: 50%;
    padding: 15px;
    float: left;
  }
  .col-100 {
    width: 100%;
    padding: 15px;
    float: left;
  }
  h1, h3 {
    text-align: center;
  }
  </style>
</body>
</html>
