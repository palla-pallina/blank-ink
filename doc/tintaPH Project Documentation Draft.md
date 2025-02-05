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
- Relationships: Each user can have multiple uploaded content (artwork, event and auction).

### 2.2.2 Artwork Table

```
CREATE TABLE Artwork (
    art_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    art_categ_id INT,
    art_name VARCHAR(100) NOT NULL,
    art_desc TEXT,
    art_date_posted DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (art_category_id) REFERENCES Artwork_Category(art_category_id)
);
```

- Primary Key: artwork_id
- Foreign Key: user_id (References User), art_categ_id (References Artwork_Category)
- Relationships: Each artwork is linked to a single user and each artwork belongs to a category.

### 2.2.3 Artwork Category Table

```
CREATE TABLE Artwork_Category (
    art_categ_id INT PRIMARY KEY AUTO_INCREMENT,
    art_categ_name VARCHAR(100) UNIQUE NOT NULL
);
```

- Primary Key: art_categ_id
- Foreign Keys: None
- Relationships: Categories classify artworks.

### 2.2.4 Event Table

```
CREATE TABLE Event (
    event_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    event_categ_id INT,
    event_name VARCHAR(100) NOT NULL,
    event_desc TEXT NOT NULL,
    event_date VARCHAR(50) NOT NULL,
    event_time VARCHAR(50) NOT NULL,
    event_date_posted DATETIME NOT NULL,
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

- Primary Key: e_category_id
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
	jobmatch_posted DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (jobmatch_type_id) REFERENCES Job_Matching_Type(jobmatch_type_id)
);
```

- Primary Key: jm_id
- Foreign Keys: user_id (References User)
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
- Relationships: Type categorizes the job matching post.

### 2.2.8 Auction Listing Table

```
CREATE TABLE Auction_Listing (
    auction_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    artwork_id INT,
    auction_prog_id INT,
    auction_name VARCHAR(100) NOT NULL,
    auction_desc TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(user_id),
    FOREIGN KEY (category_id) REFERENCES Artwork_Categories(category_id),
    FOREIGN KEY (auction_prog_id) REFERENCES Auction_Progress(auction_prog_id)
)
```

- Primary Key: auction_id
- Foreign Keys: auction_prog_id (References Auction_Progress)
- Relationships:  Each listing is linked to a single user and each listing is described on their progress.

### 2.2.9 Auction Progress Table

```
CREATE TABLE Auction_Progress (
	auction_prog_id INT PRIMARY KEY AUTO_INCREMENT,
    starting_bid DECIMAL(10,2) NOT NULL,
    current_bid DECIMAL(10,2) DEFAULT NULL,
    bid_increment DECIMAL(10,2) NOT NULL,
    auction_start DATETIME NOT NULL,
    auction_end DATETIME NOT NULL,
    highest_bidder_id INT DEFAULT NULL,
    status ENUM('Upcoming', 'Ongoing', 'Completed', 'Cancelled') NOT NULL DEFAULT 'Upcoming'
);
```

- Primary Key: auction_prog_id
- Foreign Keys: None
- Relationships: Auction progress describes the details of auction listings.

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