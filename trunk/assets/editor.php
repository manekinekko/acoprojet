<?php



?>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
      <link rel="stylesheet" type="text/css" media="screen" href="/acoprojet/assets/css/styles.css" />
      <script  type="text/javascript" src="/acoprojet/assets/js/jq.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="/acoprojet/assets/js/config.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="/acoprojet/assets/js/lib.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="/acoprojet/assets/js/listener.js" language="JavaScript" ></script>
   </head>
   <body>
      
      <div id="content">
         <div class="col_left">
            <h1>ACO : Project M1</h1>
            <form id="formulaire" method="post" action="">
               <fieldset>
                  <legend><b>Menu</b></legend>
                  <button name="cut" id="cut" value="1" type="button">Cut</button>
                  <button name="copy" id="copy" value="1" type="button">Copy</button>
                  <button name="paste" id="paste" value="1" type="button">Paste</button>
                  <button name="replay" id="replay" value="1" type="button" disabled="disabled">Replay</button>
               </fieldset>
               <fieldset>
                  <legend><b>Text Editor</b></legend><textarea id="text" rows="10" cols="40"></textarea>
               </fieldset>
            </form>
            <a href="bin/tests/PHPUnitTest-coverage/" >Unit Tests</a> | 
            <a href="documentation/phpdoc/" >API Documentation</a> | 
            <a href="?clear" >Clear Session</a>
         </div>
         <div class="col_right">
            <div id="console">
               <pre id='pre'></pre>
            </div>
         </div>
    </div>
   </body>
   
</html>