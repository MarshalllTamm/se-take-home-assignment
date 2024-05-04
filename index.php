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
        border: dashed greenyellow 5px !important;
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

    .card-decoration{
        /* box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px; */
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        /* box-shadow: rgba(0, 0, 0, 0.17) 0px -23px 25px 0px inset, rgba(0, 0, 0, 0.15) 0px -36px 30px 0px inset, rgba(0, 0, 0, 0.1) 0px -79px 40px 0px inset, rgba(0, 0, 0, 0.06) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px; */
        transition: 0.3s;
    }

    .card-decoration:hover {
        scale: 1.1;
        transition: 0.3s;
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
                    <span class="mx-1">| Current Bot Count &#40;</span>
                    <span class="mx-1 bot-count-updater">0</span>
                    <span class="mx-1">&#41;</span>
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
                            <span class="mx-1">&#40;</span>
                            <span class="pending-count-updater">0</span>
                            <span class="mx-1">&#41;</span>
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <i class="fa-regular fa-circle-check"></i>
                            Completed Area
                            <span class="mx-1">&#40;</span>
                            <span class="complete-count-updater">0</span>
                            <span class="mx-1">&#41;</span>
                        </button>
                    </div>
                </nav>
                <!-- nav tab contents -->
                <div class="tab-content py-3" id="nav-tabContent" >
                    <!-- Pending Area -->
                    <div class="tab-pane container fade show active overflow-hidden p-0" style="max-height: 71vh; height: 71vh;" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row justify-content-center h-100 w-100 p-0 gap-3 pending-area overflow-y-scroll" style="max-height: 75vh;">
                            <!-- Pending Orders -->

                        </div>
                    </div>
                    <!-- Completed Are a -->
                    <div class="tab-pane container fade p-0" style="max-height: 71vh; height: 71vh;" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row justify-content-center h-100 w-100 p-0 gap-3 complete-area overflow-y-scroll" style="max-height: 75vh;">
                            <!-- Completed Orders -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- "+ Bot" Button & Order buttons -->
    <!-- Buttons Aligner -->
    <div class="d-flex py-2 gap-3 justify-content-center" style="height: 10vh;">
        <!-- Add Icons -->
        <div class="btn btn-danger fw-bold remove-bot card-decoration">
            <i class="fa-solid fa-trash"></i>
            <i class="fa-solid fa-robot"></i>
            Remove Bots
        </div>
        <div class="btn btn-success fw-bold add-bot card-decoration">
            <i class="fa-solid fa-plus"></i>
            <i class="fa-solid fa-robot"></i>
            Add Bots
        </div>
        <div class="btn btn-warning fw-bold text-white open-order-modal card-decoration">
            <i class="fa-solid fa-plus"></i>
            <i class="fa-regular fa-file-lines"></i>
            New Orders
        </div>
        <div class="btn btn-info fw-bold text-white open-vip-order-modal card-decoration">
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

                    <small class="text-muted form-text">Select Item:</small>
                    <select class="form-select form-select mb-3" name="order-detail">
                        <option selected value="Open Menu">Click to Open Menu</option>
                        <option value="Big Mac">Big Mac</option>
                        <option value="McChicken">McChicken</option>
                        <option value="Filet-O-Fish">Filet-O-Fish</option>
                        <option value="Quarter Pounder with Cheese">Quarter Pounder with Cheese</option>
                        <option value="Double Quarter Pounder with Cheese">Double Quarter Pounder with Cheese</option>
                        <option value="Double Big Mac">Double Big Mac</option>
                        <option value="McDouble">McDouble</option>
                        <option value="McRib">McRib</option>
                        <option value="McNuggets">McNuggets</option>
                        <option value="McWrap">McWrap</option>
                    </select>

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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Vip Order Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-group">

                    <small class="text-muted form-text">Select Item:</small>
                    <select class="form-select form-select mb-3" name="vip-order-detail">
                        <option selected value="Open Menu">Click to Open Menu</option>
                        <option value="Big Mac">Big Mac</option>
                        <option value="McChicken">McChicken</option>
                        <option value="Filet-O-Fish">Filet-O-Fish</option>
                        <option value="Quarter Pounder with Cheese">Quarter Pounder with Cheese</option>
                        <option value="Double Quarter Pounder with Cheese">Double Quarter Pounder with Cheese</option>
                        <option value="Double Big Mac">Double Big Mac</option>
                        <option value="McDouble">McDouble</option>
                        <option value="McRib">McRib</option>
                        <option value="McNuggets">McNuggets</option>
                        <option value="McWrap">McWrap</option>
                    </select>

                    <br>
                    <small class="text-muted form-text">Enter Quantity:</small>
                    <input type="number" class="form-control" name="vip-order-quantity" min="1" value="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-vip-order">Add Vip Order</button>
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

        // QUEUES
        let completed_order = 0;
        let bot_amount = 0;
        let processing = [];
        let order_queue = [];

         
        // Bot Quantity Buttons

        $(document).on("click", ".add-bot", function(){

            $.post("processing.php", {
                add_bot : true,
                bot_amount : bot_amount
            }, function(data, success){
                $(".bot-area").append(data);
            });

            bot_amount += 1;   
            $(".bot-count-updater").text(bot_amount);
        });

        $(document).on("click", ".remove-bot", function(){
            $("#delete-area").empty();

            if(bot_amount > 0){
                bot_amount -= 1;
                $(".bot-count-updater").text(bot_amount);

                $.post("processing.php", {
                    remove_bot : true,
                    bot_amount : bot_amount
                }, function(data, success){
                    $("#delete-area").append(data);
                });
                
                $("#bot-"+bot_amount).remove();
            }

            
        });

        // Processing Orders

        $(document).on("click", ".add-order", function(){  
            if($("select[name='order-detail']").val() !== "Open Menu"){
                regular_order_amount += 1;
                regular_order_id += 1;

                order_queue.push("regular-order-" + regular_order_id);
                console.log("from add order " + order_queue);

                $.post("processing.php", {
                    order_amount : regular_order_id,
                    order_detail : $("select[name='order-detail']").val(),
                    order_quantity : $("input[name='order-quantity']").val(),
                    customer_type : "regular"
                }, function(data, success){
                    $(".pending-area").append(data);
                    $("#order-modal").modal('hide');
                });

                $(".pending-count-updater").text(order_queue.length);
            }
            else{
                alert("Please Select Something.");
            }
        });

        $(document).on("click", ".add-vip-order", function(){  
            if($("select[name='vip-order-detail']").val() !== "Open Menu"){
                vip_order_amount += 1;
                vip_order_id += 1;

                // splice(position, delete number, element) 
                order_queue.splice((order_queue.length - regular_order_amount), 0, ("vip-order-" + vip_order_id));
                console.log("from add vip order " + order_queue);

                $.post("processing.php", {
                    order_amount : vip_order_id,
                    order_detail : $("select[name='vip-order-detail']").val(),
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

                $(".pending-count-updater").text(order_queue.length);
            }
            else{
                alert("Please Select Something.");
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