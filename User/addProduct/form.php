<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        #loading-img {
            display: none;
        }

        .response_msg {
            margin-top: 10px;
            font-size: 13px;
            background: #E5D669;
            color: #ffffff;
            width: 250px;
            padding: 3px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Add a Product</h1>
                <form name="contact-form" action="" method="post" id="contact-form">
                    <div class="form-group">
                        <label for="Name">Product Name</label>
                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="number" class="form-control" name="product_price" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea name="description" class="form-control" rows="3" cols="28" rows="5" placeholder="Write Product Description"></textarea>
                    </div>
                    <div>
                        <label for="product_image">Product Image</label>
                        <input type="file" name="product_image" id="product_image">
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
                </form>
                <div class="response_msg"></div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#contact-form").on("submit", function(e) {
                e.preventDefault();
                if ($("#contact-form [name='product_name']").val() === '') {
                    $("#contact-form [name='product_name']").css("border", "1px solid red");
                } else if ($("#contact-form [name='product_price']").val() === '') {
                    $("#contact-form [name='product_price']").css("border", "1px solid red");
                } else {
                    // $("#loading-img").css("display","block");
                    var sendData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "get_response.php",
                        data: sendData,
                        success: function(data) {
                            $("#loading-img").css("display", "none");
                            $(".response_msg").text("Product Added!");
                            $(".response_msg").slideDown();
                            $("#contact-form").find("input[type=text], input[type=email], textarea").val("");
                        }
                    });
                }
            });
            $("#contact-form input").blur(function() {
                var checkValue = $(this).val();
                if (checkValue != '') {
                    $(this).css("border", "1px solid #eeeeee");
                }
            });
        });
    </script>
</body>

</html>