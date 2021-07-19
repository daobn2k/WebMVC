<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
        spl_autoload_register(function($class){
            include_once 'system/libs/'.$class.'.php';
        });
        include_once 'app/config/config.php';

        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        
        
        
        if($url!=NULL){
            $url = rtrim($url,'/');
            $url = explode('/',filter_var($url, FILTER_SANITIZE_URL));
        }else{
            unset($url);
        }
        
        
        
        if(isset($url[0])){
            include_once('app/controllers/'.$url[0].'.php');
            $ctrler = new $url[0]();
            if(isset($url[2])){
                $ctrler->{$url[1]}($url[2]);
            }else{
                if(isset($url[1])){
                    $ctrler->{$url[1]}();
                }else{

                }
            }
        }else{
            include_once('app/controllers/index.php');
            $index = new index();
            $index->homepage();
        }
        
       
       
       

    ?>
    

</body>
</html>