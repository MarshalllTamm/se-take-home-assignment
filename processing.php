<?php

    if(isset($_POST['order_amount']) && isset($_POST['order_detail']) && isset($_POST['order_quantity']) && isset($_POST['customer_type'])){
        $placeholder = "regular-order";

        if($_POST['customer_type'] == "vip"){
            $placeholder = "vip-order";
        }

        echo <<<html
            <div class="col-3 text-center justify-self-center rounded border card-decoration mt-2 {$placeholder}" style="height: 150px;" id="{$placeholder}-{$_POST['order_amount']}">
                <div class="w-100 container-fluid overflow-hidden align-content-center" style="height: 70%;">
        html;
        echo $_POST['order_detail'];
        echo <<<html
                </div>
                <div class="w-100 align-content-center" style="height: 20%;">
        html;
        echo "x " . $_POST['order_quantity'];
        echo <<<html
                </div>
            </div>
        html;
    }

    if(isset($_POST['generate_new_variable']) && $_POST['generate_new_variable'] == true){
        echo <<<html
            let interval_{$_POST['bot_amount']};
            let managing_{$_POST['bot_amount']};
            generated_variable[{$_POST['bot_amount']} = true; 
            generated_variable.push(false);
            
        html;
    }

    // add bot script and bot
    if(isset($_POST['add_bot']) && isset($_POST['bot_amount'])){
        $random_num = random_int(1, 3);
        echo <<<html
            <div class="col-3 text-center justify-self-center bg-black rounded p-0 mt-2 card-decoration" style="height: 150px;" id="bot-{$_POST['bot_amount']}">
                <img src="Images/robot{$random_num}.jpg" height="150" class="rounded" alt="">
                <script>
                    bot_managing_{$_POST['bot_amount']} = "";
                    interval_{$_POST['bot_amount']} = 0;

                    function start_process_{$_POST['bot_amount']}(){
                        for(let i = 0; i < order_queue.length; i++){
                            if(processing.length === 0){
                                bot_managing_{$_POST['bot_amount']} = order_queue[i];
                                processing.push(order_queue[i]);
                                console.log("Currently Processing Queue: " + processing);
                                console.log("Bot " + {$_POST['bot_amount']} + " is managing : " + bot_managing_{$_POST['bot_amount']});
                                break;
                            }
                            else if(processing[i] === undefined){
                                bot_managing_{$_POST['bot_amount']} = order_queue[i];
                                processing.push(order_queue[i]);
                                console.log("Currently Processing Queue: " + processing);
                                console.log("Bot " + {$_POST['bot_amount']} + " is managing : " + bot_managing_{$_POST['bot_amount']});
                                break;
                            }
                        }
            
                        interval_{$_POST['bot_amount']} = setInterval(function(){
                            let process_index = processing.findIndex((element) => element == bot_managing_{$_POST['bot_amount']});
                            let order_index = order_queue.findIndex((element) => element == bot_managing_{$_POST['bot_amount']});
                            console.log("Currently Processing Queue: " + processing);
                            
                            if(process_index !== -1){
                                if($("#" + bot_managing_{$_POST['bot_amount']}).hasClass("regular-order")){
                                    $("#" + bot_managing_{$_POST['bot_amount']}).removeClass("regular-order");
                                    regular_order_amount -= 1;
                                }
                                else{
                                    $("#" + bot_managing_{$_POST['bot_amount']}).removeClass("vip-order");
                                    vip_order_amount -= 1;
                                }
            
                                $("#" + bot_managing_{$_POST['bot_amount']}).addClass("completed-order");
                                $(".complete-area").append($("#" + bot_managing_{$_POST['bot_amount']}).detach());
                                processing.splice(process_index, 1);
                                order_queue.splice(order_index, 1);
                                
                                console.log("Completed by Bot " + {$_POST['bot_amount']} + ": " + bot_managing_{$_POST['bot_amount']});
                                bot_managing_{$_POST['bot_amount']} = "";

                                completed_order += 1;
                                $(".complete-count-updater").text(completed_order);
                                $(".pending-count-updater").text(order_queue.length);
                            }
                            
                            console.log("Processing Queue After Completion: " + processing);
                            
                            for(let i = 0; i < order_queue.length; i++){
                                if(processing.length === 0 && order_queue.length > 0){
                                    bot_managing_{$_POST['bot_amount']} = order_queue[i];
                                    processing.push(order_queue[i]);
                                    console.log("Added to Process Queue through condition 1: " + processing);
                                    break;
                                }
                                else if(order_queue.length > 0 && processing[i] === undefined){
                                    bot_managing_{$_POST['bot_amount']} = order_queue[i];
                                    processing.push(order_queue[i]);
                                    console.log("Added to Process Queue through condition 1: " + processing);
                                    break;
                                }
                            }
            
                            console.log("Bot " + {$_POST['bot_amount']} + " Currently Processing: " + bot_managing_{$_POST['bot_amount']});
                            console.log("Process Queue after interval: " + processing);
                        }, 10000);
                    }

                    start_process_{$_POST['bot_amount']}();
                </script>
            </div>
        html;
    }

    // append data to delete-area
    if(isset($_POST['remove_bot']) && isset($_POST['bot_amount'])){
        echo <<<html
            <script>
                clearInterval(interval_{$_POST['bot_amount']});
                console.log("Bot " + {$_POST['bot_amount']} + " will halt its process on: " + bot_managing_{$_POST['bot_amount']});
                processing.splice(processing.findIndex((element) => element == bot_managing_{$_POST['bot_amount']}), 1);

                delete bot_managing_{$_POST['bot_amount']};
                delete interval_{$_POST['bot_amount']};
            </script>
        html;
    }

?>

