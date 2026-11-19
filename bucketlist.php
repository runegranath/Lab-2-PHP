<?php
$page_title = "Bucketlist";
include("includes/header.php");
?>

<h1>Min Bucketlist</h1>

<section>
    <h2>Lägg till ny punkt</h2>
    <form method="post" action="bucketlist.php">
        <label for="name">Vad vill du göra?</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Beskrivning:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="priority">Prioritet (1 = Högst, 3 = Lägst):</label>
        <select name="priority" id="priority" required>
            <option value="1">1 - Hög</option>
            <option value="2" selected>2 - Medel</option>
            <option value="3">3 - Låg</option>
        </select>

        <input type="submit" value="Lägg till i listan" class="button-primary">
    </form>
</section>

<section>
    <h2>Mina sparade mål</h2>
    <p><em></em></p>
</section>

<?php include("includes/footer.php"); ?>