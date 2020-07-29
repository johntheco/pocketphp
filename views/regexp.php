<h1>Regexp Example</h1>
<p><?php echo "<strong>Substring:</strong> " . substr($_SERVER['REQUEST_URI'], strpos(substr($_SERVER['REQUEST_URI'], 1), '/') + 1); ?></p>
