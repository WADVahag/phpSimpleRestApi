В целом план такой 

1
для того чтоб не изобретать велосипед берем эту репозиторию 
https://github.com/bradtraversy/php_rest_myblog

2
Создаем новую базу данных randomnumbers и импортируем randomnumbers.sql 
 меняем проект под себя
Тоесть пост становиться обычной цыфрой а категория больше не нужна

3
Меняем create && readsingle на generate() и retrieve(id)

план выполнен 

пути для проверки апи

http://localhost/phpSimpleRestApi/api/randomnumber/generate.php
http://localhost/phpSimpleRestApi/api/randomnumber/read.php
http://localhost/phpSimpleRestApi/api/randomnumber/retrieve.php/?id=2

