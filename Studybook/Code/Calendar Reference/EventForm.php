<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Make an Event</title>
    </head>
    <body>
        <h1>Make an Event</h1>
        <?php
        if (isset($_REQUEST['coursenumber']))
        {
            $coursenumber = $_REQUEST['coursenumber'];
        }
        else
            echo "<h2 style='color:red'>COURSE NUMBER MISSING<h2>";
        if (isset($_REQUEST['error']))
        {
            echo "<h2 style='color:red'> Please enter a ";
            echo $_REQUEST['error'];
            echo ".<h2>";
        }
        $Months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        ?>

        <form action="Eventtodb.php" method="GET">
            Event Name: <input type="text" name="name" /><br />
            Description: <textarea name="description" rows="3" cols="30"></textarea>
            <br />
            <select name="month">
                <option value="-1">-Month-</option>
                <?php
                $i = 1;
                foreach ($Months as $monthname)
                {
                    if ($i == $_REQUEST['month'])
                    {
                        echo "<option selected='selected' value='" . $i . "'>" . $monthname . "</option>";
                    }
                    else
                        echo "<option value='" . $i . "'>" . $monthname . "</option>";
                    $i++;
                }
                ?>
            </select>
            <select name="day">
                <option value="-1">-Day-</option>
                <?php
                for ($i = 1; $i <= 31; $i++)
                {
                    echo "<option value='";
                    echo $i;
                    echo "'>";
                    echo $i;
                    echo "</option>";
                }
                ?>
            </select>
            <br />
            <input type="hidden" name="year" value="<?php echo date("Y") ?>" />
            <!-- must be changed!!!-->
            <input type="hidden" name="coursenumber" value="<?php echo $coursenumber?>" />
            <input type="submit" value="Submit"/>
            <input type="reset" />
        </form>
    </body>
</html>
