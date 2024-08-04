CREATE TABLE student_user(
    id INT(11) NOT NULL AUTO_INCREMENT,
    studentnumber VARCHAR(255) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    college VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    role VARCHAR(255) NOT NULL DEFAULT 'student',
    PRIMARY KEY (id)
    );
    
CREATE TABLE student_data (
    student_number VARCHAR(20) PRIMARY KEY,
    last_name VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    college VARCHAR(255) NOT NULL
);


CREATE TABLE book_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bookname VARCHAR(255) NOT NULL,
    bookcover VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    filesize INT,
    uploaded_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO student_data (student_number, last_name, first_name, college)
VALUES
    ('20-1011', 'Doe', 'John', 'COE'),
    ('20-1012', 'Smith', 'Jane', 'CTHM'),
    ('20-1013', 'Johnson', 'Robert', 'CTED'),
    ('20-1014', 'Williams', 'Emily', 'CCST'),
    ('20-1015', 'Brown', 'Michael', 'COE'),
    ('20-1016', 'Miller', 'Olivia', 'CTHM'),
    ('20-1017', 'Davis', 'Daniel', 'CTED'),
    ('20-1018', 'Garcia', 'Sophia', 'CCST'),
    ('20-1019', 'Rodriguez', 'Matthew', 'COE'),
    ('20-1020', 'Martinez', 'Emma', 'CTHM'),
    ('20-1021', 'Hernandez', 'Christopher', 'CTED'),
    ('20-1022', 'Lopez', 'Ava', 'CCST'),
    ('20-1023', 'Gonzalez', 'David', 'COE'),
    ('20-1024', 'Wilson', 'Madison', 'CTHM'),
    ('20-1025', 'Moore', 'Elijah', 'CTED'),
    ('20-1026', 'Taylor', 'Abigail', 'CCST'),
    ('20-1027', 'Anderson', 'Ethan', 'COE'),
    ('20-1028', 'Thomas', 'Chloe', 'CTHM'),
    ('20-1029', 'Jackson', 'Aiden', 'CTED'),
    ('20-1030', 'White', 'Mia', 'CCST');

-- to update something directly in the database

INSERT INTO student_data (student_number, last_name, first_name, college)
VALUES
(1, 'admin, admin', 'admin');


UPDATE student_user
SET role = 'admin'
WHERE id = 1;