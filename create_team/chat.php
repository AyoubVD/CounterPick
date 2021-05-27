<?php
include_once 'includes/init.php';
if(isset($_SESSION['user_id']) && isset($_SESSION['email'])){
    $user_data = $user_obj->find_user_by_id($_SESSION['user_id']);
    if($user_data ===  false){
        header('Location: logout.php');
        exit;
    }
    // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
    $all_users = $user_obj->all_users($_SESSION['user_id']);
}
else{
    header('Location: logout.php');
    exit;
}
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['user_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['user_id'], false);
?>
<?php include_once "header.php" ?>
    
    
    <style>
body                            { text-align: left; }
#page-wrap                      { width: 500px; margin: 30px auto; position: relative; }
#chat-area                      { color:black;height: 300px; overflow: auto; border: 1px solid #666; padding: 20px; background:white;border-style: solid;border-color: green;}
#chat-area span                 { color: black; background:green; padding: 4px 8px; -moz-border-radius: 5px; -webkit-border-radius: 8px; margin: 0 5px 0 0; }

</style>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">


    	name = "<?php echo  $user_data->teamname;?>:  ";	
    	
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	
    	// display name on page
    	$("#name-area").html("You are: <span>" + name +" "+ "</span>");
    	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>

</head>

<body onload="setInterval('chat.update()', 1000)" >
<div class="above"  style = "
                        margin: 600px;
                        margin-top: auto;
                        background-image: url(https://www.wallpapertip.com/wmimgs/59-594557_league-of-legends-neon.jpg);"
                         >
<h1 style="text-align:center;color:white;">Find teams to play against!</h1>

    <div id="page-wrap" >
    
        <h2 style="text-align:center;color:white;"> Chat</h2>
        </div>
        <p id="name-area"></p>
        
        <div id="chat-wrap"><div id="chat-area"></div></div>
        
        
        <form id="send-message-area"  style = "display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        border: 1px solid rgba(23,23,23, .2);
                        margin: 5px;
                        padding: 5px;
                        background-color: #FFF;
                        align-items: stretch;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        text-align: center;
                        align-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        background-image: url(https://www.wallpapertip.com/wmimgs/59-594557_league-of-legends-neon.jpg);"
                        >
            <p style="color:white;">Your message:</p>
            
            
            <textarea id="sendie" maxlength = '100' placeholder ="type message and enter"></textarea>
        </form>
        <h4><a style="color:white;" href='contact.php'><u>Report</u></a></h4>
    </div>
    <footer style="color:white;">
    <a style="color:white;" href="https://counterpick123.wordpress.com/">About us</a>
    <a style="color:white;" href="#">Teaser</a>
    <br>
    © 2021 - Counterpick - Thomas More
</footer>
</body>
</html>