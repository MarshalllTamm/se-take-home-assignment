<?php

    if(isset($_POST['order_amount']) && isset($_POST['order_detail']) && isset($_POST['order_quantity']) && isset($_POST['customer_type'])){
        $placeholder = "regular-order";

        if($_POST['customer_type'] == "vip"){
            $placeholder = "vip-order";
        }

        echo <<<html
            <div class="col-3 text-center justify-self-center rounded border {$placeholder}" style="height: 150px;" id="{$placeholder}-{$_POST['order_amount']}">
                <div class="w-100" style="height: 70%;">
        html;
        echo $_POST['order_detail'];
        echo <<<html
                </div>
                <div class="w-100" style="height: 30%;">
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

    if(isset($_POST['add_bot']) && isset($_POST['bot_amount'])){
        echo <<<html
            <div class="col-3 text-center justify-self-center bg-black rounded p-0" style="height: 150px;" id="bot-{$_POST['bot_amount']}">
                <img src="Images/robot.png" height="150" class="" alt="">
                <script>
                    
                </script>
            </div>
        html;
    }

    if(isset($_POST['remove_bot']) && isset($_POST['bot_amount'])){
        echo "<script>" . "clearInterval(interval_" . $_POST['bot_amount'] . "); alert({$_POST['bot_amount']});";
        echo <<<html

            processing.splice(processing.findIndex(managing_{$_POST['bot_amount']}), 1);
        </script>";
        html;
    }

?>

