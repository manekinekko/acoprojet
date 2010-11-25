<?php



?>
<html>
   <head>
      <link rel="stylesheet" type="text/css" media="screen" href="/acoprojet/assets/css/styles.css" />
      <script  type="text/javascript" src="/acoprojet/assets/js/lib.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="/acoprojet/assets/js/jq.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="/acoprojet/assets/js/ajax.js" language="JavaScript" ></script>
   </head>
   <body>
      <h1>ACO : Projet M1</h1>
      <div id="content">
         <div class="col_left">
            <form id="formulaire" method="" action="">
               <fieldset>
                  <legend><b>Menu</b></legend>
                  <button name="cutText" name="cutText" id="cutText" value="1" type="button">Couper</button>
                  <button name="copyText" name="copyText" id="copyText" value="1" type="button">Copier</button>
                  <button name="pasteText" name="pasteText" id="pasteText" value="1" type="button">coller</button>
               </fieldset>
               <fieldset>
                  <legend><b>Editeur de texte</b></legend><textarea id="text" rows="10" cols="40"></textarea>
               </fieldset>
            </form>
         </div>
         <div class="col_right">
            <div id="console">
               <pre id='pre'></pre>
            </div>
         </div>
   </body>
   
</html>