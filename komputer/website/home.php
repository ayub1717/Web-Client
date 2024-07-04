<?php
$path = '../koneksi.php'; // Menggunakan ../ untuk naik satu level dari folder home.php

// Memanggil koneksi.php
require_once $path;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        main {
            padding: 2rem;
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>
    <header class="navbar is-dark">
        <div class="navbar-brand">
            <a class="navbar-item" href="home.php">
                BERKAH ELECTRONIK
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                <a class="navbar-item" href="home.php">Dashboard</a>
                <a class="navbar-item" id="usernameDisplay"></a>
                <hr class="navbar-divider">
                <a class="navbar-item" href="#" id="logout">Logout</a>
            </div>
        </div>
    </header>
    <div class="container is-fluid">
        <div class="columns">
            <main class="column">
                <section class="section">
                    <h1 class="title">Welcome, Admin!</h1>
                    
                    <div class="columns">
                        <div class="column">
                            <button class="button is-primary" id="create-barang">Create</button>
                        </div>
                    </div>

                    <table class="table is-striped is-fullwidth">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Merk</th>
                                <th>Detail</th>
                                <th>Foto</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM data_komponen";
                            $result = $koneksi->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['nama_komponen'] . "</td>";
                                    echo "<td>" . $row['jenis'] . "</td>";
                                    echo "<td>" . $row['merk'] . "</td>";
                                    echo "<td>" . $row['detail'] . "</td>";
                                    echo "<td><img src='" . $row['foto'] . "' alt='Foto Barang' style='width: 300px; height:'200px'; ></td>";
                                    echo "<td>
                    
                                         <div class='field has-addons'>
                                            <p class='control'>
                                                <button class='button is-info is-small' onclick='showUpdateModal(" . $row['id'] . ")'>Update</button>
                                            </p>
                                            <p class='control'>
                                                <button class='button is-danger is-small' onclick='deleteBarang(" . $row['id'] . ")'>Delete</button>
                                            </p>
                                        </div>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </section>
            </main>
        </div>
    </div>
    <footer class="footer">
        <div class="content has-text-centered">
            © 2024 BERKAH ELECTRONIK
        </div>
    </footer>

    <!-- Modal Structure for Create -->
    <div class="modal" id="createModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Create New Barang</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
            <form id="createBarangForm" action="create.php" method="post" enctype="multipart/form-data">
            
            <div class="field">
                <label class="label">Nama Komponen:</label>
                <div class="control">
                <input class="input" type="text" name="nama_komponen" required>
                </div>
            </div>
  
        <div class="field">
            <label class="label">Jenis:</label>
            <div class="control">
            <input class="input" type="text" name="jenis" required>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Merk:</label>
            <div class="control">
            <input class="input" type="text" name="merk" required>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Detail:</label>
            <div class="control">
            <textarea class="textarea" name="detail" required></textarea>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Foto:</label>
            <div class="control">
            <input class="input" type="file" name="foto" required>
            </div>
        </div>
        
        <div class="field is-grouped">
            <div class="control">
            <button type="submit" class="button is-success">Simpan Perubahan</button>
            </div>
            <div class="control">
            <button type="button" class="button" id="cancelCreateModal">Batal</button>
            </div>
        </div>
        </form>

            </section>
        </div>
    </div>

   <!-- Modal Structure for Update -->
<div class="modal" id="updateModal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Update Barang</p>
            <button class="delete" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <form id="updateBarangForm" enctype="multipart/form-data">
                <input type="hidden" name="id" id="update-id">
                
                <div class="field">
                    <label class="label">Nama Komponen:</label>
                    <div class="control">
                        <input class="input" type="text" name="nama_komponen" id="update-nama_komponen" required>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Jenis:</label>
                    <div class="control">
                        <input class="input" type="text" name="jenis" id="update-jenis" required>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Merk:</label>
                    <div class="control">
                        <input class="input" type="text" name="merk" id="update-merk" required>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Detail:</label>
                    <div class="control">
                        <textarea class="textarea" name="detail" id="update-detail" required></textarea>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Foto:</label>
                    <div class="control">
                        <input class="input" type="file" name="foto">
                    </div>
                    <div class="control">
                        <img id="update-foto" style="max-width: 200px; margin-top: 10px;" src="" alt="Preview">
                    </div>
                </div>
                
                <div class="field is-grouped">
                    <div class="control">
                        <button type="button" class="button is-success" id="updateData">Update Data</button>
                    </div>
                    <div class="control">
                        <button type="button" class="button" id="cancelUpdateModal">Batal</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>


    <!-- Modal Structure for Logout -->
    <div class="modal" id="logoutModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Confirm Logout</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>Are you sure you want to logout?</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-danger" id="confirmLogout">Logout</button>
                <button class="button" id="cancelLogout">Cancel</button>
            </footer>
        </div>
    </div>
     
    <script>
        $(document).ready(function() {
            // Show create modal
            $('#create-barang').click(function() {
                $('#createModal').addClass('is-active');
            });

            // Close modal function
            function closeCreateModal() {
                $('#createModal').removeClass('is-active');
            }

            // Attach closeCreateModal to various close buttons
            $('.modal-background, .delete, #cancelCreateModal').click(closeCreateModal);

            window.showUpdateModal = function(id) {
            $.ajax({
                url: 'update.php',
                type: 'GET',
                data: { id: id, action: 'getData' },
                success: function(data) {
                    const barang = JSON.parse(data);
                    $('#update-id').val(barang.id);
                    $('#update-nama_komponen').val(barang.nama_komponen);
                    $('#update-jenis').val(barang.jenis);
                    $('#update-merk').val(barang.merk);
                    $('#update-detail').val(barang.detail);
                    $('#update-foto').attr('src', barang.foto);
                    $('#updateModal').addClass('is-active');
                }
            });
        };

        // Fungsi untuk menutup modal update
        function closeUpdateModal() {
            $('#updateModal').removeClass('is-active');
        }

        // Menghubungkan penutup modal ke berbagai tombol penutup
        $('.modal-background, .delete, #cancelUpdateModal').click(closeUpdateModal);

        // AJAX untuk mengirim data update ke update.php
        $('#updateData').click(function() {
            var formData = new FormData($('#updateBarangForm')[0]);
            
            $.ajax({
                url: 'update.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response); // Tampilkan pesan respons dari update.php
                    closeUpdateModal(); // Tutup modal setelah berhasil
                    // Tambahan: Refresh tabel atau lakukan aksi lain yang diperlukan
                    window.location.reload(); // Contoh: Refresh halaman setelah update
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Tampilkan pesan error jika ada
                    alert('Error updating data. Please try again.'); // Tampilkan pesan error pada pengguna
                }
            });
        });
  
            // Show logout modal
            $('#logout').click(function() {
                $('#logoutModal').addClass('is-active');
            });

            // Hide logout modal function
            function hideLogoutModal() {
                $('#logoutModal').removeClass('is-active');
            }

            // Attach hideLogoutModal to various close buttons
            $('.modal-background, .delete, #cancelLogout').click(hideLogoutModal);

            // Confirm logout
            $('#confirmLogout').click(function() {
                document.cookie = 'user_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
                window.location.href = 'login.php';
            });

            // Fetch user name from cookie
            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }

            const userName = getCookie('user_name');
            if (userName) {
                $('#usernameDisplay').text(userName);
            } else {
                console.error('User name cookie not found.');
            }
        });

        window.deleteBarang = function(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
</body>
</html>
