<!DOCTYPE html>
<html>
<head>
    <title>Get Device Info</title>
</head>
<body>
    <form method="POST">
        <label for="username">eWeLink Username:</label>
        <input type="text" name="username" id="username" required value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"><br><br>
        
        <label for="password">eWeLink Password:</label>
        <input type="password" name="password" id="password" required value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"><br><br>
        
        <label for="region">Region:</label>
        <input type="text" name="region" value="us" id="region" required value="<?php echo isset($_POST['region']) ? $_POST['region'] : ''; ?>"><br><br>
        
        <input type="submit" name="submit" value="Get Device Information">
    </form>
    
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $region = $_POST['region'];
        
        // Create the getDevices.js file
        $content = "const ewelink = require('ewelink-api');\n\n";
        $content .= "(async () => {\n\n";
        $content .= "  const connection = new ewelink({\n";
        $content .= "    email: '" . $username . "',\n";
        $content .= "    password: '" . $password . "',\n";
        $content .= "    region: '" . $region . "',\n";
        $content .= "  });\n\n";
        $content .= "  /* get all devices */\n";
        $content .= "  const devices = await connection.getDevices();\n";
        $content .= "  console.log(devices);\n\n";
        $content .= "})();";
        
        file_put_contents("getDevices.js", $content);
        
        // Execute the getDevices.js file using Node.js and shell_exec
        $output = shell_exec("node getDevices.js");
        
        // Display the output
        echo "<pre>$output</pre>";
    }
    ?>
    
    <?php
    if (isset($_POST['submit']) && !empty($output)) {
        echo '<form method="POST">';
        echo '<input type="hidden" name="username" value="' . $username . '">';
        echo '<input type="hidden" name="password" value="' . $password . '">';
        echo '<input type="hidden" name="region" value="' . $region . '">';
        
        echo '<label for="deviceId">Device ID:</label>';
        echo '<input type="text" name="deviceId" id="deviceId" required><br><br>';
        
        echo '<input type="submit" name="toggleDevice" value="Toggle Device On/Off">';
        echo '</form>';
    }
    
    if (isset($_POST['toggleDevice'])) {
        $deviceId = $_POST['deviceId'];
         $username = $_POST['username'];
        $password = $_POST['password'];
        $region = $_POST['region'];
        
        // Create the toggleDevice.js file
        $content = "const ewelink = require('ewelink-api');\n\n";
        $content .= "(async () => {\n\n";
        $content .= "  const connection = new ewelink({\n";
        $content .= "    email: '" . $username . "',\n";
        $content .= "    password: '" . $password . "',\n";
        $content .= "    region: '" . $region . "',\n";
        $content .= "  });\n\n";
        $content .= "  const status = await connection.toggleDevice('" . $deviceId . "');\n";
        $content .= "  console.log(status);\n\n";
        $content .= "})();";
        
        file_put_contents("toggleDevice.js", $content);
        
        // Execute the toggleDevice.js file using Node.js and shell_exec
        $toggleOutput = shell_exec("node toggleDevice.js");
        
        // Display the toggle output
        echo "<pre>$toggleOutput</pre>";
    }
    ?>
</body>
</html>
