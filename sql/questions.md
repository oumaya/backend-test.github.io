# SQL

![](images/sql-diagram.png)

## 1. Query

Based on the SQL diagram above, write the following queries:

**A.** Get authors with a last name beginning with "M" or who are born after 1950.

**Answer:**
```mysql
# select * from author where name like "M%" and YEAR (birth_date)>=1950
```

**B.** Count the number of books per category (empty categories too).

**Answer:**
```mysql
# B) select count(book.id) from left join category on (book.category_id = category.id) group by book.category_id
```

**C.** Find authors who wrote at least 2 books.

**Answer:**
```mysql
# select author.first_name from author inner join (select author_id from book groupe by author_id having count(author_id)>=2) book on book.author_id=author.id
```

**D.** Get 50 authors with at least one event between the start and the end of this year.

**Answer:**
```mysql
# select author.id left join event on (author.id= event.author_id) where event.date between '2020-01-01' and '2020-12-31' Limit 50
```

**E.** Get the average number of books written by authors.

**Answer:**
```mysql
# select id, count(*) from author inner join book on (author.id = book.author_id) groupe by author.id order by count(*) desc
```

**F.** Get authors, sorted by the date of their **latest** event.

**Answer:**
```mysql
# select author.id, event.date left join event on (author.id= event.author_id) order by event.date desc
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
 
