<?php require 'users.php';?>

<?php require 'questions.php';?>

<?php require "partials/header.php"; ?>

<?php require "partials/navigation.php"; ?>

<?php 

    session_start();

    $_SESSION['user_id'] = 10;

?>

<table>

    
    <?php if(isset($users) && !empty($users)): ?>
        
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>Account balance</th>
            <th>Actions</th>
        </tr>
        
        <?php foreach($users as $user): ?>
            <tr>
                <td> <?= $user['id'] ?> </td> 
                <td> <?= $user['username'] ?> </td>     
                <td> <?= $user['accountBalance'] ?> </td> 
                <td><button>Delete</button></td> 
            </tr>
        <?php endforeach ?>

       
    <?php else: ?>

        <p>No Users Found</p>

    <?php endif ?>


</table>


<form action="" method="POST">

    <select name="profile" style="margin-top: 40px; margin-bottom: 40px;">
        <option selected disabled>Select a Profile</option>
    
        <?php if(isset($profiles) && !empty($profiles)): ?>
    
            
            <?php foreach($profiles as $profile): ?>
    
                <?php if($_SESSION['user_id'] == $profile['user_id']): ?>
            
                    <option value="<?= $profile['id'] ?>"><?= $profile['username'] ?></option>
    
                <?php endif ?>
    
            <?php endforeach ?>
    
        <?php endif ?>
    
    </select>

    <button type="submit">Change Profile</button>

</form>






<?php

    $baseUrl = "https://surveyplus.co";
    $username = "@michel";
    $surveyTitle = "Number of houses with no mosquito net";

    $customLink = $baseUrl. "/" . $username . "/" .slugify($surveyTitle);

    echo $customLink;



    function slugify(string $text){

        return strtolower(str_replace(" ", "-", $text));

    }



?>

<form action="" method="POST">

<?php foreach($questions as $question) : ?>

    <p><?= $question['title'] ?></p>

    <?php foreach($forms as $field): ?>

        <?php if($question['form_id'] == $field['id']): ?>


            <!-- If the tag is an input tag -->
            <?php if($field['tag'] == "input"): ?>

                <div>
                    <<?= $field['tag'] ?> type="<?= $field['type'] ?>"  placeholder="<?= $question['title'] ?>">
                </div>

            <?php endif ?>


            <?php if($field['tag'] == "textarea"): ?>

          
                <textarea placeholder="<?= $question['title'] ?>" > </textarea>
           

            <?php endif ?>


        <?php endif ?>

    <?php endforeach ?>


<?php endforeach ?>


<button type="submit" style="margin-top: 11px; display:block;">Submit Survey</button>

</form>


<?php require "partials/footer.php"; ?>


