/* ============================== */
/* ======  CATALOG SPACE  ====== */
/* ============================== */

/* ----- Departments ----- */
CREATE TABLE departments ( 
    department_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL
);

INSERT INTO departments (name) VALUES
('PC'),
('Apple'),
('Other'),
('Deals'),
('Services');

/* ----- Categories (belong to departments) ----- */
CREATE TABLE categories (
	category_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) NOT NULL,
	department_id INT,
	FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- Insert categories using correct department IDs:
-- PC = 1, Apple = 2, Other = 3
INSERT INTO categories (name, department_id) VALUES
-- PC
('Desktops', 1),       -- category_id = 1
('Laptops', 1),        -- category_id = 2
('Accessories', 1),    -- category_id = 3
-- Apple
('MacBooks', 2),       -- category_id = 4
('iPads', 2),          -- category_id = 5
('Accessories', 2),    -- category_id = 6
-- Other
('Gaming', 3),         -- category_id = 7
('Storage', 3),        -- category_id = 8
('Networking', 3);     -- category_id = 9

/* ----- Products (belong to categories) ----- */
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    long_description TEXT,
    price DECIMAL(10, 2) NOT NULL,
	discount_percent DECIMAL(5,2) DEFAULT 0,
    image VARCHAR(255),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE inventory (
    product_id INT PRIMARY KEY,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);


-- Sample products with technical long_descriptions
INSERT INTO products (name, description, long_description, price, image, category_id, discount_percent) VALUES
('Gaming Laptop 17-inch',
 'RTX 4070, 1 TB SSD, 16 GB RAM',
 'This high-performance gaming laptop features an NVIDIA RTX 4070 GPU, Intel i7 13th Gen processor, 1 TB NVMe SSD, and 16 GB DDR5 RAM. Comes with a 17.3-inch FHD 144Hz display, RGB backlit keyboard, and dual-fan cooling system.',
 1499.99, 'gaming-laptop.jpg', 2, 10.00),

('Beast Tower X',
 'Ryzen 9, RTX 4090, liquid cooled desktop',
 'Desktop powerhouse built with AMD Ryzen 9 7950X, NVIDIA RTX 4090, 64 GB DDR5 RAM, and 2 TB Gen 4 NVMe SSD. Includes custom liquid cooling and a tempered glass case with RGB lighting.',
 2799.00, 'desktop-tower.jpg', 1, 12.50),

('PlayStation 5 Console',
 'Latest Slim edition, 1 TB SSD',
 'Sony PS5 Slim with 1 TB SSD, DualSense controller, ray tracing support, haptic feedback, 3D audio, and backward compatibility with PS4 games. Supports 4K gaming.',
 499.99, 'ps5.jpg', 7, 5.00),

('Custom RGB Gaming PC',
 'i9, RTX 4080, 2 TB SSD, liquid cooling',
 'Built-to-order PC with Intel Core i9-13900K, RTX 4080 16GB GPU, 32 GB DDR5, 2 TB Gen 4 SSD, and a 1000W PSU. Housed in a mid-tower case with RGB front fans and AIO liquid cooler.',
 2499.00, 'rgb-desktop.jpg', 1, 0.00),

('Budget Home Laptop',
 '15.6-inch, Intel i3, 256 GB SSD, 8 GB RAM',
 'Affordable 15.6-inch laptop with Intel Core i3 processor, 256 GB SSD, and 8 GB RAM. Ideal for students and home use. Comes with Windows 11 Home and a full-size keyboard with numpad.',
 449.00, 'budget-laptop.jpg', 2, 15.00),

('MacBook Pro M3',
 '16-inch, 12-core CPU, 512 GB SSD',
 'Apple MacBook Pro with M3 Pro chip, 12-core CPU, 18-core GPU, 16 GB unified memory, 512 GB SSD. Features 16.2-inch Liquid Retina XDR display, 1080p webcam, and 3 Thunderbolt 4 ports.',
 2399.00, 'mbp-m3.jpg', 4, 8.00),

('iPad Pro 11-inch',
 'M2 chip, 256 GB, Wi-Fi + Cellular',
 'Apple iPad Pro 11-inch (4th Gen) with M2 chip, 256 GB storage, Wi-Fi + Cellular (5G), Liquid Retina display with ProMotion, Face ID, and Pencil 2 support.',
 999.00, 'ipad-pro.jpg', 5, 0.00),

('Wireless Gaming Mouse',
 'RGB, 16000 DPI, rechargeable',
 'Ergonomic gaming mouse with 16000 DPI optical sensor, adjustable RGB zones, 6 programmable buttons, and rechargeable battery (70 hours). Supports Windows, macOS, and Linux.',
 79.99, 'gaming-mouse.jpg', 3, 20.00),

('External SSD 1TB',
 'USB-C, rugged build, 1050 MB/s read',
 'Portable external SSD with 1 TB capacity, USB 3.2 Gen 2 (USB-C), read speeds up to 1050 MB/s. Shock-resistant rubber casing and included USB-C to A adapter.',
 129.99, 'external-ssd.jpg', 8, 0.00),

('AX5400 Wi-Fi 6 Router',
 'Tri-band, mesh-ready, mobile app control',
 'Next-gen Wi-Fi 6 AX5400 router with tri-band support, OFDMA, MU-MIMO, and 5GHz prioritization. Easy setup via app, supports mesh networking and smart home integrations.',
 199.00, 'wifi6-router.jpg', 9, 0.00),

('Clearance Ultrabook',
 'Older gen, 256 GB SSD, slim profile',
 'Last-gen ultrabook featuring Intel i5-10th Gen, 256 GB SSD, 8 GB RAM, and a 14-inch FHD screen. Slim design, HDMI output, and lightweight build. Limited stock.',
 399.00, 'clearance-laptop.jpg', 2, 25.00);


-- Sample inventories
INSERT INTO inventory (product_id, quantity) VALUES
(1, 15),
(2, 5),
(3, 8),
(4, 25),
(5, 2),
(6, 12),
(7, 9),
(8, 7),
(9, 15),
(10, 40),
(11, 20),
(12, 5),
(13, 13);


/* ============================== */
/* ========  USER SPACE  ======= */
/* ============================== */

/* ----- Users ----- */
CREATE TABLE user_account (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
	last_name VARCHAR(100),
	address_line1 VARCHAR(255),
	address_line2 VARCHAR(255),
	city VARCHAR(100),
	state VARCHAR(100),
	zip VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255), -- hashed
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

/* ----- Cart (one row per product in cart) ----- */
CREATE TABLE cart (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    session_id VARCHAR(255), -- for guests
    product_id INT NOT NULL,
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
