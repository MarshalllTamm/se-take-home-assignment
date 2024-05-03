<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    *{
        margin: 0px;
    }
</style>
<body>

    <!-- interface area  -->
    <div class="container-fluid m-0" style="height: 90vh; max-height: 90vh;">
        <div class="row h-100">
            <!-- Bot Area -->
            <div class="col-6 p-3">
                <div class="container-fluid">
                    <div class="row justify-content-center h-100 gap-3 bot-area">

                    </div>  
                </div>
            </div>
            <!--  -->
            <div class="col-6 p-0 my-2 border rounded">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    </div>
                </nav>
                <div class="tab-content p-3 pb-0 overflow-hidden" id="nav-tabContent">
                    <div class="tab-pane fade show active overflow-hidden" style="max-height: 75vh;" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                    </div>
                    <div class="tab-pane fade" style="max-height: 75vh;" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        ...
                    </div>
                </div>
                
                <!-- Pending Area -->
                <div class="container m-0 mt-3 p-0 overflow-y-scroll overflow-x-hidden w-100 ">
                    <!-- Append Area -->
                    <div class="row justify-content-center h-100 gap-3 pending-area">

                    </div>
                </div>

                <!-- Complete Area -->
                <div class="container m-0 mt-3 p-0 overflow-y-scroll overflow-x-hidden w-100 d-none">
                    <!-- Append Area -->
                    <div class="row h-100 gap-3 complete-area">
                        <div class="col-3 text-center justify-self-center">
                            hi
                        </div>
                    </div>
                </div>

            </div>
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

    <!-- "+ Bot" Button & Order buttons -->
    <!-- Buttons Aligner -->
    <div class="d-flex p-3 gap-3 justify-content-center bg-secondary" style="height: 10vh;">
        <!-- Add Icons -->
        <div class="btn btn-primary remove-bot">
            Remove Bots
        </div>
        <div class="btn btn-primary add-bot">
            Add Bots
        </div>
        <div class="btn btn-primary open-order-modal">
            New Orders
        </div>
        <div class="btn btn-primary open-vip-order-modal">
            New Vip Orders
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

        // function start_process(){
        //     for(let i = 0; i < order_queue.length; i++){
        //         if(processing.length === 0 && order_queue.length > 0){
        //             bot_managing_ = order_queue[i];
        //             processing.push(order_queue[i]);
        //             console.log(processing);
        //             console.log(bot_managing_);
        //             break;
        //         }
        //         else if(order_queue.length > 0 && processing[i] === undefined){
        //             bot_managing_ = order_queue[i];
        //             processing.push(order_queue[i]);
        //             console.log(processing);
        //             console.log(bot_managing_);
        //             break;
        //         }
        //     }

        //     x = setInterval(function(){
        //         let temp = processing.findIndex((element) => element == bot_managing_);
                
        //         console.log("Currently Processing Queue: " + processing);
                
        //         if(temp !== -1){
        //             if($("#" + bot_managing_).hasClass("regular-order")){
        //                 $("#" + bot_managing_).removeClass("regular-order");
        //                 regular_order_amount -= 1;
        //             }
        //             else{
        //                 $("#" + bot_managing_).removeClass("vip-order");
        //                 vip_order_amount -= 1;
        //             }

        //             $("#" + bot_managing_).addClass("completed-order");
        //             $(".complete-area").append($("#" + bot_managing_).detach());
        //             processing.splice(temp, 1);
        //             order_queue.splice(temp, 1);
                    
        //             console.log("Completed: " + bot_managing_);
        //             bot_managing_ = "";
        //         }
                
        //         console.log("Processing Queue After Completion: " + processing);
                
        //         for(let i = 0; i < order_queue.length; i++){
        //             if(processing.length === 0 && order_queue.length > 0){
        //                 bot_managing_ = order_queue[i];
        //                 processing.push(order_queue[i]);
        //                 console.log("Added to Process Queue through condition 1: " + processing);
        //                 break;
        //             }
        //             else if(order_queue.length > 0 && processing[i] === undefined){
        //                 bot_managing_ = order_queue[i];
        //                 processing.push(order_queue[i]);
        //                 console.log("Added to Process Queue through condition 1: " + processing);
        //                 break;
        //             }
        //         }

        //         console.log("Currently Processing: " + bot_managing_);
        //         console.log("Process Queue after interval: " + processing);
        //     }, 5000);
        // }
         
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