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

    body{
        height: 1000vw;
    }
</style>
<body>
    <!-- "+ Bot" Button & Order buttons -->
    <!-- Buttons Aligner -->
    <div class="d-flex p-3 gap-3 justify-content-end position-sticky top-0 bg-secondary mb-3">
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

    <!-- interface area  -->
    <div class="container-fluid m-0">
        <div class="row w-100 h-100">
            <div class="col-6">
                <div class="container-fluid">
                    <div class="row justify-content-center h-100 gap-3 bot-area">

                    </div>  
                </div>
            </div>
            <!--  -->
            <div class="col-6">
                <!-- Area Select Btn -->
                <div class="w-100 d-flex justify-content-center gap-3">
                    <!-- "PENDING" area btn -->
                    <div class="pending-area-btn btn btn-primary">
                        Pending
                    </div>
                    <!-- "COMPLETE" area btn -->
                    <div class="complete-area-btn btn btn-primary">
                        Complete
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

    <!-- jquery -->

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        let total_order_amount = 0; // minus after done
        // NORMAL
        let regular_order_amount = 0;
        // VIP
        let vip_order_amount = 0;

        //
        let bot_amount = 0;
        let processing = [];
        let order_queue = [];
        let generated_variable = [false];

        // function start_process(process_time){
        //     let managing;
        //     let first_time = true;
        //     let jay = 0;

        //     process_time = setInterval(function(){
        //         if(!first_time){
        //             $("#" + processing[managing]).detach().append(".completed-area");
        //             order_queue.slice(managing, 1);
        //             processing.slice(managing, 1);
    
        //         }

        //         let process_length = processing.length;
        //         first_time = false;

        //         for(let i = 0; i < order_queue.length; i++){
        //             if(i == process_length){
        //                 managing = i;
        //                 console.log(managing);
        //                 console.log("processing : " + processing);
        //                 break;
        //             }

        //             if(processing_length === 0){
        //                 processing.push(order_queue[i]);
        //                 managing = i;
        //                 console.log("processing : " + processing);
        //                 break;
        //             }    

        //             if(processing[i] == order_queue[i]){
        //                 continue;
        //             }   
        //         }
        //         jay++;
        //         console.log(jay);
        //     }, 1000);
        // }
        
        function start_process(process_time){
            let first_time = true;
            let managing;

            setInterval(function(){
                if(!first_time){
                    $("#" + processing[managing]).detach().append(".completed-area");
                    order_queue.slice(managing, 1);
                    processing.slice(managing, 1);
    
                }

                let process_length = processing.length;
                first_time = false;

                for(let i = 0; i < order_queue.length; i++){

                    if(process_length === 0){
                        managing = order_queue[i];
                        processing.push(order_queue[i]);
                        break;
                    }                 

                    if(i == process_length){
                        managing = order_queue[i];
                        processing.push(order_queue[i]);
                        break;
                    }

                    if(processing[i] == order_queue[i]){
                        continue;
                    }   
                }

            }, 1000);
        }

        // Button Clicks
        $(document).on("click", ".add-bot", function(){
            bot_amount += 1;
            let generate_new_variable = false;

            if(generated_variable[bot_amount - 1] == false){
                generate_new_variable = true;
            }
            
            $.post("processing.php", {
                add_bot : true,
                generate_new_variable : generate_new_variable,
                bot_amount : bot_amount

            }, function(data, success){
                $(".bot-area").append(data);

            });
        });

        $(document).on("click", ".remove-bot", function(){
            // alert("hi");
            $.post("processing.php", {
                remove_bot : true,
                bot_amount : bot_amount

            }, function(data, success){
                $("#bot-"+bot_amount).append(data);

            });
            $("#bot-"+bot_amount).remove();
            bot_amount -= 1;

        });


        $(document).on("click", ".add-order", function(){  

            if($("textarea[name='order-detail']").val().length !== 0){
                total_order_amount += 1;
                regular_order_amount += 1;

                order_queue.push("regular-order-" + total_order_amount);
                console.log(order_queue);

                $.post("processing.php", {
                    order_amount : regular_order_amount,
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
                total_order_amount += 1;
                vip_order_amount += 1;

                // splice(position, delete number, element)
                order_queue.splice((vip_order_amount - 1), 0, ("vip-order-" + total_order_amount));
                console.log(order_queue);

                $.post("processing.php", {
                    order_amount : vip_order_amount,
                    order_detail : $("textarea[name='vip-order-detail']").val(),
                    order_quantity : $("input[name='vip-order-quantity']").val(),
                    customer_type : "vip"
    
                }, function(data, success){
                    if($(".regular-order").length === 0){
                        $(".pending-area").append(data);

                    }
                    else{
                        $(data).insertBefore($(".regular-order"));

                    }

                    $("#vip-order-modal").modal('hide');
                });

            }
            else{
                alert("Please enter something.");

            }
        });

        $(document).on("click", ".open-order-modal", function(){
            $("#order-modal").modal('show');
            
        });

        $(document).on("click", ".open-vip-order-modal", function(){
            $("#vip-order-modal").modal('show');

        });

    </script>
</body>
</html>