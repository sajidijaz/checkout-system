# Checkout System with Promotions

This project is a simple PHP-based checkout system that applies various promotional rules to the total price of items in a cart. It uses a Docker setup for ease of development and testing.


## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Setup

1. **Clone the repository**:

    ```sh
    git clone https://github.com/sajidijaz/checkout-system.git
    cd checkout-system
    ```

2. **Build the Docker container**:

    ```sh
    docker-compose build
    ```

3. **Run the Docker container**:

    ```sh
    docker-compose up -d
    ```

4. **Install Composer dependencies inside the Docker container**:

    - For Linux:

      ```sh
      docker exec -it wunder-mobility-app-1 bash
      ```

    - For Windows:

      ```sh
      winpty docker exec -it wunder-mobility-app-1 bash
      ```

   Once inside the container, run:

    ```sh
    composer install
    ```

5. **Exit the Docker container**:

    ```sh
    exit
    ```

## Running Tests

The project uses PHPUnit for testing. Tests are located in the `tests` directory.

To run the tests:

1. Ensure the Docker container is running:

    ```sh
    docker-compose up -d
    ```

2. Enter the Docker container:

    - For Linux:

      ```sh
      docker exec -it wunder-mobility-app-1 bash
      ```

    - For Windows:

      ```sh
      winpty docker exec -it wunder-mobility-app-1 bash
      ```

3. Execute the PHPUnit tests:

    ```sh
    ./vendor/bin/phpunit --testdox
    ```
