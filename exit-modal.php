<?php
/*
Plugin Name: Modal On Exit
Description: Show a modal popup when the user is about to leave the current page.
Version: 1.0
Author: Your Name
*/

function modal_on_exit() {
  ?>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <p>Are you sure you want to leave this page?</p>
      <button id="modal-confirm">Yes</button>
      <button id="modal-cancel">No</button>
    </div>
  </div>

  <style>
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content */
  .modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
    text-align: center;
  }

  #modal-confirm, #modal-cancel {
    margin: 10px;
    padding: 5px 10px;
    border: none;
    background-color: #008CBA;
    color: #fff;
    cursor: pointer;
    border-radius: 5px;
  }

  #modal-confirm:hover, #modal-cancel:hover {
    background-color: #005D6E;
  }
  </style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    jQuery(function($) {
      var modalShown = false;
      var unloadBlocked = false;

      $(window).on('beforeunload', function(event) {
        if (!modalShown && !unloadBlocked) {
          event.preventDefault();
          $('#myModal').show();
          modalShown = true;
          return "Are you sure you want to leave this page?";
        }
      });

      $(document).mouseleave(function(event) {
        if (!modalShown && !unloadBlocked) {
          $('#myModal').show();
          modalShown = true;
        }
      });

      $('a').not('[href^="mailto:"], [href^="tel:"]').click(function(event) {
        if (!modalShown && !unloadBlocked) {
          event.preventDefault();
          $('#myModal').show();
          modalShown = true;
          setTimeout(function() {
            window.location.href = event.currentTarget.href;
          }, 5000); // Redirect after 5 seconds
        }
      });

      $('#modal-confirm').click(function() {
        modalShown = false;
        $('#myModal').hide();
        unloadBlocked = false;
      });

      $('#modal-cancel').click(function() {
        modalShown = false;
        $('#myModal').hide();
        unloadBlocked = true;
      });
    });
  </script>
  <?php
}
add_action('wp_footer', 'modal_on_exit');