<?php
    function getReports(){
        require('dbConn.php');
        $sql = "SELECT * FROM reports ORDER BY `reportID` DESC;";

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return $result;
            } else {
                echo 'No Results Found';
            }
        }
    
        $conn->close();
    }

    function deleteReport($id){
        require('dbConn.php');
        $sql = "DELETE FROM reports WHERE reportID=$id;";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

    function getSettings(){
        $data = file_get_contents('https://ramnav.westeurope.cloudapp.azure.com/js/settings.json');
        return json_decode($data, true);
    }

    function updateSettings($data, $id){
        $updateSetting = [];
        $settings = getSettings();

        foreach ($settings as $i => $setting) {
            if ($setting['id'] == $id) {
                $setting[$i] = $updateSetting = array_merge($setting, $data);
            }
        }

        putSettingJson($setting);

        return $updateSetting;
    }

    function putSettingJson($setting){
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/js/settings.json', json_encode($setting, JSON_PRETTY_PRINT));
    }
?>