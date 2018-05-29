<?php
if (php_sapi_name() != "cli") die();

function xcopy($source, $dest, $permissions = 0755){
    if (is_link($source)) { return symlink(readlink($source), $dest); }
    if (is_file($source)) { return copy($source, $dest);              }
    if (!is_dir($dest))   { mkdir($dest, $permissions);               }

    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') { continue; }
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    $dir->close();
    return true;
}
function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}
function showUsage(){
    echo
        ' -----------------              ' . PHP_EOL .
        '| T-REX FRAMEWORK |             ' . PHP_EOL .
        ' -----------------              ' . PHP_EOL .
        '* - Usage:                      ' . PHP_EOL .
        '  > php cli.php g module NAME   ' . PHP_EOL ;
}
function generate(){
    global $argv;

    switch ( strtolower($argv[2]) ){
        case 'm':
        case 'module':
            if(empty($argv[3])) return showUsage();

            $dir = TREX_ROOT. 'modules/' . $argv[3];
            if(!is_dir($dir)) {
                mkdir($dir);
                xcopy(TREX_ROOT.'core'.DIRECTORY_SEPARATOR.'cli'.DIRECTORY_SEPARATOR.'n-module',$dir);
                $items = getDirContents($dir);

                foreach ($items as $item) {
                    if(!is_dir($item))
                    file_put_contents(
                        $item,
                        str_replace(
                            '[%1]'     ,
                            ucwords($argv[3]) ,
                            file_get_contents($item)
                        )
                    );
                }

            }else{
                die('ERROR - The directory is not empty' . PHP_EOL);
            }
        break;
        default:
            return showUsage();
    }
}

switch ( strtolower($argv[1]) ){
    case 'g':
    case 'gen':
    case 'generate':
        generate();
    break;
    default:
        return showUsage();
}