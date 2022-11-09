<?php
    function getSettings(){
        $data = file_get_contents('https://ramnav.westeurope.cloudapp.azure.com/js/settings.json');
        return json_decode($data, true);
    }
    function updateSettings($data, $id){
        $updateSettings = [];
        $settings = getSettings();
        foreach ($settings as $i => $setting) {
            if ($setting['id'] == $id) {
                $settings[$i] = $updateSettings = array_merge($setting, $data);
            }
        }

        putJson($settings);
        return $updateSettings;
    }
    function putJson($settings){
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/js/settings.json', json_encode($settings, JSON_PRETTY_PRINT));
    }

?>