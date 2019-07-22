<!-- <style>
    /* Chat containers */
    .container1 {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    }

    /* Darker chat container */
    .darker {
    border-color: #ccc;
    background-color: #ddd;
    }

    /* Clear floats */
    .container1::after {
    content: "";
    clear: both;
    display: table;
    }

    /* Style images */
    .container1 img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
    }

    /* Style the right image */
    .container1 img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
    }

    /* Style time text */
    .time-right {
    float: right;
    color: #aaa;
    }

    /* Style time text */
    .time-left {
    float: left;
    color: #999;
    }
    .right {
    float: right;
    color: #999;
    }
</style>     -->
    <div class="container mt-3 mb-5 pb-5">
        <?php 
            foreach($messages as $message){
                if($this->session->userdata('user_type') == 'admin'){
                    if($message->from_admin){
            ?>
                        <div class="container1 darker">
                        <img src="<?php echo site_url()?>assets/images/ccaplogo.png" alt="Avatar" class="right">
                        <p class="right"><?php echo $message->chat_message; ?></p>
                        <span class="time-right"><?php echo $message->time_stamp; ?></span>
                        </div>
            <?php
                    }else{
                      
                        ?>
                        <div class="container1 darker">
                        <h4 class="left"><?php //echo $message->user_id?></h4>

                        <img src="<?php echo site_url()?>assets/images/user_logo.jpg" alt="Avatar" >
                        <p class="left"><?php echo $message->chat_message; ?></p>
                        <span class="time-left"><?php echo $message->time_stamp; ?></span>
                        </div>
                        <?php
                    }
        ?>
            
                    <?php }else{ 
                        if(!$message->from_admin){
                             ?>
                        <div class="container1 darker">
                            <img src="<?php echo site_url()?>assets/images/user_logo.jpg" alt="Avatar" class="right">
                            <p class="right"><?php echo $message->chat_message; ?></p>
                            <span class="time-right"><?php echo $message->time_stamp; ?></span>
                            </div>
                        <?php
                        }else{
                            ?>
                            <div class="container1 darker">
                        <!-- <h4 class="left"><?php echo $message->user_id?></h4> -->

                            <img src="<?php //echo site_url()?>assets/images/ccaplogo.png" alt="Avatar" >
                            <p class="left"><?php echo $message->chat_message; ?></p>
                            <span class="time-left"><?php echo $message->time_stamp; ?></span>
                            </div>
                            <?php
                        }
                }
        } ?>

        <form action="/ccap/chat/send_chat" method="POST">
            <?php
                // var_dump(intval($this->uri->segment(2)));
            ?>
            
            <input type="hidden" name="user_id" value="<?php echo intval($this->uri->segment(2)); ?>">
            <textarea name="chat_message" id="message" class="form-control" rows="10"></textarea>
            
            <input type="submit" class="btn btn-primary mt-3 float-right">
            
        </form>
    </div>
