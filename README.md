# CS157B

The connection information for our database in the config.php file.



For this project, I have followed a directory structure, which will help us to easily follow MVC pattern.
The directory is
  - src
      - configs:
          - Config.php: This file contains all the constants.  
          - CreateDB.php: This class is used for initializing connection to the database.
                          Also, this class contains functions to execute different queries. For eg: executeSignUp(params);

      - views: Contains one generic file (mainView.php), which takes care of HTML header and footer code.
          - layouts
              - ** In this folder all the php will carry on the functionality of rendering HTML code**.
              - SignUpView.php corresponds to displaying SignUp Page. And rest of them follows the same principle.
              - homePageViewInit: This file is a controller file, which decides whether user is signing up or logging in.
  - Index.php: This file is the entry point.


Index.php file load the landing page.
  If user clicks on LogIn: A param called action will appended to the url with value = "LogIn", and then it will be directed to Log in page.
  If user clicks on SignUp: Similarly "action" will appended to the url with value = "Signup", and then directed to Sign Up page.

After successful login or signUp, I would direct the page to HomePageView.php, in which I just display the username and password.
