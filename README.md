# Vending machine CLI interface with laravel

## Installation
1. Clone repo
2. `composer install`
3. Add config to `.env` file
4. Run `php artisan migrate --seed`
5. Run `php artisan key:generate`
6. Config testing environment in `phpunit.xml` (Tests use RefreshDatabase trait so its recommended you use a separate DB for tests)


## Usage
- List products with `php artisan products:list`
- Start a new order with `php artisan order {product_id} {quantity}` example: `php artisan order 1 2`
- Follow prompts (cash payment is more complex)

## Work in progress
- Vending machine stays locked if order isnt finished. Run `php artisan order:clear` to unlock.
