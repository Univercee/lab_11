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
                <a href="/lr/rooms">Смотреть объявления</a>
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
