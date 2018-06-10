<?php 
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-sm-12 col-xl-3">
        <div class="row">
            <div class="col-12">
                <div class="priceRenge">
                    <p>
                        <label for="amount">Цена</label>
                        <input type="text" id="amount" readonly style="border:0; font-weight:bold;">
                    </p>    
                    <div id="slider-range"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="categiresBlock">
                    <h3>Категории</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            <span class="badge badge-dark float-right">76</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Check me out</label>
                            <span class="badge badge-dark float-right">45</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">Check me out</label>
                            <span class="badge badge-dark float-right">98</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4">Check me out</label>
                            <span class="badge badge-dark float-right">12</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-12">
                <div class="tegsBlock">
                    <h3>Теги</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            <span class="badge badge-dark float-right">76</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Check me out</label>
                            <span class="badge badge-dark float-right">45</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck3">
                            <label class="form-check-label" for="exampleCheck3">Check me out</label>
                            <span class="badge badge-dark float-right">98</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4">Check me out</label>
                            <span class="badge badge-dark float-right">12</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4">Check me out</label>
                            <span class="badge badge-dark float-right">12</span>
                        </li>
                        <li class="nav-item">
                            <input type="checkbox" class="form-check-input" id="exampleCheck4">
                            <label class="form-check-label" for="exampleCheck4">Check me out</label>
                            <span class="badge badge-dark float-right">12</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-9">
        <div class="row">      
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">      
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pb-2">
                <div class="card p-2">   
                    <?= Html::img('@web/no-image.png' ,['class' => 'card-img-top']); ?>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-success float-right">To cart</a>
                    </div>
                </div>
            </div>            
        </div>
</div>