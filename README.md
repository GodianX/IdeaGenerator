# Установка

# 1 Перед запуском требуется наличие:

1. Virtual Box
2. Vagrant
3. Composer
4. PHP 7.2
5. Node.js 
http://webupblog.ru/kak-ustanovit-node-js-na-windows/
6. Yarn 
https://yarnpkg.com/lang/en/docs/install/#windows-stable

# 2 Начальный этап

1. Клонируем проект
2. В папку с проектом кладем образ: https://yadi.sk/d/PwqQRrLOHa_Plw
3. Открываем консоль (в Windows консоль Git'a от имени администратора)

# 3 Действия в папке с проектом:

1. vagrant plugin install vagrant-hostmanager
2. vagrant up
3. composer install
4. билдим фронтенд: yarn encore dev
4. vagrant ssh
5. cd /vagrant
6. php bin/console d:m:m
4. В браузере открываем: http://dev.godeng/

# Фронтэнд
1. все стили писать в 

assets/css/app.scss

2. JS сюда 

assets/js/greet.js


При изменениях в css файлах, нужно в папке с проектом
выполнить одну из предпочитаемых команд.
Перед этим виртуальная машина должна быть активно, 
выполнять нужно не внутри образа (вагрант бокса):

1. yarn encore dev

(Эту команду требуется запускать при каждом изменении css или js)
2. yarn encore dev --watch

(Эта команда запускает автобилдинг css и js, каждое ваше изменение будет автоматически скомпилированно.
По завершению изменений выполнить "сntrl С" в консоле, далее выполнить первый пункт)
Подробная инфа: https://symfony.com/doc/current/frontend/encore/simple-example.html#configuring-encore-webpack


#  Завершаем работу:
1. vagrant halt

#  Фикс команды php bin/console d:m:diff

1. PostgreSqlSchemaManager.php:309
2. Заменяем тело функции:
https://stackoverflow.com/questions/47397435/how-to-correctly-use-doctrine-migrations-with-postressql
