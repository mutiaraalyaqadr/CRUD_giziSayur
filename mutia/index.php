<?php
session_start();
include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA GIZI DALAM SAYURAN</title>
    <link rel="icon" href="gambar/icon.png" type="image/x-icon">
    <style>
        * {
            font-family: "Trebuchet MS";
            box-sizing: border-box;
        }

        body {
            background-image: url('gambar/pv.png');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            margin: 0;
        }

        h1 {
            text-transform: uppercase;
            color: purple;
            padding-top: 2rem;
            text-shadow: 4px 4px 7px rgba(102, 0, 102, 0.3);
            font-size: 40px;
        }

        table {
            border: 1px solid #ddeeee;
            border-collapse: collapse;
            border-spacing: 0;
            margin: 20px auto 20px auto;
            width: 89.2%;
        }

        table thead th {
            background-color: plum;
            border: 1px solid #ddeeee;
            color: #0E0E0E;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-size: 20px;
        }

        table tbody td {
            border: 1px solid #ddeeee;
            color: #333;
            padding: 20px;
            background-color: #fff;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        table tbody tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        table tbody tr:hover td {
            background-color: #dcdcdc;
        }

        .scale-btn {
            transition: transform 0.3s ease;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
        }

        .scale-btn img {
            width: 100%;
            height: auto;
        }

        .scale-btn:hover {
            transform: scale(1.2);
        }


        .modal {
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            position: absolute;
            top: -100%;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fefefe;
            width: min(calc(100% - 2rem), 400px);
            border-radius: .25rem;
            overflow: hidden;
            transition: all .5s ease-in-out;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .modal.active .modal-content {
            top: 50px;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: purple;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .modal-header h3 {
            color: white;
        }

        .modal-body {
            padding: 1rem;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .modal-body form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .modal-body .form-group {
            display: flex;
            flex-direction: column;
            gap: .25rem;
        }

        .modal-body .form-group input {
            padding: .5rem;
        }

        .modal-body form button {
            padding: .75rem;
            background-color: purple;
            border: none;
            outline: none;
            border-radius: .25rem;
            color: white;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .modal-body form button:hover,
        .modal-body form button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .alert {
            width: calc(100% - 2rem);
            margin: 0 1rem;
            padding: .25rem 2rem;
            background-color: #A7E47C;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: .25rem;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .alert span {
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }

        .button-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 0 1rem;
            margin-left: 3rem;
        }

        .download-btn {
            transition: transform 0.3s ease;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            margin-right: 3rem;
        }

        .download-btn img {
            width: 100%;
            height: auto;
        }

        .download-btn:hover {
            transform: scale(1.2);
        }

        .delete-btn {
            background-color: red;
            display: inline-block;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            color: white;
            text-decoration: none;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            transition: color 0.3s;
        }

        .delete-btn:focus,
        .delete-btn:hover {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }


        .action-btn {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .action-btn img {
            transition: transform 0.3s ease;
        }

        .action-btn img:hover {
            transform: scale(1.2);
        }

        table thead th#thAir,
        table tbody td#tdAir,
        table thead th#thProtein,
        table tbody td#tdProtein,
        table thead th#thLemak,
        table tbody td#tdLemak {
            width: 13%;
        }

        table thead th#thAir,
        table thead th#thLemak,
        table thead th#thProtein {
            width: 13%;
        }

        table tbody td#tdAir,
        table tbody td#tdProtein,
        table tbody td#tdLemak {
            width: 13%;
        }

        .modal-body form button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .invalid-feedback {
            color: red;
            font-size: 14px;
            font-weight: 600;
        }

        .hidden {
            display: none;
        }
    </style>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body>
    <center>
        <h1>DATA GIZI DALAM SAYURAN</h1>
    </center>
    <div class="button-container">
        <a href="#" onclick="toggleModalTambah()" class="scale-btn">
            <img src="gambar/addf.png" alt="Tambah Data">
        </a>

        <a href="data_gizi_sayur.php" class="download-btn" target="_blank">
            <img src="gambar/printf.png" alt="Print">
        </a>
    </div>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert">
            <p><?= $_SESSION['success']; ?></p>
            <span onclick="closeAlert()">&times;</span>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Gizi</th>
                <th>Macam Sayuran</th>
                <th id="thAir">Air (%)</th>
                <th id="thProtein">Protein (%)</th>
                <th id="thLemak">Lemak (%)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM tb_gizi ORDER BY `no` ASC";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                die("Query Error : " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['kode']; ?></td>
                    <td><?= $row['sayur']; ?></td>
                    <td id="tdAir"><?= $row['air']; ?></td>
                    <td id="tdProtein"><?= $row['protein']; ?></td>
                    <td id="tdLemak"><?= $row['lemak']; ?></td>
                    <td class="action-btn">
                        <a href="#" data-modal="modalEdit<?= $row['no']; ?>" onclick="showModalEdit(event)">
                            <img src="gambar/editfix.png" alt="Ubah" width="45" height="45">
                        </a>

                        <!-- Modal Edit -->
                        <div id="modalEdit<?= $row['no']; ?>" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Edit Data</h3>
                                    <span class="close" onclick="closeModal()">&times;</span>
                                </div>
                                <div class="modal-body">
                                    <form action="proses_edit.php" method="POST" style="display: flex; flex-direction: column; gap: 1rem;">
                                        <input type="hidden" name="no" value="<?= $row['no']; ?>">
                                        <div class="form-group">
                                            <label>Kode Gizi</label>
                                            <input type="text" id="kodeEdit" name="kode" placeholder="Kode Gizi" required value="<?= $row['kode']; ?>">
                                            <span class="invalid-feedback hidden">Kode tersebut sudah digunakan!</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Macam Sayuran</label>
                                            <input type="text" name="sayur" placeholder="Macam Sayuran" required value="<?= $row['sayur']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Air (%)</label>
                                            <input type="text" name="air" placeholder="Air (%)" required value="<?= $row['air']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Protein (%)</label>
                                            <input type="text" name="protein" placeholder="Protein (%)" required value="<?= $row['protein']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Lemak (%)</label>
                                            <input type="text" name="lemak" placeholder="Lemak (%)" required value="<?= $row['lemak']; ?>">
                                        </div>
                                        <button type="submit" class="update-btn">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="showModalHapus(event)" data-modal="modalHapus<?= $row['no']; ?>">
                            <img src="gambar/delf.png" alt="Hapus" width="48" height="48">
                        </a>
                        <!-- Modal Hapus -->
                        <div id="modalHapus<?= $row['no']; ?>" class="modal">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Hapus Data</h3>
                                    <span class="close" onclick="closeModal()">&times;</span>
                                </div>
                                <div class="modal-body">
                                    <p style="margin: 0 0 1rem;">Apakah Anda yakin ingin menghapus data ini?</p>
                                    <a href="proses_hapus.php?no=<?= $row['no']; ?>" class="delete-btn">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>

        </tbody>
    </table>

    <!-- Modal Tambah -->
    <div id="modalTambah" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Data</h3>
                <span class="close" onclick="toggleModalTambah()">&times;</span>
            </div>
            <div class="modal-body">
                <form action="proses_tambah.php" method="POST">
                    <div class="form-group">
                        <label>Kode Gizi</label>
                        <input type="text" id="kode" name="kode" placeholder="Kode Gizi" required>
                        <span class="invalid-feedback hidden">Kode tersebut sudah digunakan!</span>
                    </div>
                    <div class="form-group">
                        <label>Macam Sayuran</label>
                        <input type="text" name="sayur" placeholder="Macam Sayuran" required>
                    </div>
                    <div class="form-group">
                        <label>Air (%)</label>
                        <input type="text" name="air" placeholder="Air (%)" required>
                    </div>
                    <div class="form-group">
                        <label>Protein (%)</label>
                        <input type="text" name="protein" placeholder="Protein (%)" required>
                    </div>
                    <div class="form-group">
                        <label>Lemak (%)</label>
                        <input type="text" name="lemak" placeholder="Lemak (%)" required>
                    </div>
                    <button type="submit" disabled class="tambah-btn">Tambah</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModalTambah() {
            document.getElementById('modalTambah').classList.toggle('active');
        }

        function showModalEdit(event) {
            const id = event.target.closest('a').dataset.modal;
            document.getElementById(id).classList.toggle('active');
        }

        function closeModal() {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.classList.remove('active');
            });
        }

        function closeAlert() {
            document.querySelector('.alert').style.display = 'none';
        }

        function showModalHapus(event) {
            const id = event.target.closest('a').dataset.modal;
            document.getElementById(id).classList.toggle('active');
        }

        const inputKode = document.getElementById('kode');
        const tambahBtn = document.querySelector('.tambah-btn');

        inputKode.addEventListener('keyup', function() {
            const kode = this.value;
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const result = xhr.responseText;
                    if (result == '1') {
                        tambahBtn.disabled = true;
                        inputKode.closest('.form-group').querySelector('.invalid-feedback').classList.remove('hidden');
                    } else {
                        tambahBtn.disabled = false;
                        inputKode.closest('.form-group').querySelector('.invalid-feedback').classList.add('hidden');
                    }
                }
            }
            xhr.open('GET', 'cek_kode.php?kode=' + kode, true);
            xhr.send();
        });

        const inputKodeEdit = document.querySelectorAll('input[id^="kodeEdit"]');
        const updateBtn = document.querySelectorAll('.update-btn');

        inputKodeEdit.forEach(input => {
            input.addEventListener('keyup', function() {
                const kode = this.value;
                const no = this.closest('form').querySelector('input[name="no"]').value;
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        const result = xhr.responseText;
                        if (result == '1') {
                            updateBtn.forEach(btn => {
                                btn.disabled = true;
                            });
                            input.closest('.form-group').querySelector('.invalid-feedback').classList.remove('hidden');
                        } else {
                            updateBtn.forEach(btn => {
                                btn.disabled = false;
                            });
                            input.closest('.form-group').querySelector('.invalid-feedback').classList.add('hidden');
                        }
                    }
                }
                xhr.open('GET', 'cek_kode.php?kode=' + kode + '&no=' + no, true);
                xhr.send();
            });
        });
    </script>
</body>

</html>
