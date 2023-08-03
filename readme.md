# TodoPackage

TodoPackage is a simple Laravel package that provides functionality to manage todo lists in your Laravel application. With this package, you can easily create, edit, and manage your todos, making it a convenient tool for organizing tasks and activities.

## Installation

To install TodoPackage in your Laravel project, add the following to your `composer.json` file:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/Shibly/todo-package.git"
    }
],
"require": {
    "shibly/todo-package": "^1.0"
}
```

## Configuration 
After installation, you need to publish the package configuration file and run migrations. Use the following commands to do so:


```php
php artisan vendor:publish --tag=todo-package-config
php artisan migrate
```


## Usage

### Managing Todos

TodoPackage provides routes and controller actions to manage your todos:

- View all todos: `/todos`
- Create a new todo: `/todos/create`
- Store a new todo: POST request to `/todos`
- Edit an existing todo: `/todos/{id}/edit`
- Update an existing todo: PUT request to `/todos/{id}`
- Delete a todo: DELETE request to `/todos/{id}`

### Custom Methods
TodoPackage also offers custom methods to retrieve todos based on their completion status:

- Get all completed todos:
```php
use Shibly\TodoPackage\Models\Todo;
$completedTodos = Todo::completed()->get();
```

- Get all incomplete todos:
```php
use Shibly\TodoPackage\Models\Todo;
$incompleteTodos = Todo::incomplete()->get();

```



## Contribution
Contributions are welcome! If you find a bug, have an enhancement, or want to propose a new feature, please open an issue or submit a pull request. Let's make TodoPackage even better together!

## Author
TodoPackage is created and maintained by Shibly.
