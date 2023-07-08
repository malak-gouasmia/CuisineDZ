<?php

require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/Controller/Controller.php');
require_once($_SERVER['DOCUMENT_ROOT'] . './code/User/View/PartieFixe.php');
class  Contact
{
    /***************************** */
    public function header()
    {
?>
<head>
   <title>Contact</title>
   <link rel="stylesheet"  href="Contact.css">
     
     
   </head>
    
       
        
    <?php
    }
  

    public function ContactUs()
    { ?> <div class="frameN">
    <div class="container">
      <h1>Contact Us</h1>
      <div class="contact-info">
          <p>Email: jm_gouasmia@esi.dz</p>
          <p>Numéro de téléphone: +213 783796220</p>
      </div>
      <form>
          <label>Nom:</label>
          <input type="text" name="name" required>
          <label>Email:</label>
          <input type="email" name="email" required>
          <label>Message:</label>
          <textarea name="message" required></textarea>
          <button type="submit">Submit</button>
      </form>
      <p class="message-sent">Message Sent!</p>
  </div>
  </div>
  <?php
  }
    
    /***************************** */
   
     
     /***************************** */
     /***************************** */
    public function display()
    {
        $this->header();
        $view = new PartieFixe();
        $view->Entete();
        $this->ContactUs();
        $view->Footer();
       
     
        
    }
    /***************************** */
}

?>