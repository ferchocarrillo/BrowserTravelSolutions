Esta aplicacion fue desarrollada por fernando carrillo como un ejercicio para la compañia Browser Travel Solutions

trabajada en laravel 9.19
con php version 8.0.2
Composer version 2.3.6
npm 7.9.0
node v18.16.0
yajra/laravel-datatables-oracle 10.4

Inicialmente descargue el archivo o clone el proyecto segun prefiera, ajuste el archivo .ENV 

agregue la clave para poder visualizar las consultas de clima 

        OWM_API_KEY=631152a5ee9e18a862829f9e136c0a43

modifique el archivo config/services.php y agregue las siguientes lineas

    'owm' => [
        'key' => env('OWM_API_KEY'),
        ]

corra las migraciones con el comando 

        php artisan migrate       

en la terminal introducir la siguiente orden

        npm i 

y luego 

        npm run dev

luego inicialice el servidor local con el comando 

        php artisan serve

en el navegador pegue la siguiente direccion para cargar la pagina.

        http://127.0.0.1:8000/search?_token=wu0ehB9BtUNUiVzwQNYmpG3j9aZCQYKJSYwaliIj&city=&city=New+York



dentro del codigo presentado esta la opcion de habiliar la busqueda sin restricciones simplemente cambiado la opcion del display del div con el id "inpCity" pasarlo de none a block y hacelo lo contrario en el div con el id "selCity" 
#   B r o w s e r T r a v e l S o l u t i o n s 
 
 
