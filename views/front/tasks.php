<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="lavender">
    <div class="lavenderdefault">
        <div class="layout-container">
            <div class="image-section">
            <img class="lavender-icon" 
                 alt="Lavender Field" 
                 src="/images/lavender.png">
        </div>
        
        <div class="content-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="gorevler-title">Görevler</h1>
                <a href="create/task" class="gorev-ekle-btn" style="text-decoration:none;">Görev Ekle +</a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tarih</th>
                            <th>Başlık</th>
                            <th>İçerik</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                        <tr>
                    
                            <td><?php echo $Carbon::parse($task['created_at'])->format('d/m/Y H:i'); ?></td>
                            <td><?php echo htmlspecialchars($task['title']); ?></td>
                            <td><?php echo htmlspecialchars($task['description']); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="update/task/<?php echo $task['id']; ?>" class="duzenle-btn" style="text-decoration:none;">Düzenle</a>
                                    <a href="delete/task/<?php echo $task['id']; ?>" 
                                    class="sil-btn" 
                                    onclick="return confirm('Bu görevi silmek istediğinizden emin misiniz?');"
                                    style="text-decoration: none;">Sil</a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
     .layout-container {
        display: flex;
        gap: 40px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        overflow: hidden;
    }
    .image-section {
        flex:0 0 300px;
    }
    .content-section {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        
    }

    .lavender {
        height: calc(100vh - 121px);
        overflow-y: auto;
    }

    .lavenderdefault {
        padding: 0px;
        max-width:1200px;
        margin:0 auto;
    }

    .lavender-icon {
        width: 100%;
        height: auto;
        object-fit: contain;
    }
    .gorevler-title {
        font-size: 24px;
        color: #333;
        margin: 0;
    }

    .gorev-ekle-btn {
        background-color: #613F75;
        color: white;
        border: none;
        border-radius: 45px;
        padding: 10px 25px;
        font-size: 16px;
        cursor: pointer;
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th {
        background-color: #f8f9fa;
        padding: 12px;
        text-align: left;
    }

    .table td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
    }

    .duzenle-btn {
        background-color: #613F75;
        color: white;
        border: none;
        border-radius: 45px;
        padding: 5px 15px;
        margin-right: 5px;
        cursor: pointer;
    }

    .sil-btn {
        background-color: #867A92;
        color: white;
        border: none;
        border-radius: 45px;
        padding: 5px 15px;
        cursor: pointer;
    }
    .duzenle-btn:hover, .sil-btn:hover, .gorev-ekle-btn:hover {
        opacity: 0.9;
        color: white;
    }
</style>
</div>
</table>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>