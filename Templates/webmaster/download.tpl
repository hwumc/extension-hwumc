{extends file="base.tpl"}
{block name="pagedescription"}{/block}
{block name="body"}
<p>The site's software can be downloaded by clicking the button below. This package is an almost-complete copy of the filesystem, except for a number of items:</p>
<ol>
	<li><tt>/.my.cnf</tt>: The MySQL client configuration file.</li>
	<li><tt>/config.local.php</tt>: The local software's installation configuration.</li>
	<li>Any uploaded files</li>
</ol>
<div class="alert alert-warning"><strong>Watch out!</strong> This file does NOT include a copy of the database that is required to run this site. You can download that further down the page.</div>
<div class="container-fluid"><div class="row-fluid"><a href="{$cWebPath}/package.tar" class="btn btn-block btn-large btn-primary offset4 span4">Download</a></div></div>
<h3>Migration</h3>

<p>If you wish to migrate to a new web host, please verify that the new host is capable of supporting the following software (or above):
<ul>
	<li>PHP 5.3</li>
	<li>PHP Extensions:
		<ul>
			<li>PDO 1.0.4</li>
			<li>OpenSSL</li>
			<li>PDO MySQL driver (pdo_mysql)</li>
		</ul>
	</li>
	<li>MySQL Server 5.5</li>
</ul>
</p>

<p>Download the software archive, and place the extracted archive in the document root on the new server.</p>
<p>Create a new file called <tt>.my.cnf</tt> containing the following text, replacing <code>XXX</code> with your database server username, and <code>YYY</code> with your database server password.
<pre>
[client]
user="XXX"
password="YYY"
</pre>
</p>
<div class="alert alert-info"><strong>Hint:</strong> The name of <tt>.my.cnf</tt> is configurable in the <tt>$cMyDotCnfFile</tt> variable in <tt>config.local.php</tt></div>
<div class="alert alert-error alert-block"><h4>Here be dragons!</h4>Be sure to either configure your web server to disable access to this file, or move it outside the web root and change the path to it in <tt>config.local.php</tt>. Otherwise anyone on the internet will be able to download your database configuration and read everything in your database.</div>
<p>You'll also need to create a new file called <tt>config.local.php</tt>, containing something along the lines of the following (replacing HOSTNAME with the hostname of the database server, and DATABASE with the name of the database:</p>
<pre>
&lt;?php
$cDatabaseConnectionString = 'mysql:host=HOSTNAME;dbname=DATABASE';

{foreach from="$extensions" item="ext" key="name"}
$cExtensions["{$name}"] = $cFilePath . '{$ext}';
{/foreach}
</pre>
<p>Finally, you need to run the database script (SQL file) against the new database to import the data.</p>
<h3>Database download</h3>
<p>Click the button below to download a complete copy of the database.
<div class="alert alert-error alert-block"><h4>Here be dragons!</h4>This file will contain ALL the data contained within the database, including sensitive data. Be sure you protect the downloaded file.</div>
<div class="container-fluid"><div class="row-fluid"><a href="#myModal" class="btn btn-block btn-large btn-warning offset4 span4" data-toggle="modal" role="button">Download Database</a></div></div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <h3 id="myModalLabel">Not available</h3>
  </div>
  <div class="modal-body">
    <p>This feature is currently disabled for security. Please contact the webmaster for a database dump.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
{/block}