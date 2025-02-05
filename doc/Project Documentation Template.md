# 1. Project Overview

Provide a brief description of the project. What is the system or application being built? What are its objectives?

Example: This project implements a fully integrated e-commerce platform, where customers can browse products, place orders, and manage their accounts.

## Technologies Used:

Provide a list of the tools and technologies used for the database and web application.  
E.g., MySQL for Database, Node.js for Backend, HTML/CSS/JavaScript for Frontend

  

# 2. Database Design and Implementation

## 2.1 Entity-Relationship Diagram (ERD)

Include the ERD image or diagram here. This diagram should show all the tables, their relationships, and cardinalities.

## 2.2 Tables and Relationships

Provide details for each table, including its columns, data types, and relationships with other tables.

### 2.2.1 Customers Table

```
CREATE TABLE Customers (
    customer_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(50),
    zip_code VARCHAR(10)
);
```

- Primary Key: customer_id
- Foreign Keys: None
- Relationships: Each customer can have multiple orders.
    
### 2.2.2 Orders Table

```
CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    order_date DATETIME NOT NULL,
    shipping_address VARCHAR(255),
    total_amount DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES Customers(customer_id)
);
```

- Primary Key: order_id
- Foreign Key: customer_id (References Customers)
- Relationships: Each order is linked to a single customer.
    
### 2.2.3 Products Table

```
CREATE TABLE Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT,
    stock_quantity INT DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);
```

- Primary Key: product_id
- Foreign Key: category_id (References Categories)
- Relationships: Each product belongs to a category.
    

2.2.4 Categories Table

```
CREATE TABLE Categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(100) UNIQUE NOT NULL
);
```

- Primary Key: category_id
- Foreign Keys: None
- Relationships: Categories classify products.

2.2.5 OrderItems Table

```
CREATE TABLE OrderItems (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);
```

- Primary Key: order_item_id
- Foreign Keys:
- order_id (References Orders)
- product_id (References Products)
- Relationships: Links orders to products through OrderItems.


# 3.  SQL Queries

## 3.1 Basic Queries 

## 3.2. Join Queries

Example query to retrieve all products in an order, along with the customer’s name:

```
SELECT o.order_id, c.first_name, c.last_name, p.name, oi.quantity
FROM Orders o
	JOIN OrderItems oi ON o.order_id = oi.order_id
	JOIN Products p ON oi.product_id = p.product_id
	JOIN Customers c ON o.customer_id = c.customer_id
WHERE o.order_id = 123;
```

## 3.2 Aggregation Queries

Example query to calculate total sales for each product:

```
SELECT p.name, SUM(oi.quantity * oi.price) AS total_sales
FROM OrderItems oi
	JOIN Products p ON oi.product_id = p.product_id
GROUP BY p.product_id;
```

---


# 4. Collaboration and Teamwork

## 4.1 Communication and Coordination

Describe how the database and web development teams coordinated their efforts, including regular meetings, shared tasks, and version control practices.

Example: The team used GitHub for version control and held weekly meetings to ensure the frontend and backend were aligned.

  ---

# 5. Conclusion

## 5.1 Project Summary

Summarize the overall project, highlighting the key achievements, challenges, and lessons learned during development.

## 5.2 Future Enhancements

Provide any recommendations or plans for future improvements or features to add to the application.