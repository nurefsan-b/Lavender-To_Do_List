<?php
namespace App\Controllers\Front;
use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController
{
    private $taskModel;
    public function __construct(){
        $this->taskModel = new Task();
    }
    public function index(){
        $tasks = $this->taskModel->getAll();
        $this->render("front/tasks", ['tasks' => $tasks]);
    }

    public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;

        if (empty($title) || empty($description)) {
           return $this->render('front/create-task', ['error' => 'Başlık ve açıklama alanları zorunludur']);
    
        }

        try{
            $this->taskModel->create($title, $description);
          header('Location: /'); 
          exit;
        }catch(\Exception $e){
           return $this->render('front/create-task', ['error' =>"Görev Oluşturulamadı."]);

        }   
    
    } else {
        return $this->render('front/create-task');
    }
}
public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;

        if (empty($title) || empty($description)) {
            return $this->render('front/update-task', [
                'error' => 'Başlık ve açıklama alanları zorunludur',
                'task' => $this->taskModel->getById($id),
                'id' => $id
            ]);
        }

        try {
            if ($this->taskModel->update($id, $title, $description)) {
                header('Location: /?success=' . urlencode('Görev başarıyla güncellendi'));
                exit;
            }
        } catch (\Exception $e) {
            return $this->render('front/update-task', [
                'error' => 'Görev güncellenirken bir hata oluştu',
                'task' => $this->taskModel->getById($id),
                'id' => $id
            ]);
        }
    }

    $task = $this->taskModel->getById($id);
    if (!$task) {
        header('Location: /?error=' . urlencode('Görev bulunamadı'));
        exit;
    }

    return $this->render('front/update-task', [
        'task' => $task,
        'id' => $id
    ]);
}

public function delete($id){
   try {
        if ($this->taskModel->delete($id)) {
            header('Location: /?success=' . urlencode('Görev başarıyla silindi'));
            exit;
        }
        throw new \Exception('Silme işlemi başarısız');
    } catch (\Exception $e) {
        header('Location: /?error=' . urlencode('Görev silinirken bir hata oluştu'));
        exit;
    }
}
}

