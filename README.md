# Тестовое задание 
## Помощник веб-разработчика 

1. Создайте БД
2. Создайте таблицу в БД под названием PROTOCOL_TABLE
3. Добавьте в нее столбцы:
- Номер протокола
- Дата выдачи
- Ответственный сотрудник
- Признак соответствия значений в протоколе нормам
4. Создайте на сервере файл protocol.php, который позволяет вывести в табличном виде данные из PROTOCOL_TABLE.
   № п\п
   Номер протокола
   Дата выдачи (дд.мм.гг)
   Ответственный (ФИО)
   Соответствие («да», «нет»)
5. Создайте под таблицей с результатами запроса к БД кнопку: «Добавить протокол». При клике происходит переход к форме добавления записи в таблицу PROTOCOL_TABLE. В форме должны содержаться требуемые поля для заполнения и кнопка «сохранить».
6. По нажатию кнопки "сохранить", должна производится запись значений в PROTOCOL_TABLE и возврат к таблице с протоколами.
7. В случае, когда указанный номер протокола совпадает с уже существующим в базе, должно появляться всплывающее окно с текстом предупреждения. Сохранения в БД введенных данных при этом не производится.
