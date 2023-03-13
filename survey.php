
<?php require 'questions.php';?>

<?php 

   if(isset($_GET['id'])){

     $surveyId = $_GET['id'];


   } 

?>
<form action="" method="POST">

<?php foreach($questions as $question) : ?>

    <?php if($surveyId == $question['survey_id']): ?>

    <p><?= $question['title'] ?></p>

        <?php foreach($forms as $field): ?>

            <?php if($question['form_id'] == $field['id']): ?>


                <!-- If the tag is an input tag -->
                <?php if($field['tag'] == "input"): ?>

                    <div>
                        <input type="<?= $field['type'] ?>"  placeholder="<?= $question['title'] ?>">
                    </div>

                <?php endif ?>


                <?php if($field['tag'] == "textarea"): ?>

            
                    <textarea placeholder="<?= $question['title'] ?>" > </textarea>
            

                <?php endif ?>


            <?php endif ?>

        <?php endforeach ?>

    <?php endif ?>


<?php endforeach ?>




<button type="submit" style="margin-top: 11px; display:block;">Submit Survey</button>

</form>
