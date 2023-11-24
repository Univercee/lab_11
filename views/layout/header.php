<?php
    
    $auth = false;
    if(isset($_COOKIE['session_token'])){
        $user = (new UserController())->getByToken($_COOKIE['session_token']);
        if($user){
            $auth = true;
        }
    }

?>

<header class="py-4" style="border-bottom: solid lightgray 1px;">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-4 col-sm-12 d-flex align-items-center justify-content-center my-4">
                <a href="/lr" class="w-50">
                    <img class="w-100" src="./inc/images/Airbnb_Logo.png" alt="">
                </a>
            </div>
            <div class="col-md-4 col-sm-12 px-4 d-flex align-items-center gap-1 my-4">
                <input class="form-control" type="text" placeholder="Начать поиск">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="col-md-4 col-sm-12 d-flex gap-4 align-items-center justify-content-center my-4">
                <p class="m-0">Сдать жилье на Airbnb</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 16px; width: 16px; fill: currentcolor;">
                    <path d="M8 .25a7.77 7.77 0 0 1 7.75 7.78 7.75 7.75 0 0 1-7.52 7.72h-.25A7.75 7.75 0 0 1 .25 8.24v-.25A7.75 7.75 0 0 1 8 .25zm1.95 8.5h-3.9c.15 2.9 1.17 5.34 1.88 5.5H8c.68 0 1.72-2.37 1.93-5.23zm4.26 0h-2.76c-.09 1.96-.53 3.78-1.18 5.08A6.26 6.26 0 0 0 14.17 9zm-9.67 0H1.8a6.26 6.26 0 0 0 3.94 5.08 12.59 12.59 0 0 1-1.16-4.7l-.03-.38zm1.2-6.58-.12.05a6.26 6.26 0 0 0-3.83 5.03h2.75c.09-1.83.48-3.54 1.06-4.81zm2.25-.42c-.7 0-1.78 2.51-1.94 5.5h3.9c-.15-2.9-1.18-5.34-1.89-5.5h-.07zm2.28.43.03.05a12.95 12.95 0 0 1 1.15 5.02h2.75a6.28 6.28 0 0 0-3.93-5.07z"></path>
                </svg>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <?php if($auth){ ?>
                            <li><a class="dropdown-item" href="/lr/account">Личный кабинет</a></li>
                            <li><a class="dropdown-item text-danger" href="/lr/logout">Выйти</a></li>
                        <?php } else{?>
                            <li><a class="dropdown-item" href="/lr/login">Войти</a></li>
                            <li><a class="dropdown-item" href="/lr/signup">Зарегистрироваться</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
