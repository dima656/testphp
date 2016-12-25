Yii 2 shop
============================

for admin:
username = admin
password = 123

Admin can manage orders, work with products and categories.

At frontend user can use Category widget, add products to cart and create orders.
Once order has benn created user receive email about order.
One should add proper smtp mail configuration in web.php.



DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



