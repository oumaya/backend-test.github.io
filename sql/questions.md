# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
# select * from `author` where `last_name` like "M%" and YEAR (birth_date)>=1950
```

**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
# B) select category.name as cat, count(book.id) as num_books from `book` left join category on (book.category_id = category.id) group by book.category_id
```

**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
# select author.first_name from author inner join (select author_id from book groupe by author_id having count(author_id)>=2) book on book.author_id=author.id
```

**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
# select DISTINCT author.last_name from `author` INNER join `author_event` on (author.id= author_event.author_id) LEFT JOIN `event` ON (event.id= author_event.event_id) where event.date between '2020-01-01' and '2020-12-31' Limit 50
```

**E.** Get the average number of books written by authors.

**Answer:**
```mysql
# select author.first_name, count(*) from `author` inner join `book` on (author.id = book.author_id) group by author.id order by count(*) DESC

```

**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
# select author.first_name as `authorName`, event.date `lastEventDate` from `author` INNER join `author_event` on (author.id= author_event.author_id) LEFT JOIN `event` ON (event.id= author_event.event_id) GROUP BY author.first_name order by event.date DESC
```

## 2. Database Structure

**A.** Based on the SQL diagram above, what can be done to improve the performance of this query ?

```mysql
SELECT id, name FROM book WHERE YEAR(published_date) >= '1973';
```

**Answer:** ?


**B.** Give 3 common good practice on a database structure to optimize queries.

**Answer:** 
 - avoir une colonne avec l’année comme ça pas besoin d’utiliser YEAR(...)
 - mettre un index sur la colonne  publised_date
 
