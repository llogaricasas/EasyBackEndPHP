# EasyBackEndPHP

<p>Customized Object Oriented PHP library built for Back-End development purposes. SQL Queries, FTP Connections and Image Size modifications can be performed using this Library.</p>


<h2>Documentation</h2>
<p>To initialize the plugin call the constructor after requiring the file in your PHP file</p>
<pre>  
  require 'EasyBackEndPHP.php';
  $library = new EasyBackEndPHP();
  $MySQL = $library->MySQL($host, $database, $user, $password);
  $FTP = $library->FTP($host, $user, $password);
  $ImageEditor = $library->ImageEditor($filename);
  
</pre>
<h2>The EasyBackEndPHP Creator</h2>
<p>EasyBackEndPHP is maintained by <a href="https://github.com/llogaricasas" target="_blank">Llogari Casas</a></p>

<h2>Thank you!</h2>
<p>I really appreciate all kind of feedback and contributions. Thanks for using and supporting EasyBackEndPHP!</p>
