<?php

function maintanance($path) {
    $files_removed = false;
           
    try {
        $files = glob($path . '*.xml');
        // sort
        ksort($files);
        
        // remove all older than the last 20 modified files
        $nfiles = count($files);
        $tfiles = $nfiles;    
        while ($nfiles > 20) {                
            unlink($files[$tfiles - $nfiles]);
            $nfiles -= 1;
            $files_removed = true;
        } 
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
        $files_removed = false;
    }

    return $files_removed;
}
?>