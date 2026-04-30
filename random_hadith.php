<?php
include "db.php";

// sirf random hadith
$q = mysqli_query($conn,"
    SELECT * FROM hadiths
    ORDER BY RAND()
    LIMIT 1
");

$h = mysqli_fetch_assoc($q);

// safety check (agar DB empty ho)
if(!$h){
    echo "<div class='hadith-card'>
            <p class='hy-subtitle'>No hadith available</p>
          </div>";
    return;
}
?>

<div class="hadith-card">

    <p class="hy-subtitle">A hadith from this week's study</p>

    <p class="hadith-arabic">
        <?php echo $h['arabic']; ?>
    </p>

    <p class="hadith-translation">
        “<?php echo $h['english']; ?>”
        <span class="hadith-ref">
        </span>
    </p>

    <a href="books.php" class="borl">
        Hadith →
    </a>

</div>