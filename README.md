# FSD Tasks

This repository contains my Full Stack Development lab tasks.

## Completed Tasks

### TASK01: Student Registration & Data Storage
**Description:** Design a Student Registration Form using HTML5 and CSS3 that collects: Name, Email, DOB, Department, Phone.  
**Database:** Store the data in a database table and retrieve it using SELECT queries.  
**Real-Time Usage:** Student or employee record management systems.

### TASK02: Data Retrieval & Sorting Dashboard
**Description:** Create a page that displays student or employee records with:  
- Sorting by name or date  
- Filtering by department  
- Count of students per department  
**Real-Time Usage:** Administrative dashboards and reporting systems.

### TASK03: Login System with Validation
**Description:**  
- Develop a Login Page  
- Validate inputs using JavaScript  
- Check credentials from the database  
- Show error messages dynamically  
**Real-Time Usage:** Authentication systems for web applications.

### TASK04: Order Management using Joins
**Concepts Used:** Joins, Subqueries, ORDER BY, CSS layout  
**Description:**  
- Create tables for Customers, Orders, Products  
- Display customer order history using JOIN queries  
- Use a subquery to find highest value order and most active customer  
**Real-Time Usage:** E-commerce and retail systems.

### TASK05: Transaction-Based Payment Simulation
**Description:**  
- Simulate an online payment process  
- Deduct balance from user account  
- Add amount to merchant account  
- Use COMMIT on success, ROLLBACK on failure  
**Real-Time Usage:** Banking and digital payment applications.

### TASK06: Automated Logging using Triggers & Views
**Description:**  
- A trigger that logs every INSERT or UPDATE  
- A view that shows daily activity reports  
**Real-Time Usage:** Audit logging in enterprise databases.

### TASK07: Interactive Web Form with Events & Functions
**Description:**  
- Build an interactive feedback form  
- Validate inputs on keypress  
- Highlight fields on mouse hover  
- Show confirmation on double-click submit  
- Use JS functions for reusable validation logic  
**Real-Time Usage:** Customer feedback and survey systems.

### TASK08: Spring Core Employee Management
**Description:** Create a simple Employee Management module using Spring Core.  
**Features:**  
- Inversion of Control (IoC) demonstrated via Spring managing objects  
- Dependency Injection using `@Autowired`  
- Component scanning using `@Component`  
- BeanFactory usage for bean management  
- Employee data stored in-memory using ArrayList  
- Supports adding, viewing, searching, and deleting employees  

**Technologies:** Java, Spring Core, Maven, Eclipse  

**Real-Time Usage:** Core example of Spring IoC and DI concepts, useful for building larger enterprise applications with Spring Framework.


### TASK09: Basic Spring MVC Application (Annotation-Based)

**Description:**  
Develop a basic Spring MVC application using **annotation-based configuration** (no XML configuration).  

**Features:**  
- Create a controller to handle user requests.  
- Accept input parameters from the user via a web form.  
- Display employee details or other data using the MVC flow (Model → View → Controller).  
- Use `@Controller`, `@RequestMapping`, and `@GetMapping` / `@PostMapping` annotations.  
- Views handled using JSP or Thymeleaf templates.  

**Technologies:** Java, Spring MVC, Maven, Eclipse, JSP/Thymeleaf  

**Real-Time Usage:**  
Demonstrates basic MVC architecture in Spring, foundational for building web applications and understanding request handling in enterprise projects.

## TASK10: Student CRUD Application

Build a **Student CRUD application** using **Spring Boot**.  

**Features:**
- Maps the database table using **JPA annotations**:
  - `@Entity`, `@Id`, `@Table`, and `@Column`
- Performs **CRUD operations**:
  - **Create** – Add new student records
  - **Read** – View student details
  - **Update** – Edit existing student records
  - **Delete** – Remove student records
- Uses a **relational database** for persistence.

**Folder structure:**
TASK10_StudentCRUDApp
│
├─ src/main/java/com.example.studentcrud
│ ├─ StudentCrudApplication.java
│ ├─ controller
│ ├─ model
│ └─ repository
├─ src/main/resources
│ ├─ application.properties
│ └─ templates/*.html
└─ pom.xml


## TASK11: Data Access Layer using Spring Data JPA

Build a **Data Access Layer (DAL)** for the Student module using **Spring Data JPA**.

**Features:**
- Uses `JpaRepository` interface for database operations
- Implements **custom query methods** to retrieve student records based on:
  - Department
  - Age
- Supports **Sorting and Pagination**
- Demonstrates separation of concerns using:
  - Controller Layer
  - Service Layer
  - Repository Layer
- Automatically maps database table using **JPA Entity annotations**

**Technologies Used:**
- Java
- Spring Boot
- Spring Data JPA
- MySQL
- Maven
- Eclipse

**APIs Implemented:**

- Get students by department:


