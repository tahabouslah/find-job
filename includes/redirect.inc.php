<?php 

  if (isset($_POST['choose'])) {
  // Check if the submit button was clicked

  if (isset($_POST['role'])) {
    // Check if a radio button was selected

    $selectedPage = $_POST['role'];

    // Redirect to the appropriate page based on the selected radio button
    if ($selectedPage == 'seeker') {
      header('Location: ../login - create aacount job seeker.php');
      exit;
    } elseif ($selectedPage == 'emp') {
      header('Location: ../login - create account as job offerer.php');
      exit;
    } else {
      // Handle invalid selection
      echo "Invalid selection";
    }
  } else {
    // Handle case when no radio button was selected
    echo "Please select a page";
  }
}