create table `categories` (
    `id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL DEFAULT ''
);

INSERT INTO `categories` (`name`) VALUES
    ('TV'),
    ('Laptops'),
    ('Tablets'),
    ('Smartphones');

create table products (
     `id` INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
     `name` VARCHAR(255) NOT NULL DEFAULT '',
     `price` INT UNSIGNED NOT NULL DEFAULT 0,
     `created_at` DATETIME,
     `category_id` INT UNSIGNED NOT NULL DEFAULT 0,
     FOREIGN KEY(`category_id`) REFERENCES `categories`(`id`)
);

INSERT INTO `products` (`category_id`,`name`, `price`, `created_at`) VALUES
    (1,'Product 1', 100, '2024-09-01 12:00:00'),
    (2,'Product 2', 200, '2024-09-02 12:00:00'),
    (3,'Product 3', 300, '2024-09-03 12:00:00'),
    (4,'Product 4', 400, '2024-09-04 12:00:00'),
    (1,'Product 5', 500, '2024-09-05 12:00:00'),
    (2,'Product 6', 600, '2024-09-06 12:00:00'),
    (3,'Product 7', 700, '2024-09-07 12:00:00'),
    (4,'Product 8', 800, '2024-09-08 12:00:00'),
    (1,'Product 9', 900, '2024-09-09 12:00:00'),
    (2,'Product 10', 1000, '2024-09-10 12:00:00');
