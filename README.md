# Microservices Demo App

### Initial Setup
Install Docker, Docker Compose and run `initial-setup.sh`.

````bash
./bin/initial-setup.sh
````
````bash
docker-compose up -d
````

This repository contains a **Domain-Driven Design (DDD)** demo application built with a focus on **layered architecture**, **SOLID principles**, **dependency injection**, and **composition over inheritance**. The application demonstrates how to structure and scale a microservices-based system with clean separation of concerns and well-defined boundaries.

## Key Features:

- **Microservices Architecture**: The app is composed of three main services:
    1. **Users Service**: Handles user management.
    2. **Posts Service**: Manages the creation and retrieval of posts.
    3. **Comments Service**: Manages comments tied to posts.
    4. **Conversations Service** Manages conversations tied to a user profile
    5. **Notifications and Subscriptions Service** Manages notifications and subscriptions.

  Each service is isolated, with its own database and runs behind its own **Nginx/Tomcat** instance.

- **API Gateway**: The app includes an **API Gateway** that aggregates data from the different services. It provides a unified **Profile Endpoint** that combines user data, all posts made by the user, and comments related to those posts.

- **Domain-Driven Design (DDD)**: Each service is designed around its specific domain with clear separation of business logic, domain entities, and application layers. This allows for modularity and scalability, with an emphasis on the business logic of each domain.

- **Layered Architecture & Bounded Context**: Each service follows the principles of layered architecture, separating domain logic, application logic, and infrastructure concerns. Bounded contexts are defined for each service, ensuring that each domain remains cohesive and isolated from other domains.

- **SOLID Principles**:  
    - **Single Responsibility Principle**: Each class or module has one clear responsibility.
    - **Open/Closed Principle**: Classes and modules are open for extension but closed for modification.
    - **Liskov Substitution Principle**: Ensures derived classes or services can substitute their base or interface without breaking functionality.
    - **Interface Segregation**: Clients are not forced to depend on interfaces they do not use.
    - **Dependency Inversion**: High-level modules rely on abstractions rather than concrete implementations, making the system flexible.

- **Dependency Injection**: Promotes loose coupling between system components by injecting dependencies.

- **Composition Over Inheritance**: Functionality is built using composition rather than inheritance, enabling greater flexibility and code reuse.

- **Multiple Frontend Clients**:
    - **React**: A frontend built using React.
    - **Vue.js**: Another frontend using Vue.js.
    - **Angular**: A third frontend created using Angular.

  All frontends interact with the backend microservices for data retrieval and processing.

## Tech Stack:

- **Backend**: PHP, Python, Java following microservice architecture principles with DDD, SOLID, and layered architecture.
- **API Gateway**: Aggregates data from services to expose combined profile information.
- **Frontend**: React, Vue.js, and Angular.
- **Databases**: MySQL, PostgreSql for each service.
- **Web Servers**: Nginx, Apache Tomcat for each microservice.


