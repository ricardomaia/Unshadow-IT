<h1>Workflow Step 2</h1>
flag:
<pre>
<?php
echo isset($_GET['flag']) ? base64_decode($_GET['flag']) : "no param";
?>
</pre>