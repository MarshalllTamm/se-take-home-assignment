<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fa -->
    <script src="https://kit.fontawesome.com/45f3407b19.js" crossorigin="anonymous"></script>
</head>
<style>
    *{
        margin: 0px;
    }

    body{
        background-color: beige;
    }

    .completed-order{
        border: double greenyellow 5px !important;
        background-color: lightgreen;
    }

    .vip-order{
        font-weight: bold;
        color: white;
        border: outset burlywood 5px !important;
        border-style: dotted;
        background-color: goldenrod;
    }

    .regular-order{
        border: solid lightblue 5px !important;
        background-color: lightcyan;
    }

</style>
<body>

    <!-- interface area  -->
    <div class="container-fluid m-0" style="height: 90vh; max-height: 90vh;">
        <div class="row p-3 h-100">
            <!-- Bot Area -->
            <div class="col-6 p-3 pt-0 my-2 border rounded bg-white">
                <div class="d-flex p-2 align-content-center justify-content-center mb-3 fw-bold text-danger" style="height: 9%; border-bottom: solid 1px gainsboro;">
                    <i class="fa-solid fa-robot align-self-center m-2"></i>
                    Bot Area
                </div>
                <div class="container-fluid" style="height: 90%;">
                    <div class="row justify-content-center h-100 gap-3 bot-area overflow-y-scroll" style="max-height: 75vh;">

                    </div>  
                </div>
            </div>

            <!-- Order Area -->
            <div class="col-6 p-0 my-2 border rounded bg-white">
                <!-- nav tab controller -->
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                            <i class="fa-solid fa-spinner"></i>
                            Pending Area
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <i class="fa-regular fa-circle-check"></i>
                            Completed Area
                        </button>
                    </div>
                </nav>
                <!-- nav tab contents -->
                <div class="tab-content p-3 pb-0" id="nav-tabContent" >
                    <!-- Pending Area -->
                    <div class="tab-pane container fade show active overflow-hidden" style="max-height: 75vh;" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center h-100 gap-3 pending-area overflow-y-scroll" style="max-height: 75vh;">

                            <!-- <div class="col-3 text-center justify-self-center rounded border completed" style="height: 150px;" id="{$placeholder}-{$_POST['order_amount']}">
                                <div class="w-100" style="height: 70%;">
                                    1
                                </div>
                                <div class="w-100" style="height: 30%;">
                                    x 1
                                </div> 
                            </div> -->


                        </div>
                    </div>
                    <!-- Completed Area -->
                    <div class="tab-pane container fade" style="max-height: 75vh;" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row justify-content-center h-100 w-100 p-0 gap-3 complete-area overflow-y-scroll" style="max-height: 75vh;">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- "+ Bot" Button & Order buttons -->
    <!-- Buttons Aligner -->
    <div class="d-flex py-2 gap-3 justify-content-center bg-white rounded" style="height: 10vh;">
        <!-- Add Icons -->
        <div class="btn btn-danger remove-bot">
            <i class="fa-solid fa-trash"></i>
            <i class="fa-solid fa-robot"></i>
            Remove Bots
        </div>
        <div class="btn btn-success add-bot">
            <i class="fa-solid fa-plus"></i>
            <i class="fa-solid fa-robot"></i>
            Add Bots
        </div>
        <div class="btn btn-warning open-order-modal">
            <i class="fa-solid fa-plus"></i>
            <i class="fa-regular fa-file-lines"></i>
            New Orders
        </div>
        <div class="btn btn-warning open-vip-order-modal">
            <i class="fa-solid fa-plus"></i>
            <i class="fa-solid fa-file-lines"></i>
            New Vip Orders
        </div>
    </div>

    <!-- Normal Order -->
    <div class="modal fade" id="order-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-group">
                    <small class="text-muted form-text">Enter Item Name:</small>
                    <textarea class="form-control w-100 h-100" name="order-detail"></textarea>
                    <br>
                    <small class="text-muted form-text">Enter Quantity:</small>
                    <input type="number" class="form-control" name="order-quantity" min="1" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-order">Add Order</button>
                </div>
            </div>
        </div>
    </div>

    <!-- VIP Order -->
    <div class="modal fade" id="vip-order-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-group">
                    <small class="text-muted form-text">Enter Item Name:</small>
                    <textarea class="form-control w-100 h-100" name="vip-order-detail"></textarea>
                    <br>
                    <small class="text-muted form-text">Enter Quantity:</small>
                    <input type="number" class="form-control" name="vip-order-quantity" min="1" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-vip-order">Add Order</button>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-area">
    </div>

    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        // NORMAL
        let regular_order_id = 0; // track the total amount of vip order
        let regular_order_amount = 0; // track order amount on the queue
        
        // VIP
        let vip_order_id = 0; // track the total amount of vip order
        let vip_order_amount = 0; // track order amount on the queue

        //
        let bot_amount = 0;
        let processing = [];
        let order_queue = [];

        bot_managing_ = "";
        interval_ = 0;
         
        // Bot Quantity Buttons

        $(document).on("click", ".add-bot", function(){
            bot_amount += 1;
            
            $.post("processing.php", {
                add_bot : true,
                bot_amount : bot_amount
            }, function(data, success){
                $(".bot-area").append(data);
            });
        });

        $(document).on("click", ".remove-bot", function(){
            $("#delete-area").empty();

            $.post("processing.php", {
                remove_bot : true,
                bot_amount : bot_amount
            }, function(data, success){
                $("#delete-area").append(data);
            });
            
            $("#bot-"+bot_amount).remove();
            
            if(bot_amount > 0){
                bot_amount -= 1;
            }
        });

        // Processing Orders

        $(document).on("click", ".add-order", function(){  
            if($("textarea[name='order-detail']").val().length !== 0){
                regular_order_amount += 1;
                regular_order_id += 1;

                order_queue.push("regular-order-" + regular_order_id);
                console.log("from add order " + order_queue);

                $.post("processing.php", {
                    order_amount : regular_order_id,
                    order_detail : $("textarea[name='order-detail']").val(),
                    order_quantity : $("input[name='order-quantity']").val(),
                    customer_type : "regular"
                }, function(data, success){
                    $(".pending-area").append(data);
                    $("#order-modal").modal('hide');
                });
            }
            else{
                alert("Please enter something.");
            }
        });

        $(document).on("click", ".add-vip-order", function(){  
            if($("textarea[name='vip-order-detail']").val().length > 0){
                vip_order_amount += 1;
                vip_order_id += 1;

                // splice(position, delete number, element) 
                order_queue.splice((order_queue.length - regular_order_amount), 0, ("vip-order-" + vip_order_id));
                console.log("from add vip order " + order_queue);

                $.post("processing.php", {
                    order_amount : vip_order_id,
                    order_detail : $("textarea[name='vip-order-detail']").val(),
                    order_quantity : $("input[name='vip-order-quantity']").val(),
                    customer_type : "vip"
                }, function(data, success){
                    if($(".regular-order").length === 0){
                        $(".pending-area").append(data);
                    }
                    else{
                        $(data).insertBefore($(".regular-order").eq(0));
                    }
                    $("#vip-order-modal").modal('hide');
                });
            }
            else{
                alert("Please enter something.");
            }

        });

        // Opening Modals

        $(document).on("click", ".open-order-modal", function(){
            $("#order-modal").modal('show');
        });

        $(document).on("click", ".open-vip-order-modal", function(){
            $("#vip-order-modal").modal('show');
        });

    </script>
</body>
</html>