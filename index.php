<?php
session_start(); 
use Ds\Set;

require "dbConfig.php";
//if the button is clicked then
if(!isset($_SESSION['articleId']) && empty($_SESSION['articleId'])) {
   $id = $dataB->findFirstId();
   $_SESSION['articleId']=$id;
}
if(!isset($_GET['articleId'])){

}else{
    $_SESSION['articleId']=$_GET['articleId'];
    if(!isset($_SESSION['ids']) && empty($_SESSION['ids'])) {
        $count=-1;
    }
    else{
        $count = count($_SESSION['ids']);
    }
    $_SESSION['ids'][$count++] = $_SESSION['articleId'];
    $_SESSION['ids']=array_unique($_SESSION['ids']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Stack Hackathon</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">
          //document.write("<?php //printArticle(1) ?>");
    </script>
</head>

<body>
    <nav>

    </nav>
    <div class="col-md-12">
        <h2 class="text-center text-info">News Articles</h2>
    </div>
        <div class="row">
        <div class="col text-center">
        <h3 class="text-info">
        All Articles</h3>
          <?php

            $items = $dataB->showAllArticles();
            foreach($items as $item){
          ?>
        <div class="card-body"><h3>
            <?php
                echo '<a  class="text-warning stretched-link" href= "index.php?articleId='.$item['id']
                .'" >'. $item['title'] .'</a> <br/>';                       
            ?></h3>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="col-6">

        <h3 class="text-center text-info">
        Article Content</h3>
        <div class="container text-center ">
          <div class="display_content">
            
           <div class="card-body"><h3><small>
              <?php

                $data=$dataB->printArticle($_SESSION['articleId']);
                echo $data['description'];

              ?>                  
              </small></h3></div>
          </div>
        </div>
      </div>
      <div class="col">
        <h3 class="text-info">
        Recent Articles</h3>
            <div class="card-body"><h3>
          <?php
            if(isset($_SESSION['ids']) && !empty($_SESSION['ids'])) {
                        $count = count($_SESSION['ids']);
                        if($count>5){
                            array_shift($_SESSION['ids']);
                        }
                    foreach($_SESSION['ids'] as $id){
                        $data=$dataB->printArticle($id);
                        echo '<a  class="text-warning stretched-link" href= "index.php?articleId='.$data['id']
                            .'" >'. $data['title'] .'</a> <br/>'; 
                        }
            }
              ?>
            </h3>
        </div>
      </div>
    </div>
</body>
</html>