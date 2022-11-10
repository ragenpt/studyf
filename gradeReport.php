<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<div class = "ReportTitle">
  <h4> Student Report </h4>
  <h4> Course Name </h4>
</div>
<div class="ReportTitle">
  <table class="a">
    <tr>
      <th><b>Assessment</b></th>
      <th><b>Weight</b></th>
      <th><b>Grade</b></th>
      <th><b>Range</b></th>
      <th><b>Feedback</b></th>
    </tr>
  </table><hr style="text-align:left; margin-left:10px; margin-right:10px;"><br><br>

  <?php
  // This section needs to be filled with the right info and variables
  ini_set('display_errors', '1');
  error_reporting(E_ALL);

  $db = odbc_connect("dsn", "userid", "password") or die ("could not connect<br />");

    $stmt = "Select * from tblEmployees ORDER BY LastName, FirstName";

    $result = odbc_exec($db, $stmt);

    if ($result == FALSE) die ("could not execute statement $stmt<br />");

    while (odbc_fetch_row($result)) // while there are rows
    {
       print "<tr>\n";
       print "  <td>" . odbc_result($result, "LastName") . "\n";
       print "  <td>" . odbc_result($result, "FirstName") . "\n";
       print "</tr>\n";
    }

    odbc_free_result($result);

    odbc_close($db);
 ?>

</div>




<div class="reportTotal">
  <p class = reportTotaltext> <b> Course Total : </p>
</div>

</html>
