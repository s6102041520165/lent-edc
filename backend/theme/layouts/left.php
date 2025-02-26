<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=Yii::getAlias('@web')?>/img/man.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?= (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : "ไม่พบผู้ใช้"; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." /> 
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span> 
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    // ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'พนักงาน ขสมก.', 'icon' => 'users', 'url' => ['/employee'], 'visible' => (Yii::$app->user->can("viewEmployee")) ? true : false],
                    ['label' => 'เครื่อง EDC', 'icon' => 'credit-card', 'url' => ['/edc'], 'visible' => (Yii::$app->user->can("viewEdc")) ? true : false],
                    ['label' => 'การยืมคืนเครื่อง EDC', 'icon' => 'list-ul', 'url' => ['/lent'], 'visible' => (Yii::$app->user->can("viewEdc")) ? true : false],
                    ['label' => 'เขต พกส.', 'icon' => 'map-marker', 'url' => ['/district'], 'visible' => (Yii::$app->user->can("viewDistrict")) ? true : false],
                    ['label' => 'กอง', 'icon' => 'map-marker', 'url' => ['/division'], 'visible' => (Yii::$app->user->can("viewDistrict")) ? true : false],
                    ['label' => 'ผู้ใช้', 'icon' => 'users', 'url' => ['/user'], 'visible' => (Yii::$app->user->can("createUser")) ? true : false],
                    ['label' => 'สรุปข้อมูลยืมคืนเครื่อง', 'icon' => 'area-chart', 'url' => ['/lent/summary'], 'visible' => (Yii::$app->user->can("viewDistrict")) ? true : false],
                    // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    // [
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>