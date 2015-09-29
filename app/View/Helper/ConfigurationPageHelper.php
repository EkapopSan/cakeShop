<?php
App::uses('AppHelper', 'View/Helper');

class ConfigurationPageHelper extends AppHelper {
    
    public function citiesTable($citiesObj) {
        
        $columns = 5;
        $count = count($citiesObj);
        $amount_per_column = floor($count/$columns);
        
        
        echo '<div class="span2">';
        foreach ($citiesObj as $key => $obj)
        {
            echo '<p class="city"><span class="badge">' . $obj['City']['id'] . '</span> ' . $obj['City']['name'] . '</p>';
            if(($key + 1) % 20 === 0) {
                echo '</div>';
                echo '<div class="span3">';
            }
        }
        echo '</div>';
    }
    
}