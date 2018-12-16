
<!DOCTYPE html>
<html>
<head>
<style>
  #previousorders {
    width: 70%;
    border: dashed 2px black;
    background-color: silver;
    padding: 10px;
  }
  #previousorders p {
      padding: 0px;
      margin-top: 0px;
      margin-bottom: 0px;
      font-family: monospace;
    }
  #container {
    width: 80%;
    padding: 10px;
    background-color: LightSkyBlue;
    margins: auto;
    border: solid 5px black;
    font-size: 1.25em;
  }
  .orderitem {
    color: blue;
    font-family: monospace;
    font-size: 1.5em;
  }
  #message  {
    background-color: silver;
    border: 2px black solid;
    font-family: monospace;
    font-size: 1.24em;
    height: 100px;
    width: 50%;
  }
</style>
</head>
<body>
  <?php
  /* turn on error message for debugging */
  ini_set('display_errors', 1); # only need to call these functions
  error_reporting(E_ALL);       # one time

  /* REMOVE comments to see all data passed to this PHP program, this is useful for debugging.
    print_r($_GET);
    */

  /* Recall all data is passed from the form to this PHP file as an associative array */
  /* that is defined in variable $_GET.  This is a simple example to help you get
     started. */
   /* $name = $_GET["name"];*/
   if ( isset($_GET["name"]) ) {
     $name = $_GET["name"];
    }
   else {
     $name = false;
    }
   if ( isset($_GET["sizeandprice"]) ) {
          $sizeandprice = $_GET["sizeandprice"];
    }
   else {
          $sizeandprice = false;
    }

    if ( isset($_GET["color"]) ) {
          $color = $_GET["color"];
    }
    else {
          $color = false;
    }
    if ( isset($_GET["cardtype"]) ) {
          $cardtype= $_GET["cardtype"];
    }
    else {
          $cardtype = false;
    }
    if ( isset($_GET["cardnumber"]) ) {
          $cardnumber = $_GET["cardnumber"];
    }
    else {
          $cardnumber = false;
    }
    if ( isset($_GET["date"]) ) {
          $date = $_GET["date"];
    }
    else {
          $date = false;
    }
   /* Since "gift" is a checkbox, it ,might not be set by the user.  in this case the variable will not be defined .
    You can use PHP "isset()" function to test if it was set or not in the $_GET. */
    if ( isset($_GET["gift"]) ) {
      $gift = $_GET["gift"];
      $message = $_GET["message"];
    }
    else {
      $gift = false;
      $message = "";
    }
    /*  You should assign the rest of the variables here, in particular there are several other parmemeters passed from
    the Forms: color, size and price, credit card type, card number, date.  Look at the form names carefully. */

  ?>

   <div id="container">
   <?php
     /* put your code here.  */
     /* You can access any variables defined in the previous <?php ... ?> code */
     /* You print, recall that the variables from the Forms need to be printed using */
     /* the style class order item defined above.  */
    print "<h2> Confirmation of your &quotCat Fails Video&quot T-shirt order! </h2> \n";
    print "<p> <span class=\"orderitem\">Name: $name </p> \n";
    print "<p> <span class=\"orderitem\">Item: $sizeandprice </p> \n";
    print "<p> <span class=\"orderitem\">Color: $color </p> \n";
    print "<p> <span class=\"orderitem\">Credit card: $cardtype </p> \n";
    print "<p> <span class=\"orderitem\">Card number: $cardnumber </p> \n";
    print "<p> <span class=\"orderitem\">Expiration date: $date </p> \n";
    /* you also need to write to the file "orders.txt" the string containing the
       following info:  name, size and price, color, cardnumber */
    $information = $name.","." ".$sizeandprice.","." ".$color.","." ".$cardnumber;# code...
    file_put_contents("orders.txt","\n".$information,FILE_APPEND);

      /* if you print out the gift message, use class "message" defined above - see Lab document */
      # code...
    print "<p> Gift Message </p> \n";
    print "<p id=\"message\">$message </p> \n";
      ?>

  <div id="previousorders">
    <h2> Previous Orders </h2>
    <?php
      $ordersFile = file("orders.txt");
      /* This is an alternative loop syntax when you need a loop to access
         items in an array */
      /* This creates loop for the array $ordersFile, where each time the loop
         runs the current value in $ordersFile is copied to the variable $line.
        This prints out each line of the file */
      foreach ($ordersFile as $line)
      {
        print "<p> $line </p>";
      }
    ?>
  </div>
</div> <!-- end container -->

</body>
</html>
