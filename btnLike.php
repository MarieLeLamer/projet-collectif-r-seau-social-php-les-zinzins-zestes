<?php
$isLikedPost = isset($tableauDeLikes[$post['postId']]) ? $tableauDeLikes[$post['postId']] : false;

if ($isLikedPost) {
    echo "Vous avez déjà liké ce post";
} else {
    ?>
    <form method="post">
        <input type='submit' name="buttonL_<?php echo $post['postId']; ?>" value="Like">
    </form>
    <?php
}

if (isset($_POST['buttonL_' . $post['postId']])) {
    $postId = $post['postId'];
    $lInstructionSql = "INSERT INTO likes (user_id, post_id) "
        . "VALUES ('$connectedId', '$postId')";
    $ok = $mysqli->query($lInstructionSql);
    if (!$ok) {
        echo "Le like a échoué : " . $mysqli->error;
    } else {
        header("Location: wall.php?wall_id=$userId");
        exit();
    }
}
?>
