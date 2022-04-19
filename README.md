- [x]  Lav endpoints til produkt CRUD operationer
- [x]  Lav endpoint til at GETte alle produkter på lager
- [/products?in_stock=true](https://sdm.nemt.link/products?in_stock=true)
- [x]  Det skal være muligt at tilføje det samme tag til flere produkter
- [x]  Lav unit tests hvis muligt
- [ProductTest](https://github.com/huesimon/scan-products/blob/main/tests/Feature/ProductTest.php)
- [ ]  SOLID + RESTful principper skal følges og koden skal være PSR-12 compliant
- [ ]  Send et github link med løsningen

# Live demo site
https://sdm.nemt.link/

# Setup
`composer install`

`php artisan migrate --seed`

# Postman collection
https://www.postman.com/bold-flare-1231/workspace/sdm/collection/7995054-13716288-1acb-455c-85ed-71f9e17d5588?action=share&creator=7995054

or

https://github.com/huesimon/scan-products/blob/main/postman.json
