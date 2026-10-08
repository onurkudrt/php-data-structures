# PHP Stack-Queue-LinkedList Example

A lightweight PHP implementation and benchmark comparing core data structures: **Stack**, **Queue**, and **LinkedList**.

## Requirements
- PHP 8.1 or higher
- [Composer](https://getcomposer.org/)


## Installation

### Standalone PHP Project

1. Clone or download the repository:
   ```bash
   git clone https://github.com/onurkudrt/php-data-structures.git
   cd php-data-structures
   ```

2. Install dependencies:
    ```bash
      composer install
    ```
3. Run benchmark / tests:
    ```
    php tests.php
    ```

### Symfony Installation


1. Install package with composer:
    ````bash
    composer require onkud/data-structures
    ````

2. Register the bundle in config/bundles.php to enable autowiring and dependency injection:
    ````php
        <?php
        
        return [
            ...,
            \OnKud\DataStructures\Bridges\Symfony\DataStructureBundle::class => ['all' => true],
        ];
    ````

3. Use in your services or controllers:
    ````php
    use OnKud\DataStructures\Stack\Interface\StackInterface;
    use OnKud\DataStructures\LinkedList\Interface\LinkedListInterface;
    
    class DemoController
    {
        public function __invoke(StackInterface $stack, LinkedListInterface $list)
        {
            $stack->push('item');
            // ...
        }
    }
    ````
   
### Laravel Installation

1. Install package with composer:
   *  ````bash
      composer require onkud/data-structures
      ```` 
   * **NOTE:** Laravel auto-discovers the Service Provider automatically via composer.json
 
2. Use in your services or controllers:
    ````php
    use OnKud\DataStructures\Stack\Interface\StackInterface;
    
    class DemoController extends Controller
    {
        public function index(StackInterface $stack)
        {
            $stack->push('item');
            // ...
        }
    }
    ````

### Install via GitHub (Without Packagist)


If this package is not published on Packagist, users can require it directly from GitHub by adding your repository to their project's `composer.json`:

1. Add the GitHub repository to the project's `composer.json`:

    ````json
    {
      "repositories": [
        {
          "type": "vcs",
          "url": "https://github.com/onurkudrt/php-data-structures.git"
        }
      ]
    }
    ````

2. Require the package via Composer:

    ````bash
    composer require onkud/data-structures:dev-main
    ````
