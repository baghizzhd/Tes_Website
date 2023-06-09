<!DOCTYPE html>
<html>
<head>
    <title>Master Data Inventory</title>
</head>
<body>
    <h1>Master Data Inventory</h1>

    <form method="POST" action="inventory.php">
        <h3>Tambah Inventory</h3>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" required>
        <label for="stok">Stok:</label>
        <input type="number" name="stok" required>
        <button type="submit" name="insert">Tambah</button>
    </form>

    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Action</th>
        </tr>
        <?php include 'inventory.php'; ?>
        <?php foreach ($inventoryList as $inventory) { ?>
            <tr>
                <td><?php echo $inventory['nama']; ?></td>
                <td><?php echo $inventory['harga']; ?></td>
                <td><?php echo $inventory['stok']; ?></td>
                <td>
                    <form method="POST" action="inventory.php">
                        <input type="hidden" name="nama" value="<?php echo $inventory['nama']; ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
