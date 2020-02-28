<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Drinkathon </title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>


<body>
<nav class="main-nav">
  <ul>
  <li><a href="/"> Home </a></li>
  <li><a href="/about"> About </a></li>
  <li><a href="/questions"> Questions </a></li>
  <?php if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']){ ?>
  <li><a href="/register"> Register </a></li>
  <li><a href="/login"> Login </a></li>
  <?php } else {
    $sql='select * from users where id='.$_SESSION['team_id'];
    if($res = $db->query($sql)){
      $username = $res->fetch_assoc()['username'];
    }
    ?>
  <li><a href="/team"> Team </a></li>
  <li><a href="/choose_question"> Submit</a></li>
  <li><a href="/logout"> Logout: <?php echo $_SESSION['team_name']; ?> </a></li>

  <?php } ?>
</ul>
</nav>
