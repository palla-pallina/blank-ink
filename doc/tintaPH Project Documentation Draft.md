`lilipat pa to sa docs`

---

# 1. Project Overview

This project is a social media platform that allows users to view and share artwork, showcase their portfolios, stay updated on upcoming events, and buy or sell artwork through a bidding system.

## Technologies Used:
MySQL, PHP, HTML/CSS/JavaScript

# 2. Database Design and Implementation

## 2.1 Entity-Relationship Diagram (ERD)

...

## 2.2 Tables and Relationships


### 2.2.1 User Table

```
CREATE TABLE User (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(50) UNIQUE NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phone VARCHAR(15) UNIQUE NOT NULL,
    created_at DATETIME NOT NULL
);
```

- Primary Key: user_id
- Foreign Keys: None
- Relationships: Each user can upload multiple varieties of content (artwork, event, job match and commission list).

### 2.2.2 Artwork Category Table

```
CREATE TABLE Artwork_Category (
    art_categ_id INT PRIMARY KEY AUTO_INCREMENT,
    art_categ_name VARCHAR(100) UNIQUE NOT NULL
);
```

- Primary Key: art_categ_id
- Foreign Keys: None
- Relationships: Categories classify artworks.

### 2.2.2 Artwork Table

```
CREATE TABLE Artwork (
    art_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    art_categ_id INT,
    art_name VARCHAR(100) NOT NULL,
    art_desc TEXT,
	date_posted DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);
```

- Primary Key: artwork_id
- Foreign Key: user_id (References User), art_categ_id (References Artwork_Category)
- Relationships: Each artwork is linked to a single user and each artwork belongs to a category.

### 2.2.3 Event Table

```
CREATE TABLE Event (
    event_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    event_categ_id INT,
    event_name VARCHAR(100) NOT NULL,
    event_desc TEXT NOT NULL,
    event_date VARCHAR(50) NOT NULL,
    event_time VARCHAR(50) NOT NULL,
	date_posted DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (event_categ_id) REFERENCES Event_Category(event_categ_id)
);
```

- Primary Key: event_id
- Foreign Keys: user_id (References User), event_categ_id (References Event_Category)
- Relationships: Each event is linked to a single user and each event belongs to a category.

### 2.2.5 Event Category Table

```
CREATE TABLE Event_Category (
    event_categ_id INT PRIMARY KEY AUTO_INCREMENT,
    event_categ_name VARCHAR(100) UNIQUE NOT NULL
);
```

- Primary Key: event_categ_id
- Foreign Keys: None
- Relationships: Categories classify events.

### 2.2.6 Job Matching Table

```
CREATE TABLE Job_Matching (
	jobmatch_id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT,
	jobmatch_type_id INT,
	jobmatch_header VARCHAR(50),
	jobmatch_desc TEXT,
	date_posted DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (jobmatch_type_id) REFERENCES Job_Matching_Type(jobmatch_type_id)
);
```

- Primary Key: jobmatch_id
- Foreign Keys: user_id (References User), jobmatch_type_id (References Job_Matching_Type)
- Relationships: Each post is linked to a single user and each post belongs to a type.

### 2.2.7 Job Matching Type Table
```
CREATE TABLE Job_Matching_Type (
    jobmatch_type_id INT PRIMARY KEY AUTO_INCREMENT,
    jobmatch_type_name VARCHAR(100) UNIQUE NOT NULL
);
```

- Primary Key: jobmatch_type_id
- Foreign Keys: None
- Relationships: Job match type categorizes the job matching post.

### 2.2.8 Commission Listing Table

```
CREATE TABLE Commission_Listing (
	comm_list_id INT PRIMARY KEY AUTO_INCREMENT,
	artist_id INT(10) UNIQUE NOT NULL,
	user_id INT,
	comm_name VARCHAR(100),
	comm_desc TEXT,
	comm_list_price DECIMAL(10,2) NOT NULL,
	date_posted DATETIME NOT NULL,
	status VARCHAR(5),
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);
```

- Primary Key: comm_list_id
- Foreign Keys: user_id (References User)
- Relationships: Each commission listing is linked to a single user.

### 2.2.9 Commission Client Table

```
CREATE TABLE Commission_Client (
	client_id INT PRIMARY KEY AUTO_INCREMENT,
	comm_list_id INT(10) UNIQUE NOT NULL,
	user_id INT,
	contact_no VARCHAR(15) UNIQUE NOT NULL,
	email VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);
```

- Primary Key: client_id
- Foreign Keys: user_id (References User)
- Relationships: Each commission client is linked to a single user.

### 2.2.10 Commission Order Table

```
CREATE TABLE Commission_Client (
	comm_order_id INT PRIMARY KEY AUTO_INCREMENT,
	client_id INT,
	comm_list_id INT,
	total_price DECIMAL(10,2) NOT NULL,
	date_ordered DATETIME NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Commission_Client(client_id),
    FOREIGN KEY (comm_list_id) REFERENCES Commission_Listing(comm_list_id)
);
```

- Primary Key: comm_order_id
- Foreign Keys: client_id (references Commission_Client), comm_list_id INT (references)
- Relationships: Each commission order has a client and is linked to a commission listing.

---

# 3.  SQL Queries

## 3.1 Basic Queries 

...

## 3.2. Join Queries

...

## 3.2 Aggregation Queries

...

---


# 4. Collaboration and Teamwork

## 4.1 Communication and Coordination

...

---

# 5. Conclusion

## 5.1 Project Summary

...

## 5.2 Future Enhancements

...
