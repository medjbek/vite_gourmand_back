# Table users
CREATE TABLE users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  city varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('user','employee','admin') NOT NULL DEFAULT 'user',
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

# Table themes
CREATE TABLE themes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

# Table diets
CREATE TABLE diets (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

# Table dishes
CREATE TABLE dishes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT NULL,
  type ENUM('starter','main','dessert') NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

# Table allergens
CREATE TABLE allergens (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL UNIQUE,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL
);

# Table menus
CREATE TABLE menus (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  theme_id BIGINT UNSIGNED NOT NULL,
  minimum_people TINYINT UNSIGNED NOT NULL,
  base_price DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0,
  conditions TEXT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT fk_menus_theme
  FOREIGN KEY (theme_id) REFERENCES themes(id)
);

# Table menu_images
CREATE TABLE menu_images (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  menu_id BIGINT UNSIGNED NOT NULL,
  path VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  CONSTRAINT fk_menu_images_menu
  FOREIGN KEY (menu_id) REFERENCES menus(id)
  ON DELETE CASCADE
);

# Table menu_dish
CREATE TABLE menu_dish (
  menu_id BIGINT UNSIGNED NOT NULL,
  dish_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (menu_id, dish_id),
  CONSTRAINT fk_menu_dish_menu
  FOREIGN KEY (menu_id) REFERENCES menus(id)
  ON DELETE CASCADE,
  CONSTRAINT fk_menu_dish_dish
  FOREIGN KEY (dish_id) REFERENCES dishes(id)
  ON DELETE CASCADE
);

# Table dish_allergen
CREATE TABLE dish_allergen (
  dish_id BIGINT UNSIGNED NOT NULL,
  allergen_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (dish_id, allergen_id),
  CONSTRAINT fk_dish_allergen_dish
  FOREIGN KEY (dish_id) REFERENCES dishes(id)
  ON DELETE CASCADE,
  CONSTRAINT fk_dish_allergen_allergen
  FOREIGN KEY (allergen_id) REFERENCES allergens(id)
  ON DELETE CASCADE
);

# Table orders
CREATE TABLE orders (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NOT NULL,
  menu_id BIGINT UNSIGNED NOT NULL,

  customer_last_name VARCHAR(255) NOT NULL,
  customer_first_name VARCHAR(255) NOT NULL,
  customer_email VARCHAR(255) NOT NULL,
  customer_phone VARCHAR(20) NOT NULL,

  address VARCHAR(255) NOT NULL,
  city VARCHAR(255) NOT NULL,

  event_at DATETIME NOT NULL,

  location VARCHAR(255) NOT NULL,

  guest_count INT UNSIGNED NOT NULL,

  status ENUM(
    'pending',
    'accepted',
    'preparing',
    'delivering',
    'delivered',
    'waiting_return',
    'completed',
    'cancelled'
  ) NOT NULL DEFAULT 'pending',

  menu_price DECIMAL(8,2) NOT NULL,
  delivery_price DECIMAL(8,2) NOT NULL,
  discount DECIMAL(8,2) NOT NULL DEFAULT 0.00,
  total_price DECIMAL(8,2) NOT NULL,

  cancellation_reason TEXT DEFAULT NULL,
  cancellation_contact_method ENUM('phone','email') DEFAULT NULL,

  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,

  CONSTRAINT orders_user_fk
  FOREIGN KEY (user_id) REFERENCES users(id),
  CONSTRAINT orders_menu_fk
  FOREIGN KEY (menu_id) REFERENCES menus(id)
);

# Table order_status_histories
CREATE TABLE order_status_histories (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id BIGINT UNSIGNED NOT NULL,
  status VARCHAR(255) NOT NULL,
  changed_by BIGINT UNSIGNED NOT NULL,

  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,

  CONSTRAINT order_status_histories_order_fk
  FOREIGN KEY (order_id) REFERENCES orders(id),
  CONSTRAINT order_status_histories_user_fk
  FOREIGN KEY (changed_by) REFERENCES users(id)
);

# Table reviews
CREATE TABLE reviews (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id BIGINT UNSIGNED NOT NULL,
  user_id BIGINT UNSIGNED NOT NULL,

  rating TINYINT UNSIGNED NOT NULL,
  comment TEXT DEFAULT NULL,
  is_approved TINYINT(1) NOT NULL DEFAULT 0,

  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,

  CONSTRAINT reviews_order_fk
  FOREIGN KEY (order_id) REFERENCES orders(id),
  CONSTRAINT reviews_user_fk
  FOREIGN KEY (user_id) REFERENCES users(id)
);

# Table menu_diets
CREATE TABLE menu_diet (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  menu_id BIGINT UNSIGNED NOT NULL,
  diet_id BIGINT UNSIGNED NOT NULL,
  UNIQUE KEY menu_diet_unique (menu_id, diet_id),
  CONSTRAINT menu_diet_menu_id_foreign FOREIGN KEY (menu_id) REFERENCES menus(id) ON DELETE CASCADE,
  CONSTRAINT menu_diet_diet_id_foreign FOREIGN KEY (diet_id) REFERENCES diets(id) ON DELETE CASCADE
);

# Table opening_hours
CREATE TABLE opening_hours (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  day ENUM(
    'Lundi','Mardi','Mercredi',
    'Jeudi','Vendredi','Samedi','Dimanche'
  ) NOT NULL,
  opens_at TIME NOT NULL,
  closes_at TIME NOT NULL,
  is_closed TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  UNIQUE KEY unique_day (day)
);

# Insertion de données

INSERT INTO users (
    id,
    first_name,
    last_name,
    email,
    phone,
    address,
    city,
    password,
    role,
    created_at,
    updated_at
) VALUES
(
    1,
    'Jean',
    'Dupont',
    'jean.dupont@test.com',
    '0612345678',
    '12 rue des Lilas',
    'Bordeaux',
    '$2y$12$hgRFn1M18SBDvTBdZRt/gOb.2lgxXK8E09U.UjE/9hR6kEn/m0u7W',
    'user',
    NOW(),
    NOW()
),
(
    2,
    'Marie',
    'Martin',
    'marie.martin@test.com',
    '0623456789',
    '8 avenue Victor Hugo',
    'Bordeaux',
    '$2y$12$ePpret183FaVLHg2lHs9Huk2eUqm0Fse30bpRKBd.QaNQNaaUpT0u',
    'user',
    NOW(),
    NOW()
),
(
    3,
    'Admin',
    'Principal',
    'admin@test.com',
    '0600000000',
    '1 place de la République',
    'Bordeaux',
    '$2y$12$aRBL2FY53Bl.mKW6Kn65Eu/LIUptlXqZ9dMtX54LG3/4iDfaeZGSu',
    'admin',
    NOW(),
    NOW()
),
(
    4,
    'Paul',
    'Employé',
    'employee@test.com',
    '0699999999',
    '25 rue Sainte-Catherine',
    'Bordeaux',
    '$2y$12$NQyXNiRYLB9RXjOU9Z.EueV15D227LjD3ivHgvAvnIHRHisoXxHza',
    'employee',
    NOW(),
    NOW()
);

INSERT INTO allergens (name, created_at, updated_at) VALUES
('Gluten', NOW(), NOW()),
('Lactose', NOW(), NOW()),
('Arachides', NOW(), NOW()),
('Fruits de mer', NOW(), NOW()),
('Œufs', NOW(), NOW());

INSERT INTO diets (name, created_at, updated_at) VALUES
('Végétarien', NOW(), NOW()),
('Vegan', NOW(), NOW()),
('Sans gluten', NOW(), NOW()),
('Halal', NOW(), NOW()),
('Sans lactose', NOW(), NOW());

INSERT INTO dishes (name, description, type, is_active, created_at, updated_at) VALUES
('Soupe à l’oignon', 'Soupe traditionnelle française', 'starter', 1, NOW(), NOW()),
('Salade césar', 'Salade fraîche au poulet', 'starter', 1, NOW(), NOW()),
('Bœuf bourguignon', 'Plat mijoté au vin rouge', 'main', 1, NOW(), NOW()),
('Lasagnes maison', 'Lasagnes à la bolognaise', 'main', 1, NOW(), NOW()),
('Curry de légumes', 'Plat végétarien épicé', 'main', 1, NOW(), NOW()),
('Tarte aux pommes', 'Dessert classique', 'dessert', 1, NOW(), NOW()),
('Mousse au chocolat', 'Dessert gourmand', 'dessert', 1, NOW(), NOW());

INSERT INTO dish_allergen (dish_id, allergen_id) VALUES
(1, 1),
(3, 1),
(6, 2),
(7, 2);

INSERT INTO themes (name, created_at, updated_at) VALUES
('Cuisine française', NOW(), NOW()),
('Cuisine italienne', NOW(), NOW()),
('Cuisine asiatique', NOW(), NOW()),
('Cuisine végétarienne', NOW(), NOW()),
('Cuisine festive', NOW(), NOW());

INSERT INTO menus (title, description, theme_id, minimum_people, base_price, stock, conditions, created_at, updated_at) VALUES
(
    'Menu Tradition',
    'Un menu typiquement français',
    1,
    10,
    25.00,
    50,
    'Réservation 48h à l’avance',
    NOW(),
    NOW()
),
(
    'Menu Végétarien',
    'Menu sans viande, équilibré et savoureux',
    4,
    8,
    22.00,
    40,
    NULL,
    NOW(),
    NOW()
),
(
    'Menu Italien',
    'Saveurs italiennes authentiques',
    2,
    12,
    27.00,
    30,
    NULL,
    NOW(),
    NOW()
),
(
    'Menu Asiatique',
    'Cuisine asiatique variée et parfumée',
    3,
    15,
    29.00,
    25,
    'Plats légèrement épicés',
    NOW(),
    NOW()
),
(
    'Menu Vegan',
    'Menu 100% végétal',
    4,
    10,
    24.00,
    35,
    NULL,
    NOW(),
    NOW()
),
(
    'Menu Festif',
    'Menu idéal pour événements et réceptions',
    5,
    20,
    35.00,
    15,
    'Minimum 20 personnes',
    NOW(),
    NOW()
);

INSERT INTO menu_diet (menu_id, diet_id) VALUES
(2, 1),
(3, 4),
(4, 4),
(5, 2),
(5, 3),
(5, 5);

INSERT INTO menu_dish (menu_id, dish_id) VALUES
(1, 1),
(1, 3),
(1, 6),
(2, 2),
(2, 5),
(2, 7),
(3, 2),
(3, 4),
(3, 6),
(4, 1),
(4, 5),
(4, 7),
(5, 5),
(5, 7),
(6, 1),
(6, 3),
(6, 4),
(6, 6),
(6, 7);

INSERT INTO menu_images (menu_id, path, created_at, updated_at) VALUES
(1, 'menus/menu1_image1.jpg', NOW(), NOW()),
(1, 'menus/menu1_image2.jpg', NOW(), NOW()),
(2, 'menus/menu2_image1.jpg', NOW(), NOW()),
(2, 'menus/menu2_image2.jpg', NOW(), NOW()),
(3, 'menus/menu3_image1.jpg', NOW(), NOW()),
(3, 'menus/menu3_image2.jpg', NOW(), NOW()),
(4, 'menus/menu4_image1.jpg', NOW(), NOW()),
(4, 'menus/menu4_image2.jpg', NOW(), NOW()),
(5, 'menus/menu5_image1.jpg', NOW(), NOW()),
(5, 'menus/menu5_image2.jpg', NOW(), NOW());

INSERT INTO orders
(
    user_id, menu_id,
    customer_last_name, customer_first_name,
    customer_email, customer_phone,
    address, city, event_at, location,
    guest_count, status,
    menu_price, delivery_price, discount, total_price,
    created_at, updated_at
)
VALUES
(
    1, 1,
    'Dupont', 'Jean',
    'jean.dupont@test.fr', '0600000000',
    '10 rue de Paris', 'Toulouse',
    NOW(),
    'Salle des fêtes',
    20, 'accepted',
    25.00, 50.00, 0.00, 550.00,
    NOW(), NOW()
),
(
    1, 2,
    'Martin', 'Claire',
    'claire.martin@test.fr', '0611111111',
    '5 avenue du Midi', 'Toulouse',
    NOW(),
    'Domicile',
    10, 'preparing',
    22.00, 30.00, 10.00, 240.00,
    NOW(), NOW()
),
(
    2, 3,
    'Durand', 'Paul',
    'paul.durand@test.fr', '0622222222',
    '18 rue Alsace', 'Blagnac',
    NOW(),
    'Entreprise',
    15, 'delivered',
    27.00, 40.00, 0.00, 445.00,
    NOW(), NOW()
),
(
    2, 6,
    'Bernard', 'Sophie',
    'sophie.bernard@test.fr', '0633333333',
    '3 place du Capitole', 'Toulouse',
    NOW(),
    'Salle privée',
    30, 'completed',
    35.00, 80.00, 20.00, 1110.00,
    NOW(), NOW()
);

INSERT INTO order_status_histories (order_id, status, changed_by, created_at, updated_at) VALUES
(1, 'pending', 1, NOW(), NOW()),
(1, 'accepted', 2, NOW(), NOW()),
(2, 'pending', 1, NOW(), NOW()),
(2, 'preparing', 2, NOW(), NOW()),
(3, 'pending', 1, NOW(), NOW()),
(3, 'delivered', 2, NOW(), NOW()),
(4, 'pending', 1, NOW(), NOW()),
(4, 'completed', 2, NOW(), NOW());

INSERT INTO reviews (order_id, user_id, rating, comment, is_approved, created_at, updated_at) VALUES
(3, 1, 5, 'Repas excellent, service rapide et de qualité.', 1, NOW(), NOW()),
(4, 1, 4, 'Très bon menu festif, quelques petits retards sur la livraison.', 1, NOW(), NOW()),
(4, 2, 3, 'Menu correct mais service à améliorer.', 0, NOW(), NOW());
