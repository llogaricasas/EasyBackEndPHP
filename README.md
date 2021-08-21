# EasyBackEndPHP

<p>Customized Object Oriented PHP library built for Back-End development purposes. SQL Queries, FTP Connections and Image Size modifications can be performed using this Library.</p>


<h2>Documentation</h2>
<p>To initialize the plugin call the constructor after requiring the file in your PHP file</p>
<pre>  
require 'EasyBackEndPHP.php';
  
  $library = new EasyBackEndPHP();
  
  $CharEncoding    = $library->CharEncoding($string);
  $FTP             = $library->FTP($host, $user, $password);
  $ImageEditor     = $library->ImageEditor($filename);
  $MySQL           = $library->MySQL($host, $database, $user, $password);
  $Session         = $library->Session($lifetime, $path, $domain, $secure, $http_only);
  $StringGenerator = $library->StringGenerator($lenght);
  
</pre>
<h2>The EasyBackEndPHP Creator</h2>
<p>EasyBackEndPHP is maintained by <a href="https://github.com/llogaricasas" target="_blank">Llogari Casas</a></p>
