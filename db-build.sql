/* ============================== */
/* ======  CATALOG SPACE  ====== */
/* ============================== */

/* ----- Departments ----- */
CREATE TABLE departments ( 
    department_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL
);

INSERT INTO departments (name) VALUES
('Deals'),
('PC'),
('Apple'),
('Other'),
('Services');

/* ----- Categories (belong to departments) ----- */
CREATE TABLE categories (
	category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	department_id INT,
	FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- Insert categories using department IDs (assumes IDs are 1–5 in same order)
INSERT INTO categories (name, department_id) VALUES
-- Deals
('Bundles', 1), ('Clearance', 1), ('Seasonal', 1),
-- PC
('Desktops', 2), ('Laptops', 2), ('Accessories', 2),
-- Apple
('MacBooks', 3), ('iPads', 3), ('Accessories', 3),
-- Other
('Gaming', 4), ('Storage', 4), ('Networking', 4);

/* ----- Products (belong to categories) ----- */
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
	discount_percent DECIMAL(5,2) DEFAULT 0,
    image VARCHAR(255),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

-- Sample products
INSERT INTO products (name, description, price, image, category_id, discount_percent) VALUES
('Gaming Laptop 17”', 'RTX 4070, 1 TB SSD, 16 GB RAM', 1499.99, 'gaming-laptop.jpg', 5, 10.00),
('Ultra-Slim 14” Ultrabook', 'OLED display, 512 GB SSD, 16 GB RAM', 999.99, 'ultrabook.jpg', 5, 0.00),
('Beast Tower X', 'Ryzen 9, RTX 4090, liquid cooled desktop', 2799.00, 'desktop-tower.jpg', 4, 12.50),
('MacBook Air M3', '13-inch, 8-core GPU, 256 GB SSD', 1199.00, 'mba-m3.jpg', 7, 0.00),
('PlayStation 5 Console', 'Latest Slim edition, 1 TB SSD', 499.99, 'ps5.jpg', 10, 5.00),
('Custom RGB Gaming PC', 'i9, RTX 4080, 2 TB SSD, liquid cooling', 2499.00, 'rgb-desktop.jpg', 4, 0.00),
('Budget Home Laptop', '15.6”, Intel i3, 256 GB SSD, 8 GB RAM', 449.00, 'budget-laptop.jpg', 5, 15.00),
('MacBook Pro M3', '16”, 12-core CPU, 512 GB SSD', 2399.00, 'mbp-m3.jpg', 7, 8.00),
('iPad Pro 11”', 'M2 chip, 256 GB, Wi-Fi + Cellular', 999.00, 'ipad-pro.jpg', 8, 0.00),
('Wireless Gaming Mouse', 'RGB, 16000 DPI, rechargeable', 79.99, 'gaming-mouse.jpg', 6, 20.00),
('External SSD 1TB', 'USB-C, rugged build, 1050 MB/s read', 129.99, 'external-ssd.jpg', 11, 0.00),
('AX5400 Wi-Fi 6 Router', 'Tri-band, mesh-ready, mobile app control', 199.00, 'wifi6-router.jpg', 12, 0.00),
('Clearance Ultrabook', 'Older gen, 256 GB SSD, slim profile', 399.00, 'clearance-laptop.jpg', 2, 25.00);




/* ============================== */
/* ========  USER SPACE  ======= */
/* ============================== */

/* ----- Users ----- */
CREATE TABLE user_account (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255), -- hashed
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

/* ----- Cart (one row per product in cart) ----- */
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    quantity INT DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES user_account(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

/* ----- Orders ----- */
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2),
    shipping_address TEXT,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES user_account(user_id)
);

/* ----- Order Items ----- */
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
