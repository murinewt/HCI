<?php

require_once "dbConfig.php";
//if the button is clicked then
if(isset($_POST["addArticle"]))
{
    //the data is sent to the database
    $articleName = $_POST['articleName'];
    $articleDesc = $_POST['description'];
    $display = 'true';
    $dataB->articleSave($articleName, $articleDesc, $display);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCI</title>
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
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <h2 class="text-center text-info">(Articles)</h2>
        </div>
        <div class="text-center col-12 col-sm-6 col-md-6 site-form">
           
        </div>
         <h2 class="text-center text-info">Add an Article</h2>
            <form method='post'>
                <!-- form to fill in the details -->
                <div class="form-group">
                    <label class="sr-only" for="articleName">Article Name</label><input class="form-control" type="text" name="articleName" placeholder="Article Name" autofocus="" required="yes" >
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm">
                            <label class="sr-only" for="description">Article Content</label>
                            <textarea class="form-control" rows="10" cols="70" required="yes" name="description" placeholder="Write an Article">Write an Article</textarea>
                        </div>
                    </div>
                </div>

                <button class="btn btn-info" type="submit" name="addArticle" id="form-btn">Add Article </button>
            </form>
    </div>
</body>

</html>