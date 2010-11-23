<?php



?>
<html>
   <head>
      <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css" />
      <script  type="text/javascript" src="js/lib.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="js/jq.js" language="JavaScript" ></script>
      <script  type="text/javascript" src="js/ajax.js" language="JavaScript" ></script>
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
               <legend><b>Editeur de texte</b></legend>
               <textarea id="text" rows="10" cols="80">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
               </textarea>
            </fieldset>
         </form>
         <div class="col_right">
            <div id="console">
               <p id="log">
               </p>
            </div>
         </div>
      </div>
   </body>
   
</html>