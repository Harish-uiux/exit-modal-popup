# exit-modal-popup
The above plugin is called "Modal On Exit" and it is designed to show a modal popup when the user is about to leave the current page. The purpose of the popup is to confirm whether the user wants to leave the page or not. The plugin is implemented as a WordPress plugin that can be easily installed on any WordPress site.
The plugin adds a modal popup to the bottom of the page that contains a message asking the user if they are sure they want to leave the page. The modal also contains two buttons: "Yes" and "No". If the user clicks "Yes", they will be redirected to the link they clicked after a 5 second delay. If they click "No", the modal will be hidden and navigation will be blocked.

The plugin uses jQuery to listen for the beforeunload and mouseleave events to detect when the user is about to leave the page. It also listens for the click event on all links on the page, except for "mailto" and "tel" links, to show the modal if the user clicks on a link to navigate to another page on the site.

Overall, the "Modal On Exit" plugin provides a simple and effective way to prevent users from accidentally leaving a page and provides them with a clear choice before navigating away.
