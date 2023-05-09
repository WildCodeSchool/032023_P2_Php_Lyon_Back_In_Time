USE projet_2;

SELECT * FROM article;
TRUNCATE TABLE article;
DROP TABLE article;

SELECT * FROM admin;
TRUNCATE TABLE admin;
DROP TABLE admin;

-- ADMIN

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);

INSERT INTO `admin` (`username`, `type`, `password`) VALUES
('Admin2023', 'admin', '$2y$10$xQMlJsK6av7/J5KXFxp6KOb6lPxrbAhARIWmJQ8tCW2XWExF4rbJe');

CREATE TABLE writer (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    presentation VARCHAR (255) NOT NULL 
);

INSERT INTO writer (firstname, presentation)
VALUES
('Laetitia','C\'est moi Laetitia'),
('Baptiste','C\'est moi Baptiste'),
('Ben','C\'est moi Ben')
;

/* update following changes form articles*/ 


CREATE TABLE article (
id INT PRIMARY KEY AUTO_INCREMENT,
title VARCHAR(255) NOT NULL,
extract VARCHAR(100) NOT NULL,
content TEXT NOT NULL,
photo VARCHAR(255) NOT NULL,

category_id INT NOT NULL,
CONSTRAINT fk_category
FOREIGN KEY (category_id)
REFERENCES category(id),

writer_id INT NOT NULL,
CONSTRAINT fk_writer
FOREIGN KEY (writer_id)
REFERENCES writer(id),
date DATE NOT NULL
);


INSERT INTO ARTICLE (title, extract, content, photo, category_id, writer_id, date) 
VALUES
('Perdu en foret','luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/28/4928/3264', '1','1', '2023-04-18'),
('Un peu d\'escalade', 'luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/29/4000/2670', '1','2', '2023-04-16'),
('C\'est calme', 'luctus massa sit amet euismod','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/135/2560/1920', '2','2', '2023-04-15'),
('Venez elle est bonne', 'luctus massa sit amet euismod ','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/179/2048/1365', '3','3', '2023-05-13'),
('De nouveaux amis','luctus massa sit amet euismod luctus massa sit amet euismod', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'https://picsum.photos/id/28/4928/3264', '1','1', '2023-04-18')
;

SELECT * FROM article
WHERE date <= CURDATE()
ORDER BY date DESC
LIMIT 3;


CREATE TABLE picture (
id INT PRIMARY KEY AUTO_INCREMENT,
url VARCHAR(255) NOT NULL,
article_id INT NOT NULL
);

INSERT INTO picture (url, article_id)
VALUES
('https://picsum.photos/id/28/4928/3264', 12),
('https://picsum.photos/id/29/4000/2670', 12),
('https://picsum.photos/id/135/2560/1920', 12),
('https://picsum.photos/id/179/2048/1365', 3)
;

SELECT  a.title, p.url
FROM picture as p
	INNER JOIN article as a on p.article_id=a.id;


CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    url VARCHAR (255) NOT NULL 
);

INSERT INTO category (name , url)
VALUES
('Jurassique','/assets/images/jurassique.jpg'),
('Egypte Antique','/assets/images/egypte-antique.jpg'),
('Renaissance','/assets/images/renaissance.jpg')
;