<?php include "config.php "; ?>
<?php
$search = $_GET['page'];
$sql = "SELECT * FROM books where book_name Like '%$search%'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "con failed";
} elseif ($search) {
    if (mysqli_num_rows($result) > 0) {

        if ($result) {

            while ($row = mysqli_fetch_assoc($result)) { ?>

                <img id="blue" class="blue active" src="uploaded_img/<?php echo $row['book_img']; ?>" alt="blue">
                <br>
                <?php echo  $row['book_Description']; ?>

<?php   }
        }
    }
}
?>