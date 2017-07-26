<?php
/*
Steps in replicating the Applicator Snapon:
0. Files and Folders
• Update include in snapons.php
• Create new Snapon folder in snapons > new folder
• Create index.php
• Create assets folder
• Create stylesheet file with snapon name

1. Change function names
• Functionalities
• Styles
• Scripts

2. Update Styles
• Stylesheet name
• Stylesheet path

3. Update Scripts
• Script name
• Script path
*/

// Applicator
require_once get_template_directory() . '/snapons/applicator/index.php';

// Full of BS
require_once get_template_directory() . '/snapons/full-of-bs/index.php';