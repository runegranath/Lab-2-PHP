<?php
$page_title = "Bucketlist";
include("includes/header.php");

$bucketlist = new BucketList();

// Variabler för feedback/felmeddelanden 
$message = "";
$error = "";

// Radering
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Gör om till heltal för säkerhets skull

    if ($bucketlist->deleteItem($id)) {
        $message = "Punkten har raderats.";
    } else {
        $error = "Kunde inte radera punkten.";
    }
}

// formulärinmatning
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? "";
    $description = $_POST['description'] ?? "";
    $priority = intval($_POST['priority'] ?? 0);

    if ($bucketlist->addItem($name, $description, $priority)) {
        $message = "Ny punkt har lagts till!";
    } else {
        $error = "Alla fält måste fyllas i korrekt (inga tomma värden tillåts).";
    }
}

$items = $bucketlist->getItems();
?>

<h1>Min Bucketlist</h1>

<!-- Visa bekräftelse- eller felmeddelande om något hänt -->
<?php if (!empty($message)): ?>
    <p class="msg-success"><?= htmlspecialchars($message); ?></p>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <p class="msg-error"><?= htmlspecialchars($error); ?></p>
<?php endif; ?>

<!-- Formulär -->
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

<hr>

<!-- Utskrift av listan från databasen -->
<section>
    <h2>Mina sparade mål (<?= count($items); ?> st)</h2>

    <?php if (empty($items)): ?>
        <p>Din bucketlist är tom just nu.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Prio</th>
                    <th>Mål</th>
                    <th>Beskrivning</th>
                    <th>Tillagd</th>
                    <th>Åtgärd</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><strong><?= htmlspecialchars($item['priority']); ?></strong></td>
                        <td><?= htmlspecialchars($item['name']); ?></td>
                        <td><?= htmlspecialchars($item['description']); ?></td>
                        <td><?= htmlspecialchars($item['created_at']); ?></td>
                        <td>
                            <a href="bucketlist.php?delete=<?= $item['id']; ?>" 
                               class="button button-outline"
                               onclick="return confirm('Är du säker på att du vill radera denna punkt?');">
                               Radera
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</section>

<?php include("includes/footer.php"); ?>