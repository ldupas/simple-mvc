DROP DATABASE IF EXISTS mydrinks;

CREATE DATABASE mydrinks;

CREATE TABLE mydrinks.category (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
);

CREATE TABLE mydrinks.drink (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    alcohol_level FLOAT NOT NULL,
    description TEXT NOT NULL,
    picture VARCHAR(255) NOT NULL,
    category_id INT NOT NULL
);

INSERT INTO mydrinks.category (id, name, description, image) VALUES
    (1, "Beers", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/200"),
    (2, "Wines", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/200"),
    (3, "Softs", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/200"),
    (4, "Spirits", "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/200")
;

INSERT INTO mydrinks.drink (name, alcohol_level, description, picture, category_id) VALUES
    ("Beer1", 5.5, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 1),
    ("Beer2", 3.2, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 1),
    ("Beer3", 1.6, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 1),
    ("Beer4", 8.1, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 1),
    ("Wine1", 12.2, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 2),
    ("Wine2", 11, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 2),
    ("Wine3", 15.1, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 2),
    ("Wine4", 18.1, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 2),
    ("Coca Cola", 0, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 3),
    ("Orangina", 0, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 3),
    ("Sprite", 0, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 3),
    ("Vodka", 48, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 4),
    ("Gin", 44, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 4),
    ("Tequila", 49.9, "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "https://picsum.photos/200/300", 4)
;

