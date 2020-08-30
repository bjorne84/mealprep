# Recipies database/blog
the database-setup includes all the sql script to create the database

# not included configfile has function for autoloading classes

create your own config file to look like this:

session_start();
$site_title = "Mealprep";
$divider = " | ";


testmode true = local
testmode false = liveserver

DEFINE YOUR SETTINGS!

$testMode = false;
if ($testMode) {
  error_reporting(-1);
  ini_set("display_errors", 1);
  define("DBHOST", "127.0.0.1");
  define("DBUSER", "root");
  define("DBPASS", "");
  define("DBDATABASE", "databasename");
} else {
  error_reporting(0);
  define("DBHOST", "");
  define("DBUSER", "");
  define("DBPASS", "");
  define("DBDATABASE", "");
}

/*Autoload of classes*/
spl_autoload_register('myAutoClass');


function myAutoClass($className) {  

  $path = 'classes/';
  $extension = '.class.php';
  $fileName = $path . $className . $extension;

  if (!file_exists($fileName)) {
    return false;
  }

  include_once $path . $className . $extension;
}
