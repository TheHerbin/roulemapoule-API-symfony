# roulemapoule-API-symfony
api used for users service  

# Installation :   
You need a APACHE server with Mysqli and mysqliPDO extension (PHP 8)  
-type composer install   

## Database installation :   
-change the .env to your needs ( default is NOT secure at all )  
-type php bin/console doctrine:database:create  
-type php bin/console doctrine:migrations:migrate  
