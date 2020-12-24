/* Подсчитать количество книг каждого автора (наименований). Столбцы ответа: Имя автора, общее количество книг */
SELECT b.NAME AS 'Имя автора', COUNT(BOOK_ID) AS 'Общее количество книг' 
	FROM book AS a, author AS b, author_book AS c 
		WHERE a.ID=c.BOOK_ID AND b.ID=c.AUTHOR_ID 
			GROUP BY b.NAME

/* Подсчитать суммарный остаток книг каждого автора во всех магазинах. Столбцы ответа: Имя автора, Город магазина, Суммарный остаток книг */
SELECT d.NAME AS 'Имя автора', b.CITY AS 'Город магазина', SUM(QUANTITY) AS 'Суммарный остаток книг'
	FROM book AS a, store AS b, book_store AS c, author AS d, author_book AS f
    		WHERE a.ID=c.BOOK_ID AND b.ID=c.STORE_ID AND a.ID=f.BOOK_ID AND d.ID=f.AUTHOR_ID 
			GROUP BY d.NAME, b.CITY

/* Вывести среднюю стоимость книг издательства «Азбука». Столбцы ответа: Название книги, средняя стоимость. */
SELECT b.NAME AS 'Название книги', AVG(PRICE) AS 'Cредняя стоимость'
	FROM book_store AS a, book AS b, publisher AS c
		WHERE (b.ID=a.BOOK_ID AND c.ID=b.PUBLISHER_ID) AND c.NAME = 'Азбука'
        	GROUP BY b.NAME
			


/* Вывести среднюю стоимость книг издательства «Азбука» в каждом магазине. Столбцы ответа: Город, Название книги, средняя стоимость */
SELECT d.CITY AS 'Город', b.NAME AS 'Название книги', AVG(a.PRICE) AS 'Cредняя стоимость'
	FROM book_store AS a, book AS b, publisher AS c, store AS d, book_store AS f
		WHERE (b.ID=a.BOOK_ID AND c.ID=b.PUBLISHER_ID AND b.ID=f.BOOK_ID AND d.ID=f.STORE_ID) AND c.NAME = 'Азбука'
        		GROUP BY d.CITY, b.NAME


/* Вывести разницу между остатком книг в Калининграде и Черняховске. Столбцы ответа: Название книги, остаток в Калининграде, остаток в Черняховске, Разница. */
SELECT Q1.NAME, Q1.S1 AS 'Количество в Калининграде', Q2.S2 AS 'Количество в Черняховске', Q1.S1 - Q2.S2 AS 'Разница'
	FROM
        (SELECT NAME, b.QUANTITY AS S1
            FROM book AS a, book_store AS b, store AS c
                WHERE (a.ID=b.BOOK_ID AND c.ID=b.STORE_ID) AND c.CITY = 'Калининград'
                    GROUP BY b.`QUANTITY`, a.`NAME`) AS Q1,

        (SELECT NAME, b.QUANTITY AS S2
            FROM book AS a, book_store AS b, store AS c
                WHERE (a.ID=b.BOOK_ID AND c.ID=b.STORE_ID) AND c.CITY = 'Черняховск'
                    GROUP BY b.QUANTITY, a.NAME) AS Q2
                
    WHERE Q1.NAME=Q2.NAME