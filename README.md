# Init

~~~
cd sandbox
php app/console doctrine:database:create
php app/console doctrine:schema:create
php app/console fos:user:create --super-admin admin admin@domain.com SECRETPASSWORD
~~~