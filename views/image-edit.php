<?php
    if(isset($_COOKIE['session_token'])){
        $user = (new UserController())->getByToken($_COOKIE['session_token']);
    }
    else{
        header("Location: login");
    }
?>
<div class="container-sm row d-flex flex-column align-items-center mb-5">
    <h2 class="col-md-6 mb-5">Редактирование изображения</h2>
    <form action="image-edit-action" method="POST" enctype="multipart/form-data" class="col-md-12 d-flex flex-column gap-4">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <p class="bold">Изображение</p>
            </div>
            <div class="col-md-3">
                <input class="form-control" type="file" accept=".jpg, .png" name="image"></input>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <input type="submit" class="btn btn-primary text-white w-100 mb-2" value="Сохранить"></input>
                <a href="./account">Отменить</a>
            </div>
            <div class="col-md-3"></div>
        </div>

    </form>
</div>