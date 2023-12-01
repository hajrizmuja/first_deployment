<!DOCTYPE html> 
<html> 
<head> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
  <link rel="stylesheet" type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
  <script src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.core.min.js"></script>
  <script src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.calbox.min.js"></script>
  <script src="http://dev.jtsage.com/cdn/datebox/i18n/jquery.mobile.datebox.i18n.en_US.utf8.js"></script>
</head> 
<body> 
    <div data-role="page">
      <div data-role="header">
      Tasks
      </div>
      <div data-role="content">
      <div data-role="collapsible-set" data-inset="false">
        <?php foreach ($lists['items'] as $list): ?>
          <?php $id = $list['id']; ?>
          <div data-role="collapsible">
            <h2><?php echo $list['title']; ?></h2>
            <ul data-role="listview">
              <?php if (isset($tasks[$id]['items'])): ?>
                <?php foreach ($tasks[$id]['items'] as $task): ?>
                <li>                
                  <div class="ui-grid-b">
                    <div class="ui-block-a">
                      <?php if ($task['status'] == 'needsAction'): ?>
                      <h3><?php echo $task['title']; ?></h3> 
                      <?php else: ?>
                      <h3 style="text-decoration:line-through"><?php echo $task['title']; ?></h3> 
                      <?php endif; ?>
                      <?php if (isset($task['due']) && ($task['status'] == 'needsAction')): ?>
                      <p>Due on <?php echo date('d M Y', strtotime($task['due'])); ?></p> 
                      <?php endif; ?>                    
                      <?php if (isset($task['completed']) && ($task['status'] == 'completed')): ?>
                      <p>Completed on <?php echo date('d M Y', strtotime($task['completed'])); ?></p> 
                      <?php endif; ?>                    
                    </div>                    
                    <div class="ui-block-b"></div>                    
                    <div class="ui-block-c">
                      <?php if ($task['status'] == 'needsAction'): ?>
                      <a href="/update-task/<?php echo $id; ?>/<?php echo $task['id']; ?>" data-inline="true" data-role="button" data-icon="check" data-theme="a">Done!</a>
                      <?php endif; ?>
                      <a href="/delete-task/<?php echo $id; ?>/<?php echo $task['id']; ?>" data-inline="true" data-role="button" data-icon="delete" data-theme="a">Remove task</a>
                    </div>
                  </div>
                </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul> <br/>
            <a href="/add-task/<?php echo $id; ?>" data-inline="true" data-role="button" data-icon="plus" data-theme="a">Add new task</a>
            <a href="/delete-list/<?php echo $id; ?>" data-inline="true" data-role="button" data-icon="delete" data-theme="a">Remove list</a>
          </div>
        <?php endforeach; ?>
        </div>
        <a href="/add-list" data-inline="true" data-role="button" data-icon="plus" data-theme="b">Add new list</a> 
      </div>
    </div>
</body>
</html>
