<?php

function component($productname, $productprice, $productimg, $productid){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=./upload/$productimg alt=\"Image1\" class=\"img-fluid card-img-top\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                Product Description.
                            </p>
                            <h5>
                                <span class=\"price\">Rs.$productprice</span>
                            </h5>
                        </div>
                    </div>
                </form>
            </div>
    ";
    echo $element;
}