<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>IFrame Base Facebook Application Development Updated. Using PHP SDK 3.0 | Thinkdiff.net</title>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <style type="text/css">
            a{
                text-decoration: none;
                color: blue;
            }
            a:hover{
                text-decoration: underline;
                color: olive;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tabs").tabs();
            });

            function updateStatus(){
                var status  =   document.getElementById('status').value;
                
                $.ajax({
                    type: "POST",
                    url: "<?=$fbconfig['baseUrl']?>/ajax.php",
                    data: "status=" + status,
                    success: function(msg){
                        alert(msg);
                    },
                    error: function(msg){
                        alert(msg);
                    }
                });
            }
            function updateStatusViaJavascriptAPICalling(){
                var status  =   document.getElementById('status').value;
                    FB.api('/me/feed', 'post', { message: status }, function(response) {
                        if (!response || response.error) {
                             alert('Error occured');
                        } else {
                             alert('Status updated Successfully');
                        }
                   });
            }
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){        
                FB.ui({ method : 'feed', 
                        message: userPrompt,
                        link   :  hrefLink,
                        caption:  hrefTitle
                      });
                    //http://developers.facebook.com/docs/reference/dialogs/feed/
        
                /* 
                 * Deprecated code
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {

                }); */
            }
            function publishStream(){
                streamPublish("Stream Publish", 'Thinkdiff.net is simply awesome. I just learned how to develop Iframe+Jquery+Ajax base facebook application development using php sdk 3.0. ', 'Checkout the Tutorial', 'http://wp.me/pr3EW-sv', "Demo Facebook Application Tutorial");
            }
            function increaseIframeSize(w,h){
                var obj =   new Object;
                obj.width=w;
                obj.height=h;
                FB.Canvas.setSize(obj);
            }

            function newInvite(){
                 var receiverUserIds = FB.ui({ 
                        method : 'apprequests',
                        message: 'come on man checkout my application. visit http://thinkdiff.net',
                 },
                 function(receiverUserIds) {
                          console.log("IDS : " + receiverUserIds.request_ids);
                        }
                 );
                 //http://developers.facebook.com/docs/reference/dialogs/requests/
            }
        </script>
    </head>
<body>
    <div id="fb-root"></div>
    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
     <script type="text/javascript">
       FB.init({
         appId  : '<?=$fbconfig['appid']?>',
         status : true, // check login status
         cookie : true, // enable cookies to allow the server to access the session
         xfbml  : true  // parse XFBML
       });
       
     </script>
   <a href="http://ithinkdiff.net" target="_blank" style="text-decoration: none;">
       <img src="http://ftechdb.com/ithinkdiff.net-banner.jpg" style="border:none" alt="Download iPhone/iPad Dictionaries, Applications & Games" height="92" />
   </a>
    <h3>IFrame Base Facebook Application Development | Thinkdiff.net</h3>
    <a href="http://wp.me/pr3EW-sv" target="_blank">Tutorial: How to develop iframe base facebook application</a> <br /><br />

    <a href="<?=$fbconfig['appBaseUrl']?>" target="_top">Home</a> |
    <a href="#" onclick="newInvite(); return false;">Send Request/Send Invitation</a>

    <br /><br />
     <?php
        if (isset($page)) {
            if ($page === 'home.php')
            include_once $page;
        }
    ?>
    </body>
</html>