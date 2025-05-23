<div class="lavender">
    <div class="lavenderdefault">
        <div class="layout-container">
            <div class="image-section">
            <img class="lavender-icon" 
                 alt="Lavender Field" 
                 src="/images/lavender.png">
        </div>
<div class="container mb-5">
    <h1>Yeni Görev Ekleme</h1>
     <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Açıklama</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>
        <div class="button-group">
            <button type="submit" class="gorev-ekle-btn">Görev Ekle</button>
            <a href="/#" class="geri-don-btn" style="text-decoration:none;">Geri Dön</a>
        </div>
    </form>
        </div></div></div>
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
     .button-group {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }
     .gorev-ekle-btn, .geri-don-btn {
        background-color: #613F75;
        color: white;
        border: none;
        border-radius: 45px;
        padding: 10px 25px;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
    }

    .geri-don-btn:hover, .gorev-ekle-btn:hover {
        opacity: 0.9;
        color: white;
    }
</style>
