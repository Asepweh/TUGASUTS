<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }

        a:hover {
            color: #0056b3;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .options {
            text-align: center;
        }

        .options a {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1>Data Produk</h1>
    <table border="1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect, "SELECT * FROM products");
                $no = 1;

                while ($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td>
                        <?php if (!empty($row['image'])) : ?>
                            <a href="<?= $row['image']; ?>" target="_blank">Unduh</a>
                        <?php endif; ?>
                    </td>
                    <td class="options">
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                        <a href="backend/delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>
