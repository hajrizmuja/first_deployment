<!DOCTYPE html> 
<html> 
<head> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head> 
<body> 
    <div data-role="page">
      <div data-role="header">
      Add List
      </div>
      <div data-role="content">
        <div data-role="collapsible-set">
          <form method="post" action="/add-list">
            <label for="title">Title:</label>
            <input name="title" id="title" data-clear-btn="true" type="text"/>
            <input name="submit" value="Save" type="submit" data-icon="check" data-inline="true" data-theme="a" />
            <a href="/index" data-role="button" data-inline="true" data-icon="back" data-theme="a">Back</a>
          </form>
      </div>
    </div>
</body>
</html>
